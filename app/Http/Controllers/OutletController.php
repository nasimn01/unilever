<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use App\Models\Settings\Location\District;
use App\Models\Settings\Location\Upazila;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;


class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = outlet::paginate(10);
        return view('outlet.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $district = District::all();
        $upazila = Upazila::all();
        return view('outlet.create',compact('district','upazila'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data=new outlet;
            $data->code = $request->code;
            $data->alt_code = $request->alt_code;
            $data->name = $request->name;
            $data->short_name = $request->short_name;
            $data->bangla_name = $request->bangla_name;
            $data->owner = $request->owner;
            $data->address = $request->address;
            $data->contact = $request->contact;
            $data->channel = $request->channel;
            $data->region = $request->region;
            $data->town = $request->town;
            $data->distributor_code = $request->distributor_code;
            $data->route_code = $request->route_code;
            $data->route_name = $request->route_name;
            $data->outlet_create_date = $request->outlet_create_date;
            $data->frequency = $request->frequency;
            $data->sales_officer = $request->sales_officer;
            if($data->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.outlet.index');
            } else{
            Toastr::warning('Please try Again!');
             return redirect()->back();
            }

        }
        catch (Exception $e){
            // dd($e);
            return back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $district = District::all();
        $upazila = Upazila::all();
        $outlet = outlet::findOrFail(encryptor('decrypt',$id));
        return view('outlet.edit',compact('district','upazila','outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data= outlet::findOrFail(encryptor('decrypt',$id));
            $data->code = $request->code;
            $data->alt_code = $request->alt_code;
            $data->name = $request->name;
            $data->short_name = $request->short_name;
            $data->bangla_name = $request->bangla_name;
            $data->owner = $request->owner;
            $data->address = $request->address;
            $data->contact = $request->contact;
            $data->channel = $request->channel;
            $data->region = $request->region;
            $data->town = $request->town;
            $data->distributor_code = $request->distributor_code;
            $data->route_code = $request->route_code;
            $data->route_name = $request->route_name;
            $data->outlet_create_date = $request->outlet_create_date;
            $data->frequency = $request->frequency;
            $data->sales_officer = $request->sales_officer;
            if($data->save()){
            Toastr::success('Updated Successfully!');
            return redirect()->route(currentUser().'.outlet.index');
            } else{
            Toastr::warning('Please try Again!');
             return redirect()->back();
            }

        }
        catch (Exception $e){
            // dd($e);
            return back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= outlet::findOrFail(encryptor('decrypt',$id));
        $data->delete();
        return redirect()->back();
    }
}
