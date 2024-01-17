<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>job notification mail</title>
</head>
<body>
    <h1>Hello: {{$maildata['employer']->name}}</h1>
    <h1>job title: {{$maildata['job']->title}}</h1>

    <p>employee details::</p>
    <h1>name: {{$maildata['user']->name}}</h1>
    <h1>email: {{$maildata['user']->email}}</h1>
    <h1>mobile no: {{$maildata['user']->mobile}}</h1>
</body>
</html>