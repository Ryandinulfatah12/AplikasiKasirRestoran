@extends('admin.main2')
@section('title','Dashboard')
@section('content')

<div class="row ">
  <div class="col-md-12 pl-3 pt-2">
      <div class="pl-3">
          <h3>Dashboard</h3>
      </div>
  </div>
</div>

<!-- start info box -->
<div class="row ">
  <div class="col-md-12 pl-3 pt-2">
      <div class="row pl-3">

        <div class="col-lg-3 col-md-6 mb-2 col-sm-6">
          <div class="card border-0 shadow-sm bg-danger text-light">
            <div class="card-body">
                <div class="media">
                  <?php
                      $orders =  App\Order::where('status_order', 'Pending')->get();
                    ?>
                    <div class="media-body">
                      <h2 class="fw-bold">{{$orders->count()}}</h2>
                      <h6>New orders!!</h6>
                    </div>
                    <span class="oi oi-bell p-2 fs-9 text-danger-lightest"></span>
                </div>
            </div>
            <div class="card-footer border-0 text-center p-1 bg-danger-lighter">
              <a href="{{route('entri.order')}}" class="text-light">
                  More info <span class="oi oi-arrow-circle-right"></span>
              </a>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-2 col-sm-6">
          <div class="card border-0 shadow-sm bg-primary text-light">
            <div class="card-body">
                <div class="media">
                  <?php
                      $data = App\User::all();
                    ?>
                    <div class="media-body">
                      <h2 class="fw-bold">{{$data->count()}}</h2>
                      <h6>User Registered</h6>
                    </div>
                    <span class="oi oi-people p-2 fs-9 text-indigo-lighter"></span>
                </div>
            </div>
            <div class="card-footer border-0 text-center p-1 bg-primary-lighter">
              <a href="{{route('admin.user')}}" class="text-light">
                  More info <span class="oi oi-arrow-circle-right"></span>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-2 col-sm-6">
          <div class="card border-0 shadow-sm bg-warning text-primary">
            <div class="card-body">
                <div class="media">
                  <?php
                      $data = App\Masakan::all();
                    ?>
                    <div class="media-body">
                      <h2 class="fw-bold">{{$data->count()}}</h2>
                      <h6>Masakan</h6>
                    </div>
                    <span class="oi oi-pie-chart p-2 fs-9 text-primary-lighter"></span>
                </div>
            </div>
            <div class="card-footer border-0 text-center p-1 bg-warning-lighter">
              <a href="{{route('admin.masakan')}}" class="text-primary">
                  More info <span class="oi oi-arrow-circle-right"></span>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-2 col-sm-6">
          <div class="card border-0 shadow-sm bg-success text-light">
            <div class="card-body">
                <div class="media">
                  <?php
                      $data = App\Transaksi::all();
                    ?>
                    <div class="media-body">
                      <h2 class="fw-bold">{{$data->count()}}</h2>
                      <h6>Data Transaksi</h6>
                    </div>
                    <span class="oi oi-dollar p-2 fs-9"></span>
                </div>
            </div>
            <div class="card-footer border-0 text-center p-1 bg-success-lighter">
              <a href="{{route('admin.transaksi')}}" class="text-light">
                  More info <span class="oi oi-arrow-circle-right"></span>
              </a>
            </div>
          </div>
        </div>

      </div>
  </div>
</div>
<!-- end info box -->

<div class="col-lg-12 pt-3 mx-auto">
  <div class="card shadow-sm ">
    <div class="card-header bg-primary text-light d-inline">
      <a class="btn btn-success float-right" href=""><span class="oi oi-print"></span> Export Excel</a><a class="btn btn-danger float-right" href=""><span class="oi oi-print"></span> Export PDF</a>
      <h6><b>Laporan Pesanan & Transaksi</b></h6>
    </div>
    <!-- Chart Tag -->
    <div class="card-body">
        <canvas id="chartresto"></canvas>
    </div>
  </div>
</div>


@endsection

@push('js')
<script type="text/javascript">
  var ctx = document.getElementById('chartresto');
  var data = {
        labels: ["Order", "Transaksi"],
        datasets: [{
            label: 'Data Harian',
            data: [2, 2],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    }
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
  });
</script>
@endpush