<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Menambah File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('upload_file.tugaspanel', $forum->id )}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="modal-body">
          <p>Selamat Menambah File Pertemuan/Forum anda..?<br /> file yang akan anda tambahakan tidak berupa file yang langsung terbuka pada pertemuan melainkan harus di download terlebih dahulu, oleh user.</p>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">File Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="file" name="file" onchange="myFunction()" required>
              <label class="custom-file-label" for="file">Choose file</label>
            </div>
          </div>

          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="name">File Name&nbsp;&nbsp;</span>
              </div>
              <input type="text" name="name" id="nameFile" class="form-control" required>
          </div>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Keterangan</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" name="keterangan" ></textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
      </form>
</div>

<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("file").files[0].name;
  document.getElementById("nameFile").value = x;
}
</script>
