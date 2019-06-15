<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo base_url()?>asset/css/login.css" rel="stylesheet">
    <?php $this->load->view('src') ?>
    <title>Nebeng-Admin | Login Page</title>
    
</head>
<body>

    <div class="row">
        <div class="col-md-6 d-none d-sm-block kiri">
            <img src="../asset/images/logo.png" class="mx-auto d-block rounded img-fluid" alt="Cinque Terre">
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="row kanan">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <h2 class="text-center title">NEBENG</h2>
                    <p class="subtitle text-secondary text-center">Welcome back! Please login to your account.</p>
                    <form action="">
                        <fieldset class="formRow">
                            <div class="formRow--item">
                                <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
                                    <input type="text" class="formRow--input js-input" id="username" placeholder="Username">
                                </label>
                            </div>
                        </fieldset>
                        <fieldset class="formRow">
                            <div class="formRow--item">
                                <label for="password" class="formRow--input-wrapper js-inputWrapper">
                                    <input type="password" class="formRow--input js-input" id="password" placeholder="Password">
                                </label>
                            </div>
                        </fieldset>
                        <fieldset class="formRow ">
                            <div class="formRow--item">
                                <div class="row tombol">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-secondary btn-block" id="tombol">Login </button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                     </form>

                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url()?>asset/js/login.js" ></script>
</body>
</html>