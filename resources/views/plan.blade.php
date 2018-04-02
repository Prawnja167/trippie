<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    ID : {{$holiday->id}} <br>
    TITLE : {{$holiday->title}} <br>
    Date : 
    <ul>
    @foreach($holiday->date as $date)
        {{$date->date}}<br>
    @endforeach
    </ul>
    COST : {{$holiday->cost}} <br>

    <form action="{{url('list/'.$holiday->id.'/detail')}}" method="post">
        {{csrf_field()}}
        <input type="text" placeholder="Nama" name="activity"><br>
        <input type="time" placeholder="Start time" name="start_time"><br>
        <input type="time" placeholder="End time" name="end_time"><br>
        <input type="text" placeholder="price" name="price"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>