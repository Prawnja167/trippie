<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Holiday</title>
</head>
<body>
    <form action="{{url('/list')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" placeholder="Nama" name="title"><br>
        <input type="date" placeholder="Start Date" name="start_date"><br>
        <input type="date" placeholder="End Date" name="end_date"><br>
        <input type="file" name="image"><br>
        <input type="hidden" value="0" name="cost"><br>
        <button type="submit">Submit</button>
    </form>
    <table>
        <tr>
          <td>No</td> 
          <td>Nama Trip</td>
          <td>Start Date</td>
          <td>End Date</td>
          <td>Cost</td>
          <td>Action</td>
        </tr>   
        @foreach($holidays as $holiday)
        <tr>
            <td>{{$holiday->id}}</td>
            <td>{{$holiday->title}}</td>
            <td>{{$holiday->start}}</td>
            <td>{{$holiday->end}}</td>
            <td>{{$holiday->cost}}</td>   
            <td>
                <a href="{{url('list/'.$holiday->id)}}" type="button">Show</a>
                <button type="button">Update</button>
                <button type="button">Delete</button>
            </td>   


        </tr> 
        @endforeach
    </table>
</body>
</html>