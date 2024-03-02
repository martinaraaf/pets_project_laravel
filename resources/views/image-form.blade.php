@extends('layout')

@section('content')

    <!-- Container (Contact Section) -->
    <div id="contact" class="container">
        <h1 class="text-center" style="margin-top: 100px">Image Upload</h1>

        @if (session('success'))
            <div class="alert alert-success alert-block">
                <strong>{{session('success')}}</strong>
            </div>

            <img src="{{ asset('images/'.session('image')) }}" />
        @endif

        <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control" name="image" />

            <button type="submit" class="btn btn-sm">Upload</button>
        </form>

    </div>
@endsection