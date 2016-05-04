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
            <li><a href="#">Product</a></li>
            <li class="active">List of product</li>
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
                    Table of product
                </header>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Business</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--*/ $no = 0; /*--}}
                        @foreach($products as $product)
                        {{--*/ $no++; /*--}}
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->business->name }}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{ url('/backend/product/'.$product->id.'/edit') }}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-xs" href="{{ url('/backend/product/'.$product->id.'/delete') }}"><i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>

</div>
<!--body wrapper end-->
@stop
