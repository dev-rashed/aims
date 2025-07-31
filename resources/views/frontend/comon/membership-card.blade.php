<style>
    .btn-orange {
        background-color: #ff9015 !important;
        border-color: #f4af1c !important;
        color: #fff !important;
    }
</style>
<div class="card hover-card shadow-sm border-0 rounded-4 overflow-hidden h-100">
    <div class="position-relative" style="height: 220px; overflow: hidden;">
        <img src="{{ Vite::image('membership-img.png') }}" class="w-100 h-100" style="object-fit: contain"
            alt="Pastoral Care">
    </div>
    <div class="card-body p-4">
        <h5 class="card-title section-heading mb-3">AIMS Membership</h5>
        <p>Members of AIMS are bound by our Ethical Framework for the Counselling Professions and our Professional
            Conduct Procedure. You must read and agree to these as part of your application process. You should also
            read our membership policies.

        </p>
        <a href="{{ route('membership.index') }}" class="btn btn-orange mt-3">Read more...</a>
    </div>
</div>
