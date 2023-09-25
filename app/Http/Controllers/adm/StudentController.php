<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\installment;
use App\Models\plan;
use App\Models\refund_request;
use App\Models\cancelled_class;
use App\Models\attendance;
use App\Models\credit_class;

class StudentController extends Controller
{
    public function approval_pending()
    {
        $students=student::where('approval','Pending')->get();
        return view('registration.ApprovalPending',['students'=>$students]);
    }

        public function student_view($sid)
    {
        $stdid=decrypt($sid);
        $student=student::where('id',$stdid)->first();
        return view('registration.ViewStudent',['student'=>$student]);
    }

     public function reject_student(Request $req)
    {
        student::where('id',$req->sid)->update([

            'approval'=>'Rejected',
            'status'=>'Rejected',
            'rejected_at'=> date('Y-m-d'),
            'rejection_reason'=>$req->reason

        ]);
        $data['success']="success";
        echo json_encode($data);
    }

     public function approve_student(Request $req)
    {
        student::where('id',$req->body)->update([

            'approval'=>'Approved',

        ]);
        $data['success']="success";
        echo json_encode($data);
    }

    public function rejected_apps()
    {
        $students=student::where('approval','Rejected')->get();
        return view('registration.RejectedApps',['students'=>$students]);
    }

        public function active_students()
    {
        $dt=date('Y-m-d');
        $students=student::where('approval','Approved')->where('valid_to','>=',$dt)->get();
        return view('student.ActiveStudents',['students'=>$students]);
    }

      public function expired_students()
    {
        $dt=date('Y-m-d');
        $students=student::where('approval','Approved')->where('valid_to','<',$dt)->get();
        return view('student.ExpiredStudents',['students'=>$students]);
    }

        public function student_details($sid)
    {
        $stdid=decrypt($sid);
        $student=student::where('id',$stdid)->first();
        $installments=installment::where('student_id',$stdid)->orderBy('last_date','DESC')->get();
        $attendance=attendance::where('student_id',$stdid)->where('status','!=','Cancelled')->orderBy('at_date','DESC')->get();
        $credit_class=credit_class::where('student_id',$stdid)->where('type','Credit')->latest()->get();
        $paid_class=credit_class::where('student_id',$stdid)->where('type','Paid')->latest()->get();
        $cancelled_class=cancelled_class::where('student_id',$stdid)->orderBy('class_date','DESC')->get();
        return view('student.StudentDetails',['student'=>$student,'installments'=>$installments,'attendance'=>$attendance,'cancelled_class'=>$cancelled_class,'credit_class'=>$credit_class,'paid_class'=>$paid_class]);
    }

    public function payment_approval(Request $req)
    {

        $insta=installment::where('id',$req->payid)->first();
        $student=student::select('plan','valid_from')->where('id',$insta->student_id)->first();

        if($req->status=='Approved')
        {
            installment::where('id',$req->payid)->update([

            'payment_status'=>'Paid',    
            'approval_status'=>$req->status,
            'payment_date'=>$req->paydt,


        ]);
            
            $cnt=installment::where('student_id',$insta->student_id)->where('plan_id',$student->plan)->count();
            $plan=plan::where('id',$student->plan)->first();
            $month=$cnt;

            if($cnt<$plan->month)
            {
                $lastDate = date('Y-m-5', strtotime($student->valid_from . " +$month months"));
                installment::create([


                            'student_id'=>$insta->student_id,
                            'plan_id'=>$student->plan,
                            'payment_status'=>'Pending',
                            'approval_status'=>'Pending',
                            'payment_method'=>'Pending',
                            'fee'=>$plan->monthly_fee,
                            'last_date'=>$lastDate,


                        ]); 
            }

                       


            $data['success']="success";
        }
        else
        {
            installment::where('id',$req->payid)->update([

             'payment_status'=>$req->status,    
            'approval_status'=>$req->status,
            'payment_date'=>$req->paydt,


        ]);
            $data['success']="success";
        }
        
        
        echo json_encode($data);
    }


     public function approve_payment(Request $req)
    {

        $student=student::select('plan','valid_from','payment_type')->where('id',$req->payid)->first();

        if($student->payment_type=='Full')
        {
            student::where('id',$req->payid)->update([

            'payment_approval'=>'Approved',    
            
            ]); 

            $data['success']="success";
        }
        else
        {

        
        if($req->status=='Approved')
        {
            installment::where('id',$req->payid)->update([

            'payment_status'=>'Paid',    
            'approval_status'=>$req->status,
            'payment_date'=>$req->paydt,


        ]);
            student::where('id',$req->payid)->update([

            'payment_approval'=>'Approved',    
            
        ]);
            //$insta=installment::where('id',$req->payid)->first();
            
            $cnt=installment::where('student_id',$req->payid)->where('plan_id',$student->plan)->count();
            $plan=plan::where('id',$student->plan)->first();
            $month=$cnt;

            if($cnt<$plan->month)
            {
                $lastDate = date('Y-m-5', strtotime($student->valid_from . " +$month months"));
                installment::create([


                            'student_id'=>$req->payid,
                            'plan_id'=>$student->plan,
                            'payment_status'=>'Pending',
                            'approval_status'=>'Pending',
                            'payment_method'=>'Pending',
                            'fee'=>$plan->monthly_fee,
                            'last_date'=>$lastDate,


                        ]); 
            }

                       


            $data['success']="success";
        }
        else
        {
            installment::where('id',$req->payid)->update([

             'payment_status'=>$req->status,    
            'approval_status'=>$req->status,
            'payment_date'=>$req->paydt,


        ]);
            $data['success']="success";
        }

    }
        
        
        echo json_encode($data);
    }

