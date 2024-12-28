<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elearn extends Model
{
    use HasFactory;

    protected $table = 'elearn'; // Nama tabel di database
    protected $primaryKey = 'ElearnId'; // Primary key

    protected $fillable = [
        'Title',
        'Link',
        'Publisher',
        'Description',
        'Image',
        'ended_at',
    ];
    

    // Timestamps diaktifkan untuk mendukung created_at dan updated_at
    public $timestamps = true;
}
