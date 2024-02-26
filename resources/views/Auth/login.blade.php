@extends('Auth.layout')


@section('content')

<div class="container w-50">

    {{-- @include('errros') --}}
    <h1 class="text-center mt-5">login Form</h1>
    <form action="{{url('login')}}" method="POST">
        @csrf
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email address</label>
            <input type="email" name="email" id="form2Example1" class="form-control" />
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Password</label>
      <input type="password" name="password" id="form2Example2" class="form-control" />
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
        <div class="col d-flex justify-content-center">

    </div>
</div>

<!-- Submit button -->
<button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>


</div>
</form>
@endsection
