<div class="row">
  <div class="col-xs-12">
    <?php $results =  $pages->find("template=obituary, limit=10, sort=-obitDate") ?>
    <?php $pagination = $results->renderPager(); ?>
    <?= $pagination ?>
    <div class="clearfix"></div>
    <hr>
      <?php foreach ($results as $obit): ?>
        <div class="row">
          <div class="col-xs-4">
            <?php if ($obit->obitFeaturedImage): ?>
              <img class="img-fluid img-circle img-thumbnail" src="<?= $obit->obitFeaturedImage->size(100,100)->url ?>" alt="<?= $obit->title ?> Obituary" />
            <?php else: ?>
              <img class="img-fluid img-circle img-thumbnail" src="<?= $pages->get("template=site-options")->obitHolderImage->size(100,100)->url ?>" alt="<?= $obit->title ?> Obituary" />
            <?php endif; ?>
          </div>
          <div class="col-xs-8">
            <small> <?= $obit->obitDate ?></small>
            <br>
            <a href="<?= $obit->url ?>"><?= $obit->title ?></a>
          </div>
        </div>
        <hr>
      <?php endforeach; ?>
    <?= $pagination ?>
  </div>
</div>
