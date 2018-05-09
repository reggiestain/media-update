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
<!-- content -->
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header bootstrap-admin-content-title">
            </div>
        </div>
    </div>
    <div class="alert-msg">
    <?php 
    echo $this->Flash->render();
    echo $this->Flash->render('auth');
    ?>
    </div>    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title">Persons List <a class="btn btn-xs btn-success pull-right" id="add-person"><i class="fa fa-pencil"></i> Add</a></div>
                </div>
                <div class="bootstrap-admin-panel-content table-responsive">
                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Surname</th>
                                <th>Mobile</th> 
                                <th>Email</th>
                                <th>Contact Type</th>                                
                                <th>Date Of Birth</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Profile as $Info) :?>    
                            <tr>
                                <td><?php echo $Info->id;?></td>    
                                <td><?php echo '<a href="#">'.$Info->firstname.'</a>';?></td>
                                <td><?php echo $Info->surname;?></td>
                                <td><?php echo $Info->mobile;?></td>
                                <td><?php echo $Info->email;?></td>
                                <td><?php echo $Info->contact_type->name;?></td>
                                <td><?php echo $Info->date_of_birth;?></td>                          
                                <td><?php echo $Info->created;?></td>
                                <td>
                                    <a href="#" class="btn btn-default btn-xs view" var="<?php echo $Info->id;?>">View</a>                          
                                    <a href="#" class="btn btn-primary btn-xs update" var="<?php echo $Info->id;?>">Update</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reply Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Contact Information</h3>
            </div>
                <?php 
                echo $this->Form->create($profile,['url' => ['action' => 'add'],'id'=>'register']);
                ?>    
            <div class="modal-body">
                <h5 style="color:green">
                    Please complete the form below to save contact Information.    
                </h5>
                <div class="reg-alert">

                </div>
                <div class="form-group">
                    <label>Enter your first name</label>          
                            <?php echo $this->Form->input('firstname',['type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                </div>
                <div class="form-group">
                    <label>Enter your surname</label>          
                            <?php echo $this->Form->input('surname',['type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                </div>
                <div class="form-group">
                    <label>Enter your mobile number</label>          
                            <?php echo $this->Form->input('mobile',['type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                </div>
                <div class="form-group">
                    <label>Enter your email address</label>          
                            <?php echo $this->Form->input('email',['type' => 'email','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                </div>
                <div class="form-group">
                    <label>Select contact type</label>    
                        <?php echo $this->Form->select('contact_type_id', $contactType, ['empty' => '--Choose One--','class'=>'form-control','label'=>false,'required'=>false, 'error' => true]);?>
                </div> 
                <div>
                    <label>Date of birth</label>   
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>                                
                            <?php echo $this->Form->input('date_of_birth',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control datepicker','id'=>'date','required'=>false, 'error' => true]);?>
                    </div>
                        <?php echo $this->Form->input('user_id',['type' => 'hidden','value'=>$id]);?>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
                <?php echo $this->Form->end();?>   
        </div>
    </div>  
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Contact Details</h4>
            </div>
            <!--<form id="add-unit" action="<?php //echo \Cake\Routing\Router::Url('/users/signup');?>">-->
           <?php //echo $this->Form->create($compliant,['url' => ['action' => 'compliant_reply']]);?>
            <div class="modal-body"> 
                <div id="personInfo">

                </div>

            </div>
            </form>        
        </div>
    </div>  
</div>
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
                url: "<?php echo \Cake\Routing\Router::Url('/users/view/');?>" +Id,
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
                url: "<?php echo \Cake\Routing\Router::Url('/users/edit/');?>" +Id,
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
</script>    

