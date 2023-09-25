@extends('layouts.Admin')
@section('title') Blogs @endsection
@section('head1') Add Blog @endsection
  
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
                                <h4 class="card-title">Add Blog</h4>
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
                                                    <div class="col-lg-6">
														<input type="text" class="form-control" placeholder="Enter name" id="name">
														
                                                    </div>
                                                </div>
 
                                            </div>

                                            <div class="col-xl-6">

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Photo
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="file" id="pdf_file" onchange="Chkformat()" class="form-control" style="color: black;padding: 1em;background: #ececec;">
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>

                                             <div class="col-xl-12">

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Description
                                                        <span class="text-danger">*</span>
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


    var ls=$('input#pdf_file').val();
    if(ls=='')
    {
            Toastify({
              text: "Please upload a photo",
              duration: 2000,
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
        return false;
    }
    else

     var desc=CKEDITOR.instances.desc.getData();
        if(desc=='')
        {

            Toastify({
              text: "Please add description",
              duration: 2000,
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
            return false;
        }
        else
  
  

      $('#ab1').hide();
      $('#ab2').show();
    
          data = new FormData();
   data.append('name', name);
  data.append('img', $('#pdf_file')[0].files[0]);
   data.append('desc', desc);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/blog-add",
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
              text: "Blog added successfully",
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



function Chkformat()
{
                  var name = document.getElementById("pdf_file").files[0].name;
  //alert(name)
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  //if(jQuery.inArray(ext, ['gif','png','jpg','jpeg','pdf']) == -1)
  if(jQuery.inArray(ext, ['pdf','png','jpg','jpeg']) == -1)

  {

               Toastify({
              text: "Invalid file format ! Upload JPEG/PNG file",
              duration: 2000,
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

   $('input#pdf_file').val("");
   return false;
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("pdf_file").files[0]);
  var f = document.getElementById("pdf_file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 500000)
  {

                  Toastify({
              text: "Maximum file size is 500kb",
              duration: 2000,
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
   $('input#pdf_file').val("");
   return false;
  }

  
  }

</script>


@endsection