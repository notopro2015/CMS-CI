<h3><?php echo empty($user->id) ? 'Add a new user' : 'Edit user ' . $user->name; ?></h3>

<div class="modal-body">
<div style="color:red; font-style:italic; font-size:11px; ">
<?php echo validation_errors(); ?>
</div>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Name</td>
		<td><?php echo form_input('name', set_value('name', $user->name)); ?></td>
	</tr>
	<tr>
		<td>Username</td>
		<td><?php echo form_input('username', set_value('username', $user->username)); ?></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><?php echo form_password('password'); ?></td>
	</tr>
	<tr>
		<td>Confirm password</td>
		<td><?php echo form_password('password_confirm'); ?></td>
	</tr>
	<tr>
		<td>User Type</td>
		
		<td><?php echo form_dropdown('user_type', $get_usertype, $this->input->post('id') ? $this->input->post('id') : $user->user_type); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>