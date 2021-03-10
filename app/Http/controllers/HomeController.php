<?php

namespace  App\Http\Controllers;


use System\Database\DBBuilder\DBBuilder;

class HomeController extends Controller {

    public function index(){
        //$table=new DBBuilder();

    }

    public function create(){
        echo "create method is here";
    }

    public function store(){
        echo "store method is here";
    }

    public function edit($id){
        echo "edit method is here";
    }

    public function update($id){
        echo "update method is here";
    }

    public function destroy($id){
        echo "destroy method is here";
    }
}
