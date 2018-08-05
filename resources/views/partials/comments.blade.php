@foreach($comments as $comment)
    <!-- Single Comment -->
    <div class="media mb-4">

        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">

        <div class="media-body">

            <em>{{ $comment->created_at->format('d/m/Y') }}</em>
            <h5 class="mt-0"><a href="#">{{ $comment->user->name }}</a></h5>
            <p>{{ $comment->content }}</p>

            @if(!Auth::guest() && ($comment->user_id == Auth::user()->id || auth()->user()->isAdmin()) )

                <!-- Edit Form -->
                <form action="{{ route('comment.update', $post->slug) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <textarea class="form-control" name="content">{{ $comment->content }}</textarea>
                    </div>
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <input type="submit" class="btn btn-primary btn-sm" value="Editer">
                </form>

                <!-- Delete Form -->
                <form action="{{ route('comment.destroy', $post->slug) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" value="{{ $comment->id }}" name="comment_id">
                    <input type="submit" class="btn btn-danger btn-sm" value="Suprimer">
                </form>

            @endif

        </div>

    </div>
@endforeach