@extends('layouts.Admin')
@section('title') Videos @endsection
@section('head1') Add Video @endsection
  
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
                                <h4 class="card-title">Add Video</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                 
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Title
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
														<input type="text" class="form-control" placeholder="Enter title" id="name">
														
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Video Url
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" placeholder="Enter video url" id="url">
                                                        
                                                    </div>
                                                </div>
 
                                            </div>
                                            <div class="col-xl-12">

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Description
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        
                                                        <textarea class="form-control ckeditor" id="desc" rows="10" cols="10"></textarea>
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


 function Save()
{
    var name=$('input#name').val();
    if(name=='')
    {
        $('#name').focus();
        $('#name').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#name').css({'border':'1px solid #CCC'});

    var url=$('input#url').val();
    if(url=='')
    {
        $('#url').focus();
        $('#url').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#url').css({'border':'1px solid #CCC'});

var desc=CKEDITOR.instances.desc.getData();
      $('#ab1').hide();
      $('#ab2').show();
    
          data = new FormData();
   data.append('name', name);
   data.append('url', url);
   data.append('desc', desc);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/video-add",
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
              text: "Video added successfully",
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




}




})



}




</script>


@endsection