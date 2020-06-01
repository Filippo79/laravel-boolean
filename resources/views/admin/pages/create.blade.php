@php
$categories =  [
          [
            'id' => 1,
            'name' =>'Rossa'
          ],
          [
            'id' => 2,
            'name' =>'Verde'
          ],
          [
            'id' => 3,
            'name' =>'Gialla'
          ]
];
@endphp

@extends('layouts.app')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.pages.index')}}">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
          </ol>
        </nav>
        <div class="row">
            <div class="col-12">
                <h2>Inserisci una nuova pagina</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="" action="" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control"type="text" id="title" placeholder="Inserisci il titolo" value="">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="summary">Summary</label>
                        <input class="form-control"type="text" id="summary" placeholder="Inserisci il sommario" value="">
                    </div>
                    @error('summary')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="custom-select" id="category" name="category">
                            @foreach ($categories as $category)
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="body">Body</label>
                        <input class="form-control"type="text" id="body" placeholder="Inserisci il testo" value="">
                    </div>
                    @error('body')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </form>
            </div>
        </div>
    </div>



@endsection
