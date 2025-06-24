<div class="row gy-4">
    @forelse ($articles as $article)
        <x-frontend.article-card :article="$article" :isHome="false" />
    @empty
        <div class="card border-0 shadow-sm rounded-10 py-3 px-2 mb-3">
            <div class="card-body text-center">
                <h5 class="fs-5">Data not found :)</h5>
            </div>
        </div>
    @endforelse
</div>

{{ $articles->withQueryString()->links('frontend.article.pagination') }}
