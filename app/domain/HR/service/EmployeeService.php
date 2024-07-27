<?php

namespace App\domain\HR\service;

use App\Domain\HR\Entity\Employee;
use App\Domain\HR\Dao\EmployeeDao;
use Illuminate\Http\Request;

class EmployeeService
{

    private $dao;

    public function __construct()
    {
        $this->dao = new EmployeeDao();
    }

    // public function createNew(Request $req)
    // {
    //     $data = new Employee();
    //     $data->employeeID=$req->id;
    //     $data->name=$req->name;
    //     $data->birthdate=$req->birthdate;
    //     $data->employeeType=$req->employeetype;

    //     if($req->password){
    //         $data->password=bcrypt($req->password);
    //     }

    //     $this->dao->saveEmployee($data);
    // }

    public function createNew(Employee $emp)
    {
        $this->dao->saveEmployee($emp);
    }

    public function getAll()
    {
        return $this->dao->findAll();
    }

    public function getById($id)
    {
        return $this->dao->findById($id);
    }

    public function updateData(Request $req, $id)
    {
        $data = Employee::findOrFail($id);
        $data->name = $req->name;
        $data->employeetype = $req->employeetype;
        $data->password = bcrypt($req->password);

        return $this->dao->saveEmployee($data);
    }

    public function deleteData($id)
    {
        $data = Employee::findOrFail($id);
        return $this->dao->delete($data);
    }

    public function getEmployeeType()
    {
        return $this->dao->findEmployeeType();
    }

    public function cashierLogin(Request $req)
    {
        return $this->dao->login($req);
    }
}
