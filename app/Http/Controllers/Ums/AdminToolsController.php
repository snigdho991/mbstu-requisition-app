<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Requisition;
use App\Models\User;
use App\Models\Driver;

use Session;
use Auth;

class AdminToolsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Administration']);
    }

    public function dashboard()
    {
        $forwarded = Requisition::where(['status' => 'Forwarded To Vice Chancellor'])->count();
        $pending   = Requisition::where(['status' => 'Pending'])->count();
        $approved  = Requisition::where(['status' => 'Approved By Administration'])->count();
        $declined  = Requisition::where(['status' => 'Declined By Administration'])->count();

    	return view('backend.administrator.index', compact('forwarded', 'pending', 'approved', 'declined'));
    }

    public function teachers_list()
    {
        $teachers = User::where([
                ['approved_at', '!=', null],
                ['role', '=', 'Teacher']
            ])->orderBy('created_at', 'desc')->get();
        
        return view('backend.administrator.teachers.teachers-list', compact('teachers'));
    }

    public function approval_list()
    {
        $need_approval = User::where(['approved_at' => null, 'role' => 'Teacher'])->orderBy('created_at', 'desc')->get();

        return view('backend.administrator.teachers.approval-list', compact('need_approval'));
    }

    public function approve_teacher(Request $request)
    {
        $approve = User::where(['id' => $request->id, 'role' => 'Teacher'])->update(['approved_at' => now()]);

        Session::flash('success', 'Teacher Approved Successfully !');
        return redirect()->back();
    }

    public function decline_teacher(Request $request)
    {
        $decline = User::where(['id' => $request->id, 'role' => 'Teacher'])->first();

        $decline->delete();

        Session::flash('error', 'Teacher Declined and Deleted Permanently !');
        return redirect()->back();
    }

    public function pending_requisitions()
    {
        $pending = Requisition::where(['status' => 'Pending'])->orderBy('created_at', 'desc')->get();
        return view('backend.administrator.requisition.pending', compact('pending'));
    }

    public function approved_requisitions()
    {
        $approved = Requisition::where(['status' => 'Approved By Administration'])->orderBy('created_at', 'desc')->get();
        return view('backend.administrator.requisition.approved', compact('approved'));
    }

    public function forwarded_requisitions()
    {
        $pending = Requisition::where(['status' => 'Forwarded To Vice Chancellor'])->orderBy('created_at', 'desc')->get();
        return view('backend.administrator.requisition.forwarded', compact('pending'));
    }

    public function declined_requisitions()
    {
        $declined = Requisition::where(['status' => 'Declined By Administration'])->orderBy('created_at', 'desc')->get();
        return view('backend.administrator.requisition.declined', compact('declined'));
    }

    public function admin_confirm_requisition(Request $request)
    {
        $confirm = Requisition::where(['id' => $request->id])->update(['status' => 'Approved By Administration', 'driver_id' => $request->driver_id]);

        $requisition = Requisition::where(['id' => $request->id])->first();
        $user = User::findOrFail($requisition->user_id);
        $driver = Driver::findOrFail($requisition->driver_id);

        $pickup = $requisition->from;
        $destination = $requisition->to;

        $user_name = $user->name;
        $user_phone = $user->phone;
        $user_designation = $user->recognition;

        $driver_name = $driver->name;
        $driver_phone = $driver->phone;

        /*$driver_number = '88'.$driver->phone;
        $driver_message = 'Pickup: '.$pickup.' Destination: '.$destination.' Traveller: '.$user_name.' Designation: '.$user_designation.' Phone: '.$user_phone;
        \BulkSMSBD::send($driver_number, $driver_message);

        $user_number = '880'.$user->phone;
        $user_message = 'Pickup: '.$pickup.' Destination: '.$destination.' Driver: '.$driver_name.' Phone: '.$driver_phone;
        \BulkSMSBD::send($user_number, $user_message);*/

        $url = "http://66.45.237.70/api.php";

        $driver_number = '88'.$driver->phone;
        $driver_message = 'Pickup: '.$pickup.'%0a Destination: '.$destination.'%0a Traveller: '.$user_name.'%0a Designation: '.$user_designation.'%0a Phone: '.$user_phone;

        $user_data = array(
        'username' => "snigdho_2",
        'password' => "X6PV5Y9A",
        'number' => "$driver_number",
        'message' => "$driver_message"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($user_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];

        Session::flash('success', 'Requisition Confirmed Successfully !');
        return redirect()->back();
    }

    public function admin_reject_requisition(Request $request)
    {
        $reject = Requisition::where(['id' => $request->id])->update(['status' => 'Declined By Administration', 'reject_reason' => $request->reject_reason]);

        Session::flash('error', 'Requisition Rejected !');
        return redirect()->back();
    }

    public function admin_forward_requisition(Request $request)
    {
        $reject = Requisition::where(['id' => $request->id])->update(['status' => 'Forwarded To Vice Chancellor']);

        Session::flash('info', 'Requisition Forwarded To Vice Chancellor !');
        return redirect()->back();
    }

    public function store_extra(Request $request)
    {

        $extra = Requisition::where(['id' => $request->id])->first();
        $extra->extra_km = round($request->extra_km, 3);
        $extra->extra_duration = round($request->extra_duration, 2);

        if ($extra->car_type == 'Big Bus') {
            $kilo = $request->extra_km * 20;
            $cost = $request->extra_duration * 20;
            $final = round($kilo + $cost + $extra->cost, 2);
            $extra->grand_total = $final;
        } elseif ($extra->car_type == 'Mini Bus') {
            $kilo = $request->extra_km * 15;
            $cost = $request->extra_duration * 15;
            $final = round($kilo + $cost + $extra->cost, 2);
            $extra->grand_total = $final;
        } elseif ($extra->car_type == 'Micro Bus' || $extra->car_type == 'Pajero' || $extra->car_type == 'Pickup') {
            $kilo = $request->extra_km * 6;
            $cost = $request->extra_duration * 12;
            $final = round($kilo + $cost + $extra->cost, 2);
            $extra->grand_total = $final;
        } elseif ($extra->car_type == 'Car' || $extra->car_type == 'Ambulance') {
            $kilo = $request->extra_km * 4;
            $cost = $request->extra_duration * 10;
            $final = round($kilo + $cost + $extra->cost, 2);
            $extra->grand_total = $final;
        }

        $extra->save();

        Session::flash('info', 'Extra Cost Saved Successfully !');
        return redirect()->back();
    }
}
