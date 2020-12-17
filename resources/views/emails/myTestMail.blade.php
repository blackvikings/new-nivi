<!DOCTYPE html>
<html>
<head>
    <title>Nevi Helth Care</title>
</head>
<body>
<h1>{{ $details['title'] }}</h1>
<p>{{ $details['body'] }}</p>
<p>User id: {{ $details['member_id'] }}</p>
<p>Password: {{  isset($details['password']) ? $details['password'] : '' }} </p>

<p>Thank you</p>
</body>
</html>
