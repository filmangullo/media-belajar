<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Menambah File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('store.file', $forum_id )}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="modal-body">
          <p>Selamat Menambah File Pertemuan/Forum anda..?<br /> file yang akan anda tambahakan tidak berupa file yang langsung terbuka pada pertemuan melainkan harus di download terlebih dahulu, oleh user.</p>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">File Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="fileX" name="file" onchange="myFile()" required>
              <label class="custom-file-label" for="file"><span id="nameFileX">Choose file</span></label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
      </form>
</div>

<script>
    function myFile() {
      var xfile = document.getElementById("fileX").files[0].name;
      document.getElementById("nameFileX").innerHTML = xfile;
    }

</script>
