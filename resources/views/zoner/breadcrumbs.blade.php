@if (isset($breadcrumbs))
<!-- Breadcrumb Zoner -->
<div class="container">
    <ol class="breadcrumb">
        {{--*/ $last = count($breadcrumbs)-1; /*--}}
        @foreach ($breadcrumbs as $key => $breadcrumb)
            @if ( $key != $last )
                <li><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
            @else
                <li class="active">{{ $breadcrumb['title'] }}</li>
            @endif
        @endforeach
    </ol>
</div>
<!-- end Breadcrumb Zoner -->
@endif
