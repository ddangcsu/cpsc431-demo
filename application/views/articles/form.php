<main>
  <!-- Grid system -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <h3 class="text-center"><?= $formTitle ?></h3>

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <!-- PHP to add automatic form action and CRFS protection if enabled in config.php -->
        <form method="POST" action="<?=base_url($formAction)?>">
          <div class="form-group">
            <label for="categoryId">Article Category</label>
            <select id="categoryId" class="form-control" name="categoryId">
              <?php foreach($categoryOptions as $option): ?>
                <option <?=($categoryId === $option['categoryId'])? "selected": "" ?> value="<?=$option['categoryId']?>">
                  <?= '&#9500;&#9472' . str_repeat('&#9472;&#9472;', $option['level']) . ' '. $option['name'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="title">Article Title</label>
            <input type="text" id="title" class="form-control" name="title" value="<?=set_value('title', $title)?>">
          </div>
          <div class="form-group">
            <label for="content">Article Content</label>
            <textarea class="form-control" id="content" name="content" rows="10"><?=set_value('content', $content) ?></textarea>
          </div>
          <div class="form-group">
            <input type="hidden" name="articleId" value="<?=set_value('articleId', $articleId) ?>">
            <input type="hidden" name="formTitle" value="<?=set_value('formTitle', $formTitle) ?>">
            <input type="hidden" name="formAction" value="<?=set_value('formAction', $formAction) ?>">
            <input type="hidden" name="csrf_formHash" value="<?=$this->security->get_csrf_hash() ?>">
          </div>
          <div class="form-group">
            <input class="btn btn-primary" type="submit" name="formSubmit" value="<?= $formSubmit ?>">
            <a class="btn btn-danger" href="<?=base_url("articles")?>">Cancel</a>
          </div>
        </form>

      </div> <!-- Scale to use 8 columns center in the middle -->
    </div> <!-- Grid row system -->
  </div> <!-- Fluid Container -->

</main>
