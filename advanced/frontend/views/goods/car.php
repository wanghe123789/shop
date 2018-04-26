<?php 
use yii\helpers\Url;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="Generator" content="EditPlus®">
	<meta name="Author" content="">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta name="renderer" content="webkit">
	<title>我的购物车-云购物商城</title>
	<link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/base.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/modernizr-custom-v2.7.1.min.js"></script>

</head>
<body>
	<!-- 引入jquery -->
<script type="text/javascript" src="http://127.0.0.1/ShoppingMall/advanced/frontend/web/jquery-1.8.3.js"></script>
<header id="pc-header">
	<div class="pc-header-nav">
		<div class="pc-header-con">
			<div class="fl pc-header-link" >您好！，欢迎来云购物 <a href="login.html" target="_blank">请登录</a> <a href="register.html" target="_blank"> 免费注册</a></div>
			<div class="fr pc-header-list top-nav">
				<ul>
					<li>
						<div class="nav"><i class="pc-top-icon"></i><a href="#">我的订单</a></div>
						<div class="con">
							<dl>
								<dt><a href="">批发进货</a></dt>
								<dd><a href="">已买到货品</a></dd>
								<dd><a href="">优惠券</a></dd>
								<dd><a href="">店铺动态</a></dd>
							</dl>
						</div>
					</li>
					<li>
						<div class="nav"><i class="pc-top-icon"></i><a href="#">我的商城</a></div>
						<div class="con">
							<dl>
								<dt><a href="">批发进货</a></dt>
								<dd><a href="">已买到货品</a></dd>
								<dd><a href="">优惠券</a></dd>
								<dd><a href="">店铺动态</a></dd>
							</dl>
						</div>
					</li>
					<li><a href="#">我的云购</a></li>
					<li><a href="#">我的收藏</a></li>
					<li><a href="#">会员中心</a></li>
					<li><a href="#">客户服务</a></li>
					<li><a href="#">帮助中心</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="pc-header-logo clearfix">
		<div class="pc-fl-logo fl">
			<h1>
				<a href="index.html"></a>
			</h1>
		</div>
		<div class="head-form fl">
			<form class="clearfix">
				<input class="search-text" accesskey="" id="key" autocomplete="off" placeholder="洗衣机" type="text">
				<button class="button" onclick="search('key');return false;">搜索</button>
			</form>
			<div class="words-text clearfix">
				<a href="#" class="red">1元秒爆</a>
				<a href="#">低至五折</a>
				<a href="#">农用物资</a>
				<a href="#">佳能相机</a>
				<a href="#">服装城</a>
				<a href="#">买4免1</a>
				<a href="#">家电秒杀</a>
				<a href="#">农耕机械</a>
				<a href="#">手机新品季</a>
			</div>
		</div>
		<div class="fr pc-head-car">
			<i class="icon-car"></i>
			<a href="index.php?r=goods/car">我的购物车</a>
		</div>
	</div>
	<!--  顶部    start-->
	<div class="yHeader">
		<!-- 导航   start  -->
		<div class="yNavIndex">
			<ul class="yMenuIndex" style="margin-left:0">
				<li style="background:#d1201e"><a href="" target="_blank">云购首页</a></li>
				<li><a href="" target="_blank">女士护肤 </a></li>
				<li><a href="" target="_blank">男士护肤</a></li>
				<li><a href="" target="_blank">洗护染发</a></li>
				<li><a href="" target="_blank">染发</a></li>
				<li><a href="" target="_blank">彩妆</a></li>
				<li><a href="" target="_blank">品牌故事</a></li>
			</ul>
		</div>
		<!-- 导航   end  -->
	</div>

</header>

