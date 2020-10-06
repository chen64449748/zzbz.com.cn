@extends('phonetpl')

@section('title')
首页
@stop
@section('content')

<ul class="nav nav-pills">
  <li role="presentation"  class="dropdown active">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      @if ($state == 1)
      生产中
      @elseif($state == 2)
      已完成
      @else
      流水线
      @endif

      <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
    	<li role="presentation"><a href="/">所有流水线</a></li>
    	<li role="presentation"><a href="/?state=1">生产中</a></li>
    	<li role="presentation"><a href="/?state=2">已完成</a></li>

    </ul>
  </li>
  
  <li role="presentation" ><a href="/addWork">添加流水线</a></li>
  <li role="presentation" ><a href="/process">设置工序</a></li>
</ul>
<br>
@foreach ($works as $work)
<div class="panel panel-default">

  <div class="panel-heading">
    <div class="lf">(#{{$work->id}}) 批号：{{$work->batch_number}}</div>
    <div class="rf">
        @if ($work->state == 1)
        <a href="/workDetail?work_id={{$work->id}}" class="btn btn-info">登记</a>
        @endif
    </div>
    <div class="clr"></div>
  </div>
  <div class="panel-body">
  	<div>客户：{{$work->customer}}</div>
    <div>名称：{{$work->name}}</div>
    <div>规格：{{$work->sku_name}}</div>
    <div>材质：{{$work->texture}}</div>
    <div>数量：{{$work->num}}</div>
    <div>交货时间：<span style="color: red">{{$work->dead_line}}</span></div>
    <div>操作员：</div>
    <div>
      @foreach($work->logs as $log)
        @if ($log->state == 1)
        <div class="col-xs-6 col-sm-6">{{$log->user->name}}:{{$log->processDetail->name}}:{{$log->num}}</div>
        @elseif ($log->state == 2)
        <div class="col-xs-6 col-sm-6">{{$log->user->name}}:{{$log->processDetail->name}}:完成</div>
        @endif
      @endforeach
      <div class="clr"></div>
    </div>
    <div style="text-align: center;">工序进度</div>
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
@endforeach
<div class="pagination">
{{$works->links()}}
</div>
@stop