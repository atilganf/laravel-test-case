<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentManager extends Model
{
    use HasFactory;

    protected $table = "dept_manager";
    protected $primary_key = "emp_no";
    public $timestamps = false;

    protected $fillable = [
        "emp_no",
        "dept_no",
        "from_date",
        "to_date"
    ];

    public function department(){
        return $this->belongsTo(Department::class, "dept_no", "dept_no");
    }
}
