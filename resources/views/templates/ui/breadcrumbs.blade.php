@if (Breadcrumbs::exists())
<nav aria-label="Breadcrumb" class="py-4">
    <div class="my-container">
        <ol class="flex flex-wrap items-center gap-2 text-sm text-gray-500">
            @foreach (Breadcrumbs::generate() as $breadcrumb)
                <li class="flex items-center gap-2">
                    @if (!$loop->first)
                        <span class="text-gray-400">/</span>
                    @endif
                    @if ($breadcrumb->url && !$loop->last)
                        <a href="{{ $breadcrumb->url }}" class="hover:text-blue-600 transition-colors duration-200">
                            {{ $breadcrumb->title }}
                        </a>
                    @else
                        <span class="font-medium text-gray-900">
                            {{ $breadcrumb->title }}
                        </span>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</nav>
@endif