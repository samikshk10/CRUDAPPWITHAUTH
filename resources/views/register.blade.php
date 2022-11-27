@extends('layout.app')
@section('content')
<div class="container mt-3 container-title" style="width: 500px ;box-shadow: 7px 7px 14px #828282,-7px -7px 14px #fff;padding: 20px 40px" >
    <div class="title mb-2">
        <img src="{{ asset("build/assets/images/icon.png")}}" alt="IconImage"> <br>
        <span class="titlename">Register</span>
      </div>
<form action="{{ route('signupuser') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div class="invalid-feedback">

          @error('name')
      {{ $message }}
          @enderror
      </div>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email Address</label>
      <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div class="invalid-feedback">
        @error('email')
  {{ $message }}
      @enderror
      </div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
     
        <div class="invalid-feedback">
            @error('password')
      {{ $message }}
          @enderror
          </div>
    </div>

    <button type="submit" class="btn btn-primary form-control mt-3" style="border-radius: 10px">Sign Up </button>
    <p class="mt-3 text-center">Already Have an Account? <span><a href="{{ route('loginuser') }}">Login</a></span></p>

  </form>
</div>

@endsection