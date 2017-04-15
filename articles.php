<div class="row">
  <div class="col-xs-12">
    <?php $results =  $pages->find("template=article, limit=20, sort=-articleDate, sort=-created") ?>
    <?php $pagination = $results->renderPager(array("numPageLinks" => 1)); ?>
    <?= $pagination ?>
    <div class="clearfix"></div>
    <hr>
      <?php foreach ($results as $article): ?>
        <div class="row">
          <div class="col-xs-4">
            <?php if ($article->articleFeaturedImage): ?>
              <img class="img-fluid article-img" src="<?= $article->articleFeaturedImage->size(320,240)->url ?>" alt="<?= $article->title ?> Article Image" />
            <?php else: ?>
              <img class="img-fluid article-img" src="<?= $pages->get("template=site-options")->articleHolderImage->size(320,240)->url ?>" alt="<?= $article->title ?> Article Image" />
            <?php endif; ?>
          </div>
          <div class="col-xs-8">
            <small> <?= $article->articleDate ?></small>
            <br>
            <a href="<?= $article->url ?>"><?= $article->title ?></a>
          </div>
        </div>
        <hr>
      <?php endforeach; ?>
    <?= $pagination ?>
  </div>
</div>
