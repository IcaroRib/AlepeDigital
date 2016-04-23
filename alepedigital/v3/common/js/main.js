/*
 * GLOBALS
 */
CURRENT_PAGE = 0;
idUsuario = 0;


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


function ageLimitCheck() {
    var min = document.getElementById("min-age-filter").value;
    var max = document.getElementById("max-age-filter").value;

    if ((min != 0) && (max != 0) && (min > max)) {
        
           alert("Escala etária invalida");
           document.getElementById("age-filter-min-zero").selected = true;
           document.getElementById("age-filter-max-zero").selected = true;
        
    }
}

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




function chartSet() {
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

                var destino = "#content-div";

                if ((window.location.href).indexOf('ranking') >= 0) {
                    destino = "#ranking-div-table";
                }
                
                
                $('#loading').fadeOut('fast');
                $(destino).append(data);
            },
            error: function (data) {

                $('#loading').html("<img src='../common/img/error-loading.gif' height='32' width='32'/>").fadeIn('fast');

            }
    });

    chartSet();
}

function check_logged(){
   var url = '../common/sessions/session.php';
   a = $.get(url, function(data, status) {
      usuario = JSON.parse(data);
      if (usuario.length == 0) {
         idUsuario = 0;            
      }
      else{
         idUsuario = usuario.id;      }

    }); 

}
function check_voted(card,btn,vote) {
   if(idUsuario == 0){
      alert("Você precisa estar logado para votar"); //Por favor mudar pra descer a barra de login
    }
    else{

      var url = '../common/DB/DBLei.php';
      var data = {
         f2: 'selectVoto',
         param1: idUsuario,
         param2: card.getAttribute('id')
      }
      if (vote == 'yes'){
         console.log(url);
         $.post(url,data,function(data,status){
               set_vote_yes(data,card,btn);
            }
         ); 
      }
      else if (vote == 'no'){
         $.post(url,data,function(data,status){
               set_vote_no(data,card,btn);
            }
         );    
      }   
   }
}
function set_vote_yes(voto,card,btn) {
    //CRIAR AJAX QUE ASSOSCIE O CARD AO USUÁRIO EM SESSÃO E ADD NO BANCO COM VOTO SIM e caso funcione, faz o que tem abaixo
    //---------------------
    console.log(voto);
    if(voto == '""'){
      card.setAttribute("data-voted","1");
      card.setAttribute("data-vote","1");

      var btns = card.getElementsByClassName('btn');

      for (var i = 0; i < btns.length; i++) {
        btns[i].style.opacity = .25;
      }
      
      btn.style.opacity = 1;

      var url = '../common/DB/DBLei.php';
      var data = {
         f3: 'voto_usuario_Insert',
         param1: idUsuario,
         param2: card.getAttribute('id'),
         param3: 'Sim'
      }
      $.post(url,data,function(data){console.log(data)});

    }

    else if(voto == '"Nao"'){
      card.setAttribute("data-voted","1");
      card.setAttribute("data-vote","1");

      var btns = card.getElementsByClassName('btn');

      for (var i = 0; i < btns.length; i++) {
        btns[i].style.opacity = .25;
      }
      
      btn.style.opacity = 1;
      var url = '../common/DB/DBLei.php';
      var data = {
         f4: 'voto_usuario_Update',
         param1: idUsuario,
         param2: card.getAttribute('id'),
         param3: 'Nao',
         param4: 'Sim',
      }

      $.post(url,data,function(data){console.log(data)});

   }
//    card.style.backgroundColor = "#FFFFC9";


}

function set_vote_no(voto,card,btn) {
    if(voto == '""'){
      card.setAttribute("data-voted","1");
      card.setAttribute("data-vote","1");

      var btns = card.getElementsByClassName('btn');

      for (var i = 0; i < btns.length; i++) {
        btns[i].style.opacity = .25;
      }
      
      btn.style.opacity = 1;

      var url = '../common/DB/DBLei.php';
      var data = {
         f3: 'voto_usuario_Insert',
         param1: idUsuario,
         param2: card.getAttribute('id'),
         param3: 'Nao'
      }
      $.post(url,data,function(data){console.log(data)});

    }

    else if (voto == '"Sim"'){
      card.setAttribute("data-voted","1");
      card.setAttribute("data-vote","1");

      var btns = card.getElementsByClassName('btn');

      for (var i = 0; i < btns.length; i++) {
        btns[i].style.opacity = .25;
      }
      
      btn.style.opacity = 1;
      var url = '../common/DB/DBLei.php';
      var data = {
         f4: 'voto_usuario_Update',
         param1: idUsuario,
         param2: card.getAttribute('id'),
         param3: 'Sim',
         param4: 'Nao',
      }
      $.post(url,data,function(data){console.log(data)});


    }

}

