	<footer class="footer mt-auto bg-white">
		<div class="container">
			<div class="row justify-content-center text-center align-items-center my-3">
				<div class="col-lg">
					<p class="text-dark p-0 m-0">Hak Cipta &copy; 2024 Kursus Online.</p>
				</div>
			</div>
		</div>
	</footer>

	<a class="scroll-to-top rounded" href="#page-top">
	  <i class="fas fa-angle-up"></i>
	</a>
	<div class="text-center flashdata" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
	<div class="text-center flashdata-success" data-flashdata="<?= $this->session->flashdata('message-success'); ?>"></div>
	<div class="text-center flashdata-failed" data-flashdata="<?= $this->session->flashdata('message-failed'); ?>"></div>
	<!-- ./Sweet Alert 2 -->
</body>
</html>