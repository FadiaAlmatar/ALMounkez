<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\Qualification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
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
        if(Auth::User()->order <> null){

            $order = Order::where('user_id',Auth::User()->id)->first();
             return redirect(route('orders.edit', $order));
        }
        else
         return view('order.create');
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
        'name'                           => 'required|min:3|not_regex:/[0-9]/',
        'nickname'                       => 'required|min:3|not_regex:/[0-9]/',
        'fnameenglish'                   => 'required|min:3|regex:/^[A-Za-z_ ]*$/|not_regex:/[0-9]/',
        'lnameenglish'                   => 'required|min:3|regex:/^[A-Za-z_ ]*$/|not_regex:/[0-9]/',
        'fathername'                     => 'required|min:3|not_regex:/[0-9]/',
        'grandfathername'                => 'required|min:3|not_regex:/[0-9]/',
        'mothername'                     => 'required|min:3|not_regex:/[0-9]/',
        'gender'                         => 'nullable',
        'fathernameenglish'              => 'required|min:3|regex:/^[A-Za-z_ ]*$/|not_regex:/[0-9]/',
        'mothernameenglish'              => 'required|min:3|regex:/^[A-Za-z_ ]*$/|not_regex:/[0-9]/',
        'Nationality'                    => 'nullable',
        'placeBirth'                     => 'required',
        'dateBirth'                      => 'required|date|before:identityGrantDate',
        'nationalID'                     => 'required|numeric',
        'civilRegistry'                  => 'required',
        'martialStatus'                  => 'nullable',
        'personalIdentificationNumber'   => 'required|numeric',
        'identityGrantDate'              => 'required|date|after:dateBirth|before:tomorrow',
        'constraint'                     => 'required',
        'countryJoin'                    => 'required',
        'address'                        => 'required',
        'displayData'                    => 'required',
        'site'                           => 'url|nullable',
        'insurance'                      => 'numeric|nullable',
        'military'                       => 'nullable',
        'publicRecordNumber'             => 'nullable',
        'healthStatus'                   => 'nullable',
        'housePhone'                     => 'nullable|regex:/[0-9]/|not_regex:/[a-z]/|digits_between:7,10',
        'workPhone'                      => 'nullable|regex:/[0-9]/|not_regex:/[a-z]/|digits_between:7,10',
        'mobile'                         => 'nullable|regex:/(0)[0-9]/|not_regex:/[a-z]/|digits:10',//a leading 0 is required | not_regex: only numbers, not alphabet
        'email'                          => 'nullable|email',
        'fax'                            => 'nullable',
        'workGovernment'                 => 'nullable',
        'workSide'                       => 'nullable',
        'identity_image'                 => 'required|file|image',
        'personal_image'                 => 'required|file|image',
        'certification_image'            => 'required|file|image',
        'no_conviction_image'            => 'required|file|image',
        // 'qualification.*'                => 'nullable',
        // 'side.*'                   => 'nullable|min:3|not_regex:/[0-9]/',
        // 'country.*'                      => 'nullable|min:3',
        // 'finishYear.*'               => 'nullable|digits:4',
        // 'Rate.*'               => 'nullable|regex:/^[0-9.]/',
        // 'specialization.*'               => 'nullable|min:3|not_regex:/[0-9]/',
        'payment'                        => 'nullable',
        ] );
        $order = new Order();
        $order->firstname                =            $request->name;
        $order->lastname                 =            $request->nickname;
        $order->father_name              =            $request->fathername;
        $order->grandfather_name         =            $request->grandfathername;
        $order->mother_name              =            $request->mothername;
        $order->gender                   =            $request->gender;
        $order->english_firstname        =            $request->fnameenglish;
        $order->english_lastname         =            $request->lnameenglish;
        $order->english_father_name      =            $request->fathernameenglish;
        $order->english_mother_name      =            $request->mothernameenglish;
        $order->Nationality              =            $request->Nationality;
        $order->Marital_status           =            $request->martialStatus;
        $order->place_of_birth           =            $request->placeBirth;
        $order->date_of_birth            =            $request->dateBirth;
        $order->national_id              =            $request->nationalID;
        $order->civil_registry_secretariat      =     $request->civilRegistry;
        $order->personal_identification_number  =     $request->personalIdentificationNumber;
        $order->Identity_grant_date      =            $request->identityGrantDate;
        $order->constraint               =            $request->constraint;
        $order->military                 =            $request->military;
        $order->public_record_number     =            $request->publicRecordNumber;
        $order->Health_status            =            $request->healthStatus;
        $order->Affiliation_country      =            $request->countryJoin;
        $order->address                  =            $request->address;
        $order->house_phone              =            $request->housePhone;
        $order->work_phone               =            $request->workPhone;
        $order->mobile                   =            $request->mobile;
        $order->email                    =            $request->email;
        $order->fax                      =            $request->fax;
        $order->site                     =            $request->site;
        $order->work_in_government       =            $request->workGovernment;
        $order->side_work                =            $request->workSide;
        $order->insurance_number         =            $request->insurance;
        $order->displayData              =            $request->displayData;
        $order->identity_image           =            $request->identity_image;
        $order->user_id                  =             Auth()->User()->id;

        if ($request->has('identity_image')) {         //image
            $image = $request->identity_image;
            $path = $image->store('identity-images', 'public');
            $filename = pathinfo($path, PATHINFO_FILENAME);
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $order->identity_image = $filename . '.' . $extension;
        }
        $order->personal_image = $request->personal_image;
        if ($request->has('personal_image')) {          //image
            $image = $request->personal_image;
            $path = $image->store('personal-images', 'public');
            $filename = pathinfo($path, PATHINFO_FILENAME);
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $order->personal_image = $filename . '.' . $extension;
        }
        $order->certification_image = $request->certification_image;
        if ($request->has('certification_image')) {     //image
            $image = $request->certification_image;
            $path = $image->store('certification-images', 'public');
            $filename = pathinfo($path, PATHINFO_FILENAME);
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $order->certification_image = $filename . '.' . $extension;
        }
        $order->no_conviction_image= $request->no_conviction_image;
        if ($request->has('no_conviction_image')) {      //image
            $image = $request->no_conviction_image;
            $path = $image->store('no_conviction-images', 'public');
            $filename = pathinfo($path, PATHINFO_FILENAME);
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $order->no_conviction_image = $filename . '.' . $extension;
        }
        $order->pay_affiliation_fee = $request->payment;
        $order->save();
            $qualification_list = [];
            for ($i = 0; $i < count($request->qualification); $i++) {
                if($request->qualification[$i] <> null){
                $qualification_list[$i]['qualification'] = $request->qualification[$i];
                $qualification_list[$i]['Specialization'] = $request->specialization[$i];
                $qualification_list[$i]['side'] = $request->side[$i];
                $qualification_list[$i]['country'] = $request->country[$i];
                $qualification_list[$i]['finishyear'] = $request->finishYear[$i];
                $qualification_list[$i]['rate'] = $request->Rate[$i];}
                else{
                  if (($request->specialization[$i] <> null) || ($request->side[$i] <> null) || ($request->country[$i] <> null)|| ($request->finishYear[$i] <> null)|| ($request->Rate[$i] <> null)){
                        $qualification_list[$i]['qualification'] = 'Other';
                        $qualification_list[$i]['Specialization'] = $request->specialization[$i];
                        $qualification_list[$i]['side'] = $request->side[$i];
                        $qualification_list[$i]['country'] = $request->country[$i];
                        $qualification_list[$i]['finishyear'] = $request->finishYear[$i];
                        $qualification_list[$i]['rate'] = $request->Rate[$i];
                  }
                }
        }
         $order->qualifications()->createMany($qualification_list);
    // }
         return redirect()->route('orders.show',$order);
    }

    public function printorder(Request $request,$id)
    {
        $order = Order::findOrFail($id);
        $html = view('order.order-pdf',['order'=>$order])->render();
        $pdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 'format' => 'A4','default_font' => 'fontawesome','margin_left' => 15,'margin_right' => 10,'margin_top' => 16,'margin_bottom' => 15,'margin_header' => 10, 'margin_footer' => 10 ]);
        $pdf->AddPage("P");
        $pdf->SetHTMLFooter('<p style="text-align: center">{PAGENO}</p>');
        $pdf->WriteHTML('.fa { font-family: fontawesome;}',1);
        $pdf->WriteHTML($html);
        return  $pdf->Output("order.pdf","D");
        }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show',['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order.create',['order'=> $order]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'name'                           => 'required|min:3|not_regex:/[0-9]/',
            'nickname'                       => 'required|min:3|not_regex:/[0-9]/',
            'fnameenglish'                   => 'required|min:3|regex:/^[A-Za-z_ ]*$/|not_regex:/[0-9]/',
            'lnameenglish'                   => 'required|min:3|regex:/^[A-Za-z_ ]*$/|not_regex:/[0-9]/',
            'fathername'                     => 'required|min:3|not_regex:/[0-9]/',
            'grandfathername'                => 'required|min:3|not_regex:/[0-9]/',
            'mothername'                     => 'required|min:3|not_regex:/[0-9]/',
            'gender'                         => 'nullable',
            'fathernameenglish'              => 'required|min:3|regex:/^[A-Za-z_ ]*$/|not_regex:/[0-9]/',
            'mothernameenglish'              => 'required|min:3|regex:/^[A-Za-z_ ]*$/|not_regex:/[0-9]/',
            'Nationality'                    => 'nullable',
            'placeBirth'                     => 'required',
            'dateBirth'                      => 'required|before:identityGrantDate|date',
            'nationalID'                     => 'required|numeric',
            'civilRegistry'                  => 'required',
            'martialStatus'                  => 'nullable',
            'personalIdentificationNumber'   => 'required|numeric',
            'identityGrantDate'              => 'required|date|after:dateBirth|before:tomorrow',
            'constraint'                     => 'required',
            'countryJoin'                    => 'required',
            'address'                        => 'required',
            'displayData'                    => 'required',
            'site'                           => 'url|nullable',
            'insurance'                      => 'numeric|nullable',
            'military'                       => 'nullable',
            'publicRecordNumber'             => 'nullable',
            'healthStatus'                   => 'nullable',
            'housePhone'                     => 'nullable|regex:/[0-9]/|not_regex:/[a-z]/|digits_between:7,10',
            'workPhone'                      => 'nullable|regex:/[0-9]/|not_regex:/[a-z]/|digits_between:7,10',
            'mobile'                         => 'nullable|regex:/(0)[0-9]/|not_regex:/[a-z]/|digits:10',//a leading 0 is required | not_regex: only numbers, not alphabet
            'email'                          => 'nullable|email',
            'fax'                            => 'nullable',
            'workGovernment'                 => 'nullable',
            'workSide'                       => 'nullable',
            'identity_image'                 => 'file|image',
            'personal_image'                 => 'file|image',
            'certification_image'            => 'file|image',
            'no_conviction_image'            => 'file|image',
            'finishYear.*'               => 'nullable|digits:4',
            'payment'                        => 'nullable',
            ] );
            $order->firstname                =            $request->name;
            $order->lastname                 =            $request->nickname;
            $order->father_name              =            $request->fathername;
            $order->grandfather_name         =            $request->grandfathername;
            $order->mother_name              =            $request->mothername;
            $order->gender                   =            $request->gender;
            $order->english_firstname        =            $request->fnameenglish;
            $order->english_lastname         =            $request->lnameenglish;
            $order->english_father_name      =            $request->fathernameenglish;
            $order->english_mother_name      =            $request->mothernameenglish;
            $order->Nationality              =            $request->Nationality;
            $order->Marital_status           =            $request->martialStatus;
            $order->place_of_birth           =            $request->placeBirth;
            $order->date_of_birth            =            $request->dateBirth;
            $order->national_id              =            $request->nationalID;
            $order->civil_registry_secretariat      =     $request->civilRegistry;
            $order->personal_identification_number  =     $request->personalIdentificationNumber;
            $order->Identity_grant_date      =            $request->identityGrantDate;
            $order->constraint               =            $request->constraint;
            $order->military                 =            $request->military;
            $order->public_record_number     =            $request->publicRecordNumber;
            $order->Health_status            =            $request->healthStatus;
            $order->Affiliation_country      =            $request->countryJoin;
            $order->address                  =            $request->address;
            $order->house_phone              =            $request->housePhone;
            $order->work_phone               =            $request->workPhone;
            $order->mobile                   =            $request->mobile;
            $order->email                    =            $request->email;
            $order->fax                      =            $request->fax;
            $order->site                     =            $request->site;
            $order->work_in_government       =            $request->workGovernment;
            $order->side_work                =            $request->workSide;
            $order->insurance_number         =            $request->insurance;
            $order->displayData              =            $request->displayData;
            $order->user_id                  =             Auth()->User()->id;
            if ($request->has('identity_image')) {
                $image_path = "identity-images/".$order->identity_image;  // prev image path
                Storage::disk('public')->delete($image_path);
                $image = $request->identity_image;
                $path = $image->store('identity-images', 'public');
                $filename = pathinfo($path, PATHINFO_FILENAME);
                $extension = pathinfo($path, PATHINFO_EXTENSION);
                $order->identity_image = $filename . '.' . $extension;
            }
            if ($request->has('personal_image')) {
                $image_path = "personal-images/".$order->personal_image;  // prev image path
                Storage::disk('public')->delete($image_path);         //image
                $image = $request->personal_image;
                $path = $image->store('personal-images', 'public');
                $filename = pathinfo($path, PATHINFO_FILENAME);
                $extension = pathinfo($path, PATHINFO_EXTENSION);
                $order->personal_image = $filename . '.' . $extension;
            }
            if ($request->has('certification_image')) {
                $image_path = "certification-images/".$order->certification_image;  // prev image path
                Storage::disk('public')->delete($image_path);  //image
                $image = $request->certification_image;
                $path = $image->store('certification-images', 'public');
                $filename = pathinfo($path, PATHINFO_FILENAME);
                $extension = pathinfo($path, PATHINFO_EXTENSION);
                $order->certification_image = $filename . '.' . $extension;
            }
            if ($request->has('no_conviction_image')) {
                $image_path = "no_conviction-images/".$order->no_conviction_image;  // prev image path
                Storage::disk('public')->delete($image_path);     //image
                $image = $request->no_conviction_image;
                $path = $image->store('no_conviction-images', 'public');
                $filename = pathinfo($path, PATHINFO_FILENAME);
                $extension = pathinfo($path, PATHINFO_EXTENSION);
                $order->no_conviction_image = $filename . '.' . $extension;
            }
            $order->pay_affiliation_fee = $request->payment;
        $order->save();
        $order->qualifications()->delete();
        $qualification_list = [];
        for ($i = 0; $i < count($request->qualification); $i++) {
            if($request->qualification[$i] <> null){
            $qualification_list[$i]['qualification'] = $request->qualification[$i];
            $qualification_list[$i]['Specialization'] = $request->specialization[$i];
            $qualification_list[$i]['side'] = $request->side[$i];
            $qualification_list[$i]['country'] = $request->country[$i];
            $qualification_list[$i]['finishyear'] = $request->finishYear[$i];
            $qualification_list[$i]['rate'] = $request->Rate[$i];}
            else{
              if (($request->specialization[$i] <> null) || ($request->side[$i] <> null) || ($request->country[$i] <> null)|| ($request->finishYear[$i] <> null)|| ($request->Rate[$i] <> null)){
                    $qualification_list[$i]['qualification'] = 'Other';
                    $qualification_list[$i]['Specialization'] = $request->specialization[$i];
                    $qualification_list[$i]['side'] = $request->side[$i];
                    $qualification_list[$i]['country'] = $request->country[$i];
                    $qualification_list[$i]['finishyear'] = $request->finishYear[$i];
                    $qualification_list[$i]['rate'] = $request->Rate[$i];
              }
            }
    }
        $order->qualifications()->createMany($qualification_list);
         return redirect()->route('orders.show',$order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}


