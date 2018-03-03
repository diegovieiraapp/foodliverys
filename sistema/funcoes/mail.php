<?php	

	function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
		{
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';
		$retorno = '';
		$caracteres = '';
		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;
		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) {
		$rand = mt_rand(1, $len);
		$retorno .= $caracteres[$rand-1];
		}
		return $retorno;
	}
	if (isset($_POST['email']) && $_POST['email'] != '') {
		include_once "../conection.php";
		$email = $_POST['email'];
		$sql = "SELECT * FROM `cadastro_usuario` WHERE `email` = '".$email."';";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$email=$row['EMAIL'];
				$nome=$row['NOME']; 
				$senha = geraSenha(10);
				//require_once("mail_envio.php");
			}
			
		}else{
			header("Location: ../esqueceu-senha.php?erro=1");
		}
	
		$sql = "UPDATE `cadastro_usuario`
				SET
				`SENHA` = MD5('".$senha."')
				WHERE `EMAIL` = '".$email."';";
		$result = $conn->query($sql);
 
		// Inclui o arquivo class.phpmailer.php localizado na pasta class
		require_once("phpmailer/class.phpmailer.php");
		 
		// Inicia a classe PHPMailer
		$mail = new PHPMailer(true);
		 
		// Define os dados do servidor e tipo de conexão
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsSMTP(); // Define que a mensagem será SMTP
		 
		try {
			 $mail->Host = 'mail.foodliverys.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
			 $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
			 $mail->Port       = 465; //  Usar 587 porta SMTP
			 $mail->SMTPSecure = 'ssl';
			 $mail->Username = 'contact@foodliverys.com'; // Usuário do servidor SMTP (endereço de email)
			 $mail->Password = 'sistema@123'; // Senha do servidor SMTP (senha do email usado)
		 
			 //Define o remetente
			 // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
			 $mail->SetFrom('contact@foodliverys.com', 'foodliverys'); //Seu e-mail
			 $mail->AddReplyTo('contact@foodliverys.com', "foodliverys"); //Seu e-mail
			 $mail->Subject = 'Resetar Senha';//Assunto do e-mail
		 
		 
			 //Define os destinatário(s)
			 //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			 $mail->AddAddress($email, $nome);
			 $mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
			 //Campos abaixo são opcionais 
			 //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			 //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
			 //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
			 //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
		 
			//Variaveis de POST, Alterar somente se necessário
			//====================================================
			//$nome = $_POST['nome'];
			//$telefone = $_POST['telefone'];
			//$celular = $_POST['celular'];
			//$email = $_POST['email'];
			//====================================================
		 
			//Monta o Corpo da Mensagem
			//====================================================
			$email_conteudo = "<p> Foi solicitou o reset da senha, segue abaixo sua nova senha de acesso \n";
			$email_conteudo .= "<p>Senha = $senha \n"; 
			//$email_conteudo .=  "Telefone = $telefone \n";
			//$email_conteudo .=  "Whatsapp = $celular \n";
			//$email_conteudo .= "Email = $email \n"; 
			////====================================================
		 
		 
		 
			 //Define o corpo do email
			 $mail->MsgHTML($email_conteudo);
			 			 
		 
			 ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
			 //$mail->MsgHTML(file_get_contents('arquivo.html'));
		 
			 $mail->Send();
			 header("Location: ../esqueceu-senha.php?sucesso=1");
		 
			//caso apresente algum erro é apresentado abaixo com essa exceção.
			}catch (phpmailerException $e) {
			  echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
		}

			}
	

?>