<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Pérolas Pet</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/site.css">
</head>
<body>

<!-- Barra de Navegação -->	

	<nav class="navbar navbar-light bg-light fixed-top box-shadow justify-content-center">
		<a href="#">
			<img width="180" height="58" class="py-2" src="imagens/logo-petshop.png" alt="Pet Shop">		
		</a>
	</nav>


<!-- Carousel e Área de Inscrição -->

	<section class="container-fluid">
		<div class="row bg-black text-white">
			<div class="col-xl-7 d-xl-block d-none p-0 center-text">
				<div id="carousel-img" class="carousel slide" data-ride="carousel">
					 <ol class="carousel-indicators">
						<li data-target="#carousel-img" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-img" data-slide-to="1"></li>
						<li data-target="#carousel-img" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<a href="#contato">
								<img class="d-block w-100" src="imagens/racao.jpg" alt="Ração">
								<div class="carousel-caption">
									<h3 class="display-4">Rações</h3>
								</div>
							</a>
						</div>
						<div class="carousel-item">
							<a href="#contato">
								<img class="d-block w-100" src="imagens/itens1.jpg" alt="Acessórios">
								<div class="carousel-caption">
									<h3 class="display-4">Acessórios</h3>
								</div>
							</a>
						</div>
						<div class="carousel-item">
							<a href="#tosa">
								<img class="d-block w-100" src="imagens/banho.jpg" alt="Banho e Tosa">
								<div class="carousel-caption">
									<h3 class="display-4 text-black">Banho e Tosa</h3>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-5 center-text px-5 py-5 align-self-center text-right">
				<p class="lead py-2">Fique por dentro das novidades e promoções cadastrando-se a baixo:</p>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
					<div class="row">
						<div class="input-group input-group-lg py-1 col-md-4 col-xl-12">
							<input type="text" name="nome" maxlength="40" class="form-control" placeholder="Nome" aria-label="Nome">
						</div>
						<div class="input-group input-group-lg py-1 col-md-4 col-xl-12">
							<input type="email" name="email" maxlength="50" class="form-control" placeholder="Email" aria-label="Email">
						</div>
						<div class="input-group input-group-lg py-1 col-md-4 col-xl-12">
							<input type="text" name="telefone" maxlength="11" class="form-control" placeholder="Telefone" aria-label="Telefone">
						</div>
					</div>
					<button class="btn btn-primary btn-lg mt-3 col-md-3 col-xl-12" type="submit" name="envia-formulario">Inscreva-se</button>
				</form>

				<?php 

				function seguranca($input){

					global $conexao;

					// Proteção contra SQL Injection.
					$var = mysqli_escape_string($conexao, $input);

					// Proteção contra Cross Site Scripting.
					$var = htmlspecialchars($var);

					return $var;
				
				}

				// Confere se o botão de enviar os dados foi pressionado.
				if(isset($_POST['envia-formulario'])){

					// Conferindo se todos os campos foram preenchidos.
					if(($_POST['nome'] == '') || ($_POST['email'] == '') || ($_POST['telefone'] == '')){
						$mensagem = "Todos os campos são obrigatórios";
					} else{

						// Sanitização das variáveis.
						$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
						$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
						$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

						// Array de erros.
						$erros = array();

						// Validação do email.
						if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
							$erros[] = "Email inválido";
						endif;

						// Validação do telefone.
						if(!filter_var($telefone, FILTER_VALIDATE_INT) || mb_strlen($telefone) <> 11):
							$erros[] = "Telefone inválido";
						endif;

						// Computando possíveis erros encontrados.
						$mensagem = '';
						if(count($erros) <> 0){
							foreach($erros as $erro):
								$mensagem = $mensagem.' '.$erro.'<br>';
							endforeach;
						} else{

							// Incluindo as varáveis de conexão.
							include_once("conexao.php");

							// Aplicando critérios de segurança.
							$nome = seguranca($_POST['nome']);
							$email = seguranca($_POST['email']);
							$telefone = seguranca($_POST['telefone']);

							// Fazendo duas consultas para conferir se o email ou o telefone já foram cadastrados.
							$consulta1 = mysqli_query($conexao, "select email from usuarios where email = '$email'");
							$consulta2 = mysqli_query($conexao, "select telefone from usuarios where telefone = '$telefone'");

							// Se o número de linhas for diferente de 0 (True), então alguma das informações já foi cadastrada.
							if(mysqli_num_rows($consulta1)) {
								$mensagem = 'Email já cadastrado!!';
							} else if(mysqli_num_rows($consulta2)){
								$mensagem = 'Telefone já cadastrado!!';
							} else{
								// Passadas as condições de existência no banco de dados podemos adicionar os novos valores.
								$salvar = mysqli_query($conexao, "insert into usuarios (nome, email, telefone) values ('$nome', '$email', '$telefone')");

								// Fechando a conexão com o banco de dados.
								mysqli_close($conexao);

								// Confirmando ao usuário que ele foi cadastrado.
								$mensagem = "Cliente cadastrado com sucesso";
								}
							}
						}
					}

				?>

				<h3 class="lead pt-3">
					<?php 				
					echo ($mensagem) ?? '';
					?>
				</h3>
			</div>
		</div>
	</section>

