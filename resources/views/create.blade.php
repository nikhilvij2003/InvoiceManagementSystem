<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1.5rem;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1, h3 {
            color: #333;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        h3 {
            font-size: 1.2rem;
            margin-top: 1.5rem;
            margin-bottom: 0.8rem;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .input-field {
            width: 100%;
            padding: 0.6rem;
            margin-bottom: 0.8rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .grid {
            display: grid;
            gap: 1rem;
        }

        .grid-cols-2 {
            grid-template-columns: 1fr 1fr;
        }

        .btn {
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-blue {
            background-color: #007bff;
            color: white;
        }

        .btn-blue:hover {
            background-color: #0056b3;
        }

        .btn-green {
            background-color: #28a745;
            color: white;
        }

        .btn-green:hover {
            background-color: #218838;
        }

        .btn-gray {
            background-color: #6c757d;
            color: white;
        }

        .btn-gray:hover {
            background-color: #565e64;
        }

        .item {
            padding: 1rem;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 0.8rem;
        }

        .item:last-child {
            margin-bottom: 0;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .actions a {
            text-decoration: none;
            display: inline-block;
            padding: 0.6rem 1rem;
            border-radius: 4px;
            color: white;
            text-align: center;
        }

        .actions a.btn-blue {
            background-color: #007bff;
        }

        .actions a.btn-blue:hover {
            background-color: #0056b3;
        }

        .actions a.btn-gray {
            background-color: #6c757d;
        }

        .actions a.btn-gray:hover {
            background-color: #565e64;
        }
    </style>
</head>

<body>
    @include('header')

    <div class="container">
        <h1>Create Invoice</h1>
        <form action="{{ route('invoicesstore') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2">
                <input type="text" name="ms" placeholder="M/s" class="input-field" required>
                <input type="text" name="invoice_no" placeholder="Invoice No" class="input-field" required>
                <input type="text" name="gstin" placeholder="GSTIN" class="input-field" required>
                <input type="date" name="invoice_date" class="input-field" required>
                <input type="text" name="state" placeholder="State" class="input-field" required>
                <input type="text" name="state_code" placeholder="State Code" class="input-field" required>
            </div>

            <h3>Invoice Items</h3>
            <div id="items"></div>

            <button type="button" onclick="addItem()" class="btn btn-blue">Add Item</button>

            <div class="grid grid-cols-2" style="margin-top: 1rem;">
                <input type="number" name="freight" id="freight" placeholder="Freight" class="input-field" step="0.01"
                    onchange="calculateTotals()">
                <input type="number" name="cgst_percentage" id="cgst_percentage" placeholder="CGST (%)" class="input-field"
                    step="0.01" onchange="calculateTotals()">
                <input type="number" name="sgst_percentage" id="sgst_percentage" placeholder="SGST (%)" class="input-field"
                    step="0.01" onchange="calculateTotals()">
                <input type="number" name="igst_percentage" id="igst_percentage" placeholder="IGST (%)" class="input-field"
                    step="0.01" onchange="calculateTotals()">
                <input type="number" name="cgst" id="cgst" placeholder="CGST Amount" class="input-field" readonly>
                <input type="number" name="sgst" id="sgst" placeholder="SGST Amount" class="input-field" readonly>
                <input type="number" name="igst" id="igst" placeholder="IGST Amount" class="input-field" readonly>
                <input type="number" name="subtotal" id="subtotal" placeholder="Subtotal" class="input-field" readonly>
                <input type="number" name="grand_total" id="grand_total" placeholder="Grand Total" class="input-field"
                    readonly>
                <input type="text" name="grand_total_words" id="grand_total_words" placeholder="Grand Total in Words"
                    class="input-field" readonly>
            </div>

            <button type="submit" class="btn btn-green" style="margin-top: 1rem;">Create Invoice</button>
        </form>
    </div>

    <div class="actions">
        <a href="{{ route('welcome') }}" class="btn btn-blue">Back to Main Page</a>
        <a href="{{ route('existing-bills') }}" class="btn btn-gray">View Existing Bills</a>
    </div>

    @include('footer')

    <script>
        // Your JavaScript remains unchanged.
        function addItem() {
            const itemsDiv = document.getElementById('items');
            const itemCount = itemsDiv.children.length;

            const newItemDiv = document.createElement('div');
            newItemDiv.classList.add('item', 'p-4', 'bg-gray-50', 'rounded', 'shadow-sm', 'grid', 'grid-cols-1', 'md:grid-cols-7', 'gap-4');

            newItemDiv.innerHTML = `
                <input type="text" name="items[${itemCount}][s_no]" placeholder="S.No" class="input-field" value="${itemCount + 1}" readonly>
                <input type="text" name="items[${itemCount}][description]" placeholder="Description" class="input-field" required>
                <input type="text" name="items[${itemCount}][hsn_code]" placeholder="HSN Code" class="input-field">
                <input type="number" name="items[${itemCount}][quantity]" placeholder="Quantity" class="input-field" required onchange="calculateItemTotal(this)">
                <input type="number" name="items[${itemCount}][rate]" placeholder="Rate" step="0.01" class="input-field" required onchange="calculateItemTotal(this)">
                <input type="number" name="items[${itemCount}][total_price]" placeholder="Total Price" step="0.01" class="input-field" readonly>
                <button type="button" onclick="removeItem(this)" class="text-red-500 font-semibold hover:text-red-700 focus:outline-none">Remove</button>
            `;
            itemsDiv.appendChild(newItemDiv);
            calculateTotals();
        }

        function removeItem(button) {
            button.parentElement.remove();
            calculateTotals();
        }

        function calculateItemTotal(element) {
            const itemRow = element.closest('.item');
            const quantity = itemRow.querySelector('[name$="[quantity]"]').value;
            const rate = itemRow.querySelector('[name$="[rate]"]').value;
            const totalPriceField = itemRow.querySelector('[name$="[total_price]"]');

            totalPriceField.value = (quantity * rate).toFixed(2);
            calculateTotals();
        }

        function calculateTotals() {
            const items = document.querySelectorAll('#items .item');
            let subtotal = 0;
            items.forEach(item => {
                const total = parseFloat(item.querySelector('[name$="[total_price]"]').value) || 0;
                subtotal += total;
            });

            document.getElementById('subtotal').value = subtotal.toFixed(2);

            const freight = parseFloat(document.getElementById('freight').value) || 0;
            const cgstPercentage = parseFloat(document.getElementById('cgst_percentage').value) || 0;
            const sgstPercentage = parseFloat(document.getElementById('sgst_percentage').value) || 0;
            const igstPercentage = parseFloat(document.getElementById('igst_percentage').value) || 0;

            const cgst = (subtotal * cgstPercentage / 100).toFixed(2);
            const sgst = (subtotal * sgstPercentage / 100).toFixed(2);
            const igst = (subtotal * igstPercentage / 100).toFixed(2);

            document.getElementById('cgst').value = cgst;
            document.getElementById('sgst').value = sgst;
            document.getElementById('igst').value = igst;

            const grandTotal = (subtotal + freight + parseFloat(cgst) + parseFloat(sgst) + parseFloat(igst)).toFixed(2);
            document.getElementById('grand_total').value = grandTotal;
            document.getElementById('grand_total_words').value = convertNumberToWords(grandTotal);
        }

        // Function to Convert Number to Words
        function convertNumberToWords(amount) {
            const words = [
                '', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten',
                'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen', 'Twenty',
                'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'
            ];
            const scales = ['', 'Thousand', 'Million', 'Billion'];

            if (amount == 0) return 'Zero';

            let amountStr = parseFloat(amount).toFixed(2).split('.');
            let integerPart = parseInt(amountStr[0]);
            let decimalPart = parseInt(amountStr[1]);
            let result = '';

            // Convert integer part
            let scaleIndex = 0;
            while (integerPart > 0) {
                let part = integerPart % 1000;
                if (part > 0) {
                    let hundreds = Math.floor(part / 100);
                    let remainder = part % 100;
                    let wordsPart = '';

                    if (hundreds > 0) wordsPart += words[hundreds] + ' Hundred ';
                    if (remainder > 0) {
                        if (remainder < 20) {
                            wordsPart += words[remainder];
                        } else {
                            let tens = Math.floor(remainder / 10);
                            let units = remainder % 10;
                            wordsPart += words[18 + tens];
                            if (units > 0) wordsPart += ' ' + words[units];
                        }
                    }

                    result = wordsPart + ' ' + scales[scaleIndex] + ' ' + result;
                }

                integerPart = Math.floor(integerPart / 1000);
                scaleIndex++;
            }

            // Add decimal part if present
            if (decimalPart > 0) {
                result += 'and ' + words[Math.floor(decimalPart / 10)] + ' ' + words[decimalPart % 10] + ' Paise';
            }

            return result.trim() + ' Only';
        }
    </script>
</body>

</html>
