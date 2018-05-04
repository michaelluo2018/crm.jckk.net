<?php if (!defined('THINK_PATH')) exit();?><form class="form-horizontal" action="<?php echo U('Log/add');?>" method="post">	
	<table class="table">
	<input type='hidden' name="r" <?php if(isset($r)): ?>value="<?php echo ($r); ?>"<?php endif; ?>/>
	<input type='hidden' name="module" <?php if(isset($r)): ?>value="<?php echo ($module); ?>"<?php endif; ?>/> 
	<input type='hidden' name="id" <?php if(isset($r)): ?>value="<?php echo ($model_id); ?>"<?php endif; ?>/> 
	<input type='hidden' name="role_id" value="<?php echo (session('role_id')); ?>"/>
		<tr>
			<th colspan="4"><?php echo L('BASIC_INFO');?></th>
		</tr>
		<tr>
			<td class="tdleft"><?php echo L('SUBJECT');?></td>
			<td colspan="3"><input class="span3" type="text" name="subject" id="subject" placeholder="<?php echo L('LESS_THAN_50_CHARACTER');?>" /></td>
		</tr>
		<tr>
			<td class="tdleft"><?php echo L('CONTENT');?></td>
			<td colspan="3"><textarea rows="6" class="span4" name="content"></textarea></td>
		</tr>
		<?php if($module == 'leads' || $module == 'business'): ?><tr>
			<td class="tdleft"><?php echo L('NEXTSTEP_TIME');?></td>
			<td><input type="text" value="" id="nextstep_time" class="span2" name="nextstep_time" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})"></td>
			<td class="tdleft"><?php echo L('NEXTSTEP');?></td>
			<td><input type="text" id="nextstep" class="span2" name="nextstep"></td>
		</tr><?php endif; ?>
		<tr>
			<td>&nbsp;</td>
			<td colspan="3"><input class="btn btn-primary" type="submit" name="submit" value="<?php echo L('ADD');?>"/> &nbsp; <input class="btn" onclick="javascript:$('#dialog-log').dialog('close');" type="button" value="<?php echo L('CANCEL');?>"/></td>
		</tr>
	</table>
</form>
<script type="test/javascript">
$("input[name='submit']").click(function(){			
	if($("#subject").val() == null || $("#subject").val() == ""){
		alert('<?php echo L('TITLE_CAN_NOT_EMPTY');?>');
		return false;
	}
})
</script>