

<table class="table">
	<thead>
		<th>WeekDay</th>
		<th>Hours of Delivery (comma separated / CSV)</th>
		<th>Status</th>
	</thead>
	<tbody>
{foreach from=$data item=row}
		<tr>
			<td>{$day_names[$row.day]}</td>
			<td>
				<a href="#" class="editable_hours" data-name="hours" data-type="text" data-pk="{$row.id}" data-url="{$web_path_controllers}/availableweekdays.php?action=update" data-title="Hours of delivery (empty not to display)">{$row.hours}</a>
			</td>
			<td>
				<a href="#" class="editable_active" data-name="active" data-type="select" data-pk="{$row.id}" data-url="{$web_path_controllers}/availableweekdays.php?action=update" data-title="Status">{if $row.active==1}<span class="label label-success">active</span>{else}<span class="label label-warning">inactive</span>{/if}</a>
			</td>
		</tr>
{/foreach}

	</tbody>
</table>

<script type="text/JavaScript">
{literal}
	$.fn.editable.defaults.mode = 'popup';
	$('.editable_hours').editable();
    $('.editable_active').editable({
        source: [
              {value: 1, text: 'active'},
              {value: 0, text: 'inactive'}
           ]
    });	
{/literal}	
</script>