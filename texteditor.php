<?php 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
  
      <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Blogs & Articles</h1>
          <a href="postEditor"><button type="button" class="btn btn-primary"><i class="fas fa-plus fa-sm primary"></i> Create New</button></a>
        </div>
        <div class="row"><div class="col-xl-3 col-md-6 mb-4"><div class="card border-left-primary shadow h-100 py-2"><div class="card-body"><div class="row no-gutters align-items-center"><div class="col mr-2"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Active</div><div class="h5 mb-0 font-weight-bold text-gray-800" id="arti_active"></div></div><div class="col-auto"><i class="fas fa-file fa-2x text-gray-300"></i></div></div></div></div></div><div class="col-xl-3 col-md-6 mb-4"><div class="card border-left-success shadow h-100 py-2"><div class="card-body"><div class="row no-gutters align-items-center"><div class="col mr-2"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed</div><div class="h5 mb-0 font-weight-bold text-gray-800" id="arti_Comp"></div></div><div class="col-auto"><i class="fas fa-check fa-2x text-gray-300"></i></div></div></div></div></div><div class="col-xl-3 col-md-6 mb-4"><div class="card border-left-info shadow h-100 py-2"><div class="card-body"><div class="row no-gutters align-items-center"><div class="col mr-2"><div class="text-xs font-weight-bold text-info text-uppercase mb-1">Deleted</div><div class="h5 mb-0 font-weight-bold text-gray-800" id="arti_Delt"></div></div><div class="col-auto"><i class="fas fa-trash fa-2x text-gray-300"></i></div></div></div></div></div></div>
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Of Blogs & Articles</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead class="align-items-center">
                  <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Tags</th>
                    <th>Catg.</th>
                    <th>C.O</th>
                    <th>Status</th>
                    <th> * </th>
                  </tr>
                </thead>
                <tbody id="articlesTable" class="align-items-center">
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
  $(document).ready(function(){ artricleP(); setInterval(artricleP, 5000);});
  function artricleP(){
    cleanDb();
    blogPost("active");
    blogPost("deleted");
    blogPost("completed");
    articleList();
  }
  function articleList(){
    var postStatus = "type=artileList"; 
     $.ajax({
      type: "POST",
      data : postStatus,
      url: 'includes/texteditordb.php',
      dataType: 'text',
      success:function(articleListResponse){
        $('#articlesTable').html(articleListResponse);
      }
    });
  }
  function finishTextData(artcleID) {
      var data = "type=markfinish&postId="+ artcleID ;
       $.ajax({
        type: "POST",
        data : data,
        url: 'includes/main.php',
        dataType: 'text',
        success:function(markResponse){
         alert(markResponse);
        }
      });
    }
    function deleteTextData(artcleID) {
      var data = "type=deleteArticle&postId="+ artcleID ;
       $.ajax({
        type: "POST",
        data : data,
        url: 'includes/main.php',
        dataType: 'text',
        success:function(markResponse){
         alert(markResponse);
        }
      });
    }
    function editTextData(artcleID) {
      var data = "type=revertArticle&postId="+ artcleID ;
       $.ajax({
        type: "POST",
        data : data,
        url: 'includes/main.php',
        dataType: 'text',
        success:function(markResponse){
         alert(markResponse);
        }
      });
    }
  function blogPost(dataOff){
    var postStatus = "type=postStatusCode&statusOf="+dataOff; 
     $.ajax({
      type: "POST",
      data : postStatus,
      url: 'includes/texteditordb.php',
      dataType: 'text',
      success:function(postStatusResponse){
        if (dataOff == "active") {
          $('#arti_active').html(postStatusResponse);
        }
        if (dataOff == "deleted") {
          $('#arti_Delt').html(postStatusResponse);
        }
        if (dataOff == "completed") {
          $('#arti_Comp').html(postStatusResponse);
        }   
      }
    });
  }
</script>
<?php
  include('includes/script.php');
  include('includes/footer.php');
?>
</body>

</html>