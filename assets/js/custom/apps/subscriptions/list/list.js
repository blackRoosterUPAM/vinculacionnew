"use strict";
var KTSubscriptionsList = (function () {
  var t,
    e
    
  return {
    init: function () {
      (t = document.getElementById("kt_subscriptions_table")) &&
        (t.querySelectorAll("tbody tr").forEach((t) => {
          const e = t.querySelectorAll("td"),
            n = moment(e[5].innerHTML, "DD MMM YYYY, LT").format();
          e[5].setAttribute("data-order", n);
        }),
        (e = $(t).DataTable({
          info: !1,
          order: [],
          pageLength: 10,
          lengthChange: !1,
          columnDefs: [
            { orderable: !1, targets: 6 },
          ],
        })).on("draw", function () {
          
        }),
        document
          .querySelector('[data-kt-subscription-table-filter="search"]')
          .addEventListener("keyup", function (t) {
            e.search(t.target.value).draw();
          })
        );
    },
  };
})();
KTUtil.onDOMContentLoaded(function () {
  KTSubscriptionsList.init();
});
