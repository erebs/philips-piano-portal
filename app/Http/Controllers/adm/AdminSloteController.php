<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slote;
use App\Models\branch;
use App\Models\student;
use App\Models\attendance;
use App\Models\cancelled_class;
use App\Models\credit_class;

class AdminSloteController extends Controller
{
    public function online_slotes()
    {
        $slote=slote::where('class_mode','Online')->orderBy('slote','ASC')->get();
        return view('slotes.OnlineSlotes',['slote'=>$slote]);
    }
        public function onlineslote_add(Request $req)
    {
       
       // if(plan::where('name',$req->name)->exists())
       // {
       //  $data['err']="error";
       // }
       // else
       // {
                slote::create([
                'class_mode'=>'Online',
                'slote'=>$req->slote,
                'day'=>$req->day,
                'branch'=>0,
                'slote_limit'=>$req->limit,
                'status'=>'Active',

            ]) ;
            $data['success']="success";
       // } 

        
        echo json_encode($data);
       
    }

     public function onlineslote_edit(Request $req)
    {
       
       // if(plan::where('name',$req->name)->exists())
       // {
       //  $data['err']="error";
       // }
       // else
       // {
                slote::where('id',$req->buid)->update([

                'slote'=>$req->slote1,
                'slote_limit'=>$req->limit1,
                'status'=>$req->status1,

            ]) ;
            $data['success']="success";
       // } 

        
        echo json_encode($data);
       
    }

     public function delete_slote(Request $req)
    {
       
       // if(plan::where('name',$req->name)->exists())
       // {
       //  $data['err']="error";
       // }
       // else
       // {
                slote::where('id',$req->body)->delete();
            $data['success']="success";
       // } 

        
        echo json_encode($data);
       
    }

    ////////////////////

    public function offline_branches()
    {
        $branch=branch::get();
        return view('slotes.Branches',['branch'=>$branch]);
    }

      public function branch_add(Request $req)
    {
       
       if(branch::where('branch',$req->branch)->exists())
       {
        $data['err']="error";
       }
       else
       {
                branch::create([
                'branch'=>$req->branch,
                'status'=>'Active',

            ]) ;
            $data['success']="success";
        } 

        
        echo json_encode($data);
       
    }

    public function branch_edit(Request $req)
    {
       
       if(branch::where('branch',$req->branch)->where('id','!=',$req->buid)->exists())
       {
        $data['err']="error";
       }
       else
       {
                branch::where('id',$req->buid)->update([
                'branch'=>$req->bname,
                'status'=>$req->status,

            ]) ;
            $data['success']="success";
        } 

        
        echo json_encode($data);
       
    }


    ////////////////////


    public function offline_slotes($bid)
    {
        $branch=decrypt($bid);
        $slote=slote::where('branch',$branch)->orderBy('slote','ASC')->get();
        return view('slotes.OfflineSlotes',['slote'=>$slote,'branch'=>$branch]);
    }
        public function offlineslote_add(Request $req)
    {
       
       // if(plan::where('name',$req->name)->exists())
       // {
       //  $data['err']="error";
       // }
       // else
       // {
                slote::create([
                'class_mode'=>'Offline',
                'slote'=>$req->slote,
                'branch'=>$req->branch,
                'day'=>$req->day,
                'slote_limit'=>$req->limit,
                'status'=>'Active',

            ]) ;
            $data['success']="success";
       // } 

        
        echo json_encode($data);
       
    }

     public function offlineslote_edit(Request $req)
    {
       
       // if(plan::where('name',$req->name)->exists())
       // {
       //  $data['err']="error";
       // }
       // else
       // {
                slote::where('id',$req->buid)->update([

                'slote'=>$req->slote1,
                'slote_limit'=>$req->limit1,
                'status'=>$req->status1,

            ]) ;
            $data['success']="success";
       // } 

        
        echo json_encode($data);
       
    }

     public function delete_offlineslote(Request $req)
    {
       
       // if(plan::where('name',$req->name)->exists())
       // {
       //  $data['err']="error";
       // }
       // else
       // {
                slote::where('id',$req->body)->delete();
            $data['success']="success";
       // } 

        
        echo json_encode($data);
       
    }

    ////////////////

     public function student_slotes($sid)
    {
        $slote=decrypt($sid);
        $students=student::where('slote',$slote)->where('status','Active')->get();
        return view('slotes.Students',['slote'=>$slote,'students'=>$students]);
    }

    ///////////////////////////////////


