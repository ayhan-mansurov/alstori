@section('metaTitle') {{ __('custom.New Product') }} @endsection
@section('metaDescription') Description @endsection
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css" rel="stylesheet">
@endpush
<div>
    <main>
        <div class="container">
            <div class="row my-3">
                <div class="col-md-6">
                    <h4>{{ __('custom.New Product') }}</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-md-end">
                    <a href="{{ route('back.products') }}" class="btn btn-success pull-right">{{ __('custom.All Products') }}</a>
                </div>
            </div>

            <form wire:submit.prevent="storeProduct()" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-8">
                        <nav>
                            <div class="nav nav nav-pills nav-justified mb-3" id="nav-tab" role="tablist">
                                <button class="nav-link {{ $activeTab == 'EN' ? 'active' : '' }}" id="EN-tab" wire:click="$set('activeTab', 'EN')" type="button" role="tab" aria-controls="EN" aria-selected="{{ $activeTab == 'EN' ? 'true' : 'false' }}">English</button>
                                <button class="nav-link {{ $activeTab == 'GE' ? 'active' : '' }}" id="GE-tab" wire:click="$set('activeTab', 'GE')" type="button" role="tab" aria-controls="GE" aria-selected="{{ $activeTab == 'GE' ? 'true' : 'false' }}">ქართული</button>
                                <button class="nav-link {{ $activeTab == 'AZ' ? 'active' : '' }}" id="AZ-tab" wire:click="$set('activeTab', 'AZ')" type="button" role="tab" aria-controls="AZ" aria-selected="{{ $activeTab == 'AZ' ? 'true' : 'false' }}">Azərbaycan</button>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show {{ $activeTab == 'EN' ? 'active' : '' }}" id="EN" role="tabpanel" aria-labelledby="EN-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="titleEN" class="form-label">{{ __('custom.Title') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                                    <input wire:model="title_en" wire:keyup="generateSlug" id="titleEN" type="text" class="form-control" placeholder="Title">
                                    @error('title_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3" wire:ignore>
                                    <label for="short_description_en" class="form-label">{{ __('custom.Short description') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                                    <textarea wire:model="short_description_en" placeholder="Short Description" class="form-control" style="min-height: 100px" id="short_description_en" rows="3"></textarea>
                                    <div class="mt-2">
                                        <small class="text-secondary">{{ __('custom.Maximum value 200 characters..') }}</small> <br>
                                    </div>
                                    @error('short_description_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3" wire:ignore>
                                    <label for="description_en" class="form-label">{{ __('custom.Description') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                                    <textarea wire:model="description_en" placeholder="Description" class="form-control" style="min-height: 100px" id="description_en" rows="3"></textarea>
                                    @error('description_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade {{ $activeTab == 'GE' ? 'show active' : '' }}" id="GE" role="tabpanel" aria-labelledby="GE-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="titleGE" class="form-label">{{ __('custom.Title') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                                    <input wire:model="title_ge" wire:keyup="generateSlug" type="text" class="form-control" id="titleGE" placeholder="Title">
                                    @error('title_ge')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3" wire:ignore>
                                    <label for="short_description_ge" class="form-label">{{ __('custom.Short description') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                                    <textarea wire:model="short_description_ge" placeholder="Short Description" class="form-control" style="min-height: 100px" id="short_description_ge" rows="3"></textarea>
                                    <div class="mt-2">
                                        <small class="text-secondary">{{ __('custom.Maximum value 200 characters..') }}</small> <br>
                                    </div>
                                    @error('short_description_ge')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3" wire:ignore>
                                    <label for="description_ge" class="form-label">{{ __('custom.Description') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                                    <textarea wire:model="description_ge" placeholder="Description" class="form-control" style="min-height: 100px" id="description_ge" rows="3"></textarea>
                                    @error('description_ge')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade {{ $activeTab == 'AZ' ? 'show active' : '' }}" id="AZ" role="tabpanel" aria-labelledby="AZ-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="titleAZ" class="form-label">{{ __('custom.Title') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                                    <input wire:model="title_az" wire:keyup="generateSlug" type="text" class="form-control" id="titleAZ" placeholder="Title">
                                    @error('title_az')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3" wire:ignore>
                                    <label for="short_description_az" class="form-label">{{ __('custom.Short description') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                                    <textarea wire:model="short_description_az" placeholder="Short Description" class="form-control" style="min-height: 100px" id="short_description_az" rows="3"></textarea>
                                    <div class="mt-2">
                                        <small class="text-secondary">{{ __('custom.Maximum value 200 characters..') }}</small> <br>
                                    </div>
                                    @error('short_description_az')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3" wire:ignore>
                                    <label for="description_az" class="form-label">{{ __('custom.Description') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                                    <textarea wire:model="description_az" placeholder="Description" class="form-control" style="min-height: 100px" id="description_az" rows="3"></textarea>
                                    @error('description_az')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4">

                        <div class="mb-3">
                            <label for="slug" class="form-label">{{ __('custom.Slug') }}</label>
                            <input wire:model="slug" type="text" disabled id="slug" class="form-control" placeholder="Slug">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="status" class="form-label">{{ __('custom.Publish status') }} <span class="badge text-bg-secondary">{{ __('custom.Optional') }}</span></label>
                            <select wire:model="status" class="form-select mb-3" id="status" aria-label="Publish status">
                                <option value="inactive">{{ __("custom.Don't publish") }}</option>
                                <option value="active">{{ __('custom.Publish') }}</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="SKU" class="form-label">{{ __('custom.SKU') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                            <input wire:model="SKU" type="text" id="SKU" class="form-control" placeholder="SKU">
                            @error('SKU')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="regular_price" class="form-label">{{ __('custom.Price') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                                    <input wire:model="regular_price" type="text" id="regular_price" class="form-control" placeholder="0,00 ₾">
                                    @error('regular_price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="sale_price" class="form-label">{{ __('custom.Sale Price') }} <span class="badge text-bg-secondary">{{ __('custom.Optional') }}</span></label>
                                    <input wire:model="sale_price" wire:change="changeSalePrice" type="text" id="sale_price" class="form-control" placeholder="0,00 ₾">
                                    @error('sale_price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">{{ __('custom.Quantity') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                            <input wire:model="quantity" type="text" id="quantity" class="form-control" placeholder="Quantity">
                            @error('quantity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="stock" class="form-label">{{ __('custom.Stock') }} <span class="badge text-bg-secondary">{{ __('custom.Optional') }}</span></label>
                            <select wire:model="stock" class="form-select mb-3" id="stock" aria-label="Stock">
                                <option value="inactive">{{ __('custom.Out of stock') }}</option>
                                <option value="active">{{ __('custom.In stock') }}</option>
                            </select>
                            @error('stock')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4 col-lg-6 d-flex justify-content-center">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input wire:model="featured" class="form-check-input" id="featured" type="checkbox">
                                        <label class="form-check-label" for="featured">
                                            {{ __('custom.Featured') }} <span class="badge text-bg-secondary">{{ __('custom.Optional') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-lg-6 d-flex justify-content-center">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input wire:model="slide" class="form-check-input" id="slide" @if($this->sale_price == null) disabled @endif type="checkbox">
                                        <label class="form-check-label" for="slide">
                                            {{ __('custom.Slide') }} <span class="badge text-bg-secondary">{{ __('custom.Optional') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-lg-6 d-flex justify-content-center">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input wire:model="weekend" class="form-check-input" id="weekend" @if($this->sale_price == null) disabled @endif type="checkbox">
                                        <label class="form-check-label" for="weekend">
                                            {{ __('custom.Weekend') }} <span class="badge text-bg-secondary">{{ __('custom.Optional') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">{{ __('custom.Category') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                            <select class="form-select mb-3" wire:model="category_id" wire:change="changeSubcategory" id="category_id" aria-label="Category">
                                <option>{{ __('custom.Select category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sub_category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="sub_category_id" class="form-label">{{ __('custom.Sub Category') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                            <select wire:model="sub_category_id" class="form-select mb-3" id="sub_category_id" aria-label="Sub Category">
                                <option value="0">{{ __('custom.Select sub category') }}</option>
                                @foreach ($scategories as $scategory)
                                    <option value="{{ $scategory->id }}">
                                        {{ $scategory->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sub_category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <hr>
                        <div class="row my-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="mainImage" class="form-label">{{ __('custom.Main image') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                                    <input wire:model="image" class="form-control" type="file" id="mainImage">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="mt-2">
                                        <small class="text-secondary">{{ __('custom.Recommended minimum image size') }}: <span class="text-black">500x500px</span>.</small> <br>
                                        <small class="text-secondary">{{ __('custom.The file format must be') }}: <span class="text-black">JPG, JPEG, PNG, WebP</span></small>
                                        <small class="text-secondary">{{ __('custom.Maximum image size') }}: <span class="text-black">2 MB</span></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-start align-items-start">
                                @if ($image)
                                    <img src="{{ asset('storage/livewire-tmp/' . $image->getFilename()) }}" width="100" height="100" style="cursor: pointer; object-fit:cover;" alt="{{ $image->getFilename() }}" data-bs-toggle="modal" data-bs-target="#prewImageModal">

                                    <div class="modal fade" id="prewImageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('storage/livewire-tmp/' . $image->getFilename()) }}" class="img-fluid w-100" alt="{{ $image->getFilename() }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <img src="{{ asset('assets/img/default/default-3D-img.webp') }}" width="100" height="100" style="object-fit: cover" alt="default-3D-img">
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row my-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="galleryImage" class="form-label">{{ __('custom.Gallery image') }} <span class="badge text-bg-secondary">{{ __('custom.Optional') }}</span></label>
                                    <input wire:model="images" class="form-control" type="file" id="galleryImage" multiple>
                                    @error('images')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="mt-2">
                                        <small class="text-secondary">{{ __('custom.Recommended minimum image size') }}: <span class="text-black">500x500px</span>.</small> <br>
                                        <small class="text-secondary">{{ __('custom.The file format must be') }}: <span class="text-black">JPG, JPEG, PNG, WebP</span></small>
                                        <small class="text-secondary">{{ __('custom.Maximum image size') }}: <span class="text-black">2 MB</span></small>
                                    </div>
                                </div>
                            </div>
                            @if ($images)
                                <div class="row">
                                    @foreach ($images as $key => $image)
                                    <div class="col-4 d-flex justify-content-start align-items-start mb-3">
                                        <img src="{{ asset('storage/livewire-tmp/' . $image->getFilename()) }}" width="100" height="100" style="cursor: pointer; object-fit:cover;" alt="{{ $image->getFilename() }}" data-bs-toggle="modal" data-bs-target="#prewImageModal{{ $key }}">
                                    </div>
                                    <div class="modal fade" id="prewImageModal{{ $key }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('storage/livewire-tmp/' . $image->getFilename()) }}" class="img-fluid w-100" alt="{{ $image->getFilename() }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-4 d-flex justify-content-start align-items-start">
                                        <img src="{{ asset('assets/img/default/default-3D-img.webp') }}" width="100" height="100" style="object-fit: cover" alt="default-3D-img">
                                    </div>
                                    <div class="col-4 d-flex justify-content-start align-items-start">
                                        <img src="{{ asset('assets/img/default/default-3D-img.webp') }}" width="100" height="100" style="object-fit: cover" alt="default-3D-img">
                                    </div>
                                    <div class="col-4 d-flex justify-content-start align-items-start">
                                        <img src="{{ asset('assets/img/default/default-3D-img.webp') }}" width="100" height="100" style="object-fit: cover" alt="default-3D-img">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 d-flex align-items-center">
                                <button type="submit" class="btn btn-primary px-4 me-3" wire:loading.attr="disabled">{{ __('custom.Submit') }}</button>
                                @if (session('quantity-error') === 'Quantity')
                                    <p class="text-danger mb-0"><strong>{{ __('custom.Warning! The quantity of goods is less than 1 pieces, please increase the quantity of goods') }}.</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"></script>
<script>
    $('#short_description_en').summernote({
      tabsize: 2,
      height: 100,
      callbacks: {
            onChange: function(contents, $editable) {
                var sd_data_en = $('#short_description_en').summernote('code');
                @this.set('short_description_en', sd_data_en);
            }
        }
    });

    $('#short_description_ge').summernote({
      tabsize: 2,
      height: 100,
      callbacks: {
            onChange: function(contents, $editable) {
                var sd_data_ge = $('#short_description_ge').summernote('code');
                @this.set('short_description_ge', sd_data_ge);
            }
        }
    });

    $('#short_description_az').summernote({
      tabsize: 2,
      height: 100,
      callbacks: {
            onChange: function(contents, $editable) {
                var sd_data_az = $('#short_description_az').summernote('code');
                @this.set('short_description_az', sd_data_az);
            }
        }
    });

    

    $('#description_en').summernote({
      tabsize: 2,
      height: 100,
      callbacks: {
            onChange: function(contents, $editable) {
                var d_data_en = $('#description_en').summernote('code');
                @this.set('description_en', d_data_en);
            }
        }
    });

    $('#description_ge').summernote({
      tabsize: 2,
      height: 100,
      callbacks: {
            onChange: function(contents, $editable) {
                var d_data_ge = $('#description_ge').summernote('code');
                @this.set('description_ge', d_data_ge);
            }
        }
    });

    $('#description_az').summernote({
      tabsize: 2,
      height: 100,
      callbacks: {
            onChange: function(contents, $editable) {
                var d_data_az = $('#description_az').summernote('code');
                @this.set('description_az', d_data_az);
            }
        }
    });
  </script>
@endpush
