<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

  if (isset($_GET['type'])) { 

    if ($_GET['type'] == 'alerts') {

        echo '<input type="hidden" class="notifInfo" value="notifAlerts">';

      } elseif ($_GET['type'] == 'messages') {

        echo '<input type="hidden" class="notifInfo" value="notifMessage">';   

      }

    } else {
      echo '<input type="hidden" class="notifInfo" value="notifNon">';
    }


?>
        <div class="container-fluid" id="notifMese">
          
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Message & Notification</h1>
            <div class="dropdown no-arrow mb-4">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Content</button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" id="messnotiAll">All</a>
                <a class="dropdown-item" id="messAll">Messages</a>
                <a class="dropdown-item" id="notiAll">Notifications</a>
              </div>  
            </div>
          </div>

          <div class="row"><div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Alerts</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="alertNo"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bell fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Messages</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="messageNo"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-envelope fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->

          <!-- <div class="row" id="notificationTable">

          </div>          
          <div class="row">
            <div class="col-lg-6 mb-4">            </div>
            <div class="col-lg-6 mb-4">            </div>       
          </div> -->
        </div>
      </div>
      <input type="hidden" value="">
<script>
  $(document).ready(function() {
    mess_alert();
    setInterval(messCheck,1000);
  });

  function messCheck(){
    var messNotifg = $('.notifInfo').val();
    var data = "type=messagesCheck&checkfor="+messNotifg;
    $.ajax({
      type: 'POST',
      url: 'includes/message_db.php',
      data:data,
      dataType: 'text',
      success:function(messageCheckResponse){
       if (messageCheckResponse == 'true') {
         mess_alert();          
       } 
      }    
    });
  }

  function mess_alert() {
    var messNotifg = $('.notifInfo').val();
    var data = "type=messages&notifi="+messNotifg;
    $.ajax({
      type: 'POST',
      url: 'includes/message_db.php',
      data:data,
      dataType: 'text',
      success:function(messageAlertResponse){
        $("#notifMese").html(messageAlertResponse);  
      }    
    });
  };

</script>
     
<?php
	include('includes/script.php');
	include('includes/footer.php');
?>
</body>

</html>
  
