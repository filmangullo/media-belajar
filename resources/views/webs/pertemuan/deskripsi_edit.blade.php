<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Form Edit Deskripsi</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('update.deskripsi', $query->id )}}" method="post">
    {{ csrf_field() }}
    <div class="modal-body">
        <p>Selamat Mengubah deskripsi Pertemuan/Forum anda..?.</p>
        <textarea id="deskripsi" name="deskripsi" rows="10" cols="48" required>{{ $query->deskripsi }}</textarea>
      </form>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>
