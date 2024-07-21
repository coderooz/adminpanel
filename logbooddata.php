<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
      <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800" id="logbookData">Log Book Data</h1>
          <?php 
            if (empty($_GET['logdata'])) {
              echo '<input type="hidden" id="logbookDataId" value="'.$_GET['logdata'].'">';
            } else {

            }
           ?>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newlogentry" onclick="enterlogDataid()">New Entry</button>
        </div>
        <div class="row">
          <div class="container-fluid">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Log Data</th>
                        <th>C.O</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td>Cement</td>
                        <td>Items Brought</td>
                        <td>12 Bags->Rs 4000/-</td>
                        <td>24/10/2020</td>
                      </tr>

                      <tr>
                        <td>Bucket</td>
                        <td>Items Brought</td>
                        <td>2 pices->Rs 350/-</td>
                        <td>24/10/2020</td>
                      </tr>

                      <tr>
                        <td>Rope</td>
                        <td>Items Brought</td>
                        <td>4 Kgs->Rs 350/-</td>
                        <td>24/10/2020</td>
                      </tr>

                      <tr>
                        <td>Sand</td>
                        <td>Items Brought</td>
                        <td>5 cubic meter->Rs 3000/-</td>
                        <td>24/10/2020</td>
                      </tr>

                      <tr>
                        <td>Stone</td>
                        <td>Items Brought</td>
                        <td>5 cubic meter(20mm, from Sanju)->Rs 6400/-</td>
                        <td>23/10/2020</td>
                      </tr>

                      <tr>
                        <td>Delchi,Kroai</td>
                        <td>Items Brought</td>
                        <td>Rs 680/-</td>
                        <td>21/10/2020</td>
                      </tr>

                      <tr>
                        <td>Sand(Advance)</td>
                        <td>Items Brought</td>
                        <td>Rs 1000/-</td>
                        <td>21/10/2020</td>
                      </tr>

                      <tr>
                        <td>T.M.T Bar</td>
                        <td>Items Brought</td>
                        <td>36 pices (16 mm)->Rs 70800/- (By Cheque)</td>
                        <td>23/10/2020</td>
                      </tr>

                      <tr>
                        <td>T.M.T Bar</td>
                        <td>Items Brought</td>
                        <td>48 pices (12 mm)->Rs 13100/-</td>
                        <td>23/10/2020</td>
                      </tr>

                      <tr>
                        <td>T.M.T Bar</td>
                        <td>Items Brought</td>
                        <td>48 pices (8 mm)->Rs 70800/- (With 12 mm piecs)</td>
                        <td>23/10/2020</td>
                      </tr>

                      <tr>
                        <td>Binding Wire</td>
                        <td>Items Brought</td>
                        <td>30 Kgs->Rs 2700/-</td>
                        <td>24/10/2020</td>
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

    <div class="modal fade" id="newlogentry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Data Entry</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="newLogForm">
              <div class="form-group" id="logdataStatus"></div>
              <div class="form-group">
                <input type="hidden" id="logbooknewDataId" value="">
                <label for="exampleInputEmail1">Entry Name</label>
                <input type="text" class="form-control" id="newLogbookName" name="newLogbookName" aria-describedby="emailHelp" placeholder="Name for the log book">
              </div>
              
              <div class="form-group">
                <div class="col-8">
                  <label>Entry Type</label>
                  <select id="inputState" class="form-control contentType">
                    <option disabled selected>Type</option>
                    <option value="payments">Payments</option>
                    <option value="items_brought">Items Bought</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Entry Desc</label>
                <textarea type="text" class="form-control" id="newLogbookDesc" name="newLogbookDesc" placeholder="Description for the log book" aria-describedby="emailHelp" col='2'></textarea>
              </div>
              <button class="btn btn-primary" id="NewEntryLogBtn">Save Entry</button>
              <button class="btn btn-primary" id="newentryData">New Log Type</button>
            </form>
          </div>
        </div>
      </div>
    </div>

<?php 
  include('includes/script.php');
  include('includes/footer.php');
?>
</body>

</html>