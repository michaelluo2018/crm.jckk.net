<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="__PUBLIC__/css/treeview/jquery.treeview.css" type="text/css">
<script type="text/javascript" src="__PUBLIC__/js/treeview/jquery.treeview.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/treeview/jquery.treeview.edit.js"></script>

<style type="text/css">
.ztree li span.button.add {margin-left:2px; margin-right: -1px; background-position:-144px 0; vertical-align:top; *vertical-align:middle}
.filetree span.file {
	background: url(__PUBLIC__/css/treeview/images/folder.gif) 0 0 no-repeat;
}
.se_product {
	background:#E0E0E0;
	width: auto;
	margin-left: 10px;
	float: left;
	font-size: 12px;
	padding: 2px;
	border: 1px #C0C0C0 solid;
	border-radius: 4px;
}
</style>

<div class="clearfix">
	<input name="dialog_add_product" id="dialog_add_product" type="hidden"/>
	<ul class="nav pull-left">
		<li class="pull-left">
			&nbsp;&nbsp;
			<select id="field" style="width:auto" onchange="changeCondition()" name="field">
				<option class="word" value="name"><?php echo L('PRODUCT_NAME');?></option>
			</select>&nbsp;&nbsp;
		</li>
		<li id="conditionContent" class="pull-left">
			<select id="condition" style="width:auto" name="condition" onchange="changeSearch()">	
				<option value="contains"><?php echo L('INCLUDE');?></option>
				<option value="is"><?php echo L('YES');?></option>
				<option value="start_with"><?php echo L('BEGINNING_CHARACTER');?></option>
				<option value="end_with"><?php echo L('TERMINATION_CHARACTER');?></option>
				<option value="is_empty"><?php echo L('MANDATORY');?></option>
			</select>&nbsp;&nbsp;
		</li>
		<li id="searchContent" class="pull-left">
			<input id="search" type="text" class="input-medium search-query" name="search"/>&nbsp;&nbsp;
		</li>
		<li class="pull-left">
			<input type="hidden" name="m" value="product"/>
			<input type="hidden" id="cid" value="0"/>
			<?php if($_GET['by']!= null): ?><input type="hidden" name="by" value="<?php echo ($_GET['by']); ?>"/><?php endif; ?>
			<button class="btn" onclick="d_changeCondition(0,1)"><?php echo L('SEARCH');?></button>
		</li>
	</ul>
</div>
<div class="result clearfix" id="res">
	<div style="float:left;" rel="1">已选择产品 :</div>
</div>
<div class="row" style="border-top: 1px solid #A0A0A0;margin-top: 5px;">
	<div class="span2 pull-left">
		<?php echo ($treecode); ?>
	</div>
	<div class="span6 pull-right" style="margin: 0px;">
		<table class="table table-hover">
			<thead id="header">
				<tr>
					<th>&nbsp;</th>
					<th><?php echo L('PRODUCT_NAME');?></th>
					<th><?php echo L('PRODUCT_CATEGORY');?></th>
				</tr>
			</thead>
			<tfoot id="footer">
				<tr>
					<?php if(C('ismobile') != 1): ?><td colspan="6"><?php else: ?><td colspan="4"><?php endif; ?>
						<div class="row pagination">
							<div class="span2"><span id="count"><?php echo ($count_num); ?></span> <?php echo L('RECORDS');?> <span id="p">1</span>/<span id="total_page"><?php echo ($total); ?></span> <?php echo L('PAGE');?></div>
							<div class="span3">
								<div><ul id="changepage">
									<li><span class='current'><?php echo L('FIRST_PAGE');?></span></li><li><span>« <?php echo L('THE_PREVIOUS_PAGE');?></span></li>
									<?php if(1 < $total): ?><li><a class="page" href="javascript:void(0)" rel="2"><?php echo L('THE_NEXT_PAGE');?> »</a></li>
									<?php else: ?>
										<li><span><?php echo L('THE_NEXT_PAGE');?> »</span></li><?php endif; ?>
								</ul></div>
							</div>
						</div>
					</td>
				</tr>
			</tfoot>
			<tbody id="loads" class="hide">
				<tr><td class="tdleft" <?php if(C('ismobile') != 1): ?>colspan="6"<?php else: ?>colspan="4"<?php endif; ?> style=" height:300px;text-align:center"><img src="__PUBLIC__/img/load.gif"></td></tr>
			</tbody>
			<tbody id="data">
				<?php if(empty($list)): ?><tr>
						<td colspan="4"><?php echo L('THERE_IS_NO_DATA');?></td>
					</tr>
				<?php else: ?>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td>
							<input type="checkbox" name="product_id" class="product_id" value="<?php echo ($vo["product_id"]); ?>" />
							<input type="hidden" value="<?php echo ($vo["suggested_price"]); ?>"/>
						</td>
						<td><?php echo ($vo["name"]); ?></td>
						<td><?php echo ($vo["category_name"]); ?></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
			</tbody>
			
		</table>
	</div>	
</div>

