<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<title><?php echo C('defaultinfo.name');?> - Powered By <?php echo L('AUTHOR');?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content=""/>
	<meta name="author" content="<?php echo L('AUTHOR');?>"/>
	<link type="text/css" href="__PUBLIC__/css/bootstrap.min.css?t=20140830" rel="stylesheet" />
	<link type="text/css" href="__PUBLIC__/css/bootstrap-responsive.min.css?t=20140830" rel="stylesheet">
	<link type="text/css" href="__PUBLIC__/css/jquery-ui-1.10.0.custom.css?t=20140830" rel="stylesheet" />
	<link type="text/css" href="__PUBLIC__/css/font-awesome.min.css?t=20140830" rel="stylesheet" />
	<link class="docs" href="__PUBLIC__/css/docs.css?t=20140830" rel="stylesheet"/>
	<link rel="shortcut icon" href="__PUBLIC__/ico/favicon.png"/>
    <script type="text/javascript">
        var browserInfo = {browser:"", version: ""};
        var ua = navigator.userAgent.toLowerCase();
        if (window.ActiveXObject) {
            browserInfo.browser = "IE";
            browserInfo.version = ua.match(/msie ([\d.]+)/)[1];
            if(browserInfo.version <= 7){
                if(confirm("您的ie浏览器版本过低，建议使用chorme浏览器")){}
            }
        }
    </script>
	<!--[if lt IE 9]>
	<script src="__PUBLIC__/js/respond.min.js" type="text/javascript"></script>
	<![endif]-->
	<script src="__PUBLIC__/js/jquery-1.9.0.min.js?t=20140830" type="text/javascript"></script>
	<script src="__PUBLIC__/js/bootstrap.min.js?t=20140830" type="text/javascript"></script>
	<script src="__PUBLIC__/js/jquery-ui-1.10.0.custom.min.js?t=20140830" type="text/javascript"></script>
	<script src="__PUBLIC__/js/WdatePicker.js?t=20140830" type="text/javascript"></script>
	<script src="__PUBLIC__/js/gototop.js?t=20140830" type="text/javascript"></script>
	<script src="__PUBLIC__/js/5kcrm_zh-cn.js?t=20140830" type="text/javascript"></script>
	<script src="__PUBLIC__/js/5kcrm.js?t=20140830" type="text/javascript"></script>
	<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap-ie6.css">
	<![endif]-->
	<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/ie.css">
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/font-awesome-ie7.min.css" />
	<![endif]-->
	<!--[if lt IE 9]>
	<link type="text/css" href="__PUBLIC__/css/jquery.ui.1.10.0.ie.css" rel="stylesheet"/>
	<script src="__PUBLIC__/js/ie8-eventlistener.js" type="text/javascript"></script>
	<![endif]-->	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div style="line-height: 40px;padding-right: 5px;padding-top: 6px;" class="pull-left"><img src="__PUBLIC__/img/logomini.png"/></div>
			<a class="brand" href="<?php echo U('dynamic/index');?>" alt="<?php echo C('defaultinfo.description');?>"><?php echo C('defaultinfo.name');?></a>
			<?php echo W("Navigation");?>
		</div> 
	</div>
