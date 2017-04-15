<?php if ($user->name !== "preview"): ?>

<?php $i = 0; ?>
<?php $resultsAll = $pages->find("template=article, articleInsider!=1, limit=16, sort=-articleDate, sort=-created") ?>

<?php //Begin Results All ?>
<?php foreach ($resultsAll as $article): ?>

  <?php //**** ADS ****// ?>

    <?php //If Article Block 1 ?>
    <?php if ($i == 0): ?>
      <hr class="hidden-md-up">
      <?php //Banner Ad (First, Desktop Only) ?>
      <?php $deskBannerAd = $ads->articleListAds->eq(0); ?>
      <div class="row hidden-sm-down">
        <div class="col-xs-12">
          <a href="<?= $mobBannerAd->description ?>" target="_blank" title="<?= $deskBannerAd->description ?>">
            <img class="img-fluid" src="<?= $deskBannerAd->size(730,170)->url ?>" alt="<?= $deskBannerAd->description ?>" title="<?= $deskBannerAd->description ?>"/>
          </a>
          <hr class="hidden-md-up">
        </div>
      </div>
      <?php //End Banner Ad (First, Desktop Only) ?>

      <?php //Begin Banner Ad (Second, Mobile Only) ?>
      <?php $mobBannerAd = $ads->articleListAds->eq(1); ?>
      <div class="row hidden-md-up">
        <div class="col-xs-12">
          <a href="<?= $mobBannerAd->description ?>" target="_blank" title="<?= $mobBannerAd->description ?>">
            <img class="img-fluid" src="<?= $mobBannerAd->size(730,170)->url ?>" alt="<?= $mobBannerAd2->description ?>" title="<?= $mobBannerAd->description ?>"/>
          </a>
        </div>
      </div>
      <?php //Begin Banner Ad (Second, Mobile Only) ?>
      <hr>
    <?php endif; ?>

    <?php //If Article Block 2 ?>
    <?php if ($i == 4): ?>
      <?php //Banner Ad (Second, Desktop Only) ?>
      <?php $deskBannerAd = $ads->articleListAds->eq(1); ?>
      <div class="row hidden-sm-down">
        <div class="col-xs-12">
          <a href="<?= $mobBannerAd->description ?>" target="_blank" title="<?= $deskBannerAd->description ?>">
            <img class="img-fluid" src="<?= $deskBannerAd->size(730,170)->url ?>" alt="<?= $deskBannerAd->description ?>" title="<?= $deskBannerAd->description ?>"/>
          </a>
          <hr class="hidden-md-up">
        </div>
      </div>
      <?php //End Banner Ad (Second, Desktop Only) ?>

      <?php //Begin Banner Ad (Third, Mobile Only) ?>
      <?php $mobBannerAd = $ads->articleListAds->eq(2); ?>
      <div class="row hidden-md-up">
        <div class="col-xs-12">
          <a href="<?= $mobBannerAd->description ?>" target="_blank" title="<?= $mobBannerAd->description ?>">
            <img class="img-fluid" src="<?= $mobBannerAd->size(730,170)->url ?>" alt="<?= $mobBannerAd2->description ?>" title="<?= $mobBannerAd->description ?>"/>
          </a>
        </div>
      </div>
      <?php //Begin Banner Ad (Third, Mobile Only) ?>
      <hr>
    <?php endif; ?>

    <?php //If Article Block 3 ?>
    <?php if ($i == 8): ?>
      <?php //Banner Ad (Third, Desktop Only) ?>
      <?php $deskBannerAd = $ads->articleListAds->eq(2); ?>
      <div class="row hidden-sm-down">
        <div class="col-xs-12">
          <a href="<?= $mobBannerAd->description ?>" target="_blank" title="<?= $deskBannerAd->description ?>">
            <img class="img-fluid" src="<?= $deskBannerAd->size(730,170)->url ?>" alt="<?= $deskBannerAd->description ?>" title="<?= $deskBannerAd->description ?>"/>
          </a>
          <hr class="hidden-md-up">
        </div>
      </div>
      <?php //End Banner Ad (Third, Desktop Only) ?>

      <?php //Begin Banner Ad (Fourth, Mobile Only) ?>
      <?php $mobBannerAd = $ads->articleListAds->eq(3); ?>
      <div class="row hidden-md-up">
        <div class="col-xs-12">
          <a href="<?= $mobBannerAd->description ?>" target="_blank" title="<?= $mobBannerAd->description ?>">
            <img class="img-fluid" src="<?= $mobBannerAd->size(730,170)->url ?>" alt="<?= $mobBannerAd2->description ?>" title="<?= $mobBannerAd->description ?>"/>
          </a>
        </div>
      </div>
      <?php //Begin Banner Ad (Fourth, Mobile Only) ?>
      <hr>
    <?php endif; ?>

    <?php //If Article Block 4 ?>
    <?php if ($i == 12): ?>
      <?php //Banner Ad (Fourth, Desktop Only) ?>
      <?php $deskBannerAd = $ads->articleListAds->eq(3); ?>
      <div class="row hidden-sm-down">
        <div class="col-xs-12">
          <a href="<?= $mobBannerAd->description ?>" target="_blank" title="<?= $deskBannerAd->description ?>">
            <img class="img-fluid" src="<?= $deskBannerAd->size(730,170)->url ?>" alt="<?= $deskBannerAd->description ?>" title="<?= $deskBannerAd->description ?>"/>
          </a>
          <hr class="hidden-md-up">
        </div>
      </div>
      <?php //End Banner Ad (Fourth, Desktop Only) ?>

      <?php //Begin Banner Ad (Fifth, Mobile Only) ?>
      <?php $mobBannerAd = $ads->articleListAds->eq(4); ?>
      <div class="row hidden-md-up">
        <div class="col-xs-12">
          <a href="<?= $mobBannerAd->description ?>" target="_blank" title="<?= $mobBannerAd->description ?>">
            <img class="img-fluid" src="<?= $mobBannerAd->size(730,170)->url ?>" alt="<?= $mobBannerAd2->description ?>" title="<?= $mobBannerAd->description ?>"/>
          </a>
        </div>
      </div>
      <?php //Begin Banner Ad (Fifth, Mobile Only) ?>
      <hr>
    <?php endif; ?>

  <?php //**** END ADS **** ?>

  <?php //**** ARTICLE BLOCK ****// ?>
  <div class="row">
    <div class="col-xs-4">
      <?php if ($article->articleFeaturedImage): ?>
        <a href="<?= $article->url ?>" title="<?= $article->title ?>"><img class="article-img img-fluid" src="<?= $article->articleFeaturedImage->size(320,240)->url ?>" title="<?=$article->title?>" alt="<?=$article->title?>"></a>
      <?php else: ?>
        <a href="<?= $article->url ?>" title="<?= $article->title ?>"><img class="article-img img-fluid" src="<?= $pages->get("template=site-options")->articleHolderImage->size(320,240)->url ?>"></a>
      <?php endif; ?>
    </div>
    <div class="col-xs-8">
      <small> <?= $article->articleDate ?></small>
      <br>
      <a href="<?= $article->url ?>" title="<?= $article->title ?>">
        <h2 class="littleH2"><?= $article->title ?></h2>
      </a>
    </div>
  </div>
  <hr>

  <?php //Final Ad for Desktop ?>
  <?php //If Article Block 4 ?>
  <?php if ($i == 15): ?>
    <?php //Banner Ad (Last, Desktop Only) ?>
    <?php $deskBannerAd = $ads->articleListAds->eq(4); ?>
    <div class="row hidden-sm-down">
      <div class="col-xs-12">
        <a href="<?= $mobBannerAd->description ?>" target="_blank" title="<?= $deskBannerAd->description ?>">
          <img class="img-fluid" src="<?= $deskBannerAd->size(730,170)->url ?>" alt="<?= $deskBannerAd->description ?>" title="<?= $deskBannerAd->description ?>"/>
        </a>
        <hr class="hidden-md-up">
      </div>
    </div>
    <hr class="hidden-sm-down">
    <?php endif; ?>
  <?php //End Banner Ad (Last, Desktop Only) ?>

  <?php $i++ ?>

<?php endforeach; //End Results All?>

<a href="http://drydenwire.com/news/page2/" class="link-no-dec"><h1 class="section-title section-title-link">More <i class="fa fa-plus"></i></h1></a>

<?php endif; //end if user isn't brian ?>

<?php if ($user->name === "preview"): ?>

  <div id="spinner">
    <div class="rect1"></div>
    <div class="rect2"></div>
    <div class="rect3"></div>
    <div class="rect4"></div>
    <div class="rect5"></div>
  </div>
<section id="articles-list"></section>
<a id="load-articles-button" class="link-no-dec btn-block"><h3 class="section-title section-title-link">Load More +</h3></a>

<?php $url = $pages->get("template=json-articles")->httpUrl ?>

<?php endif; ?>