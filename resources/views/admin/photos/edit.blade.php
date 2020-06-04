
@php
    $photo = [
        'id' => 1,
        'title' => 'cucciolo 1',
        'description' => 'Bel cucciolo' ,
        'path' => 'images/rg0Bp4szJ3sRdcjqDC9yT12wIQjQ1Rlo8Z0PPXsi.jpeg'

    ];
@endphp



@extends('layouts.app')



@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item " aria-current="page"><a href="{{route('admin.photos.index')}}">Photos</a></li>
            <li class="breadcrumb-item " aria-current="page">Edit</li>
          </ol>
        </nav>
        <div class="row">
            <div class="col-7">
                <form class="" action="{{route('admin.photos.update', $photo['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title"  placeholder="Inserisci un titolo" name="title" value="{{$photo['title']}}">
                        {{-- <input class="form-control" type="text" id="title" placeholder="Inserisci il titolo" name="title" value="{{$photo['title']}}"> --}}
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description"  placeholder="Inserisci una descrizione"  name="description"value="{{$photo['description']}}">
                    </div>
                    @error('description')
                      <div class="form-text">Errore</div>
                    @enderror
                    <div class="form-group">
                        <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="path">
                              <label class="custom-file-label" for="customFile"> Carica una nuova foto</label>
                        </div>
                    </div>
                    @error('path')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                         <input class="btn btn-primary" type="submit" value="Salva">
                   </div>
                </form>
            </div>
            <div class="col-4">
                <img src="{{asset('storage/' . $photo['path'])}}" alt="">
            </div>
        </div>
    </div>
@endsection
