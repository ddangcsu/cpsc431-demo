<main>
  <!-- Grid system -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-10 col-md-offset-1">
        <h3 class="text-center"><?= $formTitle ?></h3>

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <!-- PHP to add automatic form action and CRFS protection if enabled in config.php -->
        <form method="POST" action="<?=base_url($formAction)?>">
          <div class="form-group">
            <label for="name">Tag Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?=set_value('name',$name)?>">
          </div>
          <div class="form-group">
            <input type="hidden" name="tagId" value="<?=set_value('tagId', $tagId) ?>">
            <input type="hidden" name="formTitle" value="<?=set_value('formTitle', $formTitle) ?>">
            <input type="hidden" name="formAction" value="<?=set_value('formAction', $formAction) ?>">
            <input type="hidden" name="csrf_formHash" value="<?=$this->security->get_csrf_hash() ?>">
          </div>
          <div class="form-group">
            <input class="btn btn-primary" type="submit" name="formSubmit" value="<?= $formSubmit ?>">
            <a class="btn btn-danger" href="<?=base_url("tags")?>">Cancel</a>
          </div>
        </form>

      </div> <!-- Scale to use 8 columns center in the middle -->
    </div> <!-- Grid row system -->
  </div> <!-- Fluid Container -->

</main>
