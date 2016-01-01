function changeClassNav(elem){
	document.getElementById("nav-1-elem").className = 'blog-nav-item';
	document.getElementById("nav-2-elem").className = 'blog-nav-item';
	document.getElementById("nav-3-elem").className = 'blog-nav-item';
	document.getElementById("nav-4-elem").className = 'blog-nav-item';
  document.getElementById(elem).className = 'blog-nav-item active';
};



function negrito(id) {
  var args = [].slice.call(arguments, 1);
  for (var i = 0; i < args.length; i++){
    document.getElementById(args[i]).style.fontWeight = 'normal';
  }
  document.getElementById(id).style.fontWeight = 'bold';

}

function negritoOff () {

  var args = ["a-todosProjetos","a-arquivados","a-politicos","a-ranking","filtro-1","filtro-2","filtro-3","filtro-4"];
  for (var i = 0; i < args.length; i++){
    document.getElementById(args[i]).style.fontWeight = 'normal';
  }
  
}


function ptype2alt(){
  var windowWidth = window.innerWidth;
  var temp1;
  
  if (windowWidth<992) {
    temp1 = '<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#login-modal">Login</button><br/>-- ou --<br/><button type="button" class="btn btn-xs btn-info" onclick="showCadastro(true)">Cadastre-se</button>';
  }

  else{
    temp1 = 'Faça Login ou Cadastre-se para poder usufruir dos recursos do site!<br/><br/><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#login-modal">Login / Cadastro</button>';
    
    
  }

  document.getElementById("p-side-left").innerHTML = temp1;

};
ptype2alt();


function showCadastro(resp) {
  if (resp) {
    document.getElementById("cards-div").style.display = 'none';
    document.getElementById("painel-filtrar").style.display = 'none';
    document.getElementById("cadastro-div").style.display = 'block';
  }
  else {
    document.getElementById("cards-div").style.display = 'block';
    document.getElementById("painel-filtrar").style.display = 'block';
    document.getElementById("cadastro-div").style.display = 'none'; 
  }
    
}

$(document).on('ready', function() {
    $("#input-4").fileinput({showCaption: false});
});


$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cep').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'consultar_cep.php', /* URL que será chamada */ 
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
});