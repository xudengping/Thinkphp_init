<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <!-- 移动设备上禁止缩放 -->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	    <!-- 弹窗css，可以在artDialog5.0找到你喜欢的颜色方案  -->
		<link rel="stylesheet" href="/Thinkphp_init/Public/css/admin/artDialog5.0/blue.css" />
	    <!-- Bootstrap -->
	    <link rel="stylesheet" href="/Thinkphp_init/Public/css/bootstrap.min.css" />
	    <link rel="stylesheet" href="/Thinkphp_init/Public/css/bootstrap-theme.min.css" />
	    
		<link rel="stylesheet" href="/Thinkphp_init/Public/css/admin/admin.css" />
		
		<script type="text/javascript">
			var PUBLIC = '/Thinkphp_init/Public';
			var MODULE = '/Thinkphp_init/index.php/Admin';
			
		</script>
		
		<script type="text/javascript" src="/Thinkphp_init/Public/js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="/Thinkphp_init/Public/js/bootstrap.min.js"></script>
		
		<script type="text/javascript" src="/Thinkphp_init/Public/js/admin/artDialog.min.js"></script>
		<script type="text/javascript" src="/Thinkphp_init/Public/js/admin/admin.js"></script>
		
	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
	        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->
		
		
		<title><?php echo ($active_info["title"]); echo ($page_title); ?></title>
	</head>
	<body>
	


<nav class="navbar navbar-default navbar-fixed-top navbar-inverse my_side_top_nav" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
			data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
			<span class="icon-bar"></span> <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/Thinkphp_init/index.php/Admin/Index/index">管理中心</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<?php if(is_array($admin_menu_list)): $i = 0; $__LIST__ = $admin_menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i; if($menu['is_active'] == 1): ?><li class="active">
				<?php else: ?>
				<li><?php endif; ?>
					<a href="javascript:void(0);" class="js_top_menu" data-id="<?php echo ($menu["id"]); ?>"><?php echo ($menu["title"]); ?></a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			<!-- 
			<li class="active"><a href="#">设置</a></li>
			<li><a href="#">微信</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle"data-toggle="dropdown">Dropdown <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">m</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li class="divider"></li>
					<li><a href="#">Separated link</a></li>
					<li class="divider"></li>
					<li><a href="#">One more separated link</a></li>
				</ul>
			</li>
			 -->
		</ul>
		<div class="col-xs-3">
			<form action="#" method="get" class="navbar-form navbar-left" role="search">
				<div class="input-group">
					<input type="text" name="nav_serach" class="form-control" placeholder="Serach"> 
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">Go!</button>
					</span>
				</div>
			</form>
		</div>

		<ul class="nav navbar-nav navbar-right">
			<li><a href="/Thinkphp_init" target="_blank">网站首页</a></li>
			<li class="dropdown"><a href="#" class="dropdown-toggle"
				data-toggle="dropdown"><?php echo (session('adminname')); ?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/Thinkphp_init/index.php/Admin/Public/logout">退出登陆</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>



<div id="my_container" class="container col-xs-12" style="padding: 0 15px;">
	<div class="row">
		<div class="col-xs-3">
			<div class="" role="complementary">
				<?php if(is_array($admin_menu_list)): $i = 0; $__LIST__ = $admin_menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i; if($menu['is_active'] == 1): ?><ul class="nav my_side_nav show" id="js_side_nav_<?php echo ($menu["id"]); ?>">
					<?php else: ?>
						<ul class="nav my_side_nav hidden" id="js_side_nav_<?php echo ($menu["id"]); ?>"><?php endif; ?>
					<?php if(is_array($menu['child'])): $i = 0; $__LIST__ = $menu['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i; if($m['child'] != null): ?><li><a href="#nav_<?php echo ($m["id"]); ?>" data-toggle="collapse"><?php if($m["icon"] != ''): ?><span class="my_menu_icon glyphicon <?php echo ($m["icon"]); ?>" ></span>&nbsp;&nbsp;<?php endif; echo ($m["title"]); ?></a></li>
							
							<?php if($m['is_active'] == 1): ?><ul id="nav_<?php echo ($m["id"]); ?>" class="nav in" style="height:auto">
							<?php else: ?>
							<ul id="nav_<?php echo ($m["id"]); ?>" class="nav collapse"><?php endif; ?>
							
								<?php if(is_array($m['child'])): $i = 0; $__LIST__ = $m['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i; if($n['is_active'] == 1): ?><li class="li_active">
									<?php else: ?>
									<li><?php endif; ?>
										<a href="/Thinkphp_init/<?php echo ($n["module_name"]); ?>/<?php echo ($n["controller_name"]); ?>/<?php echo ($n["action_name"]); if($n[param] != null): ?>/param/<?php echo ($n["param"]); endif; ?>"><?php echo ($n["title"]); ?></a>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
								
							</ul>
						<?php else: ?>
							<li><a href="/Thinkphp_init/<?php echo ($m["module_name"]); ?>/<?php echo ($m["controller_name"]); ?>/<?php echo ($m["action_name"]); if($m[param] != null): ?>/param/<?php echo ($m["param"]); endif; ?>"><?php echo ($m["title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul><?php endforeach; endif; else: echo "" ;endif; ?>
				
			</div>
		</div>
		
		<div class="col-xs-9" role="main">
			<div class="bs-docs-section">
				<div class="page-header">
					<h1 id="overview"><?php echo ($active_info["title"]); ?></h1>
				</div>
			</div>
		</div>







<script type="text/javascript">

$('.affix').affix({
	offset : {
		top : 100,
		bottom : function() {
			return (this.bottom = $('.bs-footer').outerHeight(true))
		}
	}
})

$(".js_top_menu").click(function(){
	var obj = $(this);
	var menu_id = obj.attr('data-id');
	console.log(menu_id);
	console.log($("#js_side_nav_"+menu_id));
	
	obj.closest('ul').find('li').removeClass('active');
	obj.closest('li').addClass('active');
	
	console.log($("#js_side_nav_"+menu_id).siblings('ul'));
	$(".my_side_nav").removeClass('show').addClass('hidden');
	$("#js_side_nav_"+menu_id).removeClass('hidden').addClass('show');
	return false;
});

</script>


		<div class="col-xs-9" role="main">
			<div class="bs-docs-section">
				<div class="page-header">
					<h1 id="overview">概览</h1>
				</div>
				<p class="lead">深入了解Bootstrap底层结构的关键部分，包括我们让web开发变得更好、更快、更强壮的最佳实践。</p>

				<h3 id="overview-doctype">HTML5文档类型</h3>
				<p>Bootstrap使用到的某些HTML元素和CSS属性需要将页面设置为HTML5文档类型。在你项目中的每个页面都要参照下面的格式进行设置。</p>
				<div class="highlight">
					<pre>
						<code class="language-html xml">
							<span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;<span class="title">html</span> <span
								class="attribute">lang</span>=<span class="value">"zh-cn"</span>&gt;</span>
  ...
<span class="tag">&lt;/<span class="title">html</span>&gt;</span>
						</code>
					</pre>

				</div>
			</div>
		</div>

		
			</div>
		</div>
	</body>
</html>