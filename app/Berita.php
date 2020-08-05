<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
     protected $table = 'berita';

      protected $fillable = [
        'thumbnail', // gambar
        'title',
        'slug',
        'excerpt',
        'content',
        'status',
        'author',
        'created_at',
        'updated_at'
      ];

}
