<div class="d-flex flex-row flex-shrink gap-2">
  <a href="{{ $items->previousPageUrl() }}" class="btn btn-primary text-light {{ $items->onFirstPage() ? 'disabled' : '' }}">&#8810;</a>
  @foreach ($items->getUrlRange(1, $items->lastPage()) as $page)
    @if ($loop->iteration == $items->currentPage())
      <a class="btn btn-primary disabled">{{ $loop->iteration }}</a>
    @else
      <a href="{{ $page }}" class="btn btn-primary">{{ $loop->iteration }}</a>
    @endif
  @endforeach
  <a href="{{ $items->nextPageUrl() }}" class="btn btn-primary text-light {{ $items->hasMorePages() ? '' : 'disabled' }}">&#8811;</a>
</div>
