<main>
  <!-- Grid system -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="item-group">
          <a class="btn btn-sm btn-primary pull-right" href="<?=base_url('categories/form')?>">
            <span class="glyphicon glyphicon-plus"></span>
            New Category
          </a>
          <h3 class="text-center">Categories Listing</h3>
        </div>

        <!-- List of categories -->
        <div class="list-group">
          <?php foreach ($category_list as $category): ?>
            <div class="list-group-item">
              <div class="tree-level-<?=$category['level']?>">
                <!-- Create a button to allow delete category -->
                <?php if ($category['articleCount'] < 1): ?>
                  <a itemId="<?=$category['categoryId']?>"
                    class="itemDelete btn btn-sm btn-danger pull-right" data-toggle="tooltip"
                    data-placement="bottom" title="Delete Category" href="">
                    <span class="glyphicon glyphicon-trash">
                  </a>
                  <!-- Create a spacer -->
                  <span class="pull-right">&nbsp;&nbsp;</span>
                <?php endif; ?>
                <!-- Create a button to edit category will be place 2nd most right -->
                <a class="btn btn-sm btn-info pull-right"
                  data-toggle="tooltip" data-placement="bottom" title="Edit Category"
                  href="<?=base_url('categories/form') . '/' . $category['categoryId']?>">
                  <span class="glyphicon glyphicon-edit">
                </a>
                <!-- Heading of the item -->
                <?php if ($category['articleCount'] > 0): ?>
                  <a href="<?=base_url('categories/view') . '/' . $category['categoryId']?>">
                    <h4 class="list-group-item-heading"><?=html_escape(strip_tags($category['name']))?>
                      (<?=html_escape($category['articleCount'])?>)
                    </h4>
                  </a>
                <?php else: ?>
                  <h4 class="list-group-item-heading"><?=html_escape(strip_tags($category['name']))?></h4>
                <?php endif; ?>

                <!-- Item content text -->
                <p class="list-group-item-text"><?=html_escape(strip_tags($category['description'])) ?></p>
              </div>
            </div> <!-- A list group item -->
          <?php endforeach; ?>
        </div> <!-- A list group of categories -->
      </div> <!-- Scale to use 8 columns center in the middle -->
    </div> <!-- Grid row system -->
  </div> <!-- Fluid Container -->

</main>

<!-- Modal for delete confirmation  used in jquery -->
<div id="deleteConfirm" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="text-warning">Delete Confirmation</h3>
      </div>
      <div class="modal-body">
        <!-- Content goes here -->
      </div>
      <div class="modal-footer">
        <form id="deleteForm" action="categories/delete" method="POST">
          <input id="itemId" type="hidden" name="categoryId">
          <input type="hidden" name="csrf_formHash" value="<?=$this->security->get_csrf_hash() ?>">
        </form>
        <button type="button" class="btn btn-primary" id="delete">Delete</button>
        <button type="button" class="btn btn-danger" id="cancel">Cancel</button>
      </div>
    </div>
  </div>
</div>
