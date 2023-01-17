<?php
require __DIR__ . '/vendor/autoload.php';


use Dompdf\Dompdf;

$pdf = new Dompdf;

$pdf->loadHtml("tite");
$pdf->render();
$pdf->stream();