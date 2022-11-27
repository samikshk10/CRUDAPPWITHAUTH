
    @extends('layout.app')

@section('content')




<h1 class="text-center">Vehicle Rental Application</h1>
<div class="container">
    <div class="cards">
            <h2 class="title text-center"><u> Your Reservation</u></h2>
    </div>

   <a href="{{ route('rentacarbtn') }}"> <button class="btn btn-success mb-3 btns"><span class="addicon">+</span> Rent A Car</button></a>

    <table class="table">
    <tr style="background-color: green; color: white">
        <th>ID</th>
        <th>Vehicle Type</th>
        <th>Vehicle Brand</th>
        <th>Vehicle Model</th>
        <th>Email</th>
        <th>Rented Date</th>
        <th>Rent Days</th>
        <th>Total Rent</th>
        <th colspan="2">Action</th>
    </tr>

    


    @if($value )
    @foreach($value as $value)
            <tr>

                    <td>{{ $value->id }}</td>
                    <td>{{ $value->vehicletype }}</td>
                    <td>{{ $value->vehiclebrand }}</td>
                    <td>{{ $value->vehiclemodel }}</td>
                    <td>{{ $value->email }}</td>

                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->rentnoofdays }}</td>
                    <td>{{ $value->totalrent }}</td>
                    
                    
                    <td><a href="/edit/{{ $value->id }}"><button id="editbtn" class="btn btn-success"><i class="fa fa-edit fa-lg"></i></button></a></td>
                    <td><a href="/delete/{{ $value->id }}"><button id="deletebtn" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i></button></a></td>
                </tr>
                @endforeach
                @endif
   
    

    </table>

</div>

@endsection  




