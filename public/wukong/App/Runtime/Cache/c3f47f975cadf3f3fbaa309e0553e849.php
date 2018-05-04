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
<script src="__PUBLIC__/js/chart/highcharts.js"></script>
<script src="__PUBLIC__/js/chart/modules/exporting.js"></script>
<script src="__PUBLIC__/js/chart/modules/funnel.js"></script>

<div class="container">
	<div class="page-header" style="border:none; font-size:14px;">
		<ul class="nav nav-tabs">
		  <li>
			<a href="<?php echo U('business/index');?>"><img src="__PUBLIC__/img/shangji.png"/>&nbsp; <?php echo L('BUSINESS');?></a>
		  </li>
		  <li class="active"><a href="<?php echo U('business/analytics');?>"><img src="__PUBLIC__/img/tongji.png"/> &nbsp;<?php echo L('STATISTICS');?></a></li>
		  <li><a href="http://5kcrm.com/index.php?m=doc&a=index&id=26" target="_blank" style="font-size: 12px;color: rgb(255, 102, 0);"><img width="20px;" src="__PUBLIC__/img/help.png"/> <?php echo L('HELP');?></a></li>
		</ul>
	</div>
	<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
	<div class="row">
		<div class="span12">
			<ul class="nav pull-left">
				<li class="pull-left">
					<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="" method="get">
						<ul class="nav pull-left">
							<li class="pull-left">
								<?php echo L('CHOOSE_DEPARTMENT');?>&nbsp; <select style="width:auto" name="department" id="department" onchange="changeRole()">
									<option class="all" value="all"><?php echo L('ALL');?></option>
									<?php if(is_array($departmentList)): $i = 0; $__LIST__ = $departmentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["department_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								<?php echo L('SELECT_EMPLOYEES');?>&nbsp; <select style="width:auto" name="role" id="role" onchange="changeCondition()">
									<option class="all" value="all"><?php echo L('ALL');?></option>
									<?php if(is_array($roleList)): $i = 0; $__LIST__ = $roleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["role_id"]); ?>"><?php echo ($vo["role_name"]); ?>-<?php echo ($vo["user_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								<?php echo L('SELECT_A_DATE');?>&nbsp; <?php echo L('CONG');?><input type="text" id="start_time" name="start_time" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" value="<?php echo ($_GET['start_time']); ?>"/><?php echo L('ZHI');?><input type="text" id="end_time" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" name="end_time" class="Wdate" value="<?php echo ($_GET['end_time']); ?>" />&nbsp;&nbsp;
							</li>
							<li class="pull-left"><input type="hidden" name="m" value="business"/><input type="hidden" name="a" value="analytics"/>
							<?php if($_GET['by']!= null): ?><input type="hidden" name="by" value="<?php echo ($_GET['by']); ?>"/><?php endif; ?>
							<button type="submit" class="btn "><?php echo L('SEARCH');?></button></li>
						</ul>
					</form>
				</li>				
			</ul>
		</div>
		<div class="span2 knowledgecate">
			<ul class="nav nav-list">
				<li class="active">
					<a href="javascript:void(0);"><?php echo L('CHOOSE_STATISTICS_CONTENT');?></a>
				</li>
				<li id="report"><a id="show_report" class="active" href="javascript:void(0)"><i class="icon-white icon-chevron-right"></i><?php echo L('BUSINESS_STATISTICS');?></a></li>
				<li id="status"><a id="show_status" href="javascript:void(0)"><i class="icon-white icon-chevron-right"></i><?php echo L('SALES_FUNNEL_FIGURE');?></a></li>
				<li id="money"><a id="show_money" href="javascript:void(0)"><i class="icon-white icon-chevron-right"></i><?php echo L('BUSINESS_AMOUNT_FIGURE');?></a></li>
				<li id="source"><a id="show_source" href="javascript:void(0)"><i class="icon-white icon-chevron-right"></i><?php echo L('SOURCES_OF_STATISTICAL_FIGURE');?></a></li>
				<li id="day"><a id="show_day" href="javascript:void(0)"><i class="icon-white icon-chevron-right"></i><?php echo L('TREND_ANALYSIS_BY_THE_DAY');?></a></li>
				<li id="week"><a id="show_week" href="javascript:void(0)"><i class="icon-white icon-chevron-right"></i><?php echo L('TREND_ANALYSIS_BY_THE_WEEK');?></a></li>
				<li id="month"><a id="show_month" href="javascript:void(0)"><i class="icon-white icon-chevron-right"></i><?php echo L('TREND_ANALYSIS_BY_THE_MONTH');?></a></li>
			</ul>
		</div>
		<div class="span10" id="an_chart">
			<div id="report_content">
				<table class="table table-hover">
					<thead>
						<tr>
							<th><?php echo L('STAFF');?></th>
							<th><?php echo L('ADD_THE_BUSINESS_OPPORTUNITIES');?></th>
							<th><?php echo L('RESPONSIBLE_FOR_BUSINESS_OPPORTUNITIES');?></th>
							<th><?php echo L('CLINCH_A_DEAL_THE_BUSINESS');?></th>
							<th><?php echo L('FOLLOW_UP_THE_BUSINESS');?></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td><?php echo L('SUM_TO');?></td>
							<td colspan="4"><span style="color:red;"><?php echo L('ADD_OPPORTUNITIES',array($total_report['add_count']));?> &nbsp; <?php echo L('SOMEONE_IS_RESPONSIBLE_FOR_THE_BUSINESS',array($total_report['own_count']));?>&nbsp; <?php echo L('CLINCH_A_DEAL_THE_BUSINESS_OPPORTUNITIES',array($total_repor['success_count']));?>&nbsp; <?php echo L('FOLLOW_UP_THE_BUSINESS_T',array($total_report['deal_count']));?></span> </td>
						</tr>
					</tfoot>
					<tbody>
						<?php if(is_array($reportList)): $i = 0; $__LIST__ = $reportList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><a class="role_info" rel="<?php echo ($vo["user"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["user"]["user_name"]); ?></a></td>
							<td><?php echo ($vo["add_count"]); ?></td>
							<td><a href="<?php echo U('business/index');?>&field=owner_role_id&search=<?php echo ($vo["user"]["role_id"]); ?>&by=sub"><?php echo ($vo["own_count"]); ?></a></td>
							<td><a href="<?php echo U('business/index');?>&field=owner_role_id&search=<?php echo ($vo["user"]["role_id"]); ?>&by=transformed"><?php echo ($vo["success_count"]); ?></a></td>
							<td><?php echo ($vo["deal_count"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			<div id="source_content" class="hidden">
				<div id="canvas_resource" style="margin: 0 auto"><?php echo L('TEMPORARILY_NO_DATA');?></div>
			</div>
			<div id="status_content" class="hidden">
				<div id="canvas_status"  style="margin: 0 auto"><?php echo L('TEMPORARILY_NO_DATA');?></div>
			</div>
			<div id="money_content" class="hidden">
				<div id="canvas_money" style="margin: 0 auto"><?php echo L('TEMPORARILY_NO_DATA');?></div>
			</div>
			<div id="day_content" class="hidden">
				<div id="canvas_day" style="margin: 0 auto"><?php echo L('TEMPORARILY_NO_DATA');?></div>
			</div>
            <div id="week_content" class="hidden">
				<div id="canvas_week" style="margin: 0 auto"><?php echo L('TEMPORARILY_NO_DATA');?></div>
			</div>
            <div id="month_content" class="hidden">
				<div id="canvas_month" style="margin: 0 auto"><?php echo L('TEMPORARILY_NO_DATA');?></div>
			</div>
		</div>
	</div>
</div>
<div class="hide" id="dialog-import" title="<?php echo L('IMPORT_DATA');?>">loading...</div>
<div class="hide" id="dialog-role-info" title="<?php echo L('EMPLOYEE_INFORMATION');?>">loading...</div>
<script type="text/javascript">
	<?php if(C('ismobile') == 1): ?>width=$('.container').width() * 0.9;<?php else: ?>width=800;<?php endif; ?>
	$("#dialog-role-info").dialog({
		autoOpen: false,
		modal: true,
		width: width,
		maxHeight: 400,
		position: ["center",100]
	});
	
	$(".role_info").click(function(){
		$role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
	});
	
	$(function () {
		var canvas_width = $('#an_chart').width();
		var canvas_height = $('#an_chart').height();
		$('#canvas_resource').css({width:canvas_width});
		$('#canvas_status').css({width:canvas_width*0.6});
		$('#canvas_money').css({width:canvas_width});
		$('#canvas_week').css({width:canvas_width});
		$('#canvas_month').css({width:canvas_width});
		$('#canvas_day').css({width:canvas_width});
		var chart1;
		$(document).ready(function () {
			Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
				return {
					radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
					stops: [
						[0, color],
						[1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
					]
				};
			});
			<?php if($total_report["add_count"] > 0): ?>// Build the chart1
			$('#canvas_resource').highcharts({
				chart1: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: '<?php echo L('SOURCE_OF_BUSINESS_STATISTICS_SUM_TO',array($total_report['add_count']));?>'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>',
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: false
						},
						showInLegend: true
					}
				},
				series: [{
					type: 'pie',
					name: '<?php echo L('THE_SOURCE_OF');?>',
					data: [
						<?php echo ($source_count); ?>
					]
				}]
			});
			
			
			var chart2;
			// Build the chart2
			$('#canvas_money').highcharts({
				chart2: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: '<?php echo L('AMOUNT_OF_BUSINESS_STATISTICS_SUM_TO',array($total_report['add_count']));?>'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>',
					percentageDecimals: 1
				},	
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: false
						},
						showInLegend: true
					}
				},
				series: [{
					type: 'pie',
					name: '<?php echo L('THE_AMOUNT_OF');?>',
					data: [
						<?php echo ($money_count); ?>
					]
				}]
			});
			
			var chart3;
			// Build the chart3
			$('#canvas_day').highcharts({
				chart3: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
                title: {
                    text: '<?php echo L('TREND_ANALYSIS_BY_THE_DAY');?>'
                },
                xAxis: {
                    categories: [<?php echo ($day_count); ?>],
                    labels: { 
                      rotation:60,
                      y:40,
                      x:15,
                      step:3
                    }
                },
                yAxis: {
                    title: {
                        text: null
                    },
                    min: 0,
                },
                legend: {
                    align: 'left',
                    verticalAlign: 'top',
                    y: 0,
                    floating: true,
                    borderWidth: 0
                },
                tooltip: {
                    shared: true,
                    crosshairs: true
                },			
                plotOptions: {
                    series: {
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function() {
                                    hs.htmlExpand(null, {
                                        pageOrigin: {
                                            x: this.pageX,
                                            y: this.pageY
                                        },
                                        headingText: this.series.name,
                                        maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) +':<br/> '+
                                            this.y +' visits',
                                        width: 200
                                    });
                                }
                            }
                        },
                        marker: {
                            lineWidth: 1
                        }
                    }
                },			
                series: [{
                    name: '<?php echo L('CREATE_BUSINESS_OPPORTUNITIES');?>',
                    data: [<?php echo ($day_create_count); ?>],
                }, {
                    name: '<?php echo L('TO_WIN_A_SINGLE_BUSINESS');?>',
                    data: [<?php echo ($day_success_count); ?>],
                }]
            });
			
			$('#canvas_status').highcharts({
				chart: {
					type: 'funnel',
					marginRight: 100
				},
				title: {
					text: '<?php echo L('SALES_FUNNEL_SUM_TO',array($total_report['add_count']));?>',
					x: -50
				},
				plotOptions: {
					series: {
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b> ({point.y:,.0f})',
							color: 'black',
							softConnector: true
						},
						neckWidth: '30%',
						neckHeight: '25%'
					}
				},
				legend: {
					enabled: false
				},
				series: [{
					name: '<?php echo L('STAGE_OPPORTUNITIES_FOR');?>',
					data: [
						<?php echo ($status_count); ?>
					]
				}]
			});
            $('#canvas_week').highcharts({
                chart_week: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    inverted:true,
                },
                title: {
                    text: '<?php echo L('TREND_ANALYSIS_BY_THE_WEEK');?>'
                },
                xAxis: {
                    categories: [<?php echo ($week_count); ?>],
                    labels: { 
                      rotation:60,
                      y:40,
                      x:15,
                      step:3
                    }
                },
                yAxis: {
                    title: {
                        text: null
                    },
                    min: 0
                },
                legend: {
                    align: 'left',
                    verticalAlign: 'top',
                    y: 0,
                    floating: true,
                    borderWidth: 0
                },
                tooltip: {
                    shared: true,
                    crosshairs: true
                },			
                plotOptions: {
                    series: {
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function() {
                                    hs.htmlExpand(null, {
                                        pageOrigin: {
                                            x: this.pageX,
                                            y: this.pageY
                                        },
                                        headingText: this.series.name,
                                        maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) +':<br/> '+
                                            this.y +' visits',
                                        width: 200
                                    });
                                }
                            }
                        },
                        marker: {
                            lineWidth: 1
                        }
                    }
                },			
                series: [{
                    name: '<?php echo L('CREATE_BUSINESS_OPPORTUNITIES');?>',
                    data: [<?php echo ($week_create_count); ?>],
                }, {
                    name: '<?php echo L('TO_WIN_A_SINGLE_BUSINESS');?>',
                    data: [<?php echo ($week_success_count); ?>],
                }]
            });
            $('#canvas_month').highcharts({
                chart_month: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: '<?php echo L('TREND_ANALYSIS_BY_THE_MONTH');?>'
                },
                xAxis: {
                    categories: [<?php echo ($month_count); ?>],
                    labels: { 
                      rotation:60,
                      y:40,
                      x:15,
                    }
                },
                yAxis: {
                    title: {
                        text: null
                    },
                    min: 0
                },
                legend: {
                    align: 'left',
                    verticalAlign: 'top',
                    y: 0,
                    floating: true,
                    borderWidth: 0
                },
                tooltip: {
                    shared: true,
                    crosshairs: true
                },			
                plotOptions: {
                    series: {
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function() {
                                    hs.htmlExpand(null, {
                                        pageOrigin: {
                                            x: this.pageX,
                                            y: this.pageY
                                        },
                                        headingText: this.series.name,
                                        maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) +':<br/> '+
                                            this.y +' visits',
                                        width: 200
                                    });
                                }
                            }
                        },
                        marker: {
                            lineWidth: 1
                        }
                    }
                },			
                series: [{
                    name: '<?php echo L('CREATE_BUSINESS_OPPORTUNITIES');?>',
                    data: [<?php echo ($month_create_count); ?>],
                }, {
                    name: '<?php echo L('TO_WIN_A_SINGLE_BUSINESS');?>',
                    data: [<?php echo ($month_success_count); ?>],
                }]
            });<?php endif; ?>
		});
	});
	
	function changeRole(){
		department_id = $("#department option:selected").val();
		$.ajax({
			type:'get',
			url:'index.php?m=user&a=getrolebydepartment&department_id='+department_id,
			async:true,
			success:function(data){
				options = '<option value="all"><?php echo L('ALL');?></option>';
				if(data.data != null){
					$.each(data.data, function(k, v){
						options += '<option value="'+v.role_id+'">'+v.role_name+"-"+v.user_name+'</option>';
					});
				}
				$("#role").html(options);
				<?php if($_GET['role']): ?>$("#role option[value='<?php echo ($_GET['role']); ?>']").prop("selected", true);<?php endif; ?>
			},
			dataType:'json'});
	}
	
	<?php if($_GET['department'] and $_GET['department'] != 'all'): ?>$("#department option[value='<?php echo ($_GET['department']); ?>']").prop("selected", true); 
	changeRole();<?php endif; ?>
	<?php if($_GET['department'] == 'all'): ?>$("#role option[value='<?php echo ($_GET['role']); ?>']").prop("selected", true);<?php endif; ?>
	
	$(function(){
		$("#show_report").click(function(){
			$(this).addClass('active').parent().siblings().find('a').removeClass('active');
			$("#report_content").removeClass('hidden').siblings().addClass('hidden');
		});
		$("#show_status").click(function(){
			$(this).addClass('active').parent().siblings().find('a').removeClass('active');
			$("#status_content").removeClass('hidden').siblings().addClass('hidden');
		});
		$("#show_source").click(function(){
			$(this).addClass('active').parent().siblings().find('a').removeClass('active');
			$("#source_content").removeClass('hidden').siblings().addClass('hidden');
		});
		$("#show_money").click(function(){
			$(this).addClass('active').parent().siblings().find('a').removeClass('active');
			$("#money_content").removeClass('hidden').siblings().addClass('hidden');
		});
		$("#show_day").click(function(){
			$(this).addClass('active').parent().siblings().find('a').removeClass('active');
			$("#day_content").removeClass('hidden').siblings().addClass('hidden');
		});
        $("#show_week").click(function(){
			$(this).addClass('active').parent().siblings().find('a').removeClass('active');
			$("#week_content").removeClass('hidden').siblings().addClass('hidden');
		});
        $("#show_month").click(function(){
			$(this).addClass('active').parent().siblings().find('a').removeClass('active');
			$("#month_content").removeClass('hidden').siblings().addClass('hidden');
		});
	});
</script>

</body>
</html>