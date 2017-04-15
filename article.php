<div class="row">
  <div class="col-xs-12">
    <?php if ($page->articleAuthor == ""): ?>
      <?php $author = "Drydenwire"; ?>
    <?php else: ?>
      <?php $author = $page->articleAuthor; ?>
    <?php endif; ?>
    <p><?= $page->articleDate ?> | <?= $author ?></p>
    <?php $fImage = $page->articleFeaturedImage; ?>
    <?php if ($fImage->width < 800): ?>
      <?php
        $fImage = imagickal($fImage->url, "thumbnailImage", [800, 400,true,true]);
      ?>
    <?php else: ?>
      <?php $options = array("quality" => 50); ?>
      <?php $fImage = $fImage->size(800,400, $options)->url; ?>
    <?php endif; ?>
    <img src="<?= $fImage ?>" class="img-fluid" title="<?= $page->title ?>" alt="<?= $page->title ?>" />
  </div>
</div>
<hr>
<div class="row">
  <div class="col-xs-12 article-body">
    <?php if ($page->articleInsider != 1): ?>
      <?= $page->articleBody ?>

      <?php
        //Related posts
        if (2==2):
          //echo "<div class=\"graybox\">";
          //echo "<strong>Don't worry, only logged in people can see this. (Like Brian, Kara, or Ben.)</strong><p>Brian is testing some new functionality</p>";

          //sanitize title
          //selector santize
          $title = $sanitizer->selectorValue($page->title);

          //remove paretheses
          $title = str_replace("(", "", $title);
          $title = str_replace(")", "", $title);

          //turn title into array of words
          $titleArr = explode(" ", $title);
          $keywords = [];

          //remove words less than 3 characters and put them in keywords var
          for ($i=0; $i < count($titleArr); $i++) {
            if (strlen($titleArr[$i]) > 3) {
              $term = strtolower($titleArr[$i]);
              array_push($keywords, $term);
            }
          }

          //turn back into array
          $keywords = implode("|", $keywords);

          //remove bad keywords
          $keywords = str_replace("update|", "", $keywords);
          $keywords = str_replace("washburn|", "", $keywords);
          $keywords = str_replace("county|", "", $keywords);
          $keywords = str_replace("county", "", $keywords);

          //search for posts containing any of the keywords in the title or body
          $relatedPosts = $pages->find("template=article,sort=-articleDate, title~=$keywords, limit=10");

          //if I find any related posts...
          if ($relatedPosts->count > 1) {
            echo "<hr>";
            echo "<p><strong>You May Also Be Interested In:<br></strong></p>";
            if ($user->name === "brian"):
              //echo "Because the terms<br><strong>\n\"$keywords\"</strong><br>were searched for in article titles.";
            endif;
            echo "<ul>";
            foreach ($relatedPosts as $post) {
              if ($post->title != $page->title) {
                echo "<li><a href=\"$post->url\" title=\"$post->title\">$post->title</a></li>";
              }
            }
            echo "</ul>";
          }

          //next and previous buttons
          echo "<hr>";
          $previousId = $page->id - 1;
          $previous = $pages->get("id=$previousId");
          $nextId = $page->id + 1;
          $next = $pages->get("id=$nextId");
          echo "<div class=\"text-xs-left\">";
            echo "<i class=\"fa fa-arrow-left\"></i> <a href=\"$previous->url\" title=\"$previous->title\">Previous</a>";
            if ($page->id != $pages->get("template=article, status=published, sort=-articleDate, sort=-created")->id) { //If this isn't the last article
              echo "<span class=\"pull-right\"><a href=\"$next->url\" title=\"$next->title\">Next</a> <i class=\"fa fa-arrow-right\"></i></span>";
            }
          echo "</div>";

          //echo "</div>"; //end gray box
        endif;
      ?>

      <hr>

      <?php //set up url-friendly text for sharing.
        $shareText = "Read " . $page->title . " at " . $page->httpUrl;
        $shareText = str_replace(" ", "%20", $shareText);
        $tweetText = "Read " . $page->title . " from @drydenwire! " . $page->httpUrl;
        $tweetText = str_replace(" ", "%20", $tweetText);
      ?>
      <div class="btn-toolbar hidden-lg-down">
        <a class="btn btn-sm btn-primary" target="_blank" href="http://www.facebook.com/share.php?u=<?= $page->httpUrl ?>&title=<?= $page->title?>"><i class="fa fa-facebook"></i> Facebook</a>
        <a class="btn btn-sm btn-success" target="_blank" href="https://twitter.com/intent/tweet?text=<?= $tweetText ?>"><i class="fa fa-twitter"></i> Twitter</a>
        <a class="btn btn-sm btn-info" href="mailto:?Subject=Read%20This%21&Body=<?= $shareText ?>"><i class="fa fa-paper-plane"></i> Email</a>
      </div>
      <div class="hidden-xl-up">
        <a class="btn btn-block btn-primary" target="_blank" href="http://www.facebook.com/share.php?u=<?= $page->httpUrl ?>&title=<?= $page->title?>"><i class="fa fa-facebook"></i> Facebook</a>
        <a class="btn btn-block btn-success" target="_blank" href="https://twitter.com/intent/tweet?text=<?= $tweetText ?>"><i class="fa fa-twitter"></i> Twitter</a>
        <a class="btn btn-block btn-info" href="mailto:?Subject=Read%20this%21&Body=<?= $shareText ?>"><i class="fa fa-paper-plane"></i> Email</a>
        <a class="btn btn-block btn-danger" href="sms:?&body=<?= $shareText ?>"><i class="fa fa-comments"></i> Text</a>
      </div>
    <?php elseif ($user->hasRole("insider")): ?>
      <?= $page->articleBody ?>
    <?php else: ?>
      <?php
        function truncateText($text, $maxlength = 200) {
        // truncate to max length
        $text = substr(strip_tags($text), 0, $maxlength);
        // check if we've truncated to a spot that needs further truncation
        if(strlen(rtrim($text, ' .!?,;')) == $maxlength) {
          // truncate to last word
          $text = substr($text, 0, strrpos($text, ' '));
        }
        return trim($text);
        }

        $summary = truncateText($page->articleBody);

        echo $summary;
      ?>
      <hr>
      <div class="jumbotron">
        <h3>Whoops!</h3>
        <p>It looks like you aren't subscribed to Dryden Insider yet!</p>
      </div>
    <?php endif; ?>

  </div>
</div>
