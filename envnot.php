<?
include "confignot.php"; /*Conecta com o BD MySQL */?>
<html>
<head>
<title>NossoClick.com</title>
<!-- TinyMCE -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("jquery", "1");
</script>

<!-- Load TinyMCE -->
<script type="text/javascript" src="imagensinternas/jquery.tinymce.js"></script>
<script type="text/javascript">
	$().ready(function() {

		$('textarea.tinymce').tinymce({
			// Location of TinyMCE script
			script_url : 'imagensinternas/tiny_mce.js',

			// General options
			theme : "advanced",
			plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist,imagemanager",

			// Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,|,insertimage",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,

			// Example content CSS (should be your site CSS)
			content_css : "css/content.css",

			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",

			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});
	});
</script>
<!-- /TinyMCE -->
</head>

<body bgcolor="#FFFFFF" text="#000000">
<div>
<a href = 'editor.php'>Editor de Noticias</a>
<a href = 'index.php'>Upload de Noticias</a>
<a href = '../imagens.php' target="_blank">Imagens</a> </div>
<div>
<?
 //include "connection.php";



$acao= $_GET["acao"];
if(empty($_GET['acao']))
{
    $acao = 'entrar';
}


if($acao == 'enviar') { /*Faz o upload da imagem */
     $data = date("Y-m-d H:i:s");
     $hora = date("H:i:s");
     $novadata = substr($data,8,2) . "/" . substr($data,5,2) . "/" . substr($data,0,4);
     $novahora = substr($hora,0,2) . "h" . substr($hora,3,2) . "min";
	$data_publi= $data;
	$hora_publi = $hora;
	$titulo = $_POST["titulo"];
	//$titulo2=nl2br($titulo, ENT_QUOTES);
	//$titulo3= htmlentities($titulo2, ENT_QUOTES);
	$titulo2= htmlentities($titulo, ENT_QUOTES);

	$lide=nl2br(htmlentities($lide, ENT_QUOTES));
	$lide= htmlentities($lide, ENT_QUOTES);


//	echo htmlentities($titulo, ENT_QUOTES);

	//echo "Titulo 03: $titulo3";
//	$titulo=nl2br(str_replace("&", "&amp;", htmlentities($titulo)));
//	$titulo=nl2br(htmlentities($titulo));
	$titulo02= htmlentities("Teste de Formata��o", ENT_QUOTES);
//	echo "<br><br>Titulo02 = ".$titulo02."<br>";
	$subtitulo = $_POST["subtitulo"];
	$subtitulo=nl2br(htmlentities($subtitulo, ENT_QUOTES));
	$subtitulo= htmlentities($subtitulo, ENT_QUOTES);


	$lide = $_POST["lide"];
	$lide=nl2br(htmlentities($lide));
	echo "Lide: = ".$lide. "<br>";
	$texto = $_POST["texto"];
	$fonte = $_POST["fonte"];
	$fonte=nl2br(htmlentities($fonte));
	$categoria = $_POST["categoria"];
	$op = $_POST["op"];
	$ops = $_POST["ops"];
	$pos = $_POST["pos"];
	$autor = $_POST["autor"];
	$email = $_POST["email"];
	$ecidade = $_POST["ecidade"];
	$img_destino = '';

	$filtro = array("'" => ' "');
	$titulo = strTr($titulo, $filtro);
	$texto  = strTr($texto, $filtro);


	if ( $_FILES ) { 
	$namethumbs = "imagens/thumbs/".$_FILES['arquivo']["name"]; 
	$name = "imagens/$categoria/".$_FILES['arquivo']["name"]; 
	$tmp_name = $_FILES['arquivo']['tmp_name']; 

// Create a blank image and add some text
	$name = "imagens/$categoria/".$_FILES['arquivo']["name"]; 


	move_uploaded_file ( $tmp_name, $name ); 
	echo "<img src=".$name.">"; 

	if(	$pos == 'p1')
	{
		$img_origem=ImageCreateFromJpeg($name);
		$largura= imagesx($img_origem);
		$altura = imagesy($img_origem);
		$nova_largura = 507;
		$nova_altura = 383;
//		$nova_altura = $altura*$nova_largura/$largura;
		$img_destino = imagecreatetruecolor($nova_largura, $nova_altura);
		imagecopyresampled($img_destino, $img_origem, 0,0,0,0, $nova_largura, $nova_altura, $largura, $altura);
//		$thumbs = "../imagens/thumbs/$tmp_name";
		imageJPEG($img_destino, "$namethumbs", 55);
	} 
	else if($pos == 'p2')
	{
		$img_origem=ImageCreateFromJpeg($name);
		$largura= imagesx($img_origem);
		$altura = imagesy($img_origem);
		$nova_largura = 330;
		$nova_altura = 173;
//		$nova_altura = $altura*$nova_largura/$largura;
		$img_destino = imagecreatetruecolor($nova_largura, $nova_altura);
		imagecopyresampled($img_destino, $img_origem, 0,0,0,0, $nova_largura, $nova_altura, $largura, $altura);
//		$thumbs = "../imagens/thumbs/$tmp_name";
		imageJPEG($img_destino, "$namethumbs", 55);
	} 
	else if($pos == 'p3')
	{
		$img_origem=ImageCreateFromJpeg($name);
		$largura= imagesx($img_origem);
		$altura = imagesy($img_origem);
		$nova_largura = 300;
		$nova_altura = 200;
//		$nova_altura = $altura*$nova_largura/$largura;
		$img_destino = imagecreatetruecolor($nova_largura, $nova_altura);
		imagecopyresampled($img_destino, $img_origem, 0,0,0,0, $nova_largura, $nova_altura, $largura, $altura);
//		$thumbs = "../imagens/thumbs/$tmp_name";
		imageJPEG($img_destino, "$namethumbs", 55);
/************
Inicio
*********
$ini_filename = '$name';
$im = imagecreatefromjpeg($ini_filename );

$ini_x_size = getimagesize($ini_filename )[0];
$ini_y_size = getimagesize($ini_filename )[1];

//the minimum of xlength and ylength to crop.
$crop_measure = min($ini_x_size, $ini_y_size);

// Set the content type header - in this case image/jpeg
//header('Content-Type: image/jpeg');

$to_crop_array = array('x' =>0 , 'y' => 0, 'width' => $crop_measure, 'height'=> $crop_measure);
$thumb_im = imagecrop($im, $to_crop_array);

imagejpeg($thumb_im, '$namethumbs', 100);
/*
Final */
		
		
		
	} 
	else
	{
		$img_origem=ImageCreateFromJpeg($name);
		$largura= imagesx($img_origem);
		$altura = imagesy($img_origem);
		$nova_largura = 300;
		$nova_altura = 200;
		$nova_altura = $altura*$nova_largura/$largura;
		$img_destino = imagecreatetruecolor($nova_largura, $nova_altura);
		imagecopyresampled($img_destino, $img_origem, 0,0,0,0, $nova_largura, $nova_altura, $largura, $altura);
//		$thumbs = "../imagens/thumbs/$tmp_name";
		imageJPEG($img_destino, "$namethumbs", 55);
	} 

	if(	$ecidade == '1')
	{
	$namethumbscid = "imagens/thumbscid/".$_FILES['arquivo']["name"]; 
	$name = "imagens/$categoria/".$_FILES['arquivo']["name"]; 
	$tmp_namecid = $_FILES['arquivo']['tmp_name']; 
	move_uploaded_file ( $tmp_namecid, $namecid ); 

		$img_origem=ImageCreateFromJpeg($name);
		$largura= imagesx($img_origem);
		$altura = imagesy($img_origem);
		$nova_largura = 140;
		$nova_altura = $altura*$nova_largura/$largura;
		$img_destinocid = imagecreatetruecolor($nova_largura, $nova_altura);
		imagecopyresampled($img_destinocid, $img_origem, 0,0,0,0, $nova_largura, $nova_altura, $largura, $altura);
//		$thumbs = "../imagens/thumbs/$tmp_name";
		imageJPEG($img_destinocid, "$namethumbscid", 40);
	} 

}
     $ver='on';
//
echo "Data: $data<br>";
echo "Hora: $hora<br>";
echo "Titulo: $titulo<br>";
echo "Subtitulo: $subtitulo<br>";
echo "Texto: $texto<br>";
echo "Ver: $ver<br>";
echo "Fonte: $fonte<br>";
echo "Categoria: $categoria<br>";
echo "Name: $name";
echo "Autor: $autor";
echo "E-mail: $email";
echo "Op: $op";
echo "Img Destino: $namethumbs<br><br>";


	                $sql = "INSERT INTO noticias(data, hora, titulo, subtitulo, lide, texto, ver,fonte,cat, imagem, autor, email, op, pos, img_destino, imgcid, ecidade,  data_publi, time_publi)
                   VALUES ('$data', '$hora', '$titulo2', '$subtitulo', '$lide', '$texto', '$ver', '$fonte', '$categoria', '$name', '$autor', '$email','$op', '$pos','$namethumbs', '$namethumbscid', '$ecidade','$data_publi', '$hora_publi' )";
                   $sqlcons=mysqli_query($link, $sql);
                   //or die("Erro no SQL: ".mysql_error()); /*Insere o nome da figura no banco de dados*/
                   echo "Noticia Inserida com Sucesso";
}/* fecha acao=enviar*/ ?>
<?
if($acao == 'entrar') { /*Mostra o formul�rio para Upload de imagens*/ ?>


<form name="frm_upload" method="post" action="<? echo $_SERVER["PHP_SELF"];?>?acao=enviar" enctype="multipart/form-data">
           <table width="50%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                      <td height="40" colspan="2"><font face="Arial" size="2"><b><font size="4">Upload
                      de Noticias </font></b></font></td>
                  </tr>

                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">Titulo:</font></td>
                      <td height="30" width="77%">
                      <input type="text" name="titulo" size="60">
    		<!-- Some integration calls --></td>
                  </tr>
                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">Subtitulo:</font></td>
                      <td height="30" width="77%"><input type="text" name="subtitulo" size="20"></td>
                  </tr>

                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">Lide:</font></td>
                      <td height="30" width="77%">
						<div>	<textarea id="elm2" name="lide" rows="4" cols="80" style="width: 80%">
							</textarea>
    </div>

    		<!-- Some integration calls --></td>
                  </tr>


                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">Texto:</font></td>
                      <td height="30" width="77%"><div>	<textarea id="elm1" name="texto" rows="15" cols="80" style="width: 80%" class="tinymce">
		&lt;p&gt;This is the first paragraph.&lt;/p&gt;
		&lt;p&gt;This is the second paragraph.&lt;/p&gt;
		&lt;p&gt;This is the third paragraph.&lt;/p&gt;
	</textarea>
    </div>
    		<!-- Some integration calls -->
		<br><a href="javascript:;" onMouseDown="$('#elm1').tinymce().show();">[Show]</a>
		<a href="javascript:;" onMouseDown="$('#elm1').tinymce().hide();">[Hide]</a>
		<a href="javascript:;" onMouseDown="$('#elm1').tinymce().execCommand('Bold');">[Bold]</a>
		<a href="javascript:;" onMouseDown="alert($('#elm1').html());">[Get contents]</a>
		<a href="javascript:;" onMouseDown="alert($('#elm1').tinymce().selection.getContent());">[Get selected HTML]</a>
		<a href="javascript:;" onMouseDown="alert($('#elm1').tinymce().selection.getContent({format : 'text'}));">[Get selected text]</a>
		<a href="javascript:;" onMouseDown="alert($('#elm1').tinymce().selection.getNode().nodeName);">[Get selected element]</a>
		<a href="javascript:;" onMouseDown="$('#elm1').tinymce().execCommand('mceInsertContent',false,'<b>Hello world!!</b>');">[Insert HTML]</a>
		<a href="javascript:;" onMouseDown="$('#elm1').tinymce().execCommand('mceReplaceContent',false,'<b>{$selection}</b>');">[Replace selection]</a>
    </td>
                  </tr>
                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">Fonte:</font></td>
                      <td height="30" width="77%"><input type="text" name="fonte" size="20"></td>
                  </tr>
                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">Categoria:</font></td>
                      <td height="30" width="77%">
                      <SELECT name=categoria size=1>
                        <option value="agronegocios">Agroneg&oacute;cios</option>
          <option value="artistadestaque">Artistas em Destaque</option>
          <option value="bbb24">BBB - Big Brother Brasil - 24</option>
          <option value="belsaude">Beleza e Saude</option>
          <option value="carnaval">Carnaval</option>
          <option value="camara">C&acirc;mara Municipal</option>
          <option value="carros">Carros</option>
          <option value="catolica">Catolica</option>
          <option value="cdteen">CDTeen</option>
          <option value="celebridades">Celebridades</option>
          <option value="classificados">Classificados</option>
          <option value="ciddestaque">Cidadao Destaque</option>
          <option value="cidade">Cidade</option>
          <option value="cinema">Cinema</option>
          <option value="concursos">Concursos</option>
          <option value="copa2022">Copa 2022</option>
          <option value="covid19">Covid-19</option>
          <option value="criptomoedas">Criptomoedas</option>
          <option value="culinaria">Culinaria</option>
          <option value="cultura">Cultura</option>
          <option value="decoracao">Decoracao</option>
          <option value="diretas">Diretas</option>
          <option value="ecologia">Ecologia</option>
          <option value="economia">Economia</option>
          <option value="educacao">Educacao</option>
          <option value="entretenimento">Entretenimento</option>
          <option value="esportes">Esportes</option>
          <option value="expolondrina2023">Expo Londrina 2023</option>
          <option value="expolondrina2020">Expo Londrina 2020</option>

          <option value="games">Games</option>
          <option value="gospel">Gospel</option>
          <option value="infantil">Infantil</option>
          <option value="informatica">Informatica</option>
          <option value="melhoridade">Melhor Idade</option>
          <option value="moda">Moda</option>
          <option value="mundo">Mundo</option>
          <option value="musica">Musica</option>
          <option value="nacional">Nacional</option>
          <option value="olimpiadas2021">Olimp&iacute;adas 2021</option>
          <option value="parana">Paran&aacute;</option>
          <option value="policial">Policiais</option>
          <option value="politica">Pol&iacute;tica</option>
          <option value="tecnologia">Tecnologia</option>
          <option value="televisao">Televis&atilde;o</option>
          <option value="arqcid">Arquivo Cidade</option>
          <option value="arqesp">Arquivo Esportes</option>
          <option value="arqnac">Arquivo Nacional</option>
          <option value="andira">Andir&aacute;</option>
          <option value="arapongas">Arapongas</option>
          <option value="assai">Assa&iacute;</option>
          <option value="bandeirantes">Bandeirantes</option>
          <option value="cambara">Cambar&aacute;</option>
          <option value="cambe">Camb&eacute;</option>
          <option value="congonhinhas">Congonhinhas</option>
          <option value="cornelio">Corn&eacute;lio Proc&oacute;pio</option>
          <option value="ibaiti">Ibaiti</option>
          <option value="ibipora">Ibipora</option>
          <option value="itambaraca">Itambarac&aacute;</option>
          <option value="jacarezinho">Jacarezinho</option>
          <option value="jataizinho">Jataizinho</option>

          <option value="leopolis">Leopolis</option>
          <option value="londrina">Londrina</option>
          <option value="maringa">Maring&aacute;</option>
          <option value="nacolina">Nova Am&eacute;rica da Colina</option>
          <option value="novafatima">Nova F&aacute;tima</option>
          <option value="nsbarbara">Nova Santa B&aacute;rbara</option>
          <option value="ourinhos">Ourinhos</option>
          <option value="ranchoalegre">Rancho Alegre</option>
          <option value="rpinhal">Ribeir&atilde;o do Pinhal</option>
          <option value="rolandia">Rol&acirc;ndia</option>
          <option value="santaamelia">Santa Am&eacute;lia</option>
          <option value="scpavao">Santa Cec&iacute;lia do Pav&atilde;o</option>
          <option value="santamariana">Santa Mariana</option>
          <option value="saojeronimoserra">Sao Jeronimo da Serra</option>
          <option value="saparaiso">Santo Ant&ocirc;nio do Para&iacute;so</option>
          <option value="ssamoreira">S&atilde;o Sebasti&atilde;o da Amoreira</option>
          <option value="sapopema">Sapopema</option>
          <option value="sertaneja">Sertaneja</option>
          <option value="sertanopolis">Sertan&oacute;polis</option>
          <option value="urai">Ura&iacute;</option>
          <option value="agenda">Agenda</option>
          <option value="fotonoticia">Fotonot&iacute;cia</option>

                    </SELECT>                  </tr>
                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">Op:</font></td>
                      <td height="30" width="77%"><SELECT name="op" size="1" id="op">
                        <option value="principal" selected>Principal</option>
                        <option value="semdestaque">Sem Destaque</option>
                      </SELECT>
                      
                    </td>
                  </tr>
                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">Posicao:</font></td>
                      <td height="30" width="77%"><SELECT name="pos" size="1" id="pos">
                        <option value="sd" selected>Sem Destaque</option>
                        <option value="p1">P1</option>
                        <option value="p2">P2</option>
                        <option value="p3">P3</option>
                      </SELECT></td>
                  </tr>
                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">Autor:</font></td>
                      <td height="30" width="77%"><input type="text" name="autor" size="20"></td>
                  </tr>
                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">E-mail:</font></td>
                      <td height="30" width="77%"><input type="text" name="email" size="20"></td>
                  </tr>
                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">Ops:</font></td>
                    <td height="30" width="77%"><SELECT name="ops" size="1" id="ops">
                      <option value="cornelio">Cornelio</option>
                      <option value="bandeirantes">Bandeirantes</option>
                      <option value="tv">TV</option>
                    </SELECT></td>
                  </tr>

                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">Cidade:</font></td>
                    <td height="30" width="77%"><SELECT name="ecidade" size="1" id="ecidade">
                      <option value="0">0 - Nao</option>
                        <option value="1">1 - Sim</option>
                    </SELECT></td>
                  </tr>
                  <tr>
                      <td height="30" width="23%"><font face="Arial" size="2">Arquivo:</font></td>
                      <td height="30" width="77%"><input name="arquivo" type="file" id="arquivo"></td>
                  </tr>
                  <tr>
                      <td height="30" colspan="2"><div align="center">
                      <input type="submit" name="cadastrar" value="Cadastrar imagem &gt;&gt;"></div></td>
                  </tr>.
           </table>
</form>
<? } /* fecha acao=entrar */?>
<div>
</body>
</html>
