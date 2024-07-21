<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="modal fade" id="addnewproject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <input type="hidden" name="project_name" value="project">
          <div class="form-group">
            <label for="exampleInputEmail1">Project Name</label>
            <input type="text" class="form-control" id="filenameinput" name="project_name" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Project For</label>
            <input type="text" class="form-control" id="filenameinput" name="project_Inte" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Deadline</label>
            <input type="date" class="form-control" id="filenameinput" name="project_deln" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="project_desc"></textarea>
            <small id="emailHelp" class="form-text text-muted">A short description of the project.</small>
          </div>
          <button type="submit" class="btn btn-primary" name="create_project">Create <i
              class="fas fa-plus fa-sm"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Projects</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnewproject"><i
        class="fas fa-plus fa-sm primary"></i> Create Project</button>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Active Projects</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="project_active"></div>
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
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Projects Completed </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="project_Comp"></div>
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
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Projects Deleted</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="project_Delt"></div>
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
      <h6 class="m-0 font-weight-bold text-primary">List Of Projects</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
          <caption>List of Projects</caption>
          <thead class="align-items-center">
            <tr>
              <th>Project Name</th>
              <th>Project For</th>
              <th>D.S</th>
              <th>D.D</th>
              <th>Status</th>
              <th> * </th>
            </tr>
          </thead>
          <tbody id="projectTable" class="align-items-center">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<script src="js/main.js"></script>
<script>
  $(document).ready(function () {
    projectData('table');
    projectData('active');
    projectData('delete');
    projectData('complete');
  });

  function projectData(projectContent) {
    var dataNeed = 'projectContent=' + projectContent;
    $.ajax({
      type: 'POST',
      url: 'includes/project_db.php',
      dataType: 'text',
      data: dataNeed,
      success: function (scriptTable) {
        if (projectContent == 'table') {
          $('#projectTable').html(scriptTable);
        }
        if (projectContent == 'active') {
          $('#project_active').html(scriptTable);
        }
        if (projectContent == 'delete') {
          $('#project_Delt').html(scriptTable);
        }
        if (projectContent == 'complete') {
          $('#project_Comp').html(scriptTable);
        }
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