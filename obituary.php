<div class="row">
  <div class="col-xs-4 hidden-xs-down"></div>
  <div class="col-xs-12 col-sm-4 text-xs-center">
    <?php if ($page->obitFeaturedImage): ?>
      <img class="img-fluid img-circle img-thumbnail" src="<?= $page->obitFeaturedImage->size(400,400)->url ?>" title="<?= $page->obitFeaturedImage->name ?>" alt="<?= $page->obitFeaturedImage->name ?>" />
    <?php else: ?>
      <img class="img-fluid img-circle img-thumbnail" src="<?= $pages->get("template=site-options")->obitHolderImage->size(400,400)->url ?>" title="<?= $page->obitFeaturedImage->name ?>" alt="<?= $page->obitFeaturedImage->name ?>" />
    <?php endif; ?>
    <p class="text-muted lead">
      <em>In Memory of <?= $page->title ?></em>
    </p>
  </div>
  <div class="col-xs-4 hidden-xs-down"></div>
</div>
<hr>
<div class="row">
  <div class="col-xs-12">
    <?= $page->obitBody ?>
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
  </div>
</div>
