@props(['comment','discount'])
<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            @if (isset(auth()->user()->avatar))
                <img class="rounded-xl" src="/images/{{ auth()->user()->avatar }}" alt=""
                     width="40" height="40">
            @else
                <img src="{{ URL::to('/') }}/images/user-default.png" alt="{{ $discount->author->username }} avatar" width="35" height="35" class="rounded-xl mr-2">
            @endif
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->username }}</h3>

                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
