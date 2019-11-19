<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				<li><a href="{{route('admin.home')}}" ><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
			</ul>

			@if(Auth::user()->level == 'admin')
			<ul class="nav">
				<li><a href="{{route('admin.user')}}" ><i class="lnr lnr-users"></i> <span>User</span></a></li>
			</ul>
			@endif
			
			@if(Auth::user()->level == 'admin')
			<ul class="nav">
				<li><a href="{{ route('admin.masakan') }}" ><i class="lnr lnr-dinner"></i> <span>Masakan</span></a></li>
			</ul>
			@endif

			<ul class="nav">
				<li><a href="{{ route('admin.order') }}" ><i class="lnr lnr-envelope"></i> <span>Pesanan</span></a></li>
			</ul>

			<!-- <ul class="nav">
				<li><a href="#" ><i class="fa fa-money" aria-hidden="true"></i> <span>Transaksi</span></a></li>
			</ul> -->

		</nav>
	</div>
</div>
<!-- END LEFT SIDEBAR -->