<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>首页</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/nprogress.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="images/icon.png">
<link rel="shortcut icon" href="images/favicon.ico">
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/nprogress.js"></script>
<script src="js/jquery.lazyload.min.js"></script>

<link rel="stylesheet" href="../admin/css/pintuer.css">
<script src="../admin/js/pintuer.js"></script>
<link rel="stylesheet" href="../admin/css/admin.css">
<script src="../admin/js/jquery.js"></script>



</head>

<body class="user-select" >

<header class="header" style="background:url(images/favicon.ico)">
	<nav class="navbar navbar-default" id="navbar">
		<div class="container">
			<div class="navbar-header">
				<h1 class="logo hvr-bounce-in"><a href="index.php" ><img src="images/nav_head.png" /></a></h1>
			</div>
			<div class="collapse navbar-collapse" id="header-navbar">
				<form class="navbar-form visible-xs" action="/Search" method="post">
					<div class="input-group">
						<input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off" />
						<span class="input-group-btn"> <button class="btn btn-default btn-search" name="search" type="submit">搜索</button> </span>
					</div>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a data-cont="中大南方" title="162011189" href="index.php"><span class="icon-home"></span> 首页</a></li>
                    <li><a data-cont="中大南方" title="162011189" href="search.php"><span class="icon-search"></span> 搜索</a></li>
                    <?php
                    session_start();
                    if(!isset($_SESSION['fname'])) {
                        ?>
                        <li><a data-cont="用户登陆" title="用户登陆" href="../home/login.html"><span class="icon-user"></span> 用户登陆</a></li>
                        <?php
                    }
                    else {?>
                        <li><a href="javascript:void(0)" onclick="ajup5()"><span class="icon-sign-out" ></span> 退出登陆</a></li>
                        <?php
                    }
                    ?>

					<li><a data-cont="管理员" title="管理员" href="../admin/login.html"><span class="icon-wrench"></span> 管理员</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>


</body>



<script>

    function ajup() {
        if (window.XMLHttpRequest)
        {
            // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            // IE6, IE5 浏览器执行代码
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            // alert('response '+xmlhttp.readyState+' '+xmlhttp.status);
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                // alert(xmlhttp.responseText);
                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get_new.php" ,true);
        xmlhttp.send();

    }

    function ajup2() {
        if (window.XMLHttpRequest)
        {
            // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            // IE6, IE5 浏览器执行代码
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            // alert('response '+xmlhttp.readyState+' '+xmlhttp.status);
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                // alert(xmlhttp.responseText);
                document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "get_point.php" ,true);
        xmlhttp.send();

    }

    function ajup3(cate) {

        alert(cate);
        if (window.XMLHttpRequest)
        {
            // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            // IE6, IE5 浏览器执行代码
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.ontreadysatechange=function()
        {

            // alert('response '+xmlhttp.readyState+' '+xmlhttp.status);
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                // alert(xmlhttp.responseText);
                document.getElementById("txtHint3").innerHTML=xmlhttp.responseText;
            }
        }
        // xmlhttp.open("GET", "cate.php?cate="+cate ,true);
        xmlhttp.open("GET", "cate.php" ,true);
        xmlhttp.send();
    }

    function ajup4(cate) {
        // alert("ajup4 + "+cate);
        $.get("cate.php?cate="+cate,function(data,status){
            // alert("数据: " + data + "\n状态: " + status);
            document.getElementById("txtHint3").innerHTML=data;
        });
    }


    function ajup5() {
        // alert("ajup5 + ");
        $.get("logout.php",function(data,status){
            // alert("数据: " + data + "\n状态: " + status);
        });
        location.replace(location);
    }


    $(function(){
        // ajup();
        // ajup2();
        ajup4("军事新闻");

    });

</script>
<section class="container" >


	<br>


	<p align="center"><img src="images\cate.png" alt=""  ></p>

	<div class="line">
		<div align="center" class="btn-group btn-group-lg xl8 xl2-move" >
			<button type="button" class="btn btn-primary" value="国际新闻" onclick="ajup4(this.value)">国际新闻</button>
			<button type="button" class="btn btn-primary" value="军事新闻" onclick="ajup4(this.value)">军事新闻</button>
			<button type="button" class="btn btn-primary" value="体育新闻" onclick="ajup4(this.value)">体育新闻</button>
			<button type="button" class="btn btn-primary" value="娱乐新闻" onclick="ajup4(this.value)">娱乐新闻</button>
			<button type="button" class="btn btn-primary" value="社会新闻" onclick="ajup4(this.value)">社会新闻</button>
			<button type="button" class="btn btn-primary" value="经济新闻" onclick="ajup4(this.value)">经济新闻</button>
			<button type="button" class="btn btn-primary" value="时政新闻" onclick="ajup4(this.value)">时政新闻</button>
		</div>
	</div>

	<br>
	<div id="txtHint3"><h2 align="center" style="padding: 20px">请点击新闻类型</h2></div>
	<br><br>


	<p align="center"><img src="images\new_news.png" alt="" >
		<a class="button border-yellow fadein-top" onclick="ajup()" ><span class="icon-refresh"></span> 刷新</a>
	</p>
	<div id="txtHint"><h2 align="center" style="padding: 20px">点击刷新获取最新新闻</h2></div>
	<br><br>

	<p align="center"><img src="images\point.png" alt="" >
		<a class="button border-yellow fadein-top" onclick="ajup2()" ><span class="icon-refresh"></span> 刷新</a>
	</p>
	<div id="txtHint2"><h2 align="center" style="padding: 20px">点击刷新获取新闻排行</h2></div>
	<br><br>

</section>




<footer class="footer">
<div class="container">
<p>Copyright &copy; 2019.zdnf dv 666 vv.</p>
</div>
<div id="gotop"><a class="gotop"></a></div>
</footer>


<script src="js/jquery.ias.js"></script>
<script src="js/scripts.js"></script>



<script type="text/javascript">
    function turn(id){
        var s="show.php?id="+id;
        window.location.href=s;
    }
</script>


</body>
</html>
