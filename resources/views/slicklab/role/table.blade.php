@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        List of Role
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li class="active">Role</li>
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
                    Table of Role
                </header>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( $roles->count() )
                        {{--*/ $no = 0; /*--}}
                        @foreach($roles as $role)
                        {{--*/ $no++; /*--}}
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{ url('backend/role/'.$role->id.'/edit') }}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-xs" href="{{ url('backend/role/'.$role->id.'/delete') }}" onclick="return confirm('Yakin dihapus ??')"><i class="fa fa-trash-o "></i></a>
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
                @include('slicklab.paginator', ['paginator' => $roles])
            </section>
        </div>
    </div>

</div>
<!--body wrapper end-->
@stop
