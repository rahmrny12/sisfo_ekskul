<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url('assets/images/icon/') ?>logo_sisfo_ekskul.ico" type="image/ico" />

  <title><?= $title ?></title>

  <!-- Bootstrap -->
  <link href="<?= base_url('vendor/gentelella/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('vendor/gentelella/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('vendor/gentelella/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?= base_url('vendor/gentelella/') ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?= base_url('vendor/gentelella/') ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?= base_url('vendor/gentelella/') ?>vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?= base_url('vendor/gentelella/') ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?= base_url('vendor/gentelella/') ?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?= base_url('siswa/dashboard') ?>" class="site_title">
              <img src="<?= base_url('assets/images/icon/logo_sisfo_ekskul.png') ?>" alt="logo_sisfo_ekskul.png" style="max-width: 40px;">
              <span class="ml-2">Sisfo Ekskul</span></a>
          </div>

          <div class="clearfix"></div>

          <?php $this->load->view('template-admin/sidebar') ?>
          <?php $this->load->view('template-admin/topbar') ?>

          <!-- page content -->
          <div class="right_col" role="main">