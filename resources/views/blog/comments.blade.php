<hr>

@if ($post->comments->count())

<h2>Comments ( {{$post->comments->count()}} )</h2>

<hr>

<div id="comments">
@foreach ($post->comments as $comment)
    <div class="comment">
        <h3>{{$comment->name}} <small style="font-size: 16px;">( {{$comment->created_at->diffForHumans()}} )</small></h3>
        <p>{{$comment->body}}</p>
    </div>
@endforeach
</div>

<br>

@endif

<h2>Leave a Comment</h2>

<hr>

<form action="/post/{{ $post->id }}/comments" method="post" class="probootstrap-form mb-5">
{{ csrf_field() }}
<div class="row">
    <div class="col-md-6">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    </div>
</div>
<div class="form-group">
    <label for="comment">Comment</label>
    <textarea rows="3" class="form-control" id="comment" name="comment" required></textarea>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Add Comment">
</div>
</form>

{{-- <h2><a href="#disqus_thread" class="text-dark">Comments</a></h2>
<div id="disqus_thread"></div> --}}