<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>  

        <div class="container-fluid">
          <h1 class="h3 mb-4 text-gray-800">Data Table</h1>
            <div class="row">
            <div class="container-fluid">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Scripts Table</h6>
                  <div class=""></div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th> No. </th>
                          <th>Scripts Name</th>
                          <th>Script Created</th>
                          <th>Type</th>
                          <th>Project Status</th>
                          <th> * </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>1.</th>
                          <td>Admin Panel</td>
                          <td>10/03/2020</td>
                          <td>PHP Scripts</td>
                          <td><button type="submit" class="btn btn-danger">Not Active </button></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="#" class="px-md-1" > <i title="Results Tables" class="fas fa-table text-success"></i></a>
                              <a href="#" class="px-md-1" > <i title="View" class="fas fa-eye text-primary"></i> </a>
                              <a href="#" class="px-md-1" > <i title="Delete" class="fas fa-trash text-danger"></i> </a>
                              <a href="#" class="px-md-1" > <i title="Edit" class="fas fa-code text-muted"></i> </a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th>2.</th>
                          <td>Flex Movies</td>
                          <td>10/03/2020</td>
                          <td>PHP Scripts</td>
                          <td><button type="submit" class="btn btn-danger">Not Active </button></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="#" class="px-md-1" > <i title="Results Tables" class="fas fa-table text-success"></i></a>
                              <a href="#" class="px-md-1" > <i title="View" class="fas fa-eye text-primary"></i> </a>
                              <a href="#" class="px-md-1" > <i title="Delete" class="fas fa-trash text-danger"></i> </a>
                              <a href="#" class="px-md-1" > <i title="Edit" class="fas fa-code text-muted"></i> </a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th>3.</th>
                          <td>Bloggenoes</td>
                          <td>10/03/2020</td>
                          <td>PHP Scripts</td>
                          <td><button type="submit" class="btn btn-danger">Not Active </button></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="#" class="px-md-1" > <i title="Results Tables" class="fas fa-table text-success"></i></a>
                              <a href="#" class="px-md-1" > <i title="View" class="fas fa-eye text-primary"></i> </a>
                              <a href="#" class="px-md-1" > <i title="Delete" class="fas fa-trash text-danger"></i> </a>
                              <a href="#" class="px-md-1" > <i title="Edit" class="fas fa-code text-muted"></i> </a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th>4.</th>
                          <td>Flex Movies</td>
                          <td>10/03/2020</td>
                          <td>PHP Scripts</td>
                          <td><button type="submit" class="btn btn-danger">Not Active </button></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="#" class="px-md-1" > <i title="Results Tables" class="fas fa-table text-success"></i></a>
                              <a href="#" class="px-md-1" > <i title="View" class="fas fa-eye text-primary"></i> </a>
                              <a href="#" class="px-md-1" > <i title="Delete" class="fas fa-trash text-danger"></i> </a>
                              <a href="#" class="px-md-1" > <i title="Edit" class="fas fa-code text-muted"></i> </a>
                            </div>
                          </td>
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

<?php
  include('includes/script-2.php');
  include('includes/footer.php');
?>
</body>

</html>
