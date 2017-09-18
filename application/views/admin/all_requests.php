<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php	$this->load->view('admin/includes/header');	?>
<?php	$this->load->view('admin/includes/navbar');	?>
	<div class="content-wrapper py-3">
		<div class="container-fluid">
			<?php	$this->load->view('admin/includes/Breadcrumb');	?>
			<?php
			echo $result = $this->db->select('pro_code')->order_by('pm_id','desc')->limit(1)->get('project_master')->row('pm_id');
			echo "<div id='tableCon'>";
				//echo"<pre>";
				//print_r($view_all_requests);
				$this->table->set_heading('Project Code', 'Name','Department', 'Request Method','Email Date','Email Received From','Letter No.', 'Letter Date', 'Letter From');
				foreach($view_all_requests as $key => $val){
					$this->table->add_row($val->pro_code, $val->pro_name_info, $val->pro_department_info, $val->pro_req_method_info, $val->pro_email_date, $val->pro_email_from, $val->pro_letter_no, $val->pro_letter_date, $val->pro_letter_from);
				}
			echo $this->table->generate();
            echo"</div>";
			?>

			</div>
		</div>
<?php $this->load->view('admin/includes/header'); ?>