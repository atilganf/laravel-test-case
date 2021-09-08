<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = "departments";
    protected $primary_key = "dept_no";
    public $incrementing = "false";
    protected $key_type = "char";
    public $timestamps = false;

    protected $fillable = [
        "dept_no",
        "dept_name"
    ];

    public function department_managers()
    {
        return $this->hasMany(DepartmentManager::class, "dept_no", "dept_no");
    }
    public function department_employees()
    {
        return $this->hasMany(DepartmentEmployee::class, "dept_no", "dept_no");
    }
}
