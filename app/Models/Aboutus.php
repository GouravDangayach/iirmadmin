<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model{
    protected $table = "aboutus";
    use HasFactory;

    protected $fillable = [
        'name','email','phone','address','description','tagline','photo','cv'
    ];
}
