<footer class="footer" >
    <div class="container">
        <div class="footer-middle text-center" style="padding: 0;">
            <div class="widget">
                <ul class="widget-body" >
{{--
                    <li ><a class="nav-link"  href="#" --}}
{{-- style="font-size:16px !important " --}}{{--
> معلومات عنا</a></li>
--}}
                    <li ><a class="nav-link"  href="{{route('barbarostools.faq')}}" {{-- style="font-size:16px !important " --}}>الأسئلة الشائعة</a></li>
                    <li ><a class="nav-link"  href="{{route('barbarostools.track')}}" {{-- style="font-size:16px !important " --}}>تتبع الطلبية</a></li>
                    <li ><a class="nav-link"  href="{{route('barbarostools.contact')}}" {{-- style="font-size:16px !important  " --}}>تواصل معنا</a></li>
                    <li ><a class="nav-link"  href="tel:{{Config::get('app.phone')}}" target="_blanck" {{-- style="font-size:16px !important  " --}}>إتصل بنا {{Config::get('app.phone')}}</a></li>
                </ul>
            </div>

         {{--    <div class="social-links">
                <a class="nav-link"  href="tel:0770496866" target="_blanck">إتصل بنا 0770496866</a>
            </div> --}}

        </div>
        <!-- End of FooterMiddle -->
        <div class="footer-bottom d-block text-center" >
                <p class="copyright">{{Config::get('app.name')}} &copy; 2021. كل الحقوق محفوظة  .</p>

           
            <p class="copyright">This site is not part of the Facebook website or Facebook Inc. Additionally, this site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.</p>
        </div>
        <!-- End of FooterBottom -->
    </div>
</footer>