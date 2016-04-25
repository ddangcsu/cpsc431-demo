<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url("lib/bootstrap/css/bootstrap.united.min.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?=base_url("css/prism.css")?>" type="text/css">
    <link rel="stylesheet" href="<?=base_url("css/style.css") ?>" type="text/css">

    <title>PHP CodeIgniter Framework</title>
  </head>
  <body>
    <header>
      <nav class="navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <!-- Button to open the collapsed navbar item -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#demoNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">
              CodeIgniter Demo
            </span>
          </div> <!-- Navigation bar Header -->
          <!-- Unimplemented feature
          <?php echo form_open('',array('class'=>'navbar-form navbar-left')); ?>
            <div class="form-group">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-default">
                     <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
              </div>
            </div>
          </form>
          -->
          <div class="collapse navbar-collapse" id="demoNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li id="navHome"><a href="<?=base_url("/") ?>">
                <span class="glyphicon glyphicon-home"></span>
                Home</a>
              </li>
              <!--
              <li id="navTags"><a href="<?=base_url("tags") ?>"><span class="glyphicon glyphicon-tags"></span> Tags</a></li>
              -->
              <li id="navCategories"><a href="<?=base_url("categories") ?>" ><span class="glyphicon glyphicon-bookmark"></span> Categories</a></li>
              <li id="navArticles"><a href="<?=base_url("articles") ?>"><span class="glyphicon glyphicon-file"></span>Articles</a></li>
              <li>&nbsp;&nbsp;&nbsp;</li>
            </ul> <!-- Navigation bar right -->
          </div>
        </div> <!-- Container Fluid -->
      </nav> <!-- Navigation bar -->
    </header>