<section id="pc-jie">
	<div class="center ">
		<ul class="pc-shopping-title clearfix">
			<li><a href="#" class="cu">全部商品(10)</a></li>
			<li><a href="#">限时优惠(7)</a></li>
			<li><a href="#">库存紧张(0)</a></li>
		</ul>
	</div>
	<form action="index.php?r=order/order1" method="post">
		<div class="pc-shopping-cart center">
			<div class="pc-shopping-tab">
					<table class=".table">
						<thead>
							<tr class="tab-0">
								<th class="tab-1"><label for="">复选框</label></th>
								<th class="tab-2">商品</th>
								<th class="tab-3">商品信息</th>
								<th class="tab-4">单价</th>
								<th class="tab-5">数量</th>
								<th class="tab-6">小计</th>
								<th class="tab-7">操作</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td colspan="7" style="padding-left:10px; background:#eee">	
									<label for="">云购物自营</label>
									<a href="#" style="position:relative;padding-left:50px"><i class="icon-kefu"></i>联系客服</a>
									<ul class="clearfix fr" style="padding-right:20px">
										<li><i class="pc-shop-car-yun"></i>满109元减10</li>
										<li><i class="pc-shop-car-yun"></i>领取3种优惠券, 最高省30元</li>
									</ul>
								</td>
							</tr>
									<?php foreach ($new_arr as $key => $value) { ?>
									<tr>
										<th id="checkBoxList" class="checkBoxList">
											<input type="checkbox"  class="one_cheackbox"  name="check" value="<?php echo $key ?>" style="margin-left:10px; float:left"> 
											 <!--  <input type="text" name="check_id" value="<?php echo $key ?>"> -->
										</th>
										<th class="tab-th-1">
											<a href="#"><img src="images/shangpinxiangqing/X1.png" width="100%" alt=""></a>
											<a href="" class="tab-title"><?php echo $value['g_name']; ?></a>
										</th>
												
										<th> <!-- 循环属性值 --> 
		                                    <?php foreach ($value['attr_value_id'] as $k1 => $v1) { ?>	
											<p><?php  $name = Yii::$app->db->createCommand("SELECT attr_val_name FROM attr_val WHERE att_val_id=".$v1)->queryone();echo $name['attr_val_name'];?></p>
											<?php } ?>
										</th>
										<th>
										    <input type="hidden" id="dj" class="dj" name="dj" value="<?php echo $value['sku_price'] ?>">
											<span class="price" id="price" style="text-align: center;font-size: 16px">
												<?php echo $value['sku_price']; ?>		

											</span>
										</th>
										<th class="tab-th-2">
												<input class="min" name="" type="button" value="-" />
												<input size="8"  class="text_box" name="" style="text-align: center;" type="text" value="<?php echo $value['num'] ?>" />
												<input class="add" name="" type="button" value="+" /> 
										</th>

										<th id="zj" class="zj">
											<span id="zongjia" style="text-align:center;color: red ;font-size:30px" class="zongjia"></span>
										</th>
										
										<th><a href="index.php?r=goods/del&s_id=<?php echo $key ?>">删除</a></th>
									</tr>
									<?php } ?>
									<!-- u_id 用于批删 -->
			                <input type="hidden" name="u_id" id="u_id" value="<?php echo $u_id ?>">
						</tbody>
					</table>
			</div>
		</div>       
		<div style="height:10px"></div>
		<div class="center-zhong">
			<div class="clearfix pc-shop-go">
				<div class="fl pc-shop-fl">
				<input type="checkbox" id="allChecks"  onclick="ckAll()" /> 全选/全不选
	    		<input type="button" value ="删除" id="btn" onclick="delAllProduct()" name="check">
				</div>
				<div class="fr pc-shop-fr">
					<p>共有 <em class="red pc-shop-shu" id="pc-shop-shu"></em> 款商品，总计（不含运费）</p>
					<span id="yidong"></span>
					<input type="submit"  id="sbt" value="下订单">
                    <!-- 购物车id -->
				    <input type="hidden" name="sb_id"  id="sb_id" value="">
				</div>
			</div>
		</div>
    </form>
</section>
<script type="text/javascript">
	$(function(){
        //自动加载默认选中的商品数量和单价 还有该件商品的总和
	   $(document).ready(function (){ 

	                   var zj = $(".zj");
		               $.each(zj,function(){
                             //该商品的数量
                             dj = $(this).prev().children(".text_box").val();
                             //该商品的单价              
                             price = $(this).prev().prev().children(".dj").val();
                            //计算默认加载时的商品总价
                            $(this).children('.zongjia').html(dj*price);
                        })
		               
		               var xzh = $(".one_cheackbox:checked");
                            if (xzh.val() == undefined) {
                            	
                            	$('#sbt').attr('disabled',true);
                            	
                            } else {

                            	$('#sbt').removeAttr('disabled');
                            }
	           });
    
		 //单个商品数量+1 商品总价加1
		$(".add").click(function(){
			var t=$(this).parent().find('input[class*=text_box]');
			t.val(parseInt(t.val())+1)
			var zhi = $(this).prev().val();
			var price = $(this).parent().prev().children().text();
			var zong_price = parseInt(zhi*price);
		    $(this).parent().next().children().text(zong_price);
		
		})


		//单个商品数量-1
		$(".min").click(function(){
			var t=$(this).parent().find('input[class*=text_box]');
			t.val(parseInt(t.val())-1)
			if(parseInt(t.val())<1){
			 alert("商品数量不得小于一个,亲");
			 t.val(1);
			}
			var zhi = $(this).next().val();
			var price = $(this).parent().prev().children().text();
			var zong_price = parseInt(zhi*price);
		   $(this).parent().next().children().text(zong_price);
		})
	
         // new_arr = array();
        //点击复选框商品总价计算
         $(".checkBoxList").click(function(){
         					var ab = $(this);
                            var xzh =$(".one_cheackbox:checked");
                            if (xzh.val() != undefined) {
                            	$('#sbt').removeAttr('disabled');
                            } else {
                            	$('#sbt').attr('disabled',true);
                            }
                            var id_array = new Array(); 
                            var zong_price = parseInt("0");//总价格
                            var str = parseInt("0");//总数量
                            $.each(xzh,function(){
                            	//总商品的价格
                                zong_price += parseInt($(this).parent().next().next().next().next().next().children('.zongjia').html());
                                //总的购买数量
                                str ++;                              
							    id_array.push($(this).val());  
							    
                            })
                               //将购物车id s_id进行拼接
                              var idstr = id_array.join(',');
           
                             $("#sb_id").val(idstr);
                             $('#yidong').html("共有"+zong_price+"元");
                             //赋值到商品件数上
                             $('#pc-shop-shu').html(str);
                             $(this).parents(".pc-shopping-cart center").next().next(".center-zhong").children(".clearfix pc-shop-go").children(".fr pc-shop-fr").children("#sbt").reomveAttr("disabled");
                             
               })
	}) 
        
       
                         