<!-- Seção de Ícones -->

	<section class="py-4 bg-light text-center">
		<div class="container py-lg-5">
			<span class="h4 d-block font-size-changer2">TUDO AQUILO QUE VOCÊ PRECISA</span>
			<h2 class="display-4 text-primary pt-2 font-size-changer1">Aproveite o que há de melhor</h2>

			<div class="row">
				<div class="col-lg-4 pt-lg-5 pt-4">
					<img src="imagens/racao-logo.png" alt="Rações" class="img-size">
					<h3 class="pt-3 pb-1">Rações</h3>
					<p class="lead">Temos uma variedade de rações de primeira linha, com preços competitivos e nutritivas para cães, gatos e aves, ninguém fica de fora &#x1F609.</p>
				</div>
				<div class="col-lg-4 pt-lg-5 pt-4">
					<img src="imagens/banho-logo.png" alt="Banho e Tosa" class="img-size2">
					<h3 class="pt-3 pb-1">Banho e Tosa</h3>
					<p class="lead">Prestamos o melhor serviço com amor e carinho utilizando apenas produtos de qualidade e com certificados de testes aprovados &#x2705.</p>
				</div>
				<div class="col-lg-4 pt-lg-5 pt-4">
					<img src="imagens/acessorio-logo.png" alt="Acessórios" class="img-size2">
					<h3 class="pt-3 pb-1">Acessórios</h3>
					<p class="lead">Seu animalzinho também merece ter estilo, deixe-o ainda mais charmoso com o nosso catálogo de itens e acessórios &#x1F431.</p>
				</div>
			</div>
		</div>
	</section>

<!-- Citação -->

	<section id="quote" class="p-md-5">
		<blockquote class="blockquote text-center text-white p-md-5 p-3">
			<p class="display-4 font-size-changer1"><em>"Até que alguém ame um animal, parte de sua alma permanece adormecida."</em></p>
			<footer class="blockquote-footer text-white" id='tosa'>Anatole France</footer>
		</blockquote>
	</section>

