<?php
function log_graph($stat){
    global $conn;
    global $user;
    $stmt = $conn->prepare("SELECT time FROM logs WHERE user_id=:user_id AND status=:status");
    $stmt->execute(['user_id'=>$user['id'], 'status'=>$stat]);
    $data = $stmt->fetchAll();
    $jan = $feb = $mar = $apr = $may = $jun = $jul = $aug = $sep = $oct = $nov = $dec = 0;
    foreach($data as $row){
        $month = date("n",strtotime($row['time']));
       // echo $month.'<br/>';
        if($month == 1){
            $jan += 1;
        }elseif($month == 2){
            $feb += 1;
        }elseif($month == 3){
            $mar += 1;
        }elseif($month == 4){
            $apr += 1;
        }elseif($month == 5){
            $may += 1;
        }elseif($month == 6){
            $jun += 1;
        }elseif($month == 7){
            $jul += 1;
        }elseif($month == 8){
            $aug += 1;
        }elseif($month == 9){
            $sep += 1;
        }elseif($month == 10){
            $oct += 1;
        }elseif($month == 11){
            $nov += 1;
        }else{
            $dec += 1;
        }
    }
    
    $fin = '['.$jan.', '.$feb.', '.$mar.', '.$apr.', '.$may.', '.$jun.', '.$jul.', '.$aug.', '.$sep.', '.$oct.', '.$nov.', '.$dec.', ]';
    return $fin;
    }
?>
<script>
    $("#kt_login_sessions").DataTable({
    "scrollY": "500px",
    "scrollCollapse": true,
    "paging": true,
    "scrollX": true,
    responsive: true
});



"use strict";
var KTAccountSecuritySummary2 = (function () {
  var tt = function (t, e, a, r, s) {
    var i = document.querySelector(e),
      n = parseInt(KTUtil.css(i, "height"));
    if (i) {
      var o = {
          series: [
            { name: "Successful Login", data: a },
            { name: "Failed Login", data: r },
          ],
          chart: {
            fontFamily: "inherit",
            type: "bar",
            height: n,
            toolbar: { show: !1 },
          },
          plotOptions: {
            bar: { horizontal: !1, columnWidth: ["35%"], borderRadius: 6 },
          },
          legend: { show: !1 },
          dataLabels: { enabled: !1 },
          stroke: { show: !0, width: 2, colors: ["transparent"] },
          xaxis: {
            categories: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
            axisBorder: { show: !1 },
            axisTicks: { show: !1 },
            labels: {
              style: {
                colors: KTUtil.getCssVariableValue("--kt-gray-400"),
                fontSize: "12px",
              },
            },
          },
          yaxis: {
            labels: {
              style: {
                colors: KTUtil.getCssVariableValue("--kt-gray-400"),
                fontSize: "12px",
              },
            },
          },
          fill: { opacity: 1 },
          states: {
            normal: { filter: { type: "none", value: 0 } },
            hover: { filter: { type: "none", value: 0 } },
            active: {
              allowMultipleDataPointsSelection: !1,
              filter: { type: "none", value: 0 },
            },
          },
          tooltip: {
            style: { fontSize: "12px" },
            y: {
              formatter: function (t) {
                return t + " times";
              },
            },
          },
          colors: [
            KTUtil.getCssVariableValue("--kt-primary"),
            KTUtil.getCssVariableValue("--kt-danger"),
          ],
          grid: {
            borderColor: KTUtil.getCssVariableValue("--kt-gray-200"),
            strokeDashArray: 4,
            yaxis: { lines: { show: !0 } },
          },
        },
        u = new ApexCharts(i, o),
        l = !1,
        _ = document.querySelector(t);
      !0 === s &&
        setTimeout(function () {
          u.render(), (l = !0);
        }, 500),
        _.addEventListener("shown.bs.tab", function (t) {
          0 == l && (u.render(), (l = !0));
        });
    }
  };
  return {
    init: function () {
      tt(
        "#kt_security_summary_tab",
        "#kt_security_sessions",
        <?php echo log_graph(1); ?>,
        <?php echo log_graph(0); ?>,
        !0
      );
    },
  };
})();
KTUtil.onDOMContentLoaded(function () {
  KTAccountSecuritySummary2.init();
});

</script>

