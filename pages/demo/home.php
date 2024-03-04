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



</header>

<!-- End Header Area -->

<section class="new-news-area bg-color-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="swiper-container mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                        if (is_array($resArticles) && !empty($resArticles)) {
                            foreach ($resArticles['articles'] as $article) {
                        ?>

                                <div class="swiper-slide">
                                    <div class="single-default-news">
                                        <img src="<?= configController::getImagePath($article->image, 1000, 1000) ?>" alt="img-fluid" class="img-fluid " style= "width: 100%; height: auto;">
                                        <div class="news-content">
                                            <ul class="list-unstyled">
                                                <li><i class="icofont-user-suited"></i> by <a href="#"><?= $article->authorname ?></a></li>
                                                <li><i class="icofont-calendar"></i><?= $article->cdatetime ?></li>
                                            </ul>
                                            <h3><a href="/article/<?= $article->caption ?>"><?= $article->title ?></a></h3>
                                        </div>
                                        <div class="tags bg-2"><a href="#"><?= $article->category_name ?></a></div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
</section>
<!--most popular -->
<section class="popular-news-area ptb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="section-title">
                    <h2>Authors</h2>
                </div>
                <?php
                if (isset($resArticles) && is_array($resArticles) && !empty($resArticles)) {

                ?>
                    <div class="single-technology-news">
                        <div class="row">
                            <img src="<?= configController::getImagePath($article->image, 600, 800) ?>" alt="img-fluid" style="width: 100%; height: auto;">
                            <div class="col-md-4">
                                <div class="news-content">
                                    <ul>
                                        <li><i class="icofont-user-suited"></i> by <a href="#"><?= $article->authorname ?></a></li>
                                        <li><i class="icofont-calendar"></i> <?= $article->cdatetime ?></li>
                                    </ul>
                                    <h3><a href="/article/<?= $article->caption ?>"><?= $article->title ?></a></h3>
                                </div>
                                <div class="tags"><a href="#"><?= $article->category_name ?></a></div>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="space-news-list">
                    <?php
                    if (isset($resArticles) && is_array($resArticles) && !empty($resArticles)) {
                        foreach ($resArticles['authors'] as $article) {
                    ?>
                            <div class="single-space-news">
                                <h3><a href="/author/<?= $article->author_caption ?>"><?= $article->authorname ?></a></h3>
                                <ul>
                                    <li><i class="icofont-clock-time"></i><?= $article->cdatetime ?></li>
                                    <li><i class="icofont-tag"></i> <a href="#"><?= $article->email ?></a></li>
                                    <li><i class="icofont-speech-comments"></i> <a href="#">21</a></li>
                                </ul>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="section-title">
                    <h2>Most Popular</h2>
                </div>
                <div class="swiper-container popular-news-slides">
                    <div class="swiper-wrapper">
                        <?php
                        if (is_array($resArticles) && !empty($resArticles)) {
                            foreach ($resArticles['most'] as $mostPopularArticle) {
                        ?>
                                <div class="swiper-slide">
                                    <div class="single-popular-news">
                                        <div class="news-image">
                                            <img src="<?= configController::getImagePath($mostPopularArticle->image, 800, 800) ?>" alt="img-fluid" class="img-fluid"style="width: 100%; height: auto;">
                                        </div>
                                        <div class="news-content">
                                        <h3><a href="/article/<?= $mostPopularArticle->caption ?>"><?= $mostPopularArticle->title?></a></h3>
                                            <span><i class="icofont-calendar"></i> <?= $mostPopularArticle->cdatetime ?></span>
                                        </div>
                                        <a href="#" class="link-overlay"></a>
                                        <div class="tags bg-2"><a href="#"><?= $mostPopularArticle->category_name ?></a></div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="video-news-area ptb-40">
    <div class="container">
        <div class="section-title">
            <h2>Watch Videos</h2>
        </div>
        <div class="row">
            <div class="video-news-slides owl-carousel owl-theme">
                <div class="col-lg-12 col-md-12">
                    <div class="single-default-news">
                        <img src="/dist/assets/img/6.jpg" alt="image" />
                        <div class="news-content">
                            <ul>
                                <li><i class="icofont-user-suited"></i> by <a href="#">John Smith</a></li>
                                <li><i class="icofont-calendar"></i> March 22, 2021</li>
                            </ul>
                            <h3><a href="#">As well as stopping goals for an, Cristiane Endler is opening.</a></h3>
                        </div>
                        <div class="tags"><a href="#">Sports</a></div>
                        <div class="video-btn">
                            <a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="popup-youtube"><i class="icofont-play-alt-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="single-default-news">
                        <img src="/dist/assets/img/2.jpg" alt="image" />
                        <div class="news-content">
                            <ul>
                                <li><i class="icofont-user-suited"></i> by <a href="#">John Smith</a></li>
                                <li><i class="icofont-calendar"></i> March 22, 2021</li>
                            </ul>
                            <h3><a href="#">As well as stopping goals for an, Cristiane Endler is opening.</a></h3>
                        </div>
                        <div class="tags"><a href="#">Sports</a></div>
                        <div class="video-btn">
                            <a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="popup-youtube"><i class="icofont-play-alt-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="single-default-news">
                        <img src="/dist/assets/img/1.jpg" alt="image" />
                        <div class="news-content">
                            <ul>
                                <li><i class="icofont-user-suited"></i> by <a href="#">John Smith</a></li>
                                <li><i class="icofont-calendar"></i> March 22, 2021</li>
                            </ul>
                            <h3><a href="#">As well as stopping goals for an, Cristiane Endler is opening.</a></h3>
                        </div>
                        <div class="tags"><a href="#">Sports</a></div>
                        <div class="video-btn">
                            <a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="popup-youtube"><i class="icofont-play-alt-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--categories-->
<section class="international-news-area ptb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="section-title">
                    <h2>Category</h2>
                </div>
                <div class="international-news-inner">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-international-news">
                                <?php if (isset($resArticles['category'][0])) { ?>
                                    <div class="news-image">
                                        <img src="<?= configController::getImagePath($resArticles['category'][0]->image, 600, 800) ?>" alt="image" />
                                    </div>
                                    <div class="news-content">
                                        <span><i class="icofont-calendar"></i><?= $resArticles['category'][0]->cdatetime ?></span>
                                        <h3><a href="/article/<?=$resArticles['category'][0]->caption ?>"><?= $resArticles['category'][0]->title ?></a></h3>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="international-news-list">
                                <?php
                                $count = 0;
                                foreach ($resArticles['category'] as $article) {
                                    if ($count < 3) {
                                ?>
                                        <div class="media news-media align-items-center">
                                            <a href="#"><img src="<?= configController::getImagePath($article->image, 600, 800) ?>" alt="image" /></a>
                                            <div class="content">
                                                <span><i class="icofont-calendar"></i> <?= $article->cdatetime ?></span>
                                                <h3><a href="/article/<?= $article->caption ?>"><?= $article->title ?></a></h3>
                                            </div>
                                        </div>
                                <?php
                                        $count++;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-9">
                <div class="section-title">
                    <h2>Stay Connected</h2>
                </div>
                <ul class="stay-connected">
                    <li>
                        <a href="#"><i class="icofont-facebook"></i><b>10.2K</b> <span>Fans</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="icofont-twitter"></i><b>14.2K</b> <span>Followers</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="icofont-linkedin"></i><b>11.2K</b> <span>Fans</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="icofont-rss"></i><b>15.2K</b> <span>Subscriber</span></a>
                    </li>
                </ul>
                <div class="stay-connected-ads">
                    <a href="#"> <img src="<?= configController::getImagePath($article->image, 600, 800) ?>" style="width: 100%; height: auto;"></a>

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
                <div class="swiper-container more-news-slides">
                    <div class="swiper-wrapper">
                        <?php
                        if (is_array($resArticles) && !empty($resArticles['more'])) {
                            foreach ($resArticles['more'] as $article) {
                        ?>
                                <div class="swiper-slide single-more-news">
                                    <img src="<?= configController::getImagePath($article->image, 600, 800) ?>" alt="img-fluid" style="width: 100%; height: auto;">
                                    <div class="news-content">
                                        <ul>
                                            <li><i class="icofont-user-suited"></i> by <a href="#"><?= $article->authorname ?></a></li>
                                            <li><i class="icofont-calendar"></i><?= $article->cdatetime ?></li>
                                        </ul>
                                        <h3><a href="/article/<?= $article->caption ?>"><?= $article->title ?></a></h3>
                                    </div>
                                    <div class="tags bg-2"><a href="#"><?= $article->category_name ?></a></div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--all news-->
<section class="all-category-news ptb-40 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="section-title">
                    <h2>All News</h2>
                </div>
                <?php
                if (is_array($resArticles) && !empty($resArticles)) {
                    foreach ($resArticles['all'] as $article) {
                        $i = 0;
                        $bg_color_class = $i % 2 === 0 ? 'bg-2' : 'bg-3';
                ?>
                        <div class="single-category-news">
                            <div class="row m-0 align-items-center">
                                <div class="col-lg-5 col-md-6 p-0">
                                    <div class="category-news-image">
                                        <a href="#"> <img src="<?= configController::getImagePath($article->image, 600, 800) ?>" alt="Article Image" alt="image"></a>

                                        <div class="tags <?= $bg_color_class ?>">
                                            <a href="#"><?= $article->category_name ?></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-6">
                                    <div class="category-news-content">
                                        <span><i class="icofont-clock-time"></i> <?= $article->cdatetime ?></span>
                                        <h3><a href="/article/<?= $article->caption ?>"><?= $article->title ?></a></h3>
                                        <p><?= $article->descriptionn ?></p>
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
                    <li>
                        <a href="#"><i class="icofont-facebook"></i><b>10.2K</b> <span>Fans</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="icofont-twitter"></i><b>14.2K</b> <span>Followers</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="icofont-linkedin"></i><b>11.2K</b> <span>Fans</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="icofont-rss"></i><b>15.2K</b> <span>Subscriber</span></a>
                    </li>
                </ul>
                <div class="stay-connected-ads">
                    <a href="#"><img src="/dist/assets/img/3-ads.png" alt="image" /></a>
                </div>
                <div class="featured-news">
                    <div class="section-title">
                        <h2>Featured News</h2>
                    </div>
                    <div class="single-featured-news">
                        <img src="/dist/assets/img/1.jpg" alt="image" />
                        <div class="news-content">
                            <ul>
                                <li><i class="icofont-user-suited"></i> by <a href="#">John Smith</a></li>
                                <li><i class="icofont-calendar"></i> March 22, 2021</li>
                            </ul>
                            <h3><a href="#">As well as stopping goals, Cristiane Endler is opening doors</a></h3>
                        </div>
                        <div class="tags"><a href="#">Sports</a></div>
                    </div>
                    <div class="single-featured-news">
                        <img src="/dist/assets/img/2.jpg" alt="image" />
                        <div class="news-content">
                            <ul>
                                <li><i class="icofont-user-suited"></i> by <a href="#">John Smith</a></li>
                                <li><i class="icofont-calendar"></i> March 22, 2021</li>
                            </ul>
                            <h3><a href="#">You’ve got mail! All about the tagDiv Newsletter plugin</a></h3>
                        </div>
                        <div class="tags bg-2"><a href="#">Sports</a></div>
                    </div>
                    <div class="single-featured-news">
                        <img src="/dist/assets/img/3.jpg" alt="image" />
                        <div class="news-content">
                            <ul>
                                <li><i class="icofont-user-suited"></i> by <a href="#">John Smith</a></li>
                                <li><i class="icofont-calendar"></i> March 22, 2021</li>
                            </ul>
                            <h3><a href="#">Newspaper Theme: Enhance Your Pages with the Row Divider</a></h3>
                        </div>
                        <div class="tags bg-3"><a href="#">Sports</a></div>
                    </div>
                </div>
                <div class="newsletter-box">
                    <div class="section-title">
                        <h2>Newsletter</h2>
                    </div>
                    <div class="newsletter-box-inner">
                        <h3>Subscribe To Our Mailing List To Get The New Updates!</h3>
                        <i class="icofont-email"></i>
                        <form class="newsletter-form" data-toggle="validator">
                            <input type="email" class="newsletter-input" placeholder="Enter your email" name="EMAIL" required autocomplete="off" /> <button type="submit"><i class="icofont-paper-plane"></i></button>
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>
                </div>
                <div class="hot-news-ads">
                    <a href="#"><img src="/dist/assets/img/4-ads.png" alt="image" /></a>
                </div>
            </div>
        </div>
    </div>
    
</section>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {

        effect: "coverflow",
        initialSlide: 3,
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        }
    });
</script>
<script>
    var swiper = new Swiper('.popular-news-slides', {
        initialSlide: 1,
        spaceBetween: 10,
        loop: true,
        cssMode: true,
        mousewheel: true,
        keyboard: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>
<script>
    var moreNewsSwiper = new Swiper(".more-news-slides", {
        slidesPerView: 3,
        grid: {
            rows: 2,
        },
        spaceBetween: 10,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>