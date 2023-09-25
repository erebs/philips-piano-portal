<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\teacher;

class AdmTeacherController extends Controller
{
    public function add_teacher()
    {
        return view('adm_teacher.AddTeacher');
    }

         public function teacher_add(Request $req)
    {

        if(teacher::where('mobile',$req->mobile)->exists())
        {
          $data['err']="error";  
        }
        else
        {
       
            teacher::create([
                'name'=>$req->name,
                'mobile'=>$req->mobile,
                'mail_id'=>$req->mail,
                'details'=>$req->det,
                'password'=>bcrypt($req->pass),
                'status'=>'Active',
                'profile_image'=>'',


            ]) ;
            $data['success']="success";
        }    
        
        echo json_encode($data);
       
    }

    public function active_teachers()
    {
        $teachers=teacher::where('status','Active')->latest()->get();

        return view('adm_teacher.ActiveTeachers',['teachers'=>$teachers]);
    }

    public function edit_teacher($tid)
    {
        $id=decrypt($tid);

        $teacher=teacher::where('id',$id)->first();

        return view('adm_teacher.EditTeacher',['teacher'=>$teacher]);
    }

        public function teacher_edit(Request $req)
    {
        if(teacher::where('mobile',$req->mobile)->where('id','!=',$req->tid)->exists())
        {
          $data['err']="error";  
        }
        else
        {
            teacher::where('id',$req->tid)->update([
                'name'=>$req->name,
                'mobile'=>$req->mobile,
                'mail_id'=>$req->mail,
                'details'=>$req->det,


            ]) ;
            $data['success']="success";
        }

        echo json_encode($data);
       
    }

     public function teacher_psw_update(Request $req)
    {
       
            teacher::where('id',$req->tid)->update([
                'password'=>bcrypt($req->pass),

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

     public function block_teacher(Request $req)
    {
       
            teacher::where('id',$req->tid)->update([
                'status'=>'Blocked',
                'block_reason'=>$req->reason,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

            public function blocked_teachers()
    {
        $teachers=teacher::where('status','Blocked')->latest()->get();

        return view('adm_teacher.BlockedTeachers',['teachers'=>$teachers]);
    }

         public function activate_teacher(Request $req)
    {
       
            teacher::where('id',$req->body)->update([
                'status'=>'Active',
                'block_reason'=>'',

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }
}
