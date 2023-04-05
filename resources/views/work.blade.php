<x-layout>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <h1 class="text-center">Lavora con noi</h1>
    <form class="" action="/work" method="POST">
        @csrf
        <button type="submit" class="submit btn btn-sm btn-outline-light btn-hover">
            Invia la richiesta
        </button>
    </form>
</x-layout>
