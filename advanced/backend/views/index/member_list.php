<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
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
<script src="js/laydate/laydate.js" type="text/javascript"></script>
<script type="text/javascript" src="js/proTree.js" ></script>
<title>会员管理</title>
</head>
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<body>
<div class="margin" id="page_style">
   
 <div class="h_products_list clearfix" id="Sellerber">
   <div class="Sellerber_left menu" id="menuBar">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div> 
    <div class="menu_style" id="menu_style">
    <div class="list_content">
     <div class="side_list">
        <div class="column_title"><h4 class="lighter smaller">会员等级列表</h4></div>
       <div class="st_tree_style tree">
      </div>
    </div>
  </div>
 </div>
</div>
<div class="bkg_List_style list_Exhibition list_show padding15">
 <div class="bkg_List_operation clearfix searchs_style">
  <ul class="bkg_List_Button_operation">
   <li class="btn btn-danger"><a href="javascrpt:void()" class="btn_add"><em class="bkg_List_icon icon_add"></em>删除用户</a></li>
   <li class="btn bg-deep-blue"><a href="javascrpt:void()" class="btn_add"><em class="bkg_List_icon icon_modify"></em>修改用户</a></li>
   <li class="btn btn-Dark-success"><a href="javascrpt:void()" class="btn_add"><em class="bkg_List_icon icon_close"></em>关闭用户</a></li>
  </ul>
 </div>
  <div class="datalist_show">
 <div class="bkg_List clearfix datatable_height confirm">
  <table class="table  table_list table_striped table-bordered">
   <thead>
  
    <tr>
     <th  width="40"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
     <th>用户名</th>
     <th>性别</th>
     <th>电话</th>
     <th>邮箱</th>
    
     <th>加入时间</th>
     
     <th>状态</th>
      <th>编辑</th>
    </tr>
    
   </thead>
   <tbody>
    <?php foreach($a as $key=>$val){ ?>
    <tr>
     <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
     <input type="hidden"  id="id" value=" <?php echo $val['user_id']; ?> " />
     <td><?php echo $val['username']; ?></td>
     <td><?php if ($val['sex']=1) {
       echo "男";
     }else{
      echo "女";
      } ?></td>
     <td><?php echo $val['user_tel']; ?></td>
     <td><?php echo $val['user_email']; ?></td>
     
     <td><?php echo date('Y-m-d',$val['register_time']); ?></td>
    
      <td class="td-status"><?php if ($val['user_status']==1) {
        echo "启用";
       ?>
               <td class="td-manage">
        <a  href="javascript:;" id="ty" title="停用"  class="btn btn-xs btn-status">停用</a> 
        
        <a title="删除" href="javascript:;"  id="del" class="btn btn-xs btn-delete" >删除</a>
       <?php 
      } else{
        echo "未启用"; ?>
                <td class="td-manage">
        <a  href="javascript:;" id="qty" title="取消停用"  class="btn btn-xs btn-status">取消停用</a> 
        
        <a title="删除" href="javascript:;"  id="del" class="btn btn-xs btn-delete" >删除</a>
        <?php 
        }
        ?><!-- <span class="label label-success radius">启用</span> --></td>

       </td>
    </tr>
    <?php }  ?>
   </tbody>
  </table>
    </div>
   </div>
  </div>
 </div>
</div>

 
</div>
 </div>
</body>
</html>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script>

/*停用*/
 $('#ty').click(function() {
                var id = $('#id').val();
               
                $.ajax({
                url:'<?= Url::to(['index/del']);?>',
                data:{'id':id},
                type:'post',
            success:function(msg){
              if(msg == 1){

                window.location.href = '<?= Url::to(['index/addvip']);?>';
          }
              }
     });
  })
 $('#qty').click(function() {
                var id = $('#id').val();
                $.ajax({
                url:'<?= Url::to(['index/ndel']);?>',
                data:{'id':id},
                type:'post',
            success:function(msg){
              if(msg == 1){

                window.location.href = '<?= Url::to(['index/addvip']);?>';
          }
              }
     });
  }) 
function member_stop(obj,id){
	layer.confirm('确认要停用改用户吗？',function(index){
      vaid = $('#id').val();
      $.ajax({
        type:'post',
        data:{id:id},
        url:'<?= Url::to(['index/del']);?>',
         success:function(msg){
                 if (msg == 1) {
                        
                }
         }
      })

	});
}
/*启用*/
function member_start(obj){
  id = $('#id').val();
  alert(id);
	layer.confirm('确认启用该用户？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-status" onClick="member_stop(this,id)" href="javascript:;" title="停用">停用</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!',{icon: 6,time:1000});
    alert(id);
	});
}
	/*用户-删除*/
$('#del').click(function() {
                var id = $('#id').val();
                $.ajax({
                url:'<?= Url::to(['index/delete']);?>',
                data:{'id':id},
                type:'post',
            success:function(msg){
              if(msg == 1){

                window.location.href = '<?= Url::to(['index/addvip']);?>';
          }
              }
     });
  }) 

/********************列表操作js******************/
$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
});
</script>
