<!-- ==================== Meu PHP ==================== -->

<?php 
try{
	$conn = new PDO('mysql:host=localhost;dbname=formulario','root','');
}catch(PDOException $e){
	echo $e->getMessage();
}

$nome = addslashes(trim($_POST['nome']));
$sobrenome = addslashes(trim($_POST['sobrenome']));
$usuario = addslashes(trim($_POST['usuario']));
$email = addslashes(trim($_POST['email']));
$senha = addslashes(trim($_POST['senha']));
$idade = addslashes(trim($_POST['idade']));
$rua = addslashes(trim($_POST['rua']));
$numero = addslashes(trim($_POST['numero']));
$bairro = addslashes(trim($_POST['bairro']));
$cidade = addslashes(trim($_POST['cidade']));

$inserir = $conn->prepare("INSERT INTO usuarios (nome, sobrenome, usuario, email, senha, idade, rua, numero, bairro, cidade) VALUES (:nome, :sobrenome, :usuario, :email, :senha, :idade, :rua, :numero, :bairro, :cidade)");
$inserir->bindParam(':nome', $_POST['nome']);
$inserir->bindParam('sobrenome', $_POST['sobrenome']);
$inserir->bindParam('usuario', $_POST['usuario']);
$inserir->bindParam('email', $_POST['email']);
$inserir->bindParam('senha', $_POST['senha']);
$inserir->bindParam('idade', $_POST['idade']);
$inserir->bindParam('rua', $_POST['rua']);
$inserir->bindParam('numero', $_POST['numero']);
$inserir->bindParam('bairro', $_POST['bairro']);
$inserir->bindParam('cidade', $_POST['cidade']);

$validar = $conn->prepare("SELECT * FROM usuarios WHERE email=?");
$validar->execute(array($email));
if($validar->rowCount() == 0):
	$inserir->execute();
	echo "<h2><center>Cadastrado com sucesso!</center></h2>";
else:
	echo "<h2><center>Email ja cadastrado!</center></h2>";
endif;
?>
<!-- ==================== FIM Meu PHP ==================== -->


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario de Cadastro</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

	<!-- ==================== MEU CSS ==================== -->

	<style type="text/css">
	*{margin: 0; padding: 0;}
	#container{width: 1000px; height: 730px; margin: auto; box-shadow: 7px 7px 5px 0px rgba(50, 50, 50, 0.2);}
	header{width: 1000px; height: 61px; background-color: #303030;}
	nav{display: block;}
	nav ul{list-style: none; float: right; padding-top: 10px; padding-right: 20px;}
	nav ul li{display: block; float: left;}
	nav ul li a{padding: 15px; text-decoration: none; font-size: 24px;
		font-family: 'Oswald', sans-serif; color: #ccc;}
	nav ul li a:hover{color: #fff;}
	h2{text-align: center; padding: 20px; font-size: 40px; font-family: 'Oswald', sans-serif;color: #303030; font-weight: 100}
	form{width: 800px; height: 500px; margin: auto;}
	label{margin-left: 30px; font-size: 26px; font-family: 'Oswald', sans-serif; font-weight: 100;}
	#nome, #email, #idade{margin-left: 60px; padding: 0px;}#sobrenome{margin-left: 10px;}#usuario{margin-left: 42px;}
	#senha, #bairro{margin-left: 53px;} #rua{margin-left: 73px;}
	#cidade{margin-left: 45px;}
	#botao{display: block; margin: auto; margin-top: 40px; width: 100px; height: 50px; cursor: pointer;}
	footer{width: 1000px; height: 70px; background-color: #303030;}
	</style>

	<!-- ==================== FIM DO MEU CSS ==================== -->


</head>
<body>

<!-- ==================== MEU HTML ==================== -->
<div id="container">
	<header>
		<nav>
			<ul>
				<li><a href="#">Inicio</a></li>
				<li><a href="index.php">Cadastre-se</a></li>
			</ul>
		</nav>
	</header>
	<article>
		<section>
		<h2>Cadastre-se agora!</h2>
			<form method="post" action="">
				<label>Nome:  <input type="text" id="nome" name="nome" size="70">  </label><br/>
				<label>Sobrenome:  <input type="text" id="sobrenome" name="sobrenome" size="70">  </label><br/>
				<label>Usuario:  <input type="text" id="usuario" name="usuario" size="40">  </label><br/>
				<label>Email:  <input type="text" id="email" name="email" size="60">  </label><br/>
				<label>Senha:  <input type="password" id="senha" name="senha" size="40">  </label><br/>
				<label>idade:  <input type="text" id="idade" name="idade" size="5">  </label><br/>
				<label>Rua:  <input type="text" id="rua" name="rua" size="70">  </label>
				<label>Numero:  <input type="text" id="numero" name="numero" size="5">  </label><br/>
				<label>Bairro:  <input type="text" id="bairro" name="bairro" size="50">  </label><br/>
				<label>Cidade:  <input type="text" id="cidade" name="cidade" size="50">  </label><br/>

				<input id="botao" type="submit" value="Enviar">
			</form>
		</section>
	</article>

	<footer>
		
	</footer>

</div>

<!-- ==================== FIM DO MEU HTML ==================== -->
</body>
</html>