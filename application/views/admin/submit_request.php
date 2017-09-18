<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('admin/includes/header');
	$this->load->view('admin/includes/navbar');
?>
	<div class="content-wrapper py-3" id="submit_req">
		<div class="container-fluid">
            <?php if(!empty($this->session->flashdata('pro_req_msg'))): ?>
                <div class="success_msg" id="success_msg">
                    <p><?php echo $this->session->flashdata('pro_req_msg'); ?></p>
                </div>
                <script>
                    setTimeout(function() {
                        $('#success_msg').fadeOut('fast');
                    }, 10000);
                </script>
            <?php endif; ?>

<?php
                echo form_open('', 'class="submit-request" id="submit-request"');
				echo'<fieldset>';
				// Project Info
				echo '<legend>Project Info</legend>';
				echo'<div class="submit_req_common">';
				echo form_label('Project Name');
				$options = array(
                                ''  => 'Select Project',
                                '1' => 'Project 1',
                                '2' => 'Project 2',
                                '3' => 'Project 3',
                            );
				echo form_dropdown('pro_name_info', $options, '','class="form-control sb_req_project_info"');
                echo '<div class="val_errors">'.form_error('pro_name_info').'</div>';
				echo'</div>';

				echo'<div class="submit_req_common">';
				echo form_label('Select Department');
				$options = array(
                                ''  => '',
                                '1' => 'Department 1',
                                '2' => 'Department 2',
                                '3' => 'Department 3',
                            );
				echo form_dropdown('pro_department_info', $options, '','class="form-control sb_req_dept"');
                echo '<div class="val_errors">'.form_error('pro_department_info').'</div>';
				echo'</div>';

				echo'<div class="submit_req_common">';
				echo form_label('Request Method');
				$options = array(
                                ''  => '',
                                '1' => 'By Letter',
                                '2' => 'By Email',
                            );
				echo form_dropdown('pro_req_method_info', $options, '','class="form-control sb_req_req_meth" id="pro_req_method_info"');
                echo '<div class="val_errors">'.form_error('pro_req_method_info').'</div>';
				echo'</div>';
				echo'</fieldset>';

				echo'<fieldset id="email_info_fieldset">';
				echo '<legend>Email Info</legend>';
				echo'<div class="submit_req_common">';
				echo form_label('Email Date');
				echo form_input(array('name' => 'pro_email_date', 'id' => 'em_date', 'value'  => '', 'class' => 'em_date form-control', 'readonly' => 'readonly'));
                echo '<div class="val_errors">'.form_error('pro_email_date').'</div>';
				echo'<div/>';

				echo'<div class="submit_req_common">';
				echo form_label('Concerned Person');
				echo form_input(array('name' => 'pro_email_from', 'id' => 'em_from_name', 'value' => '', 'class' => 'form-control'));
                echo '<div class="val_errors">'.form_error('pro_email_from').'</div>';
				echo'</div>';
				echo'</fieldset>';

				echo'<fieldset  id="letter_info_fieldset">';
				echo '<legend>Letter Info</legend>';
				echo'<div class="submit_req_common">';
				echo form_label('Letter No.');
				echo form_input(array('name' => 'pro_letter_no', 'id' => 'letter_no', 'value' => '', 'class' => 'form-control'));
                echo '<div class="val_errors">'.form_error('pro_letter_no').'</div>';
				echo'</div>';

				echo'<div class="submit_req_common">';
				echo form_label('Date');
				echo form_input(array('name' => 'pro_letter_date', 'id' => 'letter_date', 'value' => '', 'class' => 'form-control','readonly' => 'readonly'));
                echo '<div class="val_errors">'.form_error('pro_letter_date').'</div>';
				echo'</div>';

				echo'<div class="submit_req_common">';
				echo form_label('Received From');
				echo form_input(array('name' => 'pro_letter_from', 'id' => 'letter_from_name', 'value' => '', 'class' => 'form-control'));
                echo '<div class="val_errors">'.form_error('pro_letter_from').'</div>';
				echo'</div>';
				echo'</fieldset>';

				echo'<div class="submit_req_common text-center">';
				echo form_submit('submit', 'Save Request','class = "btn btn-primary"');
				echo'</div>';

				echo form_close();

?>
			</div>

	</div>
<?php $this->load->view('admin/includes/custom_js');?>
<?php $this->load->view('admin/includes/footer'); ?>