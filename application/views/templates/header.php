<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />  

        <title>Out source Television</title>

        <!--Favicon-->
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.png" />

        <!--Cascading Style Sheets-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/tabs.css" />

        <!--Javascript Library and Plugins-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.innerfade.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.innerfade.config.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/elementHeight.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/equalizer.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tabs.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tabs.config.js"></script>
    </head>

    <body>
        <div class="page">


            <header class="header-wrapper wide">
                <div class="header-inner">

                    <div class="branding">
                        <div class="logo">
                            <a href="<?php echo base_url(); ?>">
                                <img src="<?php echo base_url(); ?>assets/images/logo.png">
                            </a>
                        </div><!-- /logo -->
                    </div><!-- /branding -->

                    <nav class="navigation">
                        <ul>
                            <li class="headlink page-home"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="headlink page-jobs"><a href="<?php echo base_url(); ?>index.php/jobs">Jobs</a></li>
                            <li class="headlink page-services">
                                <a href="<?php echo base_url(); ?>index.php/services">Service Directory</a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo base_url(); ?>index.php/services/camera-crew">Camera Crew</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/services/equipment-hire">Equipment Hire</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/services/outside-broadcast-facility">Outside Broadcast Facility</a></li>
                                </ul>
                            </li>
                            <li class="headlink page-equipment"><a href="<?php echo base_url(); ?>index.php/equipment">Equipment</a></li>
                            <li class="headlink page-about"><a href="<?php echo base_url(); ?>index.php/about">About Us</a></li>
                            <li class="headlink page-contact"><a href="<?php echo base_url(); ?>index.php/contact">Contact us</a></li>


                            <?php //if (isset($user_pages) && $user_pages == 'logged_in') { ?>
                            <li class="headlink page-user">
                                <a href="<?php echo base_url(); ?>index.php/user">My Profile</a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo base_url(); ?>index.php/user/add-service">Create Service</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/user/add-job">Create Job</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/user/add-item">Add Item</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/login">Log Out</a></li>
                                </ul>
                            </li>
                            <?php //} ?>


                        </ul>
                        <ul class="account-links">
                            <li class="headlink page-login"><a class="button" href="<?php echo base_url(); ?>index.php/user/userlogin">Login</a></li>
                            <li class="headlink page-register"><a class="button" href="<?php echo base_url(); ?>index.php/home/register">Register</a></li>
                        </ul>
                    </nav><!-- /navigation -->

                </div><!-- /header-inner -->
            </header><!-- /header -->		

