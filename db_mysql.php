
	<?php

	function executarSQL($db, $sql){

		try {

			if($db->query($sql)){
				echo "<h3>SQL: [". $sql ."] realizada com sucesso!</h3>";
			} else {
				echo "<h3>ERRO na SQL: ". $sql ." </h3>";
			}

		} catch(PDOException $e){
			echo '<h3>EXCEPTION1: ' . $e->getMessage() . '</h3>';
		}
	}

	function imprimir($db, $tabela){
		$res = $db->query("SELECT * FROM $tabela");
		if($res){
			$res->setFetchMode(PDO::FETCH_OBJ);
	
			while( $tupla = $res->fetch() ){ //recupera uma linha por vez
				echo '<h3>';
				foreach($tupla as $coluna){
					echo $coluna . ", ";
				}
				echo '</h3><br>';
			}
			echo "<h3>SELECT: Consulta realizada com sucesso!</h3>";
		} else {
			echo "<h3>ERRO6: Erro na consulta.</h3>";
		}
	}

	function lerArquivoXML($db, $xml, $fname){
		
		//Posiciona para o primeiro registro de dados que contem o marcador "Placemark"
		while($xml->read() && $xml->name != "Placemark");

		$status=true; //Apenas para exibicao no CSS

		while ($xml->name === "Placemark"){

			//Transforma a string com os dados sob o marcador 'Placemark' em um objeto XML
			$node = new SimpleXMLElement($xml->readOuterXML());
			$cidade = new SimpleXMLElement($node->asXML()); //$cidade eh o node 'Placemark' na hierarquia

			//Le os dados do objeto XML $cidade e
			//converte para inserir na base de dados
			$nome = strval($cidade->name); //Adquire o marcador 'name'

			//Caminha na hierarquia de marcadores ate encontrar o marcador 'SimpleData'
			$sdata = $cidade->ExtendedData->SchemaData->SimpleData;

			$codigo = strval($data[9]);
			$estado = strval($sdata[13]);

			$status = !$status;
			if($status)
				echo '<div class="selecionado">';
			else
				echo '<div>';

			echo '<h3>Nome: '. $nome . ' Codigo: ' . $codigo . ' Estado: ' . $estado . '<h3><br>';

			executarSQL($db, 'INSERT INTO T_CIDADES(nome,codigo,estado) VALUES ( "' . \ 
			strval($nome) . '", "' . \
			strval($codigo) . '", "' . \
			strval($estado) . '");', $status);

			echo '</div>';

			//Salta para o próximo registro
			$xml->next("Placemark");

		}

		echo '<h3>Fim da leitura do arquivo: [' . $fname . ']</h3><br>';
		
	}


	

	function fecharArquivoXML($xml,$fname){
		
		echo '<h3>'.var_dump($xml).'</h3><br>';
		$xml->close();
		echo '<h3>'.var_dump($xml).'</h3><br>';
		if(is_resource($xml)){ //Da documentacao do PHP
			echo '<h3>ERRO: Erro ao fechar o arquivo: [' . $fname . ']</h3><br>';
		} else {
			echo '<h3>Arquivo: [' . $fname . '] fechado com sucesso!</h3><br>';
		}
	}

	function abrirArquivoXML($fname){

		$xml = new XMLReader;
		$xml->open($fname);
		var_dump($xml);
		if(!$xml){
			echo '<h3>ERRO: Erro na leitura do arquivo: ' . $fname . '</h3><br>';
		} else {
			echo '<h3>Arquivo: [' . $fname . '] aberto com sucesso!</h3><br>';
		}
		return $xml;
	}

	function limparTabelas($db){

		echo '<div class="selecionado"><h3>TODO12</h3>';
		
		executarSQL($db, "drop table T_CIDADES");

		echo '</div>';
	}

	function definirCaracterInclusao($db){
		
		//
		echo '<div><h3>TODO4</h3>';
		
				 
		echo '</div>';
	}


	function criarTabelas($db){

		echo '<div class="selecionado"><h3>TODO2</h3>';
		var_dump($db);
		executarSQL($db, "CREATE TABLE T_CIDADES( id int primary key not null auto_increment, 
							nome varchar(50) not null, 
							codigo varchar(50) not null, 
							estado varchar(50) not null)"); 
		echo '</div>';

	}

	function main(){
		
		echo '<h3>TODO1</h3>';
		$DATABASE = "mysql";
		$HOST = "localhost";
		$DBNAME = "db_cidades"; //mysql> create database db_cidades;
		$USER = "lucio";
		$PASSWORD = "root";

		try {
			$db = new PDO("$DATABASE: host=$HOST; dbname=$DBNAME", $USER, $PASSWORD); //Para o MySQL
			var_dump($db);
		} catch(PDOException $e){
			echo '<h3>EXCEPTION1: ' . $e->getMessage() . '</h3>';
		}
		

		//TODO2
		criarTabelas($db);

		//TODO3
		$fname = 'cidades.xml';
		$xml = abrirArquivoXML($fname);

		//TODO4
		lerArquivoXML($db,$xml,$fname);

		//TODO5
		imprimir($db, "T_CIDADES");

		//TODO6
		fecharArquivoXML($xml,$fname);
			
		//TODO7
		limparTabelas($db);

	}

		//Invoca as funcoes
		main();
	?>
	