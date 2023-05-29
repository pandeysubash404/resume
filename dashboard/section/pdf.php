<?php
require_once __DIR__ . '/src/autoload.php'; // path to mpdf autoload.php file

$mpdf = new \Mpdf\Mpdf();
$html = file_get_contents('path/to/your/html/file.html');
$mpdf->WriteHTML($html);
$mpdf->Output('output.pdf', 'D');
?>
