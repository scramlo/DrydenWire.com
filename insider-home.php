<ul>
  <?php foreach ($pages->find("articleInsider=1") as $article): ?>
    <li><a href="<?= $article->url ?>"><?= $article->title ?></a></li>
  <?php endforeach; ?>
</ul>
