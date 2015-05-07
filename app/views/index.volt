<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    {{ get_title() }}
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	{{ stylesheet_link('css/bootstrap.min.css') }}
	{{ stylesheet_link('css/theme.css') }}
	{{ stylesheet_link('css/font-awesome.css') }}
	        
	{{ javascript_include('js/jquery.min.js') }}
	{{ javascript_include('js/bootstrap.min.js') }}

  </head>
  <body class=""> 
    <?php $this->partial("layouts/nav")?>
    <?php $this->partial("layouts/left")?>
    <div class="content">
    {{ content() }}
	</div>
	<script type="text/javascript">
	     $(document).ready(function(){
//	    	var url1=window.location.pathname;
//	    	$("[href='url1']").parent().class="active";
//	    	alert("{{ dispatcher.getControllerName() }}");
//			alert("<?=$this->dispatcher->getControllerName();?>");
			$("[href*='{{dispatcher.getControllerName()}}/{{dispatcher.getActionName()}}']").parent().parent().addClass("in");
			$("[href*='{{dispatcher.getControllerName()}}/{{dispatcher.getActionName()}}']").parent().addClass("active");
	     })
	</script>
  </body>
</html>


