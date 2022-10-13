<!--begin::Amd charts Javascript(used by this page)-->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script>
	var hostUrl = "../assets/index.html";
</script>



<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="../assets/plugins/global/plugins.bundle.js"></script>
<script src="../assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used by this page)-->
<script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(account overview page)-->
<script src="../assets/js/custom/apps/user-management/users/list/table.js"></script>
<script src="../assets/js/custom/apps/user-management/users/list/export-users.js"></script>
<script src="../assets/js/custom/apps/user-management/users/list/add.js"></script>
<script src="../assets/js/custom/pages/user-profile/followers.js"></script>
<script src="../assets/js/widgets.bundle.js"></script>
<script src="../assets/js/custom/widgets.js"></script>
<script src="../assets/js/custom/apps/chat/chat.js"></script>
<script src="../assets/js/custom/utilities/modals/create-project/type.js"></script>
<script src="../assets/js/custom/utilities/modals/create-project/budget.js"></script>
<script src="../assets/js/custom/utilities/modals/create-project/settings.js"></script>
<script src="../assets/js/custom/utilities/modals/create-project/team.js"></script>
<script src="../assets/js/custom/utilities/modals/create-project/targets.js"></script>
<script src="../assets/js/custom/utilities/modals/create-project/files.js"></script>
<script src="../assets/js/custom/utilities/modals/create-project/complete.js"></script>
<script src="../assets/js/custom/utilities/modals/create-project/main.js"></script>
<script src="../assets/js/custom/utilities/modals/create-app.js"></script>
<script src="../assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="../assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
<script src="../assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
<script src="../assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
<script src="../assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
<script src="../assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
<script src="../assets/js/custom/utilities/modals/users-search.js"></script>
<script src="../assets/js/custom/pages/social/feeds.js"></script>
<script src="../assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
<script src="../assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
<!--end::Custom Javascript-->

<!--begin::Custom Javascript(account.setting by this page)-->
<script src="../assets/js/custom/account/settings/signin-methods.js"></script>
<script src="../assets/js/custom/account/settings/profile-details.js"></script>
<script src="../assets/js/custom/account/settings/deactivate-account.js"></script>
<script src="../assets/js/custom/utilities/modals/two-factor-authentication.js"></script>


<!--begin::Custom Javascript(account.security by this page)-->
<script src="../assets/js/custom/account/security/security-summary.js"></script>
<script src="../assets/js/custom/account/security/license-usage.js"></script>

<!--begin::Custom Javascript(account.billing by this page)-->
<script src="../assets/js/custom/utilities/modals/new-card.js"></script>
<script src="../assets/js/custom/utilities/modals/new-address.js"></script>

<!--begin::Custom Javascript(account.referrals by this page)-->
<script src="../assets/js/custom/account/referrals/referral-program.js"></script>

<!--begin::Custom Javascript(account.logs by this page)-->
<script src="../assets/js/custom/account/api-keys/api-keys.js"></script>






<script>
	const Toast = Swal.mixin({
		toast: true,
		position: 'top',
		showConfirmButton: false,
		timer: 10000,
		width: '100%',
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})
</script>
<!--end::Custom Javascript-->
<!--end::Custom Javascript-->

<script>
	$('button[type="submit"]').click(function() {
		$(this).text("Processing...");
		$(this).prepend('<span class="spinner-border spinner-border-sm" role="status"></span> ');
	});
</script>
<?php include '../includes/ajax_calls.php' ?>

