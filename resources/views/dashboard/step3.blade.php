
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Zen-bottrd | Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body style="background-color: #f5f5f5">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden shadow-sm">
                        <!-- Header Section -->
                        <div class="bg-success text-white py-4">
                            <div class="row align-items-center">
                                <div class="col-7 ps-4">
                                    <h4 class="mb-1">Account Verification</h4>
                                    <p class="mb-0">Enter your activation code to continue</p>
                                </div>
                                <div class="col-5 text-end">
                                    <img src="logo.png" alt="Verification" class="img-fluid" style="height: 80px;">
                                </div>
                            </div>
                        </div>

                        <!-- Verification Form -->
                        <div class="card-body p-4">
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            
                            @if($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            
                            <div class="text-center mb-4">
                                <i class="bi bi-shield-check display-4 text-success"></i>
                                <h3 class="mt-3">Enter Your Activation PIN</h3>
                                <p class="text-muted">We've generated a verification code for you</p>
                            </div>
                            
                            <!-- Verification Code Display -->
                            <div class="text-center mb-4 p-3 bg-light rounded">
                                <p class="mb-1">Your verification code is:</p>
                                <h2 class="text-success fw-bold">{{ Auth::user()->token }}</h2>
                            </div>
                            
                            <form method="POST" action="{{ route('code') }}">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="digit" class="form-label">Verification Code</label>
                                    <input type="number" name="digit" class="form-control form-control-lg" 
                                           placeholder="Enter 6-digit code" required autofocus>
                                    <!--<div class="form-text">Check your email for the verification code</div>-->
                                </div>
                                
                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" name="next" class="btn btn-success btn-lg">
                                        Verify Account
                                    </button>
                                    
                                    <!--<a href="{{ route('resendCode', Auth::user()->id) }}" class="btn btn-link text-decoration-none">-->
                                    <!--    Resend Code-->
                                    <!--</a>-->
                                </div>
                            </form>
                            
                            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary w-100">
                                    <i class="bi bi-box-arrow-left"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="mt-5 text-center">
                        <p class="text-muted">© {{ date('Y') }} Your Company. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
  <!-- /.register-box -->

  <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- validation init -->
    <script src="assets/js/pages/validation.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <!-- Bootstrap Toasts Js -->
    <script src="assets/js/pages/bootstrap-toastr.init.js"></script>

</body>

</html>
<div class="position-fixed top-0 end-0 p-2" style="z-index: 1005">
    <div id="ErrorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="https://globaltb.online/user/logo.png" alt="" class="me-2" height="18">
            <strong class="me-auto">Error</strong>
            <small>Now..</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" style="background-color:red;">
            Hello, world! This is a toast message.
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#login_form').on('submit', function(e) {
            e.preventDefault();
            $(".response").html("Loading...<div class='spinner-border spinner-border-sm' role='status'><span class='sr-only'>Loading...</span></div>")
            var email = $('#email').val();
            var password = $('#password').val();

            if (email == '' || password == '') {
                $(".toast-body").html('Enter all field');
                $("#ErrorToast").toast("show");
                $(".response").html("")
                return false;
            }
            $.ajax({
                type: "POST",
                url: 'https://Zen-bottrd.net/custom-login',
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    //alert('error');
                    $(".response").html(data.content);
                    if (data.content == 'Successful') {
                        $(".response").html(data.message);
                        window.location = data.redirect;

                    } else
                    if (data.content == 'Error') {
                        $(".response").html(data.message);
                        window.location = data.redirect;
                    }
                },
                error: function(data, errorThrown) {
                    Swal.fire('The Internet?', 'Check network connection!', 'question');
                }
            });
        });
    });
</script>

<script>
    function login(id) {
        id.innerHTML = "Verifying account..";
        setTimeout(function() {
            id.innerHTML = "Log in";
        }, 3000);
    }
</script>