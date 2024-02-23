<x-layouts.layout>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center my-3 mt-4">
          @if($announcement_to_check)
          {{__('ui.reviseAnnouncement')}}
          @else
          {{__('ui.noAnnouncementToRevise')}}
          <div style="min-height: 56vh">
          @endif
        </h1>
      </div>
    </div>
  </div>
  @if($announcement_to_check)
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        @if($announcement_to_check->images->isNotEmpty())
        <div id="showCarousel" class="carousel slide d-flex justify-content-center" data-bs-ride="carousel">
          <div class="carousel-inner container_img_custom">
              @foreach ($announcement_to_check->images as $image)
              <div class="carousel-item @if($loop->first) active @endif">
                <img src="{{Storage::url($image->path)}}" class="img-fluid rounded img_custom" alt="{{ $image->name }}">
              </div>
              @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
            <span class="" aria-hidden="true"><i class="bi bi-caret-left text-muted fs-1"></i></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
            <span class="" aria-hidden="true"><i class="bi bi-caret-right text-muted fs-1"></i></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        @else
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://picsum.photos/id/27/1200/200" class="img-fluid p-3 rounded" alt=". . .">
          </div>
          <div class="carousel-item">
            <img src="https://picsum.photos/id/27/1200/200" class="img-fluid p-3 rounded" alt=". . .">
          </div>
          <div class="carousel-item">
            <img src="https://picsum.photos/id/27/1200/200" class="img-fluid p-3 rounded" alt=". . .">
          </div>
        </div>
        @endif
        <h3 class="card-title text-center my-2"><b class="fs-3">{{__('ui.titleToCheck')}}</b> {{$announcement_to_check->title}}</h3>
        <p class="card-text"> <b class="fs-5">{{__('ui.descriptionToCheck')}}</b> <br> {{$announcement_to_check->body}}</p>
        <p class="card-footer"><b>{{__('ui.welcomePublishedDate')}}</b>{{$announcement_to_check->created_at->format('d/m/Y')}}</p>
      </div>
    </div>
    <div class="row my-3 mb-5">
      <div class="col-12 col-md-6 d-flex justify-content-center">
        <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
          @csrf
          @method('PATCH')
          <button type="submit" class="btn btn-success shadow"> {{__('ui.accept')}} </button>
        </form>
      </div>
      <div class="col-12 col-md-6 d-flex justify-content-center">
        <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
          @csrf
          @method('PATCH')
          <button type="submit" class="btn btn-danger shadow">{{__('ui.decline')}}</button>
        </form>
      </div>
    </div>
  </div>
  @endif
  </div>
  <div class="custom-div"></div>
</x-layouts.layout>