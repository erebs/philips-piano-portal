@extends('layouts.Admin')
@section('title')
 Profile
  @endsection
  @section('head1')  Student Profile @endsection 
@section('contents')

<!-- Modal -->
                                            <div class="modal fade" id="sendMessageModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Block Student</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="comment-form">
                                                                <div class="row"> 
                                                                    
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label class="text-black font-w600 form-label">Reason</label>
                                                                            <textarea rows="5" cols="5" class="form-control" name="reason" placeholder="Reason" id="reason"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3 mb-0">
                                                                            <button type="button" class="submit btn btn-primary" name="submit" onclick="Block()" id="ab1">Submit</button>
                                                                            <button type="button" class="submit btn btn-primary" name="submit1" id="ab2"><i class="fa fa-spinner fa-spin"></i>  Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="sendMessageModal1">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Deactivate Student</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="comment-form">
                                                                <div class="row"> 
                                                                    
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label class="text-black font-w600 form-label">Reason</label>
                                                                            <textarea rows="5" cols="5" class="form-control" name="reason1" placeholder="Reason" id="reason1"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3 mb-0">
                                                                            <button type="button" class="submit btn btn-primary" name="submit" onclick="Deactivate()" id="ab3">Submit</button>
                                                                            <button type="button" class="submit btn btn-primary" name="submit1" id="ab4"><i class="fa fa-spinner fa-spin"></i>  Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
				
				
                <!-- row -->
               
                <div class="row">
                    <div class="col-xl-4">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="profile-statistics">
											<div class="text-center">
												<div class="row">
													<h4>Name : {{$student->name}}</h4>
													<h4>Mob : {{$student->mobile}}</h4>
												</div>
                                                @if($student->approval=='Approved')
                                                @php
                                                $dt=date('Y-m-d');
                                                @endphp
                                                @if($student->valid_to>=$dt)
                                                <span class="badge light badge-success">Active</span>
                                                @else
                                                <span class="badge light badge-success">Active</span>
                                                <span class="badge light badge-warning">Validity Expired</span>
                                                @endif
                                                @elseif($student->approval=='Blocked')
                                                <span class="badge light badge-danger">{{$student->approval}}</span>
                                                @elseif($student->approval=='Deactivated')
                                                <span class="badge light badge-danger">{{$student->approval}}</span>
                                                @else
                                                <span class="badge light badge-primary">{{$student->approval}}</span>
                                                @endif
                                                 @if($student->approval=='Approved')
												<div class="mt-4">
													<a style="cursor:pointer;" onclick="Complete()" class="btn btn-primary mb-1 me-1 btn-sm">Complete</a> 
                                                    <a href="javascript:void(0);" class="btn btn-primary mb-1 btn-sm" data-bs-toggle="modal" data-bs-target="#sendMessageModal1">Deactivate</a>
													<a href="javascript:void(0);" class="btn btn-primary mb-1 btn-sm" data-bs-toggle="modal" data-bs-target="#sendMessageModal">Block</a>
                                                    
												</div>
                                                @elseif($student->approval=='Blocked')
                                                <div class="mt-4">
                                                <a style="cursor:pointer;" onclick="Activate()" class="btn btn-primary mb-1 me-1">Activate</a>
                                            </div>
                                                @endif

                                                
											</div>
											
										</div>
									</div>
								</div>
							</div>

                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-blog">
                                            <h3 class="text-primary d-inline">Personal Details</h3><br><br>
                                            
                                            <h5>Mobile 2 : {{$student->alternative_mobile}}</h5><hr>
                                            <h5>Email : {{$student->email}}</h5><hr>
                                            <h5>Address : {{$student->address}}</h5><hr>
                                            <h5>Guardian : {{$student->guardian}}</h5><hr>
                                            <h5>DOB : {{date("d-M-Y", strtotime($student->dob))}}</h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>


                           
							
						</div>
                    </div>


                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            
                                            <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link active show">Registration Details</a>
                                            </li>
                                            
                                            <li class="nav-item"><a href="#profile-settings1" data-bs-toggle="tab" class="nav-link">Plan</a>
                                            </li>
                                           
                                            <li class="nav-item"><a href="#profile-settings2" data-bs-toggle="tab" class="nav-link">Deposit</a>
                                            </li>
                                            <li class="nav-item"><a href="#renew" data-bs-toggle="tab" class="nav-link">Renew</a>
                                            </li>
                                            @if($student->approval=='Blocked')
                                            <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Reason</a>
                                            </li>
                                            @elseif($student->approval=='Deactivated')
                                            <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Reason</a>
                                            </li>
                                            @endif
                                            
                                        </ul>
                                        <div class="tab-content">
                                            
                                            <div id="about-me" class="tab-pane fade fade active show">
                                               
                                                <div class="profile-personal-info">
                                                    
                                                    <h4 class="mt-4">Registration Details</h4>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Payment Status <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$student->payment_status}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Payment Type <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$student->payment_type}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Payment Method <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$student->payment_method}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Fee <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$student->fee}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Extra Fee <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$student->extra_fee}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Deposit <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$student->deposit_amount}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Paid Amount <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$student->paid_amount}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Payment Date <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($student->payment_date))}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Reference Id <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$student->reference_id}}</h5>
                                                        </div>
                                                    </div>

                                                  
                                                </div>
                                            </div>

                                            <div id="profile-settings1" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        
                                                     

                                                    @if($student->plan!='')
                                                    <h4 class="mt-4">Choosen Plan Details</h4>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Plan Name <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$student->GetPlan->name}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Duration <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$student->GetPlan->month}} Months</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Actual Fee <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$student->GetPlan->actual_fee}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Offer Fee <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$student->GetPlan->offer_fee}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Monthly Fee <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$student->GetPlan->monthly_fee}}</h5>
                                                        </div>
                                                    </div>
                                                    @endif


                                                    </div>

                                                </div>
                                            </div>


                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        
                                                     <!-- <h4 class="mt-4">Fee Payment Details</h4> -->
                                                     <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Reason <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$student->rejection_reason}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Date <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($student->rejected_at))}}</h5>
                                                        </div>
                                                    </div>
                                                    
                                                     </div>
                                                </div>
                                            </div>

                                            <div id="profile-settings2" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        
                                                     <!-- <h4 class="mt-4">Fee Payment Details</h4> -->
                                                     <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Deposit Amount <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$student->deposit_amount}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Repay Status <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$student->deposit_repay_status}}</h5>
                                                        </div>
                                                    </div>

                                                    @if($student->deposit_repay_status=='Paid')

                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Repaid Amount <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$student->deposit_repay_amount}}</h5>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Repaid Date <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($student->deposit_repay_date))}}</h5>
                                                        </div>
                                                    </div>

                                                     <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Note <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$student->deposit_repay_mote}}</h5>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    
                                                     </div>

                                                </div><br><br>
                                                <hr>
                                                <div class="settings-form">
                                                        <h4 class="text-primary">Deposit Repayment</h4>
                                                        <form>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Amount</label>
                                                                    <input type="number" placeholder="Enter Repaid Amount" class="form-control" id="repayamt" value="{{$student->deposit_repay_amount}}">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Date</label>
                                                                    <input type="date" class="form-control" id="repaydt" value="{{$student->deposit_repay_date}}">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Note</label>
                                                                <textarea class="form-control" rows="3" cols="3" id="repaynote">{{$student->deposit_repay_mote}}</textarea>
                                                                
                                                            </div>
                                                            
                                                           
                                                           
                                                            <button class="btn btn-primary" type="button" onclick="Repay()">Submit</button>
                                                        </form>
                                                    </div>
                                            </div>


                                            <div id="renew" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        
                                                     <!-- <h4 class="mt-4">Fee Payment Details</h4> -->
                                                     <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Deposit Amount <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$student->deposit_amount}}</h5>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                     </div>

                                                </div><br><br>
                                                <hr>
                                                <div class="settings-form">
                                                        <h4 class="text-primary">Account Renewal</h4>
                                                        <form>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Amount</label>
                                                                    <input type="number" placeholder="Enter Repaid Amount" class="form-control" id="repayamt" value="{{$student->deposit_repay_amount}}">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Date</label>
                                                                    <input type="date" class="form-control" id="repaydt" value="{{$student->deposit_repay_date}}">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Note</label>
                                                                <textarea class="form-control" rows="3" cols="3" id="repaynote">{{$student->deposit_repay_mote}}</textarea>
                                                                
                                                            </div>
                                                            
                                                           
                                                           
                                                            <button class="btn btn-primary" type="button" onclick="Repay()">Submit</button>
                                                        </form>
                                                    </div>
                                            </div>










                                        </div>
                                    </div>
									
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



