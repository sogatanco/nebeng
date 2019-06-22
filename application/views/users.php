<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo base_url()?>asset/css/users.css" rel="stylesheet">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALisurDb7RVJUKs2Es67Tw2jQL55LoClw"></script>
    <?php $this->load->view('src') ?>
    <title>Nebeng-Admin | Bengkel Mobil </title>
</head>
<body>
<div class="page-wrapper chiller-theme toggled">
    <!-- load sidebar -->
    <?php $this->load->view('sidebar') ?>

    <main class="page-content">

        <div class="container">
            <h4>Bengkel Mobil</h4>
            <hr>

            <div class="row" id="content">

            </div>

        </div>

    </main>

</div>
<script src="<?php echo base_url()?>asset/js/users.js" ></script>
</body>
</html>