<?php

// Dummy Content
RouteFactory::route('GET', '/images/dummy/image[.{type: png|jpg|jpeg}]','imageController@getDummyImage');
RouteFactory::route('GET', '/images/dummy/image/{size}[.{type: png|jpg|jpeg}]','imageController@getDummyImage');
RouteFactory::route('GET', '/images/dummy/image/{size}/{background}[.{type: png|jpg|jpeg}]','imageController@getDummyImage');
RouteFactory::route('GET', '/images/dummy/image/{size}/{background}/{color}[.{type: png|jpg|jpeg}]','imageController@getDummyImage');
RouteFactory::route('GET', '/images/clearCache[/{clear: all}]', 'imageController@clearTmpFolder');
RouteFactory::route('GET', '/images/{hsize}/{wsize}/{file:.+}', 'imageController@getImage');


RouteFactory::route('GET', '/demo/photos', 'mainController@get_eikones');




// RouteFactory::route('GET', '/category/{caption}','mytestController@getTest');
RouteFactory::route('GET', '/home', 'articleController@getHome');
RouteFactory::route('POST', '/contact', 'articleController@getContact');
RouteFactory::route('GET', '/category/{caption}[/page{page}]', 'articleController@getCategory');
RouteFactory::route('GET', '/author/{caption}','articleController@getAuthor');

RouteFactory::route('GET', '/image','articleController@getImg');

RouteFactory::route('GET', '/tags/{caption}[/page{page}]','articleController@getArticlesWithTags');
//RouteFactory::route('GET', '/search/{caption}[/page{page}]','articleController@getArticlesBySearch');
RouteFactory::route('GET', '/article/{caption}', 'articleController@getSingle');



//      Admin
RouteFactory::route('GET', '/diaxeiristiko', 'mainController@get_admin');

//      GIT
RouteFactory::route('POST', '/gitDeploy', 'gitController@deploy');


// Sitemap
RouteFactory::route('GET', '/sitemapIndex.xml','SitemapController@getSitemaps');
RouteFactory::route('GET', '/sitemapIndex/{list}.xml','SitemapController@getSitemap');




//      Homepage

RouteFactory::route('GET', '/','homeController@index');

//      UserLinks
RouteFactory::route('GET', '/register','profileController@getRegister');

RouteFactory::route('GET', '/login','profileController@getLogin');

RouteFactory::route('GET', '/profile','profileController@getProfile','user');

//      contact
RouteFactory::route('GET', '/contact','contactController@getContact');

RouteFactory::route('GET', '/demo/{test}','contentController@getDemo');

RouteFactory::route('GET', '/{caption}','contentController@getContent');




/**
 *
 *  POST LINKS
 *
 */

RouteFactory::route('POST', '/contact/send','contactController@sendContact');

RouteFactory::route('POST', '/send/forma/endiaferontos','homeController@saveEkdilosiEndiaferontos');

RouteFactory::route('POST', '/newsletter/send','mainController@saveNewsletter');

RouteFactory::route('POST', '/get/content','contentController@getContentPost');


//RouteFactory::route('POST', '/get/link','configController@getLinkMake');
//RouteFactory::route('POST', '/en/get/link','configController@getLinkMake');
//
//RouteFactory::route('POST', '/get/translate','configController@getTranslate');
//RouteFactory::route('POST', '/en/get/translate','configController@getTranslate');
