<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Zen-bottrd | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

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



<body style="background-color: white">
<div class="account-pages my-5 pt-sm-5" >
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-6">
                <div class="card overflow-hidden">
                    <div class="" style="background-color: green" >
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4" >
                                    <h5 class="" style="color: white">Free Register</h5>
                                    <p style="color: white">Get your free Zen-bottrd account now.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                 <a href="/"> <img src="logo.png" alt="" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="/">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                                <img src="logo1.png" alt="" class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                          <form method="POST" action="{{ route('register') }}" id="regester" class="needs-validation" novalidate>
                            @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="fullname" name="name" placeholder="Enter Full Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                
                                
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Email</label>
                                    <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email"   value="{{ old('email') }}"placeholder="Enter email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                               
                                </div>
                                

                               


                                <div class="md-3">
                                    <div class="form-floating mb-2">
                                        <select class="form-select" id="country" name="currency" aria-label="Floating label select example" required>
                                            <option value="$">USD</option>
                                            <option value='£'>GBP</option>
                                            <option value='€'>EUR</option>
                                            <option value='$'>AUD</option>
                                        </select>
                                        <label for="floatingSelectGrid">Currency</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" id="password" name="password">
                                                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                                                            </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" placeholder="Enter password" name="password_confirmation" aria-label="Password" aria-describedby="password-addon1" id="password2" name="password_confirmation">
                                        <button class="btn btn-light " type="button" id="password-addon1"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>

 <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
            

                                <div class="mt-4 d-grid">
                                    <button class="btn btn-success waves-effect waves-light" {{ __('Register') }}  onclick='create(this)' type="submit" id="div"style="background-color: green">Register</button>
                                </div><br>
                                <p class="response"></p>

                                <div class="mt-4 text-center">
                                    <p class="mb-0">By registering you agree to the Zen-bottrd.net <a href="#" class="text-primary">Terms of Use</a></p>
                                <br>
                                <p>Already have an account ? <a href="{{route('login')}}" class="fw-medium text-primary"> Login</a> </p>
                                <p>
                                </div>
                      
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
                   
                    <div>
                        ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Copyright
                            <i class="bx bx-check-shield text-success"></i>Zen-bottrd</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<div class="position-fixed top-0 end-0 p-2" style="z-index: 1005">
    <div id="ErrorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <a href="/"><img src="logo1.png" alt="" class="me-2" height="18"></a>
            <strong class="me-auto">Error</strong>
            <small>Now..</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" style="background-color:red;">

        </div>
    </div>
</div>
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

<script>
    function create(id) {
        id.innerHTML = "submitting request...";
        $("#div").fadeOut(1000);
        setTimeout(function() {
            $('#div').show();
            id.innerHTML = "Register";
        }, 2000);
    }
</script>
  <!-- jQuery 3 -->
  <script src="dist/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="dist/js/bootstrap.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#regester').on('submit', function(e) {
            e.preventDefault();

            var fullname = $('#fullname').val();
            var email = $('#email').val();

            var password = $('#password').val();
    


            if (fullname == "" || email == "" password == "") {
                $(".toast-body").html('Enter all field');
                $("#ErrorToast").toast("show");
                return false;
            }

            if (password.length < 5 || password2.length < 5) {
                $(".toast-body").html('Enter A Stronger Password !');
                $("#ErrorToast").toast("show");
                $("#password, $password2").val('');
                return false;
            }


            if (password != password2) {
                $(".toast-body").html('Password mismatched Check And Try Again!');
                $("#ErrorToast").toast("show");
                $("#pin_two").val('');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "https://Zen-bottrd.net/custom-registration",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    $(".response").html(data.content);
                    if (data.content == 'successful') {
                        $(".response").html(data.content);
                        window.location = data.redirect;
                    } else
                    if (data.content == 'Error') {
                        $(".response").html(data.content);
                    }
                },
                error: function(data, errorThrown) {
                    Swal.fire('The Internet?', 'Check network connection!', 'question');
                }
            });

        });
    });
</script>