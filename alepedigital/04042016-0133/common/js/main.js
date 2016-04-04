/*
 * GLOBALS
 */
CURRENT_PAGE = 0;


function ptype2alt(){
  var windowWidth = window.innerWidth;
  var temp1;  
  if (windowWidth<992) {    
    temp1 = '<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#login-modal">Login</button><br/>-- ou --<br/><button type="button" class="btn btn-xs btn-info" onclick="showDiv(\'cadastro-div\')">Cadastre-se</button>';
  }
  else{
    temp1 = 'Faça Login ou Cadastre-se para poder usufruir dos recursos do site!<br/><br/><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#login-modal">Login / Cadastro</button>';        
  }
  document.getElementById("p-side-left").innerHTML = temp1;
}



function chartConfig (id,arg1,arg2) {
      // Get context with jQuery - using jQuery's .get() method.
      var ctx = $("#"+id).get(0).getContext("2d");
      // This will get the first returned node in the jQuery collection.
      var myPieChart = new Chart(ctx).Pie([
          {
              value: arg2,
              color:"#D9534F",
              highlight: "#BE4845",
              label: "Não"

              
          },
          {
              value: arg1,
              color: "#5CB85C",
              highlight: "#4B964B",
              label: "Sim"
              
              
          }
      ],
      {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke : true,

          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout : 0, // This is 0 for Pie charts

          //Number - Amount of animation steps
          animationSteps : 100,

          //String - Animation easing effect
          animationEasing : "easeOutBounce",

          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate : true,

          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale : false,

          //String - A legend template
          legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

      });
      

}




function chartSet () {
    var chartTag = document.getElementById("body").getAttribute("data-chart");

    if (chartTag !== "0") {

        var graphs = document.getElementsByTagName("canvas");

        for (var i = 0; i < graphs.length; i++) {

          graphs[i].id = graphs.length + i;
          graphId = graphs[i].id;
          graphYesPercent = graphs[i].getAttribute("data-yes-percent");
          graphNoPercent = graphs[i].getAttribute("data-no-percent");

          chartConfig(graphId,graphYesPercent,graphNoPercent);
        }
    }
}




function load_content(){

    $('#loading').html("<img src='../common/img/loading.gif' height='32' width='32'/>").fadeIn('fast');
    var path = "scripts/getContent.php";
    
    $.ajax({

            url : path, /* URL que será chamada */ 
            type: 'POST',
            data: 'page=' + CURRENT_PAGE,
            cache: false,
            success: function(data){

                $('#loading').fadeOut('fast');
                $("#content-div").append(data);

            },
            error: function (data) {

                $('#loading').html("<img src='../common/img/error-loading.gif' height='32' width='32'/>").fadeIn('fast');

            }
    });

    chartSet();
}

function yesNoEvent(arg1,arg3) {

    var parent = document.getElementById(arg1.getAttribute("data-parent-id"));
    var arg2;

    if (arg1.getAttribute("data-val") == "yes") {  //if arg is the "sim" button
        arg2 = parent.getElementsByClassName("btn-alt-no")[0];
    }

    else {
        arg2 = parent.getElementsByClassName("btn-alt-yes")[0];
    }

    if (arg1.getAttribute("data-status") != 1) {      

        arg1.style.opacity = 1;
        arg2.style.opacity = .25;
        arg1.setAttribute("data-status", "1");
        arg2.setAttribute("data-status", "0");

        if (arg3==1) {
            arg1.parentElement.parentElement.style.backgroundColor = "#FFFFC9";
        }
    }

    else {
        arg1.setAttribute("data-status", "0");
        arg2.setAttribute("data-status", "0");
        arg1.style.opacity = 1;
        arg2.style.opacity = 1;
        
        if (arg3==1) {
          arg1.parentElement.parentElement.style.backgroundColor = "#f0f0f0";
        }
    }
}



$(window).scroll(function(){

    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300){
        CURRENT_PAGE++;
        load_content();      
    }
});

$(window).resize(function(){
    ptype2alt();
});

$(document).ready(function() {   
    ptype2alt();
    chartSet();
    // load_content();
    $('[data-toggle="tooltip"]').tooltip();    
});