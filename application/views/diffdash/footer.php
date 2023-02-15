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
	<script src="<?php echo base_url() ?>assets/vendor/select2-4.0.13/js/select2.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/sweetalert2-11.7.1/js/sweetalert2.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/toastr/toastr.js"></script>
	<script src="<?php echo base_url() ?>assets/scripts/common.js"></script>
	<script>
		$('.swal_delete').click(function(){
		var href = $(this).attr("href");
		var id = $(this).attr("id");
		console.log(id);
		console.log(href);
		Swal.fire({
			title: 'Anda yakin akan menghapus?',
			showCancelButton: true,
			confirmButtonText: 'Hapus',
			}).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.isConfirmed) {
				$.ajax({
				url: href+id,
				type: 'POST',
				data : {id: id},
				success: function(data) {
					Swal.fire('Berhasil Menghapus Data','','success').then(function(){location.reload();});
				}
			});
			}
			});
	});
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
			document.querySelector('#'+action).scrollIntoView();
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

		// notification popup
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-right';
		toastr.options.showDuration = 1000;
		//toastr['info']('Hello, welcome to DiffDash, a unique admin dashboard.');

	

	});

	// Fungsi SWAL hapus
	$('.tombol-hapus').on('click', function (e){
		e.preventDefault();
		const href = $(this).attr('href')

		Swal.fire({
			title: 'Apakah anda yakin',
			text: "data kunjungan akan dihapus",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus'
		}).then((result) => {
			if (result.isConfirmed) {
				Swal.fire(
				'Data Kunjungan!',
				'Berhasil Dihapus',
				'success'
				).then(location.reload());
				document.location.href = href;
				
			}
		})		
	});
	</script>
</body>

</html>
