<?php

namespace App\Http\Controllers;

use App\Models\BillingModel;
use App\Models\FeedbackModel;
use App\Models\GeneralInquiryModel;
use App\Models\ProductServiceModel;
use App\Models\TechnicalIssueModel;
use Illuminate\Http\Request;

class ticketController extends Controller
{
    //

    public function index()
    {
        return view('ticketForm');
    }

    // Store Ticket
    public function saveTicket(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'ticket_type' => 'required',

        ], [
            'ticket_type.required' => 'Please select a ticket type.',
        ]);

        $ticketData = [
            'ticket_type' => $request->ticket_type,
            'subject' => $request->subject,
            'description' => $request->description,
        ];

        $department = '';

        switch ($request->ticket_type) {
            case 'Technical Issues':
                // dd((new TechnicalIssueModel())->getConnection()->getDatabaseName());
                TechnicalIssueModel::create($ticketData);
                $department = 'Technical Issues';
                break;

            case 'Account & Billing':
                BillingModel::create($ticketData);
                $department = 'Account & Billing';
                break;

            case 'Product & Service':
                ProductServiceModel::create($ticketData);
                $department = 'Product & Service';
                break;

            case 'General Inquiry':
                GeneralInquiryModel::create($ticketData);
                $department = 'General Inquiry';
                break;

            case 'Feedback & Suggestions':
                FeedbackModel::create($ticketData);
                $department = 'Feedback & Suggestions';
                break;

            default:
                return redirect()->back()->withErrors(['ticket_type' => 'Invalid ticket type selected.']);
        }

        return redirect()->back()->with('success', 'Your ticket has been submitted successfully! in ' . $department . ' Please wait for admin response.');
    }
}

