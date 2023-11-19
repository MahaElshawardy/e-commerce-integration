@extends('site.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="page-title-inner">
                <nav class=""><span><a href="#">Home</a></span> / <span>Shop</span>/ <span>product name</span>
                </nav>
            </div>
            @if (!empty(request('color_id')))
            <div class="price-filter">
                <img src="{{ url($product->variations[0]->images->image_path) }}" style="height: 400px;position: relative;left: 110px;" class="rounded float-start" alt="...">
            </div>
            @else
            <div class="price-filter">
                <img src="{{ url($image->image_path) }}" style="height: 400px;position: relative;left: 110px;" class="rounded float-start" alt="...">
            </div>
            @endif

        </div>
        <div class="col-md-6">
            <div class="page-title-inner">
                <h2 style="margin-top: 40px;display: flex;flex-direction: row-reverse;align-items: center;">
                    {{ $product->name }}
                    <img src="{{ url('images/icon/love.png') }}" style="height: 25px;" class="rounded mx-auto d-block" alt="...">
                </h2>
                @if (!empty(request('size_id')))
                <hr>
                <span>{{$priceQuantity->variations[0]->price}} <b>EGP</b> </span>
                @endif
                <hr>
                <p>
                    {{ substr($product->description, 0, 50) }}{{ strlen($product->description) > 50 ? '...' : '' }}
                </p>
                @if (!empty(request('size_id')))
                <hr>
                <h5><b>{{$priceQuantity->variations[0]->quantity}}</b> in stock</h5>
                <input type="number" name="" min="1" max="{{$product->variations[0]->quantity}}" id="">
                <button type="submit" class="btn btn-primary">Add To Cart</button>
                @endif
                <hr>

                <div class="w-100 filter-color__list ">
                    <div class="filter-color__item">
                        <input type="hidden" id="product-id" value="{{ $product->id }}">
                        @foreach ($product->product_colors as $key => $productColor)
                        {{-- {{ $productColor->color->id }} --}}
                        <span class="filter-color__check input-check-color" style="color: {{ $productColor->color->color_hex }};">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input" name="color_id" value="{{ $productColor->color->id }}" type="button" />
                                <span class="input-check-color__box"></span>
                            </label>
                        </span>
                        @endforeach
                    </div>
                    <hr>
                    <h3>VARIATION AVAILABLE</h3>
                    <hr>
                    @if (!empty(request('color_id')))
                    @foreach ($product->variations as $variation)
                    <span style="position: relative;margin-right: 12px;">
                        <button class="form-check-input" value="{{ $variation->size_id }}" type="submit" @if ($priceQuantity && $priceQuantity->variations[0]->sizes->id === $variation->size_id) disabled @endif>{{ $variation->sizes->size }}</button>
                    </span>
                    @endforeach
                    @else
                    @foreach ($sizes as $size)
                    <span style="position: relative;margin-right: 12px; ">
                        <button class="form-check-input" type="submit" style="background-color: #dee2e6;border: none; cursor: not-allowed;" disabled>{{ $size->size }}</button>
                    </span>
                    @endforeach
                    @endif
                </div>
                <div id="product-info" style="display: none;">
                </div>

            </div>

        </div>
    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin: 35px 0;">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-desc" aria-selected="true">DESCRIPTION</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-revi" aria-selected="false">REVIEWS</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-desc" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <p>DESCRIPTION</p>
            <h2>Paragraph text</h2>
            <p>Paragraph text
                Nam tristique porta ligula, vel viverra sem eleifend nec. Nulla sed purus augue, eu euismod tellus. Nam
                mattis eros nec mi sagittis sagittis. Vestibulum suscipit cursus bibendum. Integer at justo eget sem
                auctor auctor eget vitae arcu. Nam tempor malesuada porttitor. Nulla quis dignissim ipsum. Aliquam
                pulvinar iaculis justo, sit amet interdum sem hendrerit vitae. Vivamus vel erat tortor. Nulla facilisi.
                In nulla quam, lacinia eu aliquam ac, aliquam in nisl.</p>
        </div>
        <div class="tab-pane fade" id="nav-revi" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">...
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script>
    // get size based on color
    const colorInputs = document.querySelectorAll('.input-check-color__input');

    colorInputs.forEach(function(colorInput) {
        colorInput.addEventListener('click', function(e) {
            e.preventDefault();
            const colorId = this.value;
            const productId = document.getElementById('product-id').value;
            const editVisitUrl = `/products/show/${productId}?color_id=${colorId}`;
            window.location.href = editVisitUrl;
        });
    });

    // get prise and quantity based size
    const sizeInpute = document.querySelectorAll('.form-check-input');

    sizeInpute.forEach(function(colorInput) {
        colorInput.addEventListener('click', function(e) {
            e.preventDefault();
            const currentUrl = window.location.href;
            const url = new URL(currentUrl);
            const colorId = url.searchParams.get('color_id');
            const sizeId = this.value;
            const productId = document.getElementById('product-id').value;
            const editVisitUrl = `/products/show/${productId}?color_id=${colorId}&size_id=${sizeId}`;
            window.location.href = editVisitUrl;
        });
    });
</script>

@endsection