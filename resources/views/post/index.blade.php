<x-layouts.app>
    <section style="height: 100%;width:50%;margin:auto;margin-top:20px" class="form">
        @foreach ($posts as $post )
        <a href="{{route('posts.show',$post)}}" style="text-decoration: none">
        <div class="card" style="width: 200px">
            <div class="card-content">
              <div class="media">
                <div class="media-content">
                  <p class="title is-4">{{$post->user->name}} </p>
                </div>
              </div>
              <div class="content">
                  <p> {{$post->content_post}}</p>
                <br>
                <time datetime="2016-1-1">{{$post->created_at}}</time>
              </div>
            </div>
        </div>
        </a>
        @endforeach
    </section>
</x-layouts.app>
