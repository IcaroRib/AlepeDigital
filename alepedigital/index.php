<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/fav.png">
    <!--
	<meta name="description" content="Teste do bootstrap!"/>
	<meta name="author" content="gmathx"/>
	<meta name="keywords" content="conhecimento, cambio, troca"/>
	-->
	
	<title>Alepe Digital</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

</head>
<body onresize="ptype2alt();" onload="loadContent(); cepRequest(); ptype2alt();">
	<div id="main-header" >
		<center>
		<div class="container" id="inline-block-header">
			<img id="logo" src="img/alepe-logo.png">
			<h1 class="h1-type-1"><font color="#20579F">@</font>ALEPEDIGITAL</h1>
			<div id="ptype1-not-logged" class="p-type-1">
				<br/>Faça Login ou Cadastre-se para<br/> poder usufruir dos recursos do site!<br/><br/>
				<!-- Trigger the modal with a button -->
				<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#login-modal">Faça o Login ou Cadastre-se</button>
			</div>
			<div id="ptype1-logged" class="p-type-1 not-logged">
				<img id="user-pic" class="user-pic" src="http://www.depressedfan.com/mt-static/images/default-userpic-90.jpg">
				<!-- Trigger the modal with a button -->
				<br/>
				<div class="btn-group">
				  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Bem-vindo, Guilherme! <span class="caret"></span>
				  </button>
				  <ul id="" class="dropdown-menu lower-font">
				    <li><a id="" href="#">Seu perfil</a></li>
				    <li><a id="" href="#">Configurações de conta</a></li>
				    <li><a id="" href="#">Alterar senha</a></li>
				    <li><a id="" href="#">Sair</a></li>
				  </ul>
				</div>
			</div>
			<button id="" type="button" class="btn btn-xs btn-primary button-header" data-toggle="modal" data-target="#login-modal" style="display:none;">Login / Cadastro</button>
			
			<div class="btn-group button-header">
				  <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Bem-vindo, Guilherme! <span class="caret"></span>
				  </button>
				  <ul id="" class="dropdown-menu lower-font">
				    <li><a id="" href="#">Seu perfil</a></li>
				    <li><a id="" href="#">Configurações de conta</a></li>
				    <li><a id="" href="#">Alterar senha</a></li>
				    <li><a id="" href="#">Sair</a></li>
				  </ul>
				</div>
		</div>
		</center>

		<div id="main-menu" class="blog-masthead">
	      <div class="container">

	        <nav class="blog-nav">
	          <a id="nav-1-elem" class="blog-nav-item active" href="/p/alepedigital/" onfocus="changeClassNav('nav-1-elem')">Início </a><a class="separator"> /</a>
	          <a id="nav-2-elem" class="blog-nav-item" href="#" onfocus="changeClassNav('nav-2-elem')">Sobre </a><a class="separator"> /</a>
	          <a id="nav-3-elem" class="blog-nav-item" href="#" onfocus="changeClassNav('nav-3-elem')">Contato </a><a class="separator"> /</a>
	          <a id="nav-4-elem" class="blog-nav-item" href="http://www.alepe.pe.gov.br/" onfocus="changeClassNav('nav-4-elem')">Alepe Oficial</a>
	        </nav>
	      </div>
	    </div>
    </div>




    <!-- CONTENT -->
    <br/><br/>

    <div class="container">
	  <div id="row-fixer" class="row">

	  <!-- NAVBAR ON TOP -->
	  	<div id="second-navbar">
			<div class="btn-group">
			  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Exibir <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
			    <li><a id="a-top-todosProjetos" href="#todosProjetos" data-div="cards-div" onclick="showDiv(this)">Todos os Projetos</a></li>
			    <li><a id="a-top-arquivados" href="#arquivados" data-div="arquivadas-div" onclick="showDiv(this)">Arquivados</a></li>
			    <li><a id="a-top-politicos" href="#politicos" data-div="politicos-div" onclick="showDiv(this)">Políticos</a></li>
			    <li><a id="a-top-ranking" href="#ranking" data-div="ranking-div" onclick="showDiv(this)">Ranking</a></li>
			    <li hidden><a href="#">Perfil</a></li>
			  </ul>
			</div>

			<div id="painel-filtrar-top" class="btn-group">
			  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Filtrar <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
			    <li>
			    	<select id="select-alt-1" class="form-control">
	              	  <option id="opt-recentes" value="1" selected>Mais Recentes</option>
					  <option id="opt-comentados" value="2">Mais Comentados</option>
					  <option id="opt-discutidos" value="3">Mais Discutidos</option>
					  <option id="opt-votados" value="4">Mais Votados</option>
					  <option id="opt-amigos" value="5">Amigos Votaram</option>
					</select>
			    </li>
			    <li>
			    	<select id="select-alt-2" class="form-control">
	              	  <option disabled selected hidden>Município</option>
					  <option>Paulista</option>
					  <option>Jaboatão dos Guararapes</option>
					  <option>Pau de Jangada</option>
					  <option>Casa da Mãe Joana</option>
					  <option>Porta dos Fundos</option>
					</select>
			    </li>
			    <li>
			    	<select id="select-alt-3" class="form-control">
	              	  <option disabled selected hidden>Partido</option>
					  <option>PT</option>
					  <option>PSD</option>
					  <option>PCdoB</option>
					  <option>Solidariedade</option>
					  <option>PSOL</option>
					</select>
			    </li>
			    <li>
			    	<select id="select-alt-4" class="form-control" title="Em breve!" disabled>
	              	  <option disabled selected hidden>Categoria</option>
					</select>
			    </li>
			  </ul>
			</div>

			<!-- painel filtrar top politicos -->
			<div id="painel-filtrar-top-politicos" class="btn-group">
			  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Filtrar <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
			    <li>
			    	<select id="select-alt-5" class="form-control">
	              	  <option disabled selected hidden>Ordenar por</option>
					  <option>Paulista</option>
					  <option>Jaboatão dos Guararapes</option>
					  <option>Pau de Jangada</option>
					  <option>Casa da Mãe Joana</option>
					  <option>Porta dos Fundos</option>
					</select>
			    </li>
			    <li>
			    	<select id="select-alt-6" class="form-control">
	              	  <option disabled selected hidden>Partido</option>
					  <option>PT</option>
					  <option>PSD</option>
					  <option>PCdoB</option>
					  <option>Solidariedade</option>
					  <option>PSOL</option>
					</select>
			    </li>
			  </ul>
			</div>
			<!-- fim painel filtrar top politicos -->

			<!-- painel filtrar top ranking -->
			<div id="painel-filtrar-top-ranking" class="btn-group">
			  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Filtrar <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
			    <li><a id="a-top-geral" href="#" >Aceitação Geral</a></li>
			    <li><a id="a-top-votosprojeto" href="#" >Votos por Projeto</a></li>
			    <li><a id="a-top-totalvotos" href="#" >Total de Votos</a></li>
			    <li><a id="a-top-votossim" href="#" >Votos Sim</a></li>
			    <li><a id="a-top-votosnao" href="#" >Votos Não</a></li>
			  </ul>
			</div>
			<!-- fim painel filtrar top ranking -->

			<div class="btn-group">
			  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Interesses <span class="caret"></span>
			  </button>
			  <ul id="ul-tags" class="dropdown-menu">
			  	<div id="" class="list-group logged">

				  <a id="" href="#" class="list-group-item interesses-tag"> #tag1</a>
				  <a id="" href="#" class="list-group-item interesses-tag"> #tag2</a>
 				  <a id="" href="#" class="list-group-item interesses-tag"> #tag3</a>
 				  <a id="" href="#" class="list-group-item interesses-tag"> #tag4</a>
 				  <a id="" href="#" class="list-group-item interesses-tag"> #tag5</a>
 				  <a id="" href="#" class="list-group-item interesses-tag"> #tag6</a>
 				  <a id="" href="#" class="list-group-item interesses-tag"> #tag7</a>
 				  <a id="" href="#" class="list-group-item interesses-tag"> #tag8</a>
 				  <a id="" href="#" class="list-group-item interesses-tag"> #tag9</a>


				</div>

				<div id="" class="list-group div-not-logged">
				  <p id="p-side-top" class="p-type-2">
					Faça Login ou Cadastre-se para poder usufruir dos recursos do site!<br/><br/>
					<!-- Trigger the modal with a button -->
					<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#login-modal">Login / Cadastro</button>
				  </p>
				</div>			    

			  </ul>
			</div>

			<div id="div-search-box-2" class="btn-group">
			  <div id="search-box-2" class="input-group">
			    <input id="search-sp" type="text" class="form-control" placeholder="Buscar">
				  <span class="input-group-btn">
				    <button id="search-sp-btn" class="btn btn-default" type="button">
				  	  <span class="glyphicon glyphicon-search"></span>
				    </button>
				  </span>
			  </div><!-- /input-group -->
			</div>
		</div>
		<!-- END OF NAVBAR ON TOP -->


		<!-- NAVBAR ON LEFT SIDE -->
	    <div id="main-sidebar" class="col-xs-3 col-xs-push-0">

	      <div id="search-box-1" class="input-group">
			<input id="search-sp" type="text" class="form-control" placeholder="Buscar">
			  <span class="input-group-btn">
				<button id="search-sp-btn" class="btn btn-default" type="button">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			  </span>
		  </div><!-- /input-group -->

		  <br/>


		  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      		<div id="painel-exibir" class="panel panel-primary">
        	  <div class="panel-heading" role="tab" id="headingOne">
          		<h4 class="panel-title">
            	  <a id="menu-exibir" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="">
              	    Exibir <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
            	  </a>
          		</h4>
        	  </div>
        	  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">
          		<div class="panel-body">
            	  <div class="list-group">

				    <button id="a-todosProjetos" href="#todosProjetos" class="list-group-item" data-div="cards-div" onclick="showDiv(this)">Todos os Projetos</button>
				    <button id="a-arquivados" href="#arquivados" class="list-group-item" data-div="arquivadas-div" onclick="showDiv(this)">Arquivados</button>
				    <button id="a-politicos" href="#politicos" class="list-group-item" data-div="politicos-div" onclick="showDiv(this)">Políticos</button>
				    <button id="a-ranking" href="#ranking" class="list-group-item" data-div="ranking-div" onclick="showDiv(this)">Ranking</button>
				    <!-- <a id="a-perfil" href="#" class="list-group-item" onclick="showDiv('perfil-div')">Perfil</a> -->


				  </div>
          		</div>
        	  </div>
      		</div>
      		<div id="painel-filtrar-side" class="panel panel-primary">
        	  <div class="panel-heading" role="tab" id="headingTwo">
          		<h4 class="panel-title">
            	  <a id="menu-filtrar" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              	    Filtrar <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
            	  </a>
          		</h4>
        	  </div>
        	  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
          		<div class="panel-body">
            	  <div class="list-group">

            	  	<div class="list-group-item" id="f-1">  
		              	<select id="select-1" class="form-control">
		              	  <option id="opt-recentes" value="1" selected>Mais Recentes</option>
						  <option id="opt-comentados" value="2">Mais Comentados</option>
						  <option id="opt-discutidos" value="3">Mais Discutidos</option>
						  <option id="opt-votados" value="4">Mais Votados</option>
						  <option id="opt-amigos" value="5">Amigos Votaram</option>
						</select>
     				</div>

     				<div class="list-group-item" id="f-2">
     					<select id="select-2" class="form-control">
		              	  <option disabled selected hidden>Município</option>
						  <option>Paulista</option>
						  <option>Jaboatão dos Guararapes</option>
						  <option>Pau de Jangada</option>
						  <option>Casa da Mãe Joana</option>
						  <option>Porta dos Fundos</option>
						</select>
					</div>


  					<div class="list-group-item" id="f-3">  
		              	<select id="select-3" class="form-control">
		              	  <option disabled selected hidden>Partido</option>
						  <option>PT</option>
						  <option>PSD</option>
						  <option>PCdoB</option>
						  <option>Solidariedade</option>
						  <option>PSOL</option>
						</select>
     				</div>

     				<div class="list-group-item" id="f-7">  
		              	<select id="select-7" class="form-control">
		              	  <option disabled selected hidden>Status</option>
						  <option>Aprovados</option>
						  <option>Reprovados</option>
						</select>
     				</div>

     				<div class="list-group-item" id="f-4">  
		              	<select id="select-4" class="form-control" title="Em breve!" disabled>
		              	  <option disabled selected hidden>Categoria</option>
						</select>
     				</div>


				  </div>
          		</div>
        	  </div>
      		</div>
      		<!-- PAINEL FILTRAR SIDE POLÍTICOS -->
      		<div id="painel-filtrar-side-politicos" class="panel panel-primary">
        	  <div class="panel-heading" role="tab" id="headingFour">
          		<h4 class="panel-title">
            	  <a id="menu-filtrar-alt" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              	    Filtrar <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
            	  </a>
          		</h4>
        	  </div>
        	  <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
          		<div class="panel-body">
            	  <div class="list-group">

            	  	<div class="list-group-item" id="f-5">
     					<select id="select-5" class="form-control">
		              	  <option disabled selected hidden>Ordenar por</option>
						  <option>Paulista</option>
						  <option>Jaboatão dos Guararapes</option>
						  <option>Pau de Jangada</option>
						  <option>Casa da Mãe Joana</option>
						  <option>Porta dos Fundos</option>
						</select>
					</div>


  					<div class="list-group-item" id="f-6">  
		              	<select id="select-6" class="form-control">
		              	  <option disabled selected hidden>Partido</option>
						  <option>PT</option>
						  <option>PSD</option>
						  <option>PCdoB</option>
						  <option>Solidariedade</option>
						  <option>PSOL</option>
						</select>
     				</div>


				  </div>
          		</div>
        	  </div>
      		</div>
      		<!-- FIM PAINEL FILTRAR SIDE POLÍTICOS -->

      		<!-- PAINEL FILTRAR SIDE RANKING -->
      		<div id="painel-filtrar-side-ranking" class="panel panel-primary">
        	  <div class="panel-heading" role="tab" id="headingFive">
          		<h4 class="panel-title">
            	  <a id="menu-filtrar-rank" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive" class="collapsed">
              	    Filtrar <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
            	  </a>
          		</h4>
        	  </div>
        	  <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false" style="height: 0px;">
          		<div class="panel-body">
            	  <div class="list-group">

            	  	<a id="a-side-geral" href="#" class="list-group-item">Aceitação Geral</a>
				    <a id="a-side-votosprojeto" href="#" class="list-group-item">Votos por Projeto</a>
				    <a id="a-side-totalvotos" href="#" class="list-group-item">Total de Votos</a>
				    <a id="a-side-votossim" href="#" class="list-group-item">Votos Sim</a>
				    <a id="a-side-votosnao" href="#" class="list-group-item">Votos Não</a>

				  </div>
          		</div>
        	  </div>
      		</div>
      		<!-- FIM PAINEL FILTRAR SIDE RANKING -->

      		<!-- PAINEL SIDE INTERESSES -->
      		<div id="painel-interesses" class="panel panel-primary">
        	  <div class="panel-heading" role="tab" id="headingThree">
          		<h4 class="panel-title">
            	  <a id="menu-favs" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              		Interesses <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
            	  </a>
          		</h4>
        	  </div>
        		<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
          		  <div class="panel-body">
            		<div id="" class="list-group logged">

  					  <a id="" href="#" class="list-group-item interesses-tag"> #tag1</a>
  					  <a id="" href="#" class="list-group-item interesses-tag"> #tag2</a>
     				  <a id="" href="#" class="list-group-item interesses-tag"> #tag3</a>
     				  <a id="" href="#" class="list-group-item interesses-tag"> #tag4</a>
     				  <a id="" href="#" class="list-group-item interesses-tag"> #tag5</a>
     				  <a id="" href="#" class="list-group-item interesses-tag"> #tag6</a>
     				  <a id="" href="#" class="list-group-item interesses-tag"> #tag7</a>
     				  <a id="" href="#" class="list-group-item interesses-tag"> #tag8</a>
     				  <a id="" href="#" class="list-group-item interesses-tag"> #tag9</a>


					</div>

					<div id="" class="list-group div-not-logged">
					  <p id="p-side-left" class="p-type-2">
						Faça Login ou Cadastre-se para poder usufruir dos recursos do site!<br/><br/>
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#login-modal">Login / Cadastro</button>
					  </p>
					</div>

          		  </div>
        		</div>
      		  </div>
      		  <!-- FIM PAINEL SIDE INTERESSES -->

      		  <center id="legenda-arquivados">
      			<p class="legenda-box">
      		  	  <a id="filtrar-arquivados-a" class="bold-on-hover"><img src="img/card-maker-a.png" width="16" height="16"/> - Aprovados</a>
      		  	  <a id="filtrar-arquivados-r" class="bold-on-hover"><img src="img/card-maker-r.png" width="16" height="16"/> - Reprovados</a>
      			</p>
      		  </center>  		  


    	  </div>
    	</div>
    	<!-- FIM DA SIDEBAR -->

    	  

    	
    	<!-- MAIN CONTENT -->
        <div id="content-div" class="col-sm-8 col-sm-offset-0 blog-main">
          <!-- DIV POSTAGENS: Cards -->
          <div id="cards-div" class="blog-post"></div>
          <!-- END OF DIV POSTAGENS: Cards -->

          <!-- DIV POSTAGENS: Cards -->
          <div id="arquivadas-div" class="blog-post"></div>
          <!-- END OF DIV POSTAGENS: Cards -->

          <!-- DIV POSTAGENS: Cards -->
          <div id="politicos-div" class="blog-post"></div>
          <!-- END OF DIV POSTAGENS: Políticos -->

          <!-- DIV POSTAGENS: Cards -->
          <div id="ranking-div" class="blog-post">
          	<table class="table">
          	  <thead>
				<tr>
				  <th class="center-txt"><abbr title="Classificação no ranking.">#posição</abbr></th>
				  <th class="center-txt"><abbr title="Informações resumidas da figura política.">#deputado</abbr></th>
				  <th class="center-txt"><abbr title="Índice de aprovação média dos projetos registrados no site. É necessário que haja um somatório mínimo de 5000 votos para entrar no ranking.">#aceitaçãoGeral (%)</abbr></th>
				  <th class="center-txt"><abbr title="Quantidade média de votos por projeto">#médiaDeVotos</abbr></th>
				  <th class="center-txt"><abbr title="Quantidades totais de votos positivos, negativos e geral">#quantidadeDeVotos</abbr></th>
				</tr>
			  </thead>
			  <tbody id="ranking-div-table" class="center-txt"></tbody>
			</table>
          </div>
          <!-- END OF DIV POSTAGENS: Cards -->

          <!-- DIV POSTAGENS: politico -->
          <div id="politico-div" class="blog-post"></div>
          <!-- END OF DIV POSTAGENS: politico -->

          <!-- DIV POSTAGENS: projeto -->
          <div id="projeto-div" class="blog-post"></div>
          <!-- END OF DIV POSTAGENS: projeto -->

          <!-- DIV CADASTRO -->
          <div id="cadastro-div" class="blog-post">
            <h1 class="blog-post-title">CADASTRO</h1>

            <form id="cadastro-form" class="navbar-form">
            	<ul id="cadastro-ul" type="none">
            		<li class="li-fixer">
            			<label class="control-label" for="inputPic">Foto de Perfil</label>
						<input id="inputPic" type="file" accept="image/*" class="form-control">
            		</li>
            		<li class="li-fixer">
            			<label class="control-label" for="inputName">Nome Completo <abbr title="obrigatório">*</abbr></label>
						<input id="inputName" type="text" class="form-control" required>
            		</li>
            		<li class="li-fixer">
            			<label class="control-label" for="inputUsername">Nome de Usuário <abbr title="obrigatório">*</abbr></label>
						<input id="inputUsername" type="text" class="form-control" required>	
            		</li>
            		<li class="li-fixer">
            			<label class="control-label" for="datanascimento">Data de Nascimento <abbr title="obrigatório">*</abbr></label>
						<input id="datanascimento" type="date" class="form-control" required>
            		</li>
            		<li class="li-fixer">
            			<label class="control-label" for="inputSex">Sexo <abbr title="obrigatório">*</abbr></label>
						<select id="inputSex" class="form-control" required>
							<option disabled selected hidden>Selecione o sexo</option>
							<option value="M">Masculino</option>
							<option value="F">Feminino</option>
							<option value="U">Prefiro não declarar</option>
						</select>
            		</li>
            		<li class="li-fixer">
            			<label class="control-label" for="cep">CEP <abbr title="obrigatório">*</abbr> (<a class="stylized-link-anchor" href="http://www.buscacep.correios.com.br/sistemas/buscacep/" title="Não sei o meu CEP.">?</a>)</label>
						<input id="cep" name="cep" type="text" class="form-control" maxlength="8" placeholder="Apenas Números" required>
            		</li>
            		<li class="li-fixer">
            			<label class="control-label" for="estado">Estado</label>
						<input id="estado" name="estado" type="text" class="form-control" disabled>
            		</li>
            		<li class="li-fixer">
            			<label class="control-label" for="cidade">Cidade</label>
						<input id="cidade" name="cidade" type="text" class="form-control" disabled>
            		</li>
            		<li class="li-fixer">
            			<label class="control-label" for="bairro">Bairro</label>
						<input id="bairro" name="bairro" type="text" class="form-control" disabled>
            		</li>
            		<li class="li-fixer">
            			<label class="control-label" for="rua">Logradouro</label>
						<input id="rua" name="rua" type="text" class="form-control" disabled>
            		</li>
            		<li class="li-fixer">
            			<label class="control-label" for="email">E-mail <abbr title="obrigatório">*</abbr></label>
						<input id="email" type="email" class="form-control" required>		        		
            		</li>
            		<li class="li-fixer">
            			<label class="control-label" for="emailconf">Confirmar E-mail <abbr title="obrigatório">*</abbr></label>
						<input id="emailconf" type="email" class="form-control" required>		        		
            		</li>
            		
            		<li class="li-fixer">
            			<label class="control-label" for="senha">Senha <abbr title="obrigatório">*</abbr></label>
						<input id="senha" type="password" class="form-control" required>		        		
            		</li>
            		<li class="li-fixer">
            			<label class="control-label" for="senhaconf">Confirmar Senha <abbr title="obrigatório">*</abbr></label>
						<input id="senhaconf" type="password" class="form-control" required>
            		</li>
            		<li class="li-fixer">
            			<input id="receber-news" type="checkbox">
            			<label class="control-label" for="receber-news">Desejo receber notificações por e-mail.</label>
            		</li>
            	</ul>
            	<br/>
            	<center>
            	  <button id="btn-cad-voltar" class="btn btn-default" data-div="cards-div" onclick="showDiv(this)">Voltar</button>
            	  <button id="btn-cad-enviar" type="submit" class="btn btn-success">Enviar</button>
            	</center>
            	
          	</form>
          </div>

          <!-- DIV POSTAGENS: loading -->
          <div id="loading" class="blog-post"></div>
          <!-- END OF DIV POSTAGENS: Cards -->



    	</div><!-- /.blog-main -->

      </div>
	</div>


	<!-- END OF CONTENT-->
	
	

	<!-- Modal -->
	<div id="login-modal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <p class="modal-title">Iniciar Sessão</p>
	      </div>
	      <div class="modal-body">
	      	<center>
		        <button class="btn btn-sm btn-primary">Login com Facebook</button>
		        <button class="btn btn-sm btn-danger">Login com G+</button>
		        <br/><br/><i>-- ou --</i><br/><br/>
		        <form class="navbar-form">
	            	<div class="form-group">
	            		<input type="text" placeholder="E-mail / Nome de Usuário" class="form-control">
	            	</div>
	            	<div class="form-group">
	              		<input type="password" placeholder="Senha" class="form-control">
	            	</div>
	            	<button type="submit" class="btn btn-sm btn-success">Entrar</button>
	          	</form>
	          	<a href="#" class="stylized-link-anchor">Esqueci minha senha.</a>
	          	<br/><br/>
	          	<div id="alert-not-logged" class="alert alert-danger" role="alert">
			        <strong>Falha!</strong> Informações de login inválidas.
			    </div>
	          	<hr>
	          	Não possue registro e/ou não quer logar com Facebook ou G+?
	          	<br/><br/>
	          	<button id="btn-cad-mod" class="btn btn-sm btn-default" type="button" data-dismiss="modal" data-div='cadastro-div' onclick="showDiv(this)">Registre-se com um e-mail</button>
	        </center>
	      </div>
	    </div>
	  </div>
	</div>





	<footer class="blog-footer">
      <p>Alepe Digital. <i>Designed by <a href="#">@gmathx</a> / <a href="#">@icaro-ribeiro</a>.</i></p>
    </footer>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/Charts.js"></script>
	<!-- <script type="text/javascript" src="js/bootstrap-slider.js"></script> -->
	<script type="text/javascript" src="js/personal.js"></script>
	
</body>
</html>