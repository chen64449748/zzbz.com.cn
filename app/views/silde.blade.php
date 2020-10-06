
@if (Session::get('manage')->name == 'ylw')
<li><a href="#"><i class="fa fa-list-alt"></i><span>合作公司</span></a>
	<ul class="sub-menu">
		<li @if ($action == '/') class="active" @endif><a href="/">公司列表</a></li>
		<li @if ($action == 'company/add') class="active" @endif><a href="/company/add">添加合作公司</a></li>
	</ul>
</li>

<li><a href="#"><i class="fa fa-list-alt"></i><span>公司品牌</span></a>
	<ul class="sub-menu">
		<li @if ($action == 'sign/list') class="active" @endif><a href="/sign/list">品牌列表</a></li>
		<li @if ($action == 'sign/add') class="active" @endif><a href="/sign/add">添加品牌</a></li>
	</ul>
</li>

<li><a href="#"><i class="fa fa-list-alt"></i><span>货品</span></a>
	<ul class="sub-menu">
		<li @if ($action == 'goods/list') class="active" @endif><a href="/goods/list" class="goods_nav">货品列表</a></li>
		<li @if ($action == 'goods/add') class="active" @endif><a href="/goods/add">添加货品</a></li>
	</ul>
</li>

<li><a href="#"><i class="fa fa-list-alt"></i><span>属性设置</span></a>
	<ul class="sub-menu">
		<li @if ($action == 'config/list') class="active" @endif><a href="/config/list">所有属性</a></li>
	</ul>
</li>

<li><a href="#"><i class="fa fa-list-alt"></i><span>出入库单</span></a>
	<ul class="sub-menu">
		<li @if ($action == 'stock/order/list') class="active" @endif><a href="/stock/order/list" class="stock_nav">出入库单</a></li>
		<li @if ($action == 'stock/add') class="active" @endif><a href="/stock/add">出入库</a></li>
	</ul>
</li>

<li><a href="#"><i class="fa fa-list-alt"></i><span>扫码</span></a>
	<ul class="sub-menu">

		<li @if ($action == 'sm/print') class="active" @endif><a href="/sm/print" class="stock_nav">条码打印</a></li>
		<li @if ($action == 'sm/order') class="active" @endif><a href="/sm/order" >扫码入库</a></li>
		<li @if ($action == 'sm/out') class="active" @endif><a href="/sm/out">发货</a></li>
	</ul>
</li>

<li><a href="#"><i class="fa fa-list-alt"></i><span>财务</span></a>
	<ul class="sub-menu">
		<li @if ($action == 'finance/list') class="active" @endif><a href="/finance/list" >财务列表</a></li>
	</ul>
</li>

@elseif (Session::get('manage')->name == 'fh')

<li><a href="#"><i class="fa fa-list-alt"></i><span>扫码</span></a>
	<ul class="sub-menu">
		<li @if ($action == 'sm/out') class="active" @endif><a href="/sm/out">发货</a></li>
	</ul>
</li>

@elseif (Session::get('manage')->name == 'rk')

<li><a href="#"><i class="fa fa-list-alt"></i><span>扫码</span></a>
	<ul class="sub-menu">
		<li @if ($action == 'sm/print') class="active" @endif><a href="/sm/print" class="stock_nav">条码打印</a></li>
		<li @if ($action == 'sm/order') class="active" @endif><a href="/sm/order" >扫码入库</a></li>
	</ul>
</li>

@endif