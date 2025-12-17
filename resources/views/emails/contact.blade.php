<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>
<body style="font-family: Arial; background:#f9fafb; padding:20px;">
    <div style="max-width:600px; margin:auto; background:white; padding:25px; border-radius:10px;">
        <h2 style="color:#2563eb;">New Message from Contact Form</h2>

        <p><strong>Name:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Subject:</strong> {{ $data['subject'] }}</p>

        <p style="margin-top:20px;"><strong>Message:</strong></p>
        <p>{{ $data['message'] }}</p>

        <hr>
        <p style="font-size:12px; color:#6b7280;">This email was sent automatically from your website contact form.</p>
    </div>
</body>
</html>
