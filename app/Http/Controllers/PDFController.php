<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $data = [
    //         'title' => 'Welcome to Tutsmake.com',
    //         'date' => date('m/d/Y')
    //     ];

    //     $pdf = Mpdf::loadView('showw', $data);

    //     return $pdf->download('tutsmake.pdf');

    //     // $user = User::latest()->paginate(5);
    //     // if($request->has('download'))
    //     // {
    //         $pdf = PDF::loadView('users.index',compact('user'));
    //         return $pdf->download('pdfview.pdf');
    //     // }

    //     return view('users.index',compact('user'));

    // }
}
