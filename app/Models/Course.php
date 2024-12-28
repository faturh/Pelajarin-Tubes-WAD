<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses'; // Nama tabel
    protected $primaryKey = 'CourseId'; // Primary key (jika bukan id)

    protected $fillable = [
        'Title',
        'Link',
        'Publisher',
        'Description',
        'Image',
    ];

    public $timestamps = false; // Disable Laravel's default timestamps
}
