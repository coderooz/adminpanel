$(document).ready(function(){

  alertCenter();
  messgCenter();
  scriptCleanUp();
  userseenData();

  // $('#dataTables').DataTable({});

  $(".fileUpload").on('submit',function(e){
    $('.assets_upload').prop('disable', true);
    
    var formdata = new FormData(this);
    $.ajax({
      type: "POST",url: 'includes/assets_upload.php',data: formdata,cache : false,contentType: false,processData: false,
      success:function(data){alert(data);}
    });
    e.preventDefault();
  });  
  
  $(".searchBar").keyup(function(){
    var searchText = "type=search&searchText="+$(".searchBar").val();
    $.ajax({
      type: 'POST',
      data: searchText,
      url: 'includes/main.php',
      dataType: 'text',
      success:function(searchResponse){
        $('.container-fluid').html(searchResponse);
      }
    });
  });

  function scriptCleanUp(){
    var data = "type=scriptCleanup";
    $.ajax({
      type: 'POST',
      url: 'includes/main.php',
      data: data,
      dataType: 'text'
    });
  };
    
  $('#createNewLogBtn').click(function(){
    var data = "type=logBooksData&catg=newlogbook&logbookId="+$('#logId').val()+"&userId="+$('#userUniqId').val()+"&name="+$('#newLogbookName').val()+"&desc="+$('#newLogbookDesc').val();
    $.ajax({
      type: 'POST',
      url: 'includes/main.php',
      data: data,
      dataType: 'text',
      success:function(scriptTable){
        $('#logInputStatus').html(scriptTable);
      }
    });
    $('.newLogForm').submit(function(){
      return false;
    });

    enterlogid();

  });  

});    


function js_execiter(data, pageOn) {
  $.ajax({
    type: 'POST',
    url: pageOn,
    data: data,
    dataType: 'text',
    success:function(response){
      return response;
    }
  });  
}


function enterlogid(){
  var data = "type=logBooksData&catg=create_logdataid";
  var url = 'includes/main.php',
  responseData = js_execiter(data, url);
  $('#logId').val(response);

}


function logBookDelete(data){
  alert(data);
}

function logbookTable(){
  var data = "type=logBooksData&catg=tabledata";
  $.ajax({
    type: 'POST',
    url: 'includes/main.php',
    data: data,
    dataType: 'text',
    success:function(scriptTable){
      $('#logMangBody').html(scriptTable);
    }
  });
}

function editor() {
  var dataUrI = $('#datauris').val();
  $.ajax({
    type: 'POST',
    url: 'includes/main.php',
    data : dataUrI,
    dataType: 'text',
    success:function(scriptTable){
      $('.datauris').html(scriptTable);
    }
  });
}

function dataInput(dataNeed) {
  var data = "type=indexData&dataNeed="+dataNeed;
  $.ajax({
    type : 'POST',
    url: 'includes/main.php',
    data: data,
    dataType: 'text',
    success:function(indexResponse){
      if (dataNeed == "fullAssets") {
        $("#totalAssets").html(indexResponse);
      }
      if (dataNeed == "fullProjects") {
        $("#totalProject").html(indexResponse);
      }
      if (dataNeed == "fullScripts") {
        $("#totalScript").html(indexResponse);
      }
      if (dataNeed == "fullArticles") {
        $("#totalArticle").html(indexResponse);
      }
    }
  });
}

function scriptDb() {
  var data = "type=scriptsData";
  $.ajax({
    type: 'POST',
    url: 'includes/main.php',
    data: data,
    dataType: 'text',
    success:function(scriptTable){
      $('#datableData').html(scriptTable);
    }
  });
}

function scriptDelete(scriptDeleteId) {
  var data = "type=scriptDelete&scriptid=" + scriptDeleteId ;
  $.ajax({
    type:'POST',
    url:'includes/main.php',
    data:data,
    dataType:'text',
    success:function(deleteResponse){
      alert(deleteResponse);
    } 
  });
}

function userIn(data){
var Idtype = 'type='+data;
$.ajax({
    type: 'POST', data: Idtype,url: 'includes/main.php', dataType: 'text',
    success:function(currentId){
      if (data == "login") { 
         $(".pageloginId").val(currentId);
      }
       if (data == "register") {
        $(".pageRegisterId").val(currentId);
      }
      if (data == "forPwd") {
        $(".pageforPwdId").val(currentId);
     }
    }    
  });
}    

