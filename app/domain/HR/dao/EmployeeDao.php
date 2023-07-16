<?php

namespace App\domain\HR\dao;

/**
 *Hak cipta dari source code ini dimiliki oleh :
 *Cynthia
 *Ferani
 *Yoel
 *Fransiskus
 */

use App\domain\HR\entity\Employee;
use App\domain\HR\entity\EmployeeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Author : Fransiskus
 *          Irfin
 *          Ferani
 */
class EmployeeDao
{

    public function findAll()
    {
        return Employee::all();
    }

    public function findById($id)
    {
        return Employee::find($id);
    }

    public function saveEmployee(Employee $emp)
    {
        $emp->save();
    }

    public function delete(Employee $emp)
    {
        $emp->delete();
    }

    public function findEmployeeType()
    {
        return EmployeeType::all();
    }

    public function login(Request $req){
        return Auth::attempt(['employeeID' =>  $req->id ,'password' => $req->password, 'employeeType' => 3]);
    }

}
