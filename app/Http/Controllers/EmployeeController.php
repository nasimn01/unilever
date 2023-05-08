<?php

namespace App\Http\Controllers;

use App\Models\designation;
use App\Models\employee;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = employee::paginate(10);
        return view('employee.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designation = designation::all();
        return view('employee.create',compact('designation'));
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
            $data=new employee;
            $data->employee_code = $request->employee_code;
            $data->designation_id = $request->designation;
            $data->name = $request->name;
            $data->father_name = $request->father_name;
            $data->mother_name = $request->mother_name;
            $data->contact = $request->contact;
            $data->area = $request->area;
            $data->permanent_address = $request->permanent_address;
            $data->status = $request->status;
           
            if($data->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.employee.index');
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
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = designation::all();
        $emdata = employee::findOrFail(encryptor('decrypt',$id));
        return view('employee.edit',compact('designation','emdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data= employee::findOrFail(encryptor('decrypt',$id));
            $data->employee_code = $request->employee_code;
            $data->designation_id = $request->designation;
            $data->name = $request->name;
            $data->father_name = $request->father_name;
            $data->mother_name = $request->mother_name;
            $data->contact = $request->contact;
            $data->area = $request->area;
            $data->permanent_address = $request->permanent_address;
            $data->status = $request->status;
           
            if($data->save()){
            Toastr::success('Updated Successfully!');
            return redirect()->route(currentUser().'.employee.index');
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
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= employee::findOrFail(encryptor('decrypt',$id));
        $data->delete();
        return redirect()->back();
    }
}
