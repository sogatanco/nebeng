<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Nebeng-Admin | Dashboard</title>
    <link href="<?php echo base_url()?>asset/css/dashboard.css" rel="stylesheet">
	<?php $this->load->view('src') ?>
  

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
        <span class="count-numbers">12</span>
        <span class="count-name">Bengkel</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fas fa-motorcycle"></i>
        <span class="count-numbers">12</span>
        <span class="count-name">Bengkel</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fas fa-history"></i>
        <span class="count-numbers">12</span>
        <span class="count-name">Unapproved</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fas fa-users"></i>
        <span class="count-numbers">35</span>
        <span class="count-name">Users</span>
      </div>
    </div>
  </div>
    </div>

  </main>
  <!-- page-content" -->
</div>
    
</body>

</html>