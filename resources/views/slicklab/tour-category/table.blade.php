@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        List of tour category
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Tour</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">List of tour category</li>
        </ol>
    </div>
</div>
<!-- page head end-->

<!--body wrapper start-->
<div class="wrapper">

    <div class="row">
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading head-border">
                    Table of tour category
                    <div class="btn-es">
                        <a href="{{ url('/backend/tour/category/write-to-es') }}" class="btn btn-info" onclick="return confirm('Tulis di elasticsearch?')">
                            <i class="fa fa-refresh"></i> Write to ES
                        </a>
                    </div>
                </header>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( $categories->count() )
                        {{--*/ $no = 0; /*--}}
                        @foreach($categories as $category)
                        {{--*/ $no++; /*--}}
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{ url('backend/tour/category/'.$category->id.'/edit') }}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-xs" href="{{ url('backend/tour/category/'.$category->id.'/delete') }}" onclick="return confirm('Yakin dihapus ??')"><i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3" style="text-align:center;">No Data Here</td>
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