<!-- Perguntas -->

	<section class="container py-5">
		<div class="mb-5 mt-3 text-center">
			<span class="h4 d-block font-size-changer2">ALGUMA DÚVIDA?</span>
			<h2 class="display-4 text-primary font-size-changer1">Seção de Perguntas</h2>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-6 lead" id="perguntas" data-children=".pergunta">
				<div class="pergunta py-1">
					<a data-toggle="collapse" href="#pergunta1" aria-expanded="true" aria-controls="pergunta2">Qual é o preço dos serviços?</a>
					<div class="collapse show" role="tabpanel" id="pergunta1" data-parent="#perguntas">
						<p>Banho & Tosa Higiênica - R$25,00</p>
						<p>Banho - R$30,00</p>
						<p>Banho & Tosa - R$50,00</p>
					</div>
				</div>
				<div class="dropdown-divider"></div>
				<div class="pergunta py-1">
					<a  data-toggle="collapse" href="#pergunta2" aria-expanded="true" aria-controls="pergunta1">Vocês fazem Taxi Dog?</a>
					<div class="collapse" role="tabpanel" id="pergunta2" data-parent="#perguntas">
						<p>Sim, fazemos. Buscamos e levamos os pets dentro da cidade de Votuporanga e cobramos uma taxa dependendo do bairro. Serviço disponível de Segunda à Quinta-Feira.</p>
					</div>
				</div>
				<div class="dropdown-divider"></div>
				<div class="pergunta py-1" id='contato'>
					<a data-toggle="collapse" href="#pergunta3" aria-expanded="true" aria-controls="pergunta3">Qual é o horário de funcionamento?</a>
					<div class="collapse" role="tabpanel" id="pergunta3" data-parent="#perguntas">
						<p>- De Segunda à Sexta-feira das 8:00 às 18:30h</p>
						<p>- Sábado das 8:00 às 13:00h</p>
					</div>
				</div>
				<div class="dropdown-divider"></div>
				<div class="pergunta py-1">
					<a data-toggle="collapse" href="#pergunta4" aria-expanded="true" aria-controls="pergunta4">Quais são as formas de pagamento?</a>
					<div class="collapse" role="tabpanel" id="pergunta4" data-parent="#perguntas">
						<p>Aceitamos pagamento à vista, cartão de crédito/débito e PIX.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- Endereço e Contatos -->

	<section>
		<div class="container text-center">
		<div class="mb-5 mt-2">
			<h2 class="display-4 text-primary font-size-changer1">Nosso Endereço e Contatos</h2>
			<p class="lead"> Entre em contato e consulte o preço e a disponibilidade de rações e acessórios. </p>
		</div>
			<div class="row lead">
				<div class="col-lg-6">
					<iframe width="400" height="250" src="https://maps.google.com/maps?width=500&amp;height=250&amp;hl=en&amp;q=R.%20Edmo%20Rodrigues%20Barbosa%20-%20Votuporanga+(T%C3%ADtulo)&amp;ie=UTF8&amp;t=&amp;z=16&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
					<p class="pt-2">Rua Edmo Rodrigues Barbosa, Nº 5121 - Pacaembú II, Votuporanga - SP, CEP 15507-087</p>
				</div>
				<div class="col-lg-6 align-self-center">
					<h4 class="py-1 pt-5 pt-lg-0">Dados de Contato</h4>
					<ul class="list-unstyled text-secondary">
						<li class="py-1">17 99233-0511 <img src="imagens/whatsapp-logo.png" alt="Whatsapp"></li>
						<li class="py-1">Facebook  <a href="https://www.facebook.com/petperolas/"><img src="imagens/facebook-logo.png" alt="Facebook"></a></li>
						<li class="py-1">Instagram  <a href="https://instagram.com/perolaspacaembu"><img src="imagens/instagram-logo.png" alt="Instagram"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>

<!-- Rodapé -->

	<footer class="bg-black mt-5">
		<div class="container py-4">
			<div class="row">
				<div class="col">
					<p class="text-left">CNPJ 31.626.277/0001-58</p>
				</div>
				<div class="col">
					<p class="text-right"> Alguns Direitos Reservados. 2021 Pérolas Pet</p>
				</div>
		</div>
	</footer>

	<script type="text/javascript" src="java/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="java/popper.min.js"></script>
	<script type="text/javascript" src="java/bootstrap.js"></script>
	<script type="text/javascript" src="java/site.js"></script>
</body>
</html>
