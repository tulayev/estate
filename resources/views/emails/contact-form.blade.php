<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #2c3e50;
            margin: 0;
            font-size: 24px;
        }
        .field {
            margin-bottom: 20px;
        }
        .field-label {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
            display: block;
        }
        .field-value {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            border-left: 4px solid #3498db;
        }
        .message-field {
            border-left-color: #e74c3c;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Submission</h1>
            <p>You have received a new message from your website contact form.</p>
        </div>

        <div class="field">
            <span class="field-label">Name:</span>
            <div class="field-value">{{ $submission->name }}</div>
        </div>

        <div class="field">
            <span class="field-label">Email:</span>
            <div class="field-value">{{ $submission->email }}</div>
        </div>

        <div class="field">
            <span class="field-label">Message:</span>
            <div class="field-value message-field">{{ $submission->message }}</div>
        </div>

        <div class="footer">
            <p><strong>Submission Details:</strong></p>
            <p>IP Address: {{ $submission->ip_address ?? 'N/A' }}</p>
            <p>User Agent: {{ $submission->user_agent ?? 'N/A' }}</p>
            <p>Submitted at: {{ $submission->created_at->format('Y-m-d H:i:s T') }}</p>
        </div>
    </div>
</body>
</html>