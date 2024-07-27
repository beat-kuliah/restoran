<?php

namespace App\Factory;

use App\Domain\HR\Service\EmployeeService;
use App\Domain\HR\Entity\Employee;


class EmployeeFactory
{

    private $id;
    private $name;
    private $birthdate;
    private $employeeType;
    private $password;

    public function __construct($id, $name, $birthdate, $employeeType, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birthdate = $birthdate;
        $this->employeeType = $employeeType;
        $this->password = $password;
    }

    public function getEmployeeID()
    {
        return $this->id;
    }

    public function getEmployeeName()
    {
        return $this->name;
    }

    public function getEMployeeBirthDate()
    {
        return $this->birthdate;
    }

    public function getEmployeeType()
    {
        return $this->employeeType;
    }

    public function getEmployeeData()
    {
        $data = new Employee();
        $data->employeeID = $this->id;
        $data->name = $this->name;
        $data->birthdate = $this->birthdate;
        $data->employeeType = $this->employeeType;

        if ($this->employeeType == 3) {
            $data->password = bcrypt($this->password);
        }
        return $data;
    }
}
class HRFactory
{
    public static function create($id, $name, $birthdate, $employeeType, $password)
    {
        $svc = new EmployeeService();
        $emp = new EmployeeFactory($id, $name, $birthdate, $employeeType, $password);
        return $svc->createNew($emp->getEmployeeData());
    }
}
