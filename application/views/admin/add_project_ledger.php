<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php	$this->load->view('admin/includes/header');	?>
<?php	$this->load->view('admin/includes/navbar');	?>
<div class="content-wrapper py-3">
	<div class="container-fluid">
		<?php if(!empty($this->session->flashdata('acc_ledger_msg'))): ?>
			<div class="success_msg" id="success_msg">
				<p><?php echo $this->session->flashdata('acc_ledger_msg'); ?></p>
			</div>
			<script>
                setTimeout(function() {
                    $('#success_msg').fadeOut('fast');
                }, 10000);
			</script>
		<?php endif; ?>
		<?php  echo form_open('', 'class="submit-request" id="submit-request"');
			echo'<fieldset>';
				echo '<legend>Project Ledger</legend>';
				echo'<div class="submit_leg_common">';
				//echo form_label('Select Project');
				$options = array(
					''           => 'Select Project',
					'1'           => 'Project 1',
					'2'         => 'Project 2',
					'3'        => 'Project 3',
				);
				echo form_dropdown('leg_project', $options, '','class="form-control leg_project"');
				echo '<div class="val_errors">'.form_error('leg_project').'</div>';
				echo'</div>';

				echo'<div class="submit_leg_common">';
					echo form_label('Date');
					echo form_input(array('name' => 'leg_date', 'id' => 'leg_date', 'value' => '', 'class' => 'form-control', 'readonly' => 'readonly'));
					echo '<div class="val_errors">'.form_error('leg_date').'</div>';
				echo'</div>';

				echo'<div class="submit_leg_common">';
					echo form_label('Voucher Number');
					echo form_input(array('name' => 'leg_voucher_numb', 'id' => 'leg_numb', 'value' => '', 'class' => 'form-control','readonly'));
					echo '<div class="val_errors">'.form_error('leg_numb').'</div>';
				echo'</div>';

				echo'<div class="submit_leg_common">';
					echo form_label('Description');
					echo form_textarea(array('name' => 'leg_desc', 'id' => 'leg_desc', 'class' => 'form-control','cols'=>'', 'rows'=>''));
					echo '<div class="val_errors">'.form_error('leg_desc').'</div>';
				echo'</div>';

                echo"<div class='submit_leg_common'>";
                    echo'<div class="credit_debit">';
                        echo form_label('Transaction Type');
                        $options = array(
                            'credit'           => 'Credit',
                            'debit'         => 'Debit',
                        );
                        echo form_dropdown('leg_credit_debit', $options, '','class="form-control leg_credit_debit"');
                        echo '<div class="val_errors">'.form_error('leg_project').'</div>';
                    echo'</div>';
                echo'</div>';
				echo'<div class="submit_leg_common">';
					echo form_label('Available Balance');
					echo form_input(array('name' => 'leg_bal', 'id' => 'leg_bal', 'value' => '', 'class' => 'form-control', 'readonly' => 'readonly','disabled'=>'disabled'));
					echo '<div class="val_errors">'.form_error('leg_bal').'</div>';
				echo'</div>';

			echo'<div class="submit_leg_common submit_leg_sec text-center">';
				echo '<div class="col-md-6">';
					echo form_reset('reset', 'Reset','class = "btn btn-primary pull-left"');
				echo'</div>';
				echo '<div class="col-md-6 pull-right">';
					echo form_submit('submit', 'Save','class = "btn btn-primary pull-right"');
				echo'</div>';
			echo'</div>';
		echo'</fieldset>';
		echo form_close(); ?>
	</div>
</div>
<?php $this->load->view('admin/includes/custom_js');?>
<?php $this->load->view('admin/includes/footer'); ?>