<?php

namespace App\Http\Controllers;

use App\Models\memu;
use App\Models\outlet;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class MemuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = memu::paginate(10);
        return view('memu.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlet = outlet::all();
        return view('memu.create',compact('outlet'));
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
            $data=new memu;
            $data->outlet_id = $request->outlet_id;
            $data->jso_id = $request->jso_id;
            $data->sr_id = $request->sr_id;
            $data->total_amount = $request->total_amount;
            $data->paid_amount = $request->paid_amount;
            $data->due_amount = $request->due_amount;
            $data->memu_date = $request->memu_date;
            $data->next_due_collection_date = $request->next_due_collection_date;

            if($data->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.memu.index');
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
     * @param  \App\Models\memu  $memu
     * @return \Illuminate\Http\Response
     */
    public function show(memu $memu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\memu  $memu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outlet = outlet::all();
        $mdata = memu::findOrFail(encryptor('decrypt',$id));
        return view('memu.edit',compact('outlet','mdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\memu  $memu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data= memu::findOrFail(encryptor('decrypt',$id));
            $data->outlet_id = $request->outlet_id;
            $data->jso_id = $request->jso_id;
            $data->sr_id = $request->sr_id;
            $data->total_amount = $request->total_amount;
            $data->paid_amount = $request->paid_amount;
            $data->due_amount = $request->due_amount;
            $data->memu_date = $request->memu_date;
            $data->next_due_collection_date = $request->next_due_collection_date;

            if($data->save()){
            Toastr::success('Updated Successfully!');
            return redirect()->route(currentUser().'.memu.index');
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
     * @param  \App\Models\memu  $memu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= memu::findOrFail(encryptor('decrypt',$id));
        $data->delete();
        return redirect()->back();
    }
}
