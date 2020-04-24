<form action="{{ route('store.diskusi', $forum->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="mt-10">
        <textarea class="single-textarea" name="diskusi" placeholder="Message"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'"
            required style="border:1px solid aqua"></textarea>
    </div>

    <div class="input-group mt-20">
        <div class="input-group-prepend">
          <span class="input-group-text">Lampirkan File</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="file" name="file" onchange="myFunction()">
          <label class="custom-file-label" for="file"><span id="nameFile">Pilih File</span></label>
        </div>
      </div>
    <div class="button-group-area mt-40 text-left">
        <button type="submit" class="genric-btn primary circle arrow">Submite<span
                class="lnr lnr-location"></span></button>
    </div>
</form>
<script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("file").files[0].name;
      document.getElementById("nameFile").innerHTML = x;
    }
</script>