<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <a href="<?= base_url('product'); ?>">
                <img class="img-fluid" src="<?= base_url(); ?>upload/icons/admin-side-bar.png" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>

        <audio id="myAudio">
            <source src="<?= base_url('upload/sound/'); ?>eventually2.ogg" type="audio/ogg">
        </audio>

        <div class="navbar-container container-fluid">

            <ul class="nav-right">
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-bell"></i>
                            <span class="badge bg-c-pink new_order"></span>
                        </div>
                        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <h6>Notifications</h6>
                                <label class="label label-danger">New</label>
                            </li>
                            <li>
                                <a href="<?= base_url('product');?>">
                                <div class="media">
<!--                                    <img class="d-flex align-self-center img-radius" src="--><?//= base_url(); ?><!--assets/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">-->
                                    <div class="media-body">

                                        <p class="notification-msg"><span class="new_order"></span> New Orders</p>

                                    </div>

                                 </div>
                                </a>

                            </li>

                        </ul>
                    </div>
                </li>

                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= base_url(); ?>upload/icons/admin.jpg" class="img-radius" alt="User-Profile-Image">
                            <span>Admin</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
<!--                            <li>-->
<!--                                <a href="">-->
<!--                                    <i class="feather icon-settings"></i> Settings-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="">-->
<!--                                    <i class="feather icon-user"></i> Profile-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="">-->
<!--                                    <i class="feather icon-mail"></i> My Messages-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="">-->
<!--                                    <i class="feather icon-lock"></i> Lock Screen-->
<!--                                </a>-->
<!--                            </li>-->
                            <li>
                                <a href="<?= base_url('Auth/logout');?>">
                                    <i class="feather icon-log-out"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    $(document).ready(function(){



        fetch_notification();

        function fetch_notification(){
            $.ajax({
                url:"<?php echo base_url('product/fetch_notification'); ?>",
                // data: {id:id},
                // method:"POST",
                dataType:"json",
                success: function (data) {

                    $('.new_order').text(data.total_order);

                    if(data.total_order !== 0){
                        play_sound();
                    }

                },
                complete: function()
                {
                    // Schedule the next request when the current one's complete
                    setTimeout(fetch_notification, 10000);
                }
            });
        }
    });

    function play_sound(){
        var x = document.getElementById("myAudio");

        x.play();


    }



</script>