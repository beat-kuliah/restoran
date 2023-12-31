<?php

namespace App\Domain\Sales\Dao;

use App\Domain\Sales\Entity\Menu;
use App\Domain\Sales\Entity\Table;
use App\Domain\Sales\Entity\Order;
use App\Domain\Sales\Entity\MenuOrder;
use App\Domain\Sales\Entity\Payment;

/**
 * Author : Ferani
 *
 *
 */

class SalesDao
{
    public function findAllTable() {
        return Table::all();
    }

    public function getLastTable(){
        return Table::latest()->first();
    }

    public function findTableById($id) {
        return Table::find($id);
    }

    public function findAllOrder() {
        return Order::all();
    }

    public function findOrderById($id) {
        return Order::find($id);
    }

    public function updateMenuOrder(MenuOrder $menu) {
        return $menu->save();
    }

    public function findAllMenu() {
        return Menu::all();
    }

    public function findMenuById($id) {
        return Menu::find($id);
    }

    public function findAllPayment() {
        return Payment::all();
    }

    public function saveTable(Table $table) {
        return $table->save();
    }

    public function saveOrder(Order $order) {
        return $order->save();
    }

    public function saveMenuOrder(MenuOrder $menuorder) {
        return $menuorder->save();
    }

    public function savePayment(Payment $payment) {
        return $payment->save();
    }

    public function findMenuOrderById($id) {
        return MenuOrder::find($id);
    }

    public function findPaymentById($id)
    {
        return Payment::find($id);
    }

    public function deleteMenuOrder(MenuOrder $menuorder) {
        return $menuorder->delete();
    }

    public function deleteTable(Table $table){
        return $table->delete();
    }

}
