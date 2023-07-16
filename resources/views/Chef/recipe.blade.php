@extends('app')
@section('content')

<div class="row">
    <div class="container">
        <div class="heading">
            <center>
                <h2> Komposisi: {{ $menu->name }}</h2>
            </center>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Komposisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recipes as $recipe)
                <tr>
                    <td>
                        <img src="https://spoonacular.com/cdn/ingredients_100x100/{{$recipe['image']}}" alt="">
                    </td>
                    <td>
                        {{$recipe['original']}} {{$recipe['name']}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card mb-5">
        <div class="card-body">
            <h5 class="card-title">Instruksi</h5>
            {{$instruction}}
        </div>
    </div>

</div>
@endsection
