<nav class="navbar navbar-expand p-0">
 <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="{{route('admin.home')}}">         <img src="{{url('polished/assets/ngapak.png')}}" alt="logo" width="120px"></a>
  <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button" >
    <span class="oi oi-menu"></span>
  </button>
  
  <div class="border-primary-darkest bg-primary-darkest form-control d-none d-md-block w-60 ml-3 mr-5">
    <marquee class="text-white" behavior="alternate" direction="">Selamat Datang di Halaman Backend dari Ngapak Resto.</marquee>
  </div>

  <div class="dropdown d-none d-md-block pr-5">
    
    <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
      <span class="oi oi-person"></span> {{Auth::user()->fullname}}
    </button>
    <div class="dropdown-menu dropdown-menu-right" id="navbar-dropdown">
      <a href="#" class="dropdown-item" data-toggle="modal" data-target="#profilModal"><span class="oi oi-person"></span> Profile</a>
      <a href="{{ route('admin.user.setting') }}" class="dropdown-item"><span class="oi oi-cog"></span> Setting</a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal"><span class="oi oi-account-logout"></span> Sign Out</a>
    </div>
  </div>
</nav>


@push('modal')
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Anda Mau Logout?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin mau Mengakhiri Sesi ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-primary" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout
        </a>
      
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

      </div>
    </div>
  </div>
</div>
@endpush

@push('modal')
<div class="modal fade" id="profilModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Profile</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Your Name<h3>{{Auth::user()->fullname}}</h3>
        Your Username<h4>{{Auth::user()->username}}</h4>
        Your Email<h4>{{Auth::user()->email}}</h4>
        Your Level<h4>{{Auth::user()->level}}</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endpush