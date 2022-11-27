@extends('layout.app')

<style>
    .form-control{
    max-width: 50%;
    }

    label{
        font-size: 18px;
    }
</style>

@section('content')
   <h1 class="text-center">Rent A Vehicle</h1>
   <div class="container mt-2" style="box-shadow: 7px 7px 14px #828282,-7px -7px 14px #fff;padding: 30px">
   <form action="{{ route('renting') }}" method="post">
    @csrf
<div class="form-group">
    <label for="">Vehicle Type</label>
    <select name="option1" class="selectDD form-control" style="width: 35%;"  id="vehiclesel" size="1" required>
        <option value="" selected="selected">Select Vehicle Type</option>
    </select>
</div>
    <div class="form-group mb-2">
        <label for="">Vehicle Brand</label>
        <select name="option2" class="selectDD form-control" style="width: 35%;" id="brandsel" size="1" required>
            <option value="" selected="selected">Please select Car Brand</option>
        </select>
       
     </div>  
    <div class="form-group mb-2">
        <label for="">Vehicle Model</label>
        <select name="option3" class="selectDD form-control" style="width: 35%;" id="modelsel" size="1" required>
            <option value=""  selected="selected">Please select Car Model</option>
        </select>
        
     </div>  
   <div class="form-group mb-2">
    <label for="">Rent For No.of Days</label>
    <input type="number" class="form-control" name="rentnoofdays" id="noofrentdays" required>
   </div>

   <input type="hidden" name="" id="rentdays">
   
   <input type="hidden" value="100" name="totalrent" id="totalrent">
@auth
   <input type="hidden" value="{{ auth()->user()->email }}" name="email">
   @endauth

   <div class="form-group mt-3">
    <button type="submit" value="Rent" class="btn btn-success" id="submit-btn">Rent</button>
   </div>

   </form>
</div>

<script>

   
    
    var stateObject = {
        "Car": {
            "Hyundai": ["Venue", "I20", "IONIQ"],
            "Ford": ["Figo", "Ecosport"],
            "Honda":["Amaze", "City"]
        },
        "Bikes": {
            "Duke": ["RC", "Custom"],
            "FZ": ["V2", "V3"],
            "R15":["V2","V3"]
        },
       
    }
    window.onload = function(){
        var vehiclesel = document.getElementById("vehiclesel"),
        brandsel = document.getElementById("brandsel"),
        modelsel = document.getElementById("modelsel");
        
        for (var state in stateObject){
            vehiclesel.options[vehiclesel.options.length] = new Option(state, state);
        }
        
        vehiclesel.onchange = function(){
            brandsel.length = 1;
            modelsel.length =1;
            if(this.selectedIndes < 1) return;
            for(var county in stateObject[this.value]){
                brandsel.options[brandsel.options.length] = new Option(county, county);
            }
        }
        
        vehiclesel.onchange();
        
        brandsel.onchange = function(){
            modelsel.length = 1;
            if(this.selectedIndex < 1) return;
            
            var models = stateObject[vehiclesel.value][this.value];
            for(var i = 0; i < models.length; i++){
                modelsel.options[modelsel.options.length] = new Option(models[i], models[i]);
            }
        }
    }

    document.getElementById('submit-btn').onclick=function()
    {
        if(document.getElementById('vehiclesel').value=='Car')
        {
            document.getElementById('rentdays').value=700;
        }
        if(document.getElementById('vehiclesel').value=='Bikes')
        {
            document.getElementById('rentdays').value=400;
        }

       document.getElementById('totalrent').value= document.getElementById('noofrentdays').value * document.getElementById('rentdays').value;
    
    }

</script>




@endsection