$(document).ready(function () {
    window.addEventListener('position-changed', event => {
        $(`#position-${event.detail.id}`).addClass('active');
    });
    window.addEventListener("print-total-salaries", event => {
        window.print();
    });
    window.addEventListener("take-dept", event => {
        $(".take-debt").show();
    })

    $(".fc-daygrid-day-frame").click(function () {
        let date = $(this).attr("data-date");
        $(this).toggleClass("active");
    })
    $(".changeWorkPrice").click(function() {
        let tr = $(this).parent().parent();
        let work_id = $(this).parent().parent().find("input[type='hidden']").val();
        $(this).parent().parent().find("input[type='text']").focus();
        let newPrice = $(this).parent().parent().find("input[type='text']").val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/work-edit",
            type: "POST",
            data: {_token: CSRF_TOKEN, work_id, newPrice},
            success: function (response) {
                if(response == 'ok') {
                    let status = $("<div class='alert alert-success'>Հաջողությամբ պահպանվեց</div>");
                    $(".add-work .status").append(status);
                }
            }
        })
    })

    // $("input[name='prepayment']").change(function(){
    //    if($(this).val() == 'debt') {
    //         $(".prepayment-month label").html("Ընտրեք թե որ ամսին եք ցանկանում տալ պարտքը");
    //         $(".prepayment-month").show();
    //         $(".btn-primary").removeAttr("disabled");
    //    } else {
    //        $(".prepayment-month label").html("Ընտրեք թե որ ամսի աշխատավարձից եք ցանկանում ստանալ կանխավճարը");
    //        $(".prepayment-month").show();
    //        $(".btn-primary").removeAttr("disabled");
    //    }
    // })
})



addEventListener('DOMContentLoaded', function () {
   var ga =  pickmeup('.multiple', {
        flat : true,
        mode : 'multiple',
    });

   $(".save-default-worker-salary").click(function() {
     let selectedDates = ga.get_date(true);
     let worker_id = $(".worker_id").val();
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
     $.ajax({
         url: "/add-salary",
         type: "POST",
         data: {_token: CSRF_TOKEN, selectedDates,worker_id},
         success: function (response) {
            if(response == 'ok') {
                let status = $("<div class='alert alert-success'>Հաջողությամբ պահպանվեց</div>");
                $(".add-salary .status").append(status);
            }
         }
     })
   })
});







