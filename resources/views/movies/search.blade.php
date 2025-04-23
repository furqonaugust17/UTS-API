<x-layout>
    <div class="container py-5">
        <span class="fw-bold fs-2">Result: {{ request('query') }} page {{ request('page') ?? 1 }}</span>
        <div class="row flex-column">
            @forelse ($movies['results'] as $movie)
                <div class="col-12 pb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3 position-relative">
                                    @if ($movie['poster_path'] != null)
                                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['backdrop_path'] }}"
                                            class="position-absolute h-100 w-100 rounded" style="opacity: 0.5;"
                                            alt="">
                                        <img src=" https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                                            class="w-100 search-image position-relative" alt="">
                                    @else
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a3/Image-not-found.png?20210521171500"
                                            class="w-100 search-image w-100" alt="">
                                    @endif
                                </div>
                                <div class="col-9 ps-4">
                                    <h2>{{ $movie['title'] }}</h2>
                                    @if ($movie['release_date'] ?? '')
                                        <span
                                            class="fw-lighter">{{ date('F d, Y', strtotime($movie['release_date'])) }}</span>
                                    @endif
                                    <span class="text-truncate-overview">{{ $movie['overview'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <span class="fs-1 fw">{{ request('query') }} Not Found</span>
            @endforelse
        </div>
        <div class="navigation-page d-flex justify-content-end">
            @if ((int) request('page') > 1)
                <a class="p-2 link-underline link-underline-opacity-0"
                    href="{{ url()->query('search', ['query' => request('query'), 'page' => (int) request('page') - 1]) }}">Previous
                    Page</a>
            @endif
            <a class="p-2 link-underline link-underline-opacity-0"
                href="{{ url()->query('search', ['query' => request('query'), 'page' => (int) request('page') == null ? 2 : (int) request('page') + 1]) }}">Next
                Page</a>
        </div>
    </div>
</x-layout>
