<?php include('includes/header.php'); 
include('includes/navbar.php'); 
?>
  <div class="modal fade" id="addnewscript" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create New Project</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="editor">
            <input type="hidden" name="project_name" value="script">
            <div class="form-group">
              <label for="exampleInputEmail1">File Name</label>
              <input type="text" class="form-control" id="filenameinput" name="script_name" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" name="create_script">Create <i class="fas fa-plus fa-sm"></i></button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
        <div class="container-fluid">                   
          <div class="d-sm-flex align-items-center justify-content-between mb-4"><h1 class="h3 mb-0 text-gray-800">Scripts Page</h1><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnewscript"><i class="fas fa-plus fa-sm primary"></i> Create Scripts</button></div>
          <div class="row">
            <div class="container-fluid">
              <div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Scripts Table</h6></div>
                <div class="card-body">
                  <div class="table-responsive" id="datableData">
                    <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">             
                        <thead>
                          <tr>
                            <th>Scripts Name</th>
                            <th>Script Created</th>
                            <th>Type</th>
                            <th>Project Status</th>
                            <th> * </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                          <td>@mdo</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>

     <?php include('includes/script.php'); ?>
      <script>
        $(document).ready(function(){
          scriptDb();
          setInterval(scriptUpdate,1000);         
        });
      </script>
      
<?php
  include('includes/footer.php');
?></body></html>
