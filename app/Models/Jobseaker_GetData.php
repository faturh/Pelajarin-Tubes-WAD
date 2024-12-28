<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobseaker_GetData extends Model
{
    use HasFactory;

    protected $table = 'jobseaker'; // Nama tabel
    protected $primaryKey = 'JobseakerId'; // Primary key
    public $timestamps = true; // Menggunakan kolom timestamp
    protected $fillable = ['Title', 'Link', 'Publisher', 'Description','ended_at']; // Kolom yang bisa diisi
}