<?php
if (isset($profile_stats_graph_data)) {
	$profile_stats_graph_data = $profile_stats_graph_data;
} else {
	$profile_stats_graph_data = '[0,0,0,0]';
}
?>
<script>
	var KTWidgets = {
		init: function() {
			var e, t, a, o, r;
			(function() {
				var e = document.querySelectorAll(".profile_stats_chart");
				[].slice.call(e).map(function(e) {
					var t = parseInt(KTUtil.css(e, "height"));
					if (e) {
						var a = e.getAttribute("data-kt-chart-color"),
							o = KTUtil.getCssVariableValue("--kt-gray-800"),
							r = KTUtil.getCssVariableValue("--kt-gray-300"),
							s = KTUtil.getCssVariableValue("--kt-" + a),
							l = KTUtil.getCssVariableValue("--kt-" + a + "-light");
						new ApexCharts(e, {
							series: [{
								name: "Total",
								data: <?php echo $profile_stats_graph_data ?>
							}],
							chart: {
								fontFamily: "inherit",
								type: "area",
								height: t,
								toolbar: {
									show: !1
								},
								zoom: {
									enabled: !1
								},
								sparkline: {
									enabled: !0
								},
							},
							plotOptions: {},
							legend: {
								show: !1
							},
							dataLabels: {
								enabled: !1
							},
							fill: {
								type: "solid",
								opacity: 1
							},
							stroke: {
								curve: "smooth",
								show: !0,
								width: 3,
								colors: [s]
							},
							xaxis: {
								categories: ["Followers", "Following", "Tweet count", "Listed count"],
								//max: 500,
								axisBorder: {
									show: !1
								},
								axisTicks: {
									show: !1
								},
								labels: {
									show: !1,
									style: {
										colors: o,
										fontSize: "12px"
									}
								},
								crosshairs: {
									show: !1,
									position: "front",
									stroke: {
										color: r,
										width: 1,
										dashArray: 3
									},
								},
								tooltip: {
									enabled: !0,
									formatter: void 0,
									offsetY: 0,
									style: {
										fontSize: "12px"
									},
								},
							},
							yaxis: {
								min: 0,
								max: 60,
								labels: {
									show: !1,
									style: {
										colors: o,
										fontSize: "12px"
									}
								},
							},
							states: {
								normal: {
									filter: {
										type: "none",
										value: 0
									}
								},
								hover: {
									filter: {
										type: "none",
										value: 0
									}
								},
								active: {
									allowMultipleDataPointsSelection: !1,
									filter: {
										type: "none",
										value: 0
									},
								},
							},
							tooltip: {
								style: {
									fontSize: "12px"
								},
								y: {
									formatter: function(e) {
										return "&#x2116; " + e;
									},
								},
							},
							colors: [l],
							markers: {
								colors: [l],
								strokeColor: [s],
								strokeWidth: 3
							},
						}).render();
					}
				});
			})();
		},
	};
</script>

<?php
$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM engine_monitor WHERE user=:user");
$stmt->execute(['user' => $user['t_id']]);
$dt_1 = $stmt->fetchAll();
$likes = 0;
$tweets = 0;
$follow = 0;
foreach ($dt_1 as $row) {
	$cmd = $row['command'];
	$count = $row['count'];


	if ($cmd == 'like') {
		$likes += $count;
	}




	if ($cmd == 'follow') {
		$follow += $count;
	}



	if ($cmd == 'tweet') {
		$tweets += $count;
	}
}

$follow_perc = ($follow * 100) / 400;
$tweet_perc = ($tweets * 100) / 2400;
$like_perc = ($likes * 100) / 5000;
?>

