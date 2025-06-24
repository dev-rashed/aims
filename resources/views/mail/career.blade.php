@extends('mail.layout')

@section('content')
    <div class="">
        <div class="details">
            @if (!$admin)
                <p>
                    Assalamu alaykum, thank you for submitting your interest in working with AIMS we welcome the opportunity to increase our talent pool. If we have a suitable vacancy we will reach out to you, otherwise we will hold your details on file for the future if an opportunity arises.
                </p>
            @else
                <p>Assalamu alaykum,</p>
                <p>{{ $career->name }} is interested in working with AIMS. Please <a href="{{ route('staff.career.index', $career->id) }}">click here</a> to view their application.</p>
            @endif
        </div>
    </div>
@endsection
