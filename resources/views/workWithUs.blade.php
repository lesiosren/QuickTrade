<x-layouts.layout>
    <div class="welcome-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="p-o text-center my-5"> {{__('ui.workWithUs')}} </h1>
                    @if (session('access.denied'))
                    <div class="alert alert-danger text-center">
                        {{ session('access.denied') }}
                    </div>
                    @endif
                </div>
                <div class="row justify-content-center mx-2 mt-md-4">
                    <div class="col-12 col-md-9">
                        {{--? Tasto invia richiesta per DIVENTARE REVISORE fatta. In questa colonna c'è una ROW dove è possibile creare una descrizione dell'azienda con un paio di immagini --}}
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-4 img_footer responsive_img_vision"></div>
                            <div class="col-12 d-md-none responsive_img_vision">
                                <img src="https://picsum.photos/200" alt="">
                            </div>
                            <div class="col-12 col-md-8">
                                <h2 class="text-center my-md-4"> {{__('ui.visionWorkWithUs')}} </h2>
                                <p class="p-0 mx-3 text-center"> {{__('ui.visionMessage')}} </p>
                            </div>
                        </div>
                        <hr class="my-md-5">
                        <div class="row justify-content-center my-2">
                            <div class="col-12 d-md-none responsive_img_mission">
                                <img src="https://picsum.photos/200" alt="">
                            </div>
                            <div class="col-12 col-md-8">
                                <h2 class="text-center my-md-4"> {{__('ui.missionWorkWithUs')}} </h2>
                                <p class="p-0 mx-3 text-center"> {{__('ui.missionMessage')}} </p>
                            </div>
                            <div class="col-12 col-md-4 img_footer responsive_footer"></div>
                        </div>
                        <form method="GET" action="{{route('become.revisor')}}" class="my-md-5">
                            @csrf
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8">
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="exampleInputEmail1" class="form-label"> {{__('ui.name')}} </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3 mb-3">
                                                <label for="exampleInputEmail1" class="form-label"> {{__('ui.surname')}} </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-12 d-grid gap-2">
                                                <button type="submit" class="btn btn-primary"> {{__('ui.sendRichiesta')}} </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>