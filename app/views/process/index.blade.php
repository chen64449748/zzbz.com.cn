@extends('phonetpl')

@section('title')
设置工序
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
  
  <li role="presentation" ><a href="/addWork">添加流水线</a></li>
  <li role="presentation" class="active" ><a href="/process">设置工序</a></li>
</ul>
<br>

<a class="btn btn-primary" style="width: 100%" href="/addProcess">添加工序</a>
<br>
<br>

@foreach($process as $item)
<a href="/setProcess">
<div class="panel panel-default">
  <div class="panel-heading">{{$item->name}}</div>
  <div class="panel-body">
    @foreach($item->details as $vi) 
    <div>{{$vi->name}}</div>
    @endforeach
  </div>
</div>
</a>
@endforeach
@stop