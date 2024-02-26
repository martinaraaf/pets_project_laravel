@extends('Auth.layout')

@section('content')

<section class="vh-100 bg-image"
style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
<div class="mask d-flex align-items-center h-100 gradient-custom-3">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-9 col-lg-7 col-xl-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-5">
            <h2 class="text-uppercase text-center mb-5">Create an account</h2>
             <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">

            {{-- <form action="{{url('register')}}" method="POST"> --}}
                @csrf
              <!-- Name -->
<div class="form-outline mb-4">
    <label class="form-label" for="form3Example1cg">Your Name</label>
    <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg" />
</div>

<!-- Email -->
<div class="form-outline mb-4">
    <label class="form-label" for="form3Example3cg">Your Email</label>

    <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />

</div>

<!-- Phone Number -->
<div class="form-outline mb-4">
    <label class="form-label" for="form3Example3cg">Phone Number</label>
    <input type="tel" name="phoneNumber" id="form3Example3cg" class="form-control form-control-lg" />
</div>

<!-- Age -->
<div class="form-outline mb-4">
    <label class="form-label" for="form3Example3cg">Age</label>
    <input type="number" name="age" id="form3Example3cg" class="form-control form-control-lg" />
</div>
<!-- Building Number -->
<div class="form-outline mb-4">
    <label class="form-label" for="building_number">Building Number</label>
    <input type="text" name="building_number" id="building_number" class="form-control form-control-lg" />
</div>

<!-- Street -->
<div class="form-outline mb-4">
    <label class="form-label" for="street">Street</label>
    <input type="text" name="street" id="street" class="form-control form-control-lg" />
</div>

<!-- Area -->
<div class="form-outline mb-4">
    <label class="form-label" for="area">Area</label>
    <input type="text" name="area" id="area" class="form-control form-control-lg" />
</div>

<!-- City -->
<div class="form-outline mb-4">
    <label class="form-label" for="city">City</label>
    <input type="text" name="city" id="city" class="form-control form-control-lg" />
</div>

<!-- Image -->
<div class="form-outline mb-4">
    <label class="form-label" for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control form-control-lg" />
</div>

<!-- Gender -->
<div class="form-outline mb-4">
    <label class="form-label">Gender</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
        <label class="form-check-label" for="male">Male</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
        <label class="form-check-label" for="female">Female</label>
    </div>
</div>

<!-- Password -->
<div class="form-outline mb-4">
    <label class="form-label" for="form3Example4cg">Password</label>
    <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
</div>
<div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                <input type="password" name="password_confirmation" id="form3Example4cdg" class="form-control form-control-lg" />
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit"
                  class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
              </div>

              <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                  class="fw-bold text-body"><u>Login here</u></a></p>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

@endsection
