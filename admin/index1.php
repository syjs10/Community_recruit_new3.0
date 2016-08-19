<?php
      require_once '../include.php';
      checkLogined();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
    <div class="head">
            <div class="logo fl"></div>
            <h3 class="head_text fr">网管后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
       <!--   <div class="link fl"><a href="#">慕课</a><span>&gt;&gt;</span><a href="#">商品管理</a><span>&gt;&gt;</span>商品修改</div>-->
        <div class="link fr">
            <b>
            <?php
				if(isset($_SESSION['adminName'])){
					echo $_SESSION['adminName'];
				}elseif(isset($_COOKIE['adminName'])){
					echo $_COOKIE['adminName'];
				}
            ?>

            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
      	 		<!-- 嵌套网页开始 -->
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span onclick="show('menu1','change1')" id="change1">+</span>面试</h3>
                        <dl id="menu1" style="display:none;">
                              <dd><a href="findStudent.php" target="mainFrame">查找</a></dd>
                        	<dd><a href="listCate1.php?act=Interview" target="mainFrame">面试列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu2','change2')" id="change2">+</span>选人</h3>
                        <dl id="menu2" style="display:none;">
                              <dd><a href="listCate3.php" target="mainFrame">新生列表</a></dd>
                              <dd><a href="listCate2.php" target="mainFrame">已选人员</a></dd>
                              <dd><a href="listCate4.php" target="mainFrame">冲突人员</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span  onclick="show('menu3','change3')" id="change3" >+</span>选人结果</h3>
                        <dl id="menu3" style="display:none;">
                              <dd><a href="listCate2.php" target="mainFrame">人员列表</a></dd>
                            <dd><a href="excel.php" target="mainFrame">生成Excel</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    }
        }
    </script>
</body>
</html>
