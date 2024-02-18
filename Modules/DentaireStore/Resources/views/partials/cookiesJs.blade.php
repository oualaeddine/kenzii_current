

<script>

    /***end to do*/

    $allow_cookies = localStorage.getItem('AllowCookies') || false;

    if( $allow_cookies == 'true'){
        $('.cookiealert').hide();
    }else{
                $('.cookiealert').show();
    }

    $('.acceptcookies').on('click',function(){
        localStorage.setItem('AllowCookies', true);
        $('.cookiealert').hide();
    })

    // hide cookies end 

</script>