            public function slote_curdates($ssid,$day)
    {
        $firstDay = date('Y-m-01');
        $lastDay = date('Y-m-t');
        $dayInMonth = [];
        $sid=decrypt($ssid);
        $slote=slote::where('id',$sid)->first();

        for ($day = strtotime($day, strtotime($firstDay)); $day <= strtotime($lastDay); $day = strtotime('+1 week', $day)) {
            $dayInMonth[] = date('Y-m-d', $day);
        }

        return view('slotes.attendance.CurrentMonthDates',['dayInMonth'=>$dayInMonth,'sid'=>$sid,'slote'=>$slote]);
    }

    public function online_students($sid,$dt)
    {
        $sloteid = decrypt($sid);
        $slote=slote::where('id',$sloteid)->first();
        $students=student::where('slote',$sloteid)->where('status','Active')->get();
        $credit_class=credit_class::where('slote',$sloteid)->where('booked_date',$dt)->get();
        if(attendance::where('at_date',$dt)->where('slote',$sloteid)->exists())
        {
            $std=attendance::where('at_date',$dt)->where('slote',$sloteid)->get();
            return view('slotes.attendance.StudentAttendance',['std'=>$std,'dt'=>$dt,'slote'=>$slote,'credit_class'=>$credit_class]);  
        }
        else
        {
            foreach($students as $s)
            {
                $canstatus=cancelled_class::where('class_date',$dt)->where('student_id',$s->id)->where('slote',$s->slote)->count();
                if($canstatus==0)
                {
                    $at='Present';
                }
                else
                {
                    $at='Cancelled';
                }
                attendance::create([

                    'at_date'=>$dt,
                    'student_id'=>$s->id,
                    'slote'=>$sloteid,
                    'status'=>$at,
                    'added_by'=>'Admin',
                    'updated_by'=>'Admin',

                ]);
             }

            $std=attendance::where('at_date',$dt)->where('slote',$sloteid)->get();
            return view('slotes.attendance.StudentAttendance',['std'=>$std,'dt'=>$dt,'slote'=>$slote,'credit_class'=>$credit_class]); 
           
        }
        
        

    }

    public function attendance_status(Request $req)
    {
        
                attendance::where('id',$req->aid)->update([

                    'status'=>$req->status,
                    'updated_by'=>'Admin',

                ]);

                $data['success']="success";
                echo json_encode($data);
             
       

    }

    public function add_note($aid)
    {
        $atid = decrypt($aid);
        $note=attendance::where('id',$atid)->first();
        return view('slotes.attendance.AddNote',['note'=>$note]);
     }  

     public function note_add(Request $req)
    {
        
                attendance::where('id',$req->aid)->update([

                    'note'=>$req->desc,
                    'updated_by'=>'Admin',

                ]);

                $data['success']="success";
                echo json_encode($data);
             
       

    } 


        public function attendance_extrastatus(Request $req)
    {
        
                credit_class::where('id',$req->aid)->update([

                    'attendance'=>$req->status,
                    'updated_by'=>'Admin',

                ]);

                $data['success']="success";
                echo json_encode($data);
             
       

    }

    public function add_extranote($aid)
    {
        $atid = decrypt($aid);
        $note=credit_class::where('id',$atid)->first();
        return view('slotes.attendance.AddExtraNote',['note'=>$note]);
     }  

     public function extranote_add(Request $req)
    {
        
                credit_class::where('id',$req->aid)->update([

                    'note'=>$req->desc,
                    'updated_by'=>'Admin',

                ]);

                $data['success']="success";
                echo json_encode($data);
             
       

    } 


       public function slote_alldates($ssid)
    {

        $sid=decrypt($ssid);
        $slote=slote::where('id',$sid)->first();

        $attendance=attendance::where('slote',$sid)->groupBy('at_date')->orderBy('at_date','DESC')->get();
        return view('slotes.attendance.AllDates',['attendance'=>$attendance,'sid'=>$sid,'slote'=>$slote]);
    }


    public function offlineslote_curdates($ssid,$day)
    {
        $firstDay = date('Y-m-01');
        $lastDay = date('Y-m-d');
        $dayInMonth = [];
        $sid=decrypt($ssid);
        $slote=slote::where('id',$sid)->first();

        for ($day = strtotime($day, strtotime($firstDay)); $day <= strtotime($lastDay); $day = strtotime('+1 week', $day)) {
            $dayInMonth[] = date('Y-m-d', $day);
        }

        return view('slotes.attendance.OfflineCurrentMonthDates',['dayInMonth'=>$dayInMonth,'sid'=>$sid,'slote'=>$slote]);
    }

    public function offlineslote_alldates($ssid)
    {

        $sid=decrypt($ssid);
        $slote=slote::where('id',$sid)->first();

        $attendance=attendance::where('slote',$sid)->groupBy('at_date')->orderBy('at_date','DESC')->get();
        return view('slotes.attendance.OfflineAllDates',['attendance'=>$attendance,'sid'=>$sid,'slote'=>$slote]);
    }
}
