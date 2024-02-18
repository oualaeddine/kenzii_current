<div class="row">
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="font-weight-bolder mb-0">{{ number_format($total['charges'], 2, ',', ' ')  }} DA</h4>
            <p class="card-text">Charges</p>
          </div>
          <div class="avatar bg-light-primary p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-file-invoice-dollar fa-2x"></i>            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="font-weight-bolder mb-0">{{ number_format($total['injectios'], 2, ',', ' ')   }} DA</h4>
            <p class="card-text">Injectios</p>
          </div>
          <div class="avatar bg-light-success p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-money-bill fa-lg"></i>            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="font-weight-bolder mb-0">{{ number_format($total['retraits'], 2, ',', ' ')   }} DA</h4>
            <p class="card-text">Retraits</p>
          </div>
          <div class="avatar bg-light-danger p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-money-bill fa-lg"></i>            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="font-weight-bolder mb-0">{{ number_format($total['chiffre_yalidine'], 2, ',', ' ')   }} DA</h4>
            <p class="card-text">Chiffre yalidine</p>
          </div>
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-money-bill fa-lg"></i>            </div>
          </div>
        </div>
      </div>
    </div>
  </div>