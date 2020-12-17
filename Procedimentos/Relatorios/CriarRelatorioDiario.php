<?php
require_once '../../Lib/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$data = $_GET['data'];

function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $dados = curl_exec($ch);
    curl_close($ch);

    return $dados;
}

$html = file_get_contents("http://localhost/RashSushi/Views/Relatorios/RelatorioDiario.php?data=".$data);

$pdf = new DOMPDF();
 
$pdf -> set_paper('a4', 'portrait');
 
$pdf -> load_html($html);
 
$pdf -> render();
 
$pdf -> stream("RASHSUSHI-RELATORIO-DIARIO.pdf", array("Attachment" => 0));
?>