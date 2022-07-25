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

    public function addStudent(){
        return view('add-student');
    }

    public function saveStudent(Request $request){
            //dd($request->all());

            $request->validate([
                'name'=>'required',
                'email'=>'required|email',
                'phone'=>'required',
                'address'=>'required',
            ]);

            $name=$request->name;
            $email=$request->email;
            $phone=$request->phone;
            $address=$request->address;

            $Stu=new Student();

            $Stu->name=$name;
            $Stu->email=$email;
            $Stu->phone=$phone;
            $Stu->address=$address;
            
            $Stu->save();

            return redirect()->back()->with('success','Student Added Successfully');
    }

}
