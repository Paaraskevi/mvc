<?php $currentCategoryId = isset($_GET['id']) ? $_GET['id'] : null; ?>
<style>
    .myelement {
        color: red !important;
    }
</style>
<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="sinmun-mobile-nav">
      
    </div>

    <div class="sinmun-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
              
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="/home" class="nav-link">Home</a></li>

                        <?php if(isset($categories)) { ?>
                            <?php foreach($categories as $category) {?>
                                <?php
                                    $class = ($category->id == $currentCategoryId) ? 'myelement' : 'current-category';;
                                ?>
                                <li class="nav-item"><a class="<?= $class ?> nav-link" href="<?= $categoryLink = "/category/{$category->title}/page{$page}"; ?>"><?= htmlspecialchars($category->title) ?></a></li>
                            <?php } ?>
                        <?php } ?>

                    </ul>

                    <div class="others-options">
                        <div class="header-search d-inline-block">
                            <div class="nav-search">
                                <div class="nav-search-button"><i class="icofont-ui-search"></i></div>
                                <form action=" " method="get">
                                    <span class="nav-search-close-button" tabindex="0"></span>
                                    <div class="nav-search-inner"><input name="search" placeholder="Search here...." /></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
