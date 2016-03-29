<main>
  <!-- Grid system -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <h2>Notes Categories</h2>
        <?php foreach ($category_list as $category): ?>
          <div class="list-group-item">
            <a class="list-group-item-heading" href="google.com">
              <span><?=$category['title'] ?></span>
            </a>
            <p class="list-group-item-text">
              <?=$category['description'] ?>
            </p>
          </div>
        <?php endforeach; ?>
      </div> <!-- Scale to use 8 columns center in the middle -->
    </div> <!-- Grid row system -->
  </div> <!-- Fluid Container -->

</main>
