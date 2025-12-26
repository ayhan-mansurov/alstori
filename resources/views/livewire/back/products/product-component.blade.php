@section('metaTitle') {{ __('custom.All Products') }} @endsection
@section('metaDescription') Description @endsection
<div>
    <main>
        <section>
            <div class="container">
                <div class="row my-3">
                    <div class="col-md-6 d-flex align-items-center">
                        <h4 class="mb-0">{{ __('custom.All Products') }}</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end">
                        <form action="{{ route('back.products.search') }}" class="d-flex me-2">
                            <input name="search" value="{{ $search }}" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-secondary" type="submit">{{ __('custom.Search') }}</button>
                        </form>
                        <a href="{{ route('back.products.add') }}" class="btn btn-success pull-right me-2">{{ __('custom.Add new') }}</a>
                    </div>
                    <div class="col-12 my-3">
                        @if (session('success') === 'Added')
                            <p class="text-success mb-0"><strong>{{ __('custom.Success! Product has been created successfully') }}.</strong></p>
                        @endif
                        @if (session('success') === 'Deleted')
                            <p class="text-success mb-0"><strong>{{ __('custom.Success! Product has been deleted successfully') }}.</strong></p>
                        @endif
                        @if (session('success') === 'Updated')
                            <p class="text-success mb-0"><strong>{{ __('custom.Success! Product has been updated successfully') }}.</strong></p>
                        @endif
                    </div>
                </div>
                @if ($products->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-nowrap" scope="col">#</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Image') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.SKU') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Title') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Category') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Sub Category') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Price') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Sale Price') }}</th>
                                <th class="text-nowrap text-center" scope="col">{{ __('custom.Quantity') }}</th>
                                <th class="text-nowrap text-center" scope="col">{{ __('custom.Publish') }}</th>
                                <th class="text-nowrap text-center" scope="col">{{ __('custom.Stock') }}</th>
                                <th class="text-nowrap text-center" scope="col">{{ __('custom.Featured') }}</th>
                                <th class="text-nowrap text-center" scope="col">{{ __('custom.Slide') }}</th>
                                <th class="text-nowrap text-center" scope="col">{{ __('custom.Weekend') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Create') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Updated') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-nowrap">{{ $loop->iteration }}</td>
                                    <td class="text-nowrap">
                                        <img src="{{ asset('storage/products') }}/{{ $product->image }}" width="40" height="40" style="cursor: pointer; object-fit:cover;" alt="{{ $product->image }}" data-bs-toggle="modal" data-bs-target="#imageModal{{ $product->id }}">

                                        <div class="modal fade" id="imageModal{{ $product->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('storage/products') }}/{{ $product->image }}" class="img-fluid w-100" alt="{{ $product->image }}">
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td title="{{ $product->SKU }}" class="text-nowrap">{{ Str::limit($product->SKU, 20, ' ...') }}</td>
                                    <td title="{{ $product->title }}" class="text-nowrap">{{ Str::limit($product->title, 30, ' ...') }}</td>
                                    <td title="{{ $product->subCategory->category->title }}" class="text-nowrap">{{ Str::limit($product->subCategory->category->title, 30, ' ...') }}</td>
                                    <td title="{{ $product->subCategory->title }}" class="text-nowrap">{{ Str::limit($product->subCategory->title, 30, ' ...') }}</td>
                                    <td title="{{ $product->regular_price }}" class="text-nowrap">{{ $product->regular_price }} ₾</td>
                                    @if ($product->sale_price)
                                        <td title="{{ $product->sale_price }}" class="text-nowrap"><strong>{{ $product->sale_price }} ₾</strong></td>
                                    @else
                                        <td class="text-nowrap"></td>
                                    @endif
                                    <td title="{{ $product->quantity }}" class="text-nowrap text-center">{{ $product->quantity }}</td>
                                    <td class="text-nowrap text-center">
                                        @if ($product->status === 'inactive')
                                            <i class="fa-solid fa-xmark text-danger"></i>
                                        @else
                                            <i class="fa-solid fa-check text-success"></i>
                                        @endif
                                    </td>
                                    <td class="text-nowrap text-center">
                                        @if ($product->stock === 'inactive')
                                            <i class="fa-solid fa-xmark text-danger"></i>
                                        @else
                                            <i class="fa-solid fa-check text-success"></i>
                                        @endif
                                    </td>
                                    <td class="text-nowrap text-center">
                                        @if ($product->featured != false)
                                            <i class="fa-solid fa-check text-success"></i>
                                        @else
                                            <i class="fa-solid fa-xmark text-danger"></i>
                                        @endif
                                    </td>
                                    <td class="text-nowrap text-center">
                                        @if ($product->slide != false)
                                            <i class="fa-solid fa-check text-success"></i>
                                        @else
                                            <i class="fa-solid fa-xmark text-danger"></i>
                                        @endif
                                    </td>
                                    <td class="text-nowrap text-center">
                                        @if ($product->weekend != false)
                                            <i class="fa-solid fa-check text-success"></i>
                                        @else
                                            <i class="fa-solid fa-xmark text-danger"></i>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">{{ $product->created_at->format('d/m/Y | H:i') }}</td>
                                    <td class="text-nowrap">{{ $product->updated_at->format('d/m/Y | H:i') }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('back.products.edit', ['slug' => $product->slug]) }}"><i class="fa fa-edit text-primary"></i></a>
                                        <a href="#" onclick="confirm('Are you sure, You want to delete this product?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{ $product->id }})" class="ms-3"><i class="fa-solid fa-circle-xmark text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tp-shop-pagination mt-20">
                    <div class="tp-pagination">
                        {{ $products->links('vendor.pagination.default') }}
                    </div>
                </div>
                @else
                    <h6 class="text-center">{{ __('custom.At the moment, there are no products in the store. Please add some products') }}.</h6>
                @endif
            </div>
        </section>
    </main>
</div>
