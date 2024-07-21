var chartData = {
  labels: ["S", "M", "T", "W", "T", "F", "S"],
  datasets: [{
  		label: "Earnings June",
		lineTension: 0.3,
	    borderColor: "rgba(78, 115, 223, 1)",
	    pointRadius: 4,
	    pointBackgroundColor: "rgba(78, 115, 223, 1)",
	    pointBorderColor: "rgba(78, 115, 223, 1)",
	    pointHoverRadius: 3,
	    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
	    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
	    pointHitRadius: 10,
	    pointBorderWidth: 2,
    	data: [589, 445, 483, 503, 689, 692, 634],
  	},
  	{	
  		label: "Earnings July",
  		lineTension: 0.3,
	    borderColor: "rgba(255, 206, 86, 1)",
		pointRadius: 4,
		pointBackgroundColor: "rgba(255, 206, 86, 1)",
	    pointBorderColor: "rgba(255, 206, 86, 1)",
	    pointHoverRadius: 3,
	    pointHoverBackgroundColor: "rgba(255, 206, 86, 1)",
	    pointHoverBorderColor: "rgba(255, 206, 86, 1)",
	    pointHitRadius: 10,
	    pointBorderWidth: 2,
   		data: [639, 465, 493, 478, 589, 632, 674],
  	}]
};
var chLine = document.getElementById("lineChart");
if (chLine) {
  new Chart(chLine, {
  type: 'line',
  data: chartData,
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: false
        }
      }]
    },
    legend: {
      display: true
    }
  }
  });
}



// Pie Chart
var Piedata = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
    },{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
    }]
}

var ctx = document.getElementById('pieChart');
var myBarChart = new Chart(ctx, {
    type: 'pie',
    data: Piedata,	
    options: {
	    legend: {
	      display: true
	    }
	  }   
	});


// Bar Chart

var bardata = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
    },{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
    }]
}

var ctx = document.getElementById('barChart');
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: bardata,	
    options: {
	    legend: {
	      display: true
	    }
	  }   
	});

// Bubble Chart

var Bubbledata = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
        label: '',
        hitRadius: 30,
        hoverBackgroundColor: "rgba(255, 0, 0,0.5)",
        borderColor: "rgba(111, 255, 0, 0.9)",
        backgroundColor : "rgba(111, 255, 0, 0.9)",
	    data: [{
            x: 10,
            y: 20,
            r: 5
        }, {
            x: 13,
            y: 5,
            r: 5
        }, {
            x: 15,
            y: 10,
            r: 5
        }],
        borderWidth: 1
    }]
}

var ctx = document.getElementById('bubbleChart');
var myBarChart = new Chart(ctx, {
    type: 'bubble',
    data: Bubbledata,	
    options: {
	    legend: {
	      display: true
	    }
	  }   
	});


// Rader Chart
    
var Raderdata = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
    }]
}

var ctx = document.getElementById('raderChart');
var myBarChart = new Chart(ctx, {
    type: 'radar',
    data: Raderdata,   
    options: {
        legend: {
          display: true
        }
      }   
    });

// Polar Chart

    var Polardata = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
    }]
}

var ctx = document.getElementById('polarChart');
var myBarChart = new Chart(ctx, {
    type: 'polarArea',
    data: Polardata,   
    options: {
        legend: {
          display: true
        }
      }   
    });

// Scatter Chart

var ctx = document.getElementById('scatterChart');
var scatterChart = new Chart(ctx, {
    type: 'scatter',
    data: {
        datasets: [{
            label: 'Scatter Dataset1',
            lineTension: 0.3,
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 4,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [{
                x: 10,
                y: 20
            }, {
                x: 13,
                y: 5
            }, {
                x: 15,
                y: 10
            }]
        },{
            label: 'Scatter Dataset2',
            lineTension: 0.3,
            borderColor: "rgba(252, 186, 3)",
            pointRadius: 4,
            pointBackgroundColor: "rgba(252, 186, 3)",
            pointBorderColor: "rgba(252, 186, 3)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(252, 186, 3)",
            pointHoverBorderColor: "rgba(252, 186, 3)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [{
                x: 5,
                y: 21
            }, {
                x: 17,
                y: 17
            }, {
                x: 2,
                y: 10
            }]
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                  beginAtZero: true,
                }
              }],
            xAxes: [{
                type: 'linear',
                position: 'bottom',
                ticks: {
                  beginAtZero: true
                }
            }]
        }
    }
});