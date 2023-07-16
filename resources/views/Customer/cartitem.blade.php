@include('Customer.navigation')
@extends('footer')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Menu - Semua Menu</title>
    <script type="text/javascript" src="/js/app.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    thead,
    tbody {
        margin: 0 -30px 0 -30px;
    }
</style>

<body>
<div class="container">

    @if(count($order->menuorder) == 0)
    <center>
        <h1 style="height: 70%">Tidak Ada Pesanan</h1>
    </center>
    @else
    <center>
        <table class="table-borderless" width="1000px" style="margin : 20px 0 30px 0;height: 70%">
            <thead>
                <tr class="bg-success" style="text-align: center">
                    <th scope="col">Hapus</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0 ?>
                @foreach($order->menuorder as $menu)
                <tr>
                    <td><a href="/Cart/{{$order->orderID}}/{{$query}}/{{$menu->ID}}">Hapus</a></td>
                    <th scope="row">{{$menu->menu->name}}</th>
                    <td>Rp {{number_format($menu->menu->price, 0, ".", ".")}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$menu->qty}}
                            </button>
                            <div class="dropdown-menu">
                                @for($i = 0;$i < 20;$i++) <a class="dropdown-item" href="/Cart/{{$order->orderID}}/{{$query}}/{{$menu->ID}}/{{$i}}">{{$i}}</a>
                                    @endfor
                            </div>
                        </div>
                    </td>
                    <td>
                        Rp {{number_format($menu->qty * $menu->menu->price, 0, ".", ".")}}
                    </td>
                    <?php $total += $menu->qty * $menu->menu->price ?>
                </tr>
                @endforeach
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td>Subtotal</td>
                    <td>Rp {{number_format($total, 0, ".", ".")}}</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td>PPn x 10%</td>
                    <td>Rp.{{number_format(0.1 * $total, 0, ".", ".")}}</td>
                    <?php $total +=0.1 * $total ?>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td>Total Bayar</td>
                    <td>Rp {{number_format($total, 0, ".", ".")}}</td>
                </tr>
            </tbody>
        </table>
    </center>


    <center><button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Order</button><br></center>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah pesanan Anda Sudah benar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Belum</button>
                    <a href="/Bill/{{$order->orderID}}/{{$total}}/cart"><button type="button" class="btn btn-primary">Sudah</button></a>
                </div>
            </div>
        </div>
    </div>
    @if($urlback != 'bill')
        <center><a href="{{$urlback}}"><button type="button" class="btn btn-secondary btn-lg btn-block">Kembali</button></a></center>
    @else
        <center><button type="button" class="btn btn-secondary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Kembali</button><br></center>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah pesanan Anda Sudah benar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Belum</button>
                    <a href="/Bill/{{$order->orderID}}/cart/{{$total}}"><button type="button" class="btn btn-primary">Sudah</button></a>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
    </div>
</body>

</html>
