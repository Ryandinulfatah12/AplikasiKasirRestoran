<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Print Invoice</title>
  <link rel="stylesheet" href="{{url('polished/css/polished.min.css')}}">
  <link rel="stylesheet" href="{{url('polished/css/open-iconic-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('polished/css/report.css')}}">

  <link rel="icon" href="{{url('polished/assets/fav.png')}}">

</head>

<body onload="window.print();">


  <div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="oi oi-print"></i> Print</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="{{url('polished/assets/ngapak.png')}}" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h1 class="invoice-id">Ngapak Resto</h1>
                        <strong><small class="text-muted">Developed By Ryan Dinul Fatah</small></strong>
                        <div>Ngapak Resto 2020 &copy; Allright Reserved.</div>
                        <div>(123) 456-789</div>
                        <div>officialngapakresto@gmail.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        @foreach($data as $dt)
                        <h2 class="to">{{$dt->fullname}}</h2>
                        @endforeach
                    </div>
                    <div class="col invoice-details">
                      @foreach($data as $dt)
                        <h1 class="invoice-id">{{$dt->kode_transaksi}}</h1>
                        <div class="date">Date of Invoice: {{date('d F Y - H:i',strtotime($dt->created_at))}}</div>
                        @endforeach
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th><b>KODE DELIVERY</b></th>
                            <th><b>NOMOR MEJA</b></th>
                            <th><b>DIPESAN PADA</b></th>
                            <th class="text-left"><b>DETAIL PESANAN</b></th>
                            <th class="text-right"><b>TOTAL</b></th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)
                        <tr>
                            <td>{{$order->kode_order}}</td>
                            <td>{{$order->no_meja}}</td>
                            <td>{{date('d F Y - H:i',strtotime($order->created_at))}}</td>
                            <td class="text-left"> 
                                <table class="table shadow-0">
                                  <thead class="border-0">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Subtotal</th>
                                  </tr>
                                </thead>
                                      <tbody>
                                        @foreach($order->cart->items as $item)
                                        <tr>
                                          <th scope="row">{{$loop->iteration}}</th>
                                          <td>{{$item['item']['nama_masakan']}}</td>
                                          <td>Rp.{{number_format($item['item']['harga']),0,',','.'}}</td>
                                          <td>{{$item['qty']}}</td>
                                          <td>Rp.{{number_format($item['harga']),0,',','.'}}</td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                  </table>
                            </td>
                            <td class="text-right"><strong>Rp.{{number_format($order->subtotal),0,',','.'}}</strong></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                            <td colspan="2"></td>
                            <td colspan="2">PPN 10%</td>
                            <td><strong class="text-warning-darker">Rp.{{number_format(7000),0,',','.'}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Total Tagihan</td>
                            @foreach($orders as $order)
                            <td><strong class="text-danger">Rp.{{number_format($order->subtotal),0,',','.'}}</strong></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Uang Masuk</td>
                            @foreach($data as $dt)
                            <td><strong class="text-success-darker">Rp.{{number_format($dt->total_bayar),0,',','.'}}</strong></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Kembalian</td>
                            @foreach($data as $dt)
                            <td>Rp.{{number_format($dt->kembalian),0,',','.'}}</td>
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">Grandtotal/Tagihan Sudah Termasuk PPN 10%.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.

            </footer>
        </div>
      </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div>
          
        </div>
        
      </div>

  @stack('modal')
</body>
<script type="text/javascript">
 $('#printInvoice').click(function(){
          Popup($('#invoice')[0].outerHTML);
          function Popup(data) 
          {
              window.print();
              return true;
          }
      });
</script>

</html>