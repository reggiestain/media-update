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
<style>
section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#tabs{
	//background: #007b5e;
    color: #777;
}
#tabs h6.section-title{
    color: #777;
}

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #f3f3f3;
    ///background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 4px solid !important;
    font-size: 20px;
    font-weight: bold;
}
#tabs .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #777;
    font-size: 20px;
}    
</style>
<div class="col-md-12">
    <div class="alert-msg">
    <?php 
    echo $this->Flash->render();
    echo $this->Flash->render('auth');
    ?>
    </div>    
    
        <section id="tabs">
	<div class="container">
		<h6 class="section-title h1">Tabs</h6>
		<div class="row">
			<div class="col-xs-12 ">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
						<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
						<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>
					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
					</div>
					<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
						Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
					</div>
					<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
						Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
					</div>
				</div>
			
			</div>
		</div>
	</div>
</section>
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

