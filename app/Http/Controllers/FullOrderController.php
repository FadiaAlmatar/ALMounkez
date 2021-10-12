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
    if(Auth::User()->role == "user"){
       $myorders = FullOrder::where('user_id', Auth::User()->id)->get();
       return view('fullorder.index',['myorders' => $myorders]);
    }
    else{
        $orders = FullOrder::all();
        return view('fullorder.index',['orders' => $orders]);

    }
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
            $fullorder = new FullOrder();
            $fullorder->branch_id     =   1;//Auth::User()->branch_id
            $fullorder->membership_id =   2222;//Auth::User()->membership_id
            $fullorder->user_id       =   Auth::User()->id;
            // $fullorder->not_debtor    =   $request->debt;
            // $fullorder->money_debt    =   $request->money_debt;
            // $fullorder->money_order   =   $request->money_order;
            //local
            if($request->type == "local"){
                $request->validate([
                    'side'              => 'required|min:3',
                    ] );
            $fullorder->side                         = $request->side;
            // $fullorder->Chairman_decision            = $request->Chairman_decision;
            // $fullorder->Chairman_disapproval_reasons = $request->Chairman_disapproval_reasons;
            }//external
            elseif($request->type == "external"){
                $request->validate([
                    'side'              => 'required|min:3',
                    ] );
                // $fullorder->money_central                =  $request->money_central ;
                $fullorder->side                         =   $request->side;
                // $fullorder->Chairman_decision            = $request->Chairman_decision;
                // $fullorder->Chairman_disapproval_reasons = $request->Chairman_disapproval_reasons;

            }//transfer
            elseif($request->type == "transfer"){
                $request->validate([
                    'from_country'            => 'required',
                    'to_country'              => 'required',
                    'transportation_reasons' => 'required'
                    ] );
                $fullorder->country_before         = $request->from_country;
                $fullorder->country_after          = $request->to_country;
                $fullorder->transportation_reasons = $request->transportation_reasons;
                $fullorder->home_change            =      $request->change_home;
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
                // $fullorder->registered_branch_decision             = $request->registered_branch_decision;
                // $fullorder->registered_branch_disapproval_reasons  = $request->registered_branch_disapproval_reasons;
                // $fullorder->transferred_branch_decision            = $request->transferred_branch_decision;
                // $fullorder->transferred_branch_disapproval_reasons = $request->transferred_branch_disapproval_reasons;
                // $fullorder->newmembership_number                   = $request->newmembership_number;
            }//replacement
            else{
                $request->validate([
                'FullName_English'              => 'required|min:3|regex:/^[A-Za-z_ ]*$/|not_regex:/[0-9]/',
                'FullName_Arabic'               => 'required|min:3|not_regex:/[A-Za-z0-9]/',
                // 'replace_reason'                =>  'required'
                ] );
                $fullorder->replace_reasons   = $request->replace_reason;
                $fullorder->police_image      = $request->police_image;
                if ($request->has('police_image')) {         //image police_image
                    $image = $request->police_image;
                    $path = $image->store('police_images', 'public');
                    $fullorder->police_image = $path;
                }
                $fullorder->damaged_card_image   =  $request->damaged_card_image;
                if ($request->has('damaged_card_image')) {         //image damaged_card_image
                    $image = $request->damaged_card_image;
                    $path = $image->store('damaged_card_images', 'public');
                    $fullorder->damaged_card_image = $path;
                }
                $fullorder->judgment_decision_image  =$request->judgment_decision_image;
                if ($request->has('judgment_decision_image')) {         //image judgment_decision_images
                    $image = $request->judgment_decision_image;
                    $path = $image->store('judgment_decision_images', 'public');
                    $fullorder->judgment_decision_image = $path;
                }
                $fullorder->passport_image       =  $request->passport_image;
                if ($request->has('passport_image')) {         //image passport_image
                    $image = $request->passport_image;
                    $path = $image->store('passport_images', 'public');
                    $fullorder->passport_image = $path;
                }
                $fullorder->fullname_arabic      =  $request->FullName_Arabic;
                $fullorder->fullname_english     = $request->FullName_English;
                $fullorder->personal_image       =  $request->personal_image;
                if ($request->has('personal_image')) {         //image personal_image
                    $image = $request->personal_image;
                    $path = $image->store('personal_images', 'public');
                    $fullorder->personal_image = $path;
                }
                $fullorder->personal_dentification_image  = $request->personal_identification_image;
                if ($request->has('personal_identification_image')) {         //image personal_dentification_image
                    $image = $request->personal_identification_image;
                    $path = $image->store('personal_identification_images', 'public');
                    $fullorder->personal_dentification_image = $path;
                }
                $fullorder->newmembership_number         = $request->newMembershipNumber;
                // $fullorder->Chairman_decision            = $request->Chairman_decision;
                // $fullorder->Chairman_disapproval_reasons = $request->Chairman_disapproval_reasons;

            }
            $fullorder->type          =   $request->type;
            $fullorder->status        =  "under consideration";
            $fullorder->save();
            return redirect()->route('fullorders.show',$fullorder);
    }
    public function store_order(Request $request,$id)
    {
        $fullorder = FullOrder::findOrFail($id);
        $request->validate([
            'status'              => 'required'
            ] );
        $fullorder->not_debtor    =   $request->debt;
        $fullorder->money_debt    =   $request->money_debt;
        $fullorder->money_order   =   $request->money_order;
        if($request->type == "local"){
        $fullorder->Chairman_decision            = $request->Chairman_decision;
        $fullorder->Chairman_disapproval_reasons = $request->Chairman_disapproval_reasons;
        }
        elseif($request->type == "external"){
            $fullorder->money_central                =  $request->money_central ;
            $fullorder->Chairman_decision            = $request->Chairman_decision;
            $fullorder->Chairman_disapproval_reasons = $request->Chairman_disapproval_reasons;

            }//transfer
            elseif($request->type == "transfer"){
                $fullorder->registered_branch_decision             = $request->registered_branch_decision;
                $fullorder->registered_branch_disapproval_reasons  = $request->registered_branch_disapproval_reasons;
                $fullorder->transferred_branch_decision            = $request->transferred_branch_decision;
                $fullorder->transferred_branch_disapproval_reasons = $request->transferred_branch_disapproval_reasons;
                $fullorder->newmembership_number                   = $request->newmembership_number;
            }//replacement
            else{
                $fullorder->newmembership_number         = $request->newMembershipNumber;
                $fullorder->Chairman_decision            = $request->Chairman_decision;
                $fullorder->Chairman_disapproval_reasons = $request->Chairman_disapproval_reasons;
            }
            $fullorder->status = $request->status;
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
        if((Auth::User()->role == "user") || ($fullorder->status == "under consideration")){
            if($fullorder->type == "local")
                return view('fullorder.show_local',['fullorder'=>$fullorder]);
            elseif($fullorder->type == "external")
                return view('fullorder.show_external',['fullorder'=>$fullorder]);
            elseif($fullorder->type == "transfer")
                return view('fullorder.show_transfer',['fullorder'=>$fullorder]);
            else
                return view('fullorder.show_replacement',['fullorder'=>$fullorder]);
        }
        else{
            if($fullorder->type == "local")
                 return view('fullorder.show_local_manager',['fullorder'=>$fullorder]);
            elseif($fullorder->type == "external")
                return view('fullorder.show_external_manager',['fullorder'=>$fullorder]);
            elseif($fullorder->type == "transfer")
                return view('fullorder.show_transfer_manager',['fullorder'=>$fullorder]);
            else
                return view('fullorder.show_replacement_manager',['fullorder'=>$fullorder]);

        }

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

    public function printlocal(Request $request,$id)
    {
        // dd($id);
        $order = FullOrder::findOrFail($id);
        $html = view('fullorder.local-pdf',['order'=>$order])->render();

        $pdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 'format' => 'A4','default_font' => 'fontawesome','margin_left' => 15,'margin_right' => 10,'margin_top' => 16,'margin_bottom' => 15,'margin_header' => 10, 'margin_footer' => 10 ]);
        $pdf->AddPage("P");
        $pdf->SetHTMLFooter('<p style="text-align: center">{PAGENO} of {nbpg}</p>');
        $pdf->WriteHTML('.fa { font-family: fontawesome;}',1);
        $pdf->WriteHTML($html);
        return  $pdf->Output("local.pdf","D");
        }
}
