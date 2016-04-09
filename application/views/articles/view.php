<main>
  <!-- Grid system -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <ol class="breadcrumb">
          <li>
            <span class="glyphicon glyphicon-home"></span>
            <a href="<?=base_url('main')?>">Home</a>
          </li>
          <?php foreach ($crumbs as $breadcrumb): ?>
            <?php if ($breadcrumb['articleCount'] > 0): ?>
            <li><a href="<?=base_url('categories/view') . '/' . $breadcrumb['categoryId']?>">
              <?=$breadcrumb['name']?></a>
            </li>
          <?php else: ?>
            <li><?=$breadcrumb['name']?></li>
          <?php endif; ?>
          <?php endforeach; ?>
          <li class="active"><?=$title?></li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <!-- List of articles in panel-->
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Article: <?=$title?></h3>
          </div>
          <div class="panel-body">
            <?=$content?>
          </div>
          <div class="panel-footer">
            <p>Last modified date: <?= nice_date($modifiedDate, 'm-d-Y') ?> </p>
          </div>
        </div>

      </div> <!-- Scale to use 8 columns center in the middle -->
    </div> <!-- Grid row system -->
  </div> <!-- Fluid Container -->

</main>
