@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Ticket Details</h3>

    <div class="mb-3">
        <strong>Type:</strong> {{ $ticket->ticket_type }} <br>
        <strong>Subject:</strong> {{ $ticket->subject ?? 'NA' }} <br>
        <strong>Description:</strong>
        <p>{{ $ticket->description ?? 'NA'}}</p>
        <strong>Status:</strong> {{ $ticket->admin_input ?? 'Pending' }}
    </div>

    @if (!empty($ticket->admin_comment))
        <div class="alert alert-success">
            <h5 class="mb-2">Admin Note</h5>
            <div>{!! $ticket->admin_comment !!}</div>
        </div>
    @else
        <form action="{{ route('admin.ticket.note', ['type' => $type, 'id' => $ticket->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="note" class="form-label">Admin Note</label>
                <input id="note" type="hidden" name="note" value="{{ old('note') }}">
                <trix-editor input="note"></trix-editor>
            </div>
            <button type="submit" class="btn btn-success">Save Note</button>
        </form>
    @endif
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endpush

@push('scripts')
<script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endpush
