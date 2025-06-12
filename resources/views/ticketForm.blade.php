<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Support Ticket</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Header -->
    <header class="bg-primary text-white py-3 mb-4">
        <div class="container">
            <h1 class="h3 mb-0">Support Ticket System</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="card">
                    <div class="card-header">Submit a Support Ticket</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('save-ticket') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="subject" class="form-label">Ticket Subject (Optional)</label>
                                <input type="text" name="subject" id="subject" class="form-control">
                                @error('subject')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ticket_type" class="form-label">Ticket Type <span style="color: red;">*</span> </label>
                                <select name="ticket_type" id="ticket_type" class="form-select" required>
                                    <option value="">Select</option>
                                    <option>Technical Issues</option>
                                    <option>Account & Billing</option>
                                    <option>Product & Service</option>
                                    <option>General Inquiry</option>
                                    <option>Feedback & Suggestions</option>
                                </select>
                                @error('ticket_type')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label for="description" class="form-label">Description (Optional)</label>
                                <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                                @error('description')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Ticket</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-4">
        <div class="container">
            <span class="text-muted">© {{ now()->year }} Support Ticket System</span>
        </div>
    </footer>

    <!-- Bootstrap JS (optional, for dropdowns, modals etc) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>