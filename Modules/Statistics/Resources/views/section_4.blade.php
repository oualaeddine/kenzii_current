<div class="row">

  <div class="col-lg-3 col-sm-6 col-12">
    <div class="card">
      <div class="card-header">
        <div>
          <h4 class="font-weight-bolder mb-0">{{ number_format($total['payments'], 2, ',', ' ')   }} DA</h4>
          <p class="card-text">Payments</p>
        </div>
        <div class="avatar bg-light-primary p-50 m-0">
          <div class="avatar-content">
            <i class="fas fa-money-check-alt fa-lg"></i>            </div>
        </div>
      </div>
    </div>
  </div>
 
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="font-weight-bolder mb-0">{{ number_format($total['dépenses'], 2, ',', ' ')   }} DA</h4>
            <p class="card-text">Dépenses</p>
          </div>
          <div class="avatar bg-light-success p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-shopping-basket fa-lg"></i>            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="font-weight-bolder mb-0">{{ number_format($total['achats'], 2, ',', ' ')   }} DA</h4>
            <p class="card-text">Achats</p>
          </div>
          <div class="avatar bg-light-danger p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-shopping-cart fa-lg"></i>            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="font-weight-bolder mb-0">{{ number_format($total['achat_euro'], 2, ',', ' ')   }} DA</h4>
            <p class="card-text">Achat euro</p>
          </div>
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-money-check-alt fa-lg"></i>            </div>
          </div>
        </div>
      </div>
    </div>
    


  </div>