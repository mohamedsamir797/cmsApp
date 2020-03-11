<div class="comment-form-wrap pt-5">
    <h3 class="mb-5">Leave a comment</h3>
    <form action="{{ route('comments.store',[$post->id]) }}" method="post" class="p-5 bg-light">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div class="form-group">
            <label for="comment">Comment</label>
            <input type="text" class="form-control" name="comment">
        </div>

        <div class="form-group">
            <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
        </div>

    </form>
</div>