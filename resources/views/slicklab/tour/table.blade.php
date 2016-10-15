@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        List of tour
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Tour</a></li>
            <li class="active">List of tour</li>
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
                    Table of tour
                    <div class="btn-es">
                        <a href="{{ url('/backend/tour/write-to-es') }}" class="btn btn-info" onclick="return confirm('Tulis di elasticsearch?')">
                            <i class="fa fa-refresh"></i> Write to ES
                        </a>
                    </div>
                </header>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Tempat Wisata</th>
                            <th>Kecamatan</th>
                            <th>Address</th>
                            <th>Tiket</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( $tours->count() )
                        {{--*/ $no = 0; /*--}}
                        @foreach($tours as $tour)
                        {{--*/ $no++; /*--}}
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $tour->name }}</td>
                            <td>{{ isset($tour->kecamatan->name) ? $tour->kecamatan->name : '--' }}</td>
                            <td>{{ $tour->address }}</td>
                            <td>{{ number_format($tour->tiket, 0, ',', '.') }}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{ url('/backend/tour/'.$tour->id.'/edit') }}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-xs" href="{{ url('/backend/tour/'.$tour->id.'/delete') }}" onclick="return confirm('Yakin dihapus ??')"><i class="fa fa-trash-o "></i></a>
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