<!-- //////////////////////////////////////// -->



                <div class="row">
                    <div class="col-xl-4">
                        <div class="row">
                            
                            
 <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-blog">
                                            <h3 class="text-primary d-inline">Class Details</h3><br><br>
                                            
                                            <h5>Class Mode : {{$student->class_mode}}</h5><hr>
                                            @if($student->class_mode=='Offline')
                                            <h5>Branch  : {{$student->GetBranch->branch}}</h5><hr>
                                             @endif
                                             @if($student->slote!=0)
                                            <h5>Slote  : {{$student->GetSlote->day}}, {{date("H:i A", strtotime($student->GetSlote->slote))}}</h5><hr>
                                            @else
                                            <h5>Slote  : Pending</h5><hr>
                                             @endif
                                         
                                            <h5>Joining Date : {{date("d-M-Y", strtotime($student->joining_date))}}</h5><hr>
                                            <h5>Starting Date : {{date("d-M-Y", strtotime($student->valid_from))}}</h5><hr>
                                            <h5>End Date : {{date("d-M-Y", strtotime($student->valid_to))}}</h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            
                        </div>
                    </div>















                    <div class="col-xl-8" >
                        <div class="card" style="max-height: 500px;overflow: auto;">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            
                                            <li class="nav-item"><a href="#comp" data-bs-toggle="tab" class="nav-link active show">Completed</a>
                                            </li>
                                             <li class="nav-item"><a href="#can" data-bs-toggle="tab" class="nav-link">Cancelled</a>
                                            </li>
                                            <li class="nav-item"><a href="#credit" data-bs-toggle="tab" class="nav-link">Credit Classes</a>
                                            </li>
                                            <li class="nav-item"><a href="#paid" data-bs-toggle="tab" class="nav-link">Paid Classes</a>
                                            </li>
                                            
                                            @if($student->payment_type=='Monthly')
                                            <li class="nav-item"><a href="#mpay" data-bs-toggle="tab" class="nav-link">Installments</a>
                                            </li>
                                            @endif
                                           
                                            
                                        </ul>
                                        <div class="tab-content">
                                            
                                            <div id="comp" class="tab-pane fade fade active show">
                                               
                                                <div class="profile-personal-info">
                                                    
                                                    <h4 class="mt-4">Completed Classes</h4>

                                                    @foreach($attendance as $at)
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Class Date <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7"><h5>{{date("d-M-Y l", strtotime($at->at_date))}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Attendance Status <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7"><h5>{{$at->status}}</h5>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    @endforeach
                                                  
                                                </div>
                                            </div>

                                            <div id="can" class="tab-pane fade fade">
                                               
                                                <div class="profile-personal-info">
                                                    
                                                    <h4 class="mt-4">Cancelled Classes</h4>

                                                    @foreach($cancelled_class as $can)
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Class Date <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7"><h5>{{date("d-M-Y l", strtotime($can->class_date))}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Applied Date <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7"><h5>{{date("d-M-Y", strtotime($can->created_at))}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Reason <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7"><h5>{{$can->reason}}</h5>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    @endforeach
                                                  
                                                </div>
                                            </div>
                                            


                                            <div id="credit" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                     

                                                        <div class="settings-form">
                                                        <h4 class="text-primary">Add Credit Class</h4>
                                                        <form>
                                                            
                                                            <div class="mb-3">
                                                                <label class="form-label">Details</label>
                                                                <textarea class="form-control" rows="3" cols="3" id="crednote"></textarea>
                                                                
                                                            </div>
                                                             <button type="button" class="btn btn-primary" onclick="AddClass()" id="b1">Add</button>
                  <button type="button" class="btn btn-primary" id="b2"> <i class="fa fa-spinner fa-spin"></i>   Add</button>
                                                        </form>
                                                    </div>
                                                    <hr>
                                                    @foreach($credit_class as $cd)
                                                    @if($cd->status=='Pending')
                                                    <span style="cursor: pointer;color: red;float: right;" onclick="DeleteClass('{{$cd->id}}')"><i class="fa fa-trash"></i></span>
                                                    @endif
                                                     <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Created At<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($cd->created_at))}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Details <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$cd->details}}</h5>
                                                        </div>
                                                    </div>

                                                    @if($cd->status=='Cancelled')

                                                     <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Slote <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Cancelled</h5>
                                                        </div>
                                                    </div>
                                                     <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Reason <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$cd->cancel_reason}}</h5>
                                                        </div>
                                                    </div>

                                                    @else

                                                    @if($cd->slote==0)
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Slote <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Pending</h5>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Slote <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y l", strtotime($cd->booked_date))}}, {{date("H:i A", strtotime($cd->GetSlote->slote))}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Attendance <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$cd->attendance}}</h5>
                                                        </div>
                                                    </div>

                                                    @endif
                                                    @endif
                                                    <hr>
                                                    @endforeach

                                                   
                                                    
                                                     </div>

                                                </div>
                                                
                                                
                                            </div>

                                            <div id="paid" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                     
                                                    @foreach($paid_class as $pd)
                                                    
                                                     <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Created At<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($pd->created_at))}}</h5>
                                                        </div>
                                                    </div>
                                                    

                                                    @if($cd->slote==0)
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Slote <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Pending</h5>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Slote <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y l", strtotime($cd->booked_date))}}, {{date("H:i A", strtotime($cd->GetSlote->slote))}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Paid Amount <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$pd->paid_amount}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Payment Method <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$pd->payment_method}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Payment Date <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($pd->payment_date))}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Reference Id <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$pd->reference_id}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Attendance <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$pd->attendance}}</h5>
                                                        </div>
                                                    </div>

                                                    @endif
                                                    <hr>
                                                    @endforeach

                                                   
                                                    
                                                     </div>

                                                </div>
                                                
                                                
                                            </div>
                                            


                                            



                                            <div id="mpay" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        
                                                     <!-- <h4 class="mt-4">Fee Payment Details</h4> -->
                                                     @foreach($installments as $i)
                                                     <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Plan <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$i->GetPlan->name}}</h5>
                                                        </div>
                                                    </div>
                                                     <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Payment Status <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$i->payment_status}}</h5>
                                                        </div>
                                                    </div>
                                                     <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Last Date <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($i->last_date))}}</h5>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Payment Date <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        
                                                        <div class="col-sm-6 col-7">
                                                             @if($i->approval_status=='Approved')
                                                           <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($i->payment_date))}}</h5>
                                                        </div>
                                                            @else
                                                            @if($i->payment_date=='')
                                                            @php $paydt=date('Y-m-d'); @endphp
                                                             @else 
                                                            @php $paydt=$i->payment_date; @endphp 
                                                              @endif
                                                            

                                                            
                                                            
                                                            <input type="date" name="paydt" id="paydt" class="form-control" value="{{$paydt}}">
                                                            @endif
                                                        </div>
                                                       
                                                    </div>
                                                    
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Payment Method <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            @if($i->approval_status=='Approved')
                                                           <div class="col-sm-9 col-7"><h5>{{$i->payment_method}}</h5>
                                                        </div>
                                                            @else
                                                        <select class="form-control" onchange="PaymentMethod(this.value,'{{$i->id}}')" id="pay_method">
                                                            <option value="Pending" @if($i->payment_method=='Pending') selected @endif>Pending</option>

                                                            <option value="Online" @if($i->payment_method=='Online') selected @endif>Online</option>
                                                            <option value="Offline" @if($i->payment_method=='Offline') selected @endif>Offline</option>
                                                           
                                                        </select>
                                                        @endif
                                                    </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Monthly Fee <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$i->fee}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Paid Amount <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        @if($i->payment_status!='Pending')
                                                        <div class="col-sm-9 col-7"><h5>Rs.{{$i->fee}}</h5>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Reference Id <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$i->reference_id}}</h5>
                                                        </div>
                                                    </div>
                                                     <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Approval Status <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            @if($i->approval_status=='Approved')
                                                           <div class="col-sm-9 col-7"><h5>{{$i->approval_status}}</h5>
                                                        </div>
                                                            @else
                                                        <select class="form-control col-md-3" onchange="PaymentApproval(this.value,'{{$i->id}}')">
                                                            <option value="Pending" @if($i->approval_status=='Pending') selected @endif>Pending</option>
                                                            <option value="Approved" @if($i->approval_status=='Approved') selected @endif>Approved</option>
                                                            <option value="Rejected" @if($i->approval_status=='Rejected') selected @endif>Rejected</option>
                                                        </select>
                                                        @endif
                                                    </div>
                                                    </div>
                                                    <hr>
                                                    @endforeach
                                                     </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>














            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <script type="text/javascript">


 function PaymentMethod(status,payid)
    {

    
  
  var status=status;
  var payid=payid;




$.ajax({

              type:"POST",
              url:'/administrator/payment-method',
              data: {
        _token: @json(csrf_token()),
        status: status,
        payid: payid,
     
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       Toastify({
                          text: "Payment method changed successfully",
                          duration: 2000,
                          newWindow: true,
                          // close: true,
                          gravity: "top", // `top` or `bottom`
                          position: "right", // `left`, `center` or `right`
                          stopOnFocus: true, // Prevents dismissing of toast on hover
                          style: {
                            background: "linear-gradient(to right, #12a00f, #12a00f)",
                          },
                          callback: function () {
                           // alert("sss");
                           // window.location.href=window.location.href;
                          },
                        }).showToast();

                     
                    }
                  
                
            }
       })



}   


 function PaymentApproval(status,payid)
    {

        //     alert(status);
        // alert(payid);
        // return false;

        if(status=='Approved')
        {

                    swal({
              title: "Do you want to approve this payment ?",
              text: "There is no further modification available after approval",
              icon: "warning",
              buttons: ["No", "Yes"],
            })

            .then((willDelete) => {
              if (willDelete) {
  
              // var status=status;
              // var payid=payid;
              var paydt=$('input#paydt').val();
            $.ajax({

                      type:"POST",
                      url:'/administrator/payment-approval',
                      data: {
                _token: @json(csrf_token()),
                status: status,
                payid: payid,
                paydt: paydt,

               
                },
               
              dataType:"json",
              success:function(data)
                {
                  if(data['success'])
                    {
                       Toastify({
                          text: "Payment status changed successfully",
                          duration: 2000,
                          newWindow: true,
                          // close: true,
                          gravity: "top", // `top` or `bottom`
                          position: "right", // `left`, `center` or `right`
                          stopOnFocus: true, // Prevents dismissing of toast on hover
                          style: {
                            background: "linear-gradient(to right, #12a00f, #12a00f)",
                          },
                          callback: function () {
                           // alert("sss");
                            window.location.href=window.location.href;
                          },
                        }).showToast();

                     
                    }
                  
                
            }
       })

             } 
  
});

} 
else
{
    // var status=status;
    //           var payid=payid;
              var paydt=$('input#paydt').val();
            $.ajax({

                      type:"POST",
                      url:'/administrator/payment-approval',
                      data: {
                _token: @json(csrf_token()),
                status: status,
                payid: payid,
                paydt: paydt,

               
                },
               
              dataType:"json",
              success:function(data)
                {
                  if(data['success'])
                    {
                       Toastify({
                          text: "Payment status changed successfully",
                          duration: 2000,
                          newWindow: true,
                          // close: true,
                          gravity: "top", // `top` or `bottom`
                          position: "right", // `left`, `center` or `right`
                          stopOnFocus: true, // Prevents dismissing of toast on hover
                          style: {
                            background: "linear-gradient(to right, #12a00f, #12a00f)",
                          },
                          callback: function () {
                           // alert("sss");
                            window.location.href=window.location.href;
                          },
                        }).showToast();

                     
                    }
                  
                
            }
       })
}



}          

















 function Complete()
    {
    
  
 swal({
  title: "Do you want to continue ?",
  text: "There is no further modification available after completion .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$student->id}}';




$.ajax({

              type:"POST",
              url:'/administrator/complete-student',
              data: {
        _token: @json(csrf_token()),
        body: body
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       Toastify({
                          text: "Student course completed successfully",
                          duration: 1000,
                          newWindow: true,
                          // close: true,
                          gravity: "top", // `top` or `bottom`
                          position: "right", // `left`, `center` or `right`
                          stopOnFocus: true, // Prevents dismissing of toast on hover
                          style: {
                            background: "linear-gradient(to right, #12a00f, #12a00f)",
                          },
                          callback: function () {
                           // alert("sss");
                            window.location.href='/administrator/active-students';
                          },
                        }).showToast();

                     
                    }
                  
                
            }
       })

 } 
  
});

} 



