<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Controle Pés</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body {
			background-color: #f1f1f1;
			font-family: sans-serif, arial, georgia, serif;
		}
		
		.form {
			display: flex;
			flex-flow: column;
			width: 90%;
			align-items: center;
		}
		
		input, textarea {
			height: 45px;
		}
		
		p {
			text-align: center;
		}
	</style>
</head>
<body>
	<?php if($erros) : ?>
		<p><?=$erros?></p>
	<?php endif; ?>
	
	<?php if(isset($imagem)) : ?>
		<p><?=$imagem?></p>
	<?php endif; ?>
	
	<?php if(isset($mensagem)) : ?>
		<p><?=$mensagem?></p>
	<?php endif; ?>
	
	<?php if(isset($banco)): ?>
		<p><?=$banco?></p>
	<?php endif; ?>
	
	<form enctype="multipart/form-data" action="<?=base_url()?>" method="POST" class="form">
		<p><input type="text" name="cor_tecido" placeholder="Cor do tecido." value="<?=set_value('cor_tecido')?>"></p>
		<p><textarea name="descricao" placeholder="Descrição do sofá, cliente e algo mais."><?=set_value('descricao')?></textarea></p>
		<input type="file" name="imagem">
		<p><input type="submit" value="Enviar"></p>
	</form>

	<?php foreach($pes as $pe) : ?>
		<p><?php print $pe->cor_tecido; ?></p>
		<p><?php print $pe->descricao; ?></p>
		<p><img src="assets/imagens_pes/<?=$pe->imagem?>"></p>
		<hr>
	<?php endforeach; ?>
</body>
</html>