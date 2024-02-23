<x-layouts.layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="text-center display-1 mt-3"> {{__('ui.loginWelcomeMessage')}} </h1>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form-group mt-4">
                      <label for="inputEmail" class="my-2">Email</label>
                      <input name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="inputPassword" class="my-2">Password</label>
                      <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                    <div class="form-check my-2">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1"> {{__('ui.rememberMessage')}} </label>
                    </div>
                    <button type="submit" class="btn btn-primary my-2"> {{__('ui.accessNavbar')}}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="custom-div"></div>
</x-layouts.layout>