function Repay()
{
    var repayamt=$('input#repayamt').val();
    if(repayamt=='')
    {
        $('#repayamt').focus();
        $('#repayamt').css({'border':'1px solid red'});
        return false;
    }
    else
    $('#repayamt').css({'border':'1px solid #CCC'});    

    var repaydt=$('input#repaydt').val();
    if(repaydt=='')
    {
        $('#repaydt').focus();
        $('#repaydt').css({'border':'1px solid red'});
        return false;
    }
    else
    $('#repaydt').css({'border':'1px solid #CCC'});
    
    var repaynote=$('#repaynote').val();   

       // $('#ab1').hide();
       // $('#ab2').show();
    
          data = new FormData();

   data.append('repayamt', repayamt);
   data.append('repaydt', repaydt);       
   data.append('repaynote', repaynote);
   data.append('sid', '{{$student->id}}');
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/repay-deposit",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
      if(data['success'])
      {
        $('#ab2').hide();
        $('#ab1').show();
                Toastify({
                  text: "Deposit repay status changed",
                  duration: 1000,
                  newWindow: true,
                  // close: true,
                  gravity: "top", // `top` or `bottom`
                  position: "right", // `left`, `center` or `right`
                  stopOnFocus: true, // Prevents dismissing of toast on hover
                  style: {
                    background: "linear-gradient(to right, #12a00f, #12a00f)",
                  },
                  callback: function () {
                   // alert("sss");
                   window.location.href=window.location.href;
                  },
                }).showToast();
                                
      }




}




})



}


            
function Block()
{
     var reason=$('#reason').val();
    if(reason=='')
    {
        $('#reason').focus();
        $('#reason').css({'border':'1px solid red'});
        return false;
    }
    else

       $('#ab1').hide();
       $('#ab2').show();
    
          data = new FormData();


   data.append('reason', reason);
   data.append('sid', '{{$student->id}}');
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/block-student",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
      if(data['success'])
      {
        $('#ab2').hide();
        $('#ab1').show();
                Toastify({
                  text: "Student blocked successfully",
                  duration: 1000,
                  newWindow: true,
                  // close: true,
                  gravity: "top", // `top` or `bottom`
                  position: "right", // `left`, `center` or `right`
                  stopOnFocus: true, // Prevents dismissing of toast on hover
                  style: {
                    background: "linear-gradient(to right, #12a00f, #12a00f)",
                  },
                  callback: function () {
                   // alert("sss");
                   window.location.href='/administrator/active-students';
                  },
                }).showToast();
                                
      }




}




})



}


