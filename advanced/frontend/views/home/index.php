<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
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
	<title>云购物商城-换一种方式购物</title>
	<link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/base.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript">

        var intDiff = parseInt(90000);//倒计时总秒数量

        function timer(intDiff){
            window.setInterval(function(){
                var day=0,
                    hour=0,
                    minute=0,
                    second=0;//时间默认值
                if(intDiff > 0){
                    day = Math.floor(intDiff / (60 * 60 * 24));
                    hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
                    minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
                    second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
                }
                if (minute <= 9) minute = '0' + minute;
                if (second <= 9) second = '0' + second;
                $('#day_show').html(day+"天");
                $('#hour_show').html('<s id="h"></s>'+hour+'时');
                $('#minute_show').html('<s></s>'+minute+'分');
                $('#second_show').html('<s></s>'+second+'秒');
                intDiff--;
            }, 1000);
        }

        $(function(){
            timer(intDiff);
        });//倒计时结束

        $(function(){
	        /*======右按钮======*/
            $(".you").click(function(){
                nextscroll();
            });
            function nextscroll(){
                var vcon = $(".v_cont");
                var offset = ($(".v_cont li").width())*-1;
                vcon.stop().animate({marginLeft:offset},"slow",function(){
                    var firstItem = $(".v_cont ul li").first();
                    vcon.find(".flder").append(firstItem);
                    $(this).css("margin-left","0px");
                });
            };
	        /*========左按钮=========*/
            $(".zuo").click(function(){
                var vcon = $(".v_cont");
                var offset = ($(".v_cont li").width()*-1);
                var lastItem = $(".v_cont ul li").last();
                vcon.find(".flder").prepend(lastItem);
                vcon.css("margin-left",offset);
                vcon.animate({marginLeft:"0px"},"slow")
            });
        });

	</script>
</head>
<body>

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
			<form class="clearfix" action="index.php?r=home/search" method="post">
				<input class="search-text" accesskey="" id="key" autocomplete="off" placeholder="洗衣机" type="text" name="key">
				<input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
				<input class="button"  type="submit" value="搜索" />
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
			<a href="my-car.html" target="_blank">我的购物车</a>
			<em>10</em>
		</div>
	</div>
	<!--  顶部    start-->
	<div class="yHeader">
		<!-- 导航   start  -->
		<div class="yNavIndex">
			<div class="pullDown">
				<h2 class="pullDownTitle"><i class="icon-class"></i>所有商品分类</h2>
				<ul class="pullDownList">
					<!-- <li class="">
						<i class="list-icon-1"></i>
						
						<span></span>
					</li> -->
					<?php foreach ($res as $key => $value): ?>
						<li>
							<i class="list-icon-2"></i>
							<a href="" target="_blank"><?php echo $value['cat_name'] ?></a>
							<span></span>
						</li>
					<?php endforeach ?>
					
					
				</ul>
				<!-- 下拉详细列表具体分类 -->
				<div class="yMenuListCon">
				<?php foreach ($son as $key => $val): ?>
					<div class="yMenuListConin">
						<div class="yMenuLCinList">
						<?php foreach ($val as $key => $value): ?>
							<h3><a href="" class="yListName"><?php echo $value['cat_name'] ?></a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<?php foreach ($value['son'] as $v): ?>
									<a href=""><?php echo $v['cat_name'] ?></a>
								<?php endforeach ?>
							</p>
						<?php endforeach ?>							
						</div>
					</div>
				<?php endforeach ?>
					

					<!-- <div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div>

					<div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div> -->

					<!-- <div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div>

					<div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div>

					<div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div>

					<div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div>

					<div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div>

					<div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div>

					<div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div>

					<div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div>

					<div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div>

					<div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div>

					<div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div>

					<div class="yMenuListConin">
						<div class="yMenuLCinList">
							<h3><a href="" class="yListName">精品男装</a><a href="" class="yListMore">更多 ></a></h3>
							<p>
								<a href="" class="ecolor610">大牌上新</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
								<a href="">商场同款</a>
								<a href="">男装集结</a>
								<a href="">羽绒服</a>
								<a href="">加厚羽绒 </a>
								<a href="">高帮鞋</a>
							</p>
						</div>
					</div> -->

				</div>

			</div>
			<ul class="yMenuIndex">
				<li><a href="" target="_blank">首页</a></li>
				<li><a href="" target="_blank">云购物 </a></li>
				<li><a href="" target="_blank">限时购</a></li>
				<li><a href="" target="_blank">电器城</a></li>
				<li><a href="" target="_blank">家具城</a></li>
				<li><a href="" target="_blank">母婴专场</a></li>
				<li><a href="" target="_blank">数码专场</a></li>
			</ul>
		</div>
		<!-- 导航   end  -->
	</div>
	<!--  顶部    end-->

	<!-- banner  -->
	<div class="yBanner">
		<div class="yBannerList">
			<div class="yBannerListIn">
				<a href=""><img class="ymainBanner" src="images/banner1.jpg"  width="100%"></a>
				<div class="yBannerListInRight">
					<a href=""><img src="images/BR2.png" width="100%"/></a>
					<a href=""><img src="images/BR3.png" width="100%" /></a>
				</div>
			</div>
		</div>

		<div class="yBannerList ybannerHide">
			<div class="yBannerListIn">
				<a href=""><img class="ymainBanner" src="images/banner1.jpg" width="100%"></a>
				<div class="yBannerListInRight">
					<a href=""><img src="images/BR6.png" width="100%"/></a>
					<a href=""><img src="images/BR4.png" width="100%" /></a>
				</div>
			</div>
		</div>

		<div class="yBannerList ybannerHide">
			<div class="yBannerListIn">
				<a href=""><img class="ymainBanner" src="images/banner1.jpg" width="100%"></a>
				<div class="yBannerListInRight">
					<a href=""><img src="images/BR7.png" width="100%"/></a>
					<a href=""><img src="images/BR5.png" width="100%" /></a>
				</div>
			</div>
		</div>
	</div>
	<!-- banner end -->
