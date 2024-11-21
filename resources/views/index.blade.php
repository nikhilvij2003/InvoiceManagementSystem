<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bills</title>
    <style>
        /* Tailwind CSS Styles */
        body {
            background-color: #f3f4f6;
            font-family: sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .success-message {
            background-color: #c6f6d5;
            color: #2f855a;
            border: 1px solid #38a169;
            padding: 0.5rem 1rem;
            margin-bottom: 1rem;
            text-align: center;
            border-radius: 0.375rem;
        }

        table {
            width: 100%;
            background-color: white;
            border-collapse: collapse;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #edf2f7;
            color: #4a5568;
            text-transform: uppercase;
            font-size: 0.875rem;
            line-height: 1.5;
        }

        th, td {
            padding: 1rem;
            text-align: left;
        }

        th {
            text-align: left;
        }

        tbody {
            font-size: 0.875rem;
            font-weight: 300;
        }

        tr {
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background-color: #f7fafc;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.25rem 0.75rem;
            border-radius: 0.375rem;
            color: white;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-view {
            background-color: #3b82f6;
        }

        .btn-view:hover {
            background-color: #2563eb;
        }

        .btn-update {
            background-color: #f59e0b;
        }

        .btn-update:hover {
            background-color: #d97706;
        }

        .btn-delete {
            background-color: #ef4444;
        }

        .btn-delete:hover {
            background-color: #dc2626;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>
    @include('header')
    <div class="container">
        <h1>All Bills</h1>
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Bills Table -->
        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice No</th>
                        <th>M/S Name</th>
                        <th>Invoice Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $index => $invoice)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $invoice->invoice_no }}</td>
                            <td>{{ $invoice->ms }}</td>
                            <td>{{ $invoice->invoice_date }}</td>
                            <td class="action-buttons">
                                <!-- View Button -->
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-view">
                                    View
                                </a>
                                
                                <!-- Update Button -->
                                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-update">
                                    Update
                                </a>
                                
                                <!-- Delete Button with Confirmation -->
                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this bill?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('footer')
</body>
</html>
