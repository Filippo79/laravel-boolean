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

$tags = [
          [
            'id' => 1,
            'name' => 'Tag 1'
          ],
          [
            'id' => 2,
            'name' => 'Tag 2'
          ],
          [
            'id' => 3,
            'name' => 'Tag 3'
          ],
          [
            'id' => 4,
            'name' => 'Tag 4'
          ],
          [
            'id' => 5,
            'name' => 'Tag 5'
          ],
          [
            'id' => 6,
            'name' => 'Tag 6'
          ],
          [
            'id' => 7,
            'name' => 'Tag 7'
          ]

];

$photos = [
    [
    'id' => 1,
    'title' => 'Foto 1',
    'path' => 'https://picsum.photos/200/300?grayscale'
    ],
    [
    'id' => 2,
    'title' => 'Foto 2',
    'path' => 'https://picsum.photos/200/300?random=1'
    ],
    [
    'id' => 3,
    'title' => 'Foto 3',
    'path' => 'https://picsum.photos/200/300?random=2'
    ]

];

$page = [
    'id' => 1,
    'title'=> 'Bello veramente ',
    'summary' => 'Non so cosa scrivere',
    'body' => 'Questo non lo scritto io',
    'category_id' => 2,
    'tags' => [
        2,
        6
    ],
    'photos' => [
        1,
        3
    ]
];

// $oldtags = [
//     1,
//     2
// ];
$oldtags = null;

$message = '';
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
                <h2>Modifica una  pagina</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="" action="" method="put">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control"type="text" id="title" placeholder="Inserisci il titolo" value="{{$page['title']}}">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="summary">Summary</label>
                        <input class="form-control"type="text" id="summary" placeholder="Inserisci il sommario" value="{{$page['summary']}}">
                    </div>
                    @error('summary')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="custom-select" id="category" name="category">
                            @foreach ($categories as $category)
                                @if ($category['id'] == $page['category_id'])
                                        @php
                                            $message = 'selected';
                                        @endphp
                                    <option value="{{$category['id']}}"{{$message}}>{{$category['name']}}</option>
                                @else
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>

                                @endif
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="bopdy" rows="8">{{$page['body']}}</textarea>
                    </div>
                    @error('body')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <fieldset>
                            <legend>Tags</legend>
                            @foreach ($tags as $tag)
                                <div class="form-check form-check-inline">
                                    {{----------------------------------------------------------------------CON OLD------se il $tag id è presente all'interno dell'array $oldtags   ? selezionalo  : altrimenti No  ''--}}
                                    @if (is_array($oldtags))
                                        {{---------------------------------------------------------------------------------------1° CONDIZIONE-----|                                                    |--}}
                                        <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{$tag['id']}}" value="{{$tag['id']}}" {{(in_array($tag['id'], $oldtags)) ? 'checked' : ''}}>
                                    @else
                                        {{----------------------------------------------------------------------CON OLD------se il $tag id è presente all'interno dell'array $oldtags   ? selezionalo  : altrimenti No  ''--}}
                                        {{----------------------------------------------------------------------------------------2° CONDIZIONE----|                                                         |--}}
                                        <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{$tag['id']}}" value="{{$tag['id']}}" {{(in_array($tag['id'], $page['tags'])) ? 'checked' : ''}}>
                                    @endif

                                {{---------------------------------------------------------------SENZA OLD-------se il $tag id è presente all'interno dell'array $page['tags']  ? selezionalo  : altrimenti No  ''--}}
                                {{-------------------------------------------------------------------------------------------------------------------|                                                                 |--}}
                                    {{-- <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{$tag['id']}}" value="{{$tag['id']}}" {{(in_array($tag['id'], $page['tags']) == true) ? 'checked' : ''}}> --}}
                                    <label class="form-check-label" for="tag{{$tag['id']}}">{{$tag['name']}}</label>
                                </div>
                            @endforeach
                            @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <fieldset>
                            <legend>Photos</legend>
                            @foreach ($photos as $photo)
                                <div class="form-check form-check-inline">
                                    {{---------------------------------------------------------------------------------------------se la $photo id è presente all'interno dell'array $page['photos']---? selezionalo  : altrimenti No  ''--}}
                                    {{------------------------------------------------------------------------------------------------------------------|                                                                     |--}}
                                    <input class="form-check-input" type="checkbox" name="photos[]" id="photo{{$photo['id']}}" value="{{$photo['id']}}" {{(in_array($photo['id'], $page['photos']) == true) ? 'checked' : ''}}>
                                    <label class="form-check-label" for="photo{{$photo['id']}}">{{$photo['title']}}<img src="{{$photo['path']}}" alt=""></label>
                                </div>
                            @endforeach
                            @error('photos')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="salva">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
