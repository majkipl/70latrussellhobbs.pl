<section class="section-top">
    <div class="container">
        <img src="{{ asset('images/products/baner/' . $collection->slug . '/' . $collection->slug . '.jpg') }}" alt="{{ $collection->slug }}" class="d-block d-md-none" />
        <img src="{{ asset('images/products/baner/' . $collection->slug . '/' . $collection->slug . '-md.jpg') }}" alt="{{ $collection->slug }}" class="d-none d-md-block d-lg-none" />
        <img src="{{ asset('images/products/baner/' . $collection->slug . '/' . $collection->slug . '-lg.jpg') }}" alt="{{ $collection->slug }}" class="d-none d-lg-block d-xl-none" />
        <img src="{{ asset('images/products/baner/' . $collection->slug . '/' . $collection->slug . '-xl.jpg') }}" alt="{{ $collection->slug }}" class="d-none d-xl-block" />
    </div>
</section>
