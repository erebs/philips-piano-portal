@extends('layouts.Teacher')
@section('title') Slotes @endsection
@section('head1') Offline Slotes @endsection
  
@section('contents')



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                

                <div class="row">


                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sunday</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <!-- <th><strong>Sl.No</strong></th> -->
                                                <th><strong>Slote</strong></th>
                                                <th><strong>Limit</strong></th>
                                                <th><strong>Status</strong></th>
                                                <th><strong>Attendance</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($slote as $s)
                                            @if($s->day=='Sunday')
                                            <tr>
                                                <!-- <td><strong>{{$loop->iteration}}</strong></td> -->
                                                <td>{{date("g:i A", strtotime($s->slote))}}</td>
                                                <td>{{$s->slote_limit}}</td>
                                                @if($s->status=='Active')
                                                <td><span class="badge light badge-success">{{$s->status}}</span></td>
                                                @else
                                                <td><span class="badge light badge-danger">{{$s->status}}</span></td>
                                                @endif
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                                   
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Monday</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <!-- <th><strong>Sl.No</strong></th> -->
                                                <th><strong>Slote</strong></th>
                                                <th><strong>Limit</strong></th>
                                                <th><strong>Status</strong></th>
                                                <th><strong>Attendance</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($slote as $s)
                                            @if($s->day=='Monday')
                                            <tr>
                                                <!-- <td><strong>{{$loop->iteration}}</strong></td> -->
                                                <td>{{date("g:i A", strtotime($s->slote))}}</td>
                                                <td>{{$s->slote_limit}}</td>
                                                @if($s->status=='Active')
                                                <td><span class="badge light badge-success">{{$s->status}}</span></td>
                                                @else
                                                <td><span class="badge light badge-danger">{{$s->status}}</span></td>
                                                @endif
                                                <td>
                                                  <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tuesday</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <!-- <th><strong>Sl.No</strong></th> -->
                                                <th><strong>Slote</strong></th>
                                                <th><strong>Limit</strong></th>
                                                <th><strong>Status</strong></th>
                                                <th><strong>Attendance</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($slote as $s)
                                            @if($s->day=='Tuesday')
                                            <tr>
                                                <!-- <td><strong>{{$loop->iteration}}</strong></td> -->
                                                <td>{{date("g:i A", strtotime($s->slote))}}</td>
                                                <td>{{$s->slote_limit}}</td>
                                                @if($s->status=='Active')
                                                <td><span class="badge light badge-success">{{$s->status}}</span></td>
                                                @else
                                                <td><span class="badge light badge-danger">{{$s->status}}</span></td>
                                                @endif
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Wednesday</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <!-- <th><strong>Sl.No</strong></th> -->
                                                <th><strong>Slote</strong></th>
                                                <th><strong>Limit</strong></th>
                                                <th><strong>Status</strong></th>
                                                <th><strong>Attendance</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($slote as $s)
                                            @if($s->day=='Wednesday')
                                            <tr>
                                                <!-- <td><strong>{{$loop->iteration}}</strong></td> -->
                                                <td>{{date("g:i A", strtotime($s->slote))}}</td>
                                                <td>{{$s->slote_limit}}</td>
                                                @if($s->status=='Active')
                                                <td><span class="badge light badge-success">{{$s->status}}</span></td>
                                                @else
                                                <td><span class="badge light badge-danger">{{$s->status}}</span></td>
                                                @endif
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thursday</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <!-- <th><strong>Sl.No</strong></th> -->
                                                <th><strong>Slote</strong></th>
                                                <th><strong>Limit</strong></th>
                                                <th><strong>Status</strong></th>
                                                <th><strong>Attendance</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($slote as $s)
                                            @if($s->day=='Thursday')
                                            <tr>
                                                <!-- <td><strong>{{$loop->iteration}}</strong></td> -->
                                                <td>{{date("g:i A", strtotime($s->slote))}}</td>
                                                <td>{{$s->slote_limit}}</td>
                                                @if($s->status=='Active')
                                                <td><span class="badge light badge-success">{{$s->status}}</span></td>
                                                @else
                                                <td><span class="badge light badge-danger">{{$s->status}}</span></td>
                                                @endif
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Friday</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <!-- <th><strong>Sl.No</strong></th> -->
                                                <th><strong>Slote</strong></th>
                                                <th><strong>Limit</strong></th>
                                                <th><strong>Status</strong></th>
                                                <th><strong>Attendance</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($slote as $s)
                                            @if($s->day=='Friday')
                                            <tr>
                                                <!-- <td><strong>{{$loop->iteration}}</strong></td> -->
                                                <td>{{date("g:i A", strtotime($s->slote))}}</td>
                                                <td>{{$s->slote_limit}}</td>
                                                @if($s->status=='Active')
                                                <td><span class="badge light badge-success">{{$s->status}}</span></td>
                                                @else
                                                <td><span class="badge light badge-danger">{{$s->status}}</span></td>
                                                @endif
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Saturday</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <!-- <th><strong>Sl.No</strong></th> -->
                                                <th><strong>Slote</strong></th>
                                                <th><strong>Limit</strong></th>
                                                <th><strong>Status</strong></th>
                                                <th><strong>Attendance</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($slote as $s)
                                            @if($s->day=='Saturday')
                                            <tr>
                                                <!-- <td><strong>{{$loop->iteration}}</strong></td> -->
                                                <td>{{date("g:i A", strtotime($s->slote))}}</td>
                                                <td>{{$s->slote_limit}}</td>
                                                @if($s->status=='Active')
                                                <td><span class="badge light badge-success">{{$s->status}}</span></td>
                                                @else
                                                <td><span class="badge light badge-danger">{{$s->status}}</span></td>
                                                @endif
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/teacher/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                                </td>
                                            </tr>
                                            @endif
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