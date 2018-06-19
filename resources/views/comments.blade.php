<div class="comments">
    @foreach($news->comments as $comment)
        <div class="comment">
            <a href="{{ url('/user/' . $comment->user_id) }}">
                <img class="header-user-photo" src="{{ url($comment->user->getMainImage()->path) }}" alt="">
            </a>
            <div class="comment-user-info">
                <h5>
                    <a href="{{ url('/user/' . $comment->user_id) }}">
                        {{ $comment->user->name . ' ' . $comment->user->surname }}
                    </a>
                </h5>
                <p>{{ $comment->text }}</p>
            </div>
        </div>
        <hr/>
    @endforeach
    @auth
        <form id="comment-form">
            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
            <center><textarea id="comment_text" name="comment_text" placeholder="Написать комментарий..."></textarea></center>
            <button class="send-comment">Отправить</button>
        </form>
    @endauth
</div>