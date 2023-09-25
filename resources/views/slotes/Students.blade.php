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
                            <!-- <div class="card-header">
                                <h4 class="card-title">Active Pharmacists</h4>
                            </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <!-- <th>Valid From</th> -->
                                                <th>Valid To</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($students as $s)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$s->name}}</td>
                                                <td>{{$s->mobile}}</td>
                                                <!-- <td>{{$s->valid_from}}</td> -->
                                                <td>{{date("d-M-Y", strtotime($s->valid_to))}}</td>
                                                @if($s->approval=='Approved')
                                                <td><span class="badge light badge-success">{{$s->status}}</span></td>
                                                @else
                                                <td><span class="badge light badge-danger">{{$s->status}}</span></td>
                                                @endif
                                                
                                                <td>
													<div class="dropdown ms-auto text-end">
                                                        <div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
                                                            <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" target="_blank" href="/administrator/student-details/{{encrypt($s->id)}}">view</a>
                                                            <a class="dropdown-item" target="_blank" href="/administrator/chats/{{encrypt($s->id)}}">Chats</a>
                                                            
                                                        </div>
                                                    </div>
												</td>
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <!-- <th>Valid From</th> -->
                                                <th>Valid To</th>
                                                <th>Status</th>
                                                <th>Action</th>
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

 <script type="text/javascript">

      function Edit(id,name,status)
    {
    
        var modal1 = document.getElementById("block");
        modal1.style.display = "block";
        $('#buid').val(id);
        $('#bname').val(name);
        $('#status').val(status);

} 


function EditBranch()
{
     
 var bname=$('input#bname').val();
    if(bname=='')
    {
        $('#bname').focus();
        $('#bname').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#bname').css({'border':'1px solid #CCC'});

var status=$('#status option:selected').val();
var buid=$('input#buid').val();


       $('#ab5').hide();
       $('#ab6').show();
    
          data = new FormData();

   data.append('bname', bname);
   data.append('status', status);
   data.append('buid', buid);
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/branch-edit",
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
              text: "Branch updated successfully",
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
              text: "Branch already exists",
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


     function AddBranch()
{
     
 var branch=$('input#branch').val();
    if(branch=='')
    {
        $('#branch').focus();
        $('#branch').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#branch').css({'border':'1px solid #CCC'});

       $('#ab1').hide();
       $('#ab2').show();
    
          data = new FormData();


   data.append('branch', branch);
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/branch-add",
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
              text: "Branch added successfully",
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
              text: "Branch already exists",
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
  title: "Do you want to delete this plan ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/administrator/delete-plan',
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
                          text: "Plan deleted successfully",
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
                  
                
            }
       })

 } 
  
});

} 

   </script>


@endsection