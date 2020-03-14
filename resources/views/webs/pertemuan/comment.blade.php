<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Comments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('store.diskusicomment', $query->id )}}" method="post">
      {{ csrf_field() }}
      <div class="modal-body">
          <p>{{ $query->diskusi }}</p>
          <textarea id="deskripsi" name="comment" rows="4" cols="50" required></textarea>
        </form>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
</div>
