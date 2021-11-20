{{-- <x-layouts.app> --}}
<x-app-layout>
<form action="{{ route('posts.store') }}" method="POST" class="form" >
    @csrf
    <div class="field">
        <label class="label"> Your Post</label>
        <div class="control">
          <textarea style="width:50%;height:100px"class=" @error('content_post')is-danger @enderror" name="content_post" placeholder="write here...">{{ old('content_post') }}</textarea>
          <input type="hidden" name="content" id="content">
        </div>
        @error('content_post')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
        <div class="control">
            <button  class="button is-dark" style="color: #eb640a;align:center" >Create Post</button>
          </div><br>
      </div>
</form>
{{-- </x-layouts.app> --}}
</x-app-layout>
