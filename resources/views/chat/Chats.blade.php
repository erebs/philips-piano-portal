@extends('layouts.Admin')
@section('title')
 Chats
  @endsection
  @section('head1')  Chats @endsection 
@section('contents')

<style type="text/css">
    

#messages-main {
    position: relative;
    margin: 0 auto;
    overflow: hidden;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
#messages-main:after, #messages-main:before {
    content: " ";
    display: table;
}
#messages-main .ms-menu {
    position: absolute;
    left: 0;
    top: 0;
    border-right: 1px solid #eee;
    padding-bottom: 50px;
    height: 100%;
    width: 240px;
    background: #fff;
}
@media (min-width:768px) {
    #messages-main .ms-body {
    padding-left: 0px;
    overflow: auto;
    max-height: 500px;
}
}@media (max-width:767px) {
    #messages-main .ms-menu {
   overflow: auto;
    max-height: 500px;
    display: none;
    z-index: 1;
    top: 58px;
}
#messages-main .ms-menu.toggled {
    display: block;
}
#messages-main .ms-body {
    overflow: auto;
}
}
#messages-main .ms-user {
    padding: 15px;
    background: #f8f8f8;
}
#messages-main .ms-user>div {
    overflow: hidden;
    padding: 3px 5px 0 15px;
    font-size: 11px;
}
#messages-main #ms-compose {
    position: fixed;
    bottom: 120px;
    z-index: 1;
    right: 30px;
    box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
}
#ms-menu-trigger {
    user-select: none;
    position: absolute;
    left: 0;
    top: 0;
    width: 50px;
    height: 100%;
    padding-right: 10px;
    padding-top: 19px;
}
#ms-menu-trigger i {
    font-size: 21px;
}
#ms-menu-trigger.toggled i:before {
    content: '\f2ea'
}
.fc-toolbar:before, .login-content:after {
    content: ""
}
.message-feed {
    padding: 20px;
}
#footer, .fc-toolbar .ui-button, .fileinput .thumbnail, .four-zero, .four-zero footer>a, .ie-warning, .login-content, .login-navigation, .pt-inner, .pt-inner .pti-footer>a {
    text-align: center;
}
.message-feed.right>.pull-right {
    margin-left: 15px;
}
.message-feed:not(.right) .mf-content {
    background: #03a9f4;
    color: #fff;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
.message-feed.right .mf-content {
    background: #eee;
}
.mf-content {
    padding: 12px 17px 13px;
    border-radius: 40px;
    display: inline-block;
    max-width: 80%
}
.mf-date {
    display: block;
    color: #B3B3B3;
    margin-top: 7px;
    margin-left: auto;
    margin-right: auto;
}
.mf-date>i {
    font-size: 14px;
    line-height: 100%;
    position: relative;
    top: 1px;
}
.msb-reply {
    box-shadow: 0 -20px 20px -5px #fff;
    position: relative;
    margin-top: 30px;
    border-top: 1px solid #eee;
    background: #f8f8f8;
}
.four-zero, .lc-block {
    box-shadow: 0 1px 11px rgba(0, 0, 0, .27);
}
.msb-reply textarea {
    width: 90%;
    font-size: 15px;
    border: 0;
    padding: 10px 15px;
    resize: none;
    height: 60px;
    background: #fff;
}
.msb-reply button {
    position: absolute;
    top: 0;
    right: 0;
    border: 0;
    height: 100%;
    width: 10%;
    font-size: 25px;
    color: #fff;
    background:#000;
}
.msb-reply button:hover {
    background: #f2f2f2;

}
.img-avatar {
    height: 37px;
    border-radius: 50%;
    width: 37px;
}
.list-group.lg-alt .list-group-item {
    border: 0;
}
.p-15 {
    padding: 15px!important;
}
.btn:not(.btn-alt) {
    border: 0;
}
.action-header {
    position: relative;
    background: #f8f8f8;
    padding: 15px 13px 15px 17px;
}
.ah-actions {
    z-index: 3;
    float: right;
    margin-top: 7px;
    position: relative;
}
.actions {
    list-style: none;
    padding: 0;
    margin: 0;
}
.actions>li {
    display: inline-block;
}

.actions:not(.a-alt)>li>a>i {
    color: #939393;
}
.actions>li>a>i {
    font-size: 20px;
}
.actions>li>a {
    display: block;
    padding: 0 10px;
}
.ms-body{
    background:#fff;    
}
#ms-menu-trigger {
    user-select: none;
    position: absolute;
    left: 0;
    top: 0;
    width: 50px;
    height: 100%;
    padding-right: 10px;
    padding-top: 19px;
    cursor:pointer;
}
#ms-menu-trigger, .message-feed.right {
    text-align: right;
}
#ms-menu-trigger, .toggle-switch {
    -webkit-user-select: none;
    -moz-user-select: none;
}
</style>



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <div class="row">

                    
					<div class="col-12">
                        
                               
