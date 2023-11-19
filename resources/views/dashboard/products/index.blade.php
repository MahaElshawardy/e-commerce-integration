@extends('dashboard.layouts.parent')
@section('css')
    <style>
        .table-expand-main {
            margin-top: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default" style="margin-top: 103px;">

            <div class="panel-body">
                <table class="table table-condensed table-expand-main" style="border-collapse:collapse;">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    @php
                        $countHeaderId = 1;
                    @endphp
                    <tbody>

                        @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                                <tr data-toggle="collapse" data-target="#demo{{ $countHeaderId }}" class="accordion-toggle">
                                    <td>{{ $countHeaderId }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td class="" style="display: flex ; justify-content: space-around;">
                                        <a href="{{ route('products.update', $product->id) }}">
                                            <img src="{{ url('images/icon/edit.png') }}" alt="" style="height:20px">
                                        </a>
                                        <a href="{{ route('products.destroy', $product->id) }}">
                                            <img src="{{ url('images/icon/delete.png') }}" alt=""
                                                style="height:20px">
                                        </a>
                                    </td>

                                </tr>

                                <tr>
                                    <td colspan="9" class="hiddenRow">
                                        <div class="accordian-body collapse" id="demo{{ $countHeaderId }}">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>price</th>
                                                        <th>quantity</th>
                                                        <th>color </th>
                                                        <th> size</th>
                                                        <th> image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($variations as $variation)
                                                        @if ($variation->product_id === $product->id)
                                                            <tr>
                                                                <td>{{ $variation->price }}</td>
                                                                <td>{{ $variation->quantity }}</td>
                                                                <td><input type="color" name=""
                                                                        value="{{ $variation->product_color->color->color_hex }}"
                                                                        id="" disabled></td>
                                                                <td>{{ $variation->sizes->size }}</td>
                                                                <td><img src="{{ url($variation->images->image_path) }}"
                                                                        style="height: 100px;" alt="">
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach

                                                </tbody>
                                            </table>

                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $countHeaderId++;
                                @endphp
                            @endforeach
                        @else
                            <tr data-toggle="collapse" data-target="#demo{{ $countHeaderId }}" class="accordion-toggle">
                                <td>No Data Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
        @if (session()->has('message'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('message') }}
                </div>
            </div>
        @endif
    </div>
@endsection
@section('js')
    <script></script>
@endsection
