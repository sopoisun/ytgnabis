@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        List of page
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Page</a></li>
            <li class="active">List of page</li>
        </ol>
    </div>
</div>
<!-- page head end-->

<!--body wrapper start-->
<div class="wrapper">

    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading head-border">
                    Table of page
                </header>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Page Name</th>
                            <th>Permalink</th>
                            <th>Show in menu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( $pages->count() )
                        {{--*/ $no = 0; /*--}}
                        @foreach($pages as $page)
                        {{--*/ $no++; /*--}}
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $page->page_title }}</td>
                            <td>{{ $page->seo->permalink }}</td>
                            <td>{{ ( $page->show_in_menu == 1 ) ? 'Yes' : 'No' }}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{ url('/backend/page/'.$page->id.'/edit') }}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-xs" href="{{ url('/backend/page/'.$page->id.'/delete') }}" onclick="return confirm('Yakin dihapus ??')"><i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" style="text-align:center;">No Data Here</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </section>
        </div>
    </div>

</div>
<!--body wrapper end-->
@stop
