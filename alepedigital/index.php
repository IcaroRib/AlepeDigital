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
<body>
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
		          <a id="nav-1-elem" class="blog-nav-item active" href="#" onclick="changeClassNav('nav-1-elem')">Início </a><a class="separator"> /</a>
		          <a id="nav-2-elem" class="blog-nav-item" href="#" onclick="changeClassNav('nav-2-elem')">Sobre </a><a class="separator"> /</a>
		          <a id="nav-3-elem" class="blog-nav-item" href="#" onclick="changeClassNav('nav-3-elem')">Contato </a><a class="separator"> /</a>
		          <a id="nav-4-elem" class="blog-nav-item" href="http://www.alepe.pe.gov.br/" onclick="changeClassNav('nav-4-elem')">Alepe Oficial</a>
		        </nav>
		      </div>
		    </div>
	    </div>




    <!-- CONTENT -->
    <br/><br/>

    <div class="container">
	  <div class="row">
	    <div id="main-sidebar" class="col-xs-3 col-xs-push-0">

	      <div id="search-box-1" class="input-group">
			<input id="search-sp" type="text" class="form-control" placeholder="Buscar por...">
			  <span class="input-group-btn">
				<button id="search-sp-btn" class="btn btn-default" type="button">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			  </span>
		  </div><!-- /input-group -->

		  <br/>


		  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      		<div class="panel panel-primary">
        	  <div class="panel-heading" role="tab" id="headingOne">
          		<h4 class="panel-title">
            	  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="">
              	    Exibir <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
            	  </a>
          		</h4>
        	  </div>
        	  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">
          		<div class="panel-body">
            	  <div class="list-group">

				    <a id="a-todosProjetos" href="#" class="list-group-item" onclick="negrito('a-todosProjetos')">Todos os Projetos</a>
				    <a id="a-arquivados" href="#" class="list-group-item" onclick="negrito('a-arquivados')">Arquivados</a>
				    <a id="a-politicos" href="#" class="list-group-item" onclick="negrito('a-politicos')">Políticos</a>
				    <a id="a-ranking" href="#" class="list-group-item" onclick="negrito('a-ranking')">Ranking</a>


				  </div>
          		</div>
        	  </div>
      		</div>
      		<div class="panel panel-primary">
        	  <div class="panel-heading" role="tab" id="headingTwo">
          		<h4 class="panel-title">
            	  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              	    Collapsible Group Item #2 <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
            	  </a>
          		</h4>
        	  </div>
        	  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
          		<div class="panel-body">
            	  <div class="list-group">

  					<a href="#" class="list-group-item"> Menu Item</a>
  					<a href="#" class="list-group-item"> Menu Item</a>
     				<a href="#" class="list-group-item"> Menu Item</a>


				  </div>
          		</div>
        	  </div>
      		</div>
      		<div class="panel panel-primary">
        	  <div class="panel-heading" role="tab" id="headingThree">
          		<h4 class="panel-title">
            	  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              		Collapsible Group Item #3 <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
            	  </a>
          		</h4>
        	  </div>
        		<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
          		  <div class="panel-body">
            		<div class="list-group">

  					  <a href="#" class="list-group-item"> Menu Item</a>
  					  <a href="#" class="list-group-item"> Menu Item</a>
     				  <a href="#" class="list-group-item"> Menu Item</a>


					</div>
          		  </div>
        		</div>
      		</div>
    	</div>



































				

	          <div class="sidebar-module sidebar-module-inset">
	            <h4>About</h4>
	            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
	          </div>
	          <div class="sidebar-module">
	            <h4>Archives</h4>
	            <ol class="list-unstyled">
	              <li><a href="#">March 2014</a></li>
	              <li><a href="#">February 2014</a></li>
	              <li><a href="#">January 2014</a></li>
	              <li><a href="#">December 2013</a></li>
	              <li><a href="#">November 2013</a></li>
	              <li><a href="#">October 2013</a></li>
	              <li><a href="#">September 2013</a></li>
	              <li><a href="#">August 2013</a></li>
	              <li><a href="#">July 2013</a></li>
	              <li><a href="#">June 2013</a></li>
	              <li><a href="#">May 2013</a></li>
	              <li><a href="#">April 2013</a></li>
	            </ol>
	          </div>
	          <div class="sidebar-module">
	            <h4>Elsewhere</h4>
	            <ol class="list-unstyled">
	              <li><a href="#">GitHub</a></li>
	              <li><a href="#">Twitter</a></li>
	              <li><a href="#">Facebook</a></li>
	            </ol>
	          </div>
	        </div><!-- /.blog-sidebar -->

	        <div class="col-sm-8 col-sm-offset-0 blog-main">

	          <div class="blog-post">
	            <h2 class="blog-post-title">Sample blog post</h2>
	            <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

	            <p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
	            <hr>
	            <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
	            <blockquote>
	              <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	            </blockquote>
	            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
	            <h2>Heading</h2>
	            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
	            <h3>Sub-heading</h3>
	            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
	            <pre><code>Example code block</code></pre>
	            <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
	            <h3>Sub-heading</h3>
	            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
	            <ul>
	              <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
	              <li>Donec id elit non mi porta gravida at eget metus.</li>
	              <li>Nulla vitae elit libero, a pharetra augue.</li>
	            </ul>
	            <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
	            <ol>
	              <li>Vestibulum id ligula porta felis euismod semper.</li>
	              <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
	              <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
	            </ol>
	            <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
	          </div><!-- /.blog-post -->

	          <div class="blog-post">
	            <h2 class="blog-post-title">Another blog post</h2>
	            <p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p>

	            <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
	            <blockquote>
	              <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	            </blockquote>
	            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
	            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
	          </div><!-- /.blog-post -->

	          <div class="blog-post">
	            <h2 class="blog-post-title">New feature</h2>
	            <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

	            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
	            <ul>
	              <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
	              <li>Donec id elit non mi porta gravida at eget metus.</li>
	              <li>Nulla vitae elit libero, a pharetra augue.</li>
	            </ul>
	            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
	            <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
	          </div><!-- /.blog-post -->

	          <nav>
	            <ul class="pager">
	              <li><a href="#">Previous</a></li>
	              <li><a href="#">Next</a></li>
	            </ul>
	          </nav>

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
	          	<button class="btn btn-sm btn-default" type="button" data-dismiss="modal" data-toggle="modal" data-target="#cadastro-modal">Registre-se com um e-mail</button>
	        </center>
	      </div>
	    </div>
	  </div>
	</div>





	<!-- Modal -->
	<div id="cadastro-modal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <p class="modal-title">Cadastro</p>
	      </div>
	      <div class="modal-body">      	
		        <form class="navbar-form" method="post">
			        <ul type="none">
			        	<li class = "li-fixer">
			        		<label class="control-label" for="inputName">Nome Completo <abbr title="obrigatório">*</abbr></label>
		            		<input id="inputName" type="text" class="form-control" required>
			        	</li>
			        	<li class = "li-fixer">
			        		<label class="control-label" for="inputUsername">Nome de Usuário <abbr title="obrigatório">*</abbr></label>
		            		<input id="inputUsername" type="text" class="form-control" required>	
			        	</li>
			        	<li class = "li-fixer">
			        		<label class="control-label" for="inputSex">Sexo <abbr title="obrigatório">*</abbr></label>
			              	<select id="inputSex" class="form-control" required>
			              	  <option disabled="true" selected="true">Selecione o sexo</option>
							  <option value="M">Masculino</option>
							  <option value="F">Feminino</option>
							  <option value="U">Prefiro não declarar</option>
							</select>
			        	</li>
			        	<li class = "li-fixer">
				        	<label class="control-label" for="inputDateBirth">Data de Nascimento <abbr title="obrigatório">*</abbr></label>
			            	<input id="datanascimento" type="date" class="form-control" required>	
			        	</li>
			        	<li class = "li-fixer">
			        		<label class="control-label" for="inputCEP">CEP <abbr title="obrigatório">*</abbr> (<a class="stylized-link-anchor" href="http://www.buscacep.correios.com.br/sistemas/buscacep/" title="Não sei o meu CEP.">?</a>)</label>
							<input id="cep" name="cep" type="text" class="form-control" maxlength="8" placeholder="Apenas Números" required>
			        	</li>
			        	<li class = "li-fixer">
			        		<label class="control-label" for="inputNeigh">Estado</label>
							<input id="estado" name="estado" type="text" class="form-control" disabled>
			        	</li>
			        	<li class = "li-fixer">
			        		<label class="control-label" for="inputCity">Cidade</label>
							<input id="cidade" name="cidade" type="text" class="form-control" disabled>
			        	</li>
			        	<li class = "li-fixer">
			        		<label class="control-label" for="inputStreet">Logradouro</label>
							<input id="rua" name="rua" type="text" class="form-control" disabled>
			        	</li>
			        	<li class = "li-fixer">
			        		<label class="control-label" for="inputNeigh">Bairro</label>
							<input id="bairro" name="bairro" type="text" class="form-control" disabled>
			        	</li>
			        	<li class = "li-fixer">
			        		<label class="control-label" for="inputEmail">E-mail <abbr title="obrigatório">*</abbr></label>
		            		<input id="email" type="email" class="form-control" required>		        		
			        	</li>
			        	<li class = "li-fixer">
			        		<label class="control-label" for="inputEmailConf">Confirmar E-mail <abbr title="obrigatório">*</abbr></label>
		            		<input id="emailconf" type="email" class="form-control" required>		        		
			        	</li>
			        	<li class = "li-fixer">
			        		<label class="control-label" for="inputpass">Senha <abbr title="obrigatório">*</abbr></label>
		            		<input id="senha" type="password" class="form-control" required>		        		
			        	</li>
			        	<li class = "li-fixer">
			        		<label class="control-label" for="inputpassConf">Confirmar Senha <abbr title="obrigatório">*</abbr></label>
		            		<input id="senhaconf" type="password" class="form-control" required>		        		
			        	</li>
			        </ul>
			        <br/><br/>
	            	<center>
	            	<button id="btn-cad-voltar" type="submit" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#login-modal">Voltar</button>
	            	<button id="btn-cad-enviar" type="submit" class="btn btn-success">Enviar</button>
	            	</center>

	          	</form>
	      </div>
	    </div>
	  </div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/personal.js"></script>
	<script src='http://files.rafaelwendel.com/jquery.js'></script>
</body>
</html>