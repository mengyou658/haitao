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
            <div class="header">
            
            <h1 class="page-title">{{dispatcher.getControllerName()}}</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="{{url("index/index")}}">Home</a> <span class="divider"></span></li>
            <li class="active">{{dispatcher.getControllerName()}}</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
    {{ content() }}
	</div>
	<script type="text/javascript">
	     $(document).ready(function(){
			$(".menu[href*='{{dispatcher.getControllerName()}}']").parent().parent().addClass("in");
			$(".menu[href*='{{dispatcher.getControllerName()}}']").parent().addClass("active");
	     })
	</script>
  </body>
</html>



