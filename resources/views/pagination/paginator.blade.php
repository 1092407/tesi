@if ($paginator->lastPage() != 1)
<div class="w3-center w3-padding-32">
    <div class="w3-bar">
        
        <!-- Link alla prima pagina -->
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->url(1) }}" class="w3-bar-item w3-button w3-hover-black">&lt;&lt;</a> 
        @else
            <label class="w3-bar-item   inactive ">&lt;&lt;</label>
        @endif
        
        <!-- Link alla pagina precedente -->
        @if ($paginator->currentPage() != 1)
            <a href="{{ $paginator->previousPageUrl() }}" class="w3-bar-item w3-button w3-hover-black">&lt;</a> 
        @else
            <label class="w3-bar-item  inactive">&lt;</label> 
        @endif
        
        <label class="w3-bar-item link-static">{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }} </label>     
        <!-- Link alla pagina successiva -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="w3-bar-item w3-button w3-hover-black">&gt;</a> 
        @else
        <label class="w3-bar-item  inactive ">&gt;</label>
        @endif

        <!-- Link all'ultima pagina -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="w3-bar-item w3-button w3-hover-black">&gt;&gt;</a>
        @else
        <label class="w3-bar-item  inactive">&gt;&gt;</label>
        @endif
    </div>
</div>
@endif
