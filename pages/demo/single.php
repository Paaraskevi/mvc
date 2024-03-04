<?php $this->layout($myTemplate) ?>

<?php $currentCategoryId = isset($_GET['id']) ? $_GET['id'] : null ?>

<body>
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

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Start News Details Area -->
    <section class="news-details-area pb-40">
        <div class="container">
            <!-- Breadcrumb -->
            <ul class="breadcrumb">
                <li><a href="/home"><i class="icofont-home"></i> Home</a></li>
                <li><i class="icofont-rounded-right"></i></li>
                <li><a href="#<?= $currentCategoryId ?>"><?= $content[0]->category_name ?></a></li>
            </ul>

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <!-- News Details -->
                    <div class="news-details">
                        <!-- Article Image -->
                        <div class="article-img">
                            <div class="swiper">
                                <div class="article-img-gallery swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($content as $article){?>
                                            <?php
                                            $imageNames = json_decode($article->imgGallery);
                                            if ($imageNames && is_array($imageNames)) {
                                                foreach ($imageNames as $imageName) {
                                                    $imagePath = configController::getImagePath($imageName, 430, 750);
                                                    echo "<div class='swiper-slide'><img src=\"$imagePath\" alt=\"image\"></div>";
                                                }
                                            }  else  {?>
                                                <?php
                                                 $thumbnailPath = configController::getImagePath($content[0]->image, 430, 750);
                                                echo "<div class='swiper-slide'><img src=\"$thumbnailPath\" alt=\"thumbnail\"></div>";
                                                ?>
                                            <?php }?>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Article Content -->
                        <div class="article-content">
                            <?php if (!empty($content)) { ?>
                                <ul class="entry-meta">
                               
                                <li><i class="icofont-user"></i><a href="/author/<?= $content[0]->author_caption ?>"><?= $content[0]->authorname ?></a></li>
                                    <li><i class="icofont-eye-alt"></i> 1040</li>
                                    <li><i class="icofont-calendar"></i><?= $content[0]->cdatetime ?></li>
                                </ul>
                               
                                <h3><?= $content[0]->descriptionn ?></h3>
                                <blockquote class="wp-block-quote">
                                    <h3><?= $content[0]->title ?></h3>
                                    <cite> <?= $content[0]->authorname ?></cite>
                                 
                                </blockquote>
                                <h3><?= $content[0]->summary ?></h3>
                               
                            
                                <!-- Tags -->
                                <ul class="category">
                                    <li><span>Tags:</span></li>
                                    <?php if (!empty($tags)) { ?>
                                        <?php foreach ($tags as $tag) { ?>
                                            <li><a href="/tags/<?= $tag->caption ?>" class="tag-link"><?= $tag->title?></a></li>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <li>No tags available</li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- Post Navigation -->
                    <div class="post-controls-buttons">
                        <div><a href="#">Prev Post</a></div>
                        <div><a href="#">Next Post</a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <!-- Stay Connected -->
                    <div class="section-title">
                        <h2>Stay Connected</h2>
                    </div>
                    <!-- Social Media Stats -->
                    <ul class="stay-connected">
                        <li><a href="#"><i class="icofont-facebook"></i><b>10.2K</b> <span>Fans</span></a></li>
                        <li><a href="#"><i class="icofont-twitter"></i><b>14.2K</b> <span>Followers</span></a></li>
                        <li><a href="#"><i class="icofont-linkedin"></i><b>11.2K</b> <span>Fans</span></a></li>
                        <li><a href="#"><i class="icofont-rss"></i><b>15.2K</b> <span>Subscriber</span></a></li>
                    </ul>

                    <!-- Stay Connected Ads -->
                    <div class="stay-connected-ads">
                        <a href="#"><img src="<?= configController::getImagePath($content[0]->image) ?>" alt="Ad Image"></a>
                    </div>

                    <!-- Featured News -->
                    <div class="featured-news">
                        <div class="section-title">
                            <h2>Featured News</h2>
                        </div>
                        <!-- Display Featured News -->
                        <?php foreach ($content as $row) {?>
                            <div class="single-featured-news">
                                <a href="#"> <img src="<?= configController::getImagePath($content[0]->image) ?>" alt="Article Image" class="img-fluid"></a>
                                <div class="news-content">
                                    <ul>
                                    <li><i class="icofont-user"></i><a href="/author/<?= $content[0]->author_caption ?>"><?= $content[0]->authorname ?></a></li>
                                        <li><i class="icofont-calendar"></i> <?= $row->cdatetime ?></li>
                                    </ul>
                                    <h3><a href="#"><?= $row->title ?></a></h3>
                                </div>
                                <div class="tags">
                                    <a href="#"><?= $row->category_name ?></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
      
        var swiper = new Swiper('.article-img-gallery', {
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>

</body>

</html>
