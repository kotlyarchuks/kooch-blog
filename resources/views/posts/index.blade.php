@foreach($posts as $post)
    <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
@endforeach