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
			<ul class="nav nav-list bs-docs-sidenav span2 widths" id="left_list" style="min-height:410px;">
				<li class="first-li"><span class="spans1"><img src="__PUBLIC__/img/house.png"/>&nbsp;商机详情</span></li>
				<li class="active" ><a href="#tab1"><?php echo L('BASIC_INFORMATION');?></a></li>
				<li><a href="#tab8"><?php echo L('PROMOTE_THE_HISTORY');?>&nbsp;&nbsp;<span class="badge badge-success"><?php if($status_counts): echo ($status_counts); endif; ?></span></a></li>
				<li><a href="#tab3"><?php echo L('COMMUNICATION_LOGS');?>&nbsp;&nbsp;<span class="badge badge-success"><?php if($business['log_count']): echo ($business['log_count']); endif; ?></span></a></li>
				<li><a href="#tab7"><?php echo L('CONTRACT');?>&nbsp;&nbsp;<span class="badge badge-success"><?php if($business['contract_count']): echo ($business['contract_count']); endif; ?></span></a></li>
				<!-- <li><a href="#tab2"><?php echo L('PRODUCT');?>&nbsp;&nbsp;<span class="badge badge-success"><?php if($business['product_count']): echo ($business['product_count']); endif; ?></span></a></li> -->
				<li><a href="#tab4"><?php echo L('TASK');?>&nbsp;&nbsp;<span class="badge badge-success"><?php if($business['task_count']): echo ($business['task_count']); endif; ?></span></a></li>
				<li><a href="#tab5"><?php echo L('SCHEDULE');?>&nbsp;&nbsp;<span class="badge badge-success"><?php if($business['event_count']): echo ($business['event_count']); endif; ?></span></a></li>
				<li><a href="#tab6"><?php echo L('ATTACHMENT');?>&nbsp;&nbsp;<span class="badge badge-success"><?php if($business['file_count']): echo ($business['file_count']); endif; ?></span></a></li>
			</ul>
		</div>
		<div class="tab-content span8 mar-lefts" >
			<div class="tab-pane fade in active" id="tab1">
				<div class="container2 top-pad" >
					<a class="basic_information" name="tab"><?php echo L('BASIC_INFORMATION');?></a>
					<div class="pull-right"style="margin:-3px 15px 0 0;">
						<a href="<?php echo U('business/edit', 'id='.$business['business_id']);?>" class="btn btn-primary"><?php echo L('EDIT');?></a>
						<a href="<?php echo U('business/delete', 'id='.$business['business_id']);?>" class="btn btn-primary del_confirm"><?php echo L('DELETE');?></a>
						<a href="javascript:void(0)" class="btn btn-primary" onclick="javascript:history.go(-1)"><?php echo L('RETURN');?></a>
					</div>
				</div>
				<div class="back_box container3 mar-top">
					<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
					<table class="table table-hover">
						<tbody>
							<tr><th colspan="4"><?php echo L('BASIC_INFORMATION');?></th></tr>
							<?php if($business['is_deleted'] == 1): ?><tr>
									<td class="tdleft"><?php echo L('DELETE_THE_PEOPLE');?></td>
									<td><a class="role_info" href="javascript:void(0)" rel="<?php echo ($business["deleted"]["role_id"]); ?>"><?php echo ($business["deleted"]["user_name"]); ?></a></td>
									<td class="tdleft" width="15%"><?php echo L('DELETE_THE_TIME');?></td>
									<td><?php echo (date('Y-m-d H:i:s',$business["delete_time"])); ?></td>
								</tr><?php endif; ?>
							<tr>
								<td class="tdleft"><?php echo L('PRINCIPAL');?></td>
								<td><a class="role_info" href="javascript:void(0)" rel="<?php echo ($business["owner"]["role_id"]); ?>"><?php echo ($business["owner"]["user_name"]); ?></if></a></td>
								<td class="tdleft" width="15%"><?php echo L('CREATION_TIME');?></td>
								<td><?php if($business['create_time'] != 0): echo (date('Y-m-d H:i:s',$business["create_time"])); endif; ?></td>
							</tr>
							<tr>
								<td class="tdleft" width="15%"><?php echo L('THE_ADVANCE_OF_TIME');?></td>
								<td><?php if($business['update_time'] != 0): echo (date('Y-m-d H:i:s',$business["update_time"])); else: echo L('NOT_AVAILABLE'); endif; ?></td>
							<?php $j=0; ?>
							<?php if(is_array($field_list)): $i = 0; $__LIST__ = $field_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $j++; ?>
							<?php if($vo['form_type'] == 'textarea' or $vo['form_type'] == 'editor'): if($i%2 != 0): ?><td colspan="2">&nbsp;</td>
								</tr><?php endif; ?>
								<tr>
									<td class="tdleft" width="15%"><?php echo ($vo["name"]); ?>:</td>
									<td colspan="3" style="word-break:break-word;"><?php echo ($business[$vo['field']]); ?></td>
								</tr>
								<?php if($i%2 == 0 && count($field_list) != $j): $i++; endif; ?>
							<?php else: ?>
								<?php if($i%2 == 0): ?><tr><?php endif; ?>
									<td class="tdleft" width="15%"><?php echo ($vo["name"]); ?>:</td>
									<td width="35%">
										<span style="color:#<?php echo ($vo['color']); ?>">
										<?php if($vo['form_type'] == 'datetime'): if($business[$vo['field']] > 0): echo (date('Y-m-d',$business[$vo['field']])); endif; ?>
										<?php elseif($vo['field'] == 'customer_id'): ?>
											<a href="<?php echo U('customer/view','id='.$business['customer_id']);?>"><?php echo ($business['customer']['name']); ?></a>
										<?php elseif($vo['field'] == 'contacts_id'): ?>
											<?php echo ($business['contacts']['name']); ?>
										<?php elseif($business[$vo['field']]): ?>
											<?php echo ($business[$vo['field']]); endif; ?>
										</span>
									</td>
								<?php if($i%2 != 0): ?></tr><?php endif; ?>
								<?php if($i%2 == 0 && count($field_list) == $j): ?><td colspan="2">&nbsp;</td>
								</tr><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
					<!-- 产品 -->
					<div class="header1">
						<div class="pull-left two-title" style="margin:15px 0; ">
							<?php echo L('RELATED_PRODUCTS');?>
							<span class="badge badge-success"><?php if($business['product_count']): echo ($business['product_count']); endif; ?></span>
						</div>
					</div>

					<table class="table table-bordered" id="no-input-border" width="95%" border="0" cellspacing="1" cellpadding="0">
						<thead>
							<tr style="background-color:#E0E8FF;text-align:center;">
								<td class="span2">产品</td>
								<td>数量</td>
								<td>单价</td>
								<td>折扣率(%)</td>
								<td>税率(%)</td>
								<td>小计</td>
								<td class="span2">备注</td>
							</tr>
						</thead>
						
						<tbody>
							<?php if(is_array($business["product"])): $i = 0; $__LIST__ = $business["product"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="hidden" name="product[<?php echo ($key+1); ?>][r_id]" value="<?php echo ($vo["id"]); ?>"/>
								<tr id="row_<?php echo ($key+1); ?>">
									<td>
										<?php echo ($vo["info"]["name"]); ?>
									</td>
									<td>
										<?php echo ($vo["amount"]); ?>
									</td>
									<td>
										<?php echo ($vo["unit_price"]); ?>
									</td>
									<td>
										<?php echo ($vo["discount_rate"]); ?>
									</td>
									<td>
										<?php echo ($vo["tax_rate"]); ?>
									</td>
									<td>
										<?php echo ($vo["subtotal"]); ?>
									</td>
									<td>
										<?php echo ($vo["description"]); ?>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
						<tbody id="add_products">
						</tbody>
						<tbody>
							<tr style="background-color:#FFFFF3;color:#808080">
								<td>合计</td>
								<td style="text-align:center" id="total_amount_val"><?php echo ($total_amount); ?></td>
								<td></td>
								<td></td>
								<td></td>
								<td style="text-align:center" id="subtotal_val" colspan="2"><?php echo ($vo["subtotal_val"]); ?></td>
							</tr>
							<tr style="background-color:#FFFFF1">
								<td>其他费用</td>
								<td style="text-align:center"><?php echo ($vo["discount_price"]); ?></td>
								<td></td>
								<td></td>
								<td>最终费用</td>
								<td  style="text-align:center" colspan="2"><?php echo ($vo["sales_price"]); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade back_box" id="tab8">
				<div class="header1">
					<div class="pull-left two-title" ><?php echo L('PROMOTE_THE_HISTORY');?></div>
					<div style="clear:both;"></div>
				</div>
				<table class="table table-hover">
					<?php if($business["bsList"] == null): ?><tr>
							<th><?php echo L('THERE_IS_NO_DATA');?></th>
						</tr>
					<?php else: ?>
					<thead>
						<tr>
							<th><?php echo L('TIME');?></th>
							<th><?php echo L('PHASE');?></th>								
							<th><?php echo L('STAGE_OF_DESCRIPTION');?></th>
							<th><?php echo L('PRINCIPAL');?></th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($business["bsList"])): $i = 0; $__LIST__ = $business["bsList"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td width="15%">
								<?php if($vo['update_time'] != 0): echo (date("Y-m-d H:i",$vo["update_time"])); ?>
								<?php else: ?>
									<?php echo (date('Y-m-d H:i',$business["create_time"])); endif; ?>
							</td>
							<td><?php echo ($vo["status_name"]); ?></td>
							<td><?php echo ($vo["description"]); ?></td>
							<td><?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody><?php endif; ?>
				</table>
			</div>
			<div class="tab-pane fade back_box" id="tab3">
				<div class="header1">
					<div class="pull-left two-title" ><?php echo L('COMMUNICATION_LOGS');?></div>
					<div class="pull-right"> <?php if($business['is_deleted'] != 1): ?><a href="javascript:void(0);" class="add_log btn btn-primary"><?php echo L('ADD');?></a><?php endif; ?>
					</div>
					<div style="clear:both;"></div>
				</div>
				<table class="table table-hover">
					<?php if($business["log"] == null): ?><div>
							<?php echo L('THERE_IS_NO_DATA');?>
						</div>
					<?php else: ?>
						<?php if(is_array($business["log"])): $i = 0; $__LIST__ = $business["log"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="caption">
								 <?php echo ($vo["subject"]); ?>
							</div>
							<div class="mar-left2">
								<?php if(strlen($vo['content']) > 100): ?><div id="slog_<?php echo ($vo["log_id"]); ?>" class="pad-right3">
									<?php echo (msubstr($vo["content"],0,100)); ?>
									<a class="more" rel="<?php echo ($vo["log_id"]); ?>" href="javascript:void(0)"><?php echo L('READ_MORE');?></a>
									</div>
									<div id="llog_<?php echo ($vo["log_id"]); ?>" class="hide ">
										<div class="pad-right3 pres" ><?php echo ($vo["content"]); ?></div>
									</div>
								<?php else: ?>
									<div class="pad-right3 pres" ><?php echo ($vo["content"]); ?></div><?php endif; ?>
							</div>
							<div class="editors">
								<?php if($business['is_deleted'] != 1): ?><a href="javascript:void(0)" rel="<?php echo ($vo["log_id"]); ?>" class="edit_log"><?php echo L('COMPILE');?></a>&nbsp; <a href="<?php echo U('log/delete','r=RBusinessLog&id='.$vo['log_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a><?php endif; ?>&nbsp;&nbsp;&nbsp;
								<?php if(!empty($vo["owner"]["user_name"])): ?><img style="margin-top:-3px;" src="__PUBLIC__/img/user.png">&nbsp;
									<a class="role_info name-colors" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?> &nbsp; 
								<img src="__PUBLIC__/img/time_annoce.png"/>&nbsp;<span class="name-colors name-colors" ><?php echo (date("Y-m-d  g:i:s a",$vo["create_date"])); ?></span> &nbsp; 
								<?php if(!empty($vo["create_date"])): ?>&nbsp;<?php endif; ?>
								<?php if(C('ismobile') == 1): ?><br/><?php endif; ?>
							</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</table>
			</div>
			<div class="tab-pane fade back_box" id="tab7">
				<div class="header1">
					<div class="pull-left two-title" ><?php echo L('THE_RELEVANT_CONTRACT');?></div>
					<div class="pull-right"> 
					<?php if($business['is_deleted'] == 0): ?><a href="javascript:void(0);" class="btn btn-primary add_contract"><?php echo L('ADD');?></a><?php endif; ?>
					</div>
					<div style="clear:both;"></div>
				</div>
				<table class="table table-hover">
					<?php if($business["contract"] == null): ?><tr>
							<td><?php echo L('THERE_IS_NO_DATA');?></td>
						</tr>
					<?php else: ?> 
						<tr>
							<td width="10%">&nbsp;</td>
							<td><?php echo L('CONTRACT_NO');?></td>
							<td><?php echo L('SIGNING_TIME');?></td>
							<td><?php echo L('OFFER');?></td>
							<td><?php echo L('PRINCIPAL');?></td>
							<td><?php echo L('CREATION_TIME');?></td>
						</tr>
						<?php if(is_array($business["contract"])): $i = 0; $__LIST__ = $business["contract"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td class="tdleft"><?php if($business['is_deleted'] == 0): ?><a  href="<?php echo U('contract/view','id='.$vo['contract_id']);?>"><?php echo L('CHECK');?></a> &nbsp; <a href="<?php echo U('contract/edit','id='.$vo['contract_id']);?>"><?php echo L('COMPILE');?></a><?php endif; ?></td>
								<td>
									<a href="<?php echo U('contract/view','id='.$vo['contract_id']);?>"><?php echo ($vo["number"]); ?></a>
								</td>									
								<td><?php if(!empty($vo["due_time"])): echo (date("Y-m-d",$vo["due_time"])); endif; ?></td>
								<td>
									<?php echo ($vo["price"]); ?>
								</td>
								<td>
									<?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?>
								</td>
								<td><?php if(!empty($vo["create_time"])): echo (date("Y-m-d",$vo["create_time"])); endif; ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</table>
			</div>
			<!-- 产品 -->
			<!-- <div class="tab-pane fade back_box" id="tab2">
				<div class="header1">
					<div class="pull-left two-title" ><?php echo L('RELATED_PRODUCTS');?></div>
					<div class="pull-right"> 
					<?php if($business['is_deleted'] == 0): ?><a href="javascript:void(0);" class="btn btn-primary add_product"><?php echo L('ADD');?></a><?php endif; ?>
					</div>
					<div style="clear:both;"></div>
				</div>
				<table class="table">
					<?php if($business["product"] == null): ?><tr>
							<td><?php echo L('THERE_IS_NO_DATA');?> </td>
						</tr>
					<?php else: ?> 
						<thead>
							<tr>
								<td>&nbsp;</td>
								<td><?php echo L('PRODUCT_NAME');?></td>
								<?php if(C('ismobile') != 1): ?><td><?php echo L('PRODUCT_CATEGORY');?></td>
								<td><?php echo L('OFFER');?>(<?php echo L('YUAN');?>)</td><?php endif; ?>
								<td><?php echo L('TRADING');?>(<?php echo L('YUAN');?>)</td>
								<td><?php echo L('THE_COST_PRICE');?>(<?php echo L('YUAN');?>)</td>
								<?php if(C('ismobile') != 1): ?><td width="30%"><?php echo L('REMARK');?></td><?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($business["product"])): $i = 0; $__LIST__ = $business["product"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td class="tdleft">
									<?php if($business['is_deleted'] == 0): ?><a href="<?php echo U('product/mdelete', 'r=rBusinessProduct&id='.$vo['id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>&nbsp;<a class="edit_product" href="javascript:void(0)" rel="<?php echo ($vo["id"]); ?>"><?php echo L('COMPILE');?></a><?php endif; ?></td>
									<td>
										<a href="<?php echo U('product/view', 'id='.$vo['product_id']);?>"><?php echo ($vo["info"]["name"]); ?></a>
									</td>
									<?php if(C('ismobile') != 1): ?><td>
										<?php echo ($vo["category_name"]); ?>
									</td>
									<td>
										<?php if($vo['estimate_price'] > 0): echo ($vo["estimate_price"]); endif; ?>
									</td><?php endif; ?>
									<td>
										<?php if($vo['sales_price'] > 0): echo ($vo["sales_price"]); endif; ?>
									</td>
									<td>
										<?php if($vo['info']['cost_price'] > 0): echo ($vo["info"]["cost_price"]); endif; ?>
									</td>
									<?php if(C('ismobile') != 1): ?><td>
										<?php echo ($vo["description"]); ?>
									</td><?php endif; ?>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody><?php endif; ?>
				</table>
			</div> -->
			<div class="tab-pane fade back_box" id="tab4">
				<div class="header1">
					<div class="pull-left two-title" ><?php echo L('RELATED_TASKS');?></div>
					<div class="pull-right"> 
					<?php if($business['is_deleted'] == 0): ?><a href="javascript:void(0);" class="btn btn-primary add_task"><?php echo L('ADD');?></a><?php endif; ?>
					</div>
					<div style="clear:both;"></div>
				</div>
				<table class="table">
					<?php if($business["task"] == null): ?><tr>
							<td><?php echo L('THERE_IS_NO_DATA');?> </td>
						</tr>
					<?php else: ?> 
						<tr>
							<td>&nbsp;</td>
							<td><?php echo L('THEME');?></td>
							<td><?php echo L('STATE');?></td>
							<td>负责人</td>
							<td>任务相关人</td>
							<td><?php echo L('DUE_DATE');?></td>
							<td><?php echo L('MODIFICATION_TIME');?></td>
						</tr>
						<?php if(is_array($business["task"])): $i = 0; $__LIST__ = $business["task"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td class="tdleft" width="10%">
									<?php if($business['is_deleted'] == 0): ?><a href="<?php echo U('task/view','id='.$vo['task_id']);?>"><?php echo L('CHECK');?></a>&nbsp; <a href="<?php echo U('task/delete','id='.$vo['task_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>&nbsp;
									<?php if($vo["isclose"] == 1): ?><a href="<?php echo U('task/open','id='.$vo['task_id']);?>"><?php echo L('OPEN');?></a><?php else: ?><a href="<?php echo U('task/close','id='.$vo['task_id']);?>"><?php echo L('CLOSE');?></a><?php endif; endif; ?>
								</td>
								<td>
									<?php echo ($vo["subject"]); ?>
								</td>
								<td>
									<?php echo ($vo["status"]); ?>
								</td>
								<td>
									<?php if(!empty($vo["owner"])): if(is_array($vo["owner"])): $i = 0; $__LIST__ = $vo["owner"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a class="role_info" rel="<?php echo ($v["role_id"]); ?>" href="javascript:void(0)"><?php echo ($v["user_name"]); ?></a>,<?php endforeach; endif; else: echo "" ;endif; endif; ?>
								</td>
								<td>
									<?php if(!empty($vo["about_roles"])): if(is_array($vo["about_roles"])): $i = 0; $__LIST__ = $vo["about_roles"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a class="role_info" rel="<?php echo ($v["role_id"]); ?>" href="javascript:void(0)"><?php echo ($v["user_name"]); ?></a>,<?php endforeach; endif; else: echo "" ;endif; endif; ?>
								</td>
								<td>
									<?php if(!empty($vo["due_date"])): echo (date("Y-m-d g:i:s a",$vo["due_date"])); endif; ?>
								</td>
								<td>
									<?php if(!empty($vo["update_date"])): echo (date("Y-m-d g:i:s a",$vo["update_date"])); endif; ?>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</table>
			</div>
			<div class="tab-pane fade back_box" id="tab5">
				<div class="header1">
					<div class="pull-left two-title" ><?php echo L('RELATED_SCHEDULE');?></div>
					<div class="pull-right"> 
					<?php if($business['is_deleted'] == 0): ?><a href="javascript:void(0);" class="btn btn-primary add_event"><?php echo L('ADD');?></a><?php endif; ?>
					</div>
					<div style="clear:both;"></div>
				</div>
				<table class="table">
					<?php if($business["event"] == null): ?><tr>
							<td><?php echo L('THERE_IS_NO_DATA');?> </td>
						</tr>
					<?php else: ?> 
						<tr>
							<td width="12%">&nbsp;</td>
							<td><?php echo L('THEME');?></td>
							<td><?php echo L('SITE');?></td>
							<td><?php echo L('PRINCIPAL');?></td>
							<td><?php echo L('THE_START_TIME');?></td>
							<td><?php echo L('THE_END_TIME');?></td>
						</tr>
						<?php if(is_array($business["event"])): $i = 0; $__LIST__ = $business["event"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td class="tdleft" width="10%">
									<?php if($business['is_deleted'] == 0): ?><a href="<?php echo U('event/view', 'id='.$vo['event_id']);?>"><?php echo L('CHECK');?></a>&nbsp; <a href="<?php echo U('event/delete', 'id='.$vo['event_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>&nbsp; 
									<?php if($vo['isclose'] == 0): ?><a href="<?php echo U('event/close', 'id='.$vo['event_id']);?>"><?php echo L('CLOSE');?></a><?php else: ?><a href="<?php echo U('event/open','id='.$vo['event_id']);?>"><?php echo L('OPEN');?></a><?php endif; endif; ?>
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
								<td>
									<?php if(!empty($vo["start_date"])): echo (date("Y-m-d g:i:s a",$vo["start_date"])); endif; ?>
								</td>
								<td>
									<?php if(!empty($vo["end_date"])): echo (date("Y-m-d g:i:s a",$vo["end_date"])); endif; ?>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</table>
			</div>
			<div class="tab-pane fade back_box" id="tab6">
				<div class="header1">
					<div class="pull-left two-title" ><?php echo L('THE_RELEVANT_DOCUMENTS');?></div>
					<div class="pull-right"> 
					<?php if($business['is_deleted'] == 0): ?><a href="javascript:void(0);" class="btn btn-primary add_file"><?php echo L('ADD');?></a><?php endif; ?>
					</div>
					<div style="clear:both;"></div>
				</div>
				<table class="table table-hover">
					<?php if($business["file"] == null): ?><tr>
							<td><?php echo L('THERE_IS_NO_DATA');?> </td>
						</tr>
					<?php else: ?> 
						<tr>
							<td>&nbsp;</td>
							<td><?php echo L('FILENAME');?></td>
							<td><?php echo L('SIZE');?></td>
							<td><?php echo L('ADDER');?></td>
							<td><?php echo L('ADDTIME');?></td>
						</tr>
						<?php if(is_array($business["file"])): $i = 0; $__LIST__ = $business["file"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td class="tdleft">
									<?php if($business['is_deleted'] == 0): ?><a href="<?php echo U('file/delete', 'r=RBusinessFile&id='.$vo['file_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a><?php endif; ?>
								</td>
								<td>
									<a target="_blank" href="<?php echo ($vo["file_path"]); ?>"><?php echo ($vo["name"]); ?></a>
								</td>
								<td>
									<?php echo ($vo["size"]); echo L('BYTE');?>
								</td>
								<td>
									<?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?>
								</td>
								<td>
									<?php if(!empty($vo["create_date"])): echo (date("Y-m-d g:i:s a",$vo["create_date"])); endif; ?>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</table>
			</div>
		</div>
		<div class="span2 bs-docs-sidebar mar-lefts2" id="right_list" >
			<ul class="nav nav-list bs-docs-sidenav  span2 widths" >
				<li class="first-li"><span class="spans1">编辑详情</span></li>
				<li><a href="javascript:void(0);" class="advance"><img src="__PUBLIC__/img/youce.png"/>&nbsp;&nbsp;&nbsp;<?php echo L('BOOST');?></a></li>
				<li><a href="javascript:void(0);" class="add_product"><img src="__PUBLIC__/img/youce.png"/>&nbsp;&nbsp;&nbsp;<?php echo L('ADD_PRODUCT');?></a></li>
				<li><a href="javascript:void(0);" class="add_log"><img src="__PUBLIC__/img/youce.png"/>&nbsp;&nbsp;&nbsp;<?php echo L('ADD_THE_COMMUNICATION_LOG');?></a></li>
				<li><a href="javascript:void(0);" class="add_task"><img src="__PUBLIC__/img/youce.png"/>&nbsp;&nbsp;&nbsp;<?php echo L('ADD_TASKS');?></a></li>
				<li><a href="javascript:void(0);" class="add_event"><img src="__PUBLIC__/img/youce.png"/>&nbsp;&nbsp;&nbsp;<?php echo L('ADD_THE_SCHEDULE');?></a></li>
				<li><a href="javascript:void(0);" class="add_file"><img src="__PUBLIC__/img/youce.png"/>&nbsp;&nbsp;&nbsp;<?php echo L('ADD_ATTACHMENT');?></a></li>
			</ul>
		</div>
	</div>
</div>
<div class="hide" id="dialog-file" title="<?php echo L('ADD_ATTACHMENT');?>">loading...</div>
<div class="hide" id="dialog-log" title="<?php echo L('ADD_THE_LOG');?>">loading...</div>
<div class="hide" id="dialog-log-edit" title="<?php echo L('EDIT_LOG');?>">loading...</div>
<div class="hide" id="dialog-task" title="<?php echo L('ADD_TASKS');?>">loading...</div>
<div class="hide" id="dialog-event" title="<?php echo L('ADD_THE_SCHEDULE');?>">loading...</div>
<div class="hide" id="dialog-product" title="<?php echo L('ADD_PRODUCT');?>">loading...</div>
<div class="hide" id="dialog-edit" title="<?php echo L('MODIFY_BUSINESS_PRODUCT_INFORMATION');?>">loading...
<div class="hide" id="dialog-role-info" title="<?php echo L('Employee_information');?>">loading...</div>
<div class="hide" id="dialog-contract" title="<?php echo L('ADD_THE_CONTRACT');?>">loading...</div>
<div class="hide" id="dialog-advance" title="<?php echo L('OPPORTUNITIES_TO_ADVANCE');?>">loading...</div>
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

$("#dialog-role-info").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-advance").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-contract").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-file").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight:400,
	position: ["center",100]
});
$("#dialog-log").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight:400,
	position: ["center",100]
});
$("#dialog-task").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	position: ["center",100]
});
$("#dialog-event").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight:400,
	position: ["center",100]
});
$("#dialog-log-edit").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-product").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight:400,
	position: ["center",100]
});
$("#dialog-edit").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight:400,
	position: ["center",100]
});
$(".add_file").click(function(){
	$('#dialog-file').dialog('open');
	$('#dialog-file').load('<?php echo U("file/add", "r=RBusinessFile&module=business&id=".$business["business_id"]);?>');
});
$(".add_log").click(function(){
	$('#dialog-log').dialog('open');
	$('#dialog-log').load('<?php echo U("log/add", "r=RBusinessLog&module=business&id=".$business["business_id"]);?>');
});
$(".edit_log").click(function(){
	$log_id = $(this).attr('rel');
	$('#dialog-log-edit').dialog('open');
	$('#dialog-log-edit').load('<?php echo U("log/edit","id=");?>'+$log_id);
});
$(".add_task").click(function(){
	$('#dialog-task').dialog('open');
	$('#dialog-task').load('<?php echo U("task/add","r=RBusinessTask&module=business&id=".$business["business_id"]);?>');
});
$(".add_event").click(function(){
	$('#dialog-event').dialog('open');
	$('#dialog-event').load('<?php echo U("event/add","r=RBusinessEvent&module=business&id=".$business["business_id"]);?>');
});
$(".add_product").click(function(){
	$('#dialog-product').dialog('open');
	$('#dialog-product').load('<?php echo U("product/adddialog","r=RBusinessProduct&module=business&id=".$business["business_id"]);?>');
});
$(".edit_product").click(function(){
	id = $(this).attr('rel');
	$('#dialog-edit').dialog('open');
	$('#dialog-edit').load('<?php echo U("product/editdialog","r=RBusinessProduct&id");?>'+id);
});
$(".role_info").click(function(){
	$role_id = $(this).attr('rel');
	$('#dialog-role-info').dialog('open');
	$('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
});
$(".add_contract").click(function(){
	$('#dialog-contract').dialog('open');
	$('#dialog-contract').load('<?php echo U("contract/add","business_id=");?>'+<?php echo ($business["business_id"]); ?>);
});
$(".advance").click(function(){
	$('#dialog-advance').dialog('open');
	$('#dialog-advance').load('<?php echo U("business/advance","id=".$business["business_id"]);?>');
});
$(".more").click(function(){
	log_id = $(this).attr('rel');
	$('#llog_'+log_id).attr('class','');
	$('#slog_'+log_id).attr('class','hide');
});
</script>

</body>
</html>