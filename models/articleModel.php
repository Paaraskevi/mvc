<?php
class articleModel extends mainModel
{

    public function __construct()
    {

        $this->mylang = App::get('Language')->language;
    }


    function getCategoryResult($caption, $page)
    {

        $total_articles_per_page = 3;

        $offset = ($page - 1) * $total_articles_per_page;

        $sql = "SELECT a.id ,a.title ,a.caption, a.cdatetime,a.descriptionn  ,a.image ,a.name , au.authorname  ,c.title as category_name 
        FROM caltabania.t_article as a 
        left join caltabania.t_categoryy as c on category= c.id 
        left join caltabania.t_author as au on au.id = a.name 
        where c.caption = ?
        order by a.cdatetime desc
        limit $offset ,$total_articles_per_page";


        $res = QueryModel::Find_Data($sql, array($caption));


        return $res;
    }

    function getTotalRows($caption, $total_articles_per_page)
    {
        $sql = "SELECT COUNT(*) as total
                FROM caltabania.t_article as a 
                LEFT JOIN caltabania.t_categoryy as c ON a.category = c.id 
                LEFT JOIN caltabania.t_author as au ON au.id = a.name 
                WHERE c.caption = ?";

        $result = QueryModel::Find_Data($sql, array($caption));

        if ($result && isset($result[0]->total)) {
            $total_rows = $result[0]->total;
            $total_pages = ceil($total_rows / $total_articles_per_page);
            return $total_pages;
        } else {
            return 0;
        }
    }


    function getSingleArticle($caption)
    {
        $sql = "SELECT a.id, a.title,a.descriptionn, a.summary, a.cdatetime,a.imgGallery, a.image, a.name, a.tags, 
         au.authorname,au.caption as author_caption, 
         c.title AS category_name
        FROM caltabania.t_article AS a
        LEFT JOIN caltabania.t_categoryy AS c ON a.category = c.id
        LEFT JOIN caltabania.t_author AS au ON au.id = a.name
         WHERE  a.caption = ?";

        $res = QueryModel::Find_Data($sql, array($caption));
        return $res;
    }

    function getTagsofArticles($tags)
    {
        $sql = "SELECT caption, title  ,id
        FROM caltabania.t_tags  WHERE id in (" . $tags . ")";

        $res = QueryModel::Find_Data($sql, array($tags));
        return $res;
    }

    function getArticlesWithTags($caption, $page)
    {
        $total_articles_per_page = 3;


        $tagIdQuery = "SELECT id FROM caltabania.t_tags WHERE title= ?";
        $tagIdResult = QueryModel::Find_Data($tagIdQuery, array($caption));
        // Helper::printr($tagIdResult);

        if (!empty($tagIdResult) && isset($tagIdResult[0]->id)) {
            $tagId = $tagIdResult[0]->id;

            $offset = ($page - 1) * $total_articles_per_page;

            $sql = "SELECT a.id ,a.title ,a.caption, a.cdatetime,a.descriptionn  ,a.image  ,c.title as category_name 
            FROM caltabania.t_article AS a
            LEFT JOIN caltabania.t_categoryy AS c ON a.category = c.id
            LEFT JOIN caltabania.t_tags as t on t.id = a.tags
            WHERE a.tags  LIKE '%$tagId%'  
            ORDER BY a.cdatetime ASC
            LIMIT $offset, $total_articles_per_page";

            $res = QueryModel::Find_Data($sql, array($tagId));

            return $res;
        } else {

            return array();
        }
    }

    function getArticleByAuthor($author)
    {
        $sql = "SELECT a.title ,a.descriptionn ,a.cdatetime ,a.caption as article_caption ,a.image,a.name , au.authorname ,c.title as category_name ,au.email,au.auimg ,audescription,au.caption
        FROM caltabania.t_article as a 
       left join caltabania.t_categoryy as c on a.category= c.id 
       left join caltabania.t_author as au on au.id = a.name 
       where au.caption =?";

        $res = QueryModel::Find_Data($sql, array($author));
        return $res;
    }
    function getConnected($caption)
    {

        $sql = "SELECT a.id, a.title, a.descriptionn,  c.title AS category_name, a.calendar, a.img ,a.image
        FROM t_article as a 
        LEFT JOIN t_categoryy as c ON a.category = c.id
        ORDER BY a.cdatetime desc 
        where a.caption= ?";

        $res = QueryModel::Find_Data($sql, array($caption));

        return $res;
    }
    function getNav()
    {
        $sql = "SELECT id, title,caption FROM t_categoryy";

        $res = QueryModel::Find_Data($sql, array($sql));

        return $res;
    }
    function getMore($caption)
    {
        $sql = "SELECT a.id, a.title, a.descriptionn, a.summary , c.title AS category_name, a.cdatetime, a.img ,a.image
        FROM t_article as a 
        LEFT JOIN t_categoryy as c ON a.category = c.id
        ORDER BY a.cdatetime desc
        where a.caption=?";

        $res = QueryModel::Find_Data($sql, array($caption));

        return $res;
    }

