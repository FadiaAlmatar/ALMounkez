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
    public function create()
    {
        return view('fullorder.create');
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
            'side'                           => 'required|min:3|not_regex:/[0-9]/',

            ] );
            $fullorder = new FullOrder();
            $fullorder->side          =   $request->side;
            $fullorder->user_id       =   Auth::User()->id;
            $fullorder->branch_id     =   1;//Auth::User()->branch_id
            $fullorder->membership_id =   2222;//Auth::User()->membership_id
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
        return view('fullorder.show',['fullorder'=>$fullorder]);
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
