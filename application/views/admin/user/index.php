<section>
<h2>Users</h2>
<?php echo anchor('admin/user/edit', '<i class="icon-plus"></i> Add a user');?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>User Type</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php  if (count($users)): foreach ($users as $user): ?>
	
	<tr>
		<td><?php echo anchor('admin/user/edit/'. $user->id, $user->username);?></td>
		<td><?php echo anchor('admin/user/edit/'. $user->id, $user->user_type);?></td>
		<td><?php echo btn_edit('admin/user/edit/'. $user->id, $user->username); ?></td>
		<td><?php echo btn_delete('admin/user/delete/'. $user->id, $user->username); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php else: ?>
	<tr>
		<td colspan="3">We found no users in the database.</td>
	</tr>
	
	<?php endif; ?>
	</tbody>
</table>
</section>
