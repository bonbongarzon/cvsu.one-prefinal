<?php
session_start();
include_once('includes/inc.requestForm.php');
require __DIR__ . '/vendor/autoload.php';


use Dompdf\Dompdf;
use Dompdf\Options;


$user = $_POST['studentNumber'];
$fname = $firstName;
$lname = $lastName;
$program =  returnCourse($course);


$author = "ALVIN RAY S. BAWAR";

$date = date("Y-m-d");







$options = new Options;
$options->setChroot(__DIR__);
$pdf = new Dompdf($options);

$pdf->setPaper("A4", "Portrait");




if (isset($_POST['request'])) {

    $documentType = $_POST['documentType'];
    $semester = $_POST['semester'];
    $schoolyear = $_POST['schoolyear'];
    $purpose = $_POST['purpose'];


    if ($documentType == "COG") {
        echo "RV";
        $html = file_get_contents("COGTemplate.html");
        $html = str_replace(["{{dateOfRequest}}", "{{Name}}", "{{Course}}", "{{semester}}", "{{schoolyear}}", "{{author}}", "{{purpose}}"], [$date, $fname . " " . $lname, $program, $semester, $schoolyear, $author, $purpose], $html);
        $pdf->loadHtml($html);
        $pdf->render();
        // $pdf->stream("certificate-of-grades.pdf", ["Attachment" => 1]);
        $output = $pdf->output();
        $encoded_pdf = base64_encode($output);
        $_SESSION['kimmy'] = $encoded_pdf;
        header('Location: preview.php');

        $output = $pdf->output();
        file_put_contents("file.pdf", $output);
    } else if ($documentType == "No ID") {
        $html = file_get_contents("nonissuanceID.html");
        $html = str_replace(["{{dateOfRequest}}", "{{nameField}}", "{{semesterField}}", "{{programField}}", "{{schoolyearField}}","{{purposeField}}" , "{{author}}"], 
                                [$date, $fname . " " . $lname, $semester, $program, $schoolyear, $purpose, $author,], $html);
        $pdf->loadHtml($html);
        $pdf->render();

       
        // $pdf->stream("non_issuance.pdf", ["Attachment" => 0]);
        // $pdf->stream("Kimmy", array("Attachment" => false));
        $output = $pdf->output();
        $encoded_pdf = base64_encode($output);
        $_SESSION['kimmy'] = $encoded_pdf;
        header('Location: preview.php');
        // file_put_contents("file.pdf", $output);
    }
    else if($documentType == "CGM") {
        $html = file_get_contents("Goodmoral.html");
        $html = str_replace(["{{dateOfRequest}}", "{{name}}", "{{schoolyear}}","{{name}}","{{purpose}}","{{author}}"], 
             [$date, $fname . " " . $lname,$schoolyear, $program, $purpose, $author,], $html);
        $pdf->loadHtml($html);
        $pdf->render();

       
        // $pdf->stream("non_issuance.pdf", ["Attachment" => 0]);
        // $pdf->stream("Kimmy", array("Attachment" => false));
        $output = $pdf->output();
        $encoded_pdf = base64_encode($output);
        $_SESSION['kimmy'] = $encoded_pdf;
        header('Location: preview.php');
        // file_put_contents("file.pdf", $output);
    }
}


function previewDocs($output){
    $encoded_pdf = base64_encode($output);
}