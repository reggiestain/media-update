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

 <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Social Media Details</strong>
                        </div>
                  <div class="card-body">
                <?php $session = $this->request->session();?>
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
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>App ID</th>
                        <th>App Secret</th>                       
                        <th>Created</th>
                        <th>Modified</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($Socialmedia as $mediaInfo) {?>  
                      <tr>                                              
                        <td><?php echo $mediaInfo->id;?></td>
                        <td><?php echo $mediaInfo->app_id;?></td>
                        <td><?php echo $mediaInfo->app_id;?></td>
                        <td><?php echo $mediaInfo->app_secret;?></td>
                        <!--<td><?php //echo $mediaInfo->url;?></td>-->
                        <td><?php echo $mediaInfo->created;?></td>
                        <td><?php echo $mediaInfo->modified;?></td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm"><span class="fa fa-eye"></span></a>    
                            <a href="#" class="btn btn-primary btn-sm"><span class="fa fa-pencil"></span></a>
                            <a href="#" class="btn btn-danger btn-sm"><span class="fa fa-remove"></span></a>
                        </td>                       
                      </tr>   
                      <?php } ?>
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