function Deactivate()
{
     var reason1=$('#reason1').val();
    if(reason1=='')
    {
        $('#reason1').focus();
        $('#reason1').css({'border':'1px solid red'});
        return false;
    }
    else

       $('#ab3').hide();
       $('#ab4').show();
    
          data = new FormData();


   data.append('reason1', reason1);
   data.append('sid', '{{$student->id}}');
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/deactivate-student",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
      if(data['success'])
      {
        $('#ab4').hide();
        $('#ab3').show();
                Toastify({
                  text: "Student deactivated successfully",
                  duration: 1000,
                  newWindow: true,
                  // close: true,
                  gravity: "top", // `top` or `bottom`
                  position: "right", // `left`, `center` or `right`
                  stopOnFocus: true, // Prevents dismissing of toast on hover
                  style: {
                    background: "linear-gradient(to right, #12a00f, #12a00f)",
                  },
                  callback: function () {
                   // alert("sss");
                   window.location.href='/administrator/active-students';
                  },
                }).showToast();
                                
      }




}




})



}


function Activate()
    {
    
  
 swal({
  title: "Do you want to activate this student ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$student->id}}';




$.ajax({

              type:"POST",
              url:'/administrator/activate-student',
              data: {
        _token: @json(csrf_token()),
        body: body
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       Toastify({
                          text: "Student activated successfully",
                          duration: 2000,
                          newWindow: true,
                          // close: true,
                          gravity: "top", // `top` or `bottom`
                          position: "right", // `left`, `center` or `right`
                          stopOnFocus: true, // Prevents dismissing of toast on hover
                          style: {
                            background: "linear-gradient(to right, #12a00f, #12a00f)",
                          },
                          callback: function () {
                           // alert("sss");
                            window.location.href='/administrator/blocked-students';
                          },
                        }).showToast();

                     
                    }
                  
                
            }
       })

 } 
  
});

} 



