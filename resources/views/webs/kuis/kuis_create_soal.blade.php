<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Buat Soal Kuis</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="modal-body">
      <form action="{{ route('store_soal.kuispanel', $forum->id )}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-12">
          <label for="w3mission">Soal : </label>
          <textarea name="soal" rows="4" style="width:100%" required></textarea>
        </div>
        <div class="col-md-12">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="imgInp" name="img" accept="image/*">
            <label class="custom-file-label" for="imgInp">Lampirkan Gambar</label>
          </div>
          <img id="blah" src="#" alt="your image" style="width:100%" />
        </div>
        <div class="col-md-12">
          <label for="w3mission">Option - A : </label>
          <textarea name="option_a" rows="2" style="width:100%" required></textarea>
        </div>
        <div class="col-md-12">
          <label for="w3mission">Option - B : </label>
          <textarea name="option_b" rows="2" style="width:100%" required></textarea>
        </div>
        <div class="col-md-12">
          <label for="w3mission">Option - C : </label>
          <textarea name="option_c" rows="2" style="width:100%" required></textarea>
        </div>
        <div class="col-md-12">
          <label for="w3mission">Option - D : </label>
          <textarea name="option_d" rows="2" style="width:100%" required></textarea>
        </div>
        <div class="col-md-12">
          <label for="w3mission">Option - E : </label>
          <textarea name="option_e" rows="2" style="width:100%" required></textarea>
        </div>
        <div class="col-md-12 form-group">
          <label for="w3mission">Jawaban </label>
          <select name="jawaban" class="form-control">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
            <option value="e">E</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
</div>

<script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0]) {
  var reader = new FileReader();

  reader.onload = function(e) {
    $('#blah').attr('src', e.target.result);
  }

  reader.readAsDataURL(input.files[0]); // convert to base64 string
}
}

$("#imgInp").change(function() {
readURL(this);
});
</script>
