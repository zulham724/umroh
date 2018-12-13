<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<!-- Users, Roles Permissions -->
<li class="treeview">
	<a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
	  <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
	  <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
	  <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
	</ul>
</li>
<li class="treeview">
	<a href="#"><i class="fa fa-shopping-cart"></i> <span>Store</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu"> 
		<li><a href='{{ backpack_url('order') }}'><i class='fa fa-tag'></i> <span>Orders</span></a></li>
		<li><a href='{{ backpack_url('person') }}'><i class='fa fa-tag'></i> <span>Persons</span></a></li>
		<li><a href='{{ backpack_url('voucher') }}'><i class='fa fa-tag'></i> <span>Vouchers</span></a></li>
		<li><a href='{{ backpack_url('payment') }}'><i class='fa fa-tag'></i> <span>Payments</span></a></li>
	</ul>
</li>
<li class="treeview">
	<a href="#"><i class="fa fa-shopping-bag"></i> <span>Packages</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu"> 
		<li><a href='{{ backpack_url('plan') }}'><i class='fa fa-tag'></i> <span>Plans</span></a></li>
		<li><a href='{{ backpack_url('planfeature') }}'><i class='fa fa-tag'></i> <span>Plan Features</span></a></li>
	</ul>
</li>
<li class="treeview">
	<a href="#"><i class="fa fa-group"></i> <span>Layout</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href="{{backpack_url('page') }}"><i class="fa fa-file-o"></i> <span>Pages</span></a></li>
		<li><a href="{{ backpack_url('menu-item') }}"><i class="fa fa-list"></i> <span>Menu</span></a></li>
	</ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-cogs"></i> <span>Advanced</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href="{{ backpack_url('backup') }}"><i class="fa fa-hdd-o"></i> <span>Backups</span></a></li>
      <li><a href="{{ backpack_url('log') }}"><i class="fa fa-terminal"></i> <span>Logs</span></a></li>
      <li><a href="{{ backpack_url('setting') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
    </ul>
</li>

{{-- <li><a href='{{ backpack_url('planhasvoucher') }}'><i class='fa fa-tag'></i> <span>Plan Has Vouchers</span></a></li> --}}