    function getHomePage()
    {
        $sqlSlider = "SELECT slider FROM caltabania.t_home";
        $resSlider = QueryModel::Find_Data($sqlSlider, array());

        $ids = [];
        foreach ($resSlider as $sliderRow) {
            $slider = str_replace(['[', ']', '"'], '', $sliderRow->slider);
            $ids = explode(",", $slider);
        }

        $sqlArticles = "SELECT a.id, a.title, a.caption, a.cdatetime, a.descriptionn, a.image, a.name, au.authorname, c.title as category_name 
                            FROM caltabania.t_article as a 
                            LEFT JOIN caltabania.t_categoryy as c ON a.category = c.id 
                            LEFT JOIN caltabania.t_author as au ON au.id = a.name 
                            WHERE a.id IN (" . implode(",", $ids) . ")";

        $resArticles = QueryModel::Find_Data($sqlArticles, array());

        $sqlAuthors = "SELECT authors FROM caltabania.t_home";
        $resAuthors = QueryModel::Find_Data($sqlAuthors, array());
        //Helper::printr($resAuthors);
        $authorIds = [];
        foreach ($resAuthors as $authorRow) {
            $authors = str_replace(['[', ']', '"'], '', $authorRow->authors);
            $authorIds = explode(",", $authors);
        }
       // Helper::printr($authorIds);
         $sqlGetAuthors = "SELECT DISTINCT a.name, au.authorname , au.email, au.audescription ,au.cdatetime ,au.caption as author_caption
        from caltabania.t_article as a
        LEFT JOIN caltabania.t_author AS au ON au.id = a.name
    
        WHERE au.id IN (" . implode(",", $authorIds) . ")";

        $resAuthors = QueryModel::Find_Data($sqlGetAuthors, array());
        //Helper::printr($resAuthors);

        $sqlCategories = "SELECT category ,category_title FROM caltabania.t_home";
        $resCategories = QueryModel::Find_Data($sqlCategories, array());
        //Helper::printr($resCategories);

        $CategoriesIds = [];

        foreach ($resCategories as $CategoriesRow) {
            $categories = str_replace(['[', ']', '"'], '', $CategoriesRow->category);
            $CategoriesIds = array_merge($CategoriesIds, explode(",", $categories));
        }


        // Helper::printr($CategoriesIds);

        $sqlGetCategories = "SELECT a.id ,a.title ,a.caption, c.title as category_name, a.title ,a.cdatetime,a.image
                                FROM caltabania.t_article as a
                                LEFT JOIN caltabania.t_categoryy as c ON a.category = c.id
                                WHERE a.id IN (" . implode(",", $CategoriesIds) . ")";
        $resCategories = QueryModel::Find_Data($sqlGetCategories, array());
        //Helper::printr($resCategories);

        $sqlAll = "SELECT all_news FROM caltabania.t_home";
        $resAll = QueryModel::Find_Data($sqlAll, array());


        $allIds = [];
        foreach ($resAll as $AllRow) {
            $all = str_replace(['[', ']', '"'], '', $AllRow->all_news);
        }
        $allIds = array_merge($allIds, explode(",", $all));

        $sqlGetAll = "SELECT a.id ,a.title ,a.caption, a.cdatetime,a.descriptionn  ,a.image ,a.name , au.authorname  ,c.title as category_name 
        FROM caltabania.t_article as a 
        left join caltabania.t_categoryy as c on category= c.id 
        left join caltabania.t_author as au on au.id = a.name
        WHERE a.id IN (" . implode(",", $allIds) . ")";

        $resAll = QueryModel::Find_Data($sqlGetAll, array());



        $sqlMostPopular = " SELECT most_popular from caltabania.t_home";
        $resMostPopular =  QueryModel::Find_Data($sqlMostPopular, array());

        //Helper::printr($resMostPopular);
        $most_popular_Ids = [];

        foreach ($resMostPopular as $mostRow) {
            $mostpopular = str_replace(['[', ']', '"'], '', $mostRow->most_popular);
        }

        $most_popular_Ids = array_merge($most_popular_Ids, explode(",", $mostpopular));

        //Helper::printr($most_popular_Ids);

        $sqlGetMost = "SELECT a.id ,a.caption, a.title , a.image , a.cdatetime , c.title as category_name
        from caltabania.t_article as a
        left join caltabania.t_categoryy as c on a.category=c.id 
        WHERE a.id IN (" . implode(",", $most_popular_Ids) . ")";

        $resMostPopular = QueryModel::Find_Data($sqlGetMost, array());
        //Helper::printr($resMostPopular);

        $sqlMore = "SELECT more_news FROM caltabania.t_home";
        $resMore = QueryModel::Find_Data($sqlMore, array());

        $moreIds = [];

        foreach ($resMore as $moreRow) {
            $more_news = str_replace(['[', ']', '"'], '', $moreRow->more_news);
        }
        $moreIds = array_merge($moreIds, explode(",", $more_news));

        //Helper::printr($moreIds);
        $sqlGetMore = "SELECT a.id , a.title ,a.caption, a.image , a.cdatetime , c.title as category_name,a.name , au.authorname
        from caltabania.t_article as a
        left join caltabania.t_categoryy as c on a.category=c.id 
        left join caltabania.t_author as au on au.id = a.name
        WHERE a.id IN (" . implode(",", $moreIds) . ")";

        $resMoreNews = QueryModel::Find_Data($sqlGetMore, array());

        //Helper::printr($resMoreNews);
        return [
            'articles' => $resArticles, 'authors' => $resAuthors,
            'category' => $resCategories, 'all' => $resAll, 'most' => $resMostPopular, 'more' => $resMoreNews
        ];
    }
    function getContactPage($name, $email, $message,$subject){

    }
}
