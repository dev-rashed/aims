@props(['article', 'isHome' => true])

<div class="col-sm-6 col-lg-4">
    <a href="{{ route('article.details', $article->slug) }}" style="color: inherit">
        <div class="inner-box h-100">
            <div class="lower-content">
                {{-- <div class="author-box">
                    <div class="inner">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('build/assets/frontend/images/pen.png') }}" alt="Pen" srcset="{{ asset('build/assets/frontend/images/pen.png') }}" />
                            <div class="ms-2">
                                <p class="mb-0">{{ $article->counsellor?->full_name }}</p>
                                <p class="text-gray-500 mb-0">{{ $article->created_at->diffForHumans() }} * {{ $article->read_time }}</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <img src="{{ uploadedFile($article->image) }}" class="img-fluid rounded mb-3" alt="Pen" srcset="{{ uploadedFile($article->image) }}" />

                @if ($article->categories->count())
                    <div class="category">
                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 1C0 0.447715 0.447715 0 1 0H9C9.26522 0 9.51957 0.105357 9.70711 0.292893L19.7071 10.2929C20.0976 10.6834 20.0976 11.3166 19.7071 11.7071L11.7071 19.7071C11.3166 20.0976 10.6834 20.0976 10.2929 19.7071L0.292893 9.70711C0.105357 9.51957 0 9.26522 0 9V1ZM2 2V8.58579L11 17.5858L17.5858 11L8.58579 2H2Z" fill="#0D0D0D"/>
                            <path d="M7 5.5C7 6.32843 6.32843 7 5.5 7C4.67157 7 4 6.32843 4 5.5C4 4.67157 4.67157 4 5.5 4C6.32843 4 7 4.67157 7 5.5Z" fill="#0D0D0D"/>
                        </svg>
                        <p class="mb-0 ms-2">{{ $article->categories[0]->name }}</p>
                    </div>
                @endif
                <h3>{{ $article->title }}</h3>
                <div>
                    <p>{!! Str::limit($article->short_description, 100, '...') !!}</p>
                </div>
            </div>
        </div>
    </a>
</div>
