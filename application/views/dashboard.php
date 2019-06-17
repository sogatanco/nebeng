<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Nebeng-Admin | Dashboard</title>
    <link href="<?php echo base_url()?>asset/css/dashboard.css" rel="stylesheet">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALisurDb7RVJUKs2Es67Tw2jQL55LoClw"></script>
  <?php $this->load->view('src') ?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  
</head>

<body>
<div class="page-wrapper chiller-theme toggled">

<?php $this->load->view('sidebar') ?>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h4>Dashboard</h4>
      <hr>
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fas fa-car"></i>
        <span class="count-numbers" id="jmobil">0</span>
        <span class="count-name">Bengkel</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fas fa-motorcycle"></i>
        <span class="count-numbers" id="jmotor">0</span>
        <span class="count-name">Bengkel</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fas fa-history"></i>
        <span class="count-numbers junapprove">0</span>
        <span class="count-name">Unapproved</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fas fa-users"></i>
        <span class="count-numbers" id="juser">0</span>
        <span class="count-name">Users</span>
      </div>
    </div>
  </div>

  <div class="row baris2">
    <div class="col-md-8">
        <div class="card-counter">
          <h5 class="text-muted judul">Detail on Map</h5>
          <br>
          <!-- showing Google Map -->
          <div id="map"></div>
        </div>
    </div>
    <div class="col-md-4">
      <div class="card-counter">
        <h5 class="text-muted judul">Popular Location</h5>
        <br>
        <div id="popular">
          <!-- popolar list here -->
        </div>
      <small>sort by rating</small>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="card-counter baris2">
        <h5 class="text-muted judul">Detail on chart</h5>
      
        <canvas id="canvas" height="100px"></canvas>
        <small>number of bengkel added per month</small>
      </div>
    </div>
  </div>
    </div>
  </main>
  <!-- page-content" -->
</div>
<script src="<?php echo base_url()?>asset/js/dashboard.js" ></script>
</body>

</html>