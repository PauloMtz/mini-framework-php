<!DOCTYPE html>
<html>
<head>
	<title>Notícias</title>
</head>
<body>
<h2>Lista de notícias</h2>
<ul>
	<?php foreach($dados['noticias'] as $noticia): ?>
	<li><a href="./noticias/<?php echo $noticia['id'] ?>"><?php echo utf8_encode($noticia['titulo']) ?></a></li>
	<?php endforeach; ?>
</ul>
</body>
</html>