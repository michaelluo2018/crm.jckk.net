<?php if (!defined('THINK_PATH')) exit();?><form action="<?php echo U('task/add');?>" method="post">
	<input type="hidden" name="creator_role_id" value="<?php echo (session('role_id')); ?>"/>
	<input type="hidden" name="r" value="<?php echo ($r); ?>"/>
	<input type="hidden" name="module" value="<?php echo ($module); ?>"/>
	<input type="hidden" name="module_id" value="<?php echo ($id); ?>"/>
	<input type="hidden" name="refer_url" value="<?php echo ($refer_url); ?>"/>
	<table type="hidden" class="table table-hover">
		<tfoot>
			<tr>
				<td>&nbsp;</td>
				<td colspan="3"><input class="btn btn-primary" type="submit" name="submit" value="<?php echo L('SAVE');?>"/> &nbsp; <input class="btn" onclick="javascript:$('#dialog-task').dialog('close');" type="button" value="<?php echo L('CANCEL');?>"/></td>
			</tr>
		</tfoot> 
		<tbody>
			<tr><th <?php if(C('ismobile') != 1): ?>colspan="4"<?php else: ?>colspan="2"<?php endif; ?>><?php echo L('BASIC_INFO');?></th></tr>
			<tr>
				<td class="tdleft"><?php echo L('THEME');?></td>
				<td><input type="text" name="subject" id="subject" class="span3"/></td>
				<td class="tdleft" <?php if(C('ismobile') == 1): endif; ?>><?php echo L('NOTIFICATION_METHODS');?></td>
				<td><input type="checkbox" name="message_alert" value="1" checked="checked"><?php echo L('MESSAGE');?> &nbsp; <input type="checkbox" name="email_alert" value="1"><?php echo L('EMAIL');?></td>
			</tr>
			<tr>
				<td class="tdleft">负责人</td>
				<td colspan="3">
					<input type="hidden" name="owner_role_id_str" id="owner_id" value=",<?php echo session('role_id');?>,"/>
					<input class="span3" type="text" id="owner_name" name="owner_name" value="<?php echo session('name');?>"/>&nbsp; <?php echo L('CLICK_TO_SELECT');?>
				</td>
			</tr>
			<tr>
				<td class="tdleft">任务相关人</td>
				<td colspan="3"><input type="hidden" name="about_roles" id="about_roles"/><input class="span3" type="text" id="about_roles_name" name="about_roles_name" />&nbsp; <?php echo L('CLICK_TO_SELECT');?></td>
			</tr>
			<tr>
				<td class="tdleft" ><?php echo L('EXPIRATION_DATE');?></td>
				<td><input type="text" id="due_date" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" name="due_date" class="Wdate span3"/></td>
			</tr>
			<tr>
				<td class="tdleft" ><?php echo L('STATUS');?></td>
				<td><select name="status" style="width:150px;">
					<option><?php echo L('NOT_START');?></option>
					<option><?php echo L('DELAY');?></option>
					<option><?php echo L('ONGOING');?></option>
					<option><?php echo L('COMPLETE');?></option>
					<option><?php echo L('WAIT_FOR_SOMEONE');?></option>
				</select></td>
				<?php if(C('ismobile') == 1): ?></tr><tr><?php endif; ?>
				<td class="tdleft" ><?php echo L('PRECEDENCE');?></td>
				<td><select name="priority" style="width:150px;">
					<option><?php echo L('HIGH');?></option>
					<option><?php echo L('HIGHEST');?></option>
					<option><?php echo L('LOW');?></option>
					<option>最低</option>
					<option><?php echo L('NORMAL');?></option>
				</select></td>
			</tr>
			<tr>
				<td class="tdleft" ><?php echo L('DESCRIPTION');?></td>
				<td <?php if(C('ismobile') != 1): ?>colspan="3"<?php endif; ?>>
					<textarea rows="6" class="span7" name="description"></textarea>
				</td>
			</tr>
		</tbody>
	</table>
	</form>
<div id="dialog-task-role-list" title="<?php echo L('SELECT_TASK_OWNER');?>">loading...</div>
<div id="dialog-about-role-list" title="选择任务相关人">loading...</div>
<script type="text/javascript">
<?php if(C('ismobile') == 1): ?>width=$('.container').width() * 0.9;<?php else: ?>width=800;<?php endif; ?>
$("#dialog-task-role-list").dialog({
	autoOpen: false,
    modal: true,
	width: width,
	height:400,
    buttons: {
        "Ok": function () {
			checked_role_id = ',';
			checked_role_name = '';
			$(".muti_role_id:checked").each(function(){
				checked_role_id += ($(this).val()+',');
				checked_role_name += ($(this).attr('rel')+',');
			});
			$('#owner_id').val(checked_role_id);
			$('#owner_name').val(checked_role_name);
			$(this).html(""); 
            $(this).dialog("close"); 
        },
		"Cancel": function () {
			$(this).html(""); 
            $(this).dialog("close");
        }
    },
	position:["center",100]
});
	
$(function(){
	$('#owner_name').click(
		function(){
			$('#dialog-task-role-list').dialog('open');
			$('#dialog-task-role-list').load('<?php echo U("user/mutiListDialog","by=task");?>');
		}
	);
	$('#about_roles_name').click(
		function(){
			$('#dialog-about-role-list').dialog('open');
			$('#dialog-about-role-list').load('<?php echo U("user/mutiListDialog","by=task");?>');
		}
	);
	$("input[name='submit']").click(function(){			
		if($("#subject").val() == null || $("#subject").val() == ""){
			alert('<?php echo L('SUBJECT_CAN_NOT_EMPTY');?>');
			return false;
		}
	})
});

$("#dialog-about-role-list").dialog({
	autoOpen: false,
    modal: true,
	width: width,
	height:400,
    buttons: {
        "Ok": function () {
			checked_role_id = ',';
			checked_role_name = '';
			$(".muti_role_id:checked").each(function(){
				checked_role_id += ($(this).val()+',');
				checked_role_name += ($(this).attr('rel')+',');
			});
			$('#about_roles').val(checked_role_id);
			$('#about_roles_name').val(checked_role_name);
			$(this).html(""); 
            $(this).dialog("close"); 
        },
		"Cancel": function () {
			$(this).html(""); 
            $(this).dialog("close");
        }
    },
	position:["center",100]
});
</script>