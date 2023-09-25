@extends('layouts.Admin')
@section('title')
 Blocked Students
  @endsection
  @section('head1')  Blocked Students @endsection 
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
                                    <table id="example" class="display" style="min-width: 945px;font-size:5px !important;">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Slote</th>
                                                <th>Valid Upto</th>  
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($students as $s)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$s->name}}</td>
                                                 
                                                <td>{{$s->mobile}}</td>
                                              <td>{{$s->GetSlote->day}} , {{date("H:i A", strtotime($s->GetSlote->slote))}}</td>
                                                <td>{{date("d-M-Y", strtotime($s->valid_to))}}</td>
                                                
                                                <td>

													<div class="dropdown ms-auto text-end">
														<div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
															<svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-end">
															<a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/administrator/student-details/{{encrypt($s->id)}}'">Profile</a>
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/administrator/chats/{{encrypt($s->id)}}'">Chats</a>
															
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


   </script>


@endsection