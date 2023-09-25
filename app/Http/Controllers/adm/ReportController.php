<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\installment;
use App\Models\plan;
use App\Models\refund_request;
use App\Models\cancelled_class;
use App\Models\attendance;
use App\Models\credit_class;

class ReportController extends Controller
{
    public function deposit_report()
    {
        $start_date=date('Y-m-01');
        $end_date=date('Y-m-t');

        $students=student::where('deposit_date','>=',$start_date)->where('deposit_date','<=',$end_date)->where('approval','!=','Pending')->latest()->get();
        $tot=student::where('deposit_date','>=',$start_date)->where('deposit_date','<=',$end_date)->where('approval','!=','Pending')->sum('deposit_amount');
        return view('reports.DepositReport',['students'=>$students,'start_date'=>$start_date,'end_date'=>$end_date,'tot'=>$tot]);
    }


    public function get_deposit(Request $req)
    {
        $req->validate([
            'fromdt'=>'required',
            'todt'=>'required',

           
            ],
            [
              'fromdt.required' => 'This field is required',
              'todt.required' => 'This field is required',
            ]


          );
        $start_date=$req->fromdt;
        $end_date=$req->todt;

        $students=student::where('deposit_date','>=',$start_date)->where('deposit_date','<=',$end_date)->where('approval','!=','Pending')->latest()->get();
          $tot=student::where('deposit_date','>=',$start_date)->where('deposit_date','<=',$end_date)->where('approval','!=','Pending')->sum('deposit_amount');
        return view('reports.DepositReport',['students'=>$students,'start_date'=>$start_date,'end_date'=>$end_date,'tot'=>$tot]);
    }


    ///////////////////

        public function single_fee()
    {
        $start_date=date('Y-m-01');
        $end_date=date('Y-m-t');

        $students=student::where('payment_date','>=',$start_date)->where('payment_date','<=',$end_date)->where('payment_type','Full')->where('approval','!=','Pending')->latest()->get();
        $tot=student::where('payment_date','>=',$start_date)->where('payment_date','<=',$end_date)->where('payment_type','Full')->where('approval','!=','Pending')->sum('fee');
        return view('reports.SinglePaymentReport',['students'=>$students,'start_date'=>$start_date,'end_date'=>$end_date,'tot'=>$tot]);
    }


    public function get_single_fee(Request $req)
    {
        $req->validate([
            'fromdt'=>'required',
            'todt'=>'required',

           
            ],
            [
              'fromdt.required' => 'This field is required',
              'todt.required' => 'This field is required',
            ]


          );
        $start_date=$req->fromdt;
        $end_date=$req->todt;

       $students=student::where('payment_date','>=',$start_date)->where('payment_date','<=',$end_date)->where('payment_type','Full')->where('approval','!=','Pending')->latest()->get();
        $tot=student::where('payment_date','>=',$start_date)->where('payment_date','<=',$end_date)->where('payment_type','Full')->where('approval','!=','Pending')->sum('fee');
        return view('reports.SinglePaymentReport',['students'=>$students,'start_date'=>$start_date,'end_date'=>$end_date,'tot'=>$tot]);
    }

        ///////////////////

        public function installment_fee()
    {
        $start_date=date('Y-m-01');
        $end_date=date('Y-m-t');

        $students=installment::where('payment_date','>=',$start_date)->where('payment_date','<=',$end_date)->where('approval_status','Approved')->latest()->get();
        $tot=installment::where('payment_date','>=',$start_date)->where('payment_date','<=',$end_date)->where('approval_status','Approved')->sum('fee');
        return view('reports.InstallmentReport',['students'=>$students,'start_date'=>$start_date,'end_date'=>$end_date,'tot'=>$tot]);
    }


    public function get_installment_fee(Request $req)
    {
        $req->validate([
            'fromdt'=>'required',
            'todt'=>'required',

           
            ],
            [
              'fromdt.required' => 'This field is required',
              'todt.required' => 'This field is required',
            ]


          );
        $start_date=$req->fromdt;
        $end_date=$req->todt;

         $students=installment::where('payment_date','>=',$start_date)->where('payment_date','<=',$end_date)->where('approval_status','Approved')->latest()->get();
        $tot=installment::where('payment_date','>=',$start_date)->where('payment_date','<=',$end_date)->where('approval_status','Approved')->sum('fee');
        return view('reports.InstallmentReport',['students'=>$students,'start_date'=>$start_date,'end_date'=>$end_date,'tot'=>$tot]);
    }

            ///////////////////

        public function paid_class_report()
    {
        $start_date=date('Y-m-01');
        $end_date=date('Y-m-t');

        $students=credit_class::where('payment_date','>=',$start_date)->where('payment_date','<=',$end_date)->where('type','Paid')->latest()->get();
        $tot=credit_class::where('payment_date','>=',$start_date)->where('payment_date','<=',$end_date)->where('type','Paid')->latest()->sum('paid_amount');
        return view('reports.PaidClassReport',['students'=>$students,'start_date'=>$start_date,'end_date'=>$end_date,'tot'=>$tot]);
    }


    public function get_paid_class_report(Request $req)
    {
        $req->validate([
            'fromdt'=>'required',
            'todt'=>'required',

           
            ],
            [
              'fromdt.required' => 'This field is required',
              'todt.required' => 'This field is required',
            ]


          );
        $start_date=$req->fromdt;
        $end_date=$req->todt;

    $students=credit_class::where('payment_date','>=',$start_date)->where('payment_date','<=',$end_date)->where('type','Paid')->latest()->get();
        $tot=credit_class::where('payment_date','>=',$start_date)->where('payment_date','<=',$end_date)->where('type','Paid')->latest()->sum('paid_amount');
        return view('reports.PaidClassReport',['students'=>$students,'start_date'=>$start_date,'end_date'=>$end_date,'tot'=>$tot]);
    }

}
