<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rancho BJ</title>

	<!-- Estilos -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">

	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/7ef737a15b.js" crossorigin="anonymous"></script>

</head>

<body>	

	<!-- Barra de Navegação -->

	<header>
		<div class="container" id="nav-container">
			<nav class="navbar navbar-light fixed-top position-absolute justify-content-center">
					<img width="180" height="58" class="py-2" src="https://fontmeme.com/permalink/220620/a718495306c719dd5e5f0720aff14cc0.png" alt="Ranjo BJ" border="0">
			</nav>
		</div>
	</header>

	<main>

		<!-- Carroussel -->

		<div class="container-fluid">
			<div id="mainSlider" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#mainSlider" data-slide-to="0" class="active"></li>
					<li data-target="#mainSlider" data-slide-to="1"></li>
					<li data-target="#mainSlider" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active" style="background-image:url('img/b1.png')" alt="A primeira horta hidropônica suspensa">
						<div class="carousel-caption d-md-block">
							<h2>A primeira horta hidropônica suspensa</h2>
							<p>Somos os pioneiros na cidade de Votuporanga</p>
							<a href="#about-area" class="main-btn" id="about-menu">Sobre nós</a>
						</div>
					</div>
					<div class="carousel-item" style="background-image:url('img/b2.jpg')" alt="Todos os nossos produtos são orgânicos">
						<div class="carousel-caption d-md-block">
							<h2>Simplesmente Natural</h2>
							<p>Todos os nossos produtos são orgânicos</p>
							<a href="#product-area" class="main-btn" id="product-menu">Ver Produtos</a>
						</div>
					</div>
					<div class="carousel-item" style="background-image:url('img/b3.jpg')" alt="Visite e conheça nossas estruturas">
						<div class="carousel-caption d-md-block">
							<h2>Venha nos Conhecer</h2>
							<p>Visite e conheça nossas estruturas</p>
							<a href="#contact-area" class="main-btn" id="contact-menu">Endereço</a>
						</div>
					</div>
				</div>
				<a href="#mainSlider" class="carousel-control-prev" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only"></span>
				</a>
				<a href="#mainSlider" class="carousel-control-next" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only"></span>
				</a>				
			</div>
		</div>

		<!-- Sobre a Empresa -->

		<div id="about-area">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3 class="main-title">Sobre a Empresa</h3>
					</div>
					<div class="col-md-6">
						<img class="img-fluid" src="img/sobre.jpg" alt="Hortifruti">
					</div>
					<div class="col-md-6 text-justify">
						<h3 class="about-title" style="margin-top: 10%">Excelência é o que buscamos</h3>
						<br>
						<p>Somos uma empresa com anos de experiência que está sempre visando maior qualidade e preço competitivo. Com cursos na área, construímos e mantemos uma estrutura de 250 m² capaz de produzir 3500 alfaces hidropônicos mensalmente. As vantagens da horta hidropônica são inúmeras e elas se refletem nos produtos que oferecemos.
						</p>
						<ul id="about-list">
							<li><i class="fas fa-check"></i>Alto rendimento com colheita o ano todo;</li>
							<li><i class="fas fa-check"></i>Maior controle da quantidade de nutrientes;</li>
							<li><i class="fas fa-check"></i>Limpeza, já que não há terra;</li>
							<li><i class="fas fa-check"></i>Melhor preço devido ao alto rendimento.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Diferenciais da Empresa -->

		<div id="services-area">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3 class="main-title">Nossos Diferenciais</h3>
					</div>
					<div class="col-md-4 service-box">
						<i class="fa-solid fa-seedling"></i>
						<h4>Livre de agrotóxicos</h4>
						<p>Toda a nossa produção é orgânica.</p>
					</div>
					<div class="col-md-4 service-box">
						<i class="fa-solid fa-circle-check"></i>
						<h4>Produtos Certificados</h4>
						<p>Só usamos <a href="https://www.yarabrasil.com.br/" style="font-weight: bold; text-decoration:none;" target="_blank">nutrientes certificados</a>.
						</p>
					</div>
					<div class="col-md-4 service-box">
						<i class="fa-solid fa-1"></i><i class="fa-solid fa-0"></i>
						<h4>Uma década de experiência</h4>
						<p>Colhemos no momento certo.</p>
					</div>
				</div>
			</div>
		</div>

		<!-- Produtos -->

		<div id="product-area">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3 class="main-title">Produtos</h3>
					</div>
					<div class="col-md-3">
						<div class="card border-success">
							<img src="img/p1.png" class="card-img-top" alt="Alface Hidropônico">
							<div class="card-body">
								<h5 class="card-text">
									Alface
								</h5>
							</div>
							<div class="card-footer bg-dark border-success">R$ 5,99 (maço)</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-success">
							<img src="img/p2.png" class="card-img-top" alt="Cheiro Verde">
							<div class="card-body">
								<h5 class="card-text">
									Cheiro Verde
								</h5>
							</div>
							<div class="card-footer bg-dark border-success">R$ 3,99 (maço)</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-success">
							<img src="img/p3.png" class="card-img-top" alt="Couve">
							<div class="card-body">
								<h5 class="card-text">
									Couve
								</h5>
							</div>
							<div class="card-footer bg-dark border-success">R$ 4,99 (maço)</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-success">
							<img src="img/p4.png" class="card-img-top" alt="Laranja">
							<div class="card-body">
								<h5 class="card-text">
									Laranja
								</h5>
							</div>
							<div class="card-footer bg-dark border-success">R$ 2,99 (quilo)</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Condições climáticas -->

		<div id="climate-area">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3 class="main-title">Clima na Horta</h3>
					</div>

					<div class="col-md-3 climate-box">
						<div class="container-img">
							<img src="icons/unknown.png">
						</div>
						<h4><br>Clima<br></h4>
						<div class="weather" style="font-size:18px; font-weight:bold;">
							<p>Indefinido</p>
						</div>
					</div>

					<div class="col-md-3 climate-box">
						<i class="fa-solid fa-temperature-half"></i>
						<h4><br>Temperatura<br></h4>
						<div class="temp" style="font-size:18px; font-weight:bold;">
							<p>Indefinido</p>
						</div>
					</div>

					<div class="col-md-3 climate-box">
						<i class="fa-solid fa-droplet" style="color: rgb(93, 223, 255);"></i>
						<h4><br>Humidade<br></h4>
						<div class="humidity" style="font-size:18px; font-weight:bold;">
							<p>Indefinido</p>
						</div>
					</div>

					<div class="col-md-3 climate-box">
						<i class="fa-solid fa-wind" style="color: rgb(160, 167, 168);"></i>
						<h4><br>Ventos<br></h4>
						<div class="wind" style="font-size:18px; font-weight:bold;">
							<p>Indefinido</p>
						</div>
					</div>

				</div>
			</div>
		</div>
		
		<!-- Newsletter -->

		<div id="news-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="main-title">Newsletter</h3>
					</div>
				</div>
					<p>Fique por dentro das promoções. Cadastre seu e-mail e as receba em primeira mão!</p>
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
						<input type="email" class="form-control" id="email-input" name="email" placeholder="E-mail">
						<input type="submit" id="news-btn" name="inscricao" value="Inscrever">
						<input type="submit" id="news-btn-mobile" name="inscricao" value="Inscrever">
					</form>

				<?php 

				$mensagem = '';

				function seguranca($input){

					global $conexao;

					// Proteção contra SQL Injection.
					$var = mysqli_escape_string($conexao, $input);

					// Proteção contra Cross Site Scripting.
					$var = htmlspecialchars($var);

					return $var;
				
				}

				// Confere se o botão de enviar os dados foi pressionado.
				if(isset($_POST['inscricao'])){

					// Conferindo se todos os campos foram preenchidos.
					if(($_POST['email'] == '')){
						$mensagem = "Digite um e-mail!";
					} else{

						// Sanitização da variável.
						$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

						// Array de erros.
						$erros = array();

						// Validação do email.
						if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
							$erros[] = "Email inválido";
						endif;

						// Computando possíveis erros encontrados.
						$mensagem = '';
						if(count($erros) <> 0){
							foreach($erros as $erro):
								$mensagem = $mensagem.' '.$erro;
							endforeach;
						} else{

							// Incluindo as varáveis de conexão.
							include_once("conexao.php");

							// Aplicando critérios de segurança.
							$email = seguranca($_POST['email']);

							// Fazendo consulta para conferir se o e-mail já foi cadastrado.
							$consulta1 = mysqli_query($conexao, "select email from usuarios where email = '$email'");

							// Se o número de linhas for diferente de 0 (True), então o e-email já foi cadastrado.
							if(mysqli_num_rows($consulta1)) {
								$mensagem = 'E-mail já cadastrado!';
							}  else{
								// Passadas as condições de existência no banco de dados podemos adicionar o novo e-mail.
								$salvar = mysqli_query($conexao, "insert into usuarios (email) values ('$email')");

								// Fechando a conexão com o banco de dados.
								mysqli_close($conexao);

								// Confirmando ao usuário que ele foi cadastrado.
								$mensagem = "Cadastrado feito com sucesso!";
								}

							
							}
						}
					}

					if($mensagem <> ''):
						?>

						<!-- Script para mostrar caixa de popup, confirmando ou não o cadastro -->
						<script type="text/javascript">
							alert("<?php echo preg_replace("/\r?\n/", "\\n", addslashes($mensagem)); ?>");
						</script>
					
					<?php endif; ?>
				
			</div>
		</div>

	</main>

	<!-- Rodapé -->

	<footer>
		<div id="contact-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="main-title">Entre em contato</h3>
					</div>
					<div class="col-md-4 contact-box">
						<i class="fa-brands fa-whatsapp"></i>
						<p><span class="contact-title">Whatsapp</span> <br><a href="https://wa.me/5517997575219?text=Ol%C3%A1%2C%20tudo%20bem%3F%0A" target="_blank">(17)99757-5219🔗</a></p>
					</div>
					<div class="col-md-4 contact-box">
						<i class="fa-brands fa-facebook-f"></i>
						<p><span class="contact-title">Facebook</span> <br><a href="https://www.messenger.com/t/100068737413709" target="_blank">messenger.com🔗</a></p>
					</div>
					<div class="col-md-4 contact-box">
						<i class="fas fa-map-marker-alt"></i>
						<p><span class="contact-title">Endereço</span> <a href="https://goo.gl/maps/UYE2oXuvAXEV3RN36" target="_blank"><br>Avenida Horácio dos Santos - 1301</a>🔗</p>
						<p><span class="contact-title">Horários</span> <br>8:00 - 19:00</p>
					</div>
				</div>
			</div>
		</div>
		<div id="copy-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p>Desenvolvido por <a href="https://github.com/joao-vitor-souza" target="_blank">João Vitor</a> 2022</p>
					</div>
				</div>
			</div>
		</div>
	</footer>

</body>
</html>
