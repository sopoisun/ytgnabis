@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        List of kecamatan in Banyuwangi
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Kecamatan</a></li>
            <li class="active">List of kecamatan in Banyuwangi</li>
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
                    Table of kecamatan in Banyuwangi
                </header>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kecamatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( $kecamatans->count() )
                        {{--*/ $no = 0; /*--}}
                        @foreach($kecamatans as $kecamatan)
                        {{--*/ $no++; /*--}}
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $kecamatan->name }}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{ url('backend/kecamatan/'.$kecamatan->id.'/edit') }}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-xs" href="{{ url('backend/kecamatan/'.$kecamatan->id.'/delete') }}" onclick="return confirm('Yakin dihapus ??')"><i class="fa fa-trash-o "></i></a>
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
                @include('slicklab.paginator', ['paginator' => $kecamatans])
            </section>
        </div>
    </div>

</div>
<!--body wrapper end-->
@stop
