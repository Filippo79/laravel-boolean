@php
    $photos = [
        [
            'id' => 1,
            'title' => 'Titolo foto 1'
        ],
        [
            'id' => 2,
            'title' => 'Titolo foto 2'
        ],
        [
            'id' => 3,
            'title' => 'Titolo foto 3'
        ],
        [
            'id' => 4,
            'title' => 'Titolo foto 4'
        ],


    ];
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Photos</li>
          </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h2>Photos</h2>
                    </div>
                    <div class="offset-3 col-3">
                        <a href="{{route('admin.photos.create')}}">Carica una foto</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr class="">
                            <th>Id</th>
                            <th>Title</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        @foreach ($photos as $photo)
                            <tr class="table-info">
                                <td>{{$photo['id']}}</td>
                                <td>{{$photo['title']}}</td>
                                <td><a class="btn btn-primary"href="#">Visualizza</a></td>
                                <td><a class="btn btn-info" href="#">Modifica</a></td>
                                <td>
                                    <form action="">
                                        <input class="btn btn-danger" type="submit" value="Scancella">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
