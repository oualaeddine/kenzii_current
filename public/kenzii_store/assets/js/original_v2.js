function check() {
    document.getElementById("is-orginal").classList.add("is-orginal");

    let code = document.getElementById("productCode").value;
    const orginal = document.getElementById("is-orginal");
    code = code.toUpperCase();
    result = "no";
    $.getJSON("/check.php?code=" + code, function (data, status) {

        console.log(code);
        console.log(data)

        result = data.result

        if (result === "ok") {
            orginal.innerHTML = "" +
                "<div id=\"is-orginal\" class=\"justify-content-center is-orginal\">جهازك لاسوفت برو أصلي</div>" +
                "<div class=\"justify-content-center is-orginal\">مرخص من طرف شركة LaSoft PRO LTD</div>" +
                "<div class=\"justify-content-center is-orginal\">عدد الومضات الفعلية 1000000 ومضة</div>" +
                "<div class=\"justify-content-center is-orginal\">عدد المرات التي تم التحقق فيها من المنتج " + data.times + "</div>" +
                "<div class=\"justify-content-center is-orginal\">تاريخ الاصدار 2024</div>" +
                "<div class=\"justify-content-center is-orginal\">العمر الافتراضية للجهاز 10 سنوات</div>" +
                "<div class=\"justify-content-center is-orginal\">لاسوفت برو الأصلي الاصدار الموجه لدول شمال افريقيا والشرق الأوسط&nbsp;</div>";
        } else {
            orginal.innerHTML = "" +
                "" +
                "<div id=\"is-orginal\" class=\"justify-content-center is-orginal\">جهازك غير اصلي<br> يرجى التحقق من الرقم التسلسلي واعادة المحاولة من جديد<br>في حالة عدم توافق جهازك يرجى الاتصال بمصلحة الزبائن عبر hello@lasoft.pro</div>";        }
    });
}
