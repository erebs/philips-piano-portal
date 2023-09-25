@extends('layouts.Teacher')
@section('title')
 Branches
  @endsection
  @section('head1') Branches @endsection 
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
                                                <th>Branch</th>
                                                <th>Status</th>
                                                <th>Slotes</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($branch as $b)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$b->branch}}</td>
                                                @if($b->status=='Active')
                                                <td><span class="badge light badge-success">{{$b->status}}</span></td>
                                                @else
                                                <td><span class="badge light badge-danger">{{$b->status}}</span></td>
                                                @endif
                                                <td><span class="badge light badge-primary" style="cursor:pointer;" onclick="window.location.href='/teacher/offline-slotes/{{encrypt($b->id)}}'">Slotes</span></td>
                                                
                                               
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Branch</th>
                                                <th>Status</th>
                                                <th>Slotes</th>
                                                
                                            </tr>
                                        </tfoot>
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