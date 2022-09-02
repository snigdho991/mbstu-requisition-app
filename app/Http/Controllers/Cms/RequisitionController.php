<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Requisition;
use App\Models\User;

use Auth;
use PDF;

class RequisitionController extends Controller
{
    public function manage_requisition($id, Request $request)
    {
    	$requisition = Requisition::find($id);
		$auth = Auth::user();

		$user = User::find($requisition->user_id);

		if ($auth->hasRole('Teacher')) {
			if ($requisition->user_id == $auth->id) {

				if ($request->has('download')) {
		            $pdf = PDF::loadView('backend.requisition.print', compact('requisition', 'user'))/*->setOptions(['defaultFont' => 'Poppins'])*/;
		            return $pdf->download('requisition.pdf');
		        }

				return view('backend.requisition.manage', compact('requisition', 'user'));
			} else {
				abort(403);
			}
		} elseif ($auth->hasRole('Chairman')) {
			
			if ($request->has('download')) {
	            $pdf = PDF::loadView('backend.requisition.print', compact('requisition', 'user'))/*->setOptions(['defaultFont' => 'Poppins'])*/;
	            return $pdf->download('requisition.pdf');
	        }

			return view('backend.requisition.manage', compact('requisition', 'user'));
			
		} elseif ($auth->hasRole('Administration')) {

			if ($request->has('download')) {
	            $pdf = PDF::loadView('backend.requisition.print', compact('requisition', 'user'))/*->setOptions(['defaultFont' => 'Poppins'])*/;
	            $pdf->setPaper('A4'); 

	            /*// Instantiate canvas instance 
				$canvas = $pdf->getCanvas(); 

				// Get height and width of page 
				$w = $canvas->get_width(); 
				$h = $canvas->get_height(); 

				// Specify watermark image 
				$imageURL = 'images/codexworld-logo.png'; 
				$imgWidth = 200; 
				$imgHeight = 20; 

				// Set image opacity 
				$canvas->set_opacity(.5); 

				// Specify horizontal and vertical position 
				$x = (($w-$imgWidth)/2); 
				$y = (($h-$imgHeight)/2); 

				// Add an image to the pdf 
				$canvas->image($imageURL, $x, $y, $imgWidth, $imgHeight); 

				// Output the generated PDF (1 = download and 0 = preview) 
				$pdf->stream('document.pdf', array("Attachment" => 0));*/

	            return $pdf->download('requisition.pdf');
	        }

			return view('backend.requisition.manage', compact('requisition', 'user'));
		}
    }

    public function print_requisition($id)
    {
    	$requisition = Requisition::find($id);
		$auth = Auth::user();

		$user = User::find($requisition->user_id);

		if ($auth->hasRole('Teacher')) {
			if ($requisition->user_id == $auth->id) {
				return view('backend.requisition.print', compact('requisition', 'user'));
			} else {
				abort(403);
			}
		} elseif ($auth->hasRole('Chairman')) {
			if ($requisition->dept == $auth->dept) {
				return view('backend.requisition.print', compact('requisition', 'user'));
			} else {
				abort(403);
			}
		} elseif ($auth->hasRole('Administration')) {
			return view('backend.requisition.print', compact('requisition', 'user'));
		}
    }
}
