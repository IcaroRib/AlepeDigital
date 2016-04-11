/*
 * GLOBALS
 */

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



$(document).ready(function() {   
    cepRequest();
    ptype2alt();
});

$(window).resize(function() {
    ptype2alt();
});