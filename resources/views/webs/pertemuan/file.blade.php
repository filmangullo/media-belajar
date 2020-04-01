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
          <input type="file" name="file" value="">
        </form>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
</div>