</div>
<div class="container no-mar-top no-bg">
	<div class="row " >
		<div class="span2 bs-docs-sidebar mar-left3" >
			<ul class="nav nav-list bs-docs-sidenav span2 widths" id="left_list" style="min-height:380px;">
				<li class="first-li"><span class="spans1" ><img src="__PUBLIC__/img/house.png"/>线索详情</span></li>
				<li class="active"><a href="#tab1"><?php echo L('BASIC_INFO');?></a></li>
				<li><a href="#tab2"><?php echo L('COMMUNICATION_LOG');?>&nbsp;&nbsp;<span class="badge badge-success"><?php if($leads['log_count']): echo ($leads['log_count']); endif; ?></span></a></li>
				<li><a href="#tab6"><?php echo L('OWNER_LOG');?>&nbsp;&nbsp;<span class="badge badge-success"><?php if($leads['record_count']): echo ($leads['record_count']); endif; ?></span></a></li>
				<li><a href="#tab4"><?php echo L('TASK');?>&nbsp;&nbsp;<span class="badge badge-success"><?php if($leads['task_count']): echo ($leads['task_count']); endif; ?></span></a></li>
				<li><a href="#tab5"><?php echo L('EVENT');?>&nbsp;&nbsp;<span class="badge badge-success"><?php if($leads['event_count']): echo ($leads['event_count']); endif; ?></span></a></li>
				<li><a href="#tab3"><?php echo L('FILE');?>&nbsp;&nbsp;<span class="badge badge-success"><?php if($leads['file_count']): echo ($leads['file_count']); endif; ?></span></a></li>
			</ul>
		</div>
		<div class="tab-content span8 mar-lefts" >
			<div class="tab-pane fade in active" id="tab1">
				<div class="container2 top-pad" >
					<a class="basic_information" name="tab">线索详情</a>
					<div class="pull-right"style="margin:-3px 15px 0 0;">
						<a href="<?php echo U('leads/edit','id='.$leads['leads_id']);?>" class="btn btn-primary"><?php echo L('EDIT');?></a>
						<a href="<?php echo U('leads/delete','id='.$leads['leads_id']);?>" class="btn btn-primary del_confirm"><?php echo L('DELETE');?></a>
						<a href="javascript:void(0)" class="btn btn-primary" onclick="javascript:history.go(-1)"><?php echo L('RETURN');?></a>
					</div>
				</div>
				<div class="back_box" style="margin-top:10px;">
					<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
					<table class="table table-hover">
						<tbody>
							<tr>
								<td class="tdleft" width="15%"><?php echo L('CREATE_TIME');?></td>
								<td><?php if($leads['create_time'] != 0): echo (date('Y-m-d H:i:s',$leads["create_time"])); endif; ?></td>
								<td class="tdleft"><?php echo L('CREATOR_ROLE');?></td>
								<td><a class="role_info" href="javascript:void(0)" rel="<?php echo ($leads["creator"]["role_id"]); ?>"><?php echo ($leads["creator"]["user_name"]); ?></if></a></td>
							</tr>
							<tr>
								<td class="tdleft"><?php echo L('OWNER_ROLE');?></td>
								<td><a class="role_info" href="javascript:void(0)" rel="<?php echo ($leads["owner"]["role_id"]); ?>"><?php echo ($leads["owner"]["user_name"]); ?></if></a></td>
								<td class="tdleft" width="15%"><?php echo L('LAST_MODIFIED_TIME');?></td>
								<td><?php if($leads['update_time'] > 0): echo (date('Y-m-d H:i:s',$leads["update_time"])); endif; ?></td>
							</tr>
							<?php $j=0; ?>
							<?php if(is_array($field_list)): $i = 0; $__LIST__ = $field_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $j++; ?>
							<?php if($vo['form_type'] == 'textarea' or $vo['form_type'] == 'editor'): if($i%2 == 0): ?><td colspan="2">&nbsp;</td>
								</tr><?php endif; ?>
								<tr>
									<td class="tdleft" width="15%"><?php echo ($vo["name"]); ?>:</td>
									<td colspan="3" style="word-break:break-word;"><?php echo ($leads[$vo['field']]); ?></td>
								</tr>
								<?php if($i%2 != 0 && count($field_list) != $j): $i++; endif; ?>
							<?php else: ?>
								<?php if($i%2 != 0): ?><tr><?php endif; ?>
									<td class="tdleft" width="15%"><?php echo ($vo["name"]); ?>:</td>
									<td width="35%">
										<span style="color:#<?php echo ($vo['color']); ?>">
										<?php if($vo['form_type'] == 'datetime'): if($leads[$vo['field']] > 0): echo (date('Y-m-d',$leads[$vo['field']])); endif; ?>
										<?php elseif($vo['form_type'] == 'address'): ?>
											<?php echo ($leads[$vo['field']]); ?>
											<a href="javascript:void(0);" class="getMap" rel="<?php echo ($leads[$vo['field']]); ?>">
												<img src="__PUBLIC__/img/location.png" style="height:20px; vertical-align: text-bottom;">
											</a>
										<?php else: ?>
											<?php echo ($leads[$vo['field']]); endif; ?>
										</span>
									</td>
								<?php if($i%2 == 0): ?></tr><?php endif; ?>
								<?php if($i%2 != 0 && count($field_list) == $j): ?><td colspan="2">&nbsp;</td>
								</tr><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade back_box" id="tab2">
				<!-- 线索详情 -->
				<div class="header1">
					<div class="pull-left two-title" ><?php echo L('COMMUNICATION_LOG');?></div>
					<div class="pull-right"> <a href="javascript:void(0);" class="add_log btn btn-primary"><?php echo L('ADD');?></a></div>
					<div style="clear:both;"></div>
				</div>
				<table class="table">
					<?php if($leads["log"] == null): ?><div class="mar-left2">
							<?php echo L('EMPTY_TPL_DATA');?>    
						</div>
					<?php else: ?>
					<?php if(is_array($leads["log"])): $i = 0; $__LIST__ = $leads["log"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="caption">
							<?php echo ($vo["subject"]); ?>
						</div>
						<div class="mar-left2">
							<?php if(strlen($vo['content']) > 100): ?><div id="slog_<?php echo ($vo["log_id"]); ?>" class="pad-right3">
									<?php echo (msubstr($vo["content"],0,100)); ?>
									<a class="more" rel="<?php echo ($vo["log_id"]); ?>" href="javascript:void(0)"><?php echo L('VIEW_FULL_INFO');?></a>
								</div>
								<div id="llog_<?php echo ($vo["log_id"]); ?>" class="hide">
									<div class="pad-right3 pres" ><?php echo ($vo["content"]); ?></div>
								</div>
							<?php else: ?>
								<div class="pad-right3 pres"> <?php echo ($vo["content"]); ?></div><?php endif; ?>
						</div>
						<?php if($leads['is_deleted'] != 1): ?><div class="editors">
								<?php if($leads['is_deleted'] != 1): ?><a href="javascript:void(0)" rel="<?php echo ($vo["log_id"]); ?>" class="edit_log"><?php echo L('EDIT');?></a>&nbsp;<a href="<?php echo U('log/delete','r=RLeadsLog&id='.$vo['log_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a><?php endif; ?>&nbsp;&nbsp;&nbsp;&nbsp;
							
								<?php if(!empty($vo["owner"]["user_name"])): ?><img style="margin-top:-3px;" src="__PUBLIC__/img/user.png">&nbsp;<a class="role_info name-colors" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a>&nbsp;<?php endif; ?> &nbsp;<img src="__PUBLIC__/img/time_annoce.png"/>
								<?php echo (date("Y-m-d  g:i ",$vo["create_date"])); ?> &nbsp; 
								<?php if(!empty($vo["create_date"])): ?>&nbsp;<?php endif; ?>
								<?php if(C('ismobile') == 1): ?><br/><?php endif; ?>
							</div><?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
				</table>
			</div>
			<div class="tab-pane fade back_box" id="tab6">
				<div class="header1">
					<div class="pull-left two-title" ><?php echo L('OWNER_LOG');?></div>
					<div style="clear:both;"></div>
				</div>
				<table class="table">
					<?php if($leads["record"] == null): ?><tr>
							<td><?php echo L('EMPTY_TPL_DATA');?> </td>
						</tr>
					<?php else: ?> 
						<tr>
							<td><?php echo L('OWNER_ROLE');?></td>
							<td><?php echo L('RECEIVE_TIME');?></td>
						</tr>
						<?php if(is_array($leads["record"])): $i = 0; $__LIST__ = $leads["record"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td>
									<?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?>
								</td>
								<td>
									<?php echo (date("Y-m-d",$vo["start_time"])); ?>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</table>
			</div>
			<div class="tab-pane fade back_box" id="tab4">
				<div class="header1">
					<div class="pull-left two-title" ><?php echo L('RELATED_TASKS');?></div>
					<div class="pull-right"> 
					<?php if($customer['is_deleted'] == 0): if($leads['is_deleted'] == 0): ?><a href="javascript:void(0);" class="add_task btn btn-primary"><?php echo L('ADD');?></a><?php endif; endif; ?>
					</div>
					<div style="clear:both;"></div>
				</div>
				<table class="table">
					<?php if($leads["task"] == null): ?><tr>
							<td><?php echo L('EMPTY_TPL_DATA');?></td>
						</tr>
					<?php else: ?> 
						<tr>
							<td  width="12%">&nbsp;</td>
							<td><?php echo L('THEME');?></td>
							<?php if(C('ismobile') != 1): ?><td><?php echo L('STATUS');?></td><?php endif; ?>
							<td>负责人</td>
							<td>任务相关人</td>
							<td><?php echo L('EXPIRATION_DATE');?></td>
							<?php if(C('ismobile') != 1): ?><td><?php echo L('UPDATE_TIME');?></td><?php endif; ?>
						</tr>
						<?php if(is_array($leads["task"])): $i = 0; $__LIST__ = $leads["task"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td class="tdleft">
									<?php if($leads['is_deleted'] == 0): ?><a href="<?php echo U('task/view','id='.$vo['task_id']);?>"><?php echo L('VIEW');?></a>&nbsp; <a href="<?php echo U('task/delete','id='.$vo['task_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>&nbsp;
									<?php if($vo["isclose"] == 0): ?><a href="<?php echo U('task/close','id='.$vo['task_id']);?>"><?php echo L('CLOSE');?></a><?php else: ?><a href="<?php echo U('task/open','id='.$vo['task_id']);?>"><?php echo L('OPEN');?></a><?php endif; endif; ?>
								</td>
								<td>
									<a href="<?php echo U('task/view','id='.$vo['task_id']);?>"><?php echo ($vo["subject"]); ?></a>
								</td>
								<?php if(C('ismobile') != 1): ?><td>
									<?php echo ($vo["status"]); ?>
								</td><?php endif; ?>
								<td>
									<?php if(!empty($vo["owner"])): if(is_array($vo["owner"])): $i = 0; $__LIST__ = $vo["owner"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a class="role_info" rel="<?php echo ($v["role_id"]); ?>" href="javascript:void(0)"><?php echo ($v["user_name"]); ?></a>,<?php endforeach; endif; else: echo "" ;endif; endif; ?>
								</td>
								<td>
									<?php if(!empty($vo["about_roles"])): if(is_array($vo["about_roles"])): $i = 0; $__LIST__ = $vo["about_roles"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a class="role_info" rel="<?php echo ($v["role_id"]); ?>" href="javascript:void(0)"><?php echo ($v["user_name"]); ?></a>,<?php endforeach; endif; else: echo "" ;endif; endif; ?>
								</td>
								<td>
									<?php if(!empty($vo["due_date"])): echo (date("Y-m-d H:i:s",$vo["due_date"])); endif; ?>
								</td>
								<?php if(C('ismobile') != 1): ?><td>
									<?php if(!empty($vo["update_date"])): echo (date("Y-m-d H:i:s",$vo["update_date"])); endif; ?>
								</td><?php endif; ?>
							</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</table>
			</div>
			<div class="tab-pane fade back_box" id="tab5">
				<div class="header1">
					<div class="pull-left two-title" ><?php echo L('RELATED_EVENT');?></div>
					<div class="pull-right"> 
						<?php if($leads['is_deleted'] == 0): ?><a href="javascript:void(0);" class="add_event btn btn-primary"><?php echo L('ADD');?></a><?php endif; ?>
					</div>
					<div style="clear:both;"></div>
				</div>
				<table class="table">
					<?php if($leads["event"] == null): ?><tr>
							<td><?php echo L('EMPTY_TPL_DATA');?> </td>
						</tr>
					<?php else: ?> 
						<tr>
							<td width="12%">&nbsp;</td>
							<td><?php echo L('THEME');?></td>
							<td><?php echo L('EVENT_ADDRESS');?></td>
							<td><?php echo L('OWNER_ROLE');?></td>
							<?php if(C('ismobile') != 1): ?><td><?php echo L('START_TIME');?></td>
							<td><?php echo L('END_TIME');?></td><?php endif; ?>
						</tr>
						<?php if(is_array($leads["event"])): $i = 0; $__LIST__ = $leads["event"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td class="tdleft" >
									<?php if($leads['is_deleted'] == 0): ?><a href="<?php echo U('event/view','id='.$vo['event_id']);?>"><?php echo L('VIEW');?></a>&nbsp; <a href="<?php echo U('event/delete','id='.$vo['event_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>&nbsp;<?php endif; ?>
								</td>
								<td>
									<?php echo ($vo["subject"]); ?>
								</td>
								<td>
									<?php echo ($vo["venue"]); ?>
								</td>
								<td>
									<?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?>
								</td>
								<?php if(C('ismobile') != 1): ?><td>
									<?php if(!empty($vo["start_date"])): echo (date("Y-m-d H:i:s",$vo["start_date"])); endif; ?>
								</td>
								<td>
									<?php if(!empty($vo["end_date"])): echo (date("Y-m-d H:i:s",$vo["end_date"])); endif; ?>
								</td><?php endif; ?>
							</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</table>
			</div>
			<div class="tab-pane fade back_box" id="tab3">
				<div class="header1">
					<div class="pull-left two-title" ><?php echo L('RELATED_FILE');?></div>
					<div class="pull-right"> 
					<?php if($leads['is_deleted'] == 0): ?><a href="javascript:void(0);" class="add_file btn btn-primary"><?php echo L('ADD');?></a><?php endif; ?>
					</div>
					<div style="clear:both;"></div>
				</div>
				<table class="table">
					<?php if($leads["file"] == null): ?><tr>
							<td><?php echo L('EMPTY_TPL_DATA');?> </td>
						</tr>
					<?php else: ?> 
						<tr>
							<td>&nbsp;</td>
							<td><?php echo L('FILE_NAME');?></td>
							<td><?php echo L('SIZE');?></td>
							<?php if(C('ismobile') != 1): ?><td><?php echo L('ADDED_BY');?></td>
							<td><?php echo L('ADD_TIME');?></td><?php endif; ?>
						</tr>
						<?php if(is_array($leads["file"])): $i = 0; $__LIST__ = $leads["file"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td class="tdleft">
									<?php if($leads['is_deleted'] == 0): ?><a href="<?php echo U('file/delete','r=RFileLeads&id='.$vo['file_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a><?php endif; ?>
								</td>
								<td>
									<a target="_blank" href="<?php echo ($vo["file_path"]); ?>"><?php echo ($vo["name"]); ?></a>
								</td>
								<td>
									<?php echo ($vo["size"]); echo L('BYTE');?>
								</td>
								<?php if(C('ismobile') != 1): ?><td>
									<?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?>
								</td>
								<td>
									<?php if(!empty($vo["create_date"])): echo (date("Y-m-d H:i:s",$vo["create_date"])); endif; ?>
								</td><?php endif; ?>
							</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</table>
			</div>
		</div>
		<div class="span2  bs-docs-sidebar mar-lefts2" id="right_list">
			<ul class="nav nav-list bs-docs-sidenav  span2 widths" >
				<li class="first-li"><span class="spans1">编辑详情</span></li>
				<li><a href="javascript:void(0);" class="add_log"><img src="__PUBLIC__/img/youce.png"/>&nbsp;&nbsp;&nbsp;<?php echo L('ADD_LOG');?></a></li>
				<li><a href="javascript:void(0);" class="add_task"><img src="__PUBLIC__/img/youce.png"/>&nbsp;&nbsp;&nbsp;<?php echo L('ADD_TASK');?></a></li>
				<li><a href="javascript:void(0);" class="add_event"><img src="__PUBLIC__/img/youce.png"/>&nbsp;&nbsp;&nbsp;<?php echo L('ADD_EVENT');?></a></li>
				<li><a href="javascript:void(0);" class="add_file"><img src="__PUBLIC__/img/youce.png"/>&nbsp;&nbsp;&nbsp;<?php echo L('ADD_FILE');?></a></li>
				<?php if($leads['is_transformed'] != 1): ?><li><a  href="<?php echo U('customer/add','leads_id='.$leads['leads_id']);?>"><img src="__PUBLIC__/img/youce.png"/>&nbsp;&nbsp;&nbsp;<?php echo L('CONVERT_TO_CUSTOMER');?></a></li><?php endif; ?>
			</ul>
		</div>
	</div>
</div>
<div class="hide" id="dialog-file" title="<?php echo L('DIALOG_ADD_FILE');?>">loading...</div>
<div class="hide" id="dialog-log" title="<?php echo L('DIALOG_ADD_LOG');?>">loading...</div>
<div class="hide" id="dialog-log-edit" title="<?php echo L('DIALOG_EDIT_LOG');?>">loading...</div>
<div class="hide" id="dialog-task" title="<?php echo L('ADD_TASK');?>">loading...</div>
<div class="hide" id="dialog-event" title="<?php echo L('ADD_EVENT');?>">loading...</div>
<div class="hide" id="dialog-role-info" title="<?php echo L('DIALOG_USER_INFO');?>">loading...</div>
<div class="hide" id="dialog-map" title="<?php echo L('MAP');?>">loading...</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Z0Fo0ib1GUgWlylCWeLvQh2U"></script>
<script type="text/javascript">
	$('#left_list a').click(function (e) {
        e.preventDefault();
        $('#right_list').hide();
        $('#left_list').parent().next().removeClass('span8').addClass('span10');
        $(this).tab('show');
    })
    $('#left_list a:first').on('click', function (e) {
        $('#left_list').parent().next().removeClass('span10').addClass('span8');
        $('#right_list').show();
    })
<?php if(C('ismobile') == 1): ?>width=$('.container').width() * 0.9;<?php else: ?>width=800;<?php endif; ?>

$("#dialog-file").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-log-edit").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-role-info").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-log").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-task").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-event").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-map").dialog({
    autoOpen: false,
    modal: true,
	width: 800,
	minHeight: 600,
	position: ["center",100]
});
$(".edit_log").click(function(){
	$log_id = $(this).attr('rel');
	$('#dialog-log-edit').dialog('open');
	$('#dialog-log-edit').load('<?php echo U("log/edit","id=");?>'+$log_id);
});
$("#dialog-role-list").dialog({
	autoOpen: false,
	modal: true,
	width: width,
	maxHeight: 400,
	buttons: {
		"Ok": function () {
			var item = $('input:radio[name="owner"]:checked').val();
			var name = $('input:radio[name="owner"]:checked').parent().next().html();
			$('#owner_name').val(name);
			$('#owner_id').val(item);
			$(this).dialog("close"); 
		},
		"Cancel": function () {
			$(this).dialog("close");
		}
	},
	position: ["center", 100]
});

$(".add_file").click(function(){
	$('#dialog-file').dialog('open');
	$('#dialog-file').load('<?php echo U("file/add","r=RFileLeads&module=leads&id=".$leads["leads_id"]);?>');
});
$(".add_log").click(function(){
	$('#dialog-log').dialog('open');
	$('#dialog-log').load('<?php echo U("log/add","r=RLeadsLog&module=leads&id=".$leads["leads_id"]);?>');
});
$(".add_task").click(function(){
	$('#dialog-task').dialog('open');
	$('#dialog-task').load('<?php echo U("task/add","r=RLeadsTask&module=leads&id=".$leads["leads_id"]);?>');
});
$(".add_event").click(function(){
	$('#dialog-event').dialog('open');
	$('#dialog-event').load('<?php echo U("event/add","r=REventLeads&module=leads&id=".$leads["leads_id"]);?>');
});
$(function(){
	$('#owner_name').click(
		function(){
			$('#dialog-role-list').dialog('open');
			$('#dialog-role-list').load("<?php echo U('user/listDialog');?>");
		}
	);
	$(".role_info").click(function(){
		$role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
	});
	$(".getMap").click(function(){
		var map = $(this).attr('rel');
		$('#dialog-map').dialog('open');
		$('#dialog-map').load('<?php echo U("setting/mapdialog","map=");?>'+map);
	});
	$(".more").click(function(){
		log_id = $(this).attr('rel');
		$('#llog_'+log_id).attr('class','');
		$('#slog_'+log_id).attr('class','hide');
	});
});
</script>

</body>
</html>