function enterlogDataid() {
  var data = "type=logBooksData&catg=logbooksdataid"; 
  $.ajax({
    type: 'POST',
    data: data,
    url: 'includes/main.php',
    dataType: 'text',
    success:function(currentId){
      
    }
   }); 
}

function userseenData() {
  var data = "type=userData&userId=" + $('#userUniqId').val();
  $.ajax({
    type: 'POST',
    url: 'includes/main.php',
    dataType: 'text',
    data : data,
    success:function(response){
      console.log(response);
      // $('#userDropdown').html(response);
    }
  }); 
}

function imgLoad(contType) {
  var dataNeed = 'content=' + contType;
  $.ajax({
    type: 'POST',
    url: 'includes/assets_db.php',
    dataType: 'text',
    data : dataNeed,
    success:function(asetdetl){
      if (contType == 'image') {
        $(".imageNo").html(asetdetl);
      }
      if (contType == 'videos') {
        $(".videoNo").html(asetdetl);
      }
      if (contType == 'icons') {
        $(".iconNo").html(asetdetl);
      }
      if (contType == 'imgResponse') {
        $(".gallery").html(asetdetl);
      }
    
    }
  });
}   
function cleanDb(){
  var type = "type=clean";
  $.ajax({
    type: "POST",
    data : type,
    url: 'includes/texteditordb.php',
    dataType: 'text',
  });
}
function scriptUpdate() {
  var data = "type=scriptChangeStatus";
  $.ajax({
    type:"POST",
    url:"includes/main.php",
    data: data,
    dataType:"text",
    success:function(updateResponse){
      if (updateResponse == '1') {
        scriptDb();
      }
    }
  });
}

function alertCenter() {
  var data = "type=alertCenter";
  $.ajax({
    type: "POST",
    url:"includes/main.php",
    data: data,
    dataType: "text",
    success:function(alertResponse){
      $(".notification").html(alertResponse);
    }
  });
}

function messgCenter() {
  var data = "type=messgCenter";
  $.ajax({
    type: "POST",
    url:"includes/main.php",
    data: data,
    dataType:"text",
    success:function(messgResponse) {
      $(".messagess").html(messgResponse);
    }
  });
}

function alertnotif() {
  var data = "type=alertnotif";
  $.ajax({
    type: "POST",
    url:"includes/main.php",
    data: data,
    dataType: "text",
    success:function(alertResponse){
      $(".AlertBox").html(alertResponse);
    }
  });
}

function messgnotif() {
  var data = "type=messgnotif";
  $.ajax({
    type: "POST",
    url:"includes/main.php",
    data: data,
    dataType: "text",
    success:function(alertResponse){
      $(".MessageBox").html(alertResponse);
    }
  });
}
function logout(){
  var data = "type=logout";
  $.ajax({
    type: "POST",
    url:"includes/main.php",
    data: data,
    dataType: "text",
    success:function(response){
      if (response == 'logout') {
        setTimeout(pageRedirect("logout"), 1000); 
      } 
    }
  });
}

function notifiMessgPage(contentOf) {
  // var data = "type=messageBodyReplace&bodyfor="+contentOf;
  // $.ajax({
  //   type: "POST",
  //   url:"includes/messages.php",
  //   data: data,
  //   dataType: "text",
  //   success:function(response){
      
  //   }
  // });
  console.log(contentOf);
  // $('.notifInfo').val(contentOf);
  // setTimeout(mess_alert,500);
}

function deleteTextData(id) {
  var data = "type=textdelete&textID=" + id ;
  $.ajax({
    type: "POST",
    url:"includes/main.php",
    data: data,
    dataType: "text",
  });
}

function scriptRun(scriptId) {  
  var scriptStat = '0';
  var id = document.getElementById(scriptId);
  if (scriptStat == '0') {
    $(id).removeClass("btn-danger");
    $(id).addClass('btn-success');
    $(id).html('Active');
    scriptStat = '1';
    console.log(id);
  } else if(scriptStat == '1') {
    scriptStat = '0';
    console.log(scriptId);
  }
}

function pageRedirect(redirectdata){
  if (redirectdata == 'registered' || redirectdata == 'logout') {
    window.location = "./login";
  } else if (redirectdata == 'logined'){
    window.location = "./index";
  }
}



/*  -- Charts --  */

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
