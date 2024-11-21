<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Details</title>
    <style>
        /* Base styles */
        body {
            font-family: 'Courier New', Courier, monospace;
        }

        .font-mono {
            font-family: 'Courier New', Courier, monospace;
        }

        .no-print {
            display: block;
        }

        .printdata {
            margin-top: 0;
            margin-left: 0;
            margin-right: 0;
        }

        /* Header styles */
        .bg-gradient-to-r {
            background: linear-gradient(to right, #4F46E5, #4338CA);
        }

        .text-white {
            color: white;
        }

        .text-2xl {
            font-size: 1.5rem;
        }

        .text-3xl {
            font-size: 1.875rem;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .p-4 {
            padding: 1rem;
        }

        .rounded-t-lg {
            border-radius: 0.5rem 0.5rem 0 0;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        /* Table styles */
        table {
            width: 100%;
            border: 1px solid #D1D5DB;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #D1D5DB;
            padding: 0.5rem;
            text-align: left;
        }

        th {
            background-color: #F3F4F6;
        }

        tr:nth-child(even) {
            background-color: #F9FAFB;
        }

        .border {
            border: 1px solid #D1D5DB;
        }

        .border-black {
            border: 1px solid black;
        }

        /* Footer styles */
        .bg-blue-500 {
            background-color: #3B82F6;
        }

        .text-white {
            color: white;
        }

        .hover\:bg-blue-700:hover {
            background-color: #1D4ED8;
        }

        .transition {
            transition: all 0.3s ease;
        }

        .bg-green-500 {
            background-color: #10B981;
        }

        .hover\:bg-green-700:hover {
            background-color: #047857;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .ml-2 {
            margin-left: 0.5rem;
        }

        .mt-8 {
            margin-top: 2rem;
        }

        .text-xs {
            font-size: 0.75rem;
        }

        .list-disc {
            list-style-type: disc;
        }

        .pl-4 {
            padding-left: 1rem;
        }

        .text-left {
            text-align: left;
        }

        .text-gray-500 {
            color: #6B7280;
        }

        .text-gray-600 {
            color: #4B5563;
        }

        .text-gray-700 {
            color: #374151;
        }

        /* Print media */
        @media print {
            .no-print {
                display: none;
            }

            .printdata {
                margin-top: 0;
                margin-left: 0;
                margin-right: 0;
                color:black;
            }
        }
    </style>
</head>

<body class="font-mono">
    <div class="no-print">
        @include('header')
    </div>
    <div class="mx-2 my-6 printdata">
        <div class="bg-gradient-to-r from-indigo-500 to-indigo-800 text-white p-4 rounded-t-lg">
            <p class="text-2xl font-bold text-center">Tax Invoice</p>
            <div class="flex justify-between items-center">
                <p class="text-3xl">Shri Sachidanand Traders</p>
                <div class="text-right">
                    <p class="text-sm font-bold">GSTIN: 04AEGFS3115Q1ZT</p>
                    <p class="text-sm">M.: 9815233408</p>
                </div>
            </div>
            <p class="text-sm text-center mt-4">#1489,Near Ram Leela Ground, Sector-45, Burrail, Chandigarh</p>
            <p class="text-sm text-center">E-mail: rajatkumarlupin@gmail.com</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full my-2 border">
                <tr>
                    <td class="border px-2 py-1" colspan="2">M/s:</td>
                    <td class="border px-2 py-1" colspan="2">{{ $invoice->ms }}</td>
                    <td class="border px-2 py-1">Invoice No:</td>
                    <td class="border px-2 py-1">{{ $invoice->invoice_no }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1" colspan="2">GSTIN:</td>
                    <td class="border px-2 py-1" colspan="2">{{ $invoice->gstin }}</td>
                    <td class="border px-2 py-1">Date:</td>
                    <td class="border px-2 py-1">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y') }}
                    </td>
                </tr>
                <tr>
                    <td class="border px-2 py-1" colspan="2">State</td>
                    <td class="border px-2 py-1" colspan="2">{{$invoice->state}}</td>
                    <td class="border px-2 py-1">State Code</td>
                    <td class="border px-2 py-1">{{$invoice->state_code}}</td>
                </tr>
            </table>
        </div>

        <table class="w-full table-auto border my-2">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-2 py-1">S.No</th>
                    <th class="border px-2 py-1">Description</th>
                    <th class="border px-2 py-1">HSN/SAC Code</th>
                    <th class="border px-2 py-1">Quantity</th>
                    <th class="border px-2 py-1">Rate</th>
                    <th class="border px-2 py-1">Total Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $index => $item)
                    <tr class="text-center">
                        <td class="border px-2 py-1">{{ $index + 1 }}</td>
                        <td class="border px-2 py-1">{{ $item->description }}</td>
                        <td class="border px-2 py-1">{{ $item->hsn_code }}</td>
                        <td class="border px-2 py-1">{{ $item->quantity }}</td>
                        <td class="border px-2 py-1">{{ number_format($item->rate, 2) }}</td>
                        <td class="border px-2 py-1">{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                @endforeach
                <tr class="bg-gray-0">
                    <td colSpan="3" rowSpan="6" class="border border-black px-1 py-1">Grand Total (In Words): <span
                            class="font-semibold">{{$invoice->grand_total_in_words}}</span></td>
                    <td colSpan="2" class="border border-black px-1 py-1">Subtotal:</td>
                    <td class="border border-black px-1 py-1">{{$invoice->subtotal}}</td>
                </tr>
                <tr class="bg-gray-0">
                    <td colSpan="2" class="border border-black px-1 py-1">Freight</td>
                    <td class="border border-black px-1 py-1">{{$invoice->freight}}</td>
                </tr>
                <tr class="bg-gray-0">
                    <td colSpan="2" class="border border-black px-1 py-1">CGST:</td>
                    <td class="border border-black px-1 py-1">{{$invoice->cgst}}</td>
                </tr>
                <tr class="bg-gray-0">
                    <td colSpan="2" class="border border-black px-1 py-1">SGST</td>
                    <td class="border border-black px-1 py-1">{{$invoice->sgst}}</td>
                </tr>
                <tr class="bg-gray-0">
                    <td colSpan="2" class="border border-black px-1 py-1">IGST:</td>
                    <td class="border border-black px-1 py-1">{{$invoice->igst}}</td>
                </tr>
                <tr class="bg-gray-0">
                    <td colSpan="2" class="border border-black px-1 py-1">Grand Total</td>
                    <td class="border border-black px-1 py-1">{{$invoice->grand_total}}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-8">
            <p class="text-xs text-gray-500">Terms & Conditions:</p>
            <ul class="text-xs list-disc text-gray-600 pl-4">
                <li>Goods once sold will not be taken back.</li>
                <li>All disputes are subject to jurisdiction in Delhi.</li>
                <li>In case of late payment, interest @ 2% per month will be charged.</li>
            </ul>
        </div>
    </div>

    <div class="no-print">
        <button class="px-4 py-2 bg-green-500 text-white hover:bg-green-700 transition mt-8" onclick="window.print()">Print Invoice</button>
    </div>
</body>

</html>
