@extends('layouts.app')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item " aria-current="page"><a href="{{route('admin.photos.index')}}">Photos</a></li>
            <li class="breadcrumb-item " aria-current="page">Create</li>
          </ol>
        </nav>
        <div class="row">
            <div class="col-12">
                <form class="" action="{{route('admin.photos.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control"type="text" id="title" placeholder="Inserisci il titolo" name="title"value="">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description"  placeholder="Inserisci una descrizione"  name="description">
                    </div>
                    @error('description')
                      <div class="form-text">Errore</div>
                    @enderror
                    <div class="form-group">
                        <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="path">
                              <label class="custom-file-label" for="customFile"> Browse</label>
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
        </div>
    </div>

@endsection