</script>
<div style="height:100px"></div>

<footer>
	<div class="pc-footer-top">
		<div class="center">
			<ul class="clearfix">
				<li>
					<span>关于我们</span>
					<a href="#">关于我们</a>
					<a href="#">诚聘英才</a>
					<a href="#">用户服务协议</a>
					<a href="#">网站服务条款</a>
					<a href="#">联系我们</a>
				</li>
				<li class="lw">
					<span>购物指南</span>
					<a href="#">新手上路</a>
					<a href="#">订单查询</a>
					<a href="#">会员介绍</a>
					<a href="#">网站服务条款</a>
					<a href="#">帮助中心</a>
				</li>
				<li class="lw">
					<span>消费者保障</span>
					<a href="#">人工验货</a>
					<a href="#">退货退款政策</a>
					<a href="#">运费补贴卡</a>
					<a href="#">无忧售后</a>
					<a href="#">先行赔付</a>
				</li>
				<li class="lw">
					<span>商务合作</span>
					<a href="#">人工验货</a>
					<a href="#">退货退款政策</a>
					<a href="#">运费补贴卡</a>
					<a href="#">无忧售后</a>
					<a href="#">先行赔付</a>
				</li>
				<li class="lss">
					<span>下载手机版</span>
					<div class="clearfix lss-pa">
						<div class="fl lss-img"><img src="img/icon/code.png" alt=""></div>
						<div class="fl" style="padding-left:20px">
							<h4>扫描下载云购APP</h4>
							<p>把优惠握在手心</p>
							<P>把潮流带在身边</P>
							<P></P>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="pc-footer-lin">
			<div class="center">
				<p>友情链接：
					卡宝宝信用卡
					梦芭莎网上购物
					手游交易平台
					法律咨询
					深圳地图
					P2P网贷导航
					名鞋库
					万表网
					叮当音乐网
					114票务网
					儿歌视频大全
				</p>
				<p>
					京ICP证1900075号  京ICP备20051110号-5  京公网安备110104734773474323  统一社会信用代码 91113443434371298269B  食品流通许可证SP1101435445645645640352397
				</p>
				<p style="padding-bottom:30px">版物经营许可证 新出发京零字第朝160018号  Copyright©2011-2015 版权所有 ZHE800.COM </p>
			</div>
		</div>
	</div>
</footer>

<script type="text/javascript">
    //hover 触发两个事件，鼠标移上去和移走
    //mousehover 只触发移上去事件
    $(".top-nav ul li").hover(function(){
        $(this).addClass("hover").siblings().removeClass("hover");
        $(this).find("li .nav a").addClass("hover");
        $(this).find(".con").show();
    },function(){
        //$(this).css("background-color","#f5f5f5");
        $(this).find(".con").hide();
        //$(this).find(".nav a").removeClass("hover");
        $(this).removeClass("hover");
        $(this).find(".nav a").removeClass("hover");
    })
 
	
    function ckAll(){
        var flag=document.getElementById("allChecks").checked;
        var cks=document.getElementsByName("check");
        for(var i=0;i<cks.length;i++){
            cks[i].checked=flag;
        }
    }

	//批删ajax发送
	function delAllProduct(){
	           if(!confirm("确定要删除这些商品吗？")){
	            return ;
	        }
	        var cks=document.getElementsByName("check");
	        // alert(cks);return;
	        var str="";
	        //拼接所有的图书id
	        for(var i=0;i<cks.length;i++){
	            if(cks[i].checked){
	                str+="id="+cks[i].value+"&";
	            }
	        }
	        //去掉字符串倒数第二个的‘&’
	        str=str.substring(0, str.length-7);
	         //alert(str);return;
	        var u_id = $("#u_id").val();
	         $.ajax({
	               type:"POST",
	               url:"http://127.0.0.1/ShoppingMall/advanced/frontend/web/index.php?r=goods/dtell",
	               data:{str:str,u_id:u_id},
	               dataType:'json', 
	               success:function(res){
	               	   if (res ==1) {
	               	   	alert("清空购物车成功");
	               	   	window.location.href="http://127.0.0.1/ShoppingMall/advanced/frontend/web/index.php?r=goods/car";
	               	   } else {
	                  	alert("清空购物车失败");
	               	   }  	   
	             }
	         }) 
	    }
</script>
</body>
</html>