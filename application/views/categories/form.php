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
            <label for="parentId">Parent Category</label>
            <select class="form-control" id="parentId" name="parentId">
              <?php if (sizeof($parentOptions) === 0 ): ?>
                <option selected value="">Root Level</option>
              <?php else: ?>
                <option <?=is_null($parentId) ? "selected": "" ?> value="">Root Level</option>
                <?php foreach($parentOptions as $option): ?>
                  <option <?=($parentId === $option['categoryId'])? "selected": "" ?> value="<?=$option['categoryId']?>">
                    <?= '&#9500;&#9472' . str_repeat('&#9472;&#9472;', $option['level']) . ' '. $option['name'] ?>
                  </option>
                <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?=set_value('name',$name)?>">
          </div>
          <div class="form-group">
            <label for="description">Category Description</label>
            <textarea id="description" class="form-control" name="description" rows="5"><?=set_value('description', $description)?></textarea>
          </div>
          <div class="form-group">
            <input type="hidden" name="categoryId" value="<?=set_value('categoryId', $categoryId) ?>">
            <input type="hidden" name="formTitle" value="<?=set_value('formTitle', $formTitle) ?>">
            <input type="hidden" name="formAction" value="<?=set_value('formAction', $formAction) ?>">
            <input type="hidden" name="csrf_formHash" value="<?=$this->security->get_csrf_hash() ?>">
          </div>
          <div class="form-group">
            <input class="btn btn-primary" type="submit" name="formSubmit" value="<?= $formSubmit ?>">
            <a class="btn btn-danger" href="<?=base_url("categories")?>">Cancel</a>
          </div>
        </form>

      </div> <!-- Scale to use 8 columns center in the middle -->
    </div> <!-- Grid row system -->
  </div> <!-- Fluid Container -->

</main>
