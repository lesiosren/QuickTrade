<x-layouts.layout>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center my-4">{{__('ui.allAnnouncements')}}</h1>
                </div>
                <div class="row m-0">
                    @forelse ($announcements as $announcement)
                    <div class="col-12 col-md-4 my-4 d-flex justify-content-center div-container divvino">
                        <div class="card shadow card-welcome" style="width: 22rem;">
                            <div class="img-container ">
                                <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,300) : 'https://picsum.photos/200'}}" class="card-img-top mb-0 card-img-welcome img-fluid " alt=". . .">
                            </div>
                            <div class="pb-0 publishedby-section-container px-4">
                                <h5 class="card-title mb-0">{{Str::limit($announcement->title, 20)}}</h5>
                                <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="text-decoration-none text-black">Categoria: {{$announcement->category->name}}</a>
                                <p class="card-text my-2">{{ Str::limit($announcement->body, 30)}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-text fs-3 mb-0">{{$announcement->price}} €</p>
                                    <a href="{{route('announcements.show', compact('announcement'))}}" id="show-more-cards" class="text-decoration-none text-black fw-semibold"><i class="bi bi-eye-fill fs-1"></i></a>
                                </div>
                                <p class="card-footer mb-0 pb-0 publishedby-section-cards">{{__('ui.welcomePublishedDate')}} {{$announcement->created_at->format('d/m/Y')}} <br> {{__('ui.welcomeAutore')}}  {{$announcement->user->name ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning py-3 shadow">
                            <p class="lead">{{__('ui.errorMessageIndexPage')}}</p>
                        </div>
                    </div>
                    @endforelse
            </div>
                    <div class="col-12 my-4 d-flex justify-content-center">
                        {{$announcements->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom-div"></div>
</x-layouts.layout>