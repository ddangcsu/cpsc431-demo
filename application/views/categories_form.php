<main>
  <!-- Grid system -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <h2><?=$formName ?></h2>
        <form action="<?=base_url($formAction) ?>" method="POST">
          <div class="form-group">
            <label for="parentId">Parent Category</label>
            <select class="form-control" id="parentId" name="parentId">
              <option <?=($parentId === 0)? "selected": "" ?> value="0">&nbsp;</option>
              <option <?=($parentId === 1)? "selected": "" ?> value="1">Parent 1</option>
              <option <?=($parentId === 2)? "selected": "" ?> value="2">Parent 2</option>
              <option <?=($parentId === 3)? "selected": "" ?> value="3">Parent 3</option>
              <option <?=($parentId === 4)? "selected": "" ?> value="4">Parent 4</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?=$name?>">
          </div>
          <div class="form-group">
            <label for="description">Category Description</label>
            <textarea id="description" class="form-control" name="description"><?=$description?></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="level" value="<?= $level ?>" hidden>
            <input type="text" name="categoryId" value="<?=$categoryId ?>" hidden>
          </div>
          <div class="form-group">
            <input type="submit" value="<?= $formName ?>">
          </div>
        </form>
      </div> <!-- Scale to use 8 columns center in the middle -->
    </div> <!-- Grid row system -->
  </div> <!-- Fluid Container -->

</main>
