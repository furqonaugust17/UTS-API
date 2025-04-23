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
    </script>
@endsection

<x-layout>
    <div class="container">
        <div class="trending-movie my-3">
            <h2>Now Playings</h2>
            <div class="swiper">
                <div class="swiper-wrapper">
                    @forelse ($nowPlayings['results'] as $nowPlaying)
                        <div class="swiper-slide" lazy="true">
                            <a href="{{ route('movie.detail', ['id' => $nowPlaying['id']]) }}"
                                class="link-underline link-underline-opacity-0">
                                <div class="card height">
                                    <img src="https://image.tmdb.org/t/p/w500{{ $nowPlaying['poster_path'] }}"
                                        class="card-img-top poster" alt="..." loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">{{ $nowPlaying['title'] }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <span class="fs-3 fw-light">No Now Playing Movies</span>
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="coming-movie my-3">
            <h2>Released Soon</h2>
            <div class="swiper">
                <div class="swiper-wrapper">
                    @forelse ($upComings['results'] as $upComing)
                        <div class="swiper-slide" lazy="true">
                            <a href="{{ route('movie.detail', ['id' => $upComing['id']]) }}"
                                class="link-underline link-underline-opacity-0">
                                <div class="card height">
                                    <img src="https://image.tmdb.org/t/p/w500{{ $upComing['poster_path'] }}"
                                        class="card-img-top poster" alt="..." loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">{{ $upComing['title'] }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <span class="fs-3 fw-light">No Released Soon Movies</span>
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</x-layout>
