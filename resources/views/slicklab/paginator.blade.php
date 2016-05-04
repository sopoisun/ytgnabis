@if($paginator->lastPage() > 1)
<div>
    <ul class="pagination pull-right">
        <li>
            <a href="{{ (1 == $paginator->currentPage()) ? 'javascript::void(0);' : $paginator->url(1) }}">
                «
            </a>
        </li>

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

        <li>
            <a href="{{ ($paginator->lastPage() == $paginator->currentPage()) ? 'javascript::void(0);' : $paginator->url($paginator->lastPage()) }}">
                »
            </a>
        </li>
    </ul>
</div>
@endif