    public function payment_method(Request $req)
    {
        installment::where('id',$req->payid)->update([

            'payment_method'=>$req->status,

        ]);
        $data['success']="success";
        echo json_encode($data);
    }


         public function block_student(Request $req)
    {
        student::where('id',$req->sid)->update([

            'approval'=>'Blocked',
            'status'=>'Active',
            'rejected_at'=> date('Y-m-d'),
            'rejection_reason'=>$req->reason

        ]);
        $data['success']="success";
        echo json_encode($data);
    }

    public function deactivate_student(Request $req)
    {
        student::where('id',$req->sid)->update([

            'approval'=>'Deactivated',
            'status'=>'Deactivated',
            'rejected_at'=> date('Y-m-d'),
            'rejection_reason'=>$req->reason1

        ]);
        $data['success']="success";
        echo json_encode($data);
    }

        public function activate_student(Request $req)
    {
        student::where('id',$req->body)->update([

            'approval'=>'Approved',
            'status'=>'Active',

        ]);
        $data['success']="success";
        echo json_encode($data);
    }

        public function complete_student(Request $req)
    {
        student::where('id',$req->body)->update([

            'approval'=>'Completed',
            'status'=>'Completed',


        ]);
        $data['success']="success";
        echo json_encode($data);
    }



        public function blocked_students()
    {
        $students=student::where('approval','Blocked')->get();
        return view('student.BlockedStudents',['students'=>$students]);
    }

     public function deactivated_students()
    {
        $students=student::where('approval','Deactivated')->get();
        return view('student.DeactivatedStudents',['students'=>$students]);
    }

        public function completed_students()
    {
        $students=student::where('approval','Completed')->get();
        return view('student.CompletedStudents',['students'=>$students]);
    }

        public function installment_pending()
    {
        $installments=installment::where('approval_status','Pending')->orderBy('last_date','ASC')->get();
        return view('student.InstallmentPending',['installments'=>$installments]);
    }

     public function pending_refund_requests()
    {
        $refund_requests=refund_request::where('status','Pending')->latest()->get();
        return view('student.PendingRefundRequests',['refund_requests'=>$refund_requests]);
    }

    public function repay_deposit(Request $req)
    {
        student::where('id',$req->sid)->update([

            'deposit_repay_status'=>'Paid',
            'deposit_repay_amount'=>$req->repayamt,
            'deposit_repay_date'=>$req->repaydt,
            'deposit_repay_mote'=>$req->repaynote,


        ]);

        refund_request::where('student_id',$req->sid)->where('status','Pending')->update([

            'status'=>'Paid',

        ]);
        $data['success']="success";
        echo json_encode($data);
    }

         public function paid_refund_requests()
    {
        $refund_requests=refund_request::where('status','Paid')->groupBy('student_id')->latest()->get();
        return view('student.PaidRefundRequests',['refund_requests'=>$refund_requests]);
    }

        public function reject_deporeq(Request $req)
    {
        

        refund_request::where('id',$req->rid)->update([

            'status'=>'Rejected',
            'rejection_reason'=>$req->reason,

        ]);
        $data['success']="success";
        echo json_encode($data);
    }

    public function rejected_refund_requests()
    {
        $refund_requests=refund_request::where('status','Rejected')->latest()->get();
        return view('student.RejctedRefundRequests',['refund_requests'=>$refund_requests]);
    }


    ////////////////////////


    public function cancelled_classes()
    {
        $cancelled_classes=cancelled_class::where('rebooked_status','Pending')->latest()->get();
        return view('student.CancelledClasses',['cancelled_classes'=>$cancelled_classes]);
    }

    public function add_class(Request $req)
    {
        
        credit_class::create([

            'student_id'=>$req->sid,
            'details'=>$req->crednote,
            'type'=>'Credit',
            'status'=>'Pending',
            'slote'=>0,
            'attendance'=>'Absent',
            'added_by'=>'Admin',
            'updated_by'=>'Admin',

        ]);

        $data['success']="success";
        echo json_encode($data);
    }

        public function delete_class(Request $req)
    {
        
        credit_class::where('id',$req->body)->delete();
        $data['success']="success";
        echo json_encode($data);
    }

      public function credit_classes()
    {
        $dt=date('Y-m-d');
        $credit_classes=credit_class::where('type','Credit')->where('status','Booked')->where('booked_date','>=',$dt)->orderBy('booked_date','ASC')->get();
        return view('student.CreditClasses',['credit_classes'=>$credit_classes]);
    }

      public function paid_classes()
    {
        $dt=date('Y-m-d');
        $paid_classes=credit_class::where('type','Paid')->where('status','Booked')->where('booked_date','>=',$dt)->orderBy('booked_date','ASC')->get();
        return view('student.PaidClasses',['paid_classes'=>$paid_classes]);
    }




}
