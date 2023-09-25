<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    
    <!-- PAGE TITLE HERE -->
    <title>Teacher | @yield('title')</title>
    
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{asset('/admin/images/login.png')}}">
    <link href="{{asset('/admin/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/admin/vendor/nouislider/nouislider.min.css')}}">
    <link href="{{asset('/admin/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    
    <!-- Style css -->
    <link href="{{asset('/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/css/style1.css')}}" rel="stylesheet">
    
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            
            <a href="/teacher/dashboard" class="brand-logo">
                <img src="{{asset('/admin/images/login.png')}}" style="width: 70%;">
            </a>
            <div class="brand-title">
                    <h2 class="">Fillow.</h2>
                    <span class="brand-sub-title">@soengsouy</span>
                </div>

            
        
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
        
        <!--**********************************
            Chat box start
        ***********************************-->
        <div class="chatbox">
            <div class="chatbox-close"></div>
            <div class="custom-tab-1">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
                    </li>
                </ul>
                
            </div>
        </div>
        <!--**********************************
            Chat box End
        ***********************************-->
        
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                @yield('head1')
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item d-flex align-items-center">
                                <div class="input-group search-area">
                                    <input type="text" class="form-control" placeholder="Search here...">
                                    <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                                </div>
                            </li>

                            
                            <li class="nav-item dropdown  header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ asset('admin/img/'.Auth::guard('teacher')->user()->profile_image)}}" width="56" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="/teacher/edit-profile" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    {{-- <a href="email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ms-2">Inbox </span>
                                    </a> --}}
                                    <a href="/teacher/logout" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <!-- <li><a class="has-arrow active " href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="index.html">Dashboard Light</a></li>
                            <li><a href="index-2.html">Dashboard Dark</a></li>
                            <li><a href="project-page.html">Project</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="kanban.html">Kanban</a></li>
                            <li><a href="calendar-page.html">Calendar</a></li>
                            <li><a href="message.html">Messages</a></li>    
                        </ul>

                    </li> -->
                     <li><a href="/teacher/dashboard" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-025-dashboard"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                    
                    <!-- <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-calendar"></i>
                            <span class="nav-text">Slotes</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/teacher/online-slotes">Online</a></li>
                            <li><a href="/teacher/offline-branches">Offline</a></li>
                        </ul>
                    </li> -->

                    <li><a href="/teacher/online-slotes" class="ai-icon" aria-expanded="false">
                        <i class="far fa-calendar-alt"></i>
                        <span class="nav-text">Online Slotes</span>
                    </a>
                </li>
                <li><a href="/teacher/offline-branches" class="ai-icon" aria-expanded="false">
                        <i class="fas fa-calendar-alt"></i>
                        <span class="nav-text">Offline Slotes</span>
                    </a>
                </li>
                    
                    
                    <li><a href="/teacher/change-password" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-key"></i>
                        <span class="nav-text">Change password</span>
                    </a>
                </li>

                <li><a href="/teacher/logout" class="ai-icon" aria-expanded="false">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-text">Logout</span>
                    </a>
                </li>

                   
                    
                    
                </ul>
                
                
                <div class="copyright">
                    <p><strong>Philips Piano Accademy</strong> © 2023 All Rights Reserved</p>
                    {{-- <p class="fs-12">Made with <span class="heart"></span> by ERE Business Solutions Pvt.Ltd</p> --}}
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
    
    




 @yield('contents')









        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
    
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="" target="_blank">Arun</a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    


  </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
 <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
 <script src="{{asset('/admin/vendor/global/global.min.js') }}"></script>
    <script src="{{asset('/admin/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- <script src="{{asset('/admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script> -->
    
    <!-- Apex Chart -->
    <!-- <script src="{{asset('/admin/vendor/apexchart/apexchart.js') }}"></script>
    
    <script src="{{asset('/admin/vendor/chart.js/Chart.bundle.min.js') }}"></script> --> 
    
    <!-- Chart piety plugin files -->
     <!-- <script src="{{asset('/admin/vendor/peity/jquery.peity.min.js') }}"></script> -->
    <!-- Dashboard 1 -->
    <script src="{{asset('/admin/js/dashboard/dashboard-1.js') }}"></script>
    
    <script src="{{asset('/admin/vendor/owl-carousel/owl.carousel.js') }}"></script>
    
    <script src="{{asset('/admin/js/custom.min.js') }}"></script>
    <script src="{{asset('/admin/js/dlabnav-init.js') }}"></script>
    <!-- <script src="{{asset('/admin/js/demo.js') }}"></script>
    <script src="{{asset('/admin/js/styleSwitcher.js') }}"></script> -->


    <script src="{{asset('/admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/admin/js/plugins-init/datatables.init.js')}}"></script>



  <script src="{{asset('/admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{ asset('js/sweetalert.js') }}"></script>

  
</body>
</html>

<script type="text/javascript">
     $('#a2').hide();
     $('#ab2').hide();
     $('#ab4').hide();
     $('#ab6').hide();
       $('#ab8').hide();
     $('#submitButton1').hide();
 $('#desc').ckeditor();
$('#msgtext').focus(); 
    

</script>

<script>
    // Wait for the DOM to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Select the textarea element by its ID
        var textarea = document.getElementById("msgtext");

        // Set the focus on the textarea
        textarea.focus();
    });
</script>
