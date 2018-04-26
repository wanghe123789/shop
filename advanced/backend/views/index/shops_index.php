<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>


  <div class="Sellerber_content" id="contents">
    <div class="breadcrumbs" id="breadcrumbs">
       <a id="js-tabNav-prev" class="radius btn-default left_roll" href="javascript:;"><i class="fa fa-backward"></i></a>
       <div class="breadcrumb_style clearfix">
	     <ul class="breadcrumb clearfix" id="min_title_list">
          <li class="active home"><span title="我的桌面" data-href="index.htmlf"><i class="fa fa-home home-icon"></i>首页</span></li>
         </ul>
      </div>
       <a id="js-tabNav-next" class="radius btn-default right_roll" href="javascript:;"><i class="fa fa-forward"></i></a>
       <div class="btn-group radius roll-right">
		 <a class="dropdown tabClose" data-toggle="dropdown" aria-expanded="false">页签操作<i class="fa fa-caret-down" style="padding-left: 3px;"></i></a>
			<ul class="dropdown-menu dropdown-menu-right" id="dropdown_menu">
				<li><a class="tabReload" href="javascript:void(0);">刷新当前</a></li>
				<li><a class="tabCloseCurrent" href="javascript:void(0);">关闭当前</a></li>
				<li><a class="tabCloseAll" href="javascript:void(0);">全部关闭(首页)</a></li>
				<li><a class="tabCloseOther" href="javascript:void(0);">除此之外全部关闭</a></li>
			</ul>
		</div>
		<a href="javascript:void()" class="radius roll-right fullscreen"><i class="fa fa-arrows-alt"></i></a>
    </div>
  <!--具体内容-->  
  <div id="iframe_box" class="iframe_content">
  <div class="show_iframe index_home" id="show_iframe">
       <iframe scrolling="yes" class="simei_iframe" frameborder="0" src="index.html" name="iframepage" data-href="index.html"></iframe>
       </div>
      </div>
  </div>