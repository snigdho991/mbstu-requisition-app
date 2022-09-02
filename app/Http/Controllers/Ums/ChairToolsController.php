<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Requisition;

use Session;
use Auth;

class ChairToolsController extends Controller
{
	public function __construct()
    {
        $this->middleware(['role:Chairman']);
    }

    public function chairman_dashboard()
    {
    	return view('backend.chairman.index');
    }

    public function pending_requisitions()
    {
        $pending = Requisition::where(['status' => 'Forwarded To Vice Chancellor'])->orderBy('created_at', 'desc')->get();
        return view('backend.chairman.requisition.pending', compact('pending'));
    }

    public function approved_requisitions()
    {
        $approved = Requisition::where(['status' => 'Approved By Vice Chancellor'])->orderBy('created_at', 'desc')->get();
        return view('backend.chairman.requisition.approved', compact('approved'));
    }

    public function declined_requisitions()
    {
        $declined = Requisition::where(['status' => 'Declined By Vice Chancellor'])->orderBy('created_at', 'desc')->get();
        return view('backend.chairman.requisition.declined', compact('declined'));
    }

    public function chair_approve_requisition(Request $request)
    {
        $approve = Requisition::where(['id' => $request->id])->update(['status' => 'Approved By Vice Chancellor']);

        Session::flash('success', 'Requisition Approved Successfully !');
        return redirect()->back();
    }

    public function chair_decline_requisition(Request $request)
    {
        $decline = Requisition::where(['id' => $request->id])->update(['status' => 'Declined By Vice Chancellor']);

        Session::flash('error', 'Requisition Declined !');
        return redirect()->back();
    }
}
