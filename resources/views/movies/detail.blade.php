@section('script')
    <script type="text/javascript">
        const swiper = new Swiper('.swiper', {
            direction: 'horizontal',
            loop: true,

            pagination: {
                el: '.swiper-pagination',
            },

            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 5,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 5,
                },
            },
        });
        const swiper2 = new Swiper('.swiper-2', {
            direction: 'horizontal',
            loop: true,
            slidesPerView: 1,
            spaceBetween: 5,
            pagination: {
                el: '.swiper-pagination-2',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
    </script>
@endsection

<x-layout>
    <div class="position-relative">
        <img src="https://image.tmdb.org/t/p/original{{ $movie['backdrop_path'] }}" alt=""
            class="w-100 h-100 position-absolute object-fit-cover z-0 backdrop">
        <div class="container">
            <div class="position-relative py-5">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt=""
                            class="poster rounded">
                    </div>
                    <div class="col-lg-9">
                        <h2 class="fs-1 fw-bold m-0">{{ $movie['title'] }}
                            ({{ date('Y', strtotime($movie['release_date'])) }})
                        </h2>
                        <div class="vote">
                            <span>Vote Average: {{ round((float) $movie['vote_average'], 2) }}⭐</span>
                        </div>
                        <div class="genres pt-2">
                            @foreach ($movie['genres'] as $genre)
                                <span class="badge rounded-pill text-bg-secondary">{{ $genre['name'] }}</span>
                            @endforeach
                        </div>
                        <div class="overview pt-2">
                            <span class="fs-3 fw-semibold">Overview</span>
                            <p>{{ $movie['overview'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="videos pb-3">
            <h1>Videos</h1>
            <div class="swiper swiper-2">
                <div class="swiper-wrapper">
                    @forelse ($videos['results'] as $video)
                        <div class="swiper-slide">
                            <iframe src="https://www.youtube.com/embed/{{ $video['key'] }}" frameborder="0"
                                loading="lazy" height="500" style="width: 100%"></iframe>
                        </div>
                    @empty
                        <span class="fs-3 fw-light">No Videos</span>
                    @endforelse
                </div>
                <div class="swiper-pagination swiper-pagination-2"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <div class="similar-movies">
            <h1>Similar Movies</h1>
            <div class="swiper">
                <div class="swiper-wrapper">
                    @forelse ($similars['results'] as $similar)
                        <div class="swiper-slide" lazy="true">
                            <a href="{{ route('movie.detail', ['id' => $similar['id']]) }}"
                                class="link-underline link-underline-opacity-0">
                                <div class="card height">
                                    <img src="https://image.tmdb.org/t/p/w500{{ $similar['poster_path'] }}"
                                        class="card-img-top poster" alt="..." loading="lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">{{ $similar['title'] }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <span class="fs-3 fw-light">No Similar Movies</span>
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</x-layout>
