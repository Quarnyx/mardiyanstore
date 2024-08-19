<?php include 'layout/header.php' ?>

<body>

	<div id="page">

		<?php include 'layout/topbar.php' ?>
		<!-- /header -->

		<main>
			<?php include 'layout/content.php' ?>

		</main>
		<!-- /main -->

		<?php include 'layout/footer.php' ?>
		<!--/footer-->
	</div>
	<!-- page -->

	<div id="toTop"></div><!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="js/common_scripts.min.js"></script>
	<script src="js/main.js"></script>

	<!-- SPECIFIC SCRIPTS -->
	<script src="js/carousel-home.min.js"></script>
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/carousel_with_thumbs.js"></script>

	<!-- SPECIFIC SCRIPTS -->
	<script src="js/sticky_sidebar.min.js"></script>
	<script src="js/specific_listing.js"></script>
	<script>
		var user_id = '<?php echo $_SESSION['id_akun'] ?>';
		function loadCart() {
			$.ajax({
				url: 'layout/keranjang.php?id=' + user_id,
				type: 'GET',
				success: function (response) {
					$("#cart_box").html(response);
				},
				error: function (xhr, status, error) {
					console.error(xhr);
				}
			});
		}

		$(document).ready(function () {
			loadCart();
			$('#remove_cart').click(function () {
				$.ajax({
					url: 'process.php?act=remove_cart',
					type: 'POST',
					data: {
						id: $(this).attr('data-id')
					},
					success: function (response) {
						loadCart();
					},
					error: function (xhr, status, error) {
						console.error(xhr);
					}
				});
			});


		})
	</script>

</body>

</html>