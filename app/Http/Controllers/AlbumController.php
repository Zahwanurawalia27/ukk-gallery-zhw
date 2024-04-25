<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $album = Album::all();
        return view('admin.dataAlbum.dataAlbum', compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dataAlbum.tambahAlbum'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Silahkan isi kolom ini!'
        ];

        $validatedData = $request->validate([
            'NamaAlbum' => 'required|max:255',
            'Deskripsi' => 'required|max:255',
            'TanggalDibuat' => 'required'
        ],$message
        );

            $validatedData['UserID'] = auth()->user()->UserID;

            Album::create($validatedData);

            return redirect('/dataAlbum')->with('succes', 'Album Baru Telah Berhasil Ditambahkan');

            $album = new Album;
            $album->NamaAlbum = $validatedData['NamaAlbum'];
            $album->Deskripsi = $validatedData['Deskripsi'];
            $album->TanggalDibuat = $validatedData['TanggalDibuat'];
            $album->save();
    }

    public function category(Album $album)
    {
        $album = Album::all();
        return view('index', compact('album'))->with('album', $album);
        //return view('gallery', compact('album'))->with('album', $album);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('admin.dataAlbum.editAlbum', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'NamaAlbum' => 'required', 
            'Deskripsi' => 'required',
            'TanggalDibuat' => 'required',
        ]);

        $album->NamaAlbum = $request->NamaAlbum;
        $album->Deskripsi = $request->Deskripsi;
        $album->TanggalDibuat = $request->TanggalDibuat;
        $album->save();
    
        return redirect('/dataAlbum')->with('success', 'Album berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return redirect('/dataAlbum')->with('success', 'Album Berhasil Dihapus!');
    }
}
