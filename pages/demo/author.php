<?php $this->layout($myTemplate) ?>

<!-- Start Header Area -->
<header class="header-area">
    <!-- Start Top Header -->
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="city-temperature">
                        <i class="icofont-ui-weather"></i>
                        <span>28.5<sup>c</sup></span>
                        <b>Dubai</b>
                    </div>

                    <ul class="top-nav">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Forums</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Advertisement</a></li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-4 text-end">
                    <ul class="top-social">
                        <li><a href="#" target="_blank"><i class="icofont-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="icofont-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="icofont-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="icofont-pinterest"></i></a></li>
                        <li><a href="#" target="_blank"><i class="icofont-vimeo"></i></a></li>
                    </ul>

                    <div class="header-date">
                        <i class="icofont-clock-time"></i>
                        Friday, June 15
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Top Header -->

    <!-- Start Breaking News -->
    <div class="breaking-news">
        <div class="container">
            <div class="breaking-news-content clearfix">
                <h6 class="breaking-title"><i class="icofont-flash"></i> Breaking News:</h6>

                <div class="breaking-news-slides owl-carousel owl-theme">
                    <div class="single-breaking-news">
                        <p><a href="#">As well as stopping goals, Cristiane Endler is opening doors for other women.</a></p>
                    </div>

                    <div class="single-breaking-news">
                        <p><a href="#">Netcix cuts out the chill with an integrated personal trainer on running.</a></p>
                    </div>

                    <div class="single-breaking-news">
                        <p><a href="#">As well as stopping goals, Cristiane Endler is opening doors for other women.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breaking News -->
</header>
<!-- End Header Area -->

<!-- Start Author Area -->
<section class="author-area pb-40">
    <div class="container">
        <ul class="breadcrumb">
                <li><a href="#"><i class="icofont-home"></i> Home</a></li>
                <li><i class="icofont-rounded-right"></i></li>
                <li><?= $content[0]->authorname ?></li>
                <li><i class="icofont-rounded-right"></i></li>
                <li><?= $content[0]->authorname ?></li>
        </ul>

        <div class="author-box">
        <img src="<?= configController::getImagePath($content[0]->auimg) ?>" alt="image">
            <div class="author-info">
                <div class="author-title">
                    <h3><?= $content[0]->authorname ?></h3>
                    <span><a href="#" target="_blank"><?= $content[0]->email?></a></span>
                    <p><?=$content[0]->audescription?></p>

                <ul class="post-meta-info">
                    <li><a href="#"><i class="icofont-blogger"></i> 10 Posts</a></li>
                    <li><a href="#"><i class="icofont-comment"></i> 5 Comments</a></li>
                </ul>

                <ul class="social">
                    <li><a href="#" class="facebook"><i class="icofont-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="icofont-twitter"></i></a></li>
                    <li><a href="#" class="linkedin"><i class="icofont-linkedin"></i></a></li>
                    <li><a href="#" class="instagram"><i class="icofont-instagram"></i></a></li>
                </ul>
            </div>
    </div>
