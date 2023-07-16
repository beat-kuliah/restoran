@extends('Chef.app')
@section('content')
<div class="book-wrapper">
    <div class="container">
        <div class="heading">
            <center>
                <h2>Daftar Pesanan</h2>
            </center>
        </div>
        <br>

        @foreach ($tables as $table)
            @if ($table->statusMeja == 1)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> {{$table->tableName}} </h5>
                    <div class="table-responsive">
                        <table class="table">
                            @foreach ($table->order as $order)
                                @foreach ($order->menuorder as $menuorder)
                                    @if ($menuorder->stat == 1)
                                        <tr>
                                            <td>
                                                <a href="/ChefRecipe/{{$menuorder->menu->menuId}}"> {{$menuorder->menu->name }} </a>
                                            </td>
                                            <td>
                                                {{$menuorder->qty }}
                                            </td>
                                            <td>
                                                <a href="/Chef/{{ $menuorder->ID }}" class="btn btn-primary"> Selesai </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
@endsection
<script>
    setTimeout(function() {
        location.reload();
    }, 3000);
</script>
