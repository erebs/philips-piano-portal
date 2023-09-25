@extends('layouts.Admin')
@section('title') Slotes @endsection
@section('head1') Offline Slotes @endsection
  
@section('contents')

<!-- *************************************** -->
<div class="modal" id="block" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#000;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;color: white;">Edit slote</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('block').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">

          <label>Slote</label>
          <input type="time" class="form-control" id="slote1">
          <label>Limit</label>
          <input type="number" class="form-control" id="limit1">
          <label>Status</label>
          <select class="form-control" id="status1">
              <option value="Active">Active</option>
              <option value="Blocked">Blocked</option>
          </select>
         
          <input type="hidden" id="buid">

      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn" id="ab5" onclick="EditSlote()" style="background-color: #000;color: white;">Submit</button>
         <button type="button"  class="btn" id="ab6" disabled="" style="background-color: #000;color: white;"> <i class="fa fa-spinner fa-spin"></i>  Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- *************************************** -->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    
                        <div class="row">
                        <div class="col-lg-3">
                        <select class="form-control" id="day">
                            <option value="">Choose Day</option>
                            <option value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <input type="time" class="form-control" placeholder="Enter Limit" id="slote">
                    </div>
                    <div class="col-lg-3">
                        <input type="number" class="form-control" placeholder="Enter Limit" id="limit">
                    </div>
                    <div class="col-lg-3">
                    <button type="button" class="btn btn-primary" onclick="Save()" id="ab1">Add Slote</button>
                    <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Add Slote</button>
                </div>
                </div>
                    
                </div>
                <!-- row -->

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
                                                <th><strong>Actions</strong></th>
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
                                                <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                               </td>
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.location.href='/administrator/student-slotes/{{encrypt($s->id)}}'"><i class="fa fa-users"></i></span>
                                                   <span class="badge light badge-warning" style="cursor:pointer;" onclick="Edit('{{$s->id}}','{{$s->slote}}','{{$s->slote_limit}}','{{$s->status}}')"><i class="fa fa-edit"></i></span>
                                                   <span class="badge light badge-danger" style="cursor:pointer;" onclick="Delete('{{$s->id}}')"><i class="fa fa-trash"></i></span>
                                                   
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
                                                <th><strong>Actions</strong></th>
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
                                                <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                               </td>
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.location.href='/administrator/student-slotes/{{encrypt($s->id)}}'"><i class="fa fa-users"></i></span>
                                                   <span class="badge light badge-warning" style="cursor:pointer;" onclick="Edit('{{$s->id}}','{{$s->slote}}','{{$s->slote_limit}}','{{$s->status}}')"><i class="fa fa-edit"></i></span>
                                                   <span class="badge light badge-danger" style="cursor:pointer;" onclick="Delete('{{$s->id}}')"><i class="fa fa-trash"></i></span>
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
                                                <th><strong>Actions</strong></th>
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
                                                <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                               </td>
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.location.href='/administrator/student-slotes/{{encrypt($s->id)}}'"><i class="fa fa-users"></i></span>
                                                    <span class="badge light badge-warning" style="cursor:pointer;" onclick="Edit('{{$s->id}}','{{$s->slote}}','{{$s->slote_limit}}','{{$s->status}}')"><i class="fa fa-edit"></i></span>
                                                   <span class="badge light badge-danger" style="cursor:pointer;" onclick="Delete('{{$s->id}}')"><i class="fa fa-trash"></i></span>
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
                                                <th><strong>Actions</strong></th>
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
                                                <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                               </td>
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.location.href='/administrator/student-slotes/{{encrypt($s->id)}}'"><i class="fa fa-users"></i></span>
                                                    <span class="badge light badge-warning" style="cursor:pointer;" onclick="Edit('{{$s->id}}','{{$s->slote}}','{{$s->slote_limit}}','{{$s->status}}')"><i class="fa fa-edit"></i></span>
                                                   <span class="badge light badge-danger" style="cursor:pointer;" onclick="Delete('{{$s->id}}')"><i class="fa fa-trash"></i></span>
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
                                                <th><strong>Actions</strong></th>
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
                                                <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                               </td>
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.location.href='/administrator/student-slotes/{{encrypt($s->id)}}'"><i class="fa fa-users"></i></span>
                                                    <span class="badge light badge-warning" style="cursor:pointer;" onclick="Edit('{{$s->id}}','{{$s->slote}}','{{$s->slote_limit}}','{{$s->status}}')"><i class="fa fa-edit"></i></span>
                                                   <span class="badge light badge-danger" style="cursor:pointer;" onclick="Delete('{{$s->id}}')"><i class="fa fa-trash"></i></span>
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
                                                <th><strong>Actions</strong></th>
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
                                                <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                               </td>
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.location.href='/administrator/student-slotes/{{encrypt($s->id)}}'"><i class="fa fa-users"></i></span>
                                                     <span class="badge light badge-warning" style="cursor:pointer;" onclick="Edit('{{$s->id}}','{{$s->slote}}','{{$s->slote_limit}}','{{$s->status}}')"><i class="fa fa-edit"></i></span>
                                                   <span class="badge light badge-danger" style="cursor:pointer;" onclick="Delete('{{$s->id}}')"><i class="fa fa-trash"></i></span>
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
                                                <th><strong>Actions</strong></th>
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
                                                <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-curdates/{{encrypt($s->id)}}/{{$s->day}}', '_blank')">{{date('M')}}</span>
                                                  
                                                   <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.open('/administrator/offlineslote-alldates/{{encrypt($s->id)}}', '_blank')">History</span>
                                               </td>
                                                <td>
                                                    <span class="badge light badge-primary" style="cursor:pointer;" onclick="window.location.href='/administrator/student-slotes/{{encrypt($s->id)}}'"><i class="fa fa-users"></i></span>
                                                     <span class="badge light badge-warning" style="cursor:pointer;" onclick="Edit('{{$s->id}}','{{$s->slote}}','{{$s->slote_limit}}','{{$s->status}}')"><i class="fa fa-edit"></i></span>
                                                   <span class="badge light badge-danger" style="cursor:pointer;" onclick="Delete('{{$s->id}}')"><i class="fa fa-trash"></i></span>
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

        <script type="text/javascript">

    function Edit(id,slote,limit,status)
    {
    
        var modal1 = document.getElementById("block");
        modal1.style.display = "block";
        $('#buid').val(id);
        $('#slote1').val(slote);
        $('#limit1').val(limit);
        $('#status1').val(status);

}    


 function EditSlote()
{
     
 var slote1=$('input#slote1').val();
    if(slote1=='')
    {
        $('#slote1').focus();
        $('#slote1').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#slote1').css({'border':'1px solid #CCC'});
    var limit1=$('input#limit1').val();
    if(limit1=='')
    {
        $('#limit1').focus();
        $('#limit1').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#limit1').css({'border':'1px solid #CCC'});

var status1=$('#status1 option:selected').val();
var buid=$('input#buid').val();


       $('#ab5').hide();
       $('#ab6').show();
    
          data = new FormData();

   data.append('slote1', slote1);
   data.append('limit1', limit1);
   data.append('status1', status1);
   data.append('buid', buid);
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/offlineslote-edit",
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
              text: "Slote updated successfully",
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

     else
  {
        $('#ab2').hide();
        $('#ab1').show();
                   Toastify({
              text: "Plan name already exists",
              duration: 3000,
              newWindow: true,
              // close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, red, red)",
              },
              callback: function () {
              },
            }).showToast();
  }


}




})



}       

 
 function Save()
{
     var day=$('#day option:selected').val();
    if(day=='')
    {
        $('#day').focus();
        $('#day').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#day').css({'border':'1px solid #CCC'});
 var slote=$('input#slote').val();
    if(slote=='')
    {
        $('#slote').focus();
        $('#slote').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#slote').css({'border':'1px solid #CCC'});
    var limit=$('input#limit').val();
    if(limit=='')
    {
        $('#limit').focus();
        $('#limit').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#limit').css({'border':'1px solid #CCC'});




       $('#ab1').hide();
       $('#ab2').show();
    
          data = new FormData();


   data.append('day', day);
   data.append('slote', slote);
   data.append('limit', limit);
   data.append('branch', '{{$branch}}');
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/offlineslote-add",
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
              text: "Slote added successfully",
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

     else
  {
        $('#ab2').hide();
        $('#ab1').show();
                   Toastify({
              text: "Plan name already exists",
              duration: 3000,
              newWindow: true,
              // close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, red, red)",
              },
              callback: function () {
              },
            }).showToast();
  }


}




})



}


 function Delete(val)
    {
    
  
 swal({
  title: "Do you want to delete this slote ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/administrator/delete-offlineslote',
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
                          text: "Slote deleted successfully",
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
                            window.location.href=window.location.href
                          },
                        }).showToast();

                     
                    }
                    else
                    {
                       Toastify({
                          text: "Slote deletion failed",
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
                            //window.location.href=window.location.href
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