<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elearn_GetData extends Model
{
    use HasFactory;

    protected $table = 'elearn'; // Nama tabel
    protected $primaryKey = 'ElearnId'; // Primary key
    public $timestamps = true; // Menggunakan kolom timestamp
    protected $fillable = ['Title', 'Link', 'Publisher', 'Description','ended_at']; // Kolom yang bisa diisi
}
