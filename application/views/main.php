<main>
  <!-- Grid system -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="jumbotron">
          <h1>CodeIgniter Web Framework Demo</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <p class="h3">Top 6 Newest Articles </p>
        <div class="row">
          <?php foreach ($article_list as $article): ?>
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <div class="caption">
                  <a href="<?=base_url('articles/view') . '/' . $article['articleId']?>">
                    <h4><?=html_escape($article['title'])?></h4>
                  </a>
                  <h5>Category: <?=html_escape($article['categoryName'])?></h5>
                  <p>Posted: <?=nice_date($article['modifiedDate'], 'm/d/Y') ?></p>
                  <div>
                      <?=word_limiter(strip_tags($article['content']), 20, '...') ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div> <!-- smaller row insize a 8 column grids -->

      </div> <!-- Scale to use 8 columns center in the middle -->
    </div> <!-- Grid row system -->
  </div> <!-- Fluid Container -->

</main>
