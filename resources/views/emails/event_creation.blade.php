<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Email</title>
</head>

<body>
    <h1>Test EMAIL</h1>
    <p>Name: {{ $mailData['name'] }}</p>
    <p>Slug: {{ $mailData['slug'] }}</p>
    <p>Start Date: {{ $mailData['startAt'] }}</p>
    <p>End Date: {{ $mailData['endAt'] }}</p>
</body>

</html>
