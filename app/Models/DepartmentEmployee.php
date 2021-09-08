<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentEmployee extends Model
{
    use HasFactory;

    protected $table = "dept_emp";
    protected $primary_key = "emp_no";
    public $timestamps = false;

    protected $fillable = [
        "emp_no",
        "dept_no",
        "from_date",
        "to_date"
    ];

    public function employee(){
        return $this->hasOne(Employee::class, "emp_no", "emp_no");
    }
}
