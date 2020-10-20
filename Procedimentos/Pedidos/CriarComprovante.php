<?php
require_once '../../Lib/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$idPedido = $_GET['idPedido'];

function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $dados = curl_exec($ch);
    curl_close($ch);

    return $dados;
}

$html = file_get_contents("http://localhost/RashSushi/Views/Pedidos/Comprovante.php?idPedido=".$idPedido);

$pdf = new DOMPDF();
 
$pdf -> set_paper([0, 0, 807.874, 221.102], 'landscape');
 
$pdf -> load_html($html);
 
$pdf -> render();
 
$pdf -> stream('RashSushi.pdf', array("Attachment" => 0));
?>




