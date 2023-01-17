<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    exit;
}

require __DIR__ . '/vendor/autoload.php';


use Dompdf\Dompdf;
use Dompdf\Options;


$user = $_POST['studentNumber'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$program = $_POST['program'];
$semester = $_POST['semester'];
$schoolyear = $_POST['schoolyear'];
$purpose = $_POST['purpose'];

$author = "ALVIN RAY S. BAWAR";

$date = date("Y-m-d");







$options = new Options;
$options->setChroot(__DIR__);
$pdf = new Dompdf($options);

$pdf->setPaper("Legal", "Portrait");



// $pdf->loadHtmlFile("COGTemplate.html");
$html = file_get_contents("COGTemplate.html");
$html = str_replace(["{{dateOfRequest}}","{{Name}}", "{{Course}}", "{{semester}}", "{{schoolyear}}","{{author}}","{{purpose}}"], [$date,$fname ." ". $lname, $program,$semester,$schoolyear,$author,$purpose], $html);
$pdf->loadHtml($html);
$pdf->render();
$pdf->stream("certificate-of-grades.pdf", ["Attachment" => 0]);

$output = $pdf->output();
file_put_contents("file.pdf", $output);
