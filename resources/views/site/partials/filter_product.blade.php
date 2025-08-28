<div class="collection-paginate clearfix relative nav_pagi w_100">
    <div class="row row-fix">
        @foreach ($products as $product)
            <div class="col-6 col-md-4 col-xl-3 col-fix">
                @include('site.products.product_item', [
                    'product' => $product,
                ])
            </div>
        @endforeach
    </div>
    <div class="text-center">
        <nav class="clearfix relative nav_pagi w_100 ">
            {{ $products->links() }}
        </nav>
    </div>
</div>
