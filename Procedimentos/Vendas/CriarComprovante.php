<?php
// Carregar dompdf
require_once '../../Lib/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$id=$_GET['idvenda']; // Via URL - Método GET

function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $dados = curl_exec($ch);
    curl_close($ch);

    return $dados;
}

$html=file_get_contents("http://localhost/NservPortal/Views/Vendas/ComprovanteVenda.php?idvenda=".$id);

// Instanciamos um objeto da classe DOMPDF.
$pdf = new DOMPDF();
 
// Definimos o tamanho do papel e orientação.
$pdf->set_paper("a4", "partrait");
 
// Carregar o conteúdo html.
$pdf->load_html($html);
 
// Renderizar PDF.
$pdf->render();
 
// Enviamos pdf para navegador.
$pdf->stream('ComprovanteVenda.pdf', array("Attachment"=>0));
?>




