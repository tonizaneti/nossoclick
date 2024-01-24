<?php
// Assuming $conn is your mysqli connection object
//$conn = new mysqli("hostname", "username", "password", "database");
include "confignot.php";

$id = $_GET["id"];
$idnot = $id;


// Check connection
if ($link->connect_error) {
	die("Connection failed: " . $link->connect_error);
}

// Your SQL query
$sql1 = "select * from noticias where id = '$id' and ver = 'on'";

// Performing the query
$result = mysqli_query($link, $sql1);

// Check for errors
if (!$result) {
	die("Error: " . mysqli_error($link));
}

// Process the result set
while ($linha = mysqli_fetch_assoc($result)) {
	// Do something with the data
	$id = $linha["id"];
	$autor = $linha["autor"];
	$fonte = $linha["fonte"];
	$titulo = $linha["titulo"];
	$subtitulo = $linha["subtitulo"];
	$imagem = $linha["imagem"];
	$texto = $linha["texto"];
	$data = $linha["data"];
	$hora = $linha["hora"];
	$cat = $linha["cat"];
	$sessao = $linha["cat"];
	$numvisu = $linha["numvisu"];
	$novadata = substr($data, 8, 2) . "/" . substr($data, 5, 2) . "/" . substr($data, 0, 4);
	$novahora = substr($hora, 0, 2) . "h" . substr($hora, 3, 2) . "min";

	echo "<p class='titulo'><b><i>$subtitulo</i></b>:$titulo</p>";
?>
	<title><? echo "$titulo - TV Na Rua CornelioDigital";  ?></title>
	<meta property="og:locale" content="pt_BR">
	<meta property="og:url" content="https://www.nossoclick.com/index.php?s=noticia&&id='<?php echo '$id'; ?>'">
	<meta property="og:title" content="<?php echo '$titulo'; ?>">
	<meta property="og:site_name" content="Nosso Click.com">
	<meta property="og:description" content="<?php echo '$titulo'; ?>">
	<meta property="og:image" content="www.nossoclick.com/<?php echo '$imagem'; ?>">
	<meta property="og:image:type" content="image/jpeg">
	<meta property="og:image:width" content="800"> <!--/** PIXELS **/!-->
	<meta property="og:image:height" content="600"> <!--/** PIXELS **/!-->
	<!--      /** CASO SEJA UM SITE NORMAL **/

	<meta property="og:type" content="website">

/** CASO SEJA UM ARTIGO **/!-->

	<meta property="og:type" content="article">
	<meta property="article:author" content="<?php echo '$autor'; ?>">
	<meta property="article:section" content="<?php echo '$cat'; ?>">
	<meta property="article:tag" content="Tags do artigo">
	<meta property="article:published_time" content="<?php echo '$data'; ?>">



	<!-- Twitter !-->

	<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?

																				echo "http://www.nossoclick.com/index.php?s=noticia&&id=$id";

																				?>" expr:data-text='<? echo "$titulo"; ?>' data-via="corneliodigital" data-lang="pt" data-size="large">Tweetar</a>

	<script>
		! function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0],
				p = /^http:/.test(d.location) ? 'http' : 'https';
			if (!d.getElementById(id)) {
				js = d.createElement(s);
				js.id = id;
				js.src = p + '://platform.twitter.com/widgets.js';
				fjs.parentNode.insertBefore(js, fjs);
			}
		}(document, 'script', 'twitter-wjs');
	</script>

	<!-- Twitter !-->
	<?
	echo "<title>$titulo - TVNaRua Cornelio Digital - Not&iacute;cias, Eventos e Entretenimento</title>";
	if ($imagem != "") {
		echo "<div style='float:left;'  class='texto'>";
		echo "<img src='$imagem' class='imgnot' alt='$titulo'></div>";
	}
	echo "<p class='texto'>$texto</p>"; ?>
	<!-- Place this tag where you want the +1 button to render. -->
	<div class="g-plusone" data-size="tall" data-annotation="inline" style="z-index:600; position:relative" data-width="300"></div>
	<div class="fb-share-button" data-type="box_count" data-href="<?
																	echo "http://www.nossoclick.com/index.php?s=noticia&&id=$id";
																	?>"></div>
	<div class="fb-like" data-href="https://www.facebook.com/nossoclickoficial" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
	<!-- Twitter !-->
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?
																				echo "http://www. nossoclick.com/index.php?s=noticia&&id=$id";

																				?>" expr:data-text='<? echo "$titulo"; ?>' data-via="corneliodigital" data-lang="pt" data-size="large">Tweetar</a>
	<script>
		! function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0],
				p = /^http:/.test(d.location) ? 'http' : 'https';
			if (!d.getElementById(id)) {
				js = d.createElement(s);
				js.id = id;
				js.src = p + '://platform.twitter.com/widgets.js';
				fjs.parentNode.insertBefore(js, fjs);
			}
		}(document, 'script', 'twitter-wjs');
	</script>
	<!-- Twitter !-->
	<div id="ad01" style="float: left; width: 336px;">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- NoticiasBox -->
		<ins class="adsbygoogle" style="display:inline-block;width:336px;height:280px" data-ad-client="ca-pub-4730974791595192" data-ad-slot="5258061864"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<div id="ad02" style="float: left; width: 336px;">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- NoticiasBox -->
		<ins class="adsbygoogle" style="display:inline-block;width:336px;height:280px" data-ad-client="ca-pub-4730974791595192" data-ad-slot="5258061864"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<div id="fb-root"></div>
	<script src="http://connect.facebook.net/pt_BR/all.js#appId=175726325786274&amp;xfbml=1">
	</script>
	<fb:comments href="www.nossoclick.com/index.php?s=noticia&cat=<? echo "$cat"; ?>&&id=<? echo "$id"; ?>" num_posts="5" width="500"></fb:comments>
<?
	echo "<p class='numeros'>Visualiza&ccedil;&otilde;es $numvisu<br>Fonte: $fonte<br>Por: $autor<br>Data: $novadata $novahora</p>";
	// echo "<br><p class='texto'  align='right'></p>";
	//include "pagina.pzp";
	$numvisu = $numvisu + 1;
}
$sql1 = "update noticias set numvisu = $numvisu where id = '$id'";
$noticia = mysqli_query($link, $sql1) or die("Nao Foi Possivel Consultar o Banco de Dados");
// Close the connection
mysqli_close($link);
?>
</div>
<div id="divisao" style="width:2%; float:left; " align:'justify'></div>
</div>
</div>
