<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com//polygon/adminty/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Oct 2019 07:38:21 GMT -->
<!-- Added by HTTrack --><!-- /Added by HTTrack -->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Sell My Cell</title>


    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="<?= base_url(); ?>upload/icons/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/files/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/files/assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/files/assets/icon/icofont/css/icofont.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/files/assets/css/style.css">
</head>
<body class="fix-menu">

<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
        </div>
    </div>
</div>

<section class="login-block">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <?php echo form_open('Auth/login','class="md-float-material form-material"'); ?>
                    <div class="text-center">
                        <img src="<?= base_url(); ?>upload/icons/logo.png" alt="logo.png" height="230" width="620">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">Sign In</h3>
                                    <?php if($this->session->flashdata('msg')): ?>
                                    <div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>x</button>
                                        <strong>Error! </strong> <?= $this->session->flashdata('msg'); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group form-primary">
                                <input type="text" name="username" class="form-control" required placeholder="Your Username">
                                <span class="form-bar"></span>
                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="password" class="form-control" required placeholder="Password">
                                <span class="form-bar"></span>
                            </div>

                            <div class="row m-t-30">
                                <div class="col-md-12"  style="margin-top: 20px; !important">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                </div>
                            </div>


                        </div>
                    </div>
                    <?php echo form_close(); ?>

            </div>

        </div>

    </div>

</section>




<script type="text/javascript" src="<?=base_url(); ?>assets/files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>assets/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>assets/files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>assets/files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?=base_url(); ?>assets/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script type="text/javascript" src="<?=base_url(); ?>assets/files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>assets/files/bower_components/modernizr/js/css-scrollbars.js"></script>

<script type="text/javascript" src="<?=base_url(); ?>assets/files/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>assets/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>assets/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>assets/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>assets/files/assets/js/common-pages.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="64b24c6172efb30af78ab642-text/javascript"></script>
<!--<script type="text/javascript">-->
<!--  window.dataLayer = window.dataLayer || [];-->
<!--  function gtag(){dataLayer.push(arguments);}-->
<!--  gtag('js', new Date());-->
<!---->
<!--  gtag('config', 'UA-23581568-13');-->
<!--</script>-->
<script src="<?=base_url(); ?>assets/files/rocket-loader.min.js" data-cf-settings="64b24c6172efb30af78ab642-|49" defer=""></script></body>

<!-- Mirrored from colorlib.com//polygon/adminty/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Oct 2019 07:38:21 GMT -->
</html>
