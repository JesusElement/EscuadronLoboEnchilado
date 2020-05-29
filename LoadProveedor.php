<?php
$obj = file_get_contents('Ejemplo.xml');
function xmlObjToArr($obj) {  
	/*
	 Origen de la funcion http://php.net/manual/en/book.simplexml.php#108688
	 Creador: xaviered at gmail dot com ¶
	 
	 */
	$namespace = $obj->getDocNamespaces(true); 
	$namespace[NULL] = NULL; 
	
	$children = array(); 
	$attributes = array(); 
	$name = strtolower((string)$obj->getName()); 
	
	$text = trim((string)$obj); 
	if( strlen($text) <= 0 ) { 
		$text = NULL; 
	} 
	
	// get info for all namespaces 
	if(is_object($obj)) { 
		foreach( $namespace as $ns=>$nsUrl ) { 
			// atributes 
			$objAttributes = $obj->attributes($ns, true); 
			foreach( $objAttributes as $attributeName => $attributeValue ) { 
				$attribName = strtolower(trim((string)$attributeName)); 
				$attribVal = trim((string)$attributeValue); 
				if (!empty($ns)) { 
					$attribName = $ns . ':' . $attribName; 
				} 
				$attributes[$attribName] = $attribVal; 
			} 
			
			// children 
			$objChildren = $obj->children($ns, true); 
			foreach( $objChildren as $childName=>$child ) { 
				$childName = strtolower((string)$childName); 
				if( !empty($ns) ) { 
					$childName = $ns.':'.$childName; 
				} 
				$children[$childName][] = xmlObjToArr($child); 
			} 
		} 
	} 
	
	return array( 
	'name'=>$name, 
	'text'=>$text, 
	'attributes'=>$attributes, 
	'children'=>$children 
	); 
} 


$folder= "/";
$path="./".$folder;;//ruta a la carpeta, '.' es carpeta actual
/*
$file="FAB78173.xml"; 

//nombre del archivo
$url = $folder.$file;
//obtenemos el contenido del archivo
$xml_str = file_get_contents($url); 
//lo convertimos a un formato leible
$xml = simplexml_load_string($xml_str,null, null, 'cfdi', true); 
//var_dump($xml);



//ejecutamos funcion para convertir el xml en un arreglo
$arreglo=xmlObjToArr($xml);

//forma de mostrar todo el xml con ciclos anidados y sangria.
//Si tiene mas profundidad el arreglo hay que agregar mas ciclos en la linea 100
echo "<br>Acceso con ciclos<br>";

echo "Nodo:".$arreglo['name']."<br>";
echo "Valor:".$arreglo['text']."<br>";
$atributos=$arreglo['attributes'];
foreach ($atributos as $k => $v) {
    echo "atributo $k = $v.<br>";
}
$children=$arreglo['children'];
foreach ($children as $k => $v) {
    echo "\$children[$k] <br>";
	//var_dump($v);
	$arreglo=$v[0];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;Nodo:".$arreglo['name']."<br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;Valor:".$arreglo['text']."<br>";
	$atributos=$arreglo['attributes'];
	foreach ($atributos as $k => $v) {
		echo "&nbsp;&nbsp;&nbsp;&nbsp;atributo $k = $v.<br>";
	}
	$children=$arreglo['children'];
	foreach ($children as $k => $v) {
		echo "\$children[$k] <br>";
		//var_dump($v);
		$arreglo=$v[0];
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nodo:".$arreglo['name']."<br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Valor:".$arreglo['text']."<br>";
		$atributos=$arreglo['attributes'];
		foreach ($atributos as $k => $v) {
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;atributo $k = $v.<br>";
		}
		$children=$arreglo['children'];
		foreach ($children as $k => $v) {
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\$children[$k] => $v.<br>";		
		}
	}
}

*/

echo "uuid|";
echo "rfc emisor|";
echo "rfc receptor|";
echo "total|";
//echo "moneda|";
echo "file<br>";


//Lista los directorios y archivos dentro del directorio Indicado creando enlaces a ellos.

$no_mostrar=Array("","php","jpg","gif");  //extensiones a excluir
$mostrar=Array("XML","xml","xps");  //extensiones a mostrar
$no_mostrar_archivo=Array("cgi-bin",".");  //archivos a excluir
$dir_handle = @opendir($path) or die("No se pudo abrir $path");
while ($file = readdir($dir_handle)) {
	$file=$folder.$file;
	$pos=strrpos($file,".");
	$extension=substr($file,$pos+1);
	$archivo= substr($file,0,strlen($file)-$pos+1);
	//echo "[variables".$pos."|".$extension."|".$archivo."]<br>";  //para debug
	if (!in_array($extension, $no_mostrar)) {
		if (!in_array($file, $no_mostrar_archivo)) {
			//echo "<li><a href=\"$file\" id=\"enlace_$file\" title=\"$file\">$file</a></li>";
			if (in_array($extension, $mostrar)){
				//nombre del archivo
				$url = $file;
				//obtenemos el contenido del archivo
				$xml_str = file_get_contents($url); 
				//lo convertino a un formato leible
				$xml = simplexml_load_string($xml_str,null, null, 'cfdi', true); 
				//var_dump($xml);
				
				
				
				$arreglo2=xmlObjToArr($xml);
				//forma de acceder a unas partes especificas del arreglo.
				//echo "<br>Acceso Directo<br>";
				echo $arreglo2["children"]["cfdi:complemento"][0]["children"]["tfd:timbrefiscaldigital"][0]["attributes"]["uuid"]."|";
				echo $arreglo2["children"]["cfdi:emisor"][0]["attributes"]["rfc"]."|";
				echo $arreglo2["children"]["cfdi:receptor"][0]["attributes"]["rfc"]."|";
				echo $arreglo2["attributes"]["total"]."|";
				//echo $arreglo2["attributes"]["moneda"]."|";
				//echo $arreglo2["attributes"]["tipocambio"]."|";
				echo "<a href=\"$file\" id=\"enlace_$file\" title=\"$file\">$file</a><br>";
				
			}
		}
	}
	
}
closedir($dir_handle);




?>