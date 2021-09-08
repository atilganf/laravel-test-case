<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $table = "salaries";
    protected $primary_key = "emp_no";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        "emp_no",
        "salary",
        "from_date",
        "to_date"
    ];
}
