<section style="direction:rtl">
<h2> صفحه مصارفات  </h2>
<div style="color:red; font-style:italic; font-size:11px; ">
<?php echo validation_errors(); ?>
</div>
<?php echo anchor('admin/expenditure/edit', '<i class="icon-plus"></i> درج مصارفات جدید');?>
<table class="table table-striped" dir="rtl">
	<thead>
		<tr>
			<th>توضیحات در مورد مصرف</th>
			<th>مقدار</th>
			<th>ویرایش</th>
			<th>حذف</th>
		</tr>
	</thead>
	<tbody>
	<?php  if (count($donations)): foreach ($donations as $row): ?>
	
	<tr>
		<td><?php echo anchor('admin/expenditure/edit/'. $row->ID, $row->TypeOfExpenditure);?></td>
		<td><?php echo anchor('admin/expenditure/edit/'. $row->ID, $row->Amount);?></td>
		<td><?php echo btn_edit('admin/expenditure/edit/'. $row->ID, $row->Amount); ?></td>
		<td><?php echo btn_delete('admin/expenditure/delete/'. $row->ID, $row->Amount); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php else: ?>
	<tr>
		<td colspan="3">کدام مصارفات تا هنوز ثبت نشده است.</td>
	</tr>
	
	<?php endif; ?>
	</tbody>
</table>
</section>
