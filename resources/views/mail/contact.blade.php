@extends('mail.layout')

@section('content')
    <div class="">
        <div class="details">
            <p><strong>Contact Info:</strong></p>
            <p>Name: {{ request()->name }}</p>
            <p>Email: {{ request()->email }}</p>
            <p>Details: {{ request()->details }}</p>
        </div>
    </div>
@endsection
