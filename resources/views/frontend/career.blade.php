@extends('layouts.frontend.app')

@section('title', 'Career')

@section('content')

<section class="section career-section">
    <div class="container">
        <div class="row gy-5">
            <div class="col-12 text-center">
                <div class="section-heading">
                    <h1 class="heading">Join our team</h1>
                    <p class="description fw-bold mx-auto">
                        Give us your details, and we will be in touch when opportunities arise.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-6 mx-auto">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <form id="submit" action="{{ route('career.store') }}" method="post">
                            @csrf

                            <x-frontend.input-group label="name" placeholder="Enter name" />
                            <x-frontend.input-group label="email" type="email" placeholder="Enter email" />
                            <x-frontend.input-group label="phone" placeholder="Enter phone" :required="false" />
                            <x-frontend.input-group label="details" :isInput="false" :required="false">
                                <textarea name="details" id="details" rows="4" placeholder="Enter details" class="form-control border-primary-300"></textarea>
                            </x-frontend.input-group>

                            <x-frontend.recaptcha />

                            <div class="mb-3">
                                <button type="submit" class="btn bg-primary-500 rounded-10 w-100 py-2 text-white fw-bold fs-14">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
