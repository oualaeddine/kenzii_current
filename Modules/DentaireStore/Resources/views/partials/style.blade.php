<style>

    @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;1,200;1,300;1,400&display=swap');

    * {
        font-family: Source Sans Pro ;
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

    .image_product {
        /* height: auto; */
        /*  width:280px; */
        background-repeat: no-repeat;
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        background-size: contain;

        display: block;
        width: 100%;
        height: 35vh;
        transition: all .5s;


    }

    .image_product_cart {
        /* height: auto; */
        /*  width:280px; */
        background-repeat: no-repeat;
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        background-size: contain;

        display: block;
        width: 100%;
        height: 15vh;
        transition: all .5s;
    }

    

    .image_product_cart_s {
        /* height: auto; */
        /*  width:280px; */
        background-repeat: no-repeat;
       /*  box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important; */
        background-size: contain;

        display: block;
        width: 100%;
        height: 10vh;
        transition: all .5s;


    }


   

    
    .product-form .btn-cart-dentaire {
        border: 0;
        flex: 1;
        min-width: 13rem;
        font-size: 1.4rem;
        border-radius: 0.3rem;
        background-color: #26c;
        color: #fff;
        cursor: pointer;
        max-width: 20.7rem;
        height: 4.5rem;
        transition: color .3s, background-color .3s, border-color .3s;
        z-index: 1;
        line-height: 2.9;
        padding: 0 0.6em;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-right: 0px;
    }

    .active-paginator{
        border-color: #26c;
        border: 1px solid #26c;
    }


    .btn-pagination-d {
        padding: 8px 0px;
        background: #26c;
        border-color: #26c;
        color: white;
        font-size: 12px;

    }

    .btn-pagination-d:hover {

        background-color: #037BD0 !important;
        border-color: #037BD0;
        color: white;

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

    


    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {

        .image_product {

            height: 25vh;
            /*  width:155px; */

        }

    }

    @media print
    {
        .non-printable { display: none; }
        .printable { display: block; }
    }

</style>
