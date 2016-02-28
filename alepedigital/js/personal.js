/*
 * GLOBAL VARIABLES DEFINITION
 */

 var CURRENT_PAGE = 0;
 var CURRENT_DIV = document.getElementById("body").getAttribute("data-div");
 var FILTER_ODENAR_POR = 'recentes';
 var FILTER_MUNICIPIO = '';
 var FILTER_PARTIDO = '';
 var FILTER_STATUS_LEI = '';
 var FILTER_RANKING_ORDER = '';
 var BUSCA = '';

 /*
  *
  */


function ageLimitCheck() {
    var min = document.getElementById("min-age-filter").value;
    var max = document.getElementById("max-age-filter").value;

    if ((min != 0) && (max != 0) && (min > max)) {
        
           alert("Escala etária invalida");
           document.getElementById("age-filter-min-zero").selected = true;
           document.getElementById("age-filter-max-zero").selected = true;
        
    }
}

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

};

function genderFilter(arg) {

    if (arg.getAttribute("data-val") == "boy") {
        var arg2 = document.getElementById("gender-filter-girl");  
    }

    else {
        var arg2 = document.getElementById("gender-filter-boy");
    }

    if (arg.getAttribute("data-status") != 1) {      

        arg.style.opacity = 1;
        arg2.style.opacity = .25;
        arg.setAttribute("data-status", "1");
        arg2.setAttribute("data-status", "0");
    }

    else {
        arg.setAttribute("data-status", "0");
        arg2.setAttribute("data-status", "0");
        arg.style.opacity = 1;
        arg2.style.opacity = 1;
    }
    
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
      

};



//chartConfig("leiChart",70,30);


function loadPage(){

    $('#loading').html("<img src='img/loading.gif' height='32' width='32'/>").fadeIn('fast');
    
    $.ajax({

            url : 'index.php', /* URL que será chamada */ 
            type: 'POST',
            data: 'div=' + CURRENT_DIV + '&page=' + CURRENT_PAGE,
            cache: false,
            success: function(data){

                $('#loading').fadeOut('fast');

                if (CURRENT_DIV != "ranking") {
                    $("#main-content-spot").append(data);
                }

                else {
                    $("#ranking-div-table").append(data);
                }
                

                           
            },
            error: function (data) {
                $('#loading').html("<img src='img/error-loading.gif' height='32' width='32'/>").fadeIn('fast');
            }
       });


    chartSet();
};


function cepRequest() {
    $('#cep').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'tools/consultar_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rua').val(data.rua);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.cidade);
                        $('#estado').val(data.estado);
                    }
                }
           });   
   return false;    
   })
};


function filterSubmit(elem) {
    if (elem.getAttribute("name") == "div") { CURRENT_DIV = this.value; }
    else if (elem.getAttribute("name") == "f-ordenarPor") { FILTER_ODENAR_POR = this.value; }
    else if (elem.getAttribute("name") == "f-municipio") { FILTER_MUNICIPIO = this.value; }
    else if (elem.getAttribute("name") == "f-partido") { FILTER_PARTIDO = this.value; }
    else if (elem.getAttribute("name") == "f-status-lei") { FILTER_STATUS_LEI = this.value; }
    else if (elem.getAttribute("name") == "f-status-lei") { FILTER_STATUS_LEI = this.value; }
    loadPage();
}


$(".formRef").click(function() {
    var name = $(this).attr('data-name');
    var link = $(this).attr('data-val');
    $('.post1').attr("name",name);
    $('.post1').attr("value",link);
    $('.form1').submit();
});

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


$(window).scroll(function(){


    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300){

          CURRENT_PAGE += 1;
          var loadingState = $('body').attr('data-loading');
          if (loadingState == "1") {
              loadPage();
          };
          
    }
});

$(document).ready(function() {
   cepRequest();
   ptype2alt();
   chartSet();
   $('[data-toggle="tooltip"]').tooltip();

});