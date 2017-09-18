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
			<div id="tableCon">
				<?php
				//echo"<pre>";
				//print_r($all_account_ledgers);
				$this->table->set_heading('S.No.', 'Date','Ledger Number', 'Description','Debit','Credit','Balance');
				foreach($all_account_ledgers as $key => $val){
					$this->table->add_row($val->acc_ledger_id, $val->acc_ledger_date, $val->acc_ledger_voucher_numb, $val->acc_ledger_desc, $val->acc_ledger_debit, $val->acc_ledger_credit, $val->acc_ledger_bal);
				}
				?>
			<?php
				echo $this->table->generate();

			?>
			</div>
		</div>
	</div>
<?php $this->load->view('admin/includes/custom_js');?>
<?php $this->load->view('admin/includes/footer'); ?>