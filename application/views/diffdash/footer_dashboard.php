</div>
		</div>
		<!-- END MAIN CONTENT -->

<div class="clearfix"></div>
<footer>
			<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/select2-4.0.13/js/select2.min.js"></script>
	<!-- <script src="<?php echo base_url() ?>assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/chartist-plugin-axistitle/chartist-plugin-axistitle.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/chartist-plugin-legend-latest/chartist-plugin-legend.js"></script> -->
	<script src="<?php echo base_url() ?>assets/vendor/toastr/toastr.js"></script>
	<script src="<?php echo base_url() ?>assets/scripts/common.js"></script>
	<script>
	try{
		var iframe = document.getElementsByClassName("jframe");
		iframe[0].onload = function(){
			iframe[0].style.height = iframe[0].contentWindow.document.body.scrollHeight + 'px';
		}
		iframe[1].onload = function(){
			iframe[1].style.height = iframe[1].contentWindow.document.body.scrollHeight + 'px';
		}
	}
	catch(e){}
	function loadprodi(){
		$("#id_fakultas").change(function(){
			var getfakultas = $(this).val();
			$.ajax({
				method : "POST",
				dataType : "JSON",
				url : "<?= base_url(); ?>pemustaka/getdataprodi",
				data : {dfakultas : getfakultas},
				success : function(data){
					console.log(data);
					$("#id_prodi").find('option').not(':first').remove();
					$.each(data,function(index,data){
						$("#id_prodi").append('<option value="'+data['id_prodi']+'">'+data['prodi']+'</option>');
					});
				}
			});
		});
	}

	function sendprodi(){
		$("#submit-mandiri").click(function(){
			var getprodi = $("#id_prodi").val();
			$.ajax({
				method : "POST",
				dataType : "JSON",
				url : "<?= base_url(); ?>pemustaka/getkodeprodi",
				data : {dprodi : getprodi},
				success : function(data){
					console.log(data);
					$("#iframe-mandiri").removeAttr('src');
					$("#iframe-mandiri").attr('src', "<?php echo base_url() ?>pemustaka/mandiri_prodi/"+data);
				}
			});
		});
		$("#submit-sirkulasi").click(function(){
			var getprodi = $("#id_prodi").val();
			$.ajax({
				method : "POST",
				dataType : "JSON",
				url : "<?= base_url(); ?>pemustaka/getkodeprodi",
				data : {dprodi : getprodi},
				success : function(data){
					console.log(data);
					$("#iframe-sirkulasi").removeAttr('src');
					$("#iframe-sirkulasi").attr('src', "<?php echo base_url() ?>pemustaka/sirkulasi_prodi/"+data);
				}
			});
		});
	}
	// function injectJS(){    
	// 	var frame =  $('iframe');
	// 	var contents =  frame.contents();
	// 	var body = contents.find('body').attr("oncontextmenu", "return false");
	// 	var body = contents.find('body').append('<div>New Div</div>');    
	// }
	// ---on load---
	$(function() {
		$('.custom-select').select2();
		loadprodi();
		sendprodi();
		var pathname = window.location.pathname;
		var segments = pathname.split( '/' );
		var action = segments[2];
		var classis = segments[3];
		console.log(pathname);
		console.log(action);
		console.log(classis);
		// var akses = $this->session->userdata('akses');
		// console.log(akses);

	// ---script untuk navbar---
		if(action!="" & classis!=""){
			//$("li").removeClass("active");
			$("ul#"+action).attr("aria-expanded","true");
			$("ul#"+action).addClass("collapse in");
			$("ul#"+action).parents("li").addClass("active");
			//$("ul#"+action).children("#"+classis).addClass("active");
			$("ul#"+action).children("#"+classis).attr("style","background:#F1F2F1");
		}else{
			$("li#home").addClass("active");
		}

		if(action=="user" || classis=="user"){
			$("li#user").addClass("active");
		}else if(classis=="home"){
			$("li#home").addClass("active");
		}

	//---script open file---
		$('.openfile').click(function() {
			let myIframe = document.getElementById("myIframe");
			var BASE_URL = "<?php echo base_url('assets/files/');?>";
			urlFile = BASE_URL+$(this).attr("value")+"#view=fitH";
			//alert(urlFile);
			myIframe.src = urlFile;
        });

		// sparkline charts
		var sparklineNumberChart = function() {

			var params = {
				width: '140px',
				height: '30px',
				lineWidth: '2',
				lineColor: '#20B2AA',
				fillColor: false,
				spotRadius: '2',
				spotColor: false,
				minSpotColor: false,
				maxSpotColor: false,
				disableInteraction: false
			};

			$('#number-chart1').sparkline('html', params);
			$('#number-chart2').sparkline('html', params);
			$('#number-chart3').sparkline('html', params);
			$('#number-chart4').sparkline('html', params);
		};

		sparklineNumberChart();


		// traffic sources
		var dataPie = {
			series: [45, 25, 30]
		};

		var labels = ['Direct', 'Organic', 'Referral'];
		var sum = function(a, b) {
			return a + b;
		};

		// new Chartist.Pie('#demo-pie-chart', dataPie, {
		// 	height: "270px",
		// 	labelInterpolationFnc: function(value, idx) {
		// 		var percentage = Math.round(value / dataPie.series.reduce(sum) * 100) + '%';
		// 		return labels[idx] + ' (' + percentage + ')';
		// 	}
		// });


		// progress bars
		$('.progress .progress-bar').progressbar({
			display_text: 'none'
		});

		// line chart
		var data = {
			labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
			series: [
				[200, 380, 350, 480, 410, 450, 550],
			]
		};

		var options = {
			height: "200px",
			showPoint: true,
			showArea: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
			chartPadding: {
				top: 0,
				right: 0,
				bottom: 30,
				left: 30
			},
			// plugins: [
			// 	Chartist.plugins.tooltip({
			// 		appendToBody: true
			// 	}),
			// 	Chartist.plugins.ctAxisTitle({
			// 		axisX: {
			// 			axisTitle: 'Day',
			// 			axisClass: 'ct-axis-title',
			// 			offset: {
			// 				x: 0,
			// 				y: 50
			// 			},
			// 			textAnchor: 'middle'
			// 		},
			// 		axisY: {
			// 			axisTitle: 'Reach',
			// 			axisClass: 'ct-axis-title',
			// 			offset: {
			// 				x: 0,
			// 				y: -10
			// 			},
			// 		}
			// 	})
			// ]
		};

		//new Chartist.Line('#demo-line-chart', data, options);


		// sales performance chart
		var sparklineSalesPerformance = function() {

			var lastWeekData = [142, 164, 298, 384, 232, 269, 211];
			var currentWeekData = [352, 267, 373, 222, 533, 111, 60];

			$('#chart-sales-performance').sparkline(lastWeekData, {
				fillColor: 'rgba(90, 90, 90, 0.1)',
				lineColor: '#5A5A5A',
				width: '' + $('#chart-sales-performance').innerWidth() + '',
				height: '100px',
				lineWidth: '2',
				spotColor: false,
				minSpotColor: false,
				maxSpotColor: false,
				chartRangeMin: 0,
				chartRangeMax: 1000
			});

			$('#chart-sales-performance').sparkline(currentWeekData, {
				composite: true,
				fillColor: 'rgba(60, 137, 218, 0.1)',
				lineColor: '#3C89DA',
				lineWidth: '2',
				spotColor: false,
				minSpotColor: false,
				maxSpotColor: false,
				chartRangeMin: 0,
				chartRangeMax: 1000
			});
		}

		sparklineSalesPerformance();

		var sparkResize;
		$(window).on('resize', function() {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineSalesPerformance, 200);
		});


		// top products
		var dataStackedBar = {
			labels: ['Q1', 'Q2', 'Q3'],
			series: [
				[800000, 1200000, 1400000],
				[200000, 400000, 500000],
				[100000, 200000, 400000]
			]
		};

		// new Chartist.Bar('#chart-top-products', dataStackedBar, {
		// 	height: "250px",
		// 	stackBars: true,
		// 	axisX: {
		// 		showGrid: false
		// 	},
		// 	axisY: {
		// 		labelInterpolationFnc: function(value) {
		// 			return (value / 1000) + 'k';
		// 		}
		// 	},
		// 	plugins: [
		// 		Chartist.plugins.tooltip({
		// 			appendToBody: true
		// 		}),
		// 		Chartist.plugins.legend({
		// 			legendNames: ['Phone', 'Laptop', 'PC']
		// 		})
		// 	]
		// }).on('draw', function(data) {
		// 	if (data.type === 'bar') {
		// 		data.element.attr({
		// 			style: 'stroke-width: 30px'
		// 		});
		// 	}
		// });


		// notification popup
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-right';
		toastr.options.showDuration = 1000;
		toastr['info']('Selamat datang di Website Akpus');

	});
	</script>
</body>

</html>