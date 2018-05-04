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
</div><div class="container">	<div class="page-header">		<h4><?php echo L('FINANCE');?><small> - <a href="<?php echo U('finance/index','t=receivables');?>"><?php echo L('RECEIVABLES');?></a> | 		<a href="<?php echo U('finance/index','t=payables');?>"><?php echo L('PAYABLES');?></a> | 		<a href="<?php echo U('finance/index','t=receivingorder');?>"><?php echo L('RECEIVINGORDER');?></a> | 		<a class="active" href="<?php echo U('finance/index','t=paymentorder');?>"><?php echo L('PAYMENTORDER');?></a> | <a href="<?php echo U('finance/analytics');?>"><?php echo L('STATISTICS');?></a></small> </h4>	</div>	<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>	<div class="row">		<div class="span12">			<form action="<?php echo U('finance/add','t=paymentorder');?>" method="post">								<table class="table table-hover">					<thead>						<tr>							<td>&nbsp;</td>							<td><input name="submit" class="btn btn-primary" type="submit" value="<?php echo L('SAVE');?>"/> &nbsp;  <?php if(C('ismobile') != 1): ?><input name="submit" class="btn btn-primary" type="submit" value="<?php echo L('SAVE AND NEW');?>"/> &nbsp;<?php endif; ?> <input class="btn" type="button" onclick="javascript:history.go(-1)" value="<?php echo L('CANCEL');?>"/></td>						</tr>					</thead>					<tfoot>						<tr>							<td>&nbsp;</td>							<td><input name="submit" class="btn btn-primary" type="submit" value="<?php echo L('SAVE');?>"/> &nbsp;  <?php if(C('ismobile') != 1): ?><input name="submit" class="btn btn-primary" type="submit" value="<?php echo L('SAVE AND NEW');?>"/> &nbsp;<?php endif; ?> <input class="btn" type="button" onclick="javascript:history.go(-1)" value="<?php echo L('CANCEL');?>"/></td>						</tr>					</tfoot>					<tbody>						<tr>							<th colspan="2"><?php echo L('ADD RECEIVABLES');?></th>						</tr>						<tr>							<td class="tdleft" width="20%" valign="middle"><?php echo L('PAYMENTS SINGLE NUMBER');?></td>							<td valign="middle"><input name="name" id="name" class="text-input large-input" type="text" value="<?php echo L('AUTOMATIC_GENERATION');?>"/></td>						</tr>						<tr>							<td class="tdleft" width="20%" valign="middle"><?php echo L('OWNER_ROLE');?></td>							<td valign="middle"><input name="owner_role_id" id="owner_role_id" type="hidden" value="<?php echo (session('role_id')); ?>"/><input name="owner_name" id="owner_name" class="text-input large-input" type="text" value="<?php echo (session('name')); ?>"/></td>						</tr>						<tr>							<td class="tdleft" width="20%" valign="middle"><?php echo L('PAYABLES');?></td>							<td valign="middle"><input name="payables_id" id="payables_id" type="hidden" /><input name="payables" id="payables" class="text-input large-input" type="text" /></td>						</tr>						<tr>							<td class="tdleft" valign="middle"><?php echo L('PAYMENTS');?></td>							<td valign="middle"><input class="text-input large-input" id="money" placeholder="0.00" name="money" type="text" /></td>						</tr>						<tr>							<td class="tdleft" valign="middle"><?php echo L('PAYMENT TIME');?></td>							<td valign="middle"><input onclick="WdatePicker()"  type="text" id="pay_time" name="pay_time"/></td>						</tr>						<tr>							<td class="tdleft" valign="middle"><?php echo L('STATUS');?></td>							<td valign="middle"><input  type="radio" checked="checked" name="status" value="0"/> <?php echo L('NOT CLOSING');?> <input type="radio" name="status" value="1"/> <?php echo L('HAS CLOSING');?> </td>						</tr>						<tr>							<td class="tdleft" valign="middle"><?php echo L('DESCRIPTION');?></td>							<td valign="middle"><textarea class="span6" rows="6" name="description"></textarea></td>						</tr>					</tbody>				</table>			</form>		</div> <!-- End #tab1 -->		</div> <!-- End #main-content -->	</div><div id="dialog-message" title="<?php echo L('SELECT THE PAYABLES');?>">loading...</div><div id="dialog-message2" title="<?php echo L('SELECT THE LEADER');?>">loading...</div><script type="text/javascript"><?php if(C('ismobile') == 1): ?>width=$('.container').width() * 0.9;<?php else: ?>width=800;<?php endif; ?>$("#dialog-message").dialog({	autoOpen: false,	modal: true,	width: width,	maxHeight: 400,	buttons: {		"Ok": function () {			var item = $('input:radio[name="payables"]:checked').val();			var name = $('input:radio[name="payables"]:checked').parent().next().html();			if(item){				$('#payables').val(name);				$('#payables_id').val(item);			}			$(this).dialog("close");		},		"Cancel": function () {			$(this).dialog("close");		}	},	position: ["center", 100]});$("#dialog-message2").dialog({	autoOpen: false,	modal: true,	width: width,	maxHeight: 400,	buttons: {		"Ok": function () {			var item = $('input:radio[name="owner"]:checked').val();			var name = $('input:radio[name="owner"]:checked').parent().next().html();			if(item){				$('#owner_name').val(name);				$('#owner_role_id').val(item);			}			$(this).dialog("close");		},		"Cancel": function () {			$(this).dialog("close");		}	},	position: ["center", 100]});$(function(){	$("input[name='submit']").click(function(){					if($("#name").val() == null || $("#name").val() == ""){			alert('付款单名不能为空！');			return false;		}	})	$("#payables").click(		function(){			$('#dialog-message').dialog('open');			$('#dialog-message').load('<?php echo U("finance/listdialog","t=payables");?>');		}	);	$("#owner_name").click(		function(){			$('#dialog-message2').dialog('open');			$('#dialog-message2').load('<?php echo U("user/listDialog","by=all");?>');		}	);	$('#money').blur(function(){		var payables_id = $('#payables_id').val();		var input_price = parseInt(parseFloat($('#money').val())*100);		if((payables_id != null && payables_id != '') && (input_price !=null && input_price != '')){			$.ajax({				'type':'get',				'data': {'id':payables_id},				'dataType':'json',				'url':'<?php echo U("finance/getpayablesmoney");?>',				'success':function(data){					if(data.data.total != 0){						if((input_price + parseInt(parseFloat(data.data.paymentorder)*100))/100 > data.data.total){							alert('<?php echo L('EXCEED THE AMOUNT OF PAYMENT');?>');						}					}				}			});		}	});});</script>
</body>
</html>