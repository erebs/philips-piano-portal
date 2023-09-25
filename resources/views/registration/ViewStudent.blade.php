@extends('layouts.Admin')
@section('title')
 Registrations
  @endsection
  @section('head1')  Registrations @endsection 
@section('contents')

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
													<h4>{{$student->name}}</h4>
													<h4><i class="fa fa-mobile"></i> : {{$student->mobile}}</h4>
												</div>
                                                 @if($student->approval!='Rejected')
												<div class="mt-4">
													<a style="cursor:pointer;" onclick="Approve()" class="btn btn-primary mb-1 me-1">Approve</a> 
													<a href="javascript:void(0);" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#sendMessageModal">Reject</a>
												</div>
                                                @endif
											</div>
											<!-- Modal -->
											<div class="modal fade" id="sendMessageModal">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Reject Student</h5>
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
																			<button type="button" class="submit btn btn-primary" name="submit" onclick="Reject()" id="ab1">Submit</button>
                                                                            <button type="button" class="submit btn btn-primary" name="submit1" id="ab2"><i class="fa fa-spinner fa-spin"></i>  Submit</button>
																		</div>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="profile-blog">
											<h3 class="text-primary d-inline">Details</h3><br><br>
											
											<h5>Mobile 2 : {{$student->alternative_mobile}}</h5>
											<h5>Email : {{$student->email}}</h5>
											<h5>Address : {{$student->address}}</h5>
											<h5>Guardian : {{$student->guardian}}</h5>
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
                                            
                                            <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link active show">Class Details</a>
                                            </li>
                                            <!-- <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Deposit Details</a>
                                            </li> -->
                                            <li class="nav-item"><a href="#profile-settings1" data-bs-toggle="tab" class="nav-link">Fee Payment Details</a>
                                            </li>
                                            @if($student->approval=='Rejected')
                                            <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Reason for Rejection</a>
                                            </li>
                                            @endif
                                        </ul>
                                        <div class="tab-content">
                                            
                                            <div id="about-me" class="tab-pane fade fade active show">
                                                
                                                
                                                
                                                <div class="profile-personal-info">
                                                    
                                                    <h4 class="mt-4">Class Details</h4>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Class Mode <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$student->class_mode}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Branch <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        @if($student->class_mode=='Offline')
                                                        <div class="col-sm-9 col-7"><h5>{{$student->GetBranch->branch}}</h5>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Slote <span class="pull-end">:</span></h5>
                                                        </div>
                                                        @if($student->slote!=0)
                                                        <div class="col-sm-9 col-7"><h5>{{$student->GetSlote->day}}, {{date("H:i A", strtotime($student->GetSlote->slote))}}</h5>
                                                        </div>

                                                        @else
                                                        <div class="col-sm-9 col-7"><h5>Pending</h5>
                                                        </div>

                                                        @endif
                                                    </div>

                                                     @if($student->slote!=0)
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Joining Date <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($student->joining_date))}}</h5>
                                                        </div>
                                                        
                                                    </div>

                                                     <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Starting Date <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($student->valid_from))}}</h5>
                                                        </div>
                                                        
                                                    </div>

                                                     <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">End Date <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($student->valid_to))}}</h5>
                                                        </div>
                                                        
                                                    </div>
                                                    @endif
  
                                                </div>
                                            </div>
                                            


                                            <div id="profile-settings1" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        
                                                     <h4 class="mt-4">Fee Payment Details</h4>
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
                                                        <div class="col-sm-6 col-7">
                                                             @if($student->payment_approval=='Approved')
                                                           <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($student->payment_date))}}</h5>
                                                        </div>
                                                            @else
                                                            
                                                            <input type="date" name="paydt" id="paydt" class="form-control" value="{{$student->payment_date}}">
                                                            @endif
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
                                                    <div class="row mt-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Approval Status <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                    <div class="col-sm-6 col-7">
                                                            @if($student->payment_approval=='Approved')
                                                           <div class="col-sm-9 col-7"><h5>{{$student->payment_approval}}</h5>
                                                        </div>
                                                            @else
                                                        <select class="form-control col-md-3" onchange="PaymentApproval(this.value,'{{$student->id}}')">
                                                            <option value="Pending" @if($student->approval_status=='Pending') selected @endif>Pending</option>
                                                            <option value="Approved" @if($student->approval_status=='Approved') selected @endif>Approved</option>
                                                            <option value="Rejected" @if($student->approval_status=='Rejected') selected @endif>Rejected</option>
                                                        </select>
                                                        @endif
                                                    </div>
                                                </div>

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
                                                            <h5 class="f-w-500">Rejected On <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{date("d-M-Y", strtotime($student->rejected_at))}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Reason <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><h5>{{$student->rejection_reason}}</h5>
                                                        </div>
                                                    </div>
                                                     </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
									<!-- Modal -->
									<div class="modal fade" id="replyModal">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Post Reply</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
												</div>
												<div class="modal-body">
													<form>
														<textarea class="form-control" rows="4">Message</textarea>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
													<button type="button" class="btn btn-primary">Reply</button>
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

 function Approve()
    {
    
  
 swal({
  title: "Do you want to approve this student ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$student->id}}';




$.ajax({

              type:"POST",
              url:'/administrator/approve-student',
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
                          text: "Student approved successfully",
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
                            window.location.href='/administrator/approval-pending';
                          },
                        }).showToast();

                     
                    }
                  
                
            }
       })

 } 
  
});

} 


            
            function Reject()
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
url:"/administrator/reject-student",
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
                  text: "Student rejected successfully",
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
                   window.location.href='/administrator/approval-pending';
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
                      url:'/administrator/approve-payment',
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
                      url:'/administrator/approve-payment',
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


        </script>


        @endsection