@extends('layouts.app')

@section('content')

<div class="home-container">
    <div class="welcome-section text-center">
        <h1>Eventos</h1>
        <p class="lead">Aqui você pode se inscrever facilmente em eventos.</p>
    </div>

    <div style="margin-left:20px">
    <div class="row">

        @foreach ($events as $event)
        <div class="col-md-4 mb-3">
            <div style="background-color:#fff; width:100%; height:280px; border-radius:12px; box-shadow:4px 4px 12px #aaaa;">
                <img style="width: 100%; height: 130px; border-top-left-radius: 12px; border-top-right-radius: 12px;" 
                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZffYuu5Cn0b3S84pCRYkfGybxVYCIY-VB8A&s">
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 4px; height: 50%; color:black;">
                    <h1 style="font-size: 1.2rem;">{{ $event->name }}</h1>
                    <h2 style="font-size: .9rem; color: #aaaa;">{{ $event->description }}</h2>
                    <span>{{ $event->location}}</span>
                    @if (!$event->fl_inscrito)
                    <form action="{{ route('inscription.store', $event->id) }}" method="POST" style="width: 100%; text-align:center;">
                        @csrf
                        <button type="submit" style="background-color: #2192FF; height: 30px; border: none; padding: 4px; width: 80%; color: #fff; font-size: 1rem; font-weight: bold; border-radius: 4px;">
                            Fazer inscrição
                        </button>
                    </form>
                    @else
                        <button style="background-color: rgb(99, 227, 24); height: 30px; border: none; padding: 4px; width: 80%; color: #fff; font-size: 1rem; font-weight: bold; border-radius: 4px;">
                            Inscrito
                        </button>
                        <form action="{{ route('inscription.delete', [$event->id , $event->ref_inscription]) }}" method="POST" style="width: 100%; text-align:center;" onsubmit="return confirmDeletion();">
                            @csrf
                            @method('POST')
                            <button type="submit" style="background-color: red; height: 30px; border: none; padding: 4px; width: 80%; color: #fff; font-size: 1rem; font-weight: bold; border-radius: 4px;">
                                Cancelar a inscrição
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <div class="footer-section text-center mt-5">
        <p>&copy; {{ date('Y') }} Sistema de Inscrições. Todos os direitos reservados.</p>
    </div>
</div>
<script>
    function confirmDeletion() {
        return confirm("Tem certeza de que deseja cancelar a inscrição? Essa ação não pode ser desfeita.");
    }
</script>
@endsection

@push('styles')
<style>
    .card-event img {

    }
    .card-event div {
   
    }
    .card-event h1 {
    
    }
    .card-event h2 {

    }
    .card-event button {
   
    }
    .card-event button:hover {
    background-color: #137de8;
    cursor: pointer;
    }
</style>
@endpush
