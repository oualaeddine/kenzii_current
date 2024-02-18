<script>

    let menu_new = $('.new'),
        menu_na1 = $('.na1'),
        menu_na2 = $('.na2'),
        menu_AttConfNa1 = $('.AttConfNa1'),
        menu_AttConfNa2 = $('.AttConfNa2'),
        menu_Conf1Na1 = $('.Conf1Na1'),
        menu_Conf1Na2 = $('.Conf1Na2'),
        menu_AttShippNa1 = $('.AttShippNa1'),
        menu_AttShippNa2 = $('.AttShippNa2'),
        menu_pending_c = $('.pending_c'),
        menu_confirmed1 = $('.confirmed1'),
        menu_pending_s = $('.pending_s'),
        menu_confirmed2 = $('.confirmed2'),
        menu_rs = $('.rs'),
        menu_r_wilaya = $('.r_wilaya'),
        menu_sortie = $('.sortie'),
        menu_alerte = $('.alerte'),
        menu_t_echoue = $('.t_echoue'),
        menu_att_c = $('.att_c'),
        menu_attente = $('.pending'),
        menu_expedie = $('.expedie'),
        menu_v_wilaya = $('.v_wilaya'),
        menu_transfert = $('.transfert'),
        menu_centre = $('.centre'),
        menu_delivered = $('.delivered'),
        menu_echec = $('.echec'),
        menu_canceled = $('.canceled');
        menu_en_p = $('.en_p');
        menu_contact_off = $('.contact-off');


    let old_new = {count: 0, date: null}
    old_na1 = {count: 0, date: null}
    old_na2 = {count: 0, date: null}
    old_AttConfNa1 = {count: 0, date: null}
    old_AttConfNa2 = {count: 0, date: null}
    old_Conf1Na1 = {count: 0, date: null}
    old_Conf1Na2 = {count: 0, date: null}
    old_AttShippNa1 = {count: 0, date: null}
    old_AttShippNa2 = {count: 0, date: null}
    old_pending_c = {count: 0, date: null}
    old_confirmed1 = {count: 0, date: null}
    old_pending_s = {count: 0, date: null}
    old_confirmed2 = {count: 0, date: null}
    old_rs = {count: 0, date: null}
    old_r_wilaya = {count: 0, date: null}
    old_sortie = {count: 0, date: null}
    old_alerte = {count: 0, date: null}
    old_t_echoue = {count: 0, date: null}
    old_att_c = {count: 0, date: null}
    old_attente = {count: 0, date: null}
    old_expedie = {count: 0, date: null}
    old_v_wilaya = {count: 0, date: null}
    old_transfert = {count: 0, date: null}
    old_centre = {count: 0, date: null}
    old_delivered = {count: 0, date: null}
    old_echec = {count: 0, date: null}
    old_canceled = {count: 0, date: null}
    old_en_p = {count: 0, date: null}
    old_contact_off = {count: 0, date: null}

    function resetMenuBadges() {
        menu_new.html("");
        menu_na1.html("");
        menu_na2.html("");
        menu_AttConfNa1.html("");
        menu_AttConfNa2.html("");
        menu_Conf1Na1.html("");
        menu_Conf1Na2.html("");
        menu_AttShippNa1.html("");
        menu_AttShippNa2.html("");
        menu_pending_c.html("");
        menu_confirmed1.html("");
        menu_pending_s.html("");
        menu_confirmed2.html("");
        menu_rs.html("");
        menu_r_wilaya.html("");
        menu_sortie.html("");
        menu_alerte.html("");
        menu_t_echoue.html("");
        menu_att_c.html("");
        menu_attente.html("");
        menu_expedie.html("");
        menu_v_wilaya.html("");
        menu_transfert.html("");
        menu_centre.html("");
        menu_delivered.html("");
        menu_echec.html("");
        menu_canceled.html("");
        menu_en_p.html("");
        menu_contact_off.html("");
    }

    function onNotificationClicked(type) {
        //todo
    }

    function notifyOrder(type) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": onNotificationClicked(type),
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "6000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        let call_c = "appelons le client maintenant!"

        switch (type) {
            case "new":
                toastr.success(call_c, " Vous avez une nouvelle commande!");
                break;
            case "delivered":
                toastr.success(call_c, "Commande livré!");
                break;
            case "r_wilaya":
                toastr.info(call_c, "Une commande est arrivé à wilaya!");
                break;
            case "sortie":
                toastr.info(call_c, "Une commande est en sortie!");
                break;
            case "alerte":
                toastr.warning(call_c, "Une Commande en alerte!");
                break;
            case "echoue":
                toastr.error(call_c, "Oups! Une tentative a echoué!");
                break;
        }

        //  console.log('notifit')

    }

    function checkAndNotify(data) {

        if (old_new == undefined || old_new.date < data.new.date)
            notifyOrder("new", old_new.count - data.new.count)
        if (old_na1 == undefined || old_na1.date < data.na1.date)
            notifyOrder("na1", old_na1.count - data.na1.count)
        if (old_na2 == undefined || old_na2.date < data.na2.date)
            notifyOrder("na2", old_na2.count - data.na2.count)
        if (old_AttConfNa1 == undefined || old_AttConfNa1.date < data.AttConfNa1.date)
            notifyOrder("AttConfNa1", old_AttConfNa1.count - data.AttConfNa1.count)  
        if (old_AttConfNa2 == undefined || old_AttConfNa2.date < data.AttConfNa2.date)
            notifyOrder("AttConfNa2", old_AttConfNa2.count - data.AttConfNa2.count)  
        if (old_Conf1Na1 == undefined || old_Conf1Na1.date < data.Conf1Na1.date)
            notifyOrder("Conf1Na1", old_Conf1Na1.count - data.Conf1Na1.count) 
        if (old_Conf1Na2 == undefined || old_Conf1Na1.date < data.Conf1Na2.date)
            notifyOrder("Conf1Na2", old_Conf1Na1.count - data.Conf1Na2.count)
        if (old_AttShippNa1 == undefined || old_AttShippNa1.date < data.AttShippNa1.date)
            notifyOrder("AttShippNa1", old_AttShippNa1.count - data.AttShippNa1.count)
        if (old_AttShippNa2 == undefined || old_AttShippNa2.date < data.AttShippNa2.date)
            notifyOrder("AttShippNa2", old_AttShippNa2.count - data.AttShippNa2.count)   
        if (old_pending_c == undefined || old_pending_c.date < data.pending_c.date)
            notifyOrder("pending_c", old_pending_c.count - data.pending_c.count)
        if (old_confirmed1 == undefined || old_confirmed1.date < data.confirmed1.date)
            notifyOrder("confirmed1", old_confirmed1.count - data.confirmed1.count)
        if (old_pending_s == undefined || old_pending_s.date < data.pending_s.date)
            notifyOrder("pending_s", old_pending_s.count - data.pending_s.count)
        if (old_confirmed2 == undefined || old_confirmed2.date < data.confirmed2.date)
            notifyOrder("confirmed2", old_confirmed2.count - data.confirmed2.count)
        if (old_rs == undefined || old_rs.date < data.rs.date)
            notifyOrder("rs", old_new.count - data.rs.count)
        if (old_r_wilaya == undefined || old_r_wilaya.date < data.r_wilaya.date)
            notifyOrder("r_wilaya", old_r_wilaya.count - data.r_wilaya.count)
        if (old_sortie == undefined || old_sortie.date < data.sortie.date)
            notifyOrder("sortie", old_sortie.count - data.sortie.count)
        if (old_alerte == undefined || old_alerte.date < data.alerte.date)
            notifyOrder("alerte", old_alerte.count - data.alerte.count)
        if (old_t_echoue == undefined || old_t_echoue.date < data.t_echoue.date)
            notifyOrder("t_echoue", old_t_echoue.count - data.t_echoue.count)
        if (old_att_c == undefined || old_att_c.date < data.att_c.date)
            notifyOrder("att_c", old_att_c.count - data.att_c.count)
        if (old_attente == undefined || old_attente.date < data.attente.date)
            notifyOrder("attente", old_attente.count - data.attente.count)
        if (old_expedie == undefined || old_expedie.date < data.expedie.date)
            notifyOrder("expedie", old_expedie.count - data.expedie.count)
        if (old_v_wilaya == undefined || old_v_wilaya.date < data.v_wilaya.date)
            notifyOrder("v_wilaya", old_v_wilaya.count - data.v_wilaya.count)
        if (old_transfert == undefined || old_transfert.date < data.transfert.date)
            notifyOrder("transfert", old_transfert.count - data.transfert.count)
        if (old_centre == undefined || old_centre.date < data.centre.date)
            notifyOrder("centre", old_centre.count - data.centre.count)
        if (old_delivered == undefined || old_delivered.date < data.delivered.date)
            notifyOrder("delivered", old_delivered.count - data.delivered.count)
        if (old_echec == undefined || old_echec.date < data.echec.date)
            notifyOrder("echec", old_echec.count - data.echec.count)
        if (old_canceled == undefined || old_canceled.date < data.canceled_.date)
            notifyOrder("canceled_", old_canceled.count - data.canceled_.count)
    }

    function setLabelsValues() {
        menu_new.html(old_new.count)
    

        menu_na1.html(old_na1.count)
        menu_na2.html(old_na2.count)
        menu_AttConfNa1.html(old_AttConfNa1.count)
        menu_AttConfNa2.html(old_AttConfNa2.count)
        menu_Conf1Na1.html(old_Conf1Na1.count)
        menu_Conf1Na2.html(old_Conf1Na2.count)
        menu_AttShippNa1.html(old_AttShippNa1.count)
        menu_AttShippNa2.html(old_AttShippNa2.count)
        menu_pending_c.html(old_pending_c.count)
        menu_confirmed1.html(old_confirmed1.count)
        menu_pending_s.html(old_pending_s.count)
        menu_confirmed2.html(old_confirmed2.count)
        menu_rs.html(old_rs.count)
        menu_r_wilaya.html(old_r_wilaya.count)
        menu_sortie.html(old_sortie.count)
        menu_alerte.html(old_alerte.count)
        menu_t_echoue.html(old_t_echoue.count)
        menu_att_c.html(old_att_c.count)
        menu_attente.html(old_attente.count)
        menu_expedie.html(old_expedie.count)
        menu_v_wilaya.html(old_v_wilaya.count)
        menu_transfert.html(old_transfert.count)
        menu_centre.html(old_centre.count)
        menu_delivered.html(old_delivered.count)
        menu_echec.html(old_echec.count)
        menu_canceled.html(old_canceled.count)
        menu_en_p.html(old_en_p.count)
        menu_contact_off.html(old_contact_off.count)
      
    }

    function updateOrders(mstatus, mcount,contact_off) {

         old_contact_off.count = contact_off;
        switch (mstatus) {
            case 'new':
                old_new.count = mcount;
                break;
            case 'na1':
                old_na1.count = mcount;
                break;
            case 'na2':
                old_na2.count = mcount;
                break;
            case 'AttConfNa1':
                old_AttConfNa1.count = mcount;
                break;
            case 'AttConfNa2':
                old_AttConfNa2.count = mcount;
                break;
            case 'Conf1Na1':
                old_Conf1Na1.count = mcount;
                break;
            case 'Conf1Na2':
                old_Conf1Na2.count = mcount;
                break;
            case 'AttShippNa1':
                old_AttShippNa1.count = mcount;
                break;
            case 'AttShippNa2':
                old_AttShippNa2.count = mcount;
                break;
            case 'pending_c':
                old_pending_c.count = mcount;
                break;
            case 'confirmed1':
                old_confirmed1.count = mcount;
                break;
            case 'pending_s':
                old_pending_s.count = mcount;
                break;
            case 'confirmed2':
                old_confirmed2.count = mcount;
                break;
            case 'rs':
                old_rs.count = mcount;
                break;
            case 'r_wilaya':
                old_r_wilaya.count = mcount;
                break;
            case 'sortie':
                old_sortie.count = mcount;
                break;
            case 'alerte':
                old_alerte.count = mcount;
                break;
            case 't_echoue':
                old_t_echoue.count = mcount;
                break;
            case 'att_c':
                old_att_c.count = mcount;
                break;
            case 'attente':
                old_attente.count = mcount;
                break;
            case 'expedie':
                old_expedie.count = mcount;
                break;
            case 'v_wilaya':
                old_v_wilaya.count = mcount;
                break;
            case 'transfert':
                old_transfert.count = mcount;
                break;
            case 'centre':
                old_centre.count = mcount;
                break;
            case 'delivered':
                old_delivered.count = mcount;
                break;
            case 'echec':
                old_echec.count = mcount;
                break;
            case 'canceled':
                old_canceled.count = mcount;
                break;
            case 'en_p':
                old_en_p.count = mcount;
                break;
        }
       

        setLabelsValues();
    }

    function checkOrders() {
        $.ajax({
            url: '{{route('api.orders.count')}}',
            success: (function (data) {
                contact_off = data.contact_count;
                data = data.data
                //  console.log('verifit')
                //  console.log(data)

                //checkAndNotify(data)
                for (let i = 0; i < data.length; i++) {
                    updateOrders(data[i].status, data[i].count,contact_off)
                }

            })
        });
    }

    function startWorkerTimer() {
        checkOrders();

        setInterval(function () {
            // console.log('rayh nverifi')
            checkOrders();
        }, 1000 * 30);
    }

    function watchOrders() {
        resetMenuBadges()
        startWorkerTimer()
    }

    watchOrders()
</script>