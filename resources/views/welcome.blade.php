<x-layouts.layout>
    <div class="welcome-page">

        <header class="header_home_custom p-0 container-fluid pt-4">
                <div class="row justify-content-center m-0">
                    <div class="col-11 p-0 container_video">
                        <video autoplay muted loop id="header-video">
                            <source src="{{asset('/video/header-video.mp4')}}">
                        </video>
                    </div>
                </div>
        </header>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center pt-5 text-dark">{{__('ui.welcomePageTitle')}}</h1>
                    @if (session('access.denied'))
                    <div class="alert alert-danger text-center">
                        {{ session('access.denied') }}
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row  mb-costum">
                            @foreach ($announcements as $announcement)
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>