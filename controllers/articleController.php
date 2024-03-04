<?php


class articleController extends mainController
{

    function getCategory($vars)
    {
        $caption = $vars["caption"];

        if (isset($vars["page"])) {
            $page = $vars["page"];
        } else {
            $page = 1;
        }

        $contents = new articleModel();

        $total_articles_per_page = 3;
        $total_pages = $contents->getTotalRows($caption, $total_articles_per_page);

        $content = $contents->getCategoryResult($caption, $page);


        if (empty($content)) {
            $this->getErrorPage(404);
            return;
        }

        $this->getNavBar();

        $this->templates->addData(compact('content', 'total_pages', 'page', 'body_classes'));
        echo $this->templates->render("pages/{$this->myTemplate}/articles");
    }

    function getSingle($vars)
    {
        $caption = $vars["caption"];
        $contents = new articleModel();

        $content = $contents->getSingleArticle($caption);
        $this->getNavBar();

        if (empty($content)) {
            $this->getErrorPage(404);
            return;
        }
        $tags = str_replace(['[', ']', '"'], '', $content[0]->tags);
        $tags = $contents->getTagsofArticles($tags);

        $this->templates->addData(compact('tags'));

        $this->templates->addData(compact('content', 'body_classes'));

        echo $this->templates->render("pages/{$this->myTemplate}/single");
    }


    function getTags($vars)
    {
        $caption = $vars["caption"];

        $contents = new articleModel();
        $tags = $contents->getTagsofArticles($caption);

        $this->getNavBar();

        if (empty($contents)) {
            $this->getErrorPage(404);
            return;
        }
        $this->templates->addData(compact('tags', 'body_classes'));

        echo $this->templates->render("pages/{$this->myTemplate}/single");
    }
    function getArticlesWithTags($vars)
    {

        $caption = $vars["caption"];

        $total_articles_per_page = 3;

        if (isset($vars["page"])) {
            $page = $vars["page"];
        } else {
            $page = 1;
        }

        $content = new articleModel();

        $total_articles_per_page = 3;
        $total_pages = $content->getTotalRows($caption, $total_articles_per_page);

        $contents = $content->getArticlesWithTags($caption, $page);

        $this->getNavBar();

        if (empty($contents)) {

            $this->getErrorPage(404);
            return;
        }
        $this->templates->addData(compact('contents', 'total_pages', 'page', 'body_classes'));

        echo $this->templates->render("pages/{$this->myTemplate}/tag");
    }
    function getAuthor($vars)
    {
        $caption = $vars["caption"];

        $total_articles_per_page = 3;
        if (isset($vars["page"])) {
            $page = $vars["page"];
        } else {
            $page = 1;
        }

        $contents = new articleModel();
        $content = $contents->getArticleByAuthor($caption);

        $this->getNavBar();

        if (empty($content)) {

            $this->getErrorPage(404);
            return;
        }

        $total_pages = $contents->getTotalRows($caption, $total_articles_per_page);

        $this->templates->addData(compact('content', 'total_pages', 'page', 'body_classes'));

        echo $this->templates->render("pages/{$this->myTemplate}/author");
    }

    function getMoreNews($vars)
    {
        $caption = $vars["caption"];
        $contents = new articleModel();

        $content = $contents->getMoreNews($caption);

        $this->getNavBar();

        $this->templates->addData(compact("content", "body_classes"));

        echo $this->templates->render("pages/{$this->myTemplate}/articles");
    }
    function getNavBar()
    {

        $articleModel = new ArticleModel();

        $categories = $articleModel->getNav();

        $this->templates->addData(['categories' => $categories]);
    }
    function getTotal()
    {

        $articleModel = new ArticleModel();

        $rows = $articleModel->getTotalRows();

        $this->templates->addData(compact('rows'));
    }

    function getHome($vars)
    {
        $contents = new articleModel();
        $resArticles = $contents->getHomePage();

        if (empty($resArticles)) {
            $this->getErrorPage(404);
            return;
        }

        $this->getNavBar();
        //Helper::printr($resArticles);
        $this->templates->addData(compact('resArticles', 'body_classes'));

        echo $this->templates->render("pages/{$this->myTemplate}/home");
    }
    function getContact($data)
    {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $subject = $_POST['sub'];

        $this->getNavBar();

        $contents = new articleModel();
        $content = $contents->getContactPage($name, $email, $message,$subject);

        if (empty($resArticles)) {
            $this->getErrorPage(404);
            return;
        }
        $this->getNavBar();
      
        $this->templates->addData(compact('content', 'body_classes'));

        echo $this->templates->render("pages/{$this->myTemplate}/contact");
    }
    function getImg(){
    

        echo $this->templates->render("pages/{$this->myTemplate}/image");
    }
}
