<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Menambah Deskripsi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('store.deskripsi', $forum_id )}}" method="post">
      {{ csrf_field() }}
      <div class="modal-body">
          <p>Selamat Membuat deskripsi Pertemuan/Forum anda..?.</p>
          <textarea id="deskripsi" name="deskripsi" rows="4" cols="50" required></textarea>
        </form>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
        </div>
    </div>