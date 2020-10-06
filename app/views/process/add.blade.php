@extends('phonetpl')

@section('title')
添加工序
@stop
@section('content')
<br>

<form action="/doAddProcess" method="post">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">工序总称</span>
  <input type="text" name="process" class="form-control" value="" placeholder="如纸盒工序" aria-describedby="basic-addon1">
</div>
<br>
<br>

<input id="add_process" type="button" class="btn btn-primary" value="加一道">

<div id="detail_box">
	<div class="input-group">
	  <span class="input-group-addon " id="basic-addon1">工序名称</span>
	  <input type="text" name="process_detail[]" class="form-control" value="" placeholder="如压痕" aria-describedby="basic-addon1">
	  <span  class="input-group-addon del" id="basic-addon1">删除</span>
	</div>
</div>
<br>

<input type="submit" name="" class="btn btn-primary" style="width: 100%" value="确 认">
</form>
@stop

@section('script')
<script type="text/javascript">
	
	$('#add_process').click(function() {
		var html = '<div class="input-group">\
	  <span class="input-group-addon " id="basic-addon1">工序名称</span>\
	  <input type="text" name="process_detail[]" class="form-control" value="" placeholder="如压痕" aria-describedby="basic-addon1">\
	  <span  class="input-group-addon del" id="basic-addon1">删除</span>\
	</div>';

		$('#detail_box').append(html);
	});

	$('#detail_box').on('click', '.del', function () {
		$(this).parents('.input-group').remove();
	});
</script>
@stop