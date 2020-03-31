<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Edit Soal Kuis</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="modal-body">
      <form action="{{ route('update_soal.kuispanel', $kuis->id )}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-12">
          <label for="w3mission">Soal : </label>
          <textarea name="soal" rows="4" cols="46" required>{{ $kuis->soal }}</textarea>
        </div>
        <div class="col-md-12">
          <label for="w3mission">Option - A : </label>
          <textarea name="option_a" rows="2" cols="46" required>{{ $kuis->pilihan_a }}</textarea>
        </div>
        <div class="col-md-12">
          <label for="w3mission">Option - B : </label>
          <textarea name="option_b" rows="2" cols="46" required>{{ $kuis->pilihan_b }}</textarea>
        </div>
        <div class="col-md-12">
          <label for="w3mission">Option - C : </label>
          <textarea name="option_c" rows="2" cols="46" required>{{ $kuis->pilihan_c }}</textarea>
        </div>
        <div class="col-md-12">
          <label for="w3mission">Option - D : </label>
          <textarea name="option_d" rows="2" cols="46" required>{{ $kuis->pilihan_d }}</textarea>
        </div>
        <div class="col-md-12">
          <label for="w3mission">Option - E : </label>
          <textarea name="option_e" rows="2" cols="46" required>{{ $kuis->pilihan_e }}</textarea>
        </div>
        <div class="col-md-12 form-group">
          <label for="w3mission">Jawaban </label>
          <select name="jawaban" class="form-control">
            <option value="a" {{ $kuis->jawaban == 'a' ? "selected" : ""}}>A</option>
            <option value="b" {{ $kuis->jawaban == 'b' ? "selected" : ""}}>B</option>
            <option value="c" {{ $kuis->jawaban == 'c' ? "selected" : ""}}>C</option>
            <option value="d" {{ $kuis->jawaban == 'd' ? "selected" : ""}}>D</option>
            <option value="e" {{ $kuis->jawaban == 'e' ? "selected" : ""}}>E</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
</div>
