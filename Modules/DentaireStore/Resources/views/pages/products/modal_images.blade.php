<div class="lx-main">
    <div class="lx-popup" style="display: none;">
        <div class="lx-popup-inside">
            <a href="javascript:;"><i class="material-icons lx-remove">X</i></a>
            <a href="javascript:;"><i class="material-icons lx-angle-left"> < </i></a>
            <a href="javascript:;"><i class="material-icons lx-angle-right"> > </i></a>
            <div class="lx-popup-content">
                <div class="lx-popup-image">

                    @if ($product->main_photo != null)

                            <img src="{{asset($product->main_photo->link)}}"
                                        alt="image title here">

                        
                    @else

                            @if ($product->productPhotos->isNotEmpty())
                
                                <img
                                src="{{asset($product->productPhotos->first()->link)}}"
                                alt="image title here">


                            @else

                                <img
                                src="{{asset('/product_holder.png')}}"
                                alt="image title here">
                                

                            
                            @endif
                        
                    @endif

                   
              
                </div>
            </div>
        </div>
    </div>
</div>