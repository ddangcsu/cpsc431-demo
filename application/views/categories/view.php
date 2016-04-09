<main>
  <!-- Grid system -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <ol class="breadcrumb">
          <li>
            <span class="glyphicon glyphicon-home"></span>
            <a href="<?=base_url('main')?>">Home</a>
          </li>
          <?php
            $lastcrumb = array_pop($bread_crumbs);
            foreach ($bread_crumbs as $breadcrumb): ?>
            <?php if ($breadcrumb['articleCount'] > 0): ?>
              <li>
                <a href="<?=base_url('categories/view') . '/' . $breadcrumb['categoryId']?>">
                  <?=$breadcrumb['name']?>
                </a>
              </li>
            <?php else: ?>
              <li><?=$breadcrumb['name']?></li>
            <?php endif; ?>
          <?php endforeach; ?>
          <li class="active"><?=$lastcrumb['name']?></li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <!-- List of articles in panel-->
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Articles</h3>
          </div>
          <div class="panel-body">
            <!-- List of articles -->
            <div class="list-group">
              <?php foreach ($article_list as $article): ?>
                <div class="list-group-item">
                  <!-- Heading of the item -->
                  <a href="<?=base_url('articles/view') . '/' . $article['articleId']?>">
                    <h4 class="list-group-item-heading"><?=html_escape($article['title'])?></h4>
                  </a>
                  <h5 class="list-group-item-heading">Category: <?=html_escape($article['name'])?></h5>
                  <!-- Item content text -->
                  <p class="list-group-item-text">Posted: <?=nice_date($article['createdDate'], 'm/d/Y') ?></p>
                  <p class="list-group-item-text"><?=word_limiter(strip_tags($article['content']), 20, '...') ?></p>
                </div> <!-- A list group item -->
              <?php endforeach; ?>
            </div> <!-- A list group of articles -->
          </div>
        </div>

      </div> <!-- Scale to use 8 columns center in the middle -->
    </div> <!-- Grid row system -->
  </div> <!-- Fluid Container -->

</main>