function set_vote_urgente(card,btn) {
    //CRIAR AJAX QUE ASSOSCIE O CARD AO USUÁRIO EM SESSÃO E ADD NO BANCO COM VOTO NÃO e caso funcione, faz o que tem abaixo
    // -----------------------
    card.setAttribute("data-voted","1");
    card.setAttribute("data-vote","1");

    var btns = card.getElementsByClassName('btn');

    for (var i = 0; i < btns.length; i++) {
      btns[i].style.opacity = .25;
    }

    btn.style.opacity = 1;
}

function set_vote_relevante(card,btn) {
    //CRIAR AJAX QUE ASSOSCIE O CARD AO USUÁRIO EM SESSÃO E ADD NO BANCO COM VOTO NÃO e caso funcione, faz o que tem abaixo
    // -----------------------
    card.setAttribute("data-voted","1");
    card.setAttribute("data-vote","2");

    var btns = card.getElementsByClassName('btn');

    for (var i = 0; i < btns.length; i++) {
      btns[i].style.opacity = .25;
    }

    btn.style.opacity = 1;
}

function set_vote_inviavel(card,btn) {
    //CRIAR AJAX QUE ASSOSCIE O CARD AO USUÁRIO EM SESSÃO E ADD NO BANCO COM VOTO NÃO e caso funcione, faz o que tem abaixo
    // -----------------------
    card.setAttribute("data-voted","1");
    card.setAttribute("data-vote","3");

    var btns = card.getElementsByClassName('btn');

    for (var i = 0; i < btns.length; i++) {
      btns[i].style.opacity = .25;
    }

    btn.style.opacity = 1;
}

function set_vote_irrelevante(card,btn) {
    //CRIAR AJAX QUE ASSOSCIE O CARD AO USUÁRIO EM SESSÃO E ADD NO BANCO COM VOTO NÃO e caso funcione, faz o que tem abaixo
    // -----------------------
    card.setAttribute("data-voted","1");
    card.setAttribute("data-vote","4");

    var btns = card.getElementsByClassName('btn');

    for (var i = 0; i < btns.length; i++) {
      btns[i].style.opacity = .25;
    }

    btn.style.opacity = 1;
}

function set_vote_absurdo(card,btn) {
    //CRIAR AJAX QUE ASSOSCIE O CARD AO USUÁRIO EM SESSÃO E ADD NO BANCO COM VOTO NÃO e caso funcione, faz o que tem abaixo
    // -----------------------
    card.setAttribute("data-voted","1");
    card.setAttribute("data-vote","5");

    var btns = card.getElementsByClassName('btn');

    for (var i = 0; i < btns.length; i++) {
      btns[i].style.opacity = .25;
    }

    btn.style.opacity = 1;
}

function check_following_status() {

    // CRIAR AJAX PARA CHECAR NO BANCO ASSOCIAÇÃO USER E SE ELE SEGUE APOSTAGEM ATRAVÉS DA TABELA usuario_projetoSeguido

    var status = $("a#seguir-projeto").attr("data-status");
    if (status === '0') {
        $("span#seguir-projeto-glyph").toggleClass("glyphicon-heart-empty", true);
        $("span#seguir-projeto-glyph").toggleClass("glyphicon-heart", false);
        $("span#seguir-projeto-glyph").css("color","black");
        $("a#seguir-projeto").attr("data-status","0");
        $("a#seguir-projeto").innerHTML = "Seguir este projeto";        
    }

    else {
        $("span#seguir-projeto-glyph").toggleClass("glyphicon-heart-empty", false);
        $("span#seguir-projeto-glyph").toggleClass("glyphicon-heart", true);
        $("span#seguir-projeto-glyph").css("color","red");
        $("a#seguir-projeto").attr("data-status","1");
        $("a#seguir-projeto").innerHTML = "Seguindo este projeto";
    }
}


