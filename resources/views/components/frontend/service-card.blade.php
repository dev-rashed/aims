@props(['service'])
<style>
    .service-card {
        border-radius: 4px !important;
        padding: 0px !important;
    }

    .service-card .service-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 20px 30px;
    }

    .service-card .service-header .service-title {
        font-size: 18px;
        font-weight: 600;
        color: #33637e;
    }

    .service-card .service-header .service-icon-img {
        width: 35px;
        height: 35px;
    }

    .service-title {
        color: gray;
        margin-top: 15px;
    }
</style>
<div class="col-sm-6 col-lg-4">
    <div class="service-card">
        <div class="service-header">
            {{-- <img src="{{ uploadedFile($service->image) }}" alt="{{ $service->title }}" class="service-icon-img"
                srcset="{{ uploadedFile($service->image) }}"> --}}
        </div>
        <div>
            <img src="{{ uploadedFile($service->image) }}" alt="">
        </div>
        <h5 class="service-title">{{ $service->title }}</h5>

    </div>
    {{-- <div class="service-card">
        <div class="service-icon">
            <img src="{{ uploadedFile($service->image) }}" alt="{{ $service->title }}" class="img-fluid" srcset="{{ uploadedFile($service->image) }}">
        </div>

        <div class="text-center mt-4">
            <h5 class="title">{{ $service->title }}</h5>
            <p class="content">{{ $service->description }}</p>

            <a href="{{ $service->link }}" class="btn read-more-btn mt-3">Read More</a>

        </div>
    </div> --}}
</div>
