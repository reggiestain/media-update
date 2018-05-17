<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <!--<div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>-->
    </div>
</div>

<div class="content mt-3">
            
    <div class="col-sm-12">
                <?php 
                $session = $this->request->session();
                if($session->check('Flash.flash')){
                ?>
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <?php
                   echo $this->Flash->render();
                   echo $this->Flash->render('auth');
                   ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>
    </div>


    <!--<div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Members online</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>

        </div>
    </div>-->
    <!--/.col-->

   <!-- <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Members online</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                </div>

            </div>
        </div>
    </div>-->
    <!--/.col-->

    <!--<div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Members online</p>

            </div>

            <div class="chart-wrapper px-0" style="height:70px;" height="70">
                <canvas id="widgetChart3"></canvas>
            </div>
        </div>
    </div>-->
    <!--/.col-->

    <!--<div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Members online</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>

            </div>
        </div>
    </div>--.
    <!--/.col-->
    <div class="row-fluid">
    <div class="col-lg-3 col-md-6">
        <div class="social-box facebook">
            <i class="fa fa-facebook"></i>
            <ul>
                <li>
                    <strong><span class="count">40</span> k</strong>
                    <span>friends</span>
                </li>
                <li>
                    <strong><span class="count">450</span></strong>
                    <span>feeds</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><!--/.col-->


    <div class="col-lg-3 col-md-6">
        <div class="social-box twitter">
            <i class="fa fa-twitter"></i>
            <ul>
                <li>
                    <strong><span class="count">30</span> k</strong>
                    <span>friends</span>
                </li>
                <li>
                    <strong><span class="count">450</span></strong>
                    <span>tweets</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><!--/.col-->


    <div class="col-lg-3 col-md-6">
        <div class="social-box linkedin">
            <i class="fa fa-linkedin"></i>
            <ul>
                <li>
                    <strong><span class="count">40</span> +</strong>
                    <span>contacts</span>
                </li>
                <li>
                    <strong><span class="count">250</span></strong>
                    <span>feeds</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><!--/.col-->


    <div class="col-lg-3 col-md-6">
        <div class="social-box google-plus">
            <i class="fa fa-google-plus"></i>
            <ul>
                <li>
                    <strong><span class="count">94</span> k</strong>
                    <span>followers</span>
                </li>
                <li>
                    <strong><span class="count">92</span></strong>
                    <span>circles</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><!--/.col-->
    </div>
    <div class="row-fluid">
    <div class="col-md-4">
                        <section class="card">
                            <div class="twt-feed blue-bg">
                                <div class="corner-ribon black-ribon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <div class="fa fa-twitter wtt-mark"></div>

                                <div class="media">
                                    <a href="#">
                                        <?php echo $this->Html->image('admin.jpg', array('alt' => 'User Avatar','class'=>'align-self-center rounded-circle mr-3','style'=>'width:85px; height:85px')); ?>                                      
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-white display-6">Jim Doe</h2>
                                        <p class="text-light">Project Manager</p>
                                    </div>
                                </div>



                            </div>
                            <div class="weather-category twt-category">
                                <ul>
                                    <li class="active">
                                        <h5>750</h5>
                                        Tweets
                                    </li>
                                    <li>
                                        <h5>865</h5>
                                        Following
                                    </li>
                                    <li>
                                        <h5>3645</h5>
                                        Followers
                                    </li>
                                </ul>
                            </div>
                            <div class="twt-write col-sm-12">
                                <textarea placeholder="Write your Tweet and Enter" rows="1" class="form-control t-text-area"></textarea>
                            </div>
                            <footer class="twt-footer">
                                <a href="#"><i class="fa fa-camera"></i></a>
                                <a href="#"><i class="fa fa-map-marker"></i></a>
                                New Castle, UK
                                <span class="pull-right">
                                    32
                                </span>
                            </footer>
                        </section>
                    </div>
    </div>
</div> <!-- .content -->

<script>
    $(document).ready(function () {

        $('#example').DataTable();
        $('#date').datepicker();
        $("#add-person").click(function () {
            $("#addModal").modal();
        });

        $(document).on('submit', '#register', function (event) {
            event.preventDefault();
            var formData = $("#register").serialize();
            var url = $("#register").attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data === '200') {
                        $("#addModal").modal('toggle');
                        $(".reg-alert").html('');
                        $(".alert-msg").html("<div class='alert alert-success'><strong>Success! </strong>Person Info was successfully created.</div>");
                        location.reload();
                    } else {
                        $(".reg-alert").html(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });

        $(".view").click(function () {
            var Id = $(this).attr("var");
            $("#viewModal").modal();
            $.ajax({
                url: "<?php echo \Cake\Routing\Router::Url('/users/view/');?>" + Id,
                type: "POST",
                asyn: true,
                beforeSend: function () {
                    $("#personInfo").html('loading.......');
                },
                success: function (data) {
                    $("#personInfo").html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

        $(".update").click(function () {
            var Id = $(this).attr("var");
            $("#viewModal").modal();
            $.ajax({
                url: "<?php echo \Cake\Routing\Router::Url('/users/edit/');?>" + Id,
                type: "POST",
                asyn: true,
                beforeSend: function () {
                    $("#personInfo").html('loading.......');
                },
                success: function (data) {
                    $("#personInfo").html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

        $(document).on('submit', '#update', function (event) {
            event.preventDefault();
            var formData = $("#update").serialize();
            var url = $("#update").attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data === '200') {
                        $("#viewModal").modal('toggle');
                        $(".reg-alert").html('');
                        $(".alert-msg").html("<div class='alert alert-success'><strong>Success! </strong>Person Info has been updated successfully.</div>");
                        location.reload();
                    } else {
                        $(".reg-alert").html(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });

    });
    
    window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{latest-api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
   FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
});
</script>    



