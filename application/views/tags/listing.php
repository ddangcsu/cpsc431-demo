<main>
  <!-- Grid system -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="item-group">
          <a class="btn btn-sm btn-primary pull-right" href="<?=base_url('tags/form')?>">
            <span class="glyphicon glyphicon-plus"></span>
            New Tags
          </a>
          <h3 class="text-center">Tags Listing</h3>
        </div>

        <!-- List of categories -->
        <div class="list-group">
          <?php foreach ($tag_list as $tag): ?>
            <div class="list-group-item">
              <!-- Create a button to allow delete category -->
              <?php if ($tag['articleCount'] < 1): ?>
                <a itemId="<?=$tag['tagId']?>"
                  class="itemDelete btn btn-sm btn-danger pull-right" data-toggle="tooltip"
                  data-placement="bottom" title="Delete Tag" href="">
                  <span class="glyphicon glyphicon-trash">
                </a>
                <!-- Create a spacer -->
                <span class="pull-right">&nbsp;&nbsp;</span>
              <?php endif; ?>
              <!-- Create a button to edit category will be place 2nd most right -->
              <a class="btn btn-sm btn-info pull-right"
                data-toggle="tooltip" data-placement="bottom" title="Edit Tag"
                href="<?=base_url('tags/form') . '/' . $tag['tagId']?>">
                <span class="glyphicon glyphicon-edit">
              </a>
              <!-- Heading of the item -->
              <h4 class="list-group-item-heading"><?=html_escape(strip_tags($tag['name']))?>
                (<?=html_escape($tag['articleCount'])?>)
              </h4>
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
        <form id="deleteForm" action="tags/delete" method="POST">
          <input id="itemId" type="hidden" name="tagId">
          <input type="hidden" name="csrf_formHash" value="<?=$this->security->get_csrf_hash() ?>">
        </form>
        <button type="button" class="btn btn-primary" id="delete">Delete</button>
        <button type="button" class="btn btn-danger" id="cancel">Cancel</button>
      </div>
    </div>
  </div>
</div>
