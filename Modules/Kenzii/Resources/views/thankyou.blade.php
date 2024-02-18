@extends('kenzii::layouts.master')

@section('content')


    <section class="shipwreck-section">
        <div class="container-fluid h-100">
            <div class="row justify-content-end h-100">
                <div class="col-md-8 my-auto">
                    <h2>شكرا على ثقتكم </h2>
                    <p>
                        لقد تم استلام طلبكم بنجاح وسيتم الاتصال بكم هاتفيا لتأكيد الطلبية
                    </p>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <script>
        fbq('track', 'Purchase', {currency: "DZD", value: 2400.00});
    </script>
@endsection
