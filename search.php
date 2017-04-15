<?php

// look for a GET variable named 'q' and sanitize it
$query = $sanitizer->text($input->get->query);
// did $q have anything in it?
if ($query) {
	// Sanitize for placement within a selector string. This is important for any
	// values that you plan to bundle in a selector string like we are doing here.
  // See the cheatsheet for more info.
	$query = $sanitizer->selectorValue($query);
	// Search the title and body fields for our query text.
	$matches = $pages->find("template=article, sort=-articleDate, title|articleBody~=$query");
	// did we find any matches?
	if($matches->count) {
		// yes we did
		echo "<p>We found {$matches->getTotal()} articles matching \"$query\":</p>";
    //Show pagination
    echo $pagination;
    foreach ($matches as $article) {
      echo "<div class='row'>
              <div class='col-xs-4'>";
      if ($article->articleFeaturedImage) {
        echo "<img class='img-fluid article-img' src='{$article->articleFeaturedImage->size(320,240)->url}' alt='$article->title Article Image' />";
      } else {
        echo "<img class='img-fluid article-img' src='{$pages->get('template=site-options')->articleHolderImage->size(320,240)->url}' alt='$article->title Article Image' />";
      }
      echo "</div> <!-- End Col-4 -->
            <div class='col-xs-8'>
              <small>$article->articleDate</small>
              <br>
              <a href='$article->url'>$article->title</a>
            </div> <!-- End Col-8 -->
          </div> <!-- End Row -->
          <hr>";
    } //end for each search result
	} else {
		// we didn't find any
		echo "<p>Sorry, no results were found.</p>";
	}
} else {
	// no search terms provided
	echo "<p>You didn't seach for anything!</p>";
}
