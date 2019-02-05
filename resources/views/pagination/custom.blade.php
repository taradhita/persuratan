<ul class="pagination pg-primary">
	@if ($paginator->onFirstPage())
        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
    @else
	<li class="page-item">
		<a class="page-link" href="#" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
			<span class="sr-only">Previous</span>
		</a>
	</li>
	@endif
		
	@foreach ($elements as $element)
		@if (is_string($element))
            <li class="page-item disabled"><span>{{ $element }}</span></li>
        @endif
		@if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
	@endforeach

	<!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <li class="page-item">
		<a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
			<span class="sr-only">Next</span>
		</a>
	</li>
    @else
        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
    @endif

	
</ul>