<div class="container bootstrap snippets bootdey">
    <div class="tile tile-alt" id="messages-main">


        
        
        <div class="ms-body">
            <div class="action-header clearfix" style="background-color:#000;border-radius: 5px;">
                
                
                <div class="pull-left hidden-xs">
                    <!-- <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" class="img-avatar m-r-10"> -->
                    <!-- <div class="lv-avatar pull-left">
                        
                    </div> -->
                    <center>
                    <h5 style="color: white;">Name : {{$stddet->name}}</h5>
                    <h5 style="color: white;">Mobile : {{$stddet->mobile}}</h5>
                    </center>
                </div>
                 
            </div>

            <div id="msgarea">
            @foreach($chats as $c)
            
            @if($c->sender!='Admin')
            <div class="message-feed media">
            <div class="pull-left" style="margin-right: 10px;">
                <!-- <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="img-avatar" style="border-radius: 100px;"> -->
                <!-- <span class="img-avatar" style="background-color:#000;color: white;height: 37px;
    border-radius: 50%;
    width: 37px;">A</span> -->
            </div>
            <div class="media-body">
                <div class="mf-content">
                   {{$c->msg}}
                </div>
                <small class="mf-date"><i class="fa fa-clock-o"></i> {{date("d-m-Y H:i A", strtotime($c->created_at))}} @if($c->status=='Deleted') <span style="color:red">Deleted</span> @endif</small>
            </div>
            </div>
            @else

            
            <div class="message-feed right">
            <div class="media">
                <div class="media-body">
                    <div class="mf-content">
                        {{$c->msg}}
                    </div>
                    <small class="mf-date"><i class="fa fa-clock-o"></i> {{date("d-m-Y H:i A", strtotime($c->created_at))}}</small>
                </div>
                <div class="pull-right" style="margin-left: 10px;">
                    <!-- <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" class="img-avatar" style="border-radius: 100px;"> -->
                    <span class="img-avatar" style="cursor: pointer;" onclick="Delete('{{$c->id}}')"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        </div>


            
            <div class="msb-reply">
                <textarea placeholder="What's on your mind..." id="msgtext"></textarea>
                <center>
                    <button onclick="Send()"><i class="fa fa-paper-plane"></i></button>
                </center>
                
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

     $(document).keypress(function(event){
    
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        Send();    
    }
    
});

function GetMsg()

            {
                var stdid='{{$stdid}}';
                 $.post("/administrator/all-chats", {stdid: stdid,_token: "{{ csrf_token() }}"}, function(result) {

                  $('#msgarea').html(result);
                  $('#msgtext').val('');
                  
                    var textarea = document.getElementById("msgtext");
                    textarea.focus();
                            
                });
            }

function GetMsg1()

            {
                var stdid='{{$stdid}}';
                 $.post("/administrator/all-chats", {stdid: stdid,_token: "{{ csrf_token() }}"}, function(result) {

                  $('#msgarea').html(result);
                            
                });
            }            


       function Send()
    {
    
    var msgtext=$('#msgtext').val();
    if(msgtext=='')
    {
        $('#msgtext').focus();
        $('#msgtext').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#msgtext').css({'border':'1px solid #CCC'});

var stdid='{{$stdid}}';

$.ajax({

              type:"POST",
              url:'/administrator/send-msg',
              data: {
        _token: @json(csrf_token()),
        msgtext: msgtext,
        stdid:stdid
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       
                            GetMsg();
                        
                    }
                  
                
            }
       })



} 


function Delete(val)
    {
    
  
 swal({
  title: "Do you want to delete this message ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/administrator/delete-msg',
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
                       
                        GetMsg1();
                     
                    }
                  
                
            }
       })

 } 
  
});

} 

</script>
@endsection