<?php if (validation_errors()): ?>
  <div class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" style="z-index: 999999; position: fixed; right: 1.5rem; bottom: 3.5rem">
    <div class="toast-header">
      <strong class="mr-auto">Gagal!</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      <?= validation_errors(); ?>
    </div>
  </div>
<?php endif ?>

<div class="container p-3">
	<div class="row mb-2">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h3 class="m-0"><i class="fas fa-fw fa-edit"></i> Ubah Materi</h3>
				</div>
		  	<div class="card-body">
					<form action="<?= base_url('materi/editMateri/' . $materi['id_materi']); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="judul_materi">Judul Materi</label>
							<input type="text" id="judul_materi" class="form-control <?= (form_error('judul_materi')) ? 'is-invalid' : ''; ?>" name="judul_materi" required value="<?= (form_error('judul_materi')) ? set_value('judul_materi') : $materi['judul_materi']; ?>">
							<div class="invalid-feedback">
	              <?= form_error('judul_materi'); ?>
	            </div>
						</div>
						<div class="form-group">
							<label for="deskripsi_materi">Deskripsi Materi</label>
							<textarea id="deskripsi_materi" class="form-control <?= (form_error('deskripsi_materi')) ? 'is-invalid' : ''; ?>" name="deskripsi_materi" required><?= (form_error('deskripsi_materi')) ? set_value('deskripsi_materi') : $materi['deskripsi_materi']; ?></textarea>
							<div class="invalid-feedback">
	              <?= form_error('deskripsi_materi'); ?>
	            </div>
						</div>
						<div class="form-group">
							<label for="urutan_materi">Urutan Materi</label>
							<input type="text" id="urutan_materi" class="form-control <?= (form_error('urutan_materi')) ? 'is-invalid' : ''; ?>" name="urutan_materi" required value="<?= (form_error('urutan_materi')) ? set_value('urutan_materi') : $materi['urutan_materi']; ?>">
							<div class="invalid-feedback">
	              <?= form_error('urutan_materi'); ?>
	            </div>
						</div>
						<div class="form-group">
					    <label for="video_materi">Video Materi</label> <br>
					    <div id="video_preview_container">
				        <video width="320" height="240" controls>
							    <source src="<?= base_url('assets/video/video_materi/' . $materi['video_materi']); ?>">
								</video>
					    </div>
					    <br>
						</div>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text">Upload</span>
						  </div>
						  <div class="custom-file">
						    <input type="file" class="custom-file-input" id="video_materi" aria-describedby="video_materi" id="video_materi" name="video_materi">
						    <label class="custom-file-label" for="video_materi">Pilih file</label>
						  </div>
						</div>
						<div class="form-group text-right">
							<a href="javascript:history.back()" class="btn btn-danger btn-cancel" data-nama="Ubah Materi"><i class="fas fa-fw fa-times"></i> Batal</a>
							<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
$(document).ready(function() {
  $('#video_materi').on('change', function(event) {
      var file = event.target.files[0];
      var $videoPreviewContainer = $('#video_preview_container');

      if (file && file.type.startsWith('video/')) {
          var videoURL = URL.createObjectURL(file);

          // Clear existing content in the preview container
          $videoPreviewContainer.empty();

          // Create video element
          var $videoElement = $('<video>', {
              width: 320,
              height: 240,
              controls: true
          });

          // Create source element and set the video URL
          var $sourceElement = $('<source>', {
              src: videoURL,
              type: file.type
          });

          // Append source element to video element
          $videoElement.append($sourceElement);

          // Append video element to preview container
          $videoPreviewContainer.append($videoElement);
      }
  });
});
</script>