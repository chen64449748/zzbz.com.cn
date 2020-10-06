@extends('phonetpl')

@section('title')
添加流水线
@stop
@section('content')
<ul class="nav nav-pills">
  <li role="presentation"  class="dropdown ">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      流水线<span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
    	<li role="presentation"><a href="/">所有流水线</a></li>
    	<li role="presentation"><a href="/?state=1">生产中</a></li>
    	<li role="presentation"><a href="/?state=2">已完成</a></li>

    </ul>
  </li>
  
  <li role="presentation" class="active" ><a href="/addWork">添加流水线</a></li>
  <li role="presentation" ><a href="/process">设置工序</a></li>
</ul>
<br>

<form action="/doAddWork" method="post">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">客户</span>
  <input type="text" name="work[customer]" class="form-control" value="陈真正" placeholder="" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">批号</span>
  <input type="text" name="work[batch_number]" class="form-control" value="{{date('YmdHis')}}" placeholder="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">名称</span>
  <input type="text" name="work[name]" class="form-control" value="" placeholder="" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">规格</span>
  <input type="text" name="work[sku_name]" class="form-control" value="" placeholder="" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">材质</span>
  <input type="text" name="work[texture]" class="form-control" value="" placeholder="" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">数量</span>
  <input type="text" id="num" name="work[num]" class="form-control" value="" placeholder="" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">选择工序</span>
  <input type="text" name="" id="process_name" data-toggle="modal" data-target="#myModal" class="form-control" value="" placeholder="" aria-describedby="basic-addon1">
  <input type="hidden" name="work[process_id]" id="process_id" value="">
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="md_close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">工序列表</h4>
      </div>
      <div class="modal-body">
        <div id="process_box">
        @foreach($process as $item)
        <div class="panel panel-default process_item" >
          <div class="panel-heading" process_id="{{$item->id}}">{{$item->name}}</div>
          <div class="panel-body">
            @foreach($item->details as $vi) 
            <div>{{$vi->name}}</div>
            @endforeach
          </div>
        </div>
        @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>

<!-- <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">交货时间</span>
  <input type="text" name="work[dead_line]" class="form-control" id="time" value="" placeholder="" aria-describedby="basic-addon1">
</div> -->
<br>
<input type="button" id="subm" class="btn btn-primary" style="width: 100%" name="" value="添 加">

</form>


@stop

@section('script')
<script type="text/javascript">
$('#time').datetimepicker({
	format: 'yyyy-mm-dd',
	language: 'zh-CN',
	autoclose: true,
	todayHighlight: true,
	minView: 2,
});

$('#process_box').on('click', '.process_item', function () {
  $('.panel-heading').css('background-color', '#f5f5f5');
  $(this).find('.panel-heading').css('background-color', '#7eff7e');
  var process_id = $(this).find('.panel-heading').attr('process_id');
  var process_name = $(this).find('.panel-heading').text();
  $('#process_id').val(process_id);
  $('#process_name').val(process_name);
  $('#md_close').click();
});

$('#subm').click(function () {
  var process_id = $('#process_id').val();
  var num = $('#num').val();
  if (!process_id) {
    alert('请选择工序');
    return;
  }
  if (!num) {
    alert('数量必填');
    return;
  }
  $('form').submit();
});
</script>
@stop