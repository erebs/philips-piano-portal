@extends('layouts.Admin')
@section('title')
 Students
  @endsection
  @section('head1') Students @endsection 
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
                                <h4 class="card-title">{{date("d-M-Y", strtotime($dt))}}, {{$slote->day}}, {{date("g:i A", strtotime($slote->slote))}} - Regular</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Attendance</th>  
                                                <th>Action</th>
                                                <th>Added By</th>
                                                <th>Last Updated By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($std as $s)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$s->GetStudent->name}}</td>
                                                <td>{{$s->GetStudent->mobile}}</td>
                                                
                                            
                                                
                                                @if($s->status=='Cancelled')
                                                <td><span class="badge light badge-danger">Cancelled</span>
                                                </td>
                                                <td><span class="badge light badge-danger">Cancelled</span>
                                                </td>
                                                @else
                                                <td>

                                                    <select class="form-control" onchange="ChangeStatus(this.value,'{{$s->id}}')">
                                                        <option value="Present" @if($s->status=='Present') selected @endif>Present</option>
                                                        <option value="Absent" @if($s->status=='Absent') selected @endif>Absent</option>
                                                    </select>


                                                </td>
                                                <td>
                                                    <div class="dropdown ms-auto text-end">
                                                        <div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
                                                            <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" target="_blank" href="/administrator/add-note/{{encrypt($s->id)}}">Notes</a>
                                                           
                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                                @endif
                                                @if($s->added_by=='Admin')
                                                <td>Admin</td>
                                                @else
                                                <td>{{$s->GetTeacher->name}}</td>
                                                @endif
                                                @if($s->updated_by=='Admin')
                                                <td>Admin<br>
                                                    ( {{date("d-M-Y", strtotime($s->updated_at))}} )

                                                </td>
                                                @else
                                                <td>{{$s->GetTeacher1->name}}<br>
                                                    ( {{date("d-M-Y", strtotime($s->updated_at))}} )</td>
                                                @endif
                                                
                                               
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                     <div class="col-12">
                        <div class="card">
                             <div class="card-header">
                                <h4 class="card-title">{{date("d-M-Y", strtotime($dt))}}, {{$slote->day}}, {{date("g:i A", strtotime($slote->slote))}} Credit / Paid</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Class Type</th>
                                                <th>Attendance</th>
                                                <th>Action</th>
                                                <th>Added By</th>
                                                <th>Last Updated By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($credit_class as $cd)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$cd->GetStudent->name}}</td>
                                                <td>{{$cd->GetStudent->mobile}}</td>
                                                
                                                <td>{{$cd->type}}</td>
                                                
                                                @if($cd->status=='Cancelled')
                                                <td><span class="badge light badge-danger">Cancelled</span>
                                                </td>
                                                <td><span class="badge light badge-danger">Cancelled</span>
                                                </td>
                                                @else
                                                <td>

                                                    <select class="form-control" onchange="ChangeExtraStatus(this.value,'{{$cd->id}}')">
                                                        <option value="Present" @if($cd->attendance=='Present') selected @endif>Present</option>
                                                        <option value="Absent" @if($cd->attendance=='Absent') selected @endif>Absent</option>
                                                    </select>


                                                </td>
                                                <td>
                                                    <div class="dropdown ms-auto text-end">
                                                        <div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
                                                            <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" target="_blank" href="/administrator/add-extranote/{{encrypt($cd->id)}}">Notes</a>
                                                           
                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                                @endif
                                                @if($cd->added_by=='Admin' || $cd->added_by=='')
                                                <td>Admin</td>

                                                @else
                                                <td>{{$cd->GetTeacher->name}}</td>
                                                @endif

                                                @if($cd->updated_by=='Admin' || $cd->updated_by=='')
                                                <td>Admin<br>
                                                    ( {{date("d-M-Y", strtotime($cd->updated_at))}} )

                                                </td>
                                                @else
                                                <td>{{$cd->GetTeacher1->name}}<br>
                                                    ( {{date("d-M-Y", strtotime($cd->updated_at))}} )</td>
                                                @endif
                                                
                                               
                                           
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

 function ChangeStatus(status,aid)
    {

    
  
  var status=status;
  var aid=aid;




$.ajax({

              type:"POST",
              url:'/administrator/attendance-status',
              data: {
        _token: @json(csrf_token()),
        status: status,
        aid: aid,
     
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       Toastify({
                          text: "Attendance status changed successfully",
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
                           // window.location.href=window.location.href;
                          },
                        }).showToast();

                     
                    }
                  
                
            }
       })



} 


function ChangeExtraStatus(status,aid)
    {

    
  
  var status=status;
  var aid=aid;




$.ajax({

              type:"POST",
              url:'/administrator/attendance-extrastatus',
              data: {
        _token: @json(csrf_token()),
        status: status,
        aid: aid,
     
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       Toastify({
                          text: "Attendance status changed successfully",
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
                           // window.location.href=window.location.href;
                          },
                        }).showToast();

                     
                    }
                  
                
            }
       })



} 
     
</script>


@endsection