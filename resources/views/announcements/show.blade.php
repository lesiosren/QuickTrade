<x-layouts.layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center my-4"> {{ __('ui.announcement') }} {{ $announcement->title }}</h1>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div id="showCarousel" class="carousel slide d-flex justify-content-center" data-bs-ride="carousel">
                    @if ($announcement->images)
                        <div class="carousel-inner container_img_announcements">
                            @foreach ($announcement->images as $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ Storage::url($image->path) }}" class="img-fluid rounded img_custom"
                                        alt="">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/id/27/1200/200" class="img-fluid p-3 rounded"
                                    alt=". . .">
                            </div>

                            <div class="carousel-item">
                                <img src="https://picsum.photos/id/27/1200/200" class="img-fluid p-3 rounded"
                                    alt=". . .">
                            </div>

                            <div class="carousel-item">
                                <img src="https://picsum.photos/id/27/1200/200" class="img-fluid p-3 rounded"
                                    alt=". . .">
                            </div>
                        </div>
                    @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel"
                        data-bs-slide="prev">
                        <span class="" aria-hidden="true"><i class="bi bi-caret-left text-muted fs-1"></i></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel"
                        data-bs-slide="next">
                        <span class="" aria-hidden="true"><i class="bi bi-caret-right text-muted fs-1"></i></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <h3 class="card-title text-center my-2"><b class="fs-3"> {{ __('ui.titleToCheck')}}</b> {{ $announcement->title }}</h3>
                <p class="card-text"> <b class="fs-5">{{ __('ui.descriptionToCheck')}}</b> <br> {{ $announcement->body }}</p>
                <h5 class="card-text"> {{ __('ui.priceToCheck') }} {{ $announcement->price }}€</h5>
                <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                    class="btn btn-primary shadow my-2 border-top pt-2 border-dark card-link shadow">Categoria:
                    {{ $announcement->category->name }}</a>
                <p class="card-footer"> {{ __('ui.welcomePublishedDate') }}
                    {{ $announcement->created_at->format('d/m/Y') }} - {{ __('ui.welcomeAutore') }}
                    {{ $announcement->user->name ?? '' }}</p>
            </div>
        </div>
    </div>
</x-layouts.layout>
