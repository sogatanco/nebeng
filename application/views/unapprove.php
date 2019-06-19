<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo base_url()?>asset/css/bengkel.css" rel="stylesheet">  
    <?php $this->load->view('src') ?>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALisurDb7RVJUKs2Es67Tw2jQL55LoClw"></script>
    <title>Nebeng-Admin | Unapprove Bengkel </title>
</head>
<body>
<div class="page-wrapper chiller-theme toggled">
    <!-- load sidebar -->
    <?php $this->load->view('sidebar') ?>

    <main class="page-content">
        <div class="container">

            <h4>Unapprove Bengkel</h4>
            <hr>

            <div class="row" id="content">
                <!-- data from js -->
            </div>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div id="map"></div>
        <!-- in Jquery -->
        <div id="detailbengkel">
            <div class="row">
                <div class="col-8">
                    <h3 id="judul" class="judul"></h3>
                    <p class="text-muted" id="attribute"></p>
                </div>
                <div class="col-4">
                    <div class="float-right">
                    <button type="button" class="btn btn-danger"><i class='fas fa-trash-alt'></i></button>
                    <button type="button" class="btn btn-success"><i class='fas fa-check-circle'></i></button>
                    </div>    
                </div>
            </div>
            
            <hr>
            <p class="text-justify" id="deskripsi"></p>
            <p class="text-justify" id="layanan"></p>
            <br>
            <h5 class="judul">Ulasan</h5>
                <hr>
            <div id="komentars">
                
            </div>
        </div>
      </div>
    </div>
  </div>


        </div>
    </main>

</div>
<script src="<?php echo base_url()?>asset/js/unapprove.js" ></script>
</body>
</html>