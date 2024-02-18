<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap');

    * {
        font-family: Tajawal, Arial, 'sans-serif' !important;/* <-- fonts */
        font-size: 16px;
    }

    .cookiealert {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        margin: 0 !important;
        z-index: 999999;
        opacity: 1;
        visibility: visible;
        border-radius: 0;
        transform: translateY(0%);
        transition: all 500ms ease-out;
        color: #ecf0f1;
        background: #212327;
    }


    .white-popup {
    position: relative;
    background: #FFF;
    padding: 40px;
    width: auto;
    max-width: 500px;
    margin: 20px auto;
    transition: 1s all;
    }

    .mfp-bg {}

    .mfp-fade.mfp-bg {
    opacity: 0;
    -webkit-transition: all 0.15s ease-out;
    -moz-transition: all 0.15s ease-out;
    transition: all 0.15s ease-out;
    }

    body {
    -webkit-overflow-scrolling: touch;
    }
    body.mfp-active {
        overflow: hidden;
        -webkit-overflow-scrolling: auto;
        width: 100%;
        position: fixed;
        overflow: auto;
    }
    body .mfp-wrap {
        position: fixed;
        overflow: auto;
        top: 0 !important;
    }


    /* overlay animate in */

    .mfp-fade.mfp-bg.mfp-ready {
    opacity: 0.8;
    }


    /* overlay animate out */

    .mfp-fade.mfp-bg.mfp-removing {
    opacity: 0;
    }

    .mfp-fade.mfp-wrap .mfp-content {
    opacity: 0;
    transition: all 0.4s ease-out;
    }

    .mfp-fade.mfp-wrap.mfp-ready .mfp-content {
    opacity: 1;
    }

    .mfp-fade.mfp-wrap.mfp-removing .mfp-content {
    opacity: 0;
    }
    
    .product-single-carousel{

        max-height: 600px;
        max-width:  580px;
    }

    .image-figure-carousel{

       height: 580px;
        width:580px

    }


    .btn-order{
        width: 100%;
        background:#D4AF37;
        font-size:18px;

    }

    .btn-order:hover{

     background-color: #FFD700 !important;

    }

    .btn-dark{
        padding: 7px 12px;
        background:#D4AF37;
        border-color: #D4AF37;
        font-size:14px;

    }

    .btn-pagination{
        padding: 8px 0px;
        background:#D4AF37;
        border-color: #D4AF37;
        color: white;
        font-size:12px;

    }

    .btn-pagination:hover{

     background-color: #FFD700 !important;
     border-color: #FFD700;
     color: white;

    }

    .active-paginator{
        border-color: #FFD700;
        border: 1px solid #FFD700;
    }

    .btn-secondary{
        padding: 7px 12px;
 /*        margin-bottom: 10px; */
        background:#a0a0a0;
        border-color: #a0a0a0;
        font-size:14px;


    }

    .btn-secondary:hover{
        background:#767676;
        border-color: #767676;
    }

    .btn-secondary-pagination{
        padding: 8px 0px;
 /*        margin-bottom: 10px; */
        background:#a0a0a0;
        border-color: #a0a0a0;
        font-size:12px;
        color: white;

    }

    .btn-secondary-pagination:hover{
        background:#a0a0a0;
        border-color: #a0a0a0;
        color: white;
    }

    .active-category{
        color:#D4AF37 !important;

    }

    .active-footer-mobile{
        color:#FFD700 !important;
        font-weight: bold;
    }

    .text-deco{
        text-decoration: none;
    }

     .btn-dark:hover{

     background-color: #FFD700 !important;
     border-color: #FFD700;

    }

     .sticky-footer-spec{
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background:white;
        box-shadow: 0px 0 10px rgba(0, 0, 0, 0.2);
        z-index:99;
        display: flex;
        box-sizing: inherit;
    }

    .product-form .btn-cart-special:hover{

        background-color: #FFD700 !important;

    }

    .icons-service{
        font-weight: 400;
        font-size: 14px;
    }

    .sticky-footer-spec>*{
       flex: 1;
    }

    .image_product_carousel{

    /*     background-repeat: no-repeat; */
       /*  box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important; */
    /*     background-size:contain;  */

        display:block;
        width:580px;
        height: 50vh;
        transition:all .5s;

    }

    footer a {

      color:#c6cccc !important;

    }

    .price-text{
        color:#6c757d !important;
    }

    .icons{
        font-size: 18px !important;
    }


    .image_product{
        /* height: auto; */
       /*  width:280px; */
        background-repeat: no-repeat;
        box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;
        background-size:contain;

        display:block;
        width:100%;
        height: 35vh;
        transition:all .5s;


    }

    .product-thumb{
        background-color: #F2F2F2;
        box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;
        height:15vh !important;
    }

    .image-slider{

        display:block;
        width:80%;
        height: 18vh;
        transition:all .5s;

    }
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {

        .image_product{

                height: 25vh;
               /*  width:155px; */

         }

        .image-slider{

        display:block;

        height: 12vh;
        transition:all .5s;

        }

        .product-single-carousel{

            max-height: 350px;
            max-width:  580px;

        }


        .image-figure-carousel{

            height: 350px;
            width:580px

        }

        .image_product_carousel{

        /*     background-repeat: no-repeat; */
           /*  box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important; */
        /*     background-size:contain;  */

            display:block;
            width:330px;
            height: 50vh;
            transition:all .5s;

        }

        .buttom-bar{
            height: 120px !important;
        }

        .buttom-bar-all{
            height: 70px !important;
        }

    }

    @media only screen and (min-width:600px) {
        .hide-on-desktop, * [aria-labelledby='hide-on-desktop'] {
            display: none;
            max-height: 0;
            overflow: hidden;
        }
    }

    footer a:hover {
         color: #FFD700 !important;
    }

 

 


 </style>