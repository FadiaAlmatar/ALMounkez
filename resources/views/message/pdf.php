<!-- <?php

// use Mpdf\Mpdf;
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
?> -->

{{-- @if(\Carbon\Carbon::now()->diffInSeconds($comment->created_at) <= 60)
                      {{\Carbon\Carbon::now()->diffInSeconds($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">{{__('s')}}</span>
                    @else
                      @if(\Carbon\Carbon::now()->diffInMonths($comment->created_at) > 12)
                      {{\Carbon\Carbon::now()->diffInYears($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">{{__('y')}}</span>
                      @elseif(\Carbon\Carbon::now()->diffInDays($comment->created_at) > 30)
                      {{\Carbon\Carbon::now()->diffInMonths($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">{{__('mo')}}</span>
                      @elseif(\Carbon\Carbon::now()->diffInHours($comment->created_at) > 24)
                      {{\Carbon\Carbon::now()->diffInDays($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;"> {{__('d')}}</span>
                      @elseif(\Carbon\Carbon::now()->diffInMinutes($comment->created_at) > 60)
                      {{\Carbon\Carbon::now()->diffInHours($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;"> {{__('h')}}</span>
                      @elseif(\Carbon\Carbon::now()->diffInSeconds($comment->created_at) > 60)
                      {{\Carbon\Carbon::now()->diffInMinutes($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">{{__('m')}}</span>
                     @endif
                     @endif --}}
