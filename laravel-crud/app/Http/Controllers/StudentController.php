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

    public function editStudent($id){
        $data=Student::where('id','=',$id)->first();
        return view('edit-student',compact('data'));
    }

    public function updateStudent(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
        ]);
        
        $id=$request->id;
        $name=$request->name;
        $email=$request->email;
        $phone=$request->phone;
        $address=$request->address;

        Student::where('id','=',$id)->update([
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address
        ]);
        
        return redirect()->back()->with('success','Student Updated Successfully');
    }

    public function deleteStudent($id){
        Student::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Student Deleted Successfully');
    }
}
