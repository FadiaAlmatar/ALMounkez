<?php

namespace App\Http\Controllers;

use PDF;

use Mpdf\Mpdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Welcome to Tutsmake.com',
            'date' => date('m/d/Y')
        ];

        $pdf = Mpdf::loadView('showw', $data);

        return $pdf->download('tutsmake.pdf');
    }
}
