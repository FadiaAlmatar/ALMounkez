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
            $fullorder->money_debt = $request->money_debt;
            $fullorder->money_order = $request->money_order;
            $fullorder->branch_id     =   1;//Auth::User()->branch_id
            $fullorder->membership_id =   2222;//Auth::User()->membership_id
            $fullorder->user_id       =   Auth::User()->id;
            $fullorder->not_debtor   =  $request->debt;
            if(($request->type == "local") || ($request->type == "external")){
            $fullorder->side          =   $request->side;
            $fullorder->status        =  "under consideration";
            }
            elseif($request->type == "transfer"){
                $fullorder->country_before  = $request->countryfrom;
                $fullorder->country_after = $request->tocountry;
                $fullorder->transportation_reasons = $request->transportation_reasons;
                $fullorder->home_change    =      $request->change_home;
                if ($request->has('change_home')) {         //image home change
                    $image = $request->change_home;
                    $path = $image->store('home_changes', 'public');
                    $fullorder->home_change = $path;
                }
                $fullorder->work_change    =      $request->change_work;
                if ($request->has('change_work')) {         //image work change
                    $image = $request->change_work;
                    $path = $image->store('work_changes', 'public');
                    $fullorder->work_change = $path;
                }
                $fullorder->not_debtor = $request->debt;
                $fullorder->registered_branch_decision             = $request->registered_branch_decision;
                $fullorder->registered_branch_disapproval_reasons  = $request->registered_branch_disapproval_reasons;
                $fullorder->transferred_branch_decision            = $request->transferred_branch_decision;
                $fullorder->transferred_branch_disapproval_reasons = $request->transferred_branch_disapproval_reasons;
                $fullorder->newmembership_number                   = $request->newmembership_number;
            }
            else{
                $fullorder-> replace_reasons  = $request->replace_reason;
                $fullorder->police_image      = $request->police_image;
                $fullorder->damaged_card_image   =  $request-> damaged_card_image;
                $fullorder->judgment_decision_image  =$request->judgment_decision_image;
                $fullorder->passport_image       =  $request->passport_image;
                $fullorder->fullname_arabic      =  $request->FullName_Arabic;
                $fullorder->fullname_english     = $request->FullName_English;
                $fullorder->personal_image       =  $request->personal_image;
                $fullorder->personal_dentification_image  = $request->personal_identification_image;
                $fullorder->newmembership_number =$request->newMembershipNumber;
                $fullorder->Chairman_decision = $request->Chairman_decision;
                $fullorder->Chairman_disapproval_reasons = $request->Chairman_disapproval_reasons;

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
