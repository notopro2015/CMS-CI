<h3 align="right"><?php echo empty($expenditure->ID) ? 'درج مصارفات جدید' : 'ویرایش مصارفات' . '-' . "  " .$expenditure->SPDetail; ?></h3>

<div class="modal-body">
<div style="color:red; font-style:italic; font-size:11px; ">
<?php echo validation_errors(); ?>
</div>
<?php echo form_open(); ?>
<table class="table" dir="rtl" align="right">
<tr>
		<td>نوعیت انتخابات</td>
		<td>
		<?php echo form_dropdown('ElectionType', $get_electiontype, $this->input->post('id') ? $this->input->post('id') : $expenditure->ElectionType, 'id="electiontype"'); ?>
		</td>
	</tr>
	<tr>
		<td> ولایت</td>
		<td><?php echo form_dropdown('ProvinceID', $get_provinces, $this->input->post('id') ? $this->input->post('id') : $expenditure->ProvinceID, 'id="provinceid"'); ?></td>
	</tr>
	<tr>
		<td> کاندید</td>
		<td><?php echo form_dropdown('CandidateID', $get_candidate, $this->input->post('id') ? $this->input->post('id') : $expenditure->CandidateID, 'id="candidateid"'); ?></td>
	</tr>
	<tr>
		<td>مقدار  </td>
		<td><?php echo form_input('Amount', set_value('Amount', $expenditure->Amount)); ?></td>
	</tr>
	<tr>
		<td>مشخصات ارائه کننده خدمات و تهیه کننده مواد</td>
		<td><?php echo form_input('SPDetail', set_value('SPDetail', $expenditure->SPDetail)); ?></td>
	</tr>
	<tr>
		<td>مورد مصرف</td>
		<td><?php echo form_input('TypeOfExpenditure', set_value('TypeOfExpenditure', $expenditure->TypeOfExpenditure)); ?></td>
	</tr>
	<tr>
		<td>دوره</td>
		<td><?php echo form_dropdown('RoundID', $get_round, $this->input->post('id') ? $this->input->post('id') : $expenditure->RoundID); ?></td>
	</tr>
	<tr>
		<td>
		
		تاریخ
		
		</td>
		
		<td><?php echo form_input('Date', set_value('Date', $expenditure->Date), 'id="datepicker"'); ?><?php echo form_hidden('UserID', $this->session->userdata('user_type'), $this->input->post('id') ? $this->input->post('id') : $expenditure->UserID); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'ذخیره', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>

<script type="text/javascript">
$('#provinceid').change(function(){
	if ($('#electiontype').val() > 1 && $('#provinceid').val()>0){

		var form_data = {
		electiontype: $('#electiontype').val(),
		provinceid: $('#provinceid').val()
		}
	}
	if ($('#electiontype').val() == 1){

		var form_data = {
		electiontype: $('#electiontype').val(),
		provinceid: '0'
		}

		}
//ajax
	$.ajax({
		url: '<?php echo site_url("admin/assistance/getCandidate");?>',
		type: 'POST',
		data: form_data,
		success: function(data){
			//console.log(data);
			//return false;
			var opt ='';
			for(var i=0; i<data.length; i++){
			
				//console.log(data);
				opt += '<option value="'+data[i].VoterID+'">'+data[i].Name+'</option>';
				//console.log(opt);
				//return false;
				
				$('#candidateid').html(opt);
				
			}
			
		}
	});
	

//console.log(form_data);
	

	//presidential candidate
	
		
});
</script>