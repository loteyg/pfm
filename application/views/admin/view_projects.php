<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php	$this->load->view('admin/includes/header');	?>
<?php	$this->load->view('admin/includes/navbar');	?>
	<div class="content-wrapper py-3">
		<div class="container-fluid">
			<?php	$this->load->view('admin/includes/Breadcrumb');	?>
            <div><h2>Available Project</h2></div>
            <table>
                <tr>
                    <th>Project Code</th>
                    <th>Project Name</th>
                    <th>Request Method</th>
                    <th>Amount Received</th>
                    <th>Department</th>
                    <th>State</th>
                    <th>City</th>
                </tr>

                <?php
                    foreach($projects as $key => $val){
                        echo" <tr><td>".$val['pro_code']."</td>";
                        echo"<td>".$val['pro_name']."</td>";
                        echo"<td>".$val['req_method']."</td>";
                        echo"<td>".$val['amt_rec']."</td>";
                        echo"<td>".$val['department']."</td>";
                        echo"<td>".$val['state']."</td>";
                        echo"<td>".$val['city']."</td></tr>";

                    }
                ?>
            </table>
		</div>
	</div>
<?php $this->load->view('admin/includes/header'); ?>