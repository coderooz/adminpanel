<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
  if (isset($_GET['texteditor'])) {
    echo '<input type="hidden" class="editorPostId" value="'.$_GET['texteditor'].'">
    <input type="hidden" class="editorUniqId" value="older"> ';  
  } else {
    echo '<input type="hidden" class="editorUniqId" value="newpost">  
    <input type="hidden" class="editorPostId" value="">';  
  }
?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Text editor</h1>
    <button type="button" class="btn btn-primary saveBtn"><i class="fas fa-save"></i> Save </button>
  </div>
  <div class="row" id="postEditorAlert"></div>
</div>

<div class="container-fluid">
  <div class="col-lg-12"></div>
  <div class="row">
    <div class="col-lg-12 form_data">
      <form>
        <div class="form-row">
          <label>Title</label>
          <input type="text" class="form-control contentTitle" placeholder="Title...">
        </div>
        <div class="form-row">
          <div class="col-4">
            <label>Type</label>
            <select id="inputState" class="form-control contentType">
              <option value="none" selected>Type</option>
              <option value="Article">Article</option>
              <option value="Blogs">Blogs</option>
            </select>
          </div>
          <div class="col">
            <label>Categoty</label>
            <select id="inputState" class="form-control contentCatg">
              <option value="none" selected>Catg</option>
              <option value="Entertainment">Entertainment</option>
              <option value="Business">Business</option>
              <option value="Politics">Politics</option>
            </select>
          </div>
          <div class="col">
            <label>Tags</label>
            <input type="text" class="form-control contentTags" placeholder="Tags">
          </div>
        </div>
        <div class="form-row">
          <label>Description</label>
          <textarea class="form-control contentDesc" rows="2" placeholder="Description..."></textarea>
        </div>
        <div class="form-row">
          <label>Text Area</label>
          <textarea class="form-control" id="contentData" rows="3" name="editor1"></textarea>
          <script src="text_editor/ckeditor/ckeditor.js"></script>
          <script>
            CKEDITOR.replace("editor1", {
              height: 300,
              filebrowserUploadUrl: "upload.php"
            });
            CKEDITOR.replace("js-my-textarea", {
              "extraPlugins": "imagebrowser",
              "imageBrowser_listUrl": "imagesFolder/"
            });
          </script>
        </div>
      </form>
    </div>
  </div>

</div>
<script src="./js/main.js"></script>
<script>
  $(document).ready(function () {
    cleaneditor();
    $('.saveBtn').click(function () {
      editorData();
    });

    function autoArti() {
      editorData();
    }

    function cleaneditor() {
      var dataSet = "type=articleclean";
      $.ajax({
        type: "POST",
        data: dataSet,
        url: 'includes/texteditordb.php',
        dataType: 'text',
      });
    }
    var editorID = $('.editorUniqId').val();
    if (editorID == "newpost") {
      var type = "type=newPost&postTime=new";
      $.ajax({
        type: "POST",
        data: type,
        url: 'includes/texteditordb.php',
        dataType: 'text',
        success: function (editorId) {
          $('.editorPostId').val(editorId);
        }
      });
    } else if (editorID == "older") {
      var type = "type=older&postId=" + $('.editorPostId').val();
      $.ajax({
        type: "POST",
        data: type,
        url: 'includes/texteditordb.php',
        dataType: 'text',
        success: function (editorPost) {
          $('.form_data').html(editorPost);
        }
      });
    }

    function editorData() {
      var dataSet = "type=articlesave&postId=" + $('.editorPostId').val() + "&title=" + $('.contentTitle').val() +
        "&contType=" + $('.contentType').val() + "&tags=" + $('.contentTags').val() + "&catg=" + $('.contentCatg')
        .val() + "&desc=" + $('.contentDesc').val() + "&cont=" + CKEDITOR.instances['contentData'].getData();
      $.ajax({
        type: "POST",
        data: dataSet,
        url: 'includes/texteditordb.php',
        dataType: 'text',
        success: function (saveResponse) {
          $('#postEditorAlert').html(saveResponse);
          setTimeout($('#postEditorAlert').html(' '), 1000)
        }
      });
    }
  });
</script>
<?php
  include('includes/script.php');
  include('includes/footer.php');
?>
</body>

</html>