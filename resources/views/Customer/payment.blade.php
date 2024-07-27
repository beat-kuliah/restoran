@extends('footer')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="/js/app.js"></script>
    <link href="/css/app.css" rel="stylesheet">
    <title>Pembayaran</title>
</head>
<style>
    .bill {
        padding: 20px 0 20px 0;
    }

    .underline {
        margin-top: -30px;
        width: 700px;
        border-bottom: 2px solid rgb(255, 255, 255);
    }
</style>

<body>
    <center>
        <div class="bg-dark bill">
            <p style="text-align: center;color: white;font-size: 30px;">Total Harga</p>
            <p style="font-size: 70px;color: white;text-align: center;">Rp
                {{ number_format($order->amount, 0, '.', '.') }}</p>
            <div class="underline"></div>
        </div>

        @if ($method == 2)
            <p style="font-size: 50px;color: rgb(0, 0, 0);text-align: center;">Gopay</h2><br>
                <a href="/Barcode/{{ $order->orderID }}"> {!! QrCode::size(250)->generate('/barcode/{{ $order->orderID }}') !!} </a>
            <p>Silahkan lakukan pembayaran melalui aplikasi<br>Go-Pay anda</p>
        @else
            <div style="margin: 75px 0 75px 0">
                <p style="font-size: 50px;color: rgb(0, 0, 0);text-align: center;">Cash</h2><br>
                <p>Silahkan untuk melakukan pembayaran<br>ke kasir sejumlah Rp
                    {{ number_format($order->amount, 0, '.', '.') }}</p>
            </div>
        @endif
        <div class="container">
            <a href="/Bill/{{ $order->orderID }}/{{ $order->amount }}/cart"><button type="button"
                    class="btn btn-secondary btn-lg btn-block">Batalkan</button></a>
        </div>
    </center>
</body>
<script>
    setTimeout(function() {
        location.reload();
    }, 2000);
</script>

</html>
