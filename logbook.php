<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
         <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Log Book</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="enterlogid()">Create New Log</button>
          </div>
          <div class="row">          
            <div class="container-fluid">
              <div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Logs Table</h6></div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <caption>*List of Events Noted</caption>
                      <thead>
                        <tr>
                          <th>Log Name</th>
                          <th>Log Info</th>
                          <th>C.O</th>
                          <th>Status</th>
                          <th> * </th>
                        </tr>
                      </thead>
                      <tbody id="logMangBody">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> 
          </div>
          
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title bold">New Log</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="newLogForm">
                    <div class="form-group" id="logInputStatus"></div>
                    <div class="form-group">
                      <input type="hidden" id="logId" value="">
                      <label for="exampleInputEmail1">Log Name</label>
                      <input type="text" class="form-control" id="newLogbookName" name="newLogbookName" aria-describedby="emailHelp" placeholder="Name for the log book">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Log Desc</label>
                      <textarea type="text" class="form-control" id="newLogbookDesc" name="newLogbookDesc" placeholder="Description for the log book" aria-describedby="emailHelp" col='2'></textarea>
                    </div>
                    <button class="btn btn-primary" id="createNewLogBtn" >Save Log</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
      <?php include('includes/script-2.php'); ?>
      <script>
        $(document).ready(function(){
          logbookTable();
        });        
      </script>
      <script src="js/main.js"></script> 
<?php
  include('includes/footer.php');
?>
</body>
</html>