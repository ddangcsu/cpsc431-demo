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
            <input type="hidden" name="categoryId" value="<?=set_value('categoryId', $categoryId) ?>">
            <input type="hidden" name="formTitle" value="<?=set_value('formTitle', $formTitle) ?>">
            <input type="hidden" name="formAction" value="<?=set_value('formAction', $formAction) ?>">
            <input type="hidden" name="csrf_formHash" value="<?=$this->security->get_csrf_hash() ?>">
          </div>
          <div class="form-group">
            <input class="btn btn-primary" type="submit" name="formSubmit" value="<?= $formSubmit ?>">
            <a class="btn btn-warning" href="<?=base_url("categories")?>">Cancel</a>
          </div>
        </form>

      </div> <!-- Scale to use 8 columns center in the middle -->
    </div> <!-- Grid row system -->
  </div> <!-- Fluid Container -->

</main>
