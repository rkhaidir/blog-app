<x-app-layout :title="$post->title">
  <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px">
    <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
    <h1 class="text-4xl font-bold text-left text-gray-800">
      {{ $post->title }}
    </h1>
    <div class="mt-2 flex justify-between items-center">
      <div class="flex py-5 text-base items-center">
        <x-posts.author :author="$post->author" size="md" />
        <span class="text-gray-500 text-sm">| {{ $post->getReadingTime() }} min read</span>
      </div>
      <div class="flex items-center">
        <span class="text-gray-500 mr-2">{{ $post->published_at->diffForHumans() }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor" class="w-5 h-5 text-gray-500">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
    </div>

    <div class="article-actions-bar my-6 flex text-sm items-center justify-between border-t border-b border-gray-100 py-4 px-2">
      <div class="flex items-center">
        <livewire:like-button :key="'like-' . $post->id" :$post />
      </div>
      <div>
        <div class="flex items-center">
          
        </div>
      </div>
    </div>

    <div class="article-content py-3 text-gray-800 text-lg prose text-justify">
      {!! $content !!}
    </div>

    <hr />

    <div class="w-full">
      <div class="flex justify-between gap-2 mt-16 mx-auto">
        <div class="flex w-32 justify-start">
          @if ($post->back === null)
            
          @else
            <a href="{{ route('posts.show', $post->back) }}" class="bg-gray-300 hover:bg-gray-500 active:bg-gray-300 px-4 py-2 rounded-md">
              Sebelumnya
            </a>
          @endif
        </div>
        <div class="flex w-64 justify-center">
          <span class="font-bold">{{ $post->title }}</span>
        </div>
        <div class="flex w-32 justify-end">
          @if ($post->next === null)
            
          @else
            <a href="{{ route('posts.show', $post->next) }}" class="bg-sky-950 hover:bg-sky-800 active:bg-sky-950 px-4 py-2 rounded-md text-white">
              Selanjutnya
            </a>
          @endif
        </div>
      </div>
    </div>

    <div class="flex items-center space-x-4 mt-10">
      @foreach ($post->categories as $category)
        <x-posts.category-badge :category="$category" />
      @endforeach
    </div>

    <livewire:post-comments :key="'comments' . $post->id" :$post />
  </article>
</x-app-layout>