
@extends('layouts.Admin')
@section('title')
 dashboard
  @endsection

 @section('head1') Dashboard @endsection 
  
@section('contents')
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-6">
								<div class="row">
									<div class="col-xl-12">
										<div class="card tryal-gradient">
											<div class="card-body tryal row">
												<div class="col-xl-7 col-sm-6">
													<h2 style="font-size:26px;">You are the music while the music lasts</h2>
													<span>Music can change the world because it can change people. </span>
													 
												</div>
												<div class="col-xl-5 col-sm-6">
													<!-- <img src="{{asset('/admin/images/logo.png')}}" alt="" class="sd-shape"> -->
													<a href="/administrator/approval-pending" class="btn btn-rounded  fs-18 font-w500">View Apps</a>
												</div>
											</div>
										</div>
									</div>
									

									

								</div>
								
							</div>
							<div class="col-xl-6">
								<div class="row">
									<div class="col-xl-12">
										<div class="row">
											
											<div class="col-xl-6 col-sm-6" style="cursor:pointer;" onclick="window.location.href='/administrator/active-students'">
												<div class="card">
													<div class="card-body d-flex px-4  justify-content-between">
														<div>
															<div class="">
																<h2 class="fs-32 font-w700">{{$activestd}}</h2>
																<span class="fs-18 font-w500 d-block">Active Students</span>
																
															</div>
														</div>
														<div id="NewCustomers"><i class="fas fa-user-graduate" style="font-size:45px;"></i></div>
													</div>
												</div>
											</div>

											<div class="col-xl-6 col-sm-6" style="cursor:pointer;" onclick="window.location.href='/administrator/expired-students'">
												<div class="card">
													<div class="card-body d-flex px-4  justify-content-between">
														<div>
															<div class="">
																<h2 class="fs-32 font-w700">{{$expstd}}</h2>
																<span class="fs-18 font-w500 d-block">Expired Students</span>
																
															</div>
														</div>
														<div id="NewCustomers"><i class="fa fa-user" style="font-size:45px;"></i></div>
													</div>
												</div>
											</div>
											
											
											<div class="col-xl-6 col-sm-6" style="cursor:pointer;" onclick="window.location.href='/administrator/installment-pending'">
												<div class="card">
													<div class="card-body d-flex px-4  justify-content-between">
														<div>
															<div class="">
																<h2 class="fs-32 font-w700">{{$instcnt}}</h2>
																<span class="fs-18 font-w500 d-block">Pending Installments</span>
																
															</div>
														</div>
														<div id="NewCustomers"><i class="fa fa-credit-card" style="font-size:45px;"></i></div>
													</div>
												</div>
											</div>
											<div class="col-xl-6 col-sm-6" style="cursor:pointer;" onclick="window.location.href='/administrator/pending-refund-requests'">
												<div class="card">
													<div class="card-body d-flex px-4  justify-content-between">
														<div>
															<div class="">
																<h2 class="fs-32 font-w700">{{$refundcnt}}</h2>
																<span class="fs-18 font-w500 d-block">Refund Requests</span>
																
															</div>
														</div>
														<div id="NewCustomers1"><i class="fa fa-paper-plane" style="font-size:45px;"></i></div>
													</div>
												</div>
											</div>
										</div>										
									</div>									
								</div>
							</div>


							<div class="col-xl-12">
										<div class="card">
											<div class="card-header border-0 flex-wrap">
												<h4 class="fs-20 font-w700 mb-2">Latest Registrations</h4>
												<div class="d-flex align-items-center project-tab mb-2">	
													<div class="card-tabs mt-3 mt-sm-0 mb-3 ">
														<ul class="nav nav-tabs" role="tablist">
															
															<li class="nav-item">
																<a class="nav-link active" data-bs-toggle="tab" href="#Today" role="tab">Today</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" data-bs-toggle="tab" href="#Weekly" role="tab">Weekly</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" data-bs-toggle="tab" href="#monthly" role="tab">Monthly</a>
															</li>
															
														</ul>
													</div>

													
												</div>	
											</div>
											<div class="card-body">
												
												<div class="tab-content">
													<div class="tab-pane fade" id="monthly">
														 <table id="example" class="display" style="min-width: 945px;font-size:5px !important;">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Registered On</th> 
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($monstudents as $s)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$s->name}}</td>                                                
                                                <td>{{$s->mobile}}</td>
                                                <td>{{date("d-M-Y", strtotime($s->created_at))}}</td>
                                                
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
                                    </table>
													</div>	



													<div class="tab-pane fade" id="Weekly">
															 <table id="example3" class="display" style="min-width: 945px;font-size:5px !important;">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                               <th>Registered On</th>  
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($wstudents as $ws)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$ws->name}}</td>
                                                 
                                                <td>{{$ws->mobile}}</td>
                                                <td>{{date("d-M-Y", strtotime($ws->created_at))}}</td>
                                                
                                                <td>

													<div class="dropdown ms-auto text-end">
														<div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
															<svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-end">
															<a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/administrator/student-details/{{encrypt($ws->id)}}'">Profile</a>
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/administrator/chats/{{encrypt($ws->id)}}'">Chats</a>
															
														</div>
													</div>
												</td>
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                    </table>
													</div>


													<div class="tab-pane fade active show" id="Today">
															 <table id="example4" class="display" style="min-width: 945px;font-size:5px !important;">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Registered On</th>  
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($tstudents as $ts)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$ts->name}}</td>
                                                 
                                                <td>{{$ts->mobile}}</td>
                                                <td>{{date("d-M-Y", strtotime($ts->created_at))}}</td>
                                                
                                                <td>

													<div class="dropdown ms-auto text-end">
														<div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
															<svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-end">
															<a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/administrator/student-details/{{encrypt($ts->id)}}'">Profile</a>
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/administrator/chats/{{encrypt($ts->id)}}'">Chats</a>
															
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
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

	@endsection
		
		