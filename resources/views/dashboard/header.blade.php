<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Meta -->
        <meta name="description" content="User Dashboards" />
        <meta name="author" content="Zen-bottrd" />
        <link rel="canonical" href="https://www.Zen-bottrd.com/">
        <meta property="og:url" content="https://www.Zen-bottrd.com">
        <meta property="og:title" content="User Dashboard  | Zen-bottrd">
        <meta property="og:description" content="User Dashboard">
        <meta property="og:type" content="Website">
        <meta property="og:site_name" content="Zen-bottrd">
        <link rel="shortcut icon" href="assets/images/favicon.svg" />

        <!-- Title -->
        <title>Zen-bottrd - User Dashboard</title>

        <!-- *************
            ************ Common Css Files *************
        ************ -->
        <!-- Bootstrap css -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

        <!-- Bootstrap font icons css -->
        <link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css" />
        
        <!-- Main css -->
        <link rel="stylesheet" href="assets/css/main.min.css" />

        <!-- *************
            ************ Vendor Css Files *************
        ************ -->

        <!-- Scrollbar CSS -->
        <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />
    </head>

 

    <body>


        <!-- Page wrapper start -->
        <div class="page-wrapper">

            <!-- Page header starts -->
            <div class="page-header">


                <div class="toggle-sidebar" id="toggle-sidebar">
                    <i class="bi bi-list"></i>
                </div>

                <!-- Header actions ccontainer start -->
                <div class="header-actions-container">

                    <!-- Search container start -->
                    <div class="search-container me-4 d-xl-block d-lg-none">

                        <!-- Search input group start -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" />
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <!-- Search input group end -->

                    </div>

                    <!-- Search container end -->

                    <!-- Header actions start -->
                   <!--  <div class="header-actions d-xl-flex d-lg-none gap-4">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-envelope-open fs-5 lh-1"></i>
                                <span class="count-label"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end shadow-lg">
                                <div class="dropdown-item">
                                    <div class="d-flex py-2 border-bottom">
                                        <img src="assets/images/user.png" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
                                        <div class="m-0">
                                            <h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
                                            <p class="mb-1">Membership has been ended.</p>
                                            <p class="small m-0 text-secondary">Today, 07:30pm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="d-flex py-2 border-bottom">
                                        <img src="assets/images/user2.png" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
                                        <div class="m-0">
                                            <h6 class="mb-1 fw-semibold">Benjamin Michiels</h6>
                                            <p class="mb-1">Congratulate, James for new job.</p>
                                            <p class="small m-0 text-secondary">Today, 08:00pm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="d-flex py-2">
                                        <img src="assets/images/user1.png" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
                                        <div class="m-0">
                                            <h6 class="mb-1 fw-semibold">Jehovah Roy</h6>
                                            <p class="mb-1">Lewis added new schedule release.</p>
                                            <p class="small m-0 text-secondary">Today, 09:30pm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mx-3 my-1">
                                    <a href="javascript:void(0)" class="btn btn-primary">View all</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Header actions start -->

                    <!-- Header profile start -->
                    <div class="header-profile d-flex align-items-center">
                        <div class="dropdown">
                            <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                <span class="user-name d-none d-md-block">{{Auth::user()->name}}</span>
                                <span class="avatar">
                                    <!-- <img src="#" alt="#" /> -->
                                    <span class="status online"></span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                                <div class="header-profile-actions">
                                    <a href="{{url('profile')}}">Profile</a>
                                    <a href="{{route('logout')}}">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Header profile end -->

                </div>
                <!-- Header actions ccontainer end -->

            </div>
            <!-- Page header ends -->

            <!-- Main container start -->
            <div class="main-container">

                <!-- Sidebar wrapper start -->
                <nav class="sidebar-wrapper">

                    <!-- Sidebar brand starts -->
                    <div class="brand">
                        <a href="/dashboard" class="logo">
                            <img src="assets/img/logos/logo.png" class="d-none d-md-block me-4" alt="city" />
                            <img src="assets/img/logos/logo.png" class="d-block d-md-none me-4" alt="city" />
                        </a>
                    </div>
                    <!-- Sidebar brand ends -->
                   
                    <!-- Sidebar menu starts -->
                    <div class="sidebar-menu">
                        <div class="sidebarMenuScroll">
                            <ul>
                                <li class="active-page-link">
                                    <a href="/dashboard">
                                        <i class="bi bi-house"></i>
                                        <span class="menu-text">Dashboard</span>
                                    </a>
                                </li>
                                
                                <li class="sidebar-dropdown">
                                    <a href="#">
                                        <i class="bi bi-person"></i>
                                        <span class="menu-text">Account</span>
                                        
                                    </a>
                                    <div class="sidebar-submenu">
                                        <ul>
                                            <li>
                                                <a href="{{url('profile')}}">Account Settings</a>
                                            </li>
                                            <li> 
                                                <li>
                                                <a href="{{url('profile')}}">Profile</a>
                                            </li>
                                           <li> 
                                               
                                                
                                            
                                        </ul>
                                    </div>
                                </li>
                                      <li>
                                    <a href="{{url('support')}}">
                                        <i class="bi bi-chat-fill"></i>
                                        <span class="menu-text">Support</span>
                                    </a>
                                </li>


                                <li class="sidebar-dropdown">
                                    <a href="#">
                                        <i class="bi bi-cash-stack"></i>
                                        <span class="menu-text">Deposit/Withdrawal</span>
                                        
                                    </a>
                                    <div class="sidebar-submenu">
                                        <ul>
                                            <li>
                                                 <a href="{{url('deposit')}}">
                                    <span class="sub-item">Fund Account</span>
                                </a>
                                            </li>
                                            <li> 
                                                <li>
                                                 <a href="{{url('withdrawals')}}">
                                    <span class="sub-item">Withdrawal</span>
                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{url('investments')}}">
                                        <i class="bi bi-signal"></i>
                                        <span class="menu-text">Investment History</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('accounthistory')}}">
                                        <i class="bi bi-calendar4"></i>
                                        <span class="menu-text"> Transactions History</span>
                                    </a>
                                </li>
                                
                               
                                
                                <li class="sidebar-dropdown">
                                    <a href="#">
                                        <i class="bi bi-box"></i>
                                        <span class="menu-text">Investment Packages</span>
                                        
                                    </a>
                                    <div class="sidebar-submenu">
                                        <ul>
                                            <li>
                                                <a href="{{url('buy-plan')}}">Buy Plan</a>
                                            </li>
                                            
                                            
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                
                                <li>
                                    <a href="{{url('referuser')}}">
                                        <i class="bi bi-person-workspace"></i>
                                        <span class="menu-text">Refer Users</span>
                                    </a>
                                </li>
                                
                            

                                <li>
                                    <a href="{{route('logout')}}">
                                        <i class="bi bi-emoji-expressionless"></i>
                                        <span class="menu-text">Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar menu ends -->

                </nav>
        
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '6ff1c756e8ce5e9e154eaf829f0f73f2f832967a';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>

<!--<script src="//code.tidio.co/gaoibfvtn4cee7o3wrcazvjfiuyifr6y.js" async></script>-->
 