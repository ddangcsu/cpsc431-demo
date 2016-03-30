<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url("lib/bootstrap/css/bootstrap-theme.min.css")?>" type="text/css">
    <link rel="stylesheet" href="<?=base_url("lib/bootstrap/css/bootstrap-cerulean.min.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?=base_url("css/style.css") ?>" type="text/css">

    <title>PHP CodeIgniter Framework</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <span class="navbar-brand">
              CodeIgniter Demo
            </span>
          </div> <!-- Navigation bar Header -->

          <ul class="nav navbar-nav">
            <li><a href="<?=base_url("/") ?>" class="btn">
              <span class="glyphicon glyphicon-home"></span>
              Home</a>
            </li>
            <li><a class="btn" href="<?=base_url("categories") ?>" >Categories</a></li>
            <li><a class="btn" href="<?=base_url("articles") ?>">Articles</a></li>
          </ul> <!-- Navigation bar right -->
        </div> <!-- Container Fluid -->
      </nav> <!-- Navigation bar -->
    </header>
