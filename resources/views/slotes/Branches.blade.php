@extends('layouts.Admin')
@section('title')
 Branches
  @endsection
  @section('head1') Branches @endsection 
@section('contents')

<!-- *************************************** -->
<div class="modal" id="block" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#000;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;color: white;">Edit Branch</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('block').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">

          <label>Branch</label>
          <input type="text" class="form-control" id="bname">
          <label>Status</label>
          <select class="form-control" id="status">
              <option value="Active">Active</option>
              <option value="Blocked">Blocked</option>
          </select>
         
          <input type="hidden" id="buid">

      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn" id="ab5" onclick="EditBranch()" style="background-color: #000;color: white;">Submit</button>
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
                       
                    <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Enter Branch Name" id="branch">
                    </div>
                    
                    <div class="col-lg-4">
                    <button type="button" class="btn btn-primary" onclick="AddBranch()" id="ab1">Add Branch</button>
                    <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Add Slote</button>
                </div>
                </div>
                    
                </div>
				
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
                                                <th>Action</th>
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
                                                <td><span class="badge light badge-primary" style="cursor:pointer;" onclick="window.location.href='/administrator/offline-slotes/{{encrypt($b->id)}}'">Slotes</span></td>
                                                
                                                <td>

													<div class="dropdown ms-auto text-end">
														<div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
															<svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-end">
															<a class="dropdown-item" style="cursor: pointer;" onclick="Edit('{{$b->id}}','{{$b->branch}}','{{$b->status}}')">Edit</a>
															<!-- <a class="dropdown-item" style="cursor: pointer;" onclick="Delete('{{$b->id}}')">Delete</a> -->
														</div>
													</div>
												</td>
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Branch</th>
                                                <th>Status</th>
                                                <th>Slotes</th>
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