</div>
</section>
<!-- End Author Area -->
<section class="all-category-news ptb-40 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="section-title">
                    <h2>All News</h2>
                </div>
                <?php
                if (is_array($content) && !empty($content)) {
                    foreach ($content as $article) {
                        $i = 0;
                        $bg_color_class = $i % 2 === 0 ? 'bg-2' : 'bg-3';
                ?>
                        <div class="single-category-news">
                            <div class="row m-0 align-items-center">
                                <div class="col-lg-5 col-md-6 p-0">
                                    <div class="category-news-image">
                                        <a href="#"> <img src="<?= configController::getImagePath($content[0]->image) ?>" alt="Article Image" alt="image"></a>

                                        <div class="tags <?= $bg_color_class ?>">
                                            <a href="#"><?= $article->category_name ?></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-6">
                                    <div class="category-news-content">
                                        <span><i class="icofont-clock-time"></i> <?= $content[0]->cdatetime ?></span>
                                        <h3><a href="/article/<?= $content[0]->article_caption ?>"><?= $content[0]->title ?></a></h3>
                                        <p><?= $content[0]->descriptionn ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="section-title">
                    <h2>Stay Connected</h2>
                </div>

                <ul class="stay-connected">
                    <li><a href="#"><i class="icofont-facebook"></i><b>10.2K</b> <span>Fans</span></a></li>
                    <li><a href="#"><i class="icofont-twitter"></i><b>14.2K</b> <span>Followers</span></a></li>
                    <li><a href="#"><i class="icofont-linkedin"></i><b>11.2K</b> <span>Fans</span></a></li>
                    <li><a href="#"><i class="icofont-rss"></i><b>15.2K</b> <span>Subscriber</span></a></li>
                </ul>

                <div class="stay-connected-ads">

                    <a href="#"><img src="<?= configController::getImagePath($content[0]->image) ?>" />

                </div>

                <div class="featured-news">
                    <div class="section-title">
                        <h2>Featured News</h2>
                    </div>

                    <?php
                    $i = 0;
                    foreach ($content as $row) {
                    ?>
                        <div class="single-featured-news">
                            <a href="#"> <img src="<?= configController::getImagePath($content[0]->image) ?>" alt="Article Image" class="img-fuild"></a>
                            <div class="news-content">
                                <ul>
                                    <li><i class="icofont-user-suited"></i> by <a href="#">John Author</a></li>
                                    <li><i class="icofont-calendar"></i> <?= $row->cdatetime ?></li>
                                </ul>
                                <h3><a href="#"><?= $row->title ?></a></h3>
                            </div>
                            <div class="tags">
                                <a href="#"><?= $row->category_name ?></a>
                            </div>
                        </div>
                    <?php
                        $i++;
                        if ($i >= 3) {

                            break;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="more-news-area">
    <div class="container">
        <div class="more-news-inner">
            <div class="section-title">
                <h2>More News</h2>
            </div>
            <div class="row">
                <div class="more-news-slides owl-carousel owl-theme">
                    <?php
                    if (is_array($content) && !empty($content)) {
                        foreach ($content as $article) {
                    ?>
                            <div class="col-lg-12 col-md-12">
                                <div class="single-more-news">
                                    <img src="<?= configController::getImagePath($content[0]->image) ?>" alt="image">

                                    <div class="news-content">
                                        <ul>
                                            <li><i class="icofont-user-suited"></i> by <a href="#"><?= $content[0]->auhtorname ?></a></li>
                                            <li><i class="icofont-calendar"></i> <?= $ $content[0]->cdatetime ?></li>
                                        </ul>
                                        <h3><a href="#"><?= $ $content[0]->descriptionn ?></a></h3>
                                    </div>
                                    <div class="tags <?= $ $content[0]->category_name ?>">
                                        <a href="#"><?= $ $content[0]->category_name ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="pagination-area">
    <a href="/category/<?= $content[0]->category_name  ?>/page<?= $page - 1 ?>" class="prev page-numbers"><i class="icofont-double-left"></i></a>
    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
        <a href="/category/<?= $content[0]->category_name ?>/page<?= $i ?>" class="page-numbers <?= $i === $page ? 'current' : '' ?>" onclick="showPage(<?= $i ?>, <?= $category_id ?>)"><?= $i; ?></a>
    <?php endfor; ?>
    <a href="/category/<?= $content[0]->category_name ?>/page<?= $page + 1 ?>" class="next page-numbers"><i class="icofont-double-right"></i></a>
</div>

<?php if ($page > 1) : ?>
    <a class="prev page-numbers" href="/category/<?= $content[0]->category_name ?>/page<?= $page - 1 ?>" onclick="showPage(<?= $page - 1 ?>, <?= $category_id ?>)"></a>
<?php endif; ?>

<?php if ($page < $total_pages) : ?>
    <a class="next page-numbers" href="/category/<?= $content[0]->category_name ?>/page<?= $page + 1 ?>" onclick="showPage(<?= $page + 1 ?>, <?= $category_id ?>)"></a>
<?php endif; ?>
</div>

<script>
    function showPage(page, idCat) {
        var url = '/category/';

        if (idCat) {
            url += idCat + '/page' + page;
        } else {
            url += 'page' + page;
        }

        window.location.href = url;
    }
</script>


<?php   //print_r($content);  
?>