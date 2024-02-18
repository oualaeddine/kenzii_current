@extends('dentairestore::layouts.master')

@section('content')


<main class="main cart">
    <div class="page-content pt-7 pb-10">
        <div class="step-by pr-4 pl-4">
            <h3 class="title title-simple title-step active"><a href="{{route('dentaire_store.cart')}}">1. Panier d'achat</a></h3>
            <h3 class="title title-simple title-step "><a href="{{route('dentaire_store.checkout')}}">  2. Caisse</a></h3>
            <h3 class="title title-simple title-step"><a href="javascript:;{{-- {{route('dentaire_store.order')}} --}}">      3. Commande complète</a></h3>
        </div>
        <div class="container mt-7 mb-2">
            <div class="row">


                @include('dentairestore::pages.cart.section-1')

                
                @include('dentairestore::pages.cart.section-2')
                
            </div>
        </div>
    </div>
</main>






@endsection
