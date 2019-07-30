<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\User;
use Validator;
class VendorController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.index')->with('vendors',Vendor::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

        Validator::make($request->all(), [
            'email' => 'unique:users|unique:employees|unique:clients|unique:vendors'
            ])->validate();

        $vendor = new Vendor;
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->save();

        $user = new User;
        $user->name = $vendor->name;
        $user->email = $vendor->email;
        $user->password = bcrypt('pass@123');
        $user->save();

        $vendor->user_id = $user->id;
        $vendor->save();

        return redirect()->route('vendors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::find($id);
        return view('vendor.show')->with('vendor',$vendor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('vendor.edit')->with('vendor',$vendor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

       


        $vendor = Vendor::find($id);
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->save();

        return redirect()->route('vendors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Vendor::find($id)->user->delete();
        Vendor::find($id)->delete();
        return redirect()->back();
    }
}
