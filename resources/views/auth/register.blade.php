<x-layouts.layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="text-center display-1 mt-3">Ciao, registrati!</h1>
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
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="form-group mt-4">
                        <label for="inputName" class="my-2">Nome</label>
                        <input name="name" type="text" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Inserisci nome">
                      </div>
                    <div class="form-group">
                      <label for="inputEmail" class="my-2">Email</label>
                      <input name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Inserisci email">
                    </div>
                    <div class="form-group">
                      <label for="inputPassword" class="my-2">Password</label>
                      <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Inserisci password">
                    </div>
                    <div class="form-group">
                        <label for="inputPasswordConfirmation" class="my-2">Conferma password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="inputPasswordConfirmation" placeholder="Conferma password">
                      </div>
                    <button type="submit" class="btn btn-primary my-3">Registrati</button>
                </form>
            </div>
        </div>
    </div>
    <div class="custom-div"></div>
</x-layouts.layout>