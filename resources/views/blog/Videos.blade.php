@extends('layouts.Admin')
@section('title')
 Videos
  @endsection
  @section('head1') Videos @endsection 
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
                            </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Title</th>
                                                <th>Video</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($videos as $v)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$v->title}}</td>
                                                <td>@php print_r($v->link)  @endphp</td>
                                                <td>

													<div class="dropdown ms-auto text-end">
														<div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
															<svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-end">
															<a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/administrator/edit-video/{{encrypt($v->id)}}'">View/Edit</a>
															<a class="dropdown-item" style="cursor: pointer;" onclick="Delete('{{$v->id}}')">Delete</a>
														</div>
													</div>
												</td>
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                        
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

       function Delete(val)
    {
    
  
 swal({
  title: "Do you want to delete this video ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/administrator/delete-video',
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
                          text: "Video deleted successfully",
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

   </script>


@endsection