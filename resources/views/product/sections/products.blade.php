<section class="section-products">
    <div class="container">

        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-uppercase color-blue">{{ $collection->name }}</h1>
{{--                @switch($collection)--}}
{{--                    @case('name')--}}
{{--                        <h1 class="text-uppercase color-blue">NOWOŚCI</h1>--}}
{{--                        @break--}}
{{--                    @case('breakfast')--}}
{{--                        <h1 class="text-uppercase color-blue">PRODUKTY ŚNIADANIOWE</h1>--}}
{{--                        @break--}}
{{--                    @case('ironing')--}}
{{--                        <h1 class="text-uppercase color-blue">PRODUKTY DO PRASOWANIA</h1>--}}
{{--                        @break--}}
{{--                    @case('cooking')--}}
{{--                        <h1 class="text-uppercase color-blue">PRODUKTY DO GOTOWANIA</h1>--}}
{{--                        @break--}}
{{--                @endswitch--}}
            </div>
        </div>

        <div class="row row-eq-height items">
            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 item">
                    <img src="{{ asset('images/products/thumb/' . $product->code . '.png') }}" alt="{{ $product->code }}"/>
                    <p class="title">{{ $product->name }}</p>
                    <a href="#" class="button button-red full-width" data-id="{{ $product->code }}" data-type="buy"
                       data-collection="{{ $collection }}" title="kup teraz" data-bs-toggle="modal" data-bs-target="#modal">kup
                        teraz</a>
                </div>
            @endforeach
        </div>

    </div>
</section>
