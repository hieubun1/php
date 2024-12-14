<?php

namespace App\Http\Controllers;
class ExampleController extends Controller
{
public function show()
{
return 'Hello from the Controller';
}

public function store()
{
    return view('giaodien');
}

public function index(){
    return view('home');
}


}