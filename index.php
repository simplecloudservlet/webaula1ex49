
<!-- TODO1: MYSQL: Criar uma base de dados no MySQL; PHP: conectar com o banco de dados -->

<!-- TODO2: Criar tabelas T_CIDADES(id,nome,estado) -->

<!-- TODO3: Abrir o arquivo 'cidades.xml' -->

<!-- TODO4: Importar dados do arquivo 'estados.xml' para a tabela 'T_CIDADES' do banco de dados com PHP -->

<!-- TODO5: Exibir todos os dados importados na tabela 'T_CIDADES' -->

<!-- TODO6: Fechar o descritor do arquivo 'cidades.xml' -->

<!-- TODO7: Escluir todas as tabelas -->

<!DOCTYPE html>
<html lang="bzs">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Projeto</title>

	<link rel="shortcut icon" href="favicon/favicon.ico" /> <!-- favicon.ico-->
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />

	<!-- A ordem aqui eh importante: primeiro deve vir o 'jquery.js', depois scripts.js, porque este último utiliza 'jquery.js'-->
	<script src="js/jquery-3.7.1.js"></script>
	<script src="js/decimal.js"></script>
	<script src="js/scripts.js"></script>

</head>

<body>

	<!-- TODO1 -->
	<div id="todo1">
		<?php 
			//Encerra a execucao do carregamento da pagina caso o arquivo contenha erros.
			//Nao usou 'require_once' porque outras páginas podem invocar o conteudo de 'db_sqlite.php' novamente.
			require("db_mysql.php");   
		?>
	</div>


</body>

</html>