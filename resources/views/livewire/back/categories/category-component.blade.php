@section('metaTitle') {{ __('custom.All Categories') }} @endsection
@section('metaDescription') Description @endsection
<div>
    <main>
        <section>
            <div class="container">
                <div class="row my-3">
                    <div class="col-md-6 d-flex align-items-center">
                        <h4 class="mb-0">{{ __('custom.All Categories') }}</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end">
                        <a href="{{ route('back.categories.add') }}" class="btn btn-success pull-right me-2">{{ __('custom.Add new') }}</a>
                    </div>
                    <div class="col-12 my-3">
                        @if (session('success') === 'Added SubCategory')
                        <p class="text-success mb-3"><strong>{{ __('custom.Success! Sub category has been added successfully') }}.</strong></p>
                        @endif
                        @if (session('success') === 'Added Category')
                        <p class="text-success mb-3"><strong>{{ __('custom.Success! Category has been added successfully') }}.</strong></p>
                        @endif
                        @if (session('success') === 'Updated SubCategory')
                            <p class="text-success mb-0"><strong>{{ __('custom.Success! Sub category has been updated successfully') }}.</strong></p>
                        @endif
                        @if (session('success') === 'Updated Category')
                            <p class="text-success mb-0"><strong>{{ __('custom.Success! Category has been updated successfully') }}.</strong></p>
                        @endif
                        @if (session('success') === 'Deleted Category')
                            <p class="text-success mb-0"><strong>{{ __('custom.Success! Category has been deleted successfully') }}.</strong></p>
                        @endif
                        @if (session('success') === 'Deleted SubCategory')
                        <p class="text-success mb-3"><strong>{{ __('custom.Success! Sub category has been deleted successfully') }}.</strong></p>
                        @endif
                    </div>
                </div>
                @if ($categories->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-nowrap" scope="col">#</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Image') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Title') }}</th>
                                <th class="text-nowrap text-center" scope="col">{{ __('custom.Sub Categories') }}</th>
                                <th class="text-nowrap text-center" scope="col">{{ __('custom.Publish status') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Create') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Updated') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="text-nowrap">{{ $loop->iteration }}</td>
                                    <td class="text-nowrap">
                                        <img src="{{ asset('storage/categories') }}/{{ $category->image }}" width="40" height="40" style="cursor: pointer; object-fit:cover;" alt="{{ $category->image }}" data-bs-toggle="modal" data-bs-target="#imageModal{{ $category->id }}">

                                        <div class="modal fade" id="imageModal{{ $category->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('storage/categories') }}/{{ $category->image }}" class="img-fluid w-100" alt="{{ $category->image }}">
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td title="{{ $category->title }}" class="text-nowrap">{{ Str::limit($category->title, 30, ' ...') }}</td>
                                    <td class="text-nowrap text-center">
                                        @if ($category->subCategories->isNotEmpty())
                                        <a  type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#subCategories{{ $category->id }}">
                                            <i class="fa-solid fa-book-open"></i>
                                        </a>

                                        <div class="modal fade" id="subCategories{{ $category->id }}" tabindex="-1" aria-labelledby="subCategoriesLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="subCategoriesLabel">{{ __('custom.Sub Categories') }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr class="text-start">
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">{{ __('custom.Image') }}</th>
                                                                        <th scope="col">{{ __('custom.Title') }}</th>
                                                                        <th class="text-center" scope="col">{{ __('custom.Publish status') }}</th>
                                                                        <th scope="col">{{ __('custom.Create') }}</th>
                                                                        <th scope="col">{{ __('custom.Updated') }}</th>
                                                                        <th scope="col">{{ __('custom.Action') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($category->subCategories as $scategory)
                                                                    <tr class="text-start">
                                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                                        <td scope="row">
                                                                            <img src="{{ asset('storage/sub-categories') }}/{{ $scategory->image }}" width="40" height="40" style="object-fit:cover;" alt="{{ $scategory->image }}">
                                                                        </td>
                                                                        <td>{{ Str::limit($scategory->title, 30, ' ...') }}</td>
                                                                        <td class="text-nowrap text-center">
                                                                            @if ($scategory->status === 'inactive')
                                                                                <i class="fa-solid fa-xmark text-danger"></i>
                                                                            @else
                                                                                <i class="fa-solid fa-check text-success"></i>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ $scategory->created_at->format('d/m/Y | H:i') }}</td>
                                                                        <td>{{ $scategory->updated_at->format('d/m/Y | H:i') }}</td>
                                                                        <td>
                                                                            <a href="{{ route('back.categories.edit', ['slug' => $category->slug, 'scategory_slug' => $scategory->slug]) }}"><i class="fa fa-edit text-primary"></i></a>
                                                                            <a href="#" onclick="confirm('Are you sure, You want to delete this sub category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSubCategory({{ $scategory->id }})" class="ms-3"><i class="fa-solid fa-circle-xmark text-danger"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="text-nowrap text-center">
                                        @if ($category->status === 'inactive')
                                            <i class="fa-solid fa-xmark text-danger"></i>
                                        @else
                                            <i class="fa-solid fa-check text-success"></i>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">{{ $category->created_at->format('d/m/Y | H:i') }}</td>
                                    <td class="text-nowrap">{{ $category->updated_at->format('d/m/Y | H:i') }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('back.categories.edit', ['slug' => $category->slug]) }}"><i class="fa fa-edit text-primary"></i></a>
                                        <a href="#" onclick="confirm('Are you sure, You want to delete this category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{ $category->id }})" class="ms-3"><i class="fa-solid fa-circle-xmark text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tp-shop-pagination mt-20">
                    <div class="tp-pagination">
                        {{ $categories->links('vendor.pagination.default') }}
                    </div>
                </div>
                @else
                    <h6 class="text-center">{{ __('custom.At the moment, there are no categories in the store. Please add some categories.') }}</h6>
                @endif
            </div>
        </section>
    </main>
</div>
