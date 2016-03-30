<main>
  <!-- Grid system -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <h2>Notes Categories</h2>
        <div class="list-group">
          <?php foreach ($category_list as $category): ?>
            <div class="list-group-item">
              <a class="list-group-item-heading" href="<?=base_url("categories/getForm/" . $category['categoryId']) ?>">
                <span><?=$category['name'] ?></span>
              </a>
              <p class="list-group-item-text">
                <?=$category['description'] ?>
              </p>
              <?php if ( sizeof($category['child'] > 0) ): ?>
                <div class="list-group">
                  <?php foreach($category['child'] as $child): ?>
                    <div class="list-group-item">
                      <a class="list-group-itme-heading" href="<?=base_url("categories/getForm/" . $child['categoryId']) ?>">
                        <span><?=$child['name'] ?></span>
                      </a>
                      <p class="list-group-item-text">
                      </p>
                      <?=$child['description'] ?>
                    </div> <!-- Subcategory item -->
                  <?php endforeach; ?>
                </div> <!-- A Subcategory list -->
              <?php endif; ?>
            </div> <!-- One group Item -->
          <?php endforeach; ?>
        </div> <!-- A list group of categories -->
      </div> <!-- Scale to use 8 columns center in the middle -->
    </div> <!-- Grid row system -->
  </div> <!-- Fluid Container -->

</main>
