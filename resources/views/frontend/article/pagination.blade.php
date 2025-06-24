@if ($paginator->hasPages())
    <div class="row mt-5">
        <div class="col-6">
            <a href="{{ $paginator->previousPageUrl() != null ? $paginator->previousPageUrl() : 'javascript:void(0)'}}" class="btn read-more-btn" id="paginate">Previews</a>
        </div>
        <div class="col-6 text-end">
            <a href="{{ $paginator->nextPageUrl() != null ? $paginator->nextPageUrl() : 'javascript:void(0)' }}" class="btn read-more-btn" id="paginate">Next</a>
        </div>
    </div>
@endif

