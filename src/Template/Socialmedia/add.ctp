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

<div class="col-lg-12">
    <?php 
    echo $this->Form->create($Socialmedia);
    $session = $this->request->session();
    ?>
    <div class="card">
        <div class="card-header"><strong>Social Media</strong><small> Form</small></div>
        <div class="card-body card-block">
            <?php if(!empty($error_msg)){?>
            <?php foreach ($error_msg as $error) {?>
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $error;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <?php } ?>
            <?php
            echo $this->Form->create($Socialmedia);
            $session = $this->request->session();
            echo "<div class='form-group'>";
            echo "<label for='select' class='form-control-label'>Select social media account</label>";
            echo $this->Form->select('socialmedia_type_id', $SocialmediaType, ['empty' => '--Choose One--', 'class' => 'form-control']);
            ?>           
            <br>
            <div class="form-group">
                <label for="app-id" class=" form-control-label">App-Id</label>
                <input type="text" id="app-id" name="app_id" placeholder="Enter your app-id" class="form-control">
            </div>
            <div class="form-group">
                <label for="vat" class=" form-control-label">App-Secret</label>
                <input type="text" id="vat" name="app_secret" placeholder="Enter your app-secret" class="form-control">
            </div>
            
        </div> 
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">
            <!--<i class="fa fa-dot-circle-o"/>-->
            Submit
            </button>
        </div>
        <?php echo $this->Form->end(); ?>
        </div>

