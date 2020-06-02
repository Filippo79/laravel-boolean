@php
    $pages =[
        [
            'id' => 1,
            'title' => 'no so cosa scrivere',
            'category' => 1,
            'tags' => [
                1,
                3,
                5
            ],
        ],
        [
            'id' => 2,
            'title' => 'Ma dove vuoi andare ',
            'category' => 2,
            'tags' => [
                2,
                4,
                6
            ],
        ],
        [
            'id' => 3,
            'title' => 'Sei messo male fantasia zero',
            'category' => 3,
            'tags' => [
                7,
                8,
                9,
                10,
                11
            ],
        ],

    ];
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pages</li>
          </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h2>Pages</h2>
                    </div>
                    <div class="offset-3 col-3">
                        <a href="{{route('admin.pages.create')}}">Crea una Pagina</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr class="">
                            <th>Id</th>
                            <th>Title</th>
                            <th>Cayegory</th>
                            <th>Tags</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        @foreach ($pages as $page)
                            <tr class="table-info">
                                <td>{{$page['id']}}</td>
                                <td>{{$page['title']}}</td>
                                <td>{{$page['category']}}</td>
                                <td>
                                    @foreach ($page['tags'] as $tag)
                                        {{$tag}}
                                        @if (!$loop->last)
                                           ,
                                       @endif
                                    @endforeach
                                </td>
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
