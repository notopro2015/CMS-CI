<section style="direction:rtl">
<h2> صفحه مساعدت  </h2>
<div style="color:red; font-style:italic; font-size:11px; ">
<?php echo validation_errors(); ?>
</div>
<?php echo anchor('admin/assistance/edit', '<i class="icon-plus"></i> درج مشخصات مساعدت کننده');?>
<table class="table table-striped" dir="rtl">
	<thead>
		<tr>
			<th>اسم مساعدت کننده</th>
			<th>مقدار مساعدت </th>
			<th>ویرایش</th>
			<th>حذف</th>
		</tr>
	</thead>
	<tbody>
	<?php  if (count($donations)): foreach ($donations as $row): ?>
	
	<tr>
		<td><?php echo anchor('admin/assistance/edit/'. $row->ID, $row->Name);?></td>
		<td><?php echo anchor('admin/assistance/edit/'. $row->ID, $row->Amount);?></td>
		<td><?php echo btn_edit('admin/assistance/edit/'. $row->ID, $row->Amount); ?></td>
		<td><?php echo btn_delete('admin/assistance/delete/'. $row->ID, $row->Amount); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php else: ?>
	<tr>
		<td colspan="3">هیج مساعدت تا هنوزثبت نشده است .</td>
	</tr>
	
	<?php endif; ?>
	</tbody>
</table>
</section>
