function changeClassNav(elem){
	document.getElementById("nav-1-elem").className = 'blog-nav-item';
	document.getElementById("nav-2-elem").className = 'blog-nav-item';
	document.getElementById("nav-3-elem").className = 'blog-nav-item';
	document.getElementById("nav-4-elem").className = 'blog-nav-item';
    document.getElementById(elem).className = 'blog-nav-item active';
}



function negrito(id) {
  document.getElementById("a-todosProjetos").style.fontWeight = 'normal';
  document.getElementById("a-arquivados").style.fontWeight = 'normal';
  document.getElementById("a-politicos").style.fontWeight = 'normal';
  document.getElementById("a-ranking").style.fontWeight = 'normal';
  document.getElementById(id).style.fontWeight = 'bold';
}



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