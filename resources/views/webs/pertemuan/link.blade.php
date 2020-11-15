<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Menambah Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('store.link', $forum_id )}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="modal-body">
          <p>Selamat Menambah Link Pertemuan/Forum anda..?<br /> Link yang di tambahkan merupakan embed yang langsung terbuka pada pertemuan.?</p>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Title</span>
            </div>
            <input type="text" class="form-control" placeholder="Title" aria-label="Title" name="title" aria-describedby="basic-addon1" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Link</span>
            </div>
            <input type="text" class="form-control" placeholder="Link" aria-label="Link" name="link" aria-describedby="basic-addon1" required>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
      </form>
</div>

