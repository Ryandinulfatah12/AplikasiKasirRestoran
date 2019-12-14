<section id="menu-list" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center marb-35">
          <h1 class="header-h">Menu List</h1>
          <p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
            <br>nibh euismod tincidunt ut laoreet dolore magna aliquam. </p>
        </div>


        <div class="col-md-6 mb-3">
          <form method="GET" action="{{ route('menu-masakan') }}">
            @csrf
            <div class="input-group">
              <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control" placeholder="Cari Sesuatu..." id="keyword" autofocus>
              <span class="input-group-btn"><button type="button" name="cari" class="btn btn-primary">Cari</button></span>
            </div>
          </form>
        </div>



        
        <!-- <div class="col-md-12  text-center" id="menu-flters">
          <ul>
            <li><a class="filter active" data-filter=".menu-restaurant">Show All</a></li>
            <li><a class="filter" data-filter=".breakfast">Breakfast</a></li>
            <li><a class="filter" data-filter=".lunch">Lunch</a></li>
            <li><a class="filter" data-filter=".dinner">Dinner</a></li>
          </ul>
        </div> -->

        

      </div>

      @foreach($data as $dt)
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="card-group">
            <div class="card">
              <img class="card-img-top" src="{{url('storage/gambar/'.$dt->gambar)}}" width="50px" alt="Card image cap">
              <div class="card-body">
                <small>{{$dt->kode_masakan}}</small>  
                <h5 class="card-title">{{$dt->nama_masakan}}</h5>
                <p class="card-text">Rp.{{number_format($dt->harga,0,',','.')}},</p>
              </div>
              <div class="card-footer">
                <a href="#" class="btn btn-success">Add to Cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </section>