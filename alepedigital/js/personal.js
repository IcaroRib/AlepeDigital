/*
 * GLOBAL VARIABLES DEFINITION
 */

 var CURRENT_PAGE = 0;
 window.location.hash = "todosProjetos";

 /*
  *
  */


function changeClassNav(elem){
	document.getElementById("nav-1-elem").className = 'blog-nav-item';
	document.getElementById("nav-2-elem").className = 'blog-nav-item';
	document.getElementById("nav-3-elem").className = 'blog-nav-item';
	document.getElementById("nav-4-elem").className = 'blog-nav-item';
  document.getElementById(elem).className = 'blog-nav-item active';
};

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

function yesNoEvent(arg1) {

    var parent = document.getElementById(arg1.getAttribute("data-parent-id"));
    arg1.style.opacity = 1;
    arg1.style.cursor = "pointer";
    var arg2;

    if (arg1.getAttribute("data-val") == "yes") {  //if arg is the "sim" button
        
        

        arg2 = parent.getElementsByClassName("btn-alt-no")[0];

        
        
    }




    else {
        

        arg2 = parent.getElementsByClassName("btn-alt-yes")[0];


    }
    arg1.disabled = false;
    arg2.disabled = false;
    arg1.disabled = true;
    arg2.style.opacity = .25;
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


//chartConfig('leiChart',53,47); 




function loadContent(){

    $('#loading').html("<img src='img/loading.gif' height='32' width='32'/>").fadeIn('fast');

    
    $.ajax({

            url : 'tools/fetch_cards.php', /* URL que será chamada */ 
            type: 'POST',
            data: 'href=' + window.location.hash + '&page=' + CURRENT_PAGE,
            cache: false,
            success: function(data){

                $('#loading').fadeOut('fast');

                if (window.location.hash == "#politicos") {
                    $("#politicos-div").append(data);
                }

                else if (window.location.hash == "#arquivados") {
                    $("#arquivadas-div").append(data);
                }

                else if (window.location.hash.indexOf("projeto:") != -1) {
                    $("#projeto-div").html(data);
                    var x = document.getElementById("leiChart");
                    var yesPercent = parseFloat(x.getAttribute('data-yes-percent'));
                    var noPercent = parseFloat(x.getAttribute('data-no-percent'));
                    chartConfig("leiChart",yesPercent,noPercent);
                }

                else if (window.location.hash.indexOf("politico:") != -1) {
                    $("#politico-div").html(data);
                    var x = document.getElementById("polAceitacaoChart");
                    var yesPercent = parseFloat(x.getAttribute('data-yes-percent'));
                    var noPercent = parseFloat(x.getAttribute('data-no-percent'));
                    chartConfig("polAceitacaoChart",yesPercent,noPercent);
                }

                else if (window.location.hash == "#ranking") {
                    
                    $("#ranking-div-table").append(data);
                    var x = document.getElementsByClassName("myChart");
                    for (var i = 0; i < x.length; i++) {
                          var novoId = x.length + i + 1;
                          x[i].id = novoId.toString();
                          var yesPercent = parseFloat(x[i].getAttribute('data-yes-percent'));
                          var noPercent = parseFloat(x[i].getAttribute('data-no-percent'));
                          chartConfig(x[i].id,yesPercent,noPercent);
                    };
                    
                }

                else {
                    $("#cards-div").append(data);
                  
                }

                           
            },
            error: function (data) {
                $('#loading').html("<img src='img/error-loading.gif' height='32' width='32'/>").fadeIn('fast');
            }
       });
};

function clearDiv() {
    CURRENT_PAGE = 0;
    var elems = document.getElementsByClassName("blog-post");
    for (var i = 0; i < elems.length; i++) {
        if ((elems[i].id != "cadastro-div") && (elems[i].id != "ranking-div")) {
            elems[i].innerHTML = "";
        };
        
    };
}



function showDiv(resp) {

    document.getElementById("cards-div").style.display = 'none';
    document.getElementById("cadastro-div").style.display = 'none';
    document.getElementById("arquivadas-div").style.display = 'none';
    document.getElementById("politicos-div").style.display = 'none';
    document.getElementById("ranking-div").style.display = 'none';
    document.getElementById("legenda-arquivados").style.display = "none";
    document.getElementById("politico-div").style.display = "none";
    document.getElementById("projeto-div").style.display = "none";
    document.getElementById("f-7").style.display = "none";
    document.getElementById(resp.getAttribute('data-div')).style.display = 'block';

    //--------------------------------------------------------------------
    
    document.getElementById("painel-filtrar-side").style.display = "none";
    document.getElementById("painel-filtrar-side-politicos").style.display = "none";
    document.getElementById("painel-filtrar-side-ranking").style.display = "none";
    document.getElementById("painel-filtrar-top").style.display = "none";
    document.getElementById("painel-filtrar-top-politicos").style.display = "none";
    document.getElementById("painel-filtrar-top-ranking").style.display = "none";

    //-------------------------------------------------------------------------

    if (resp.getAttribute('data-div') == "cadastro-div") {
      window.location.hash = "cadastro";
    }
  
    else if (resp.getAttribute('data-div') == 'politicos-div') {
      
      document.getElementById("painel-filtrar-side-politicos").style.display = "block";
      document.getElementById("painel-filtrar-top-politicos").style.display = "inline-block";
      window.location.hash = "politicos";
      
    }

    else if (resp.getAttribute('data-div') == "ranking-div") {
      document.getElementById("painel-filtrar-side-ranking").style.display = "block";
      document.getElementById("painel-filtrar-top-ranking").style.display = "inline-block";
      window.location.hash = "ranking";
      
    }

    else if (resp.getAttribute('data-div') == "projeto-div") {

      window.location.hash = "projeto:" + resp.getAttribute('data-card-id');

    }

    else if (resp.getAttribute('data-div') == "politico-div") {

      window.location.hash = "politico:" + resp.getAttribute('data-card-id');

    }

    else {
      document.getElementById("painel-filtrar-side").style.display = "block";
      document.getElementById("painel-filtrar-top").style.display = "inline-block";

      if (resp.getAttribute('data-div') == "arquivadas-div") {

        window.location.hash = "arquivados";
        document.getElementById("legenda-arquivados").style.display = "block";
        document.getElementById("f-7").style.display = "block";
        

      }

      else {
        window.location.hash = "todosProjetos";
        
      }
    }


    clearDiv();
    loadContent();
      

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


$(document).ready(function() {
   loadContent();
   cepRequest();
   ptype2alt();
   $('[data-toggle="tooltip"]').tooltip(); 
});



$(window).scroll(function(){


    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300){

      if ((window.location.hash.indexOf("cadastro") == -1) && (window.location.hash.indexOf("projeto:") == -1) && (window.location.hash.indexOf("politico:") == -1)) {

          CURRENT_PAGE += 1;
          loadContent();

      }    
      
    }
});