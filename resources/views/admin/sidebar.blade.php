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

			<ul class="nav">
				<li>
					<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-dinner"></i> <span>Masakan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPages" class="collapse ">
						<ul class="nav">
							<li><a href="{{ route('admin.masakan') }}" class="">Daftar Menu Masakan</a></li>
							<li><a href="{{route('admin.masakan.kategori')}}" class="">Kategori</a></li>
						</ul>
					</div>
				</li>
			</ul>
			

			<ul class="nav">
				<?php 
					$data = App\Order::all();
				?>
				<li><a href="{{ route('admin.order') }}" ><i class="lnr lnr-envelope"></i> <span>Pesanan <span class="badge">{{$data->count()}}</span></span></a></li>
			</ul>

			<ul class="nav">
				<li><a href="{{route('admin.transaksi')}}" ><i class="fa fa-money" aria-hidden="true"></i> <span>Transaksi</span></a></li>
			</ul>
			@endif
		</nav>
	</div>
</div>
<!-- END LEFT SIDEBAR -->