function follow_project(id_projeto) {
    
    var url = "scripts/followProject.php";
    var type = $("a#seguir-projeto").attr("data-status");

    $.ajax({

            url : url, /* URL que será chamada */ 
            type: 'POST',
            data: 'id=' + id_projeto + '&type=' + type,
            dataType : 'json',
            cache: false,
            success: function(data){

              if (data.success) {
                  if (data.type === '1') {
                      $("span#seguir-projeto-glyph").toggleClass("glyphicon-heart-empty", false);
                      $("span#seguir-projeto-glyph").toggleClass("glyphicon-heart", true);
                      $("span#seguir-projeto-glyph").css("color","red");
                      $("a#seguir-projeto").attr("data-status","1");
                      $("a#seguir-projeto").innerHTML = "Seguindo este projeto";
                  }

                  else {
                      $("span#seguir-projeto-glyph").toggleClass("glyphicon-heart-empty", true);
                      $("span#seguir-projeto-glyph").toggleClass("glyphicon-heart", false);
                      $("span#seguir-projeto-glyph").css("color","black");
                      $("a#seguir-projeto").attr("data-status","0");
                      $("a#seguir-projeto").innerHTML = "Seguir este projeto";
                  }
                  
              }

              else {
                  alert(data.message);
              }
                
            },
            error: function (data) {

                alert("Erro no servidor! Tente novamente.");

            }
    });

}

function check_password_match () {
      var s1 = document.getElementById('newpass').value;
      var s2 = document.getElementById('newpass-confirm').value;

      if (s1 == s2) {
          document.getElementById("submit-new-pass").disabled = false;
          $("#alert-pass-error").fadeOut();
      }
      else {
          document.getElementById('submit-new-pass').disabled = "disabled";
          $("#alert-pass-error").fadeIn();
      }

}

function change_password () {

      var path = '../perfil/scripts/changePassword.php';
      var formerpass = document.getElementById('formerpass').value;
      var newpass = document.getElementById('newpass').value;      

      $.ajax({ //ESSA MERDA N TAH FUNCIONANDO, TA ENTRANDO NO ERRO, ENT O PROBLEMA É NO SCRIPT php, conserta aí u.u
            url: path,
            type: 'POST',
            dataType: 'json',
            data: 'fp=' + formerpass + '&np=' + newpass,
            success: function (response) {

                if (response.success) {
                    $("#alert-success-login").fadeIn().delay(4000).fadeOut();
                }
                else {
                    $("#alert-fail-login").fadeIn().delay(4000).fadeOut();
                }              
                
                
            },
            error: function () {
                
                $("#alert-fail-login").fadeIn().delay(4000).fadeOut();

            }        
      }); 

}

function cepRequest() {
    $('#cep').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'scripts/consultar_cep.php', /* URL que será chamada */ 
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

$(window).scroll(function(){

    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300){
      if (
          ((window.location.href).indexOf("projeto/") < 0) &&
          ((window.location.href).indexOf("politico/") < 0) &&
          ((window.location.href).indexOf("cadastro/") < 0) &&
          ((window.location.href).indexOf("perfil/") < 0)
        ) {
          CURRENT_PAGE++;
          load_content();
      }
        
    }
});

$(window).resize(function(){
    ptype2alt();
});

$(document).ready(function() {    
    if ((window.location.href).indexOf("projeto/") >= 0) {
        check_following_status();
    }
    if (
          ((window.location.href).indexOf("projeto/") < 0) &&
          ((window.location.href).indexOf("politico/") < 0) &&
          ((window.location.href).indexOf("cadastro/") < 0) &&
          ((window.location.href).indexOf("perfil/") < 0)
        ) {
        
        load_content();        
    }

    if (
          ((window.location.href).indexOf("politicos/") < 0) &&
          ((window.location.href).indexOf("ranking/") < 0)
        ) {
            check_logged();
    }

    if ((window.location.href).indexOf("cadastro/") >= 0) {
        cepRequest();
    }
    
    
    $('[data-toggle="tooltip"]').tooltip();
    ptype2alt();
    chartSet();
});