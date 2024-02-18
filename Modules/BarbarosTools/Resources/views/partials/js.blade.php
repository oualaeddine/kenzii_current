  <!-- Plugins JS File -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" 
  integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" 
  integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js" 
integrity="sha512-S5PZ9GxJZO16tT9r3WJp/Safn31eu8uWrzglMahDT4dsmgqWonRY9grk3j+3tfuPr9WJNsfooOR7Gi7HL5W2jw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" 
integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js" 
integrity="sha512-QABeEm/oYtKZVyaO8mQQjePTPplrV8qoT7PrwHDJCBLqZl5UmuPi3APEcWwtTNOiH24psax69XPQtEo5dAkGcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"
 integrity="sha512-/6TZODGjYL7M8qb7P6SflJB/nTGE79ed1RfJk3dfm/Ib6JwCT4+tOfrrseEHhxkIhwG8jCl+io6eaiWLS/UX1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

<script src={{asset("dentaire/vendor/nouislider/nouislider.min.js")}}></script>

  <!-- Main JS File -->
  <script src="/dentaire/js/main.min.js"></script>

  <script>
    @if(Session::has('success'))
       toastr.success("{{ Session::get('success') }}")
   @endif
   
   @if(Session::has('orange'))
      toastr.info("{{ Session::get('orange') }}")
   @endif
   
   @if(Session::has('danger'))
      toastr.error("{{ Session::get('danger') }}")
   @endif
</script>



@yield('js')
