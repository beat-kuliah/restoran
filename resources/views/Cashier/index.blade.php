@extends('Cashier/app')

@section('content')

<div class="book-wrapper">
    <div class="container">
        <div class="heading">
            <center>
                <h2>Pilih Meja</h2>
            </center>
        </div>
        <br>
        @foreach ($tables as $table)
            <a class="btn btn-primary btn-lg btn-block" href="/Cashier/{{ $table->tableId }}" method="GET">{{ $table->tableName}}</a>
        @endforeach
@endsection