</header>
<section id="">
	<div class="center pc-ad-img clearfix">
		<div class="pc-center-img"><img src="img/ad/ad1.jpg"></div>
		<div class="pc-center-img"><img src="img/ad/ad2.jpg"></div>
		<div class="pc-center-img"><img src="img/ad/ad3.jpg"></div>
		<div class="pc-center-img"><img src="img/ad/ad4.jpg"></div>
		<div class="pc-center-img"><img src="img/ad/ad5.jpg"></div>
	</div>
</section>
<section id="s">
	<div class="center">
		<div class="pc-center-he">
			<div class="pc-box-he clearfix">
				<div class="fl"><i class="pc-time-icon"></i></div>
				<div class="time-item fr">
					<span id="day_show">0天</span>
					<strong id="hour_show">0时</strong>
					<strong id="minute_show">00分</strong>
					<strong id="second_show">00秒</strong>
					<em style="color:#fff">后结束抢购</em>
				</div>
			</div>
			<div class="pc-list-goods">
				<div class="flashSale_wrap">
					<div class="flashSale area">
						<div class="tab-content">
							<div class="tab-pane active">
								<div class="flashSaleDeals">
									<div class="v_cont" style="width:9648px;overflow: hidden">
										<ul class="flder">
											<li index="0">
												<?php foreach ($goods_url as $key => $value) { ?>
															<div class="xsq_deal_wrapper">
																<a class="saleDeal" href="index.php?r=goods/detail&g_id=<?php echo $value['g_id'] ?>" target="_blank">
																	<div class="dealCon">
																		<img class="dealImg" src="<?php echo $value['g_img'] ?>" alt="">
																		<div class="zt2Qrcode overlay">
																			<div class="xsqMask"></div>
																			<p class="word1">15:00开抢</p>
																			<p class="word2"><?php echo $value['g_price'] ?></p>
																			<p class="word3">查看商品&gt;&gt;</p>
																		</div>
																		<!--<span class="soldOut xsqIcon"></span>-->
																	</div>
																	<div class="title_new">
																		<p class="word" title="<?php echo $value['g_name'] ?>"><?php echo $value['g_name'] ?></p>
																	</div>
																	<div class="dealInfo">
																		<span class="price">¥<em><?php echo $value['g_price']; ?></em></span>

																		<span class="shop_preferential">满2件8.8折</span>
																	</div>
																</a>
														        	</div>
									              <?php } ?>
											</li>
										</ul>
										<a href="javascript:;" class="zuo trigger"></a>
										<a href="javascript:;" class="you trigger"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="center pc-top-20">
		<div class="pc-center-he">
			<div class="pc-box-he pc-box-blue clearfix">
				<div class="fl"><i class="pc-time-icon"></i></div>
				<div class="fr pc-box-blue-link">
					<a href="#">上衣</a>
					<a href="#">短裙</a>
					<a href="#">牛仔裤</a>
					<a href="#">短袖</a>
					<a href="#">帽子</a>
				</div>
			</div>
			<div class="pc-list-goods">
				<div class="xsq_deal_wrapper pc-deal-list clearfix">
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg13.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品"><span class="baoyouText">[包邮]</span>【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品</p></div>
						<div class="dealInfo"><span class="price">¥<em>39.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg14.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="神火（supfire）C8T6 强光手电筒 远射LED充电式防身灯 配18650电池"><span class="baoyouText">[包邮]</span>神火（supfire）C8T6 强光手电筒 远射LED充电式防身灯 配18650电池</p></div>
						<div class="dealInfo"><span class="price">¥<em>99.0</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg15.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品"><span class="baoyouText">[包邮]</span>【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品</p></div>
						<div class="dealInfo"><span class="price">¥<em>99.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg16.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="暖风机家用取暖器婴儿电暖气暖手宝浴室防水N"><span class="baoyouText">[包邮]</span>暖风机家用取暖器婴儿电暖气暖手宝浴室防水N</p></div>
						<div class="dealInfo"><span class="price">¥<em>199.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg17.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="CIKOO 洗澡玩具 戏水玩具 水枪玩具 高压水枪玩具"><span class="baoyouText">[包邮]</span>CIKOO 洗澡玩具 戏水玩具 水枪玩具 高压水枪玩具</p></div>
						<div class="dealInfo"><span class="price">¥<em>29.0</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg18.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="联想（ThinkPad）轻薄系列E470c（20H3A004CD）14英寸笔记本电脑（i5-6200U 8G 500G 2G独显 Win10）黑色 "><span class="baoyouText">[包邮]</span>联想（ThinkPad）轻薄系列E470c（20H3A004CD）14英寸笔记本电脑（i5-6200U 8G 500G 2G独显 Win10）黑色 </p></div>
						<div class="dealInfo"><span class="price">¥<em>4499.9</em></span></div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="center pc-top-20">
		<div class="pc-center-he">
			<div class="pc-box-he pc-box-ge clearfix">
				<div class="fl"><i class="pc-time-icon"></i></div>
				<div class="fr pc-box-blue-link">
					<a href="#">上衣</a>
					<a href="#">短裙</a>
					<a href="#">牛仔裤</a>
					<a href="#">短袖</a>
					<a href="#">帽子</a>
				</div>
			</div>
			<div class="pc-list-goods">
				<div class="xsq_deal_wrapper pc-deal-list clearfix">
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg13.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品"><span class="baoyouText">[包邮]</span>【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品</p></div>
						<div class="dealInfo"><span class="price">¥<em>39.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg14.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="神火（supfire）C8T6 强光手电筒 远射LED充电式防身灯 配18650电池"><span class="baoyouText">[包邮]</span>神火（supfire）C8T6 强光手电筒 远射LED充电式防身灯 配18650电池</p></div>
						<div class="dealInfo"><span class="price">¥<em>99.0</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg15.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品"><span class="baoyouText">[包邮]</span>【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品</p></div>
						<div class="dealInfo"><span class="price">¥<em>99.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg16.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="暖风机家用取暖器婴儿电暖气暖手宝浴室防水N"><span class="baoyouText">[包邮]</span>暖风机家用取暖器婴儿电暖气暖手宝浴室防水N</p></div>
						<div class="dealInfo"><span class="price">¥<em>199.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg17.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="CIKOO 洗澡玩具 戏水玩具 水枪玩具 高压水枪玩具"><span class="baoyouText">[包邮]</span>CIKOO 洗澡玩具 戏水玩具 水枪玩具 高压水枪玩具</p></div>
						<div class="dealInfo"><span class="price">¥<em>29.0</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg18.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="联想（ThinkPad）轻薄系列E470c（20H3A004CD）14英寸笔记本电脑（i5-6200U 8G 500G 2G独显 Win10）黑色 "><span class="baoyouText">[包邮]</span>联想（ThinkPad）轻薄系列E470c（20H3A004CD）14英寸笔记本电脑（i5-6200U 8G 500G 2G独显 Win10）黑色 </p></div>
						<div class="dealInfo"><span class="price">¥<em>4499.9</em></span></div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="center pc-top-20">
		<div class="pc-center-he">
			<div class="pc-box-he pc-box-re clearfix">
				<div class="fl"><i class="pc-time-icon"></i></div>
				<div class="fr pc-box-blue-link">
					<a href="#">上衣</a>
					<a href="#">短裙</a>
					<a href="#">牛仔裤</a>
					<a href="#">短袖</a>
					<a href="#">帽子</a>
				</div>
			</div>
			<div class="pc-list-goods">
				<div class="xsq_deal_wrapper pc-deal-list clearfix">
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg13.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品"><span class="baoyouText">[包邮]</span>【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品</p></div>
						<div class="dealInfo"><span class="price">¥<em>39.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg14.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="神火（supfire）C8T6 强光手电筒 远射LED充电式防身灯 配18650电池"><span class="baoyouText">[包邮]</span>神火（supfire）C8T6 强光手电筒 远射LED充电式防身灯 配18650电池</p></div>
						<div class="dealInfo"><span class="price">¥<em>99.0</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg15.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品"><span class="baoyouText">[包邮]</span>【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品</p></div>
						<div class="dealInfo"><span class="price">¥<em>99.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg16.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="暖风机家用取暖器婴儿电暖气暖手宝浴室防水N"><span class="baoyouText">[包邮]</span>暖风机家用取暖器婴儿电暖气暖手宝浴室防水N</p></div>
						<div class="dealInfo"><span class="price">¥<em>199.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg17.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="CIKOO 洗澡玩具 戏水玩具 水枪玩具 高压水枪玩具"><span class="baoyouText">[包邮]</span>CIKOO 洗澡玩具 戏水玩具 水枪玩具 高压水枪玩具</p></div>
						<div class="dealInfo"><span class="price">¥<em>29.0</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg18.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="联想（ThinkPad）轻薄系列E470c（20H3A004CD）14英寸笔记本电脑（i5-6200U 8G 500G 2G独显 Win10）黑色 "><span class="baoyouText">[包邮]</span>联想（ThinkPad）轻薄系列E470c（20H3A004CD）14英寸笔记本电脑（i5-6200U 8G 500G 2G独显 Win10）黑色 </p></div>
						<div class="dealInfo"><span class="price">¥<em>4499.9</em></span></div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="center pc-top-20">
		<div class="pc-center-he">
			<div class="pc-box-he pc-box-qr clearfix">
				<div class="fl"><i class="pc-time-icon"></i></div>
				<div class="fr pc-box-blue-link">
					<a href="#">上衣</a>
					<a href="#">短裙</a>
					<a href="#">牛仔裤</a>
					<a href="#">短袖</a>
					<a href="#">帽子</a>
				</div>
			</div>
			<div class="pc-list-goods">
				<div class="xsq_deal_wrapper pc-deal-list clearfix">
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg13.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品"><span class="baoyouText">[包邮]</span>【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品</p></div>
						<div class="dealInfo"><span class="price">¥<em>39.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg14.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="神火（supfire）C8T6 强光手电筒 远射LED充电式防身灯 配18650电池"><span class="baoyouText">[包邮]</span>神火（supfire）C8T6 强光手电筒 远射LED充电式防身灯 配18650电池</p></div>
						<div class="dealInfo"><span class="price">¥<em>99.0</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg15.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品"><span class="baoyouText">[包邮]</span>【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品</p></div>
						<div class="dealInfo"><span class="price">¥<em>99.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg16.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="暖风机家用取暖器婴儿电暖气暖手宝浴室防水N"><span class="baoyouText">[包邮]</span>暖风机家用取暖器婴儿电暖气暖手宝浴室防水N</p></div>
						<div class="dealInfo"><span class="price">¥<em>199.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg17.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="CIKOO 洗澡玩具 戏水玩具 水枪玩具 高压水枪玩具"><span class="baoyouText">[包邮]</span>CIKOO 洗澡玩具 戏水玩具 水枪玩具 高压水枪玩具</p></div>
						<div class="dealInfo"><span class="price">¥<em>29.0</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg18.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="联想（ThinkPad）轻薄系列E470c（20H3A004CD）14英寸笔记本电脑（i5-6200U 8G 500G 2G独显 Win10）黑色 "><span class="baoyouText">[包邮]</span>联想（ThinkPad）轻薄系列E470c（20H3A004CD）14英寸笔记本电脑（i5-6200U 8G 500G 2G独显 Win10）黑色 </p></div>
						<div class="dealInfo"><span class="price">¥<em>4499.9</em></span></div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="center pc-top-20">
		<div class="pc-center-he">
			<div class="pc-box-he pc-box-ue clearfix">
				<div class="fl"><i class="pc-time-icon"></i></div>
				<div class="fr pc-box-blue-link">
					<a href="#">上衣</a>
					<a href="#">短裙</a>
					<a href="#">牛仔裤</a>
					<a href="#">短袖</a>
					<a href="#">帽子</a>
				</div>
			</div>
			<div class="pc-list-goods" style="height:auto">
				<div class="xsq_deal_wrapper pc-deal-list clearfix">
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg19.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品"><span class="baoyouText">[包邮]</span>【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品</p></div>
						<div class="dealInfo"><span class="price">¥<em>39.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg14.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="神火（supfire）C8T6 强光手电筒 远射LED充电式防身灯 配18650电池"><span class="baoyouText">[包邮]</span>神火（supfire）C8T6 强光手电筒 远射LED充电式防身灯 配18650电池</p></div>
						<div class="dealInfo"><span class="price">¥<em>99.0</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg15.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品"><span class="baoyouText">[包邮]</span>【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品</p></div>
						<div class="dealInfo"><span class="price">¥<em>99.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg16.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="暖风机家用取暖器婴儿电暖气暖手宝浴室防水N"><span class="baoyouText">[包邮]</span>暖风机家用取暖器婴儿电暖气暖手宝浴室防水N</p></div>
						<div class="dealInfo"><span class="price">¥<em>199.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg17.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="CIKOO 洗澡玩具 戏水玩具 水枪玩具 高压水枪玩具"><span class="baoyouText">[包邮]</span>CIKOO 洗澡玩具 戏水玩具 水枪玩具 高压水枪玩具</p></div>
						<div class="dealInfo"><span class="price">¥<em>29.0</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg18.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="联想（ThinkPad）轻薄系列E470c（20H3A004CD）14英寸笔记本电脑（i5-6200U 8G 500G 2G独显 Win10）黑色 "><span class="baoyouText">[包邮]</span>联想（ThinkPad）轻薄系列E470c（20H3A004CD）14英寸笔记本电脑（i5-6200U 8G 500G 2G独显 Win10）黑色 </p></div>
						<div class="dealInfo"><span class="price">¥<em>4499.9</em></span></div>
					</a>
				</div>
				<div class="xsq_deal_wrapper pc-deal-list clearfix" >
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg13.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品"><span class="baoyouText">[包邮]</span>【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品</p></div>
						<div class="dealInfo"><span class="price">¥<em>39.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg14.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="神火（supfire）C8T6 强光手电筒 远射LED充电式防身灯 配18650电池"><span class="baoyouText">[包邮]</span>神火（supfire）C8T6 强光手电筒 远射LED充电式防身灯 配18650电池</p></div>
						<div class="dealInfo"><span class="price">¥<em>99.0</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg15.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品"><span class="baoyouText">[包邮]</span>【京东超市】福临门 葵花籽原香食用调和油5L 中粮出品</p></div>
						<div class="dealInfo"><span class="price">¥<em>99.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg16.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="暖风机家用取暖器婴儿电暖气暖手宝浴室防水N"><span class="baoyouText">[包邮]</span>暖风机家用取暖器婴儿电暖气暖手宝浴室防水N</p></div>
						<div class="dealInfo"><span class="price">¥<em>199.9</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg17.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="CIKOO 洗澡玩具 戏水玩具 水枪玩具 高压水枪玩具"><span class="baoyouText">[包邮]</span>CIKOO 洗澡玩具 戏水玩具 水枪玩具 高压水枪玩具</p></div>
						<div class="dealInfo"><span class="price">¥<em>29.0</em></span></div>
					</a>
					<a class="saleDeal" href="" target="_blank">
						<div class="dealCon"><img class="dealImg" src="images/xlqg18.jpg" alt=""></div>
						<div class="title_new"><p class="word" title="联想（ThinkPad）轻薄系列E470c（20H3A004CD）14英寸笔记本电脑（i5-6200U 8G 500G 2G独显 Win10）黑色 "><span class="baoyouText">[包邮]</span>联想（ThinkPad）轻薄系列E470c（20H3A004CD）14英寸笔记本电脑（i5-6200U 8G 500G 2G独显 Win10）黑色 </p></div>
						<div class="dealInfo"><span class="price">¥<em>4499.9</em></span></div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

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
</script>
</body>
</html>