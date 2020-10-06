@extends('phonetpl')

@section('title')
流水线登记
@stop

@section('content')
<br>

<div class="panel panel-default">
  <div class="panel-heading">
    <div>(#{{$work->id}}) 批号：{{$work->batch_number}}</div>
  </div>
  <div class="panel-body">
  	<div>客户：{{$work->customer}}</div>
    <div>名称：{{$work->name}}</div>
    <div>规格：{{$work->sku_name}}</div>
    <div>材质：{{$work->texture}}</div>
    <div>数量：<span id="allnum">{{$work->num}}</span></div>
    <div>交货时间：<span style="color: red">{{$work->dead_line}}</span></div>
    <div>业务员：妹子</div>

    <div class="progress">
      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" @if($work->state == 2) style="width: 100%" @else style="width: {{WorkDeal::progress($work->id)}}%" @endif>
      </div>
    </div>

    <div style="text-align: center;">
      @if ($work->state == 2)
      <span style="color: green; font-size: 24px;">全部工序已完成</span>
      @else
      正在操作： <span style="color: green; font-size: 24px;">{{WorkDeal::workNow($work->id, $work->process_id)['name']}}</span>
      @endif
    </div>
  </div>
</div>	
	
<br>
<form action="/addWorkProcess" method="post">
  <input type="hidden" name="work[id]" value="{{$work->id}}">
  <input type="hidden" name="work[process_id]" value="{{$work->process_id}}">
  <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">数量</span>
    <input type="text" name="work[num]" id="num" class="form-control" value="" placeholder="" aria-describedby="basic-addon1">
  </div>

  <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">单价</span>
    <input type="text" name="work[price]" id="price" class="form-control" value="" placeholder="" aria-describedby="basic-addon1">
  </div>

  <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">备注</span>
    <input type="text" name="work[remark]" class="form-control" value="" placeholder="" aria-describedby="basic-addon1">
  </div>
  <br>
  <input type="hidden" id="type" name="type" value="">
  @if ($work->state == 1)
  <input type="button" id="addone" stype="1" class="btn btn-info addone" style="width: 100%" value="添加登记">
  <br><br>
  <input type="button" id="addall" stype="2" class="btn btn-primary addone" style="width: 100%" value="确认登记完成">
  @endif
</form>
@stop

@section('script')
<script type="text/javascript">
  $('#addone').click(function () {
     var num = $('#num').val();
     var price = $('#price').val();
     var allnum = $('#allnum').text();
     if (!price) {
      alert('单价必须填');
      return;
     }

     if (!num) {
      alert('数量必须填');
      return;
     }
     $('#type').val($(this).attr('stype'));

     $('form').submit();
  });

  $('#addall').click(function () {
    $('#type').val($(this).attr('stype'));
    $('form').submit();
  });
</script>
@stop