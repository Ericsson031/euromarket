
  <!-- Button trigger modal -->
  <a data-toggle="modal" href="#addNewModal" class="btn btn-primary">Add new</a>

  <!-- Modal -->
  <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add new</h4>
        </div>
        <div class="modal-body">
<form class="form-horizontal" data-validate="parsley" novalidate="novalidate" action="{$web_path_controllers}/restricteddays.php?action=new" method="POST" id="newEntryFrm" role="form">
  <div class="form-group">
    <label class="col-lg-3 control-label">Description</label>
    <div class="col-lg-7">
      <input type="text" required="required" class="form-control" name="description" placeholder="e.g. Christmas">
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-3 control-label">Day</label>
    <div class="col-lg-7">
      <select class="form-control" name="day">
{section name=day loop=31} 
    <option value="{$smarty.section.day.iteration}">{$smarty.section.day.iteration} </option>
{/section}
	  </select>
    </div>
  </div>
   <div class="form-group">
    <label class="col-lg-3 control-label">Month</label>
    <div class="col-lg-7">
      <select class="form-control" name="month">
{section name=month loop=12} 
    <option value="{$smarty.section.month.iteration}">{$smarty.section.month.iteration} </option>
{/section}
	  </select>
    </div>
  </div> 
    <div class="form-group">
    <label class="col-lg-3 control-label">Active</label>
    <div class="col-lg-7">
		<label class="checkbox-inline">
		  <input type="checkbox" id="inlineCheckbox1" name="active" value="1"> enabled or disabled
		</label>
    </div>
  </div>  
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary" id="newEntryBtn">Save</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<table class="table">
	<thead>
		<th>Description</th>
		<th>Day</th>
		<th>Month</th>
		<th>Status</th>
		<th>Actions</th>
	</thead>
	<tbody>
{foreach from=$data item=row}
		<tr>
			<td>
				<a href="#" class="editable_description" data-name="description" data-type="text" data-pk="{$row.id}" data-url="{$web_path_controllers}/restricteddays.php?action=update" data-title="Description">{$row.description}</a>
			</td>
			<td>
				<a href="#" class="editable_day" data-name="day" data-value="{$row.day}" data-type="combodate" data-pk="{$row.id}" data-url="{$web_path_controllers}/restricteddays.php?action=update" data-title="Day">{if $row.day < 10}0{/if}{$row.day}</a>
			</td>
			<td>
				<a href="#" class="editable_month" data-name="month" data-value="{$row.month}" data-type="combodate" data-pk="{$row.id}" data-url="{$web_path_controllers}/restricteddays.php?action=update" data-title="Month">{if $row.month < 10}0{/if}{$row.month}</a>
			</td>			
			<td>
				<a href="#" class="editable_active" data-name="active" data-value="{$row.active}" data-type="select" data-pk="{$row.id}" data-url="{$web_path_controllers}/restricteddays.php?action=update" data-title="Status">{if $row.active==1}<span class="label label-success">active</span>{else}<span class="label label-warning">inactive</span>{/if}</a>
			</td>
			<td><a class="delete_item btn btn-xs btn-danger" href="{$web_path_controllers}restricteddays.php?action=delete&id={$row.id}">Delete</a></td>
		</tr>
{/foreach}

	</tbody>
</table>

<script type="text/JavaScript">
{literal}
	$.fn.editable.defaults.mode = 'popup';
	$('.editable_description').editable();	
    $('.editable_day').editable({
        format: 'D',    
        viewformat: 'DD',    
        template: 'D',    
        combodate: {
                minuteStep: 1
        }
    });	
    $('.editable_month').editable({
        format: 'MM',    
        viewformat: 'MM',    
        template: 'MMM',    
        combodate: {
                minuteStep: 1
        }
    });		
    $('.editable_active').editable({  
        source: [
              {value: 1, text: 'active'},
              {value: 0, text: 'inactive'}
           ]
    });	
	$('#newEntryBtn').click(function() {
		return $('#newEntryFrm').submit();
	});
	
	$('#newEntryFrm').submit(function() {
		if($( '#newEntryFrm' ).parsley( 'validate' )) {
			submittedForm = $(this);
			$.post( submittedForm.attr('action'), submittedForm.serialize()).done(function(data) {
				$('#addNewModal').modal('hide');
			});
		}
		return false;
	});	
	
	// after the modal closes
	$('#addNewModal').on('hidden.bs.modal', function () {
		// reload tab
		var current_index = $("#navigation_tabs").tabs("option", "active");
		$("#navigation_tabs").tabs('load', current_index);
	});
	
	$('.delete_item').click(function () {
		if (!confirm("Are you sure you want to delete?")) { return false; }
	
		$.get( $(this).attr('href'), function( data ) {
			// reload tab
			var current_index = $("#navigation_tabs").tabs("option", "active");
			$("#navigation_tabs").tabs('load', current_index);
		});
		return false;
	});
{/literal}	
</script>