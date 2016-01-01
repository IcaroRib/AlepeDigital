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
<body onresize="ptype2alt()">
	<div id="main-header" >
		<center>
		<div class="container" id="inline-block-header">
			<img id="logo" src="img/alepe-logo.png">
			<h1 class="h1-type-1"><font color="#20579F">@</font>ALEPEDIGITAL</h1>
			<p class="p-type-1">
				<br/>Faça Login ou Cadastre-se para<br/> poder usufruir dos recursos do site!<br/><br/>
				<!-- Trigger the modal with a button -->
				<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#login-modal">Faça o Login ou Cadastre-se</button>
			</p>
			<button id="button-header" type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#login-modal">Login / Cadastro</button>
		</div>
		</center>

		<div class="blog-masthead">
	      <div class="container">

	        <nav class="blog-nav">
	          <a id="nav-1-elem" class="blog-nav-item active" href="#" onblur="negritoOff()" onfocus="changeClassNav('nav-1-elem')">Início </a><a class="separator"> /</a>
	          <a id="nav-2-elem" class="blog-nav-item" href="#" onblur="negritoOff()" onfocus="changeClassNav('nav-2-elem')">Sobre </a><a class="separator"> /</a>
	          <a id="nav-3-elem" class="blog-nav-item" href="#" onblur="negritoOff()" onfocus="changeClassNav('nav-3-elem')">Contato </a><a class="separator"> /</a>
	          <a id="nav-4-elem" class="blog-nav-item" href="http://www.alepe.pe.gov.br/" onblur="negritoOff()" onfocus="changeClassNav('nav-4-elem')">Alepe Oficial</a>
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
			    <li><a href="#">Todos os Projetos</a></li>
			    <li><a href="#">Arquivados</a></li>
			    <li><a href="#">Políticos</a></li>
			    <li><a href="#">Ranking</a></li>
			    <li hidden><a href="#">Perfil</a></li>
			  </ul>
			</div>

			<div class="btn-group">
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

			<div class="btn-group">
			  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Interesses <span class="caret"></span>
			  </button>
			  <ul id="ul-tags" class="dropdown-menu">
			  	<div id="div-logged" class="list-group">

				  <a id="interesses-tag" href="#" class="list-group-item"> #tag1</a>
				  <a id="interesses-tag" href="#" class="list-group-item"> #tag2</a>
 				  <a id="interesses-tag" href="#" class="list-group-item"> #tag3</a>
 				  <a id="interesses-tag" href="#" class="list-group-item"> #tag4</a>
 				  <a id="interesses-tag" href="#" class="list-group-item"> #tag5</a>
 				  <a id="interesses-tag" href="#" class="list-group-item"> #tag6</a>
 				  <a id="interesses-tag" href="#" class="list-group-item"> #tag7</a>
 				  <a id="interesses-tag" href="#" class="list-group-item"> #tag8</a>
 				  <a id="interesses-tag" href="#" class="list-group-item"> #tag9</a>


				</div>

				<div id="div-not-logged" class="list-group">
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

				    <a id="a-todosProjetos" href="#" class="list-group-item" onblur="negritoOff()" onfocus="negrito('a-todosProjetos','a-arquivados','a-politicos','a-ranking','a-perfil')" onclick="showCadastro(false)">Todos os Projetos</a>
				    <a id="a-arquivados" href="#" class="list-group-item" onblur="negritoOff()" onfocus="negrito('a-arquivados','a-todosProjetos','a-politicos','a-ranking','a-perfil')">Arquivados</a>
				    <a id="a-politicos" href="#" class="list-group-item" onblur="negritoOff()" onfocus="negrito('a-politicos','a-arquivados','a-todosProjetos','a-ranking','a-perfil')">Políticos</a>
				    <a id="a-ranking" href="#" class="list-group-item" onblur="negritoOff()" onfocus="negrito('a-ranking','a-politicos','a-arquivados','a-todosProjetos','a-perfil')">Ranking</a>
				    <!-- <a id="a-perfil" href="#" class="list-group-item" onblur="negritoOff()" onfocus="negrito('a-perfil','a-politicos','a-arquivados','a-todosProjetos','a-ranking')">Perfil</a> -->


				  </div>
          		</div>
        	  </div>
      		</div>
      		<div id="painel-filtrar" class="panel panel-primary">
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


     				<div class="list-group-item" id="f-4">  
		              	<select id="select-4" class="form-control" title="Em breve!" disabled>
		              	  <option disabled selected hidden>Categoria</option>
						</select>
     				</div>


				  </div>
          		</div>
        	  </div>
      		</div>
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
            		<div id="div-logged" class="list-group">

  					  <a id="interesses-tag" href="#" class="list-group-item"> #tag1</a>
  					  <a id="interesses-tag" href="#" class="list-group-item"> #tag2</a>
     				  <a id="interesses-tag" href="#" class="list-group-item"> #tag3</a>
     				  <a id="interesses-tag" href="#" class="list-group-item"> #tag4</a>
     				  <a id="interesses-tag" href="#" class="list-group-item"> #tag5</a>
     				  <a id="interesses-tag" href="#" class="list-group-item"> #tag6</a>
     				  <a id="interesses-tag" href="#" class="list-group-item"> #tag7</a>
     				  <a id="interesses-tag" href="#" class="list-group-item"> #tag8</a>
     				  <a id="interesses-tag" href="#" class="list-group-item"> #tag9</a>


					</div>

					<div id="div-not-logged" class="list-group">
					  <p id="p-side-left" class="p-type-2">
						Faça Login ou Cadastre-se para poder usufruir dos recursos do site!<br/><br/>
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#login-modal">Login / Cadastro</button>
					  </p>
					</div>

          		  </div>
        		</div>
      		  </div>
    	  </div>
    	</div>
    	<!-- FIM DA SIDEBAR -->

    	  

    	
    	<!-- MAIN CONTENT -->
        <div id="content-div" class="col-sm-8 col-sm-offset-0 blog-main">
          <!-- DIV POSTAGENS: Cards -->
          <div id="cards-div" class="blog-post">
            <div id="card-maker" class="sidebar-module-inset">
            	<div class="card-img-spot">
            		<img class="card-img" src="http://www.culturamix.com/wp-content/gallery/homer-1/homer-simpson.jpg">	
            	</div>            	
            	<h4 class="card-name"><span class="label label-default">PLS 452-2015</span></h4>
            	<h4 class="card-seg"><span class="label label-warning">Saúde</span></h4>
            		            
	            <p class="card-box">Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
				
	            <p><div class="card-box">
	            	<img class="img-politico-small" height="32" width="32" src="https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg">
	            	<p class="p-alt-politico">Proposto pelo deputado<br/><strong>Dilma Rouseff</strong> do <strong>PT</strong></p>
	            </div></p>

	            <p id="p-btn-yes-no" class="card-box">
	            	<button id="btn-alt-yes" type="button" class="btn btn-sm btn-danger">NÃO</button>
	            	<button id="btn-alt-no" type="button" class="btn btn-sm btn-success">SIM</button>
	            </p>

	            <center><p id="card-footer" class="p-alt-politico">Votação: 1034, <font color="green">740 sim</font>, <font color="red"> 294 não.</font></p></center>
          	</div>

          	<div id="card-maker" class="sidebar-module-inset">
          		<div class="card-img-spot">
            		<img class="card-img" src="http://www.fatosdesconhecidos.com.br/wp-content/uploads/2015/10/south_park.png">
            	</div>
            	<h4 class="card-name"><span class="label label-default">PLS 452-2015</span></h4>
            	<h4 class="card-seg"><span class="label label-warning">Saúde</span></h4>
            		            
	            <p class="card-box">Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
				
	            <p><div class="card-box">
	            	<img class="img-politico-small" height="32" width="32" src="https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg">
	            	<p class="p-alt-politico">Proposto pelo deputado<br/><strong>Dilma Rouseff</strong> do <strong>PT</strong></p>
	            </div></p>

	            <p id="p-btn-yes-no" class="card-box">
	            	<button id="btn-alt-yes" type="button" class="btn btn-sm btn-danger">NÃO</button>
	            	<button id="btn-alt-no" type="button" class="btn btn-sm btn-success">SIM</button>
	            </p>

	            <center><p id="card-footer" class="p-alt-politico">Votação: 1034, <font color="green">740 sim</font>, <font color="red"> 294 não.</font></p></center>
          	</div>

          	<div id="card-maker" class="sidebar-module-inset">
            	<div class="card-img-spot">
            		<img class="card-img" src="http://www.saojoaodomanhuacu.mg.gov.br/images/stories/img/saude2.jpg">
            	</div>
            	<h4 class="card-name"><span class="label label-default">PLS 452-2015</span></h4>
            	<h4 class="card-seg"><span class="label label-warning">Saúde</span></h4>
            		            
	            <p class="card-box">Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
				
	            <p><div class="card-box">
	            	<img class="img-politico-small" height="32" width="32" src="https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg">
	            	<p class="p-alt-politico">Proposto pelo deputado<br/><strong>Dilma Rouseff</strong> do <strong>PT</strong></p>
	            </div></p>

	            <p id="p-btn-yes-no" class="card-box">
	            	<button id="btn-alt-yes" type="button" class="btn btn-sm btn-danger">NÃO</button>
	            	<button id="btn-alt-no" type="button" class="btn btn-sm btn-success">SIM</button>
	            </p>

	            <center><p id="card-footer" class="p-alt-politico">Votação: 1034, <font color="green">740 sim</font>, <font color="red"> 294 não.</font></p></center>
          	</div>

          	<div id="card-maker" class="sidebar-module-inset">
            	<div class="card-img-spot">
            		<img class="card-img" src="http://www.culturamix.com/wp-content/gallery/homer-1/homer-simpson.jpg">	
            	</div>            	
            	<h4 class="card-name"><span class="label label-default">PLS 452-2015</span></h4>
            	<h4 class="card-seg"><span class="label label-warning">Saúde</span></h4>
            		            
	            <p class="card-box">Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
				
	            <p><div class="card-box">
	            	<img class="img-politico-small" height="32" width="32" src="https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg">
	            	<p class="p-alt-politico">Proposto pelo deputado<br/><strong>Dilma Rouseff</strong> do <strong>PT</strong></p>
	            </div></p>

	            <p id="p-btn-yes-no" class="card-box">
	            	<button id="btn-alt-yes" type="button" class="btn btn-sm btn-danger">NÃO</button>
	            	<button id="btn-alt-no" type="button" class="btn btn-sm btn-success">SIM</button>
	            </p>

	            <center><p id="card-footer" class="p-alt-politico">Votação: 1034, <font color="green">740 sim</font>, <font color="red"> 294 não.</font></p></center>
          	</div>

          	<div id="card-maker" class="sidebar-module-inset">
          		<div class="card-img-spot">
            		<img class="card-img" src="http://www.fatosdesconhecidos.com.br/wp-content/uploads/2015/10/south_park.png">
            	</div>
            	<h4 class="card-name"><span class="label label-default">PLS 452-2015</span></h4>
            	<h4 class="card-seg"><span class="label label-warning">Saúde</span></h4>
            		            
	            <p class="card-box">Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
				
	            <p><div class="card-box">
	            	<img class="img-politico-small" height="32" width="32" src="https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg">
	            	<p class="p-alt-politico">Proposto pelo deputado<br/><strong>Dilma Rouseff</strong> do <strong>PT</strong></p>
	            </div></p>

	            <p id="p-btn-yes-no" class="card-box">
	            	<button id="btn-alt-yes" type="button" class="btn btn-sm btn-danger">NÃO</button>
	            	<button id="btn-alt-no" type="button" class="btn btn-sm btn-success">SIM</button>
	            </p>

	            <center><p id="card-footer" class="p-alt-politico">Votação: 1034, <font color="green">740 sim</font>, <font color="red"> 294 não.</font></p></center>
          	</div>

          	<div id="card-maker" class="sidebar-module-inset">
            	<div class="card-img-spot">
            		<img class="card-img" src="http://www.saojoaodomanhuacu.mg.gov.br/images/stories/img/saude2.jpg">
            	</div>
            	<h4 class="card-name"><span class="label label-default">PLS 452-2015</span></h4>
            	<h4 class="card-seg"><span class="label label-warning">Saúde</span></h4>
            		            
	            <p class="card-box">Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
				
	            <p><div class="card-box">
	            	<img class="img-politico-small" height="32" width="32" src="https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg">
	            	<p class="p-alt-politico">Proposto pelo deputado<br/><strong>Dilma Rouseff</strong> do <strong>PT</strong></p>
	            </div></p>

	            <p id="p-btn-yes-no" class="card-box">
	            	<button id="btn-alt-yes" type="button" class="btn btn-sm btn-danger">NÃO</button>
	            	<button id="btn-alt-no" type="button" class="btn btn-sm btn-success">SIM</button>
	            </p>

	            <center><p id="card-footer" class="p-alt-politico">Votação: 1034, <font color="green">740 sim</font>, <font color="red"> 294 não.</font></p></center>
          	</div>
          </div><!-- /.blog-post -->












          <!-- DIV CADASTRO -->
          <div id="cadastro-div" class="blog-post">
            <h1 class="blog-post-title">CADASTRO</h1>

            <form id="cadastro-form" class="navbar-form">
            	<ul id="cadastro-ul" type="none">
            		<li class="li-fixer">
            			<label class="control-label" for="input-4">Foto de Perfil</label>
						<input id="inputPic" type="file">
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
            	</ul>
            	<br/>
            	<center>
            	  <button id="btn-cad-voltar" class="btn btn-default" onclick="showCadastro(false)">Voltar</button>
            	  <button id="btn-cad-enviar" type="submit" class="btn btn-success">Enviar</button>
            	</center>
            	
          	</form>
          </div>



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
			        <strong>Oh snap!</strong> Change a few things up and try submitting again.
			    </div>
	          	<hr>
	          	Não possue registro e/ou não quer logar com Facebook ou G+?
	          	<br/><br/>
	          	<button class="btn btn-sm btn-default" type="button" data-dismiss="modal" onclick="showCadastro(true)">Registre-se com um e-mail</button>
	        </center>
	      </div>
	    </div>
	  </div>
	</div>





	<footer class="blog-footer">
      <p>Alepe Digital. <i>Designed by <a href="#">@gmathx</a> / <a href="#">@icaro-ribeiro</a>.</i></p>
    </footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/personal.js"></script>
	<script src='http://files.rafaelwendel.com/jquery.js'></script>
</body>
</html>