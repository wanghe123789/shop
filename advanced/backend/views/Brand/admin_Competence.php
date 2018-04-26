<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script src="js/shopFrame.js" type="text/javascript"></script>
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.dataTables.bootstrap.js"></script>
<title>品牌展示</title>
</head>
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<body>
<!-- <div class="margin Competence_style" id="page_style">
   <div class="operation clearfix">
<button class="btn button_btn btn-danger" type="button" onclick=""><i class="fa fa-trash-o"></i>&nbsp;删除</button>
<span class="submenu"><a href="add_Competence.html"  class="btn button_btn bg-deep-blue" title="添加权限"><i class="fa  fa-edit"></i>&nbsp;添加权限</a></span>
   <div class="search  clearfix">
   <input name="" type="text"  class="form-control col-xs-8"/><button class="btn button_btn bg-deep-blue " onclick=""  type="button"><i class="fa  fa-search"></i>&nbsp;搜索</button>
</div> -->
</div>
<div class="compete_list">
       <table id="sample-table-1" class="table table_list table_striped table-bordered dataTable no-footer">
		 <thead>
			<tr>
			  <th>商品编号</th>
			  <th>商品名称</th>
			  <th>商品图片</th>
              <th>商品描述</th>          
			  <th class="hidden-480">操作</th>
             </tr>
		    </thead>
             <tbody>

             	 <?php foreach ($data as $k => $v){  ?>
          <tr>
              <td align="center"><?php echo $v['id']?></td>
              <td align="center"><?php echo $v['name']?></td>
              <td align="center"><img src="<?php echo $v['face']?>" width=100 height=80></td>
              <td align="center"><?php echo $v['discribe']?></td>
              <td align="center">
              <a href="?r=brand/del&id=<?php echo $v['id'];?>">删除</a>//<a href="?r=brand/update&id=<?php echo $v['id'];?>">修改</a></td>
             
     </tr>
     <?php } ?>							
		      </tbody>
	        </table>
     </div>
</div>
</body>
</html>
<script>
	/*权限删除*/
function Competence_del(obj,id){
	layer.confirm('确认要删除吗？',{icon:0,},function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
/*******滚动条*******/
$("body").niceScroll({  
	cursorcolor:"#888888",  
	cursoropacitymax:1,  
	touchbehavior:false,  
	cursorwidth:"5px",  
	cursorborder:"0",  
	cursorborderradius:"5px"  
});
</script>
