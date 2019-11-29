<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li id="l_dashboard" class="">
                <a href="<?= base_url('product'); ?>">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
            
            <li id="l_order" class="">
                <a href="<?= base_url('product/view_orders'); ?>">
                    <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                    <span class="pcoded-mtext">Orders</span>
                </a>
            </li>

            <li id="l_product" class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-folder"></i></span>
                    <span class="pcoded-mtext">Product</span>
                </a>
                <ul class="pcoded-submenu">
                    <li id="l_brand" class=" ">
                        <a href="<?= base_url('product/view_brands'); ?>">
                            <span class="pcoded-mtext">Brands</span>
                        </a>
                    </li>
                    <li id="l_model" class=" ">
                        <a href="<?= base_url('product/view_models'); ?>">
                            <span class="pcoded-mtext">Model</span>
                        </a>
                    </li>
                    <li id="l_variant" class=" ">
                        <a href="<?= base_url('product/view_variants'); ?>">
                            <span class="pcoded-mtext">Variant</span>
                        </a>
                    </li>
                    <li id="l_mobile" class=" ">
                        <a href="<?= base_url('product/view_mobiles'); ?>">
                            <span class="pcoded-mtext">Mobile</span>
                        </a>
                    </li>
                </ul>
            </li>

            

            <li id="l_users" class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Users</span>
                </a>
                <ul class="pcoded-submenu">
                    <li id="l_view_user" class=" ">
                        <a href="<?= base_url('location/view_users'); ?>">
                            <span class="pcoded-mtext">View Users</span>
                        </a>
                    </li>

                </ul>
            </li>

            
            
            <li id="l_location" class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-map"></i></span>
                    <span class="pcoded-mtext">Location</span>
                </a>
                <ul class="pcoded-submenu">
                    <li id="l_state" class=" ">
                        <a href="<?= base_url('location/view_states'); ?>">
                            <span class="pcoded-mtext">State</span>
                        </a>
                    </li>
                    <li id="l_city" class=" ">
                        <a href="<?= base_url('location/view_cities'); ?>">
                            <span class="pcoded-mtext">City</span>
                        </a>
                    </li>

                    <li id="l_pincode" class=" ">
                        <a href="<?= base_url('location/view_pincodes'); ?>">
                            <span class="pcoded-mtext">Pincode</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li id="l_banner" class="">
                <a href="<?= base_url('product/view_banners'); ?>">
                    <span class="pcoded-micon"><i class="feather icon-image"></i></span>
                    <span class="pcoded-mtext">Banners</span>
                </a>
            </li>
            
            <li id="l_avail" class="">
                <a href="<?= base_url('product/unavailability'); ?>">
                    <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
                    <span class="pcoded-mtext">Unavailability</span>
                </a>
            </li>
        </ul>

    </div>
</nav>