<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monaco Racing report</title>
</head>
<body>
    <h1>Monaco Racing Report 2018</h1>
    <table>
        <tr>
            <td>Name</td>
            <td>Car</td>
            <td>Time</td>
        </tr>
        @foreach($report as $driver)
        <tr>
            <td>{{$driver['name']}}</td>
            <td>{{$driver['car']}}</td>
            <td>{{$driver['time']}}</td>
        </tr>

        @endforeach
    </table>
</body>
</html>