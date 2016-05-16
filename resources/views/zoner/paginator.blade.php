@if($paginator->lastPage() > 1)
<div class="center">
    <ul class="pagination">

        {{--*/ $showPage = 0; /*--}}
        @for($i = 1; $i<=$paginator->lastPage(); $i++)
            @if((($i >= $paginator->currentPage() - 3) && ($i <= $paginator->currentPage() + 3)) || ($i == 1) || ($i == $paginator->lastPage()))
                @if( (($showPage == 1) && ($i != 2)) || (($showPage != ($paginator->lastPage() - 1)) && ($i == $paginator->lastPage())) )
                    <li><a href="javascript::void(0);">{{ "..." }}</a></li>
                @endif

                <li class="{{ ($i == $paginator->currentPage()) ? 'active' : '' }}">
                    <a href="{{ ($i == $paginator->currentPage()) ? 'javascript::void(0);' : $paginator->url($i) }}">
                        {{ $i }}
                    </a>
                </li>
                {{--*/ $showPage = $i; /*--}}
            @endif
        @endfor
        
    </ul>
</div>
@endif
