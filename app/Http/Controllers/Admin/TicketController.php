<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TechnicalIssueModel;
use App\Models\BillingModel;
use App\Models\ProductServiceModel;
use App\Models\GeneralInquiryModel;
use App\Models\FeedbackModel;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    //
    public function index()
    {
        $allTickets = collect();

        $allTickets = $allTickets->merge(TechnicalIssueModel::all()->map(fn($t) => $t->setAttribute('source', 'Technical Issue Department')));
        $allTickets = $allTickets->merge(BillingModel::all()->map(fn($t) => $t->setAttribute('source', 'Billing Department')));
        $allTickets = $allTickets->merge(ProductServiceModel::all()->map(fn($t) => $t->setAttribute('source', 'Product & Service Department')));
        $allTickets = $allTickets->merge(GeneralInquiryModel::all()->map(fn($t) => $t->setAttribute('source', 'General Department')));
        $allTickets = $allTickets->merge(FeedbackModel::all()->map(fn($t) => $t->setAttribute('source', 'Feedback Department')));

        return view('admin.dashboard', compact('allTickets'));
    }

    public function view($type, $id)
    {
        $modelMap = [
            'technical_issue_department' => \App\Models\TechnicalIssueModel::class,
            'billing_department' => \App\Models\BillingModel::class,
            'product_&_service_department' => \App\Models\ProductServiceModel::class,
            'general_department' => \App\Models\GeneralInquiryModel::class,
            'feedback_department' => \App\Models\FeedbackModel::class,
        ];

        $model = $modelMap[$type] ?? abort(404);

        $ticket = $model::findOrFail($id);

        return view('admin.ticket_view', compact('ticket', 'type'));
    }

     public function note(Request $request, $type, $id)
    {
        $request->validate([
            'note' => 'required|string|min:5',
        ]);

        $modelMap = [
            'technical_issue_department' => \App\Models\TechnicalIssueModel::class,
            'billing_department' => \App\Models\BillingModel::class,
            'product_&_service_department' => \App\Models\ProductServiceModel::class,
            'general_department' => \App\Models\GeneralInquiryModel::class,
            'feedback_department' => \App\Models\FeedbackModel::class,
        ];

        $model = $modelMap[$type] ?? abort(404);
        $ticket = $model::findOrFail($id);

        $ticket->admin_comment = $request->note;
        $ticket->admin_input = 'Noted';
        $ticket->save();

        return redirect()->route('admin.dashboard')->with('success', 'Admin Note saved and status updated.');
    }
}