function AddClass()
{
     var crednote=$('#crednote').val();
    if(crednote=='')
    {
        $('#crednote').focus();
        $('#crednote').css({'border':'1px solid red'});
        return false;
    }
    else

       $('#b1').hide();
       $('#b2').show();
    
          data = new FormData();


   data.append('crednote', crednote);
   data.append('sid', '{{$student->id}}');
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/add-class",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
      if(data['success'])
      {
        $('#b2').hide();
        $('#b1').show();
                Toastify({
                  text: "Credit class added successfully",
                  duration: 1000,
                  newWindow: true,
                  // close: true,
                  gravity: "top", // `top` or `bottom`
                  position: "right", // `left`, `center` or `right`
                  stopOnFocus: true, // Prevents dismissing of toast on hover
                  style: {
                    background: "linear-gradient(to right, #12a00f, #12a00f)",
                  },
                  callback: function () {
                   // alert("sss");
                   window.location.href=window.location.href;
                  },
                }).showToast();
                                
      }




}




})



}



function DeleteClass(val)
    {
    
  
 swal({
  title: "Do you want to delete this class ?",
  //text: "There is no further modification available after completion .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/administrator/delete-class',
              data: {
        _token: @json(csrf_token()),
        body: body
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       Toastify({
                          text: "Credit class deleted successfully",
                          duration: 1000,
                          newWindow: true,
                          // close: true,
                          gravity: "top", // `top` or `bottom`
                          position: "right", // `left`, `center` or `right`
                          stopOnFocus: true, // Prevents dismissing of toast on hover
                          style: {
                            background: "linear-gradient(to right, #12a00f, #12a00f)",
                          },
                          callback: function () {
                           // alert("sss");
                            window.location.href=window.location.href;
                          },
                        }).showToast();

                     
                    }
                  
                
            }
       })

 } 
  
});

} 


        </script>


        @endsection