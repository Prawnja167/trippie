<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Place</title>
</head>
<body>
    {{-- <form action="{{url('/place')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" placeholder="Nama" name="name"><br>
        <input type="text" placeholder="Alamat" name="address"><br>
        <select name="city_id">
            @foreach ($cities as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select><br>
        <input type="file" name="image"><br>
        <button type="submit">Submit</button>
    </form> <br><br> --}}
    <a href="{{url('/')}}">BACK HOME</a>
    <table>
        <tr>
          <td>Nama Kota</td>
          <td>Nama Tempat</td>
          <td>Alamat</td>
          <td>Action</td>
        </tr>   
        @foreach($places as $place)
        @if($place->status == 1)
        <tr>

            <td>{{$place->city->name}}</td>
            <td>{{$place->name}}</td>
            <td>{{$place->address}}</td> 
            <td>
                
                    <a href="{{url('place/'.$place->id.'/activities')}}" type="button">Show</a>
                    <form action="{{url('wishlist/'.$place->id)}}" method="POST">
                        {{csrf_field()}}
                        <button disabled>Wishlisted</submit>
                    </form>

               
                {{-- @else
                <a href="{{url('place/'.$place->id.'/activities')}}" type="button">Show</a>
                <form action="{{url('wishlist/'.$place->id)}}" method="POST">
                    {{csrf_field()}}
                    <button type="submit">Wishlist</submit>
                </form> --}}
                
            </td>
        </tr> 
         @endif
        @endforeach
    </table>
</body>
</html>