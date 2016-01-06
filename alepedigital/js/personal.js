/*
 * GLOBAL VARIABLES DEFINITION
 */

 var CURRENT_PAGE = 0;
 window.location.hash = "todosProjetos"

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


function chartConfig (id,arg1,arg2) {'+data[i]["card-img"]+'
      // Get context with jQuery - using jQuery's .get() method.
      var ctx = $("#"+id).get(0).getContext("2d");
      // This will get the first returned node in the jQuery collection.
      var myPieChart = new Chart(ctx).Pie([
          {
              value: arg2,
              color:"#FF0000",
              highlight: "#FF3838",

              
          },
          {
              value: arg1,
              color: "#00AE00",
              highlight: "#00CD00",
              
              
          }
      ],
      {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke : false,

          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout : 70, // This is 0 for Pie charts

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

                else if (window.location.hash == "#ranking") {
                    
                    $("#ranking-div-table").append(data);
                    var x = document.getElementsByClassName("myChart");
                    var y = document.getElementsByClassName("graph-sim");
                    var z = document.getElementsByClassName("graph-nao");
                    for (var i = 0; i < x.length; i++) {
                          var novoId = x.length + i + 1;
                          x[i].id = novoId.toString();
                          chartConfig(x[i].id,parseFloat(y[i].innerHTML),parseFloat(z[i].innerHTML));
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



function showDiv(resp) {

    var nofilter = ['cadastro-div'];

    document.getElementById("cards-div").style.display = 'none';
    document.getElementById("cadastro-div").style.display = 'none';
    document.getElementById("arquivadas-div").style.display = 'none';
    document.getElementById("politicos-div").style.display = 'none';
    document.getElementById("ranking-div").style.display = 'none';
    document.getElementById("legenda-arquivados").style.display = "none";
    document.getElementById("f-7").style.display = "none";
    document.getElementById(resp).style.display = 'block';

    //--------------------------------------------------------------------

    document.getElementById("a-todosProjetos").disabled = true;
    document.getElementById("a-top-todosProjetos").disabled = true;
    document.getElementById("a-arquivados").disabled = true;
    document.getElementById("a-top-arquivados").disabled = true;
    document.getElementById("a-politicos").disabled = true;
    document.getElementById("a-top-politicos").disabled = true;
    document.getElementById("a-ranking").disabled = true;
    document.getElementById("a-top-ranking").disabled = true;

    if (resp == "cadastro-div") {window.location.hash = "cadastro";}

    if (nofilter.indexOf(resp) !== -1) { // if resp is not found in nofilter
      document.getElementById("painel-filtrar-side").style.display = "none";
      document.getElementById("painel-filtrar-side-politicos").style.display = "none";
      document.getElementById("painel-filtrar-side-ranking").style.display = "none";
      document.getElementById("painel-filtrar-top").style.display = "none";
      document.getElementById("painel-filtrar-top-politicos").style.display = "none";
      document.getElementById("painel-filtrar-top-ranking").style.display = "none";
    }

    else {
      if (resp == 'politicos-div') {
        document.getElementById("painel-filtrar-side").style.display = "none";
        document.getElementById("painel-filtrar-side-politicos").style.display = "block";
        document.getElementById("painel-filtrar-side-ranking").style.display = "none";
        document.getElementById("painel-filtrar-top").style.display = "none";
        document.getElementById("painel-filtrar-top-politicos").style.display = "inline-block";
        document.getElementById("painel-filtrar-top-ranking").style.display = "none";

        window.location.hash = "politicos";
        
      }

      else if (resp == "ranking-div") {
        document.getElementById("painel-filtrar-side").style.display = "none";
        document.getElementById("painel-filtrar-side-politicos").style.display = "none";
        document.getElementById("painel-filtrar-side-ranking").style.display = "block";
        document.getElementById("painel-filtrar-top").style.display = "none";
        document.getElementById("painel-filtrar-top-politicos").style.display = "none";
        document.getElementById("painel-filtrar-top-ranking").style.display = "inline-block";

        window.location.hash = "ranking";
        
      }

      else {
        document.getElementById("painel-filtrar-side").style.display = "block";
        document.getElementById("painel-filtrar-side-politicos").style.display = "none";
        document.getElementById("painel-filtrar-side-ranking").style.display = "none";
        document.getElementById("painel-filtrar-top").style.display = "inline-block";
        document.getElementById("painel-filtrar-top-politicos").style.display = "none";
        document.getElementById("painel-filtrar-top-ranking").style.display = "none";

        if (resp == "arquivadas-div") {

          window.location.hash = "arquivados";
          document.getElementById("legenda-arquivados").style.display = "block";
          document.getElementById("f-7").style.display = "block";
          

        }

        else {
          window.location.hash = "todosProjetos";
          
        }
      }

      loadContent();
      
    }  

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
}




$(document).ready( function() {   
   cepRequest();
   ptype2alt();
   loadContent();
});


$(window).scroll(function(){
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300){
      CURRENT_PAGE += 1;
      if (window.location.hash != "#cadastro") {
        loadContent();
      }
      
    }
});