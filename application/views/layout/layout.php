<!DOCTYPE html>
<html lang="en">

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

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/files/googlefont.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/files/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/files/assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/files/assets/icon/icofont/css/icofont.css">


    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/files/assets/pages/j-pro/css/demo.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/files/assets/pages/j-pro/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/files/assets/pages/j-pro/css/j-pro-modern.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/files/assets/icon/feather/css/feather.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/files/assets/css/style.css">

    <link rel="stylesheet" href="<?= base_url();?>assets/files/datatables/media/css/dataTables.bootstrap4.css">
    
    <script type="text/javascript" src="<?= base_url(); ?>assets/files/bower_components/jquery/js/jquery.min.js"></script>

    <script type="text/javascript" src="<?= base_url(); ?>assets/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>

    <script src="<?= base_url();?>assets/files/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>assets/files/datatables/media/js/multiSelect.min.js"></script>

    <script src="<?= base_url();?>assets/files/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>










</head>
<body>


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


<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <?php include('navbar.php'); ?>



        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <?php include('sidebar.php'); ?>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <?php $this->load->view($view); ?>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="<?= base_url(); ?>assets/files/bower_components/popper.js/js/popper.min.js"></script>

<script type="text/javascript" src="<?= base_url(); ?>assets/files/bower_components/bootstrap/js/bootstrap.min.js"></script>


<script src="<?= base_url(); ?>assets/files/assets/js/pcoded.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?= base_url(); ?>assets/files/sweetalert/sweetalert.js"></script>




<script src="<?= base_url(); ?>assets/files/assets/js/vartical-layout.min.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="--><?//= base_url(); ?><!--assets/files/assets/pages/dashboard/custom-dashboard.js"></script>-->
<script type="text/javascript" src="<?= base_url(); ?>assets/files/assets/js/script.min.js"></script>


<script type="text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="<?= base_url(); ?>assets/files/rocket-loader.min.js" data-cf-settings="795bb37b691a5eff6b96fc05-|49" defer=""></script>
<script data-cfasync="false" src="<?= base_url(); ?>assets/files/email-decode.min.js"></script>



</body>

</html>
