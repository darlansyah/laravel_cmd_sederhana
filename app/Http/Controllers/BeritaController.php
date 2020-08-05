<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Berita;
use Illuminate\Support\Str;
class BeritaController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    public function index(){ // index
      $berita = Berita::orderBy('id','desc')->get();
      return view('berita/index',['berita' => $berita]);
    }
    //
    public function show($id){ // show
      $berita = Berita::find($id);
      return view('berita/show',['b' => $berita]);
    }

    public function create(){ // creata
          return view('berita/create');
    }

    public function store(Request $request){ // store

      $this->validate($request,[
        'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=2000,min_height=1333 ',
        'title' => 'required||min:1',
        'excerpt' => 'required||min:1',
        'content' => 'required||min:1',
        'status' => 'required||min:1',
        'author' => 'required||min:1',
      ]);

      // image
        $thumbnail = $request->file('thumbnail');
        $thumbnailName = time()."_".$thumbnail->getClientOriginalName(); // nama file
        // $nama_file = time()."_".$file->getClientOriginalName()
        // $thumbnailExtension = $thumbnail->getClientOriginalExtension(); // ekstensi => jpg
        // $thumbnailRealPath = $thumbnail->getRealPath(); // tempat upload file
        // $thumbnailMimeType = $thumbnail->getMimeType(); // tempat upload file
        $folder = 'image';
        $avatar = $thumbnail->move($folder,$thumbnailName);
        // gettClientOriginalName()
        if (!$avatar) {
          return dd('Gambar gagal di upload');
        }
        // end image
      $slug = Str::slug($request->title);

      $berita = Berita::create(array_merge($request->all(),
      [
        'thumbnail' => $thumbnailName,
        'slug' => $slug
      ]
    ));

      if (!$berita) {
        return dd('gagal tambah data');
      }

      $berita = Berita::orderBy('created_at','desc')->first();
      $request->session()->put('id',$berita->id);

      return redirect()->route('berita')->with('simpan','Data Berhasil Ditambahkan');
    }

    public function edit($id){ // edit
        $berita = Berita::find($id);
        // return dd($berita);
        return view('berita/edit',['b' => $berita]);
    }

    public function update(Request $request,$id){ //update

      $this->validate($request,[
        'title' => 'required||min:1',
        'excerpt' => 'required||min:1',
        'content' => 'required||min:1',
        'status' => 'required||min:1',
        'author' => 'required||min:1',
      ]);

      $thumbnailOld = $request->thumbnail1;
      $thumbnail = $request->file('thumbnail');

      if (!empty($thumbnail)) {
          // image
          $this->validate($request,[
              'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
          ]);
          $thumbnailName = time()."_".$thumbnail->getClientOriginalName(); // nama file
          $folder = 'image';
          $avatar = $thumbnail->move($folder,$thumbnailName);
            if (!$avatar) {
              return dd('Gambar gagal di upload');
            }
            // end image
          if (file_exists(public_path("image/".$thumbnailOld)))
           {
               unlink(public_path("image/".$thumbnailOld));
           }
      }
      else{
        $thumbnailName = $thumbnailOld;
      }
      $slug = Str::slug($request->title);

      $berita = Berita::find($id)->update(array_merge($request->all(),
      [
        'thumbnail' => $thumbnailName,
        'slug' => $slug
      ]
    ));

      if (!$berita) {
        return dd('gagal update data');
      }

      $berita = Berita::orderBy('updated_at','desc')->first();
      $request->session()->put('id',$berita->id);

      return redirect()->route('berita')->with('update','Data Berhasil Diupdate');
    }

    public function delete($id){ // delete

      $berita = Berita::find($id);

      if (file_exists(public_path("image/".$berita->thumbnail)))
       {
           unlink(public_path("image/".$berita->thumbnail));
       }
      $berita = Berita::destroy($id);

      return redirect()->route('berita')->with('delete','Data Berhasil Dihapus');
    }
}
