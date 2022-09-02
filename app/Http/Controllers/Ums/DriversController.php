<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Driver;
use App\Models\Requisition;

use Image;
use Auth;
use Session;

class DriversController extends Controller
{
	public function __construct()
    {
        $this->middleware(['role:Administration']);
    }

    public function index()
    {
        $drivers = Driver::orderBy('created_at', 'desc')->get();
        return view('backend.administrator.drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('backend.administrator.drivers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'phone' => 'required|unique:drivers',
        ]);

        $driver = new Driver();

        $driver->name  = $request->name;
        $driver->phone = $request->phone;
        $driver->email = $request->email;

        if ($request->hasFile('photo')) {
        	$image_tmp = $request->file('photo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'assets/uploads/drivers/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $driver->photo = $image_new_name;
            }
        }

       	$driver->save();

        Session::flash('success', 'Driver Added Successfully !');
        return redirect()->route('driver.index');
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);

        return view('backend.administrator.drivers.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
    	$driver = Driver::findOrFail($id);

        $this->validate($request, [
        	'name'  => 'required',
            'phone' => 'required|unique:drivers,phone,'.$driver->id
        ]);

        $driver->name  = $request->name;
        $driver->phone = $request->phone;
        $driver->email = $request->email;

        if ($request->hasFile('photo')) {
        	$image_tmp = $request->file('photo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'assets/uploads/drivers/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $driver->photo = $image_new_name;
            }
        }

       	$driver->save();
		
		Session::flash('info', 'Driver stuffs updated successfully.');
        return redirect('administrator/all-drivers');
        
    }

    public function destroy($id)
    {
        
        $driver = Driver::findOrFail($id);
        $driver->delete();

        Session::flash('error', 'Driver Removed Successfully !');
        return redirect()->route('driver.index');

    }

    public function scheduled(Request $request)
    {
        $requisitions = Requisition::orderBy('created_at', 'desc')->get();
        return view('backend.administrator.drivers.scheduled', compact('requisitions'));
    }
}
