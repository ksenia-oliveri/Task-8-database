<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Info about the driver</h1>
    @foreach($driverInfo as $driver)
        @if($driver['shortName'] == $driver_id)
    <div>
        {{ $driver['name']}} | {{ $driver['car']}} | {{ $driver['time']}}
    </div>
    @endif
    @endforeach

</body>
</html>