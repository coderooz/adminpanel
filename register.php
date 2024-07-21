<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content=""><meta name="author" content=""><title>DashBoard - Register</title><link rel="shortcut icon" href="img/favicon-2.png" type="image/x-icon"><link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"><link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1><div>
                  <form class="user">
                    <div class="form-group registerStatus"></div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="user_first" id="user_first" placeholder="First Name">
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="user_last" id="user_last" placeholder="Last Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="emailUser" id="emailUser" placeholder="Email Address">
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" name="userpwd" id="userpwd" placeholder="Password">
                      </div>
                      <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" name="reuserpwd" id="reuserpwd" placeholder="Repeat Password">
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block registerbtn" id="registerBtn">Register Account</button>
                    <hr>
                    <button class="btn btn-google btn-user btn-block"><i class="fab fa-google fa-fw"></i> Register with Google</button>
                    <button class="btn btn-facebook btn-user btn-block"><i class="fab fa-facebook-f fa-fw"></i> Register with Facebook</button>
                  </form>

                  <hr>
                  <div class="text-center"><a class="small" href="forgot-password">Forgot Password?</a></div>
                  <div class="text-center"><a class="small" href="login">Already have an account? Login!</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  <input type="hidden" class="pageRegisterId form-control form-control-user" id="registrationId" value="">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/main.js"></script> 
  <script>

     $(document).ready(function(){  
        userIn('register');
      
        $("#registerBtn").click(function(){
          var data = "type=registration&registrationId="+ $("#registrationId").val() +"&userFirst="+$("#user_first").val()+"&userLast="+$("#user_last").val()+"&userEmail="+$("#emailUser").val()+"&userpwd="+$("#userpwd").val()+"&userpwdRe="+$("#reuserpwd").val();

          $.ajax({type:'POST',
            url: 'includes/main.php',
            data:data,dataType: 'text',
            success:function(userResplonse){
              if (userResplonse == 'Registration complete') {
                Responsedata = '<div class="alert alert-success" role="alert"><b>Registration Complete!</b> Now Login-In.</div>';
                $('.registerStatus').html(Responsedata);
                setTimeout('pageRedirect("registered")', 1000); 
              } else if (userResplonse == 'Error2') {
                Responsedata = '<div class="alert alert-info" role="alert">Error: Empty Field Found. Fill All The Fields!</div>';
                $('.registerStatus').html(Responsedata);
                userIn('register');
              } else if (userResplonse == 'Error1') {
                Responsedata = '<div class="alert alert-info" role="alert"><b>Error!</b> Please Retry.</div>';
                $('.registerStatus').html(Responsedata);
                userIn('register');
              } else if (userResplonse == 'Email') {
                Responsedata = '<div class="alert alert-danger" role="alert"><b>Invalid Email!</b></div>';
                $('.registerStatus').html(Responsedata);
                userIn('register');
              } else if (userResplonse == 'First') {
                Responsedata = '<div class="alert alert-danger" role="alert"><b>Invalid First!</b></div>';
                $('.registerStatus').html(Responsedata);
                userIn('register');
              } else if (userResplonse == 'Last') {
                Responsedata = '<div class="alert alert-danger" role="alert"><b>Invalid Last!</b></div>';
                $('.registerStatus').html(Responsedata);
                userIn('register');
              } else if (userResplonse == 'failed') {
                Responsedata = '<div class="alert alert-danger" role="alert"><b>Registration Failed!</b></div>';
                $('.registerStatus').html(Responsedata);
                userIn('register');
              } else if (userResplonse == 'User') {
                Responsedata = '<div class="alert alert-info" role="alert"><b>User Exists!</b></div>';
                $('.registerStatus').html(Responsedata);
                userIn('register');
              }     
            }
          });
          $('.user').submit(function(){
            return false;
          });

        });
     })

  </script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
</body></html>
