<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Requisition;

use Auth;
use Session;

class TeacherToolsController extends Controller
{
	public function __construct()
    {
        $this->middleware(['role:Teacher']);
    }

    public function wait_approval()
    {
        return view('backend.teacher.wait-approval');
    }

    public function teacher_dashboard()
    {
    	return view('backend.teacher.index');
    }

    public function get_started()
    {
        $auth = Auth::user();

        return view('backend.teacher.requisition.new', compact('auth'));
    }

    public function personal_requisition()
    {
        return view('backend.teacher.requisition.personal');
    }

    public function official_requisition()
    {
        return view('backend.teacher.requisition.official');
    }

    public function store_requisition(Request $request)
    {
        $this->validate($request, [
            'reason'           => 'required',
            'car_type'         => 'required',
            'requisition_type' => 'required',
            'start_at'         => 'required',
            'from'             => 'required',
            'to'               => 'required',
            'distance'         => 'required',
            'cost'             => 'required',
            'duration'         => 'required',
        ]);

        $requisition = new Requisition();
        $requisition->user_id   = Auth::id();
        $requisition->reason   = $request->reason;
        $requisition->car_type = $request->car_type;
        $requisition->requisition_type = $request->requisition_type;
        $requisition->start_at = $request->start_at;
        $requisition->from = $request->from;
        $requisition->to   = $request->to;
        $requisition->distance = $request->distance;
        $requisition->cost = $request->cost;
        $requisition->duration = $request->duration;
        $requisition->dept = $request->dept;

        $requisition->save();

        Session::flash('success', 'New Requisition Started Successfully !');
        return redirect()->route('manage.requisition', $requisition->id);
    }

    public function pending_chairman()
    {
        $pending = Requisition::where(['status' => 'Forwarded To Vice Chancellor', 'user_id' => Auth::id()])->orderBy('created_at', 'desc')->get();
        return view('backend.teacher.requisition.pending.chairman', compact('pending'));
    }

    public function pending_administration()
    {
        $pending = Requisition::where(['status' => 'Pending', 'user_id' => Auth::id()])->orderBy('created_at', 'desc')->get();
        return view('backend.teacher.requisition.pending.administration', compact('pending'));
    }

    public function approved_requisition()
    {
        $approved = Requisition::where(['status' => 'Approved By Administration', 'user_id' => Auth::id()])->orderBy('created_at', 'desc')->get();
        return view('backend.teacher.requisition.approved', compact('approved'));
    }

    public function approved_vc()
    {
        $approved = Requisition::where(['status' => 'Approved By Vice Chancellor', 'user_id' => Auth::id()])->orderBy('created_at', 'desc')->get();
        return view('backend.teacher.requisition.approved-vc', compact('approved'));
    }

    public function declined_chairman()
    {
        $declined = Requisition::where(['status' => 'Declined By Vice Chancellor', 'user_id' => Auth::id()])->orderBy('created_at', 'desc')->get();
        return view('backend.teacher.requisition.declined.chairman', compact('declined'));
    }

    public function declined_administration()
    {
        $declined = Requisition::where(['status' => 'Declined By Administration', 'user_id' => Auth::id()])->orderBy('created_at', 'desc')->get();
        return view('backend.teacher.requisition.declined.administration', compact('declined'));
    }
}
