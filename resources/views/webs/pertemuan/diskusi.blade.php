<form action="{{ route('store.diskusi', $forum->id) }}" method="post">
    {{ csrf_field() }}
    <div class="mt-10">
        <textarea class="single-textarea" name="diskusi" placeholder="Message"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'"
            required></textarea>
    </div>
    <div class="button-group-area mt-40 text-left">
        <button type="submit" class="genric-btn primary circle arrow">Submite<span
                class="lnr lnr-location"></span></button>
    </div>
</form>