<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Upload Images & other assets</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" class="fileUpload" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleFormControlFile1"><i class="fas fa-sm fa-cloud-upload-alt"></i> Upload assets</label>
                  <input type="file" name="files[]" class="form-control-file" id="exampleFormControlFile1" multiple>
                </div>
                <button type="submit" name="assets_submit" class="assets_upload" class="btn btn-primary">Upload</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Assets</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-cloud-upload-alt fa-sm"></i> Upload files</button>
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Images</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 imageNo"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-image fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Videos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 videoNo"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-play fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Font Icons</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 iconNo"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-icons fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="row images">
              <div class="gallery"></div>           
            </div>          
        </div>
      </div>
    </div>
  </div>
  <script src="js/main.js"></script>
  <script>
    $(document).ready(function(){
        assetreload();
        setInterval(assetreload,1500);
        function assetreload() {
          imgLoad('image');
          imgLoad('imgResponse');
          imgLoad('videos');
          imgLoad('icons');
        };
      }); 
  </script>
<?php
	include('includes/script.php');
	include('includes/footer.php');
?>
</body>
</html>