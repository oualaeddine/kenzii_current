<div class="tab tab-nav-simple product-tabs mb-4">
    <ul class="nav nav-tabs justify-content-center" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#product-tab-description">Description</a>
        </li>
   {{--      <li class="nav-item">
            <a class="nav-link" href="#product-tab-additional">Additional information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#product-tab-reviews">Reviews (2)</a>
        </li> --}}
    </ul>
    <div class="tab-content">
        <div class="tab-pane active in" id="product-tab-description">
            <div class="row mt-6">
                <div class="col-md-6">
                    <h5 class="description-title mb-4 font-weight-semi-bold ls-m" style="font-size:2.9vh">Caractéristiques</h5>
                    <div >
                        <p>{!! $product->long_description !!}</p>
                    </div>
                    <h5 class="description-title mb-3 font-weight-semi-bold ls-m" style="font-size:2.9vh">Spécifications
                    </h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="font-weight-semi-bold text-dark pl-0">Marque</th>
                                <td class="pl-4">{{$product->brand->name}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-semi-bold text-dark pl-0">Numéro de série
                                </th>
                                <td class="pl-4">{{$product->num}}</td>
                            </tr>
{{--                             <tr>
                                <th class="font-weight-semi-bold text-dark pl-0">Utilisation recommandée
                                </th>
                                <td class="pl-4">Praesent id enim sit amet.Tdio vulputate eleifend
                                    in in tortor. ellus massa. siti</td>
                            </tr> --}}
                            <tr>
                                <th class="font-weight-semi-bold text-dark border-no pl-0">
                                    Fabricant</th>
                                <td class="border-no pl-4">{{$product->manufacturer}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 pl-md-6 pt-4 pt-md-0">
                    @if ($product->video_url != null)

                    <h5 class="description-title font-weight-semi-bold ls-m mb-5"   style="font-size:2.9vh">Vidéo
                    </h5>
                        

                    <figure class="p-relative d-inline-block mb-2"
                    style="background-color: #f5f5f5;">
                    {{-- <img src="{{asset('dentaire/images/product/product.jpg')}}" width="559" height="370"
                        alt="Product" />
                    <a class="btn-play btn-iframe" href="https://www.youtube.com/embed/pGUjdW3tOVw">
                        <i class="d-icon-play-solid"></i>
                    </a> --}}

                    <iframe width="560" height="315" src="{{$product->video_url}}"
                    title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
                    </figure>
                        
                    @endif
                    <div class="icon-box-wrap d-flex flex-wrap">
                        <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4 mr-10">
                            <div class="icon-box-icon">
                                <i class="d-icon-lock"></i>
                            </div>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">Garantie de 2 ans</h4>
                                <p>Garantie sans doute</p>
                            </div>
                        </div>
                        <div class="divider d-xl-show mr-10"></div>
                        <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4">
                            <div class="icon-box-icon">
                                <i class="d-icon-truck"></i>
                            </div>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">Expédition gratuite
                                </h4>
                                <p>Total Supérieures à 50,00DA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     {{--    <div class="tab-pane" id="product-tab-additional">
            <ul class="list-none">
                <li><label>Brands:</label>
                    <p>SkillStar, SLS</p>
                </li>
                <li><label>Color:</label>
                    <p>Blue, Brown</p>
                </li>
                <li><label>Size:</label>
                    <p>Large, Medium, Small</p>
                </li>
            </ul>
        </div>
        <div class="tab-pane " id="product-tab-reviews">
            <div class="comments pt-2 pb-10 border-no">
                <ul>
                    <li>
                        <div class="comment">
                            <figure class="comment-media">
                                <a href="#">
                                    <img src={{asset("dentaire/images/blog/comments/1.jpg")}} alt="avatar">
                                </a>
                            </figure>
                            <div class="comment-body">
                                <div class="comment-rating ratings-container mb-0">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:80%"></span>
                                        <span class="tooltiptext tooltip-top">4.00</span>
                                    </div>
                                </div>
                                <div class="comment-user">
                                    <span class="comment-date text-body">September 22, 2020 at 9:42
                                        pm</span>
                                    <h4><a href="#">John Doe</a></h4>
                                </div>

                                <div class="comment-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                        libero sodales leo,
                                        eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.
                                        Suspendisse potenti.
                                        Sed egestas, ante et vulputate volutpat, eros pede semper
                                        est, vitae luctus metus libero eu augue.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="comment">
                            <figure class="comment-media">
                                <a href="#">
                                    <img src={{asset("dentaire/images/blog/comments/2.jpg")}} alt="avatar">
                                </a>
                            </figure>

                            <div class="comment-body">
                                <div class="comment-rating ratings-container mb-0">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:80%"></span>
                                        <span class="tooltiptext tooltip-top">4.00</span>
                                    </div>
                                </div>
                                <div class="comment-user">
                                    <span class="comment-date text-body">September 22, 2020 at 9:42
                                        pm</span>
                                    <h4><a href="#">John Doe</a></h4>
                                </div>

                                <div class="comment-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                        libero sodales leo, eget blandit nunc tortor eu nibh. Nullam
                                        mollis.
                                        Ut justo. Suspendisse potenti. Sed egestas, ante et
                                        vulputate volutpat,
                                        eros pede semper est, vitae luctus metus libero eu augue.
                                        Morbi purus libero,
                                        faucibus adipiscing, commodo quis, avida id, est. Sed
                                        lectus. Praesent elementum
                                        hendrerit tortor. Sed semper lorem at felis. Vestibulum
                                        volutpat.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div> --}}
          {{--   <!-- End Comments -->
            <div class="reply">
                <div class="title-wrapper text-left">
                    <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                    <p>Your email address will not be published. Required fields are marked *</p>
                </div>
                <div class="rating-form">
                    <label for="rating" class="text-dark">Your rating * </label>
                    <span class="rating-stars selected">
                        <a class="star-1" href="#">1</a>
                        <a class="star-2" href="#">2</a>
                        <a class="star-3" href="#">3</a>
                        <a class="star-4 active" href="#">4</a>
                        <a class="star-5" href="#">5</a>
                    </span>

                    <select name="rating" id="rating" required="" style="display: none;">
                        <option value="">Rate…</option>
                        <option value="5">Perfect</option>
                        <option value="4">Good</option>
                        <option value="3">Average</option>
                        <option value="2">Not that bad</option>
                        <option value="1">Very poor</option>
                    </select>
                </div>
                <form action="#">
                    <textarea id="reply-message" cols="30" rows="6" class="form-control mb-4"
                        placeholder="Comment *" required></textarea>
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <input type="text" class="form-control" id="reply-name"
                                name="reply-name" placeholder="Name *" required />
                        </div>
                        <div class="col-md-6 mb-5">
                            <input type="email" class="form-control" id="reply-email"
                                name="reply-email" placeholder="Email *" required />
                        </div>
                    </div>
                    <div class="form-checkbox mb-4">
                        <input type="checkbox" class="custom-checkbox" id="signin-remember"
                            name="signin-remember" />
                        <label class="form-control-label" for="signin-remember">
                            Save my name, email, and website in this browser for the next time I
                            comment.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-rounded">Submit<i
                            class="d-icon-arrow-right"></i></button>
                </form>
            </div>
            <!-- End Reply --> --}}
        {{-- </div> --}}
    </div>
</div>