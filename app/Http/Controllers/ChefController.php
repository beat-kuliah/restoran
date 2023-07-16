<?php

namespace App\Http\Controllers;

use App\Domain\Sales\Service\SalesService;
use App\Domain\Sales\Entity\Menu;
use App\Domain\Sales\Entity\MenuOrder;

class ChefController extends Controller{

    private $svc;

    public function __construct()
    {
        $this->svc = new SalesService();
    }

    public function view(){

        $tables = $this->svc->getAllTable();

        return view('Chef/index',[
            'tables'=>$tables,

        ]);
    }

    public function updateMenu($id){

        $tables = $this->svc->getAllTable();
        $order = $this->svc->updateMenuOrderStatus($id);

        return view('Chef/index',[
            'tables'=>$tables,
        ]);
    }

    public function showRecipe($id){

        $menu = $this->svc->getMenuById($id);

        $api = 'e5f12dc920b24dfd9f3dee909c56ece0';
        $url = 'https://api.spoonacular.com/recipes/'.$id.'/information?apiKey='.$api;
        $json = file_get_contents($url);
        $array = json_decode($json, true);
        return view('Chef/recipe',[
            // 'recipes'=>$url3,
            'menu' => $menu,
            'recipes' => $array['extendedIngredients'],
            'instruction' => $array['instructions'],
        ]);
    }


}

?>
