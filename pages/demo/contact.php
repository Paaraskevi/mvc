<?php $this->layout($myTemplate) ?>

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
                            
                            <div class="single-breaking-news">9
                                <p><a href="#">As well as stopping goals, Cristiane Endler is opening doors for other women.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breaking News -->
        </header>

<form action="/contact" method="post">
    <section class="contact-area pb-40">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icofont-home"></i> Home</a></li>
                <li><i class="icofont-rounded-right"></i></li>
                <li>Contact Us</li>
            </ul>

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact-form">
                        <h3>Contact Us</h3>

                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name*" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email*" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="msg_subject" id="msg_subject" required data-error="Please enter your subject" placeholder="Subject*">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea placeholder="Message*" name="message" id="message" class="form-control" cols="30" rows="10" required data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="contact-info">
                        <h3>Contact Info</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget erat magna. Pellentesque justo ante.</p>
                        <ul>
                            <li><i class="icofont-google-map"></i> 27 Division St, New York, NY 10002, USA</li>
                            <li><i class="icofont-phone"></i> <a href="#">+123 456 7890</a></li>
                            <li><i class="icofont-envelope"></i> <a href="#">admin@sinmun.com</a></li>
                            <li><i class="icofont-ui-browser"></i> <a href="#">www.sinmun.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
