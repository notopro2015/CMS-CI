<?php
function btn_edit ($uri)
{
	return anchor($uri, '<i class="icon-edit"></i>');
}

function btn_delete ($uri)
{
	return anchor($uri, '<i class="icon-remove"></i>', array(
		'onclick' => "return confirm('شما در حال حذف یک رکورد هستید! آیا واقعآ می خواهید پاک شود؟');"
	));
}