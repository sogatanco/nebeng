<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo base_url()?>asset/css/bengkel.css" rel="stylesheet">
    <?php $this->load->view('src') ?>
    <title>Nebeng-Admin | Bengkel Motor </title>
</head>
<body>
<div class="page-wrapper chiller-theme toggled">
    <!-- load sidebar -->
    <?php $this->load->view('sidebar') ?>

    <main class="page-content">

        <div class="container">
            <h4>Bengkel Motor</h4>
            <hr>

            <div class="row">
                <div class="col-sm-4">
                    <div class="card-view">

                        <div class="row">
                            <div class="col-6">
                                <img src="http://cdn2.tstatic.net/tribunnews/foto/bank/images/tes-kepribadian-menggunakan-5-lima-gambar.jpg" class="gambar">
                            </div>
                            <div class="col-6 content">
                               <strong class="title">Jal Pro Speed</strong>
                                <small class="text-muted">
                                    <p><span class="badge badge-pill badge-warning notification junapprove" >3.5</span> 10 ulasan | Mobil</p>
                                    <p>The table below shows the Free Fonts ....</p>
                                </small> 
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>