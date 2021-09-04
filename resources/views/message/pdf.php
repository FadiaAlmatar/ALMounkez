<?php

use Mpdf\Mpdf;
use Mpdf\HTMLParserMode;
use phpDocumentor\Reflection\PseudoTypes\True_;

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [290,100]]);
$mpdf->autoScriptToLang = True;
$mpdf->autoLangToFont = True;
$mpdf->AddPage("P");
$stylesheet = file_get_contents('style.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
// $mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output("myPDF.pdf","D");
?>
