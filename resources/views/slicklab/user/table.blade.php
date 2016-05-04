@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        List of user
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">User</a></li>
            <li class="active">List of user</li>
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
                    Table of user
                </header>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( $users->count() )
                        {{--*/ $no = 0; /*--}}
                        @foreach($users as $user)
                        {{--*/ $no++; /*--}}
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-danger btn-xs" href="{{ url('backend/user/'.$user->id.'/reset-password') }}" onclick="return confirm('Yakin password direset ??')"><i class="fa fa-refresh "></i></a>
                                <a class="btn btn-danger btn-xs" href="{{ url('backend/user/'.$user->id.'/delete') }}" onclick="return confirm('Yakin dihapus ??')"><i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4" style="text-align:center;">No Data Here</td>
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
