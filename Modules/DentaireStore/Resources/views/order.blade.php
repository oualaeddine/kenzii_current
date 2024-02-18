@extends('dentairestore::layouts.master')

@section('content')


<main class="main order ">
    <div class="page-content pt-7 pb-10 mb-10">
        <div class="step-by pr-4 pl-4 non-printable">
            <h3 class="title title-simple title-step"><a href="{{route('dentaire_store.cart')}}">        1. Panier d'achat</a></h3>
            <h3 class="title title-simple title-step "><a href="{{route('dentaire_store.checkout')}}">   2. Caisse</a></h3>
            <h3 class="title title-simple title-step active"><a href="javascript:;{{-- {{route('dentaire_store.order')}} --}}">3. Commande complète</a></h3>
        </div>
        <div class="container mt-8">

            @include('dentairestore::pages.order.order-message')

            @include('dentairestore::pages.order.order-results')

            @include('dentairestore::pages.order.order-details')

            @include('dentairestore::pages.order.address')

            <div class="cart-actions mb-6 pt-4 non-printable">
                <a href="{{route('dentaire_store.index')}}" class="btn btn-icon-left btn-dark btn-back btn-rounded btn-md mb-4"><i class="d-icon-arrow-left"></i> Retour à la liste</a>
               {{--  <a href="{{route('dentaire_store.index')}}" class="btn btn-dark btn-md btn-rounded btn-icon-left mr-4 mb-4"><i class="d-icon-arrow-left"></i>Continuer vos achats</a> --}}
                <button class="btn btn-outline btn-dark btn-md btn-rounded" id="imprimant">imprimer la Bill</button>
            </div>
            
            

            {{-- <a href="{{route('dentaire_store.index')}}" class="btn btn-icon-right btn-dark btn-back btn-rounded btn-md mb-4 mt-4"><i class="d-icon-arrow-left"></i> Retour à la liste</a> --}}
        </div>
    </div>
</main>

@push('js')

        <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>


        <script>

            $('#imprimant').on('click',function(){
                window.print();
            })
            
        </script>
    
@endpush



@endsection




