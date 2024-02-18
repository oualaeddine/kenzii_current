@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">


            {{-- Previous Page Link --}}
          @if ($paginator->onFirstPage())
          <li class="page-item " aria-disabled="true" aria-label="@lang('pagination.previous')">
              <span class="btn btn-secondary-pagination disabled" aria-hidden="true" style="margin-bottom: 0;width:80px">&lsaquo; précédent</span>
          </li>
            @else
                <li class="page-item">
                    <a class="btn btn-pagination-d" style="width:80px" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo; précédent </a>
                </li>
            @endif
              
                      
        

              {{-- Pagination Elements --}}
              @foreach ($elements as $element)
              {{-- "Three Dots" Separator --}}
          
         
              
              {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)

                          


                        @if ( 4 >= $page - $paginator->currentPage() && $page - $paginator->currentPage() >= 0)
                            
                        
                            @if ($page == $paginator->currentPage())
                            
                            <li class="page-item active-paginator">
                                <span class="page-link">{{ $page }} <span class="sr-only">(current)</span> </span>
                            </li>
                            
                                {{-- <li class="active" aria-current="page"><span>{{ $page }}</span></li> --}}
                        
                            @elseif($page != $paginator->lastPage())

                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>

                            @else

                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>

                            @endif

                        @endif

                    @endforeach
                @endif

          @endforeach

          
         
          {{-- Next Page Link --}}
          @if ($paginator->hasMorePages())
          <li class="page-item">
              <a class="btn btn-pagination-d mr-2" style="width:80px" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> suivante &rsaquo;</a>
          </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="btn btn-secondary-pagination disabled mr-2" aria-hidden="true" style="margin-bottom: 0;width:80px">suivante &rsaquo;</span>
                </li>
            @endif


        </ul>
    </nav>
@endif
