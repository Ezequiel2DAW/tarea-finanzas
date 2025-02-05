<div class="ml-10 flex items-baseline space-x-4">
    @foreach ($links as $title => $link)
        @if (request()->is($link))
            <a href="{{$link}}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">{{$title}}</a>
        @else
            <a href="{{$link}}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" aria-current="page">{{$title}}</a>
        @endif
    @endforeach
</div>