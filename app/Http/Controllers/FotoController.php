<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use App\Models\LikeFoto;
use App\Models\KomentarFoto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foto = Foto::join('albums', 'albums.AlbumID', '=', 'fotos.AlbumID')->get();
        return view('admin.dataFoto.dataFoto', compact('foto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = Album::all(); // Ambil semua data album dari model Album
        //dd($album);
        return view('admin.dataFoto.tambahFoto', ['album' => $album]); // Kirim data album ke tampilan dengan nama variabel $albums
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = new Foto;
        $foto->JudulFoto = $request->JudulFoto;
        $foto->DeskripsiFoto = $request->DeskripsiFoto;
        $foto->TanggalUnggah = $request->TanggalUnggah;
        // $foto->LokasiFile = $request->LokasiFile;
        $foto->AlbumID = $request->AlbumID;
        $foto['UserID'] = auth()->user()->UserID;

        if ($request->hasFile('LokasiFile')) {
            $files = $request->file('LokasiFile');
            $files_name = $foto['UserID'] . '-' . now()->timestamp . '.' . $files->getClientOriginalExtension();
            // dd($files_name);

            //$files->storeAs('public/images/photo-images ', $files_name);
            $files->storeAs('public/images/photo-images', $files_name);
            //dd($files);
            // $foto->LokasiFile = $files_name;
        }


        $foto->LokasiFile = $files_name;
        $foto->save();
        return redirect('/dataFoto')->with('success', 'Foto Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foto = Foto::join('users', 'users.UserID', '=', 'fotos.UserID')->first();

        $komentar = KomentarFoto::where('FotoID', $id)->get();     
        return view('admin.dataFoto.detail', compact('foto', 'komentar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foto = Foto::where('FotoID',$id)->first();
        $albums = Album::all(); // ambil semua album
        return view('admin.dataFoto.editFoto', compact('foto', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'JudulFoto' => 'required', // Menyatakan bahwa JudulFoto diperlukan
            'DeskripsiFoto' => 'required',
            'TanggalUnggah' => 'required',
            'AlbumID' => 'required',
        ]);

        $foto = Foto::find($id);
        $foto->JudulFoto = $request->JudulFoto;
        $foto->DeskripsiFoto = $request->DeskripsiFoto;
        $foto->TanggalUnggah = $request->TanggalUnggah;
        $foto->AlbumID = $request->AlbumID;
        $foto->save();
    
        return redirect('/dataFoto')->with('success', 'Foto berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto= Foto::where('FotoID','=',$id)->first();
        $foto->delete();
        // dd($foto);

        return redirect('/dataFoto')->with('success', 'Foto Berhasil Dihapus!');
    }

    public function toggleLike(Foto $foto)
    {
        $userId = auth()->id();

        // Cek apakah pengguna sudah "like" pada foto ini
        $isLiked = $foto->likedByUser($userId);

        if ($isLiked) {
            // Jika pengguna sudah "like", hapus entri "like" dari tabel likefotoss
            LikeFoto::where('FotoID', $foto->FotoID)->where('UserID', $userId)->delete();
        } else {
            // Jika pengguna belum "like", tambahkan entri "like" ke tabel likefotoss
            LikeFoto::create([
                'FotoID' => $foto->FotoID,
                'UserID' => $userId,
                'TanggalLike' => now(),
            ]);
        }

        return back();
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'IsiKomentar' => 'required',
        ]);

        KomentarFoto::create([
            'FotoID' => $id,
            'UserID' => auth()->id(),
            'IsiKomentar' => $request->IsiKomentar,
            'TanggalKomentar' => now(),
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function komentar(Foto $foto)
    {
        // $foto = Foto::findOrFail($id);
        // $komentars = KomentarFoto::where('FotoID', $id)->get();
        // return view('gallery.show', compact('foto', 'komentars'));
        $komentar = KomentarFoto::where('FotoID', $foto->FotoID)->get();
        return view('gallery', compact('foto', 'komentar'));
    }

}
