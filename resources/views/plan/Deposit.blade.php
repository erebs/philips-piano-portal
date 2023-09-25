@extends('layouts.Admin')
@section('title')
 Other Fees
  @endsection
  @section('head1')  Other Fees @endsection 
@section('contents')


<!-- *************************************** -->
<div class="modal" id="block" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#000;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;color: white;">Edit Fee</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('block').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">

          <label>Amount</label>
          <input type="number" class="form-control" id="amt">
          <input type="hidden" id="buid">

      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn" id="ab5" onclick="EditAmount()" style="background-color: #000;color: white;">Submit</button>
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
                                                <th>Type</th>
                                                <th>Fee</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($deposit as $d)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$d->type}}</td>
                                                <td>Rs.{{$d->fee}}</td>
                                                
                                                <td>
                                                    <span class="badge light badge-warning" style="cursor:pointer;" onclick="Edit('{{$d->id}}','{{$d->fee}}')"><i class="fa fa-edit"></i></span>
												</td>
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Type</th>
                                                <th>Fee</th>
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

        function Edit(id,amt)
    {
    
        var modal1 = document.getElementById("block");
        modal1.style.display = "block";
        $('#buid').val(id);
        $('#amt').val(amt);

    }

     function EditAmount()
{
     
 var amt=$('input#amt').val();
    if(amt=='')
    {
        $('#amt').focus();
        $('#amt').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#amt').css({'border':'1px solid #CCC'});

var buid=$('input#buid').val();


       $('#ab5').hide();
       $('#ab6').show();
    
          data = new FormData();

   data.append('amt', amt);
   data.append('buid', buid);
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/deposit-edit",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
  if(data['success'])
  {
    $('#ab6').hide();
    $('#ab5').show();
            Toastify({
              text: "Fee updated successfully",
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

   </script>


@endsection