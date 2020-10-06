<!DOCTYPE html>
<html>
<head>
	<title>制作流程系统</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="/bootstrap3/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css">
</head>
<body>
	<div class="container-fluid" id="pcont">
		<div class="row header">
			<span id="back" class="glyphicon glyphicon-chevron-left lf ac"></span>
			<span class="ac title">@yield('title')</span>
			<a href="/"><span class="glyphicon glyphicon-home rf ac" ></span></a>
		</div>
	
		@yield('content')
	</div>
</body>

<script src="/js/jquery.js"></script>
<script type="text/javascript" src="/bootstrap3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.datetimepicker/locales/bootstrap-datetimepicker.zh-CN.js"></script>
@yield('script')
<style type="text/css">
	body {background-color: #EBEBEB;}
	.header { height: 60px; border-bottom: 1px #EBEBEB solid; background-color: white }
	.lf {float: left}
	.rf {float: right;}
	.clr{clear: both;}
	.ac {line-height: 60px; padding: 0 10px;}
	.title {font-size: 24px;}
</style>
<script type="text/javascript">
	$('#back').click(function () {
		window.history.go(-1);
	});
</script>
</html>