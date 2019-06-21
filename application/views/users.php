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
                
                    <div class="col-sm-4">
                        <div class="card-view">
                            <div class="row">
                                <div class="col-3 ">
                                    <img src="../../asset/images/logo.png" class="rounded-circle img-thumbnail float-right" id="profil">
                                </div>
                                <div class="col-7">
                                   <strong>Muhammad</strong><br>
                                   <small class="text-muted"><i class="fas fa-envelope"></i> wahyudi98.ww@gmail.com<br><i class='fas fa-phone-square'></i> 082285658594</small>
                                </div>
                                <div class="col-1"><i class="fas fa-trash-alt text-danger"></i></div>
                            </div>
                            <div class="row detail">
                                <div class="col-4 text-center text-muted pd">
                                    <small >Bengkel</small><br>
                                    <strong>004</strong>
                                </div>
                                <div class="col-4 text-center text-muted pd">
                                    <small >Join</small><br>
                                    <strong >3 M</strong>
                                </div>
                                <div class="col-4 text-center text-muted">
                                    <small >Gender</small><br>
                                    <strong>WOMAN</strong>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>

        </div>

    </main>

</div>
<script src="<?php echo base_url()?>asset/js/users.js" ></script>
</body>
</html>