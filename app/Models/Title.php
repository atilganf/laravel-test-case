<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $table = "titles";
    protected $primary_key = "emp_no";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        "emp_no",
        "title",
        "from_date",
        "to_date"
    ];

}
