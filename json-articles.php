<?php

if( isset($_POST['startResults']) ):

$start = $_POST['startResults'];

  $results = $pages->find("template=article, start=$start, limit=10, sort=-articleDate, sort=-created");

  $articlesArray = [];

  $i = 0;

  // markup tags that are allowed. Example: "<br/><strong>"
  $options = array( 'allowableTags' => '<p><strong><em><i><script><blockquote><iframe><div><section><main>');

  foreach ($results as $article) {

    $articleArray = [];

    $articleArray["title"] = $article->title;
    $articleArray["url"] = $article->url;
    $articleArray["thumbUrl"] = $article->articleFeaturedImage->size(320, 240)->url;
    //$articleArray["body"] = $sanitizer->textarea($article->articleBody, $options);
    $articleArray["date"] = $article->articleDate;
    $articleArray["fImageUrl"] = $article->articleFeaturedImage->httpUrl;

    array_push($articlesArray, $articleArray);
  }

  echo json_encode($articlesArray, JSON_PRETTY_PRINT);

endif;