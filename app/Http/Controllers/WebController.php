<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WebController extends Controller
{
    public function index(){
      $berita = DB::table('berita')->where('status','=','public')->orderBy('id','desc')->paginate(8);
      $beritaLimit = DB::table('berita')->where('status','=','public')->orderBy('id','desc')->limit(3)->get();
      return view('website/index',['berita' => $berita,'limit' => $beritaLimit]);

    }
    public function show($slug){

      $berita = DB::table('berita')->where('slug','=',$slug)->first();

      // $text = 'hello <p> kak navilla masih bisa pesan satu kambing kurban, saya mau pesan satu, bisakan';
      //
      // $kalimat = explode("</p>",$berita->content);
      // $jumlahkalimat = count($kalimat);
      // return dd($jumlahkalimat);
      // // if ($jumlahkalimat > 4) {
      // //   for ($i=0; $i < 4; $i++) {
      // //
      // //   }
      // //
      // // }
      // // else{
      // //   return dd('sedikit');
      // // }
      //
      // // for ($i=0; $i < $jumlahkalimat; $i++) {
      // //   // code...
      // // }
      //
      // $a = (strlen($kalimat[0]));
      //
      // if ($kalimat > 6) {
      //   return dd('banyak');
      // }else{
      //   return dd('sedikit');
      // }
      //
      // return dd($kalimat);

      return view('website/show',['b' => $berita]);
    }
    public function hal($slug,$hal){
      return dd('method hal');
    }
}
