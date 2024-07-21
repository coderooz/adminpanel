<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile Page</h1>
    <button type="button" style="display: block;" class="btn btn-primary editbtn"><i class="fas fa-pen"></i>
      Edit</button>
    <button type="button" style="display: none;" class="btn btn-success savebtn"><i class="fas fa-save"></i>
      Save</button>
  </div>
  <div class="row">
    <div class="row col-md-6 text-center">
      <div class="col-lg-6 col-md-12">
        <img src="./img/user/Passport size photo.jpg" class="img-fluid img-thumbnail rounded" style="width:100%;"
          alt="">
        <div class="form-group userImageUpload" style="display: none;">
          <label for="userimageupload">Upload user image.</label>
          <input type="file" class="form-control-file" id="userimageupload">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <form class="user-profile-form">
        <div class="form-group">
          <label for="username">User Name</label>
          <input type="text" name="" value="Ranit Saha" class="form-control" placeholder="User Name" id="username"
            readonly>
          <small class="form-text text-muted">User's name goes here!</small>
        </div>
        <div class="form-group">
          <label for="username">User D.O.B</label>
          <input type="date" name="" value="2002-07-19" class="form-control userdob" readonly>
          <small class="form-text text-muted">User's date of birth goes here!</small>
        </div>
        <div class="form-group">
          <label for="userphoneno">User Phone No+</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <select class="custom-select form-control phoreg" disabled>
                <option class="dropdown-item" disabled>Choose Region...</option>
                <option class="dropdown-item" selected value="91+" &>91+ | India</option>
                <option class="dropdown-item" value="">U.S.A</option>
                <option class="dropdown-item" value="">Bangladesh</option>
              </select>
            </div>
            <input type="number" name="" value="8876304050" id="userphoneno" class="userphoneno form-control" readonly>
          </div>
          <small class="form-text text-muted">User's Phone-No goes here!</small>
        </div>
        <div class="form-group">
          <label for="useremail">User Email</label>
          <input type="email" name="" value="ranitsaha2002@gmail.com" class="useremail form-control"
            placeholder="User E-mail" readonly>
          <small class="form-text text-muted">User's email goes here!</small>
        </div>
        <div class="form-group">
          <label for="userpassword">User Password</label>
          <input type="password" value="" class="userpassword form-control" autocomplete="false" readonly>
          <small class="form-text text-muted"></small>
        </div>
        <div class="form-group repassword-block" style="display: none;">
          <label for="repassword">Re-type Password</label>
          <input type="password" name="repassword" value="" autocomplete="false" class="repassword form-control">
          <small class="form-text text-muted">Plz re-type the password for conformation</small>
        </div>

      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('.editbtn').click(function () {
    $('.editbtn').css('display', 'none')
    $('.savebtn').css('display', 'block')
    $('.repassword-block').css('display', 'block')
    $('.userImageUpload').css('display', 'block')
    $('.form-control').removeAttr('readonly')
    $('.phoreg').removeAttr('disabled')
  })
  $('.savebtn').click(function () {

    $('.savebtn').css('display', 'none');
    $('.editbtn').css('display', 'block');
    $('.repassword-block').css('display', 'none');
    $('.userImageUpload').css('display', 'none');
    $('.form-control').attr('readonly', '');
    $('.phoreg').attr('disabled', '');

    $.ajax({
      type: 'POST',
      data: "username=" + $("#username").val() + "&useremail=" + $(".useremail").val() + "&userpassword=" + $(
        ".userpassword").val() + "&userrepassword=" + $(".repassword").val() + "&userphonenumlocation=" + $(
        ".phoreg").val() + "&userphonenum=" + $(".userphoneno").val() + "&dob=" + $('.userdob').val(),
      url: 'includes/main.php',
      dataType: 'text',
      // success: function (searchResponse) {
      //   $('.container-fluid').html(searchResponse);
      // }
    });


    $.ajax({

    })


  })
</script>
<?php include('includes/script.php'); include('includes/footer.php'); ?>

</body>

</html>