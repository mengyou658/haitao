        <div class="header">
            
            <h1 class="page-title">{{dispatcher.getControllerName()}}</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="{{url("index/index")}}">Home</a> <span class="divider"></span></li>
            <li class="active">{{dispatcher.getControllerName()}}</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a class="btn btn-primary" href="{{url("products/new")}}"><i class="glyphicon glyphicon-plus"></i> 新增</a>
    <button class="btn">Import</button>
    <button class="btn">Export</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>产品编号</th>
          <th>产品名称</th>
          <th>价格</th>
          <th style="width: 60px;">操作</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($page->items as $item){?>
        <tr>
          <td><?php echo $item->id;?></td>
          <td><?php echo $item->name;?></td>
          <td><?php echo $item->price;?></td>
          <td>
              <a href="{{url("products/edit/")}}<?php echo $item->id;?>"><i class="glyphicon glyphicon-pencil"></i></a>
              <a href="javascript:void(0)" role="button" onclick="dodel(<?php echo $item->id;?>)"><i class="glyphicon glyphicon-remove"></i></a>
          </td>
        </tr>
      <?php }?> 
      </tbody>
    </table>
</div>
	<nav>
	<?php if($page->total_pages>1){?>
	    <ul class="pagination">
	    	<li><a href="index?page=<?= $page->first;?>">First</a></li>
	        <li><a href="index?page=<?= $page->before;?>">Prev</a></li>
	        <?php for($i=1;$i<=$page->total_pages;$i++){?>
	      	  <li><a href="index?page=<?=$i;?>"><?=$i;?></a></li>
	      	<?php }?>
	        <li><a href="index?page=<?= $page->next;?>">Next</a></li>
	        <li><a href="index?page=<?= $page->last;?>">Last</a></li>
	    </ul>
	<?php }?>
	</nva>
</div>
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
	    <div class="modal-dialog">
   		<div class="modal-content">
	    <div class="modal-header">
	        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
	        <h3 id="myModalLabel">Delete Confirmation</h3>
	    </div>
	    <div class="modal-body">
	        <p class="error-text"><i class="glyphicon glyphicon-exclamation-sign " style="font-size: 60px"></i>
	          <span style="position:relative;top:-20px;font-size: 20px">Are you sure you want to delete the user?</span>
	        </p>
	    </div>
	    <div class="modal-footer">
	        <button aria-hidden="true" data-dismiss="modal" class="btn">Cancel</button>
	        <a  class="btn btn-danger"  >Delete</a>
	    </div>
	    </div>
	    </div>
	</div>
	
	
<script type="text/javascript">
	function dodel(id){
	$(".btn-danger").attr('href','delete/'+id);
		$('.modal').modal('show');

	}
</script>
                   
    


