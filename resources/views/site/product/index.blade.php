@extends('site.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <form action="{{ route('products.index') }}" method="GET">
                <div class="price-filter">
                    <h4>Filter By Price</h4>
                    <input type="range" id="price-range" class="form-range price-range" name="price" min="0" max="10000" step="1">
                    <span style="display: block;margin-bottom: 15px;">Price: <span id="price-value"> 0</span> EGP -
                        <span id="price-max">10000</span> EGP</span>
                </div>

                <div class="color-filter">
                    <h4 style="">Filter By Color</h4>
                    <div class="w-50 filter-color__list ">
                        @if (!$colors->isEmpty())
                        @foreach ($colors as $color)
                        <label class="filter-color__item">
                            <span class="filter-color__check input-check-color" style="color: {{ $color->color_hex }};">
                                <label class="input-check-color__body"><input class="input-check-color__input" name="color_id[]" value="{{ $color->id }}" type="checkbox" />
                                    <span class="input-check-color__box"></span>
                                </label>
                            </span>
                        </label>
                        @endforeach
                        @else
                        <p>no color found</p>
                        @endif
                    </div>
                </div>

                <div class="size-filter">
                    <h4>Filter By Size</h4>
                    <div class="w-25 filter-color__list ">
                        @if (!$sizes->isEmpty())
                        @foreach ($sizes as $size)
                        <input class="form-check-input" type="checkbox" name="size_id[]" value=" {{ $size->id }}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $size->size }}
                        </label>
                        @endforeach
                        @else
                        <p>no size found</p>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>

        </div>
        <div class="col-md-8">
            <div class="page-title-inner">
                <h3 class="entry-title-main">Shop</h3>
                <nav class=""><span><a href="#">Home</a></span> / <span>Shop</span></nav>
            </div>
            <div class="products columns-4 grid">
                @if (!$products->isEmpty())
                @foreach ($products as $product)
                {{-- {{asset($product->variations[0]->images->image_path)}} --}}
                <div class="card" style="width: 18rem !important;
                            position: relative;">
                    <img src="{{ asset($product->variations[0]->images->image_path) }} " class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">
                            {{ substr($product->description, 0, 50) }}{{ strlen($product->description) > 50 ? '...' : '' }}
                        </p>
                        <a href="{{ route('products.show', $product->id) }}" class=""><img src="{{ url('images/icon/view.png') }}"></a>
                    </div>
                </div>
                @endforeach
                @else
                <p>no product found</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    var priceRange = document.getElementById('price-range');
    var priceValue = document.getElementById('price-value');
    priceRange.addEventListener('input', function() {
        priceValue.textContent = priceRange.value;
    });
</script>
@endsection