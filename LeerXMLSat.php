<?php

/* -------------------------------------------------------------------------- */
/*                              Leer XML del Sat                              */
/* -------------------------------------------------------------------------- */


echo"Hola estupida mas te vale luchar cada hora de esta noche <br><br><br><br><br>";
//   if (file_exists('Ejemplo.xml')) {

//       //$xml = file_get_contents('Ejemplo.xml');
//       //$xml = preg_replace('#&(?=[a-z_0-9]+=)#', '&amp;', $xml);
//       $xml = simplexml_load_string('Ejemplo.xml');
//       print_r($xml);
//   foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante) {
//     echo $cfdiComprobante['version']; 
//     echo "<br />"; 
//     echo $cfdiComprobante['fecha']; 
//     echo "<br />"; 
//     echo $cfdiComprobante['Sello']; 
//     echo "<br />"; 
//     echo $cfdiComprobante['total']; 
//     echo "<br />"; 
//     echo $cfdiComprobante['subTotal']; 
//     echo "<br />"; 
//     echo $cfdiComprobante['certificado']; 
//     echo "<br />"; 
//     echo $cfdiComprobante['formaDePago']; 
//     echo "<br />"; 
//     echo $cfdiComprobante['noCertificado']; 
//     echo "<br />"; 
//     echo $cfdiComprobante['tipoDeComprobante']; 
//     echo "<br />"; 
//   }
// }



$strContenidoXML = simplexml_load_string('Ejemplo.xml'); 
try{
    $xml = new SimpleXMLElement($strContenidoXML);
}catch(Exception $e){
    //aqui maneja el error
}
$noNodosRet =  count($xml->xpath("/cfdi:Comprobante/cfdi:Impuestos/cfdi:Retenciones/cfdi:Retencion"));//extrae el numero de nodos retencion
$arrayImporteRetV32 =$xml->xpath("/cfdi:Comprobante/cfdi:Impuestos/cfdi:Retenciones/cfdi:Retencion/@importe");//Xpath que saca los importes V32
$arrayImpuestoRetV32=$xml->xpath("/cfdi:Comprobante/cfdi:Impuestos/cfdi:Retenciones/cfdi:Retencion/@impuesto");//Xpath que saca los impuestos V32
for($i=0;$i<$noNodosRet;$i++){
    $valorImporteRet =  "".trim($arrayImporteRetV32[$i]->importe);
    $valorImpuestoRet =  "".trim($arrayImpuestoRetV32[$i]->impuesto);
}

 
 
//EMPIEZO A LEER LA INFORMACION DEL CFDI E IMPRIMIRLA 
foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){ 
      echo $cfdiComprobante['version']; 
      echo "<br />"; 
      echo $cfdiComprobante['fecha']; 
      echo "<br />"; 
      echo $cfdiComprobante['sello']; 
      echo "<br />"; 
      echo $cfdiComprobante['total']; 
      echo "<br />"; 
      echo $cfdiComprobante['subTotal']; 
      echo "<br />"; 
      echo $cfdiComprobante['certificado']; 
      echo "<br />"; 
      echo $cfdiComprobante['formaDePago']; 
      echo "<br />"; 
      echo $cfdiComprobante['noCertificado']; 
      echo "<br />"; 
      echo $cfdiComprobante['tipoDeComprobante']; 
      echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){ 
   echo $Emisor['rfc']; 
   echo "<br />"; 
   echo $Emisor['nombre']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:DomicilioFiscal') as $DomicilioFiscal){ 
   echo $DomicilioFiscal['pais']; 
   echo "<br />"; 
   echo $DomicilioFiscal['calle']; 
   echo "<br />"; 
   echo $DomicilioFiscal['estado']; 
   echo "<br />"; 
   echo $DomicilioFiscal['colonia']; 
   echo "<br />"; 
   echo $DomicilioFiscal['municipio']; 
   echo "<br />"; 
   echo $DomicilioFiscal['noExterior']; 
   echo "<br />"; 
   echo $DomicilioFiscal['codigoPostal']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:ExpedidoEn') as $ExpedidoEn){ 
   echo $ExpedidoEn['pais']; 
   echo "<br />"; 
   echo $ExpedidoEn['calle']; 
   echo "<br />"; 
   echo $ExpedidoEn['estado']; 
   echo "<br />"; 
   echo $ExpedidoEn['colonia']; 
   echo "<br />"; 
   echo $ExpedidoEn['noExterior']; 
   echo "<br />"; 
   echo $ExpedidoEn['codigoPostal']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){ 
   echo $Receptor['rfc']; 
   echo "<br />"; 
   echo $Receptor['nombre']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor//cfdi:Domicilio') as $ReceptorDomicilio){ 
   echo $ReceptorDomicilio['pais']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['calle']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['estado']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['colonia']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['municipio']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['noExterior']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['noInterior']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['codigoPostal']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){ 
   echo "<br />"; 
   echo $Concepto['unidad']; 
   echo "<br />"; 
   echo $Concepto['importe']; 
   echo "<br />"; 
   echo $Concepto['cantidad']; 
   echo "<br />"; 
   echo $Concepto['descripcion']; 
   echo "<br />"; 
   echo $Concepto['valorUnitario']; 
   echo "<br />";   
   echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){ 
   echo $Traslado['tasa']; 
   echo "<br />"; 
   echo $Traslado['importe']; 
   echo "<br />"; 
   echo $Traslado['impuesto']; 
   echo "<br />";   
   echo "<br />"; 
} 
 
