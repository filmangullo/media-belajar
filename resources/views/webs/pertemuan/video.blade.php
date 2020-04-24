<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Menambah Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('store.video', $forum_id )}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="modal-body">
          <p>Selamat Menambah Video Pertemuan/Forum anda..?<br /> Video yang akan anda tambahakan berupa video yang langsung terbuka pada pertemuan.?</p>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Title</span>
            </div>
            <input type="text" class="form-control" placeholder="Title" aria-label="Title" name="title" aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">File Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="fileX" name="video" onchange="myFile()" required>
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
