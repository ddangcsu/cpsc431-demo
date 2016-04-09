<main>
  <!-- Grid system -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="item-group">
          <a class="btn btn-sm btn-primary pull-right" href="<?=base_url('articles/form')?>">
            <span class="glyphicon glyphicon-plus"></span>
            New Article
          </a>
          <h3 class="text-center">Articles Listing</h3>
        </div>

        <!-- List of articles -->
        <div class="list-group">
          <?php foreach ($article_list as $article): ?>
            <div class="list-group-item">
              <!-- Create a button to allow delete category -->
              <a itemId="<?=$article['articleId']?>"
                class="itemDelete btn btn-sm btn-danger pull-right" data-toggle="tooltip"
                data-placement="bottom" title="Delete Article" href="">
                <span class="glyphicon glyphicon-trash">
              </a>
              <!-- Create a spacer -->
              <span class="pull-right">&nbsp;&nbsp;</span>
              <!-- Create a button to edit category will be place 2nd most right -->
              <a class="btn btn-sm btn-info pull-right"
                data-toggle="tooltip" data-placement="bottom" title="Edit Article"
                href="<?=base_url('articles/form') . '/' . $article['articleId']?>">
                <span class="glyphicon glyphicon-edit">
              </a>
              <!-- Heading of the item -->
                <a href="<?=base_url('articles/view') . '/' . $article['articleId']?>">
                  <h4 class="list-group-item-heading"><?=html_escape($article['title'])?></h4>
                </a>
                <h5 class="list-group-item-heading">Category: <?=html_escape($article['categoryName'])?></h5>
                <!-- Item content text -->
                <p class="list-group-item-text">Posted: <?=nice_date($article['createdDate'], 'm/d/Y') ?></p>
                <p class="list-group-item-text"><?=word_limiter(strip_tags($article['content']), 20, '...') ?></p>

            </div> <!-- A list group item -->
          <?php endforeach; ?>
        </div> <!-- A list group of articles -->
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
        <form id="deleteForm" action="articles/delete" method="POST">
          <input id="itemId" type="hidden" name="articleId">
          <input type="hidden" name="csrf_formHash" value="<?=$this->security->get_csrf_hash() ?>">
        </form>
        <button type="button" class="btn btn-primary" id="delete">Delete</button>
        <button type="button" class="btn btn-danger" id="cancel">Cancel</button>
      </div>
    </div>
  </div>
</div>