//ESTA ULTIMA PARTE ES LA QUE GENERABA EL ERROR
foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
   echo $tfd['selloCFD']; 
   echo "<br />"; 
   echo $tfd['FechaTimbrado']; 
   echo "<br />"; 
   echo $tfd['UUID']; 
   echo "<br />"; 
   echo $tfd['noCertificadoSAT']; 
   echo "<br />"; 
   echo $tfd['version']; 
   echo "<br />"; 
   echo $tfd['selloSAT']; 
} 


?>
<br>
<br>
<br>
<br>
<br>
<?xml version="1.0" encoding="utf-8"?>
<cfdi:Comprobante Certificado="Hola" Fecha="2020-05-31" FormaPago="01" LugarExpedicion="" MetodoPago="PUE" Moneda="MXN" NoCertificado="" Sello="" SubTotal="250.00" TipoDeComprobante="I" Total="290.00" Version="3.3" xmlns:cfdi="" xmlns:xsi="" xsi:schemaLocation="">
	<cfdi:Emisor Nombre="Venancio Shespierk Alejandro" RegimenFiscal="621" Rfc="sfhjfgj4446"/>
	<cfdi:Receptor Nombre="La empresaX" Rfc="Empresax" UsoCFDI="G03"/>
	<cfdi:Conceptos>
		<cfdi:Concepto Cantidad="2" ClaveProdServ="46171505" ClaveUnidad="H87" Descripcion="duplicado de llave abloy" Importe="160.00" ValorUnitario="80.00">
			<cfdi:Impuestos>
				<cfdi:Traslados>
					<cfdi:Traslado Base="160.00" Importe="25.60" Impuesto="002" TasaOCuota="0.160000" TipoFactor="Tasa"/>
				</cfdi:Traslados>
			</cfdi:Impuestos>
		</cfdi:Concepto>
		<cfdi:Concepto Cantidad="1" ClaveProdServ="461715" ClaveUnidad="H87" Descripcion="duplicado de algo" Importe="90.00" ValorUnitario="90.00">
			<cfdi:Impuestos>
				<cfdi:Traslados>
					<cfdi:Traslado Base="90.00" Importe="14.40" Impuesto="002" TasaOCuota="0.160000" TipoFactor="Tasa"/>
				</cfdi:Traslados>
			</cfdi:Impuestos>
		</cfdi:Concepto>
	</cfdi:Conceptos>
	<cfdi:Impuestos TotalImpuestosTrasladados="40.00">
		<cfdi:Traslados>
			<cfdi:Traslado Importe="40.00" Impuesto="002" TasaOCuota="0.160000" TipoFactor="Tasa"/>
		</cfdi:Traslados>
	</cfdi:Impuestos>
	<cfdi:Complemento>
		<registrofiscal:CFDIRegistroFiscal Folio="" Version="1.0" xmlns:registrofiscal="" xmlns:schemaLocation=""/>
		<tfd:TimbreFiscalDigital FechaTimbrado="2019-12-27T15:24:56" NoCertificadoSAT="" RfcProvCertif="" SelloCFD="" SelloSAT="" UUID="" Version="1.1" xmlns:tfd="" xsi:schemaLocation=""/>
	</cfdi:Complemento>
</cfdi:Comprobante>