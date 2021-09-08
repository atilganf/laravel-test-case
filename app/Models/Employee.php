<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $table = "employees";
    protected $primary_key = "emp_no";
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        "birth_date",
        "first_name",
        "last_name",
        "gender",
        "hire_date"
    ];

    protected $guarded = [
        "emp_no"
    ];

    public function getAuthPassword()
    {
        return bcrypt($this->last_name);
    }

    public function dept_manager()
    {
        return $this->hasOne(DepartmentManager::class, "emp_no", "emp_no");
    }
    public function dept_emp()
    {
        return $this->hasOne(DepartmentEmployee::class, "emp_no", "emp_no");
    }
    public function salaries()
    {
        return $this->hasMany(Salary::class, "emp_no", "emp_no");
    }
    public function department()
    {
        return $this->dept_manager()->first()->department();
    }
    public function department_employees()
    {
        return $this->department()->first()->department_employees()->where("to_date", "<=", date("Y-m-d"));
    }
}
