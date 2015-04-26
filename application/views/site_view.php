<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>IEC CFRS</title>
	<link href="<?php echo site_url('css/front-end.css');?>" rel="stylesheet">
	<script src="<?php echo site_url('js/jquery-latest.js');?>"></script>
	<script src="<?php echo site_url('js/front-end.js');?>"></script>
	<script src="<?php echo site_url('js/bootstrap.min.js'); ?>"></script>
	
	
</head>
<body>

<div id="container">
	<div class="header">
	
	</div>
	<div class="header-text"><h1>کمیسیون مستقل انتخابات</h1>
	<h1>کمیسیون مستقل انتخابات</h1>
	<h1>This will be changed to English</h1>
	<h1>This is only a header file</h1>
	<h1>This is a header file</h1>
	<h2>سیستم مدیریت مالی و گزارش دهی مبارزات انتخاباتی <br />کاندیدان ریاست جمهوری و شوراهای ولایتی سال ۱۳۹۳</h2>
	<h2>2014 Campaign Financial Management & Reporting System</h2>
	</div>
	<div class="border-shadow-bottom"></div>
	<div style="direction:rtl; padding:20px;">
		<p><strong>لطفآ نوعیت انتخابات، را انتخاب کنید:</strong></p>
		<?php 
		$input = array(
    	'name'        => 'Electiontype',
    	'id'          => 'presidential',
    	'value'       => '1',
    	'style'       => 'margin:10px',
   		 );
	    $input1 = array(
	    	'name'        => 'Electiontype',
	    	'id'          => 'provincial',
	    	'value'       => '2',
	    	'style'       => 'margin:10px',
	    );
     echo form_radio($input); echo form_label('ریاست جمهوری', 'presidential'); echo form_radio($input1); echo form_label('شوراهای ولایتی', 'provincial');
		
		?>
		</div>
		
		<div class="border-shadow-bottom"></div>
		<div style="direction:rtl; padding:20px;">
		<table border="0" cellpadding="5" class="table table-striped" dir="rtl">
		<thead>
			<tr>
				<th>شماره</th>
				<th>نام کاندید</th>
				<th>مجموعه مساعدت ها</th>
				<th>مجموعه مصارف ها</th>
				<th>جزئیات مساعدت ها</th>
				<th>جزئیات مصارف ها</th>
			</tr>
		</thead>
		<tbody>
			
			<?php  if (count($donations)): foreach ($donations as $row): ?>
			<tr>
				<td><?php echo $row->BallotOrder; ?></td>
				<td><?php echo $row->CandidateName; ?></td>
				
				<td><?php echo $row->TotalDonation; ?></td>
				<?php 
				
				$result = $this->site_m->getCandidate_TotalExpense($row->CandidateID);
				
				
				?>
				
				<td><?php 
				if(!empty($result[$row->CandidateID])){
				echo $result[$row->CandidateID];
				} ?></td>
				
				<td><?php echo anchor('aid/' . $row->CandidateID,'<img src="'. site_url() . 'css/images/pview.png" border="0" title="کلیک کنید" alt="کلیک کنید" />', 'class="btn-link"');?></td>
				<td><?php echo anchor('expense/' . $row->CandidateID, '<img src="'. site_url() . 'css/images/pview.png" border="0" title="کلیک کنید" alt="کلیک کنید" />','class="btn-link"');?></td>
				
				
			</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
		</table>
	
	</div>
<div class="footer"><p>  تمام حقوق معنوی و مادی این وب سایت محفوظ است، کمیسیون مستقل انتخابات - 2013 &copy;  </p></div>	
</div>

</body>
</html>
