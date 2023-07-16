@extends('Waiter.app')

@section('content')



<div class="row">
    <div class="col">
        <h2 class= "text-center mb-5"> Pilih Meja</h2>
        <div class="row">
            @foreach( $tables as $table )
                <div class="col-6 col-sm-3">
                    @if( $table->statusMeja == 0 )
                        <a class="btn btn-secondary btn-lg btn-block p-5 mt-2 mb-2" href="/WaitersTable/{{$table->tableId}}" > {{ $table->tableName }}</a>
                    @else
                        <a class="btn btn-danger btn-lg btn-block p-5 mt-2 mb-2"  href="/WaitersTable/{{$table->tableId}}" > {{ $table->tableName }}</a>
                    @endif
                </div>
                <div class="w-1-0"></div>
            @endforeach
        </div>
    </div>
    <div class="col-6 col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Pesanan yang Siap</h5>
                <!-- Pesanan yang siap diantar ke meje Customer -->
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Meja</th>
                            <th scope="col">Nama Pesanan</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $tables as $table )
                            @foreach($table->order as $order)
                                @if($order->stat == 0)
                                    @foreach($order->menuorder as $menu)
                                        @if($menu->stat == 2)
                                        <tr>
                                            <td>
                                                {{ $table->tableName }}
                                            </td>
                                            <td>
                                                {{ $menu->qty}}x  {{ $menu->menu->name}}
                                            </td>
                                            <td>
                                                <a href="/WaitersOrder/{{$order->orderID}}/{{$menu->ID}}" class="btn btn-primary">Selesai</a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                </table>
            </div>
        </div>

        <a type='button' class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#staticBackdrop">Tambah Meja</a>
        <a href="/Waiters/delete" type='button' class="btn btn-success btn-lg btn-block">Delete Meja</a>
        <div class="modal fade modal-dialog modal-dialog-centered modal-xl" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        Tambah Meja
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="POST" action="{{ route('addTable') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="tableName" class="text-info">Nama Meja</label><br>
                                <input type="text" name="name" id="tableName" class="form-control">
                            </div>

                            <button class="btn btn-info btn-block" type="submit">Tambah</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

