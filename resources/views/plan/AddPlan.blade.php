@extends('layouts.Admin')
@section('title') Subscription Plan @endsection
@section('head1') Add Subscription Plan @endsection
  
@section('contents')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Subscription Plan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                 <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Class Mode
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                       
                                                        <select class="form-control" id="cmode">
                                                            <!-- <option value="">Choose</option> -->
                                                            <option value="Offline">Offline</option>
                                                            <option value="Online">Online</option>
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Plan Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
														<input type="text" class="form-control" placeholder="Enter name" id="name">
														
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Total Months
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                       
                                                        <select class="form-control" id="month" onchange="GetFee(this.value)">
                                                            <option value="">Choose</option>
                                                            <option value="1">1 Month</option>
                                                            <option value="2">2 Month</option>
                                                            <option value="3">3 Month</option>
                                                            <option value="4">4 Month</option>
                                                            <option value="5">5 Month</option>
                                                            <option value="6">6 Month</option>
                                                            <option value="7">7 Month</option>
                                                            <option value="8">8 Month</option>
                                                            <option value="9">9 Month</option>
                                                            <option value="10">10 Month</option>
                                                            <option value="11">11 Month</option>
                                                            <option value="12">12 Month</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                
                                               
                                               
                                               
                                                
                                            </div>

                                            <div class="col-xl-6">

                                                
                                                
                                                
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Actual Fee
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder="Enter Actual Fee" id="actual_fee" value="0" oninput="Fee()">
                                                        
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Offer Fee
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder="Enter Offer Fee" id="offer_fee" value="0">
                                                        
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Monthly Fee
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" value="0" id="installment" readonly>
                                                        
                                                    </div>
                                                </div>
                                                
                                               
                                                
                                            </div>

                                        </div>

                                    </form>

                                </div>
                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                            <button type="button" class="btn btn-primary" onclick="Save()" id="ab1">Submit</button>
                  <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
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

        <script type="text/javascript">

 function GetFee(val)
{
    var afee=$('input#actual_fee').val();
    var fee=parseInt(afee)/parseInt(val);
    $('#installment').val(fee);
}

 function Fee()
{
    var afee=$('input#actual_fee').val();
    var month=$('#month option:selected').val();
    var fee=parseInt(afee)/parseInt(month);
    $('#installment').val(fee);
}


 function Save()
{
     var cmode=$('#cmode option:selected').val();
    if(cmode=='')
    {
        $('#cmode').focus();
        $('#cmode').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#cmode').css({'border':'1px solid #CCC'});
    var name=$('input#name').val();
    if(name=='')
    {
        $('#name').focus();
        $('#name').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#name').css({'border':'1px solid #CCC'});

    var month=$('#month option:selected').val();
    if(month=='')
    {
        $('#month').focus();
        $('#month').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#month').css({'border':'1px solid #CCC'});


    var actual_fee=$('input#actual_fee').val();
    if(actual_fee=='')
    {
        $('#actual_fee').focus();
        $('#actual_fee').css({'border':'1px solid red'});
        return false;
    }
  
    $('#actual_fee').css({'border':'1px solid #CCC'});

    var offer_fee=$('input#offer_fee').val();
    if(offer_fee=='')
    {
        $('#offer_fee').focus();
        $('#offer_fee').css({'border':'1px solid red'});
        return false;
    }    
    else
  
    $('#offer_fee').css({'border':'1px solid #CCC'});

    var installment=$('input#installment').val();
    if(installment=='')
    {
        $('#installment').focus();
        $('#installment').css({'border':'1px solid red'});
        return false;
    }    
    else
  
    $('#installment').css({'border':'1px solid #CCC'});

      $('#ab1').hide();
      $('#ab2').show();
    
          data = new FormData();


   data.append('cmode', cmode);
   data.append('name', name);
   data.append('month', month);
   data.append('actual_fee', actual_fee);
   data.append('offer_fee', offer_fee);
   data.append('installment', installment);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/plan-add",
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
              text: "Plan added successfully",
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
               $('#cmode').val("Offline");
               $('#name').val("");
               $('#month').val("");
               $('#actual_fee').val("");
               $('#offer_fee').val("");
               $('#installment').val("");
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