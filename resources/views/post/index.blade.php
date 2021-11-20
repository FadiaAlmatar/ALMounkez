{{-- <x-layouts.app> --}}
    <x-app-layout>
    <div class="container" style="height: 100%;margin:auto;margin-top:20px" >
        @foreach ($posts as $post )
        <a href="{{route('posts.show',$post)}}" style="text-decoration: none">
        <div class="card" style="display:inline-block">
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
    </div>
{{-- </x-layouts.app> --}}
</x-app-layout>
