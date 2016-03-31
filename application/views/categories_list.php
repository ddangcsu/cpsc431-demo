<main>
  <!-- Grid system -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="item-group">
          <a class="btn btn-sm btn-primary pull-right" href="<?=base_url('categories/form')?>">
            <span class="glyphicon glyphicon-plus"></span>
            New
          </a>
          <h3 class="text-center">Categories Listing</h3>
        </div>

        <!-- List of categories -->
        <div class="list-group">
          <?php foreach ($category_list as $category): ?>
            <div class="list-group-item">
              <div class="tree-level-<?=$category['level']?>">
                <a class="btn btn-sm btn-danger pull-right" href="<?=base_url('categories/delete') . '/' . $category['categoryId']?>">
                  <span class="glyphicon glyphicon-trash">
                </a>
                <span class="pull-right">&nbsp;</span>
                <a class="btn btn-sm btn-info pull-right" href="<?=base_url('categories/form') . '/' . $category['categoryId']?>">
                  <span class="glyphicon glyphicon-edit">
                </a>
                <h4 class="list-group-item-heading"><?=$category['name'] ?></h4>
                <p class="list-group-item-text"><?=$category['description'] ?></p>
              </div>
            </div> <!-- A list group item -->
          <?php endforeach; ?>
        </div> <!-- A list group of categories -->
      </div> <!-- Scale to use 8 columns center in the middle -->
    </div> <!-- Grid row system -->
  </div> <!-- Fluid Container -->

</main>
