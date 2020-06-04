<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request) {
        // dd($request->all());
        $data = $request->all();
        // per caricare la foto
        $path = Storage::disk('public')->put('images', $data['path']);
        // dd($path);

    }
    public function update(Request $request, $id) {
        $photo = [
            'id' => 1,
            'title' => 'cucciolo 1',
            'description' => 'Bel cucciolo' ,
            'path' => 'images/rg0Bp4szJ3sRdcjqDC9yT12wIQjQ1Rlo8Z0PPXsi.jpeg'

        ];

        $data = $request->all();
        // dd($data);
        if (isset($data)) {
            // per cancellarea la foto
            Storage::disk('public')->delete($photo['path']);

        }


    }
}
