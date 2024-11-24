@extends('layouts.app')

@section('content')
<div class="home-container">
    <div class="welcome-section text-center">
        <h1>Eventos</h1>
        <p class="lead">Aqui você pode se inscrever facilmente em eventos.</p>
    </div>

    <div style="margin-left:20px">
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4 mb-3">
            <div style="background-color:#fff; width:100%; height:280px; border-radius:12px; box-shadow:4px 4px 12px #aaaa;">
                <img style="width: 100%; height: 130px; border-top-left-radius: 12px; border-top-right-radius: 12px;" 
                     src="https://media.istockphoto.com/id/974238866/pt/foto/audience-listens-to-the-lecturer-at-the-conference.jpg?s=2048x2048&w=is&k=20&c=gNz6Uc5b0UPB2d7YWT5JnpI-1Hnhk_n7Vmdi1I2z4c0=">
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 4px; height: 50%;">
                    <h1 style="font-size: 1.2rem;">Evento 1</h1>
                    <h2 style="font-size: .9rem; color: #aaaa;">Teste</h2>
                    <span>R$ 5,50</span>
                    <button style="background-color: #2192FF; height: 30px; border: none; padding: 4px; width: 80%; color: #fff; font-size: 1rem; font-weight: bold; border-radius: 4px;">
                        Fazer inscrição
                    </button>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-3">
            <div style="background-color:#fff; width:100%; height:280px; border-radius:12px; box-shadow:4px 4px 12px #aaaa;">
                <img style="width: 100%; height: 130px; border-top-left-radius: 12px; border-top-right-radius: 12px;" 
                     src="https://media.istockphoto.com/id/974238866/pt/foto/audience-listens-to-the-lecturer-at-the-conference.jpg?s=2048x2048&w=is&k=20&c=gNz6Uc5b0UPB2d7YWT5JnpI-1Hnhk_n7Vmdi1I2z4c0=">
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 4px; height: 50%;">
                    <h1 style="font-size: 1.2rem;">Evento 2</h1>
                    <h2 style="font-size: .9rem; color: #aaaa;">Teste</h2>
                    <span>R$ 5,50</span>
                    <button style="background-color: #2192FF; height: 30px; border: none; padding: 4px; width: 80%; color: #fff; font-size: 1rem; font-weight: bold; border-radius: 4px;">
                        Fazer inscrição
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div style="background-color:#fff; width:100%; height:280px; border-radius:12px; box-shadow:4px 4px 12px #aaaa;">
                <img style="width: 100%; height: 130px; border-top-left-radius: 12px; border-top-right-radius: 12px;" 
                     src="https://media.istockphoto.com/id/974238866/pt/foto/audience-listens-to-the-lecturer-at-the-conference.jpg?s=2048x2048&w=is&k=20&c=gNz6Uc5b0UPB2d7YWT5JnpI-1Hnhk_n7Vmdi1I2z4c0=">
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 4px; height: 50%;">
                    <h1 style="font-size: 1.2rem;">Evento 2</h1>
                    <h2 style="font-size: .9rem; color: #aaaa;">Teste</h2>
                    <span>R$ 5,50</span>
                    <button style="background-color: #2192FF; height: 30px; border: none; padding: px; width: 80%; color: #fff; font-size: 1rem; font-weight: bold; border-radius: 4px; ">
                        Fazer inscrição
                    </button>
                </div>
            </div>
        </div>
        
    </div>


    <div class="footer-section text-center mt-5">
        <p>&copy; {{ date('Y') }} Sistema de Inscrições. Todos os direitos reservados.</p>
    </div>
</div>
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
