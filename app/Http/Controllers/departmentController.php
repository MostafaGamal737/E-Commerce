<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\department;
class departmentController extends Controller
{
    public function AddDepartment(Request $data)
    {
      $dep=new department();
      $dep->name=$data->name;
    }
}
