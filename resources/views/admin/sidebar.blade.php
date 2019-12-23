<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				<li><a href="{{route('admin.home')}}" ><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
				@if(Auth::user()->level == 'admin')
				<li><a href="{{route('admin.user')}}" ><i class="lnr lnr-users"></i> <span>User</span></a></li>				

				<li>
					<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-dinner"></i> <span>Masakan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPages" class="collapse ">
						<ul class="nav">
							<li><a href="{{ route('admin.masakan') }}"><i class="fa fa-list" aria-hidden="true"></i> Daftar Masakan</a></li>
							<li><a href="{{route('admin.masakan.kategori')}}"><i class="fa fa-tags" aria-hidden="true"></i> Kategori</a></li>
						</ul>
					</div>
				</li>

				<li><a href="{{route('entri.order')}}" ><i class="lnr lnr-cart"></i> <span>Entri Order</span></a></li>
				@endif

				@if(Auth::user()->level == 'admin' || Auth::user()->level == 'kasir')
				<li><a href="{{route('cashier')}}" ><i class="fa fa-money" aria-hidden="true"></i> <span>Kasir</span></a></li>

				<li>
					<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-database" aria-hidden="true"></i> <span>Rekap</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPages2" class="collapse ">
						<ul class="nav">
							<?php 
								$data = App\Order::all();
							?>
							<li><a href="{{ route('admin.order') }}" ><i class="lnr lnr-envelope"></i> <span>Rekap Order <span class="badge">{{$data->count()}}</span></span></a></li>
							<li><a href="{{route('admin.transaksi')}}" ><i class="fa fa-money" aria-hidden="true"></i> <span>Rekap Transaksi</span></a></li>
						</ul>
					</div>
				</li>
				@endif
			</ul>
					
			
		</nav>
	</div>
</div>
<!-- END LEFT SIDEBAR -->