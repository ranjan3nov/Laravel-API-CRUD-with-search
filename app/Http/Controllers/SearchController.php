<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sclass;

class SearchController extends Controller
{
    function index($name)
    {
        return Sclass::where('class_name', "like", "%" . $name . "%")->get();
    }
}
