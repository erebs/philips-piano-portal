@extends('layouts.Teacher')
@section('title')
 Attendance
  @endsection
  @section('head1') Attendance History @endsection 
@section('contents')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">

				
                <div class="row">

                    
					<div class="col-12">
                        <div class="card">
                             <div class="card-header">
                                <h4 class="card-title">{{$slote->day}}, {{date("g:i A", strtotime($slote->slote))}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Date</th>
                                                <th>Students</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($attendance as $s)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{date("d-M-Y l", strtotime($s->at_date))}}</td>
                                                 <td><a class="badge light badge-primary" href="/teacher/online-students/{{encrypt($sid)}}/{{$s->at_date}}" target="_blank">Students</a></td>
                                                
                                               
                                                
                                                <!-- <td>

													<div class="dropdown ms-auto text-end">
														<div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
															<svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-end">
															

														</div>
													</div>
												</td> -->
                                           
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


@endsection