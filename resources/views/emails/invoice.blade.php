<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
            border-radius: 8px;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #e1e1e1;
        }
        .header img {
            max-width: 150px;
        }
        h1 {
            color: #333333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            color: #555555;
            margin: 10px 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            background: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #e1e1e1;
            border-radius: 4px;
            font-size: 16px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #888888;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="#" alt="Car Rental Company Logo">
    </div>
    <h1>Invoice</h1>
    <p>Dear {{ $invoice->client_name }},</p>
    <p>Thank you for your payment. Here are the details of your transaction:</p>
    <ul>
        <li><strong>Invoice Number:</strong> {{ $invoice->invoice_number }}</li>
        <li><strong>Date:</strong> {{ $invoice->date }}</li>
        <li><strong>Total Amount:</strong> ${{ number_format($invoice->total_amount, 2) }}</li>
        <li><strong>Due Date:</strong> {{ $invoice->due_date}}</li>
        <li><strong>Status:</strong> {{ $invoice->status }}</li>
    </ul>
    <p>If you have any questions, please feel free to contact us.</p>
    <a href="#" class="button">Contact Us</a>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Car Rental Company. All rights reserved.</p>
    </div>
</div>
</body>
</html>
