<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_GetData extends Model
{
    use HasFactory;

    protected $table = 'courses'; // Nama tabel
    protected $primaryKey = 'CourseId'; // Primary key
    public $timestamps = true; // Menggunakan kolom timestamp
    protected $fillable = ['Title', 'Link', 'Publisher', 'Description']; // Kolom yang bisa diisi
}
