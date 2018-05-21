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

<!--<div class="container" style="background-color:gray">        
    <div class="row vertical-center-row">         
                <?php 
                /*
                echo $this->Form->create($users,['class'=>'bootstrap-admin-login-form']);
                echo $this->Flash->render();
                echo $this->Flash->render('auth');
                 * 
                 */
                ?> 
                <h4>Sign In</h4>
                <div class="input-group">
                    <?php //echo $this->Form->input('email', ['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','placeholder'=>'E-mail','required' =>true]);?>
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                </div>
                <br>                
                <div class="input-group">             
                    <?php //echo $this->Form->input('password',['templates' => ['inputContainer' => '{{content}}'],'type' => 'password','label' => false,'class'=>'form-control','placeholder'=>'Password','required' =>true]);?>
                    <span class="input-group-addon" id="basic-addon2"><i class="fa fa-lock"></i></span>
                </div>
                <div class="form-group">
                                                      
                </div>
                <input type="submit" class="btn btn-primary" value="Login"r>
          <?php //echo $this->Form->end();?>       
        </div>    
    </div>-->

<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="images/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <?php 
                echo $this->Form->create($users);
                $session = $this->request->session();
                ?>
                <?php if($session->check('Flash.flash')){?>
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
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember Me
                    </label>
                    <label class="pull-right">
                        <a href="#">Forgotten Password?</a>
                    </label>

                </div>
                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                <div class="social-login-content">
                    <div class="social-button">
                        <a href="<?php echo $fb_login;?>" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i><?php echo $fbuser;?>Sign in with facebook</a>

                        <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                    </div>
                </div>
                <div class="register-link m-t-15 text-center">
                    <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                </div>
               <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>
</div>