<script type="text/javascript">
	$("#browser").treeview();
	
	$(".file").hover(
		function(){
			$(this).css('color','rgb(255, 0, 0);');
		},
		function(){
			$(this).css('color','');
		}
	);
	
	$(".ta").click(
		function(){
			var cid = $(this).attr('rel');
			$('#cid').val(cid);
			$(".ta").each(function(){$(this).css('background','');$(this).css('font-weight','500');});
			$(this).css('background','#ADADAD');
			$(this).css('font-weight','700');
			d_changeCondition(0,0);
		}
	);
	
	$("#check_all").click(function(){
		$("input[class='check_list']").prop('checked', $(this).prop("checked"));
	});
	$('.page').click(function(){
		var a = $(this).attr('rel');
		d_changeCondition(a,0);
	});
	function d_changeCondition(p, a){
		$('#data').addClass('hide');
		$('#load').removeClass('hide');
		if(a){
			var c = 0;
			$(".ta").each(function(){$(this).css('background','');$(this).css('font-weight','500');});
		}else{
			var c = $('#cid').val();
		}
		var field = $('#field').val();
		var condition = $('#condition').val();
		var search = encodeURI($("#search").val());
		$.ajax({
			type:'get',
			url:'index.php?m=product&a=changecontent&field='+field+'&search='+search+'&condition='+condition+'&p='+p+'&cid='+c,
			async:false,

			success:function(data){
				var temp = '';
				if(data.data.list != null){
					$.each(data.data.list, function(k, v){
						var checked = checkRes(v.product_id) ? 'checked=checked' : '';
						temp += '<tr><td><input type="checkbox" class="product_id" name="product_id" '+checked+' class="check_list" value="'+v.product_id+'"/><input type="hidden" value="'+v.suggested_price+'"/></td><td>'+v.name+'</td><td>'+v.category_name+'</td></tr>';
					});
					var changepage = "";
					if(data.data.p == 1){
						changepage = "<li><span class='current'><?php echo L('FIRST_PAGE');?></span></li><li><span>« <?php echo L('THE_PREVIOUS_PAGE');?> </span></li>";
						if(data.data.p < data.data.total){
							changepage += "<li><a class='page' href='javascript:void(0)' rel='"+(data.data.p+1)+"'><?php echo L('THE_NEXT_PAGE');?> »</a></li>";
						}else{
							changepage += "<li><span><?php echo L('THE_NEXT_PAGE');?> »</span></li>";
						}
					}else if(data.data.p == data.data.total){
						changepage = "<li><a class='page' href='javascript:void(0)' rel='1'><?php echo L('FIRST_PAGE');?></a></li><li><a class='page' href='javascript:void(0)' rel='"+(data.data.p-1)+"'>« <?php echo L('THE_PREVIOUS_PAGE');?></a></li><li><span><?php echo L('THE_NEXT_PAGE');?> »</span></li>";
					}else{
						changepage = "<li><a class='page' href='javascript:void(0)' rel='1'><?php echo L('FIRST_PAGE');?></a></li><li><a class='page' href='javascript:void(0)' rel='"+(data.data.p-1)+"'>« <?php echo L('THE_PREVIOUS_PAGE');?></a></li><li><a class='page' href='javascript:void(0)' rel='"+(data.data.p+1)+"'><?php echo L('THE_NEXT_PAGE');?> »</a></li>";
					}
					$('#footer').removeClass('hide');
					$('#p').html(data.data.p);
					$('#changepage').html(changepage);
					$('#count').html(data.data.count);
					$('#total_page').html(data.data.total);
					$('#data').html(temp);
					$('.page').click(function(){
						var a = $(this).attr('rel');
						d_changeCondition(a,0);
					});
				}else{
					$('#data').html('<tr><td colspan="4"><?php echo L('DIDNOT_FIND_THE_RESULTS_YOU_WANT');?></tr>');
					$('#footer').addClass('hide');
				}
				$('#loads').addClass('hide');
				$('#data').removeClass('hide');
				selaction();
			},
			dataType:'json'
		});		
	}
	
	//检查已选择产品 如果存在则删除
	function checkDelRes(pid){
		var res_id =  new Array();
		$(".se_product").each(function(){
			//res_id.push($(this).attr('rel'));
			if(pid == $(this).attr('rel')) $(this).remove();
		});
	}
	//检查产品是否存在 返回false or true；
	function checkRes(pid){
		var res = false;
		$(".se_product").each(function(){
			if(pid == $(this).attr('rel')) res = true;
		});
		return res;
		
	}
	
	selaction();
	bindaction();
	
	
	function selaction(){
		//选择产品时 如果勾选则添加 否则删除
		$('.product_id').click(function(){
			var checked = $(this).prop('checked');
			var pid = $(this).val();
			if(checked){
				var pname = $(this).parent().next().text();
				var price = $(this).next().val();

				$('#res').append('<div class="se_product" rel="'+$(this).val()+'">'+pname+'<input type="hidden" name="suggested_price" value="'+price+'"> &nbsp; <i class="icon-remove remove"></i></div>');
				bindaction();
			}else{
				checkDelRes(pid);
			}
			
		});
	}
	
	function bindaction(){
		//删除按钮
		$('.remove').click(function(){
			$(this).parent().remove();
		});
		
		//删除按钮颜色变化
		$('.remove').hover(
			function(){
				$(this).css('color','red');
			},
			function(){
				$(this).css('color','');
			}
		);
	}
</script>