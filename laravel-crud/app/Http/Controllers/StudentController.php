<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    public function index(){
       $data = Student::get();
       //return $data;
       return view('student-list',compact('data'));
    }    


}
