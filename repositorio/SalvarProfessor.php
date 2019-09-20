<?php
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=alunoProfessor", "root", "");
	} catch (PDOException $erro) {
		echo $erro->getMessage();
	}

	require_once '../modelo/Professor.php';
	$professor = new Professor();
	$professor->setNome($_POST['nome']);
	$professor->setIdade($_POST['idade']);
	$professor->setCpf($_POST['cpf']);
	$professor->setRa($_POST['ra']);
	$professor->setSiape($_POST['siape']);
	$professor->setSexo($_POST['sexo']);
	try {
		$sql = "INSERT INTO professor (nome, idade,cpf,ra,siape,sexo) VALUES 
			('" . $professor->getNome() . "', '" . $professor->getIdade() . "','" . $professor->getCpf() . "','" . $professor->getRa() . "','" . $professor->getSiape() . "','" . $professor->getSexo() . "')";

		$pdo->exec($sql);
		echo "<p>Inserido com sucesso.</p>";
	} catch(PDOException $e) {
		die("Não foi possível executar o script: $sql. " . $e->getMessage());
	}

	//var_dump($aluno, $professor);

	//header('Location: /paginadestino.php');
?>