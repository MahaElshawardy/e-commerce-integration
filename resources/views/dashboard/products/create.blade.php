@extends('dashboard.layouts.parent')
@section('css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css'>
@endsection
@section('content')
    <div class="row" style="margin-top: 92px">
        <form action="" method="post">
            <div class="col-md-4 shadow-dreamy" style="background: white;    margin-bottom: 35px;">
                <h3>Add Product</h3>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name Product</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name product"
                        required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
            </div>
            <div class="col-md-8">
                <h2>Product Variation</h2>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Unit Price
                    </label>
                    <input type="number" min="0" class="form-control" id="exampleFormControlInput1"
                        placeholder="Unit price" required>
                </div>
                <div class="mb-3">
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Size</label>
                        <details>
                            <summary>Select Size</summary>
                            <fieldset>
                                <ul>
                                    @if ($sizes->isNotEmpty())
                                        @foreach ($sizes as $size)
                                            <li>
                                                <label for="{{ $size->size }}">{{ $size->size }}</label>
                                                <input type="checkbox" class="sizes" name="size_id[]"
                                                    id="{{ $size->size }}" value="{{ $size->id }}" />
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </fieldset>
                        </details>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Colors</label>
                        <details>
                            <summary>Select Color</summary>
                            <fieldset>
                                <ul>
                                    @if ($colors->isNotEmpty())
                                        @foreach ($colors as $color)
                                            <li>
                                                <span
                                                    style="background-color: {{ $color->color_hex }};padding: 0px 8px;margin-left: 9px;"></span>
                                                <label for="{{ $color->color_name }}">{{ $color->color_name }} </label>
                                                <input type="checkbox" class="colors" name="color_id[]"
                                                    id="{{ $color->color_name }}" value="{{ $color->id }}" />
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </fieldset>
                        </details>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <table class="table table-bordered border-primary hidden">
                    <thead>
                        <tr>
                            <th scope="col">Variant Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Size</th>
                            <th scope="col">Color</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <hr>
@endsection
@section('js')
    <script></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js'></script>
@endsection
