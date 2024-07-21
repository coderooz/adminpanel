<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
		
		
         <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Charts2 Demo</h1>
          </div>
          
	        <div class="container">
				<div class="row">
			        <div class="col-6">
			            <div class="card shadow mb-4">
			                <div class="card-header py-3">
			                  <h6 class="m-0 font-weight-bold text-primary">Line Chart</h6>
			                </div>
			                <div class="card-body">
				                <div class="card-body">
				                    <canvas id="lineChart"></canvas>
				                </div>
				                <hr>
	                 			For Documentation of <b><code>Line Chart</code></b>. Go to <a href="https://www.chartjs.org/docs/latest/charts/line.html">https://www.chartjs.org/docs/latest/charts/line.html</a>.
				            </div>
				        </div>    
			        </div>

			        <div class="col-6">
			            <div class="card shadow mb-4">
			                <div class="card-header py-3">
			                  <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>
			                </div>
			                <div class="card-body">
				                <div class="card-body">
				                    <canvas id="pieChart"></canvas>
				                </div>
				                <hr>
	                 			For Documentation of <b><code>Pie/Doughnut Chart</code></b>. Go to <a href="https://www.chartjs.org/docs/latest/charts/doughnut.html">https://www.chartjs.org/docs/latest/charts/doughnut.html</a>.
				            </div>
				        </div>    
			        </div>

			        <div class="col-6">
			            <div class="card shadow mb-4">
			                <div class="card-header py-3">
			                  <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
			                </div>
			                <div class="card-body">
				                <div class="card-body">
				                    <canvas id="barChart"></canvas>
				                </div>
				                <hr>
	                 			For Documentation of <b><code>Bar Chart</code></b>. Go to <a href="https://www.chartjs.org/docs/latest/charts/bar.html">https://www.chartjs.org/docs/latest/charts/bar.html</a>.
				            </div>
				        </div>    
			        </div>

			        <div class="col-6">
			            <div class="card shadow mb-4">
			                <div class="card-header py-3">
			                  <h6 class="m-0 font-weight-bold text-primary">Rader Chart</h6>
			                </div>
			                <div class="card-body">
				                <div class="card-body">
				                    <canvas id="raderChart"></canvas>
				                </div>
				                <hr>
	                 			For Documentation of <b><code>Rader Chart</code></b>. Go to <a href="https://www.chartjs.org/docs/latest/charts/radar.html">https://www.chartjs.org/docs/latest/charts/radar.html</a>.
				            </div>
				        </div>    
			        </div>

			        <div class="col-6">
			            <div class="card shadow mb-4">
			                <div class="card-header py-3">
			                  <h6 class="m-0 font-weight-bold text-primary">Bubble Chart</h6>
			                </div>
			                <div class="card-body">
				                <div class="card-body">
				                    <canvas id="bubbleChart"></canvas>
				                </div>
				                <hr>
	                 			For Documentation of <b><code>Bubble Chart</code></b>. Go to <a href="https://www.chartjs.org/docs/latest/charts/bubble.html">https://www.chartjs.org/docs/latest/charts/bubble.html</a>.
				            </div>
				        </div>    
			        </div>

			        <div class="col-6">
			            <div class="card shadow mb-4">
			                <div class="card-header py-3">
			                  <h6 class="m-0 font-weight-bold text-primary">Polar Chart</h6>
			                </div>
			                <div class="card-body">
				                <div class="card-body">
				                    <canvas id="polarChart"></canvas>
				                </div>
				                <hr>
	                 			For Documentation of <b><code>Polar Chart</code></b>. Go to <a href="https://www.chartjs.org/docs/latest/charts/polar.html">hhttps://www.chartjs.org/docs/latest/charts/polar.html</a>.
				            </div>
				        </div>    
			        </div>

			        <div class="col-6">
			            <div class="card shadow mb-4">
			                <div class="card-header py-3">
			                  <h6 class="m-0 font-weight-bold text-primary">Scatter Chart</h6>
			                </div>
			                <div class="card-body">
				                <div class="card-body">
				                    <canvas id="scatterChart"></canvas>
				                </div>
				                <hr>
	                 			For Documentation of <b><code>Scatter Chart</code></b>. Go to <a href="https://www.chartjs.org/docs/latest/charts/scatter.html">https://www.chartjs.org/docs/latest/charts/scatter.html</a>.
				            </div>
				        </div>    
			        </div>

				</div>
			</div>

      	</div>
    </div>  
    <script src="js/Charts.min.js"></script>
	<script src="js/charts.on.js"></script>
<?php
  include('includes/script.php');
  include('includes/footer.php');
?>
</body>

</html>