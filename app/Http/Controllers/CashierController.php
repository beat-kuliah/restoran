<?php

namespace App\Http\Controllers;

use App\Domain\HR\Service\EmployeeService;
use App\Domain\Sales\Entity\Menuorder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Domain\Sales\Service\SalesService;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller{

    private $svc;

    public function __construct()
    {
        $this->svc = new SalesService();
    }
    public function view(){
        return view('Cashier/login');
    }

    public function payment(){
        return view('Cashier/detail_bayar');
    }

    public function cashierHome(){
        $tables = $this->svc->getAllTable();

        return view('Cashier/index',[
            'tables' => $tables,
        ]);
    }

    public function cashierTable($id){

        $table = $this->svc->getTableById($id);
        $payments = $this->svc->getAllPayment();
        $orderTable = null;

        foreach ($payments as $p){
            $orderTable = $p->order->where('tableId','=',$id)->get();

        }

        if ($table->statusMeja == 1){
            return view('Cashier/detail_bayar',[
                'table' => $table,
                'orders' => $orderTable,
            ]);
        }else{
            return redirect('/CashierHome');
        }


    }


    public function login(Request $req){
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'password' => 'required',
        ]);

        $this->svc = new EmployeeService();
        $result = $this->svc->cashierLogin($req);

        if($result == true){
            return redirect('/CashierHome');
        }else{
            return redirect('/Cashier');
        }

    }

    public function cashierPayment($tableId,$cashierId , $paymentId){

        $temp = $this->svc->updateMenuCashierStatus($cashierId, $paymentId);

        return redirect()->route('cashierTable',[$tableId]);
    }

    public function history(){

        $orders = $this->svc->getOrder();

        return view('Cashier/history',[
            'orders' => $orders,
        ]);
    }

    public function orderDetail($id){

        $order = $this->svc->getOrderById($id);

        return view('Cashier/orderDetail',[
            'order' => $order,
        ]);
    }

    public function logout(){
        Auth::logout();

        return redirect('Cashier');
    }

    public function notCashier(){

        return view('Cashier/not_cashier');
    }


}

?>
