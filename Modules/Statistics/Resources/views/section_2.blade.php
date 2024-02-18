<div class="row">
  <div class="col-lg-3 col-sm-6 col-12">
    <div class="card">
      <div class="card-header">
        <div>
          <h4 class="font-weight-bolder mb-0">{{number_format( $total['retrait_yalidine'] , 2, ',', ' ') }}</h4>
          <p class="card-text">Retrait yalidine</p>
        </div>
        <div class="avatar bg-light-primary p-50 m-0">
          <div class="avatar-content">
            <i class="fas fa-money-check fa-lg"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 col-12">
    <div class="card">
      <div class="card-header">
        <div>
          <h4 class="font-weight-bolder mb-0">{{$total['total_colis'] }}</h4>
          <p class="card-text">Total colis</p>
        </div>
        <div class="avatar bg-light-success p-50 m-0">
          <div class="avatar-content">
            <i class="fas fa-truck-loading fa-lg"></i>          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 col-12">
    <div class="card">
      <div class="card-header">
        <div>
          <h4 class="font-weight-bolder mb-0">{{$total['pct_liv'] }} %</h4>
          <p class="card-text">Pct livré</p>
        </div>
        <div class="avatar bg-light-danger p-50 m-0">
          <div class="avatar-content">
            <i class="fas fa-truck fa-lg"></i>          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 col-12">
    <div class="card">
      <div class="card-header">
        <div>
          <h4 class="font-weight-bolder mb-0">{{$total['pct_rtr'] }} %</h4>
          <p class="card-text">Pct Retourné</p>
        </div>
        <div class="avatar bg-light-warning p-50 m-0">
          <div class="avatar-content">
            <i class="fas fa-undo fa-lg"></i>          </div>
        </div>
      </div>
    </div>
  </div>
</div>