<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Edit Forum</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('updateForum.courses', $query->id )}}" method="post">
    {{ csrf_field() }}
    <div class="modal-body">
        <p>Selamat Mengubah Pertemuan/Forum anda..?.</p>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Forum</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Forum" aria-describedby="namaHelp" value="{{ $query->nama }}">
            <small id="namaHelp" class="form-text text-muted">Harap penggunaan : Forum / Pertemuan + Kuis + Tugas</small>
        </div>
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
</div>
