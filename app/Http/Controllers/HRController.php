<?php

namespace App\Http\Controllers;

use App\Domain\HR\Service\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Factory\HRFactory;

class HRController extends Controller
{

    private $svc;

    public function __construct()
    {
        $this->svc = new EmployeeService();
    }
    public function getEmployee(){

        $employees = $this->svc->getAll();

        return view('HR/hr',[
            'employees' => $employees,
        ]);
    }

    public function getEmployeeById($id){

        $employeetype = $this->svc->getEmployeeType();
        $employee = $this->svc->getById($id);

        return view('HR/edit',[
            'employee' => $employee,
            'employeetype' => $employeetype,
        ]);
    }

    public function deleteEmployee($id){

        $employee = $this->svc->deleteData($id);

        return redirect('/HR')->with(['info' => 'Data berhasil di delete']);;
    }


    public function getEmployeeType(){

        $employeetype = $this->svc->getEmployeeType();

        return view('HR/create',[
            'employeetype' => $employeetype,
        ]);
    }


    public function updateEmployee(Request $req, $id){

        $update = $this->svc->updateData($req, $id);

        return redirect('/HR')->with(['info' => 'Data berhasil diubah']);;
    }

    public function postEmployee(Request $req){
        $validator = Validator::make($req->all(), [
            'id' => 'required|max:10',
            'name'=> 'required|max:255',
            'birthdate' => 'required|max:10',
            'employeetype' => 'required|max:1',

        ]);

        if ($validator->fails() || $req->employeetype == 3 && $req->password=="" || $req->employeetype != 3 && $req->password !="" ){
            return redirect('/createEmployee/create')->with(['error' => 'Input Error']);
        }


        // $create = $this->svc->createNew($req);
        $Fact = new HRFactory();
        $valid = $Fact->create($req->id, $req->name, $req->birthdate, $req->employeetype, $req->password, $req);

        return redirect('/HR')->with(['info' => 'Data berhasil ditambahkan']);;


    }

}
