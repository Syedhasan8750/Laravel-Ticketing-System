@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    

    <table id="ticketsTable" class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Sr. No</th>
                <th>Type</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Department</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $cnt = 1;
            @endphp
            @foreach($allTickets as $ticket)
                <tr>
                    <td>{{ $cnt }}</td>
                    <td>{{ $ticket->ticket_type }}</td>
                    <td>{{ $ticket->subject ?? 'NA' }}</td>
                    <td>{{ $ticket->description ?? 'NA' }}</td>
                    <td>{{ $ticket->source }}</td>
                    <td>{{ $ticket->admin_input }}</td>
                    <td>
                        <a href="{{ route('admin.ticket.view', ['type' => strtolower(str_replace(' ', '_', $ticket->source)), 'id' => $ticket->id]) }}"
                        class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
                @php 
                    $cnt++;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#ticketsTable').DataTable({
            responsive: true,
            pageLength: 10
        });
    });
</script>
@endpush
