@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        List of product
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Post</a></li>
            <li class="active">List of post</li>
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
                    Table of post
                </header>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Post Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>State</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( $posts->count() )
                        {{--*/ $no = 0; /*--}}
                        @foreach($posts as $post)
                        {{--*/ $no++; /*--}}
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $post->post_title }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->publish == 1 ? 'Published' : 'Draft' }}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{ url('/backend/post/'.$post->id.'/edit') }}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-xs" href="{{ url('/backend/post/'.$post->id.'/delete') }}" onclick="return confirm('Yakin dihapus ??')"><i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" style="text-align:center;">No Data Here</td>
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
