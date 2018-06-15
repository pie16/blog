<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $faker = \Faker\Factory::create('ru_RU');
        for ($i=0; $i < 10; $i++) {
            echo $faker->realText(), "\n";
        }

    }
}
