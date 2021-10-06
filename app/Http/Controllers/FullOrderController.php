<?php

namespace App\Http\Controllers;

use App\Models\FullOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FullOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}
    public function create_local()
    {
        return view('fullorder.create_local');
    }
    public function create_external()
    {
        return view('fullorder.create_external');
    }
    public function create_transfer()
    {
        return view('fullorder.create_transfer');
    }
    public function create_replacement()
    {
        return view('fullorder.create_replacement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'side'                           => 'required|min:3',
            ] );
            $fullorder = new FullOrder();
            if(($request->type == "local") || ($request->type == "external")){
            $fullorder->side          =   $request->side;
            $fullorder->user_id       =   Auth::User()->id;
            $fullorder->branch_id     =   1;//Auth::User()->branch_id
            $fullorder->membership_id =   2222;//Auth::User()->membership_id
            $fullorder->status        =  "under consideration";
            }
            elseif($request->type == "transfer"){
                $fullorder->country_before  = $request->countryfrom;
                $fullorder->country_after = $request->tocountry;
                // $fullorder->transportation_reasons = $request->;

            }
            else{

            }
            $fullorder->type          =   $request->type;
            $fullorder->save();
            return redirect()->route('fullorders.show',$fullorder);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FullOrder  $fullOrder
     * @return \Illuminate\Http\Response
     */
    public function show(FullOrder $fullorder)
    {
        if($fullorder->type == "local")
            return view('fullorder.show_local',['fullorder'=>$fullorder]);
        elseif($fullorder->type == "external")
            return view('fullorder.show_external',['fullorder'=>$fullorder]);
        elseif($fullorder->type == "transfer")
            return view('fullorder.show_transfer',['fullorder'=>$fullorder]);
        else
            return view('fullorder.show_replacement',['fullorder'=>$fullorder]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FullOrder  $fullOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(FullOrder $fullOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FullOrder  $fullOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FullOrder $fullOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FullOrder  $fullOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(FullOrder $fullOrder)
    {
        //
    }
}