<script>
	am5.ready(function() {
		// Create root element
		// https://www.amcharts.com/docs/v5/getting-started/#Root_element
		var root = am5.Root.new("kt_amcharts_5");

		// Set themes
		// https://www.amcharts.com/docs/v5/concepts/themes/
		root.setThemes([
			am5themes_Animated.new(root)
		]);

		// Create chart
		// https://www.amcharts.com/docs/v5/charts/radar-chart/
		var chart = root.container.children.push(am5radar.RadarChart.new(root, {
			panX: false,
			panY: false,
			wheelX: "panX",
			wheelY: "zoomX",
			innerRadius: am5.percent(20),
			startAngle: -90,
			endAngle: 180
		}));

		// Data
		var data = [{
			category: "Direct Messages",
			value: 15,
			full: 100,
			columnSettings: {
				fill: chart.get("colors").getIndex(0)
			}
		}, {
			category: "Follows",
			value: <?php echo $follow_perc ?>,
			full: 100,
			columnSettings: {
				fill: chart.get("colors").getIndex(1)
			}
		}, {
			category: "Tweets",
			value: <?php echo $tweet_perc ?>,
			full: 100,
			columnSettings: {
				fill: chart.get("colors").getIndex(2)
			}
		}, {
			category: "Likes",
			value: <?php echo $like_perc ?>,
			full: 100,
			columnSettings: {
				fill: chart.get("colors").getIndex(3)
			}
		}];

		// Add cursor
		// https://www.amcharts.com/docs/v5/charts/radar-chart/#Cursor
		var cursor = chart.set("cursor", am5radar.RadarCursor.new(root, {
			behavior: "zoomX"
		}));

		cursor.lineY.set("visible", false);

		// Create axes and their renderers
		// https://www.amcharts.com/docs/v5/charts/radar-chart/#Adding_axes
		var xRenderer = am5radar.AxisRendererCircular.new(root, {
			//minGridDistance: 50
		});

		xRenderer.labels.template.setAll({
			radius: 10
		});

		xRenderer.grid.template.setAll({
			forceHidden: true
		});

		var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
			renderer: xRenderer,
			min: 0,
			max: 100,
			strictMinMax: true,
			numberFormat: "#'%'",
			tooltip: am5.Tooltip.new(root, {})
		}));

		var yRenderer = am5radar.AxisRendererRadial.new(root, {
			minGridDistance: 20
		});

		yRenderer.labels.template.setAll({
			centerX: am5.p100,
			fontWeight: "500",
			fontSize: 18,
			templateField: "columnSettings"
		});

		yRenderer.grid.template.setAll({
			forceHidden: true
		});

		var yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
			categoryField: "category",
			renderer: yRenderer
		}));

		yAxis.data.setAll(data);

		// Create series
		// https://www.amcharts.com/docs/v5/charts/radar-chart/#Adding_series
		var series1 = chart.series.push(am5radar.RadarColumnSeries.new(root, {
			xAxis: xAxis,
			yAxis: yAxis,
			clustered: false,
			valueXField: "full",
			categoryYField: "category",
			fill: root.interfaceColors.get("alternativeBackground")
		}));

		series1.columns.template.setAll({
			width: am5.p100,
			fillOpacity: 0.08,
			strokeOpacity: 0,
			cornerRadius: 20
		});

		series1.data.setAll(data);

		var series2 = chart.series.push(am5radar.RadarColumnSeries.new(root, {
			xAxis: xAxis,
			yAxis: yAxis,
			clustered: false,
			valueXField: "value",
			categoryYField: "category"
		}));

		series2.columns.template.setAll({
			width: am5.p100,
			strokeOpacity: 0,
			tooltipText: "{category}: {valueX}%",
			cornerRadius: 20,
			templateField: "columnSettings"
		});

		series2.data.setAll(data);

		// Animate chart and series in
		// https://www.amcharts.com/docs/v5/concepts/animations/#Initial_animation
		series1.appear(1000);
		series2.appear(1000);
		chart.appear(1000, 100);
	}); // end am5.ready()
</script>

<script>
	var searchText = $("div[kt_tweet_text]").text(),

		// urls will be an array of URL matches
		urls = searchText.match(/(((ftp|https?):\/\/)[\-\w@:%_\+.~#?,&\/\/=]+)|((mailto:)?[_.\w-]+@([\w][\w\-]+\.)+[a-zA-Z]{2,3})/g);

	if (urls != null) {
		// you can then iterate through urls
		for (var i = 0, il = urls.length; i < il; i++) {
			$("div[kt_tweet_text]").text($("div[kt_tweet_text]").text().replace(urls[i], ""));
		}
	}
</script>