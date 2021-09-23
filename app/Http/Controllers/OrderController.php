<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

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
        'name'                           => 'required',
        'nickname'                       => 'required',
        'fnameenglish'                   => 'required',
        'lnameenglish'                   => 'required',
        'fathername'                     => 'required',
        'grandfathername'                => 'required',
        'mothername'                     => 'required',
        'gender'                         => 'nullable',
        'fathernameenglish'              => 'required',
        'mothernameenglish'              => 'required',
        'Nationality'                    => 'nullable',
        'placeBirth'                     => 'required',
        'dateBirth'                      => 'required|date',
        'nationalID'                     => 'required|numeric',
        'civilRegistry'                  => 'required',
        'martialStatus'                  => 'nullable',
        'personalIdentificationNumber'   => 'required|numeric',
        'identityGrantDate'              => 'required|date',
        'constraint'                     => 'required',
        'countryJoin'                    => 'required',
        'address'                        => 'required',
        'displayData'                    => 'required',
        'site'                           => 'url|nullable',
        'insurance'                      => 'numeric|nullable',
        'military'                       => 'nullable',
        'publicRecordNumber'             => 'nullable',
        'healthStatus'                   => 'nullable',
        'housePhone'                     => 'nullable',
        'workPhone'                      => 'nullable',
        'mobile'                         => 'nullable',
        'email'                          => 'nullable',
        'fax'                            => 'nullable',
        'workGovernment'                 => 'nullable',
        'workSide'                       => 'nullable',
        'qualification'                  => 'nullable',
        'university'                     => 'nullable',
        'country'                        => 'nullable',
        'graduationYear'                 => 'nullable|date',
        'graduationRate'                 => 'nullable',
        'specialization'                 => 'nullable',
        'payment'                        => 'nullable',
        ] );

        $order = new Order();
        $order->firstname = $request->name;
        $order->lastname = $request->nickname;
        $order->father_name = $request->fathername;
        $order->grandfather_name = $request->grandfathername;
        $order->mother_name = $request->mothername;
        $order->gender = $request->gender;
        $order->english_firstname = $request->fnameenglish;
        $order->english_lastname = $request->lnameenglish;
        $order->english_father_name = $request->fathernameenglish;
        $order->english_mother_name = $request->mothernameenglish;
        $order->Nationality = $request->Nationality;
        $order->Marital_status = $request->martialStatus;
        $order->place_of_birth = $request->placeBirth;
        $order->date_of_birth = $request->dateBirth;
        $order->national_id = $request->nationalID;
        $order->civil_registry_secretariat = $request->civilRegistry;
        $order->personal_identification_number = $request->personalIdentificationNumber;
        $order->Identity_grant_date = $request->identityGrantDate;
        $order->constraint = $request->constraint;
        $order->military = $request->military;
        $order->public_record_number = $request->publicRecordNumber;
        $order->Health_status = $request->healthStatus;
        $order->Affiliation_country = $request->countryJoin;
        $order->address = $request->address;
        $order->house_phone = $request->housePhone;
        $order->work_phone = $request->workPhone;
        $order->mobile = $request->mobile;
        $order->email = $request->email;
        $order->fax = $request->fax;
        $order->site = $request->site;
        $order->work_in_government = $request->workGovernment;
        $order->side_work = $request->workSide;
        $order->insurance_number = $request->insurance;
        $order->displayData = $request->displayData;
        $order->qualification = $request->qualification;
        $order->university = $request->university;
        $order->country = $request->country;
        $order->graduation_year = $request->graduationYear;
        $order->graduation_rate = $request->graduationRate;
        $order->Specialization = $request->specialization;
        $order->pay_affiliation_fee = $request->payment;
        $order->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
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
        //
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
