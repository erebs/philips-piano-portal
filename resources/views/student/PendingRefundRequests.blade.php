@extends('layouts.Admin')
@section('title')
 Pending Refund Requests
  @endsection
  @section('head1')  Pending Refund Requests @endsection 
@section('contents')


<div class="modal fade" id="sendMessageModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Reject Request</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="comment-form">
                                                                <div class="row"> 
                                                                    <input type="hidden" name="rid" id="rid">
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


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <div class="row">

                    
					<div class="col-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h4 class="card-title">Active Pharmacists</h4>
                            </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 945px;font-size:5px !important;">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Applied On</th> 
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($refund_requests as $s)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$s->GetStudent->name}}</td>                                                 
                                                <td>{{$s->GetStudent->mobile}}</td>
                                              <td>{{date("d-M-Y", strtotime($s->created_at))}}</td>
                                                
                                                <td>

													<div class="dropdown ms-auto text-end">
														<div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
															<svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" style="cursor:pointer;" onclick="RejectReq('{{$s->id}}')">Reject Request</a>

															<a class="dropdown-item" href="/administrator/student-details/{{encrypt($s->student_id)}}" target="_blank">Profile</a>
                                                            <a class="dropdown-item" href="/administrator/chats/{{encrypt($s->student_id)}}" target="_blank">Chats</a>
															
														</div>
													</div>
												</td>
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                       <!--  <tfoot>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Details</th>
                                                <th>Class Type</th>
                                                <th>Branch</th>
                                                <th>Deposit</th>
                                                <th>Fee Payment</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot> -->
                                    </table>
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

       function RejectReq(val)
    {
    
            var modal = $("#sendMessageModal");

            // Trigger the modal to show
            modal.modal("show");
            $('#rid').val(val);

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

      var rid=$('input#rid').val();     

       $('#ab1').hide();
       $('#ab2').show();
    
          data = new FormData();


   data.append('reason', reason);
   data.append('rid', rid);
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/reject-deporeq",
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
                  text: "Request rejected successfully",
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
    
  
 

   </script>


@endsection