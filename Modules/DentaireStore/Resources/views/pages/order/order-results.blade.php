<div class="order-results">
    <div class="overview-item">
        <span>Numéro de commande:</span>
        <strong>{{$order->id}}</strong>
    </div>
    <div class="overview-item">
        <span>Statut:</span>
        <strong>Traitement</strong>
    </div>
    <div class="overview-item">
        <span>Date:</span>
        <strong>{{$order->created_at->format('d M ,Y')}}</strong>
    </div>
    <div class="overview-item">
        <span>Num de Tel:</span>
        <strong>{{$order->phone}}</strong>
    </div>
    <div class="overview-item">
        <span>Total:</span>
        <strong>{{number_format($total_all, 2, '.', ',')}} DA</strong>
    </div>
    <div class="overview-item">
        <span>Mode de paiement:</span>
        <strong>Paiement à la livraison</strong>
    </div>
</div>