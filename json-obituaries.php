<?php
 header("Access-Control-Allow-Origin: http://10.0.1.9:3000");

  if( isset($_POST['startResults']) ):

    $start = $_POST['startResults'];

    $results = $pages->find("template=obituary, start=$start, limit=10, sort=-obitDate, sort=-created");

    $obituariesArray = [];

    $i = 0;

    // markup tags that are allowed. Example: "<br/><strong>"
    $options = array( 'allowableTags' => '<p><strong><em><i><script><blockquote><iframe><div><section><main>');

    foreach ($results as $obituary) {

      $obituaryArray = [];

      $obituaryArray["title"] = $obituary->title;
      $obituaryArray["body"] = $sanitizer->textarea($obituary->obitBody, $options);
      $obituaryArray["date"] = $obituary->obitDate;
      if ($obituary->obitFeaturedImage) {
        $obituaryArray["fImageUrl"] = $obituary->obitFeaturedImage->size(200,200)->httpUrl;
      } else {
        $obituaryArray["fImageUrl"] = $pages->get("template=site-options")->obitHolderImage->size(200,200)->httpUrl;
      }

      array_push($obituariesArray, $obituaryArray);
    }

    echo json_encode($obituariesArray, JSON_PRETTY_PRINT);

  endif;
