<section class="details section">
    <div class="container-fluid">
        <ul class="nav nav-tabs custom-tab justify-content-center has-shadow" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">نظرة عامة</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery" type="button" role="tab" aria-controls="delivery" aria-selected="false">توصيل</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show gray-color active" id="home" role="tabpanel" aria-labelledby="home-tab">
              {!!$product->long_description!!}
            </div>
            <div class="tab-pane fade gray-color" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                {{$product->short_description}}
            </div>

        </div>
    </div>
</section>