<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #1e3a8a;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #374151;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            background-color: #f9fafb;
            font-size: 0.9rem;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
            background-color: #ffffff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            border: 1px solid #e5e7eb;
            padding: 10px;
        }

        th {
            background-color: #f3f4f6;
            color: #1f2937;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        button {
            padding: 10px 20px;
            border: none;
            background-color: #2563eb;
            color: #ffffff;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1d4ed8;
        }

        .link-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .link-container a {
            text-align: center;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }

        .link-container .main-page {
            background-color: #2563eb;
        }

        .link-container .main-page:hover {
            background-color: #1d4ed8;
        }

        .link-container .view-bills {
            background-color: #6b7280;
        }

        .link-container .view-bills:hover {
            background-color: #4b5563;
        }

        .message {
            padding: 15px;
            border-radius: 5px;
            color: white;
            margin-bottom: 20px;
            text-align: center;
        }

        .success {
            background-color: #10b981;
        }
    </style>
</head>

<body>
    @include('header')
    <div class="container">
        <h1>Edit Invoice</h1>

        <!-- Success Message -->
        @if(session('success'))
        <div class="message success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Edit Invoice Form -->
        <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Invoice Information -->
            <div>
                <label for="invoice_no">Invoice No</label>
                <input type="text" name="invoice_no" id="invoice_no" value="{{ old('invoice_no', $invoice->invoice_no) }}" required>
            </div>

            <div>
                <label for="ms">M/s</label>
                <input type="text" name="ms" id="ms" value="{{ old('ms', $invoice->ms) }}" required>
            </div>

            <div>
                <label for="invoice_date">Invoice Date</label>
                <input type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', $invoice->invoice_date) }}" required>
            </div>

            <div>
                <label for="gstin">GSTIN</label>
                <input type="text" name="gstin" id="gstin" value="{{ old('gstin', $invoice->gstin) }}" required>
            </div>

            <div>
                <label for="state">State</label>
                <input type="text" name="state" id="state" value="{{ old('state', $invoice->state) }}" required>
            </div>

            <div>
                <label for="state_code">State Code</label>
                <input type="text" name="state_code" id="state_code" value="{{ old('state_code', $invoice->state_code) }}" required>
            </div>

            <!-- Invoice Items -->
            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Description</th>
                        <th>HSN Code</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <input type="hidden" name="items[{{ $loop->index }}][id]" value="{{ $item->id }}">
                        <td><input type="text" name="items[{{ $loop->index }}][s_no]" value="{{ old('items.' . $loop->index . '.s_no', $item->s_no) }}" required></td>
                        <td><input type="text" name="items[{{ $loop->index }}][description]" value="{{ old('items.' . $loop->index . '.description', $item->description) }}" required></td>
                        <td><input type="text" name="items[{{ $loop->index }}][hsn_code]" value="{{ old('items.' . $loop->index . '.hsn_code', $item->hsn_code) }}"></td>
                        <td><input type="number" name="items[{{ $loop->index }}][quantity]" value="{{ old('items.' . $loop->index . '.quantity', $item->quantity) }}" required></td>
                        <td><input type="number" name="items[{{ $loop->index }}][rate]" value="{{ old('items.' . $loop->index . '.rate', $item->rate) }}" required></td>
                        <td><input type="number" name="items[{{ $loop->index }}][total_price]" value="{{ old('items.' . $loop->index . '.total_price', $item->total_price) }}" required></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Submit Button -->
            <div>
                <button type="submit">Update Invoice</button>
            </div>
        </form>

        <div class="link-container">
            <a href="{{ route('welcome') }}" class="main-page">Back to Main Page</a>
            <a href="{{ route('existing-bills') }}" class="view-bills">View Existing Bills</a>
        </div>
    </div>
</body>

</html>
