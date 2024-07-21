<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<input type="hidden" class="generatortype" value="<?php echo $_GET['for'];?>">
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo strtoupper($_GET['for']); ?> (Code Generator)</h1>
  </div>
  <div class="row">
    <div class="col-lg-4 col-md-12">
      <h2 class="h3 text-dark-700">Animation</h2>
      <button style="width: 50%;" class=" btn btn-secondary btn-lg">Animation</button>
    </div>

    <div class="col-lg-4 col-md-6">
      <h2 class="h3 text-dark-700">Animation</h2>
      <button style="width: 50%;" class="btn btn-secondary btn-lg">Animation</button>
    </div>

  </div>

</div>

</div>

<script>

</script>
<?php
  include('includes/script-2.php');
  include('includes/footer.php');
?>
</body>

</html>