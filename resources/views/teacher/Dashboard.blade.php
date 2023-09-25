
@extends('layouts.Teacher')
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
													<h2>Online Slotes</h2>
													<span><i class="far fa-calendar-alt" style="font-size:70px;"></i> </span>													 
												</div>
												<div class="col-xl-5 col-sm-6">
													<a href="/teacher/online-slotes" class="btn btn-rounded  fs-18 font-w500">View Slotes</a>
												</div>
											</div>
										</div>
									</div>
								</div>								
							</div>

							<div class="col-xl-6">
								<div class="row">
									<div class="col-xl-12">
										<div class="card tryal-gradient">
											<div class="card-body tryal row">
												<div class="col-xl-7 col-sm-6">
													<h2>Offline Slotes</h2>
													<span><i class="fas fa-calendar-alt" style="font-size:70px;"></i></span>													 
												</div>
												<div class="col-xl-5 col-sm-6">
													<a href="/teacher/offline-branches" class="btn btn-rounded  fs-18 font-w500">View Slotes</a>
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

	@endsection
		
		