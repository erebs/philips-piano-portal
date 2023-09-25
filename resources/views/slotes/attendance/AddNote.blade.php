@extends('layouts.Admin')
@section('title') Note @endsection
@section('head1') Add Note @endsection
  
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
                                <h4 class="card-title">Add Note</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="">
                                        <div class="row">
                                            

                                             <div class="col-xl-12">

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Note
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        
                                                        <textarea class="form-control ckeditor" id="desc" rows="10" cols="10">{{$note->note}}</textarea>
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
  
     var desc=CKEDITOR.instances.desc.getData();
        if(desc=='')
        {

            Toastify({
              text: "Please add note",
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
   data.append('aid', '{{$note->id}}');
   data.append('desc', desc);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/note-add",
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
              text: "Note added successfully",
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
              //window.location.href=window.location.href;
              },
            }).showToast();
                            
  }




}




})



}



</script>


@endsection