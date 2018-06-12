<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){

        $arr =  array(
            1 => array(
                'id' => 1,
                "parent" => null,
                "text" => 'первый'
            ),
            2 => array(
                'id' => 2,
                "parent" => null,
                "text" => 'второй'
            ),
            3 => array(
                'id' => 3,
                "parent" => 1,
                "text" => 'третий'
            ),
            4 => array(
                'id' => 4,
                "parent" => 3,
                "text" => 'четвертый'
            ),

        );
        $test = $this->build_tree($arr);

      return view('test', [
        'test' => $test,
      ]);
    }

    function build_tree($data){

        $tree = array();
        foreach($data as $id => &$row){
            if(empty($row['parent'])){
                $tree[$id] = &$row;
            }
            else{
                $data[$row['parent']]['childs'][$id] = &$row;
            }
            // dump($row['parent']);
            //dump($id);
            //echo 'data'; dump($data);
            //echo 'tree'; dump($tree);
        }
        return $tree;

    }
}
