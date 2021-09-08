<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $employee = $this->employee;
        return [
            "id" => $employee->emp_no - 1000,
            "emp_no" => $employee->emp_no,
            "first_name" => $employee->first_name,
            "last_name" => $employee->last_name,
            "birth_date" => $employee->birth_date,
            "gender" => $employee->gender,
            "hire_date" => $employee->hire_date,
        ];
        //
    }
}
