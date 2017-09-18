<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php	$this->load->view('admin/includes/header');	?>
<?php	$this->load->view('admin/includes/navbar');	?>
	<div class="content-wrapper py-3">
		<div class="container-fluid">
			<?php	$this->load->view('admin/includes/Breadcrumb');
			    echo form_open('', 'class="add_project input-append" id="add_project_form"');
                ?>
            <div class="container">
                <div class="row">
	                <?php if(!empty($this->session->flashdata('add_project_msg'))): ?>
                        <div class="success_msg" id="success_msg">
                            <p><?php echo $this->session->flashdata('add_project_msg'); ?></p>
                        </div>
                        <script>
                            setTimeout(function() {
                                $('#success_msg').fadeOut('fast');
                            }, 10000);
                        </script>
	                <?php endif; ?>

                    <?php if(!empty($this->session->flashdata('add_project_err_msg'))): ?>
                        <script>
                            setTimeout(function() {
                                $('#error_msg').fadeOut('fast');
                            }, 10000);
                        </script>
	                <?php endif; ?>
                    <div class="control-group col-md-12" id="fields">
                        <h3>Add New Project</h3>
                        <div class="controls" id="profs">
                            <form class="input-append">
                                <div class="section_div">
                                    <div>Project Name</div>
                                    <div class="project_div"><input type="text" name="pro_name" class="pro_name form-control" id="field1" value="<?php if(!empty($this->input->post( 'pro_name' ))){echo $this->input->post( 'pro_name' );} ?>" /></div>
                                    <div class="val_errors"><?php echo form_error('pro_name');?></div>
                                    <div class="val_errors" id="error_msg">
                                        <p><?php echo $this->session->flashdata('add_project_err_msg'); ?></p>
                                    </div>
                                </div>

                                <div class="section_div">
                                    <div>Request Method</div>
                                    <div class="project_div"><input type="text" name="req_method" class="req_method form-control" value="<?php if(!empty($this->input->post( 'req_method' ))){echo $this->input->post( 'req_method' );} ?>"/></div>
                                    <div class="val_errors"><?php echo form_error('req_method');?></div>
                                </div>

                                <div class="section_div">
                                    <div>Amount Received</div>
                                    <div class="project_div"><input type="text" name="amt_rec" class="amt_rec form-control" value="<?php if(!empty($this->input->post( 'amt_rec' ))){echo $this->input->post( 'amt_rec' );} ?>"/></div>
                                    <div class="val_errors"><?php echo form_error('amt_rec');?></div>
                                </div>

                                <div class="section_div">
                                    <div>Department</div>
                                    <div class="project_div"><input type="text" name="department" class="department form-control" value="<?php if(!empty($this->input->post( 'department' ))){echo $this->input->post( 'department' );} ?>"/></div>
                                    <div class="val_errors"><?php echo form_error('department');?></div>
                                </div>

                                <div class="section_div">
                                    <div><h3>Location</h3></div>
                                    <div class="col-md-12">
                                    <div class="state_city col-md-6">
                                        <div>State</div>
                                        <select class="form-control" name="state">
                                            <option class="form-control" value="Haryana">Haryana</option>
                                        </select>
                                        <div class="val_errors"><?php echo form_error('state');?></div>
                                    </div>
                                    <div class="state_city col-md-6">
                                        <div>District</div>
                                        <select class="form-control" name="city">

		                                    <?php print_r($districts);
		                                    foreach($districts as $key => $val){ ?>
			                                    <option <?php if($this->input->post( "city" ) == $val){echo "selected";}?> value="<?php echo $val; ?>" ><?php echo $val; ?></option>
		                                 <?php   }
		                                    ?>
                                        </select>
                                        <div class="val_errors"><?php echo form_error('city');?></div>
                                    </div>
                                    </div>
                                </div>
                                <div class="add_pro_div col-md-2">
                                    <input type="submit" name="add_new_project" value="Add Project" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                echo form_close();
            ?>
		</div>
	</div>
<?php $this->load->view('admin/includes/custom_js'); ?>
<?php $this->load->view('admin/includes/header'); ?>