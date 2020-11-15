<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Apakah anda yakin untuk menghapus diskusi ini..?</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('destroy.diskusi', $query->id )}}" method="post">
      @method('delete')
      @csrf
      <div class="modal-body" >
        <div class="row">

          <div class="col-md-6">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Tidak</button>
          </div>
          <div class="col-md-6" style="float:right;">
            <button type="submit" class="btn btn-danger btn-block">Ya</button>
          </div>
        </div>
        
        
       
      </div>
      </form>
    </div>
</div>
