@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        List of business
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Business</a></li>
            <li class="active">List of business</li>
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
                    Table of business
                    <div class="btn-es">
                        <a href="{{ url('/backend/business/write-to-es') }}" class="btn btn-info" onclick="return confirm('Tulis di elasticsearch?')">
                            <i class="fa fa-refresh"></i> Write to ES
                        </a>
                    </div>
                </header>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Business Name</th>
                            <th>Kecamatan</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( $businesses->count() )
                        {{--*/ $no = 0; /*--}}
                        @foreach($businesses as $business)
                        {{--*/ $no++; /*--}}
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $business->name }}</td>
                            <td>{{ isset($business->kecamatan->name) ? $business->kecamatan->name : '--' }}</td>
                            <td>{{ $business->address }}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{ url('/backend/business/'.$business->id.'/edit') }}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-xs" href="{{ url('/backend/business/'.$business->id.'/delete') }}" onclick="return confirm('Yakin dihapus ??')"><i class="fa fa-trash-o "></i></a>
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
