<?php

include_once("../dominio/Usuario.php");
include_once("../dominio/LeiOrdinaria.php");
include_once("../dominio/Status.php");
include_once("../dominio/Partido.php");
include_once("../dominio/Deputado.php");
include_once("../common/tools/_tools.php");
include_once("../common/utils/Conversor.php");
include_once("../DAO/LeiDAO.php");
include_once("../DAO/UsuarioDAO.php");
include("../formater/ProjetoFormater.php");

if(!empty($_SESSION["usuario"])){
	$usuario = $_SESSION["usuario"];
}
else{
	$usuario = new Usuario();

}

if (!empty($_GET["num"])) {

	$num_prop = $_GET["num"];
	$formater = new ProjetoFormater($usuario,$num_prop);
    $formater->montarPagina();
	$formater->formatarPagina();
	$formater->gerarPagina();


	// CHECA SE A POSTAGEM ABERTA É SEGUIDA PELO USUÁRIO EM SESSÃO OU NÃO; PODE SER USADO COMO ARGUMENTO OS IDS DA POSTAGEM E DO USER. IMPLEMENTAR EM _tools.php
//              }

	/*$nome_candidato = "Abel Salvador Mesquita Junior";

    $content->find('div[id=porjeto-corpus]', 0)->{'data-id'} = $num_prop;
    // CHECAR SE LEI FOI VOTADA FOR USUÁRIO EM SESSÃO, SE HHOUVE E ADEQUAR SEU VOTOS AQUI ABAIXO
    $content->find('div[id=porjeto-corpus]', 0)->{'data-voted'} = 0; //REPRESENTA LEI VOTADA
    $content->find('div[id=porjeto-corpus]', 0)->{'data-vote'} = ""; //REPRESENTA O VOTO 1 = SIM 0 = NÃO
    $content->find('h2[class=lei-desc-curta]', 0)->innertext = "Aumentará a cobrança do Imposto de Renda sobre o lucro obtido com a venda de bens como imóveis, terrenos e joias.";
    $content->find('img[class=lei-img-pol]', 0)->src = "https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg";
    $content->find('a[id=a-nomePol]', 0)->innertext = $nome_candidato;
    $content->find("a[id=a-nomePol]",0)->href = POLITICO . "?nome=" . $nome_candidato;
    $content->find('p[class=lei-pol] strong', 0)->innertext = "PT"; //SIGLA DO PARTIDO
    $content->find('p[class=lei-pol] em', 0)->innertext = "06/01/2016"; //DATA DE SUBMISSÃO
    $content->find('p[class=lei-info] strong', 0)->innertext = "Complementar"; //TIPO DO PROJETO
    $content->find('p[class=lei-info] strong', 1)->innertext = "Reprovada"; //SITUAÇÃO
    // $content->find('p[class=lei-info] strong', 2)->innertext = "Saúde"; //CATEGORIA
    $content->find('p[class=lei-info] a', 0)->href = "http://google.com/"; //LINK PUBLICACAO NA ÍNTEGRA
    $content->find('a[id=seguir-projeto]', 0)->{'data-status'} = ($status_following === true) ? '1' : '0';
    $content->find('a[id=seguir-projeto]', 0)->{'onclick'} = "follow_project($num_prop)"; //FUNÇÃO PARA ADICIONAR ASSOCIAÇÃO USUARIO_POSTAGEMSEGUIDA NO BANCO, UTILIZA-SE DOS DADOS SALVAOS NA SEÇÃO
    $content->find('img[class=lei-img]', 0)->src = "http://votenaweb.s3-sa-east-1.amazonaws.com/bills/images/8163/original/votenaweb_MP-692-2015.jpg?1447263935";
    $content->find('p[class=lei-desc-longa]', 0)->innertext = "Esta medida provisória vai aumentar o Imposto de Renda sobre ganhos de capital, ou seja, o lucro obtido pela venda de bens, quando o lucro for superior a um milhão de reais.<br/>Hoje, a tributação é de 15%. A MP propõe uma gradação entre 15% e 30%.<br/>De acordo com o texto, a atual alíquota de 15% de imposto será mantida apenas em ganhos inferiores a R$ 1 milhão. O teto agora é de 30%, para ganho superior a 20 milhões.<br/>Os percentuais serão:<br/>- 15% sobre a parcela dos ganhos que não ultrapassar R$ 1 milhão;<br/>- 20% sobre a parcela dos ganhos entre R$ 1 milhão e R$ 5 milhões;<br/>- 25% sobre a parcela dos ganhos entre R$ 5 milhões e R$ 20 milhões;<br/>- 30% sobre a parcela dos ganhos que ultrapassar R$ 20 milhões.<br/>A MP 692 também propõe modificações quanto à forma de pagamento e ao prazo para adesão do Prorelit – Programa de Redução de Litígios Tributários, instituído pela MP 685/15.<br/>O Prorelit permite a quitação de débitos com o uso de créditos tributários em troca de as companhias desistirem de questionar as dívidas na Justiça ou na esfera administrativa. A medida editada prorroga por um mês o prazo para a apresentação do requerimento de desistência do contencioso para utilização dos créditos, passando de setembro para 30 de outubro deste ano.<br/>Além disso, reduz a parcela inicial, que é o valor mínimo pago em espécie necessário à apresentação do requerimento. Inicialmente, o contribuinte poderia quitar 43% do débito à vista e pagar o restante com créditos do IRPJ e da CSLL.<br/>Agora, a parcela inicial caiu para 30% a 36% da dívida total:<br/>- 30%, a ser efetuado até 30 de outubro de 2015;<br/>- 33% , a ser efetuado em duas parcelas vencíveis até o último dia útil dos meses de outubro e novembro de 2015; ou<br/>- 36% , a ser efetuado em três parcelas vencíveis até o último dia útil dos meses de outubro, novembro e dezembro de 2015.<br/><br/><strong>Fonte:</strong> site Migalhas"; //LINK PUBLICACAO NA ÍNTEGRA
    $content->find('p[class=p-alt-politico] font[color=black]', 0)->innertext = 1034; //TOTAL DE VOTOS
    $content->find('p[class=p-alt-politico] font[color=green]', 0)->innertext = 720; //VOTOS SIM
    $content->find('p[class=p-alt-politico] font[color=red]', 0)->innertext = 294; //VOTOS NAO
//              foreach ($localidades as $idx => $local) { //PERCORRER E PREENCHER LOCALIDADES
//                      $opt = "<option value='". $idx ."'>". $local ."</option>";
//                      $content->find('select#localidade-filter', 0)->innertext .= $opt;
            $content->find('select#localidade-filter', 0)->innertext .= "<option value='0'>Jaboatão dos Guararapes</option>";
//              }
    // RECUPERAR DO BANCO AS IDADE MÁXIMA E MÍNIMA
    $ages = get_ages();
    $ages_opts = create_option_ages($ages["min"],$ages["max"]);
    $content->find('select[id=min-age-filter]',0)->innertext .= $ages_opts; //
    $content->find('select[id=max-age-filter]',0)->innertext .= $ages_opts; //
    $content->find('button[id=relevancia-urgente]',0)->title =  10 . " votos"; //
    $content->find('button[id=relevancia-relevante]',0)->title = 20 . " votos"; //
    $content->find('button[id=relevancia-inviavel]',0)->title = 30 . " votos"; //
    $content->find('button[id=relevancia-irrelevante]',0)->title = 40 . " votos"; //
    $content->find('button[id=relevancia-absurdo]',0)->title = 50 . " votos"; //
    $content->find('button[id=relevancia-urgente] span',0)->innertext =  10 . "%"; //
    $content->find('button[id=relevancia-relevante] span',0)->innertext = 20 . "%"; //
    $content->find('button[id=relevancia-inviavel] span',0)->innertext = 30 . "%"; //
    $content->find('button[id=relevancia-irrelevante] span',0)->innertext = 10 . "%"; //
    $content->find('button[id=relevancia-absurdo] span',0)->innertext = 30 . "%"; //
    $content->find('span[id=total-votos]',0)->innertext = 2180 . ""; //

    $content->find('canvas[id=leiChart]', 0)->{'data-yes-percent'} = 70;
    $content->find('canvas[id=leiChart]', 0)->{'data-no-percent'} = 30;

    // FUNCIONAMENTO DE VOTOS SIM/NAO EXPLICADO EM GET CONTENTS DE todosProjetos
    $content->find('p[id=p-btn-yes-no]', 0)->{'data-voted'} = 0;
    $content->find('p[id=p-btn-yes-no]', 0)->{'data-vote'} = "";
    $content->find('button[id=btn-lei-yes]', 0)->onclick = "set_vote_yes(document.getElementById('p-btn-yes-no'),this);";
    $content->find('button[id=btn-lei-no]', 0)->onclick = "set_vote_no(document.getElementById('p-btn-yes-no'),this);";

    // A URGÊNCIA FUNCIONA NOS MESMO MOLDES DO VOTO SIM E NÃO, PORÉM COM 5 VALORES NA  VARIÁVEL "data-vote"
    // ONDE 1 = urgente e 5= absurdo
    $content->find('center[id=enquete]', 0)->{'data-voted'} = 0;
    $content->find('center[id=enquete]', 0)->{'data-vote'} = "";
    $content->find('button[id=relevancia-urgente]', 0)->onclick = "set_vote_urgente(document.getElementById('enquete'),this);";
    $content->find('button[id=relevancia-relevante]', 0)->onclick = "set_vote_relevante(document.getElementById('enquete'),this);";
    $content->find('button[id=relevancia-inviavel]', 0)->onclick = "set_vote_inviavel(document.getElementById('enquete'),this);";
    $content->find('button[id=relevancia-irrelevante]', 0)->onclick = "set_vote_irrelevante(document.getElementById('enquete'),this);";
    $content->find('button[id=relevancia-absurdo]', 0)->onclick = "set_vote_absurdo(document.getElementById('enquete'),this);";
    // IMPORTATE! NÃO ESQUECER DE RECALCULAR AS PORCENTAGENS E SETAR NOVAMENTE NOS BOTÕES
    // E INCREMENTAR NA QT DE VOTOS TOTAIS E INDIVIDUAL


    $mapa_pe = file_get_html(HTML_PROJETO."mapa_pernambuco.html");
    // configuração do mapa
    $to10 = "#D3312E"; // até 10% - 0,0 > x <= 0,1
    $to20 = "#DC6434"; // até 20% - 0,1 > x <= 0,2
    $to30 = "#E58B38"; // até 30% - ...
    $to40 = "#EEB03D"; // até 40% - ...
    $to50 = "#F9D73F"; // até 50% - ...
    $to60 = "#F9D73F"; // até 60% - ...
    $to70 = "#CBC544"; // até 70% - ...
    $to80 = "#9BAF47"; // até 80% - ...
    $to90 = "#709A4D"; // até 90% - 0,8 > x <= 0,9
    $to100 = "#408752"; // até 100% - 0,9 > x <= 1,0

    // fazer cálculos de qt de votos e adequar cores em função da porcentagem
    // função para cálculo:

//              $porcentagem = ($quantidade_de_votos_sim) / $quantidade_total_de_votos;

    // isso para todos os municípios. checar arquivo common/html/projeto/mapa_pernambuco.html
    // e associar os ids dos paths a todos os 180 municípios. boa sorte :)
    // exemplo de como ficaria abaixo (para os municípios com votos totais maiores do que 0)
    $mapa_pe->find('path[id=path14]', 0)->style = 'fill:'.$to10.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
    $mapa_pe->find('path[id=path16]', 0)->style = 'fill:'.$to20.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
    $mapa_pe->find('path[id=path18]', 0)->style = 'fill:'.$to30.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
    $mapa_pe->find('path[id=path20]', 0)->style = 'fill:'.$to40.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
    $mapa_pe->find('path[id=path22]', 0)->style = 'fill:'.$to50.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
    $mapa_pe->find('path[id=path24]', 0)->style = 'fill:'.$to60.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
    $mapa_pe->find('path[id=path26]', 0)->style = 'fill:'.$to70.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
    $mapa_pe->find('path[id=path28]', 0)->style = 'fill:'.$to80.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
    $mapa_pe->find('path[id=path30]', 0)->style = 'fill:'.$to90.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
    $mapa_pe->find('path[id=path32]', 0)->style = 'fill:'.$to100.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';

    $content->find('div[id=map-svg]',0)->innertext = $mapa_pe;*/
	
}

else {
	header("Location: ". HOME);
}




?>
