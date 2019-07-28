<div class="box-comment">
    <!-- User image -->
    <img class="img-circle img-sm" src="{{asset("uploads/users/".$comment->user->image)}}" alt="User Image">

    <div class="comment-text">
                      <span class="username">
                        {{$comment->user->name}}
                      </span>
       {{$comment->content}}
    </div>

</div>