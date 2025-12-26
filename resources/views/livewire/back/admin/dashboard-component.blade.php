@section('metaTitle') Dashboard @endsection
<div>
    <div class="container">
        <div class="row my-4">
            <div class="col-12">
                <h2>Dashboard</h2>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0 text-center">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title">Categories</h5>
                      <p class="card-text">You have <span class="fw-bold">{{ $categories->count() }}</span> categories</p>
                      <a href="{{ route('back.categories') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0 text-center">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title">Sub categories</h5>
                      <p class="card-text">You have <span class="fw-bold">{{ $subcategories->count() }}</span> sub categories</p>
                      <a href="{{ route('back.categories') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0 text-center">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title">Products</h5>
                      <p class="card-text">You have <span class="fw-bold">{{ $products->count() }}</span> products</p>
                      <a href="{{ route('back.products') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
