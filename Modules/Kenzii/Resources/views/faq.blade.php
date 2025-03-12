
@extends('kenzii::layouts.master')

@section('content')


<div class="container">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 col-sm-12 text-purple text-right" dir="rtl">
        <h1 style="margin-top:50px;">الأسئلة الأكثر شيوعا</h1>
        <br>
        <div class="accordion" id="accordionExample">
          
          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="headingone">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> كيف يعمل جهاز LaSoft PRO ؟</span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapseone" class="collapse" aria-labelledby="headingone" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">يعتمد جهاز LaSoft PRO على
                    تقنية ال IPL ( وميض ضوئي مكثف) , وهي تقنية حديثة
                </span><span style="font-weight: 400;">&nbsp;لإزالة
                    الشعر بشكل دائم و بدون ألم أو مخاطر. عندما تستعملين
                    الجهاز على الشعر يقوم بامتصاص الوميض بحيث بعد ذلك
                    يقوم بتدمير خلايا الشعر المستهدف .</span></p>
              </div>
            </div>
          </div>


          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="headingTwo">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> هل هو مؤلم ؟ </span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">واحدة من المميزات
                    المتعددة لجهاز LaSoft PRO مقارنة بباقي الطرق هي أنه غير
                    مؤلم أبدا عند الاستعمال. اغلب زبوناتنا وصفن لنا أنهن
                    يشعرن فقط بقليل من الحرارة على البشرة الموجه لها
                    الوميض.</span></p>
              </div>
            </div>
          </div>


          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading3">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> هل الشعر يزول إلى
                الأبد؟</span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">جهاز LaSoft PRO هو بكل تأكيد
                    جهاز لنتائج تدوم طويلا مع العلم انه لا يوجد طريقة
                    ازالة شعر الى الأبد حتى في العيادات, الرجاء الحذر من
                    الشركات التي تدعي أن لديها طريقة تدوم إلى الأبد .
                    لضمان نتائج طويلة الأمد ننصح بجلسة في الأسبوع لمدة 8
                    أسابيع, بعد ذلك مرة واحدة في الشهر فقط
                    كصيانة.</span></p>
              </div>
            </div>
          </div>

          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading4">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> هل أحتاج إلى واقي
                للعين عند الجلسات ؟ </span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">لا, لا داعي لإستعمال واقي
                    للعين في الجلسات ,الجهاز مصمم بحساسات تمكنه من عدم
                    إطلاق أي وميض إلا عندما تكون الفتحة موجهة و موضوعة
                    بالكامل على الجلد. كما يجب عليك ألا توجه نظرك مباشرة
                    الى الوميض .</span></p>
              </div>
            </div>
          </div>



          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading5">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> كم يلزم من الوقت لكي
                أبدأ في ملاحظة النتائج ؟ </span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">معظم الزبونات تلاحظن
                    نقصان في الشعر بعد جلستين أو ثلاثة فقط و نتائج كاملة
                    بعد 9 جلسات. النتائج تتغير من شخص لأخر حسب نوع و لون
                    الشعر و البشرة.</span></p>
              </div>
            </div>
          </div>



          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading6">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> كم من جلسة يجب على أن
                أعمل ؟</span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">ننصح بجلسة في الأسبوع
                    لمدة 8 أسابيع.&nbsp; بعد ذلك كصيانة وللحفاظ على
                    المناطق خالية من الشعر ننصح بمرة في كل شهر.</span>
              </div>
            </div>
          </div>



          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading7">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> كم من الوقت هو عمر
                الجهاز ؟ </span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">عمر الجهازهو 1000000
                    ومضة.أي حسب عدد مرات الاستعمال المنصوح بها يدوم ل 10
                    سنين.</span></p>
              </div>
            </div>
          </div>


          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading8">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class="">ما هي مناطق الجسم التي
                استطيع ان استعمل الجهاز عليها ؟ </span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">الجهاز مصمم لكل مناطق
                    الجسم بما فيها الوجه و المناطق الحساسة (فقط تـأكدي
                    من عدم استعماله محاداتا للعينين)</span></p>
              </div>
            </div>
          </div>



          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading9">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> هل يجب علي أن احلق
                المنطقة المراد إزالة الشعر منها قبل استعمال الجهاز ؟</span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">نعم, ننصح بحلاقة المناطق
                    المستهدفة قبل الجلسات .</span></p>
              </div>
            </div>
          </div>


          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading10">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class="">  ماهي طرق إزالة الشعر
                التي استطيع استعمالها بين الجلسات ؟</span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">بين الجلسات تستطيعين فقط
                    الحلاقة عند الضرورة, ولا ننصح باستعمال أي طريقة
                    تقتلع الشعر من الجذور , لأن الجهاز يعتمد على امتصاص
                    الجذور للوميض في للعلاج.</span></p>
              </div>
            </div>
          </div>



          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading11">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> هل الجهاز فعال على جميع
                ألوان الشعر ؟</span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">تقنية ال IPL تعتمد على
                    الميلانين المتواجد في الشعر الذي يمتص الوميض , لهذا
                    من الممكن أن لا يكون فعال على الشعر الأبيض, الأشقر,
                    الأصفر&nbsp; أو الأحمر المفتوح.</span></p>
              </div>
            </div>
          </div>



          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading12">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> هل LaSoft PRO آمن
                للإستعمال ؟ </span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordionExample">
              <div class="card-body">
        		<p><span style="font-weight: 400;">&nbsp;بكل تأكيد , هناك
                    عدة دراسات علمية حول العالم تؤكد أمان و فعالية ال
                    IPL في إزالة الشعر. بسبب هذه الدراسات أصبحت التقنية
                    جد شائعة بأمانها وفعاليتها.</span></p>
              </div>
            </div>
          </div>


          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading13">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> هل الجهاز آمن للحوامل </span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordionExample">
              <div class="card-body">
        		<p><span style="font-weight: 400;">ليس هناك أي دراسة تثبت أي
                    مخاطر ال IPL على الحوامل لحد الان, لكن من باب الحيطة
                    لا ننصح به في حالة الحمل أو في فترة الرضاعة.</span>
            </p>
              </div>
            </div>
          </div>


          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading14">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> هل أستطيع استعمال
                الجهاز فوق الخالات او النموش </span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse14" class="collapse" aria-labelledby="heading14" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">لا, لا ينصح بإستعمال جهاز
                    LaSoft PRO فوق النموش او الخالات و حتى الوشوم</span>
                </p>
              </div>
            </div>
          </div>


          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading15">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class="">كم تكلفة الشحن ؟ </span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse15" class="collapse" aria-labelledby="heading15" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">نحن نوفر شحن مجاني وسريع
                    لكل المدن الجزائرية</span></p>
              </div>
            </div>
          </div>



          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading16">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class="">ما هي طرق الدفع المتاحة
                ؟</span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse16" class="collapse" aria-labelledby="heading16" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">الدفع يكون نقدا عند
                    استلام الجهاز</span></p>
              </div>
            </div>
          </div>



          <div class="card border-0 mb-1">
            <div class="card-header"  style="background-color:#f5eaec" id="heading17">
              <div class="row">
                <div class="col-sm-10">
              <h6 class="mb-0" ><span class=""> هل يأتي أي ضمان مع
                المنتج ؟</span></h6>
               </div>
             <div class="col-sm-2">
              <button class="btn"  type="button" data-toggle="collapse" data-target="#collapse17" aria-expanded="false" aria-controls="collapse17">
                <i class="fas fa-arrow-down"></i>
              </button>
               </div>
             </div>
            </div>
            <div id="collapse17" class="collapse" aria-labelledby="heading17" data-parent="#accordionExample">
              <div class="card-body">
                <p><span style="font-weight: 400;">نقدم ضمان ارجاع 30 يوم و
                    ضمان عيوب تصنيع ل سنتين</span></p>
              </div>
            </div>
          </div>

        
          <div class="text-center">
            <form action="{{route('kenzii.checkout')}}" method="GET" id="checkout_form_2">
                @csrf
                <a href="javascript:void(0)" style="text-decoration : none" onclick="document.getElementById('checkout_form_2').submit(); return false;" class="order-now buy_btn">أطلـب الآن </a>
            </form>
        </div>
     
    </div>
  </div>
</div>
</div>

<hr>

@endsection