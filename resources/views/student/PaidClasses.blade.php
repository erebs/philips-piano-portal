@extends('layouts.Admin')
@section('title')
 Classes
  @endsection
  @section('head1')  Pending Paid Classes @endsection 
@section('contents')




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
                                <input type="date" class="form-control" name="dt">
                                <input type="button" name="">
                            </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 945px;font-size:5px !important;">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Slote</th>  
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($paid_classes as $s)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$s->GetStudent->name}}</td>                                                 
                                                <td>{{$s->GetStudent->mobile}}</td>
                                              <td>{{date("d-M-Y l", strtotime($s->booked_date))}}, {{date("H:i A", strtotime($s->GetSlote->slote))}}</td>
                                                
                                                <td>

													<div class="dropdown ms-auto text-end">
														<div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
															<svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-end">
                                                            
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