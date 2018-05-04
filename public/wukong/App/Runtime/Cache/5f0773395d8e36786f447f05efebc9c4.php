<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>悟空CRM安装向导</title>
  <link rel="stylesheet" href="__PUBLIC__/Install/css/install.css" />
   <script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
</head>
<body>
  <div class="wrap">
    <div class="header">
		<h1 class="logo">悟空软件</h1>
		<span class="anzhuang">|&nbsp;&nbsp;安装向导</span>
		<div class="version">悟空CRM 简体中文 【<?php echo C("VERSION");?>】 <?php echo C("RELEASE");?></div>
	</div>
    <section class="section">
      <div class="status_line">
			<h1>1、检查安装环境</h1>
			<img src="__PUBLIC__/Install/images/step_01.png">
		</div>
      <div class="server">
        <table width="80%">
          <tr>
            <td class="td1">检查项目</td>
            <td class="td1" width="30%">当前环境</td>
            <td class="td1" width="30%">悟空CRM的建议</td>
            <td class="td1" width="20%">功能影响</td>
          </tr>
          <tr>
            <td>操作系统</td>
            <td><?php echo ($envir_data["os"]); ?></td>
            <td>WINNT/Linux/类Linux</td>
            <td></td>
          </tr>
          <tr>
            <td>PHP版本</td>
            <td><?php echo ($envir_data["php"]); ?></td>
            <td>>5.2.x</td>
            <td>部分功能不稳定</td>
          </tr>
          <tr>
            <td>MySql扩展</td>
            <td><?php if(function_exists('mysql_connect')): ?><span class="correct_span">&radic;</span>
				<?php else: ?>
					<span class="error_span">&radic;</span><?php endif; ?> </td>
            <td>开启</td>
            <td>无法完成安装</td>
          </tr>
		  <tr>
            <td>session</td>
            <td><?php if(function_exists('session_start')): ?><span class="correct_span">&radic;</span>
				<?php else: ?>
					<span class="error_span">&radic;</span><?php endif; ?></td>
            <td>开启</td>
            <td>不能正常登陆</td>
          </tr>
		  <tr>
            <td>curl扩展</td>
            <td><?php if(function_exists('curl_init')): ?><span class="correct_span">&radic;</span>
				<?php else: ?>
					<span class="error_span">&radic;</span><?php endif; ?></td>
            <td>开启</td>
            <td></td>
          </tr>
		  <tr>
            <td>zlib扩展</td>
            <td><?php if(function_exists('gzopen')): ?><span class="correct_span">&radic;</span>
				<?php else: ?>
					<span class="error_span">&radic;</span><?php endif; ?></td>
            <td>开启</td>
            <td></td>
          </tr>
		  <tr>
            <td>mb_string扩展</td>
            <td><?php if(function_exists('mb_strlen')): ?><span class="correct_span">&radic;</span>
				<?php else: ?>
					<span class="error_span">&radic;</span><?php endif; ?></td>
            <td>开启</td>
            <td></td>
          </tr>
		  <tr>
            <td>附件上传</td>
            <td><?php echo ini_get('upload_max_filesize');?></td>
            <td>>2M、<20M</td>
            <td>影响上传附件的大小</td>
          </tr>
          
        </table>
        <table width="80%">
          <tr>
            <td class="td1">目录文件</td>
            <td class="td1" width="25%">所需状态</td>
            <td class="td1" width="25%">当前状态</td>
          </tr>
          <tr>
            <td>/Uploads</td>
            <td>可写、读</td>
            <td>
				<?php if(check_dir_iswritable('./Uploads')): ?><span class="correct_span">&radic;</span>
				<?php else: ?>
					<span class="error_span">&radic;</span><?php endif; ?> 
			</td>
          </tr>
		  <tr>
            <td>/App/Runtime</td>
            <td>可写、读</td>
            <td>
				<?php if(check_dir_iswritable('./App/Runtime')): ?><span class="correct_span">&radic;</span>
				<?php else: ?>
					<span class="error_span">&radic;</span><?php endif; ?>
			</td>
          </tr>
		  <tr>
            <td>/App/Conf</td>
            <td>可写、读</td>
            <td>
				<?php if(check_dir_iswritable('./App/Conf')): ?><span class="correct_span">&radic;</span>
				<?php else: ?>
					<span class="error_span">&radic;</span><?php endif; ?>
			</td>
          </tr>
      </table>
    </div>
    <div class="bottom tac"> <a href="javascript:history.go(-1)" class="btn">上一步</a><a id="jump" href="<?php echo U('install/step3');?>" class="btn">下一步</a> </div>
  </section>
</div>
 <div class="footer"><a href="http://www.5kcrm.com" target="_blank">© 2012 - 2016 悟空CRM & 卡卡罗特软件科技有限公司 豫ICP备13004021号</a>  </div>
</body>
<script>
	$(function(){
		$("#jump").click(function(){
			if($(".error_span").length > 0){
				alert('当前环境无法顺利安装，请调整环境参数后重试!');
				return false;
			}
		});
	});
</script>
</html>