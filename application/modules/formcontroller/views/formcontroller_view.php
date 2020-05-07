<!DOCTYPE html>

<html>

<head>

    <title>Google Recaptcha Code in Codeigniter 3 - ItSolutionStuff.com</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>

  

<div class="container">

    <div class="card">

        <div class="card-header">

            Google Recaptcha Code in Codeigniter 3 - ItSolutionStuff.com

        </div>

        <div class="card-body">

            <form action="<?php echo base_url('formcontroller/formpost'); ?>" method="POST" enctype="multipart/form-data">

                <div class="text-danger"><strong><?=$this->session->flashdata('flashError')?></strong></div>

   

                <div class="form-group">

                    <label for="exampleInputEmail1">Username</label>

                    <input type="text" name="username" required="required" class="form-control">

                </div>

  

                <div class="form-group">

                    <label for="exampleInputPassword1">Password</label>

                    <input type="password" name="password" required="required" class="form-control">

                </div>

                    

                <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 

                <br/>

                <button class="btn btn-success">Login</button>

            </form>

        </div>

    </div>

</div>

  

</body> 

</html>