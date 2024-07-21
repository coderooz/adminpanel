<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content=""><meta name="author" content=""><title>DashBoard - Login</title><link rel="shortcut icon" href="img/favicon-2.png" type="image/x-icon">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/font_family_Nunito_200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i.css" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet"></head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user">
                    <div class="form-group loginStatus"></div>
                    <div class="form-group">
                      <input type="text" autocomplete="off" class="form-control form-control-user" id="userId" placeholder="Enter Name/Email">
                    </div>
                    <div class="form-group">
                      <input type="password" autocomplete="off" class="form-control form-control-user" id="userPwd" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" id="UserLogin">Login</button>
                    <hr>
                    <button class="btn btn-google btn-user btn-block"><i class="fab fa-google fa-fw"></i> Login with Google</button>
                    <button class="btn btn-facebook btn-user btn-block"><i class="fab fa-facebook-f fa-fw"></i> Login with Facebook</button>
                  </form>
                  <hr>
                  <div class="text-center"><a class="small" href="forgot-password">Forgot Password?</a></div>
                  <div class="text-center"><a class="small" href="register">Create an Account!</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" class="pageloginId form-control form-control-user" id="loginId" value="">
  </div>
  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/main.js"></script> 
  <script>
    
    $(document).ready(function(){
      userIn('login');
      let rem = document.querySelector('#customCheck');
      if (localStorage.checkbox && localStorage.checkbox !== "") {
        if (window.location.href == localStorage.url) { 
          rem.setAttribute("checked", "checked");
          $("#userId").val() = localStorage.username;
          $("#userPwd").val() = localStorage.pass;
        }
      } else {rem.removeAttribute("checked"); /*e.value = "";pass.value = "";*/}

      $('#UserLogin').click(function(){
        var data = "type=loginUser&loginId="+ $("#loginId").val() +"&username="+$("#userId").val()+"&userpwd="+$("#userPwd").val();
        console.log(data);

        $.ajax({
          type:'POST',url: 'includes/main.php',data:data, dataType: 'text',
          success:function(response){
            console.log(response);
            if (response == 'Success') {
              Responsedata = '<div class="alert alert-success" role="alert"><b>Success!</b> You are Loged-In.</div>';
              $('.loginStatus').html(Responsedata);
              if (rem.checked && $("#userId").val() !== "") {
                    localStorage.url = window.location.href;
                    localStorage.username = $("#userId").val();
                    localStorage.pass = $("#userPwd").val();
                    localStorage.checkbox = rem.value;
              } else {
                  localStorage.username = "";
                  localStorage.pass = "";
                  localStorage.checkbox = "";
              }
              setTimeout(pageRedirect("logined"), 1500); 
            } else if (response == 'Wrong Password') {
              Responsedata = '<div class="alert alert-danger" role="alert"><b>Wrong Password!</b></div>';
              $('.loginStatus').html(Responsedata);
            } else if(response == 'No User Found'){
              Responsedata = '<div class="alert alert-danger" role="alert"><b>No User Found!</b></div>';
              $('.loginStatus').html(Responsedata);
            } else if(response == 'Error'){
              Responsedata = '<div class="alert alert-info" role="alert"><b>Error..!</b></div>';
               $('.loginStatus').html(Responsedata);
            }
          }
        });

        $('.user').submit(function(){return false;});
        
      });
    

    });
  </script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script></body></html>
