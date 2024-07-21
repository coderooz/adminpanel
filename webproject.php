<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
      <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Website Project</h1>
          <a href="webEditor"><button type="button" class="btn btn-primary"><i class="fas fa-plus fa-sm primary"></i> Create New</button></a>
        </div>
        <div class="row">
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Active</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="webP_active"> </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-file fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="webP_Comp"> </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-check fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Deleted</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="webP_Delt"> </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-trash fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Of Web Project</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead class="align-items-center">
                  <tr>
                    <th>Name</th>
                    <th>C.O</th>
                    <th>Status</th>
                    <th> * </th>
                  </tr>
                </thead>
                <tbody id="webProjectTable" class="align-items-center">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    webStat("active");    
    webStat("complete");    
    webStat("deleted");  
    webProjectTable();  

  });

  function webProjectTable() {
    var data = "type=websiteDbTable";
    $.ajax({
      type: "POST",
      data: data,
      url: 'includes/webProjectDb.php',
      dataType: 'text',
      success:function(webDbTable){
        $("#webProjectTable").html(webDbTable);
      }
    });
  }

  function webStat(webStatuscode) {
    var webStatus = "type=websiteStatus&StatusNeed="+webStatuscode;
    $.ajax({
      type: "POST",
      data : webStatus,
      url: 'includes/webProjectDb.php',
      dataType: 'text',
      success:function(webStatusResponse){
        if (webStatuscode == "active") {
          $("#webP_active").html(webStatusResponse);
        }
        if (webStatuscode == "complete") {
          $("#webP_Comp").html(webStatusResponse);
        }
        if (webStatuscode == "deleted") {
          $("#webP_Delt").html(webStatusResponse);
        }
      }
    });

  }
 

</script>  
<script src="js/main.js"></script>
<?php
  include('includes/script-2.php');
  include('includes/footer.php');
?>
</body>

</html>