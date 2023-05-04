<!DOCTYPE html>
<html>
<head>
    <title>Feedback Notification</title>
</head>
<body>
    <h1>New Feedback Received</h1>

    <p><strong>Name:</strong> {{ $details['name'] }}</p>

    <p><strong>Email:</strong> {{ $details['email'] }}</p>

    <p><strong>Subject:</strong> {{ $details['subject'] }}</p>
    <p><strong>Message:</strong> {{ $details['message'] }}</p>
</body>
</html>
