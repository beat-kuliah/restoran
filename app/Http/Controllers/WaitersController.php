<?php

namespace App\Http\Controllers;

use App\Domain\Sales\Service\SalesService;
use Illuminate\Http\Request;

class WaitersController extends Controller{

    private $svc;

    public function __construct()
    {
        $this->svc = new SalesService();
    }

    public function view(){
        $tables = $this->svc->getAllTable();

        return view('Waiter/waiter',[
            'tables' => $tables,
        ]);

    }

    public function changeTable($id){
        $temp = $this->svc->saveIfTable($id);
        $tables = $this->svc->getAllTable();

        return redirect('/Waiters');

    }

    public function changeOrder($orderId,$menuId){
        $tables = $this->svc->getAllTable();
        $menu = $this->svc->saveMenuById($menuId);
        $menu = $this->svc->checkIfOrderId($orderId);

        return view('Waiter/waiter',[
            'tables' => $tables,
        ]);

    }

    public function addTable(Request $req){
        $tables = $this->svc->getAllTable();
        $this->svc->addNewTable($req);

        return redirect('/Waiters');
    }

    public function delTable(){

        $this->svc->delTable();

        return redirect('/Waiters');
    }
}

?>
