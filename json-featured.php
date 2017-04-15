<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

  $results = $pages->find("template=article, articleFeatured=1, limit=3, sort=-articleDate, sort=-created");

  $featuredArticlesArray = [];

  foreach ($results as $featured) {

    $featuredArticle = [];

    $featuredArticle["title"] = $featured->title;
    $featuredArticle["url"] = $featured->url;
    $featuredArticle["img"] = $featured->articleFeaturedImage->size(800,400)->httpUrl;
    $featuredArticle["date"] = $featured->articleDate;

    array_push($featuredArticlesArray, $featuredArticle);
  }

  echo json_encode($featuredArticlesArray, JSON_PRETTY_PRINT);
