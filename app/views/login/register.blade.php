@extends('phonetpl')

@section('title')
注册
@stop
@section('content')
@if (Session::get('info'))
	<div style="color: red; text-align: center; padding: 10px;">{{Session::get('info')}}</div>
@endif
<form action="/doRegister" method="post">
<div style="height: 100px;"></div>
<div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">
  	<span class="glyphicon glyphicon-user"></span>
  </span>
  <input type="text" name="username" class="form-control" placeholder="用户名" aria-describedby="sizing-addon1">
</div>
<br>
<div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">
  	<span class="glyphicon glyphicon-lock"></span>
  </span>
  <input type="password" name="password" class="form-control" placeholder="密码" aria-describedby="sizing-addon1">
</div>
<br>
<input type="submit" class="btn btn-primary" style="width: 100%" name="" value="注  册">

</form>
@stop