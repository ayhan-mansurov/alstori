@if ($scategory_slug === null) @section('metaTitle') {{ __('custom.Edit Category') }} @endsection @else @section('metaTitle') {{ __('custom.Edit Sub Category') }}  @endsection @endif
@section('metaDescription') Description @endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
<div>
    <main>
        <div class="container">
            <div class="row my-3">
                <div class="col-md-6">
                    @if ($scategory_slug === null)
                    <h4>{{ __('custom.Edit Category') }}</h4>
                    @else
                    <h4>{{ __('custom.Edit Sub Category') }}</h4>
                    @endif
                </div>
                <div class="col-md-6 d-flex justify-content-md-end">
                    <a href="{{ route('back.categories') }}" class="btn btn-success pull-right">{{ __('custom.All Categories') }}</a>
                </div>
            </div>

            <form wire:submit.prevent="updateCategory()" enctype="multipart/form-data">
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
                                    <label for="titleEN" class="form-label">{{ __('custom.Title') }}</label>
                                    <input wire:model="title_en" wire:keyup="generateSlug" id="titleEN" type="text" class="form-control" placeholder="Title">
                                    @error('title_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3" wire:ignore>
                                    <label for="short_description_en" class="form-label">{{ __('custom.Short description') }}</label>
                                    <textarea wire:model="short_description_en" placeholder="Short Description" class="form-control" style="min-height: 100px" id="short_description_en" rows="3">{{ $short_description_en }}</textarea>
                                    <div class="mt-2">
                                        <small class="text-secondary">{{ __('custom.Maximum value 200 characters..') }}</small> <br>
                                    </div>
                                    @error('short_description_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade {{ $activeTab == 'GE' ? 'show active' : '' }}" id="GE" role="tabpanel" aria-labelledby="GE-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="titleGE" class="form-label">Title</label>
                                    <input wire:model="title_ge" wire:keyup="generateSlug" type="text" class="form-control" id="titleGE" placeholder="Title">
                                    @error('title_ge')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3" wire:ignore>
                                    <label for="short_description_ge" class="form-label">{{ __('custom.Short description') }}</label>
                                    <textarea wire:model="short_description_ge" placeholder="Short Description" class="form-control" style="min-height: 100px" id="short_description_ge" rows="3">{{ $short_description_ge }}</textarea>
                                    <div class="mt-2">
                                        <small class="text-secondary">{{ __('custom.Maximum value 200 characters..') }}</small> <br>
                                    </div>
                                    @error('short_description_ge')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade {{ $activeTab == 'AZ' ? 'show active' : '' }}" id="AZ" role="tabpanel" aria-labelledby="AZ-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="titleAZ" class="form-label">Title</label>
                                    <input wire:model="title_az" wire:keyup="generateSlug" type="text" class="form-control" id="titleAZ" placeholder="Title">
                                    @error('title_az')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3" wire:ignore>
                                    <label for="short_description_az" class="form-label">{{ __('custom.Short description') }}</label>
                                    <textarea wire:model="short_description_az" placeholder="Short Description" class="form-control" style="min-height: 100px" id="short_description_az" rows="3">{{ $short_description_az }}</textarea>
                                    <div class="mt-2">
                                        <small class="text-secondary">{{ __('custom.Maximum value 200 characters..') }}</small> <br>
                                    </div>
                                    @error('short_description_az')
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
                            <label for="status" class="form-label">{{ __('custom.Publish status') }}</label>
                            <select wire:model="status" class="form-select mb-3" id="status" aria-label="Status">
                                <option value="inactive">{{ __("custom.Don't publish") }}</option>
                                <option value="active">{{ __('custom.Publish') }}</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <hr>
                        @if ($scategory_slug != null)
                        <div class="mb-3">
                            <label for="category_id" class="form-label">{{ __('custom.Parent category') }}</label>
                            <select wire:model="category_id" class="form-select mb-3" id="category_id" aria-label="Parent category">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @endif
                        <hr>
                        <div class="row my-3">
                            <div class="col-12 ">
                                <div class="mb-3">
                                    <label for="mainImage" class="form-label">{{ __('custom.Main image') }}</label>
                                    <input wire:model="newImage" class="form-control" type="file" id="mainImage">
                                    @error('newImage')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="mt-2">
                                        <small class="text-secondary">{{ __('custom.The file format must be') }}: <span class="text-black">JPG, JPEG, PNG, WebP</span></small><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-start align-items-start">
                                @if ($scategory_slug === null)
                                    @if ($newImage)
                                        <img src="{{ asset('storage/livewire-tmp/' . $newImage->getFilename()) }}" width="100" height="100" style="cursor: pointer; object-fit:cover;" alt="{{ $newImage->getFilename() }}" data-bs-toggle="modal" data-bs-target="#prewNewImageModal">

                                        <div class="modal fade" id="prewNewImageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('storage/livewire-tmp/' . $newImage->getFilename()) }}" class="img-fluid w-100" alt="{{ $newImage->getFilename() }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <img src="{{ asset('storage/categories') }}/{{ $image }}" width="100" height="100" style="cursor: pointer; object-fit:cover;" alt="old-image" data-bs-toggle="modal" data-bs-target="#prewOldImageModal">

                                        <div class="modal fade" id="prewOldImageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('storage/categories') }}/{{ $image }}" class="img-fluid w-100" alt="old-image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    @if ($newImage)
                                        <img src="{{ asset('storage/livewire-tmp/' . $newImage->getFilename()) }}" width="100" height="100" style="cursor: pointer; object-fit:cover;" alt="{{ $newImage->getFilename() }}" data-bs-toggle="modal" data-bs-target="#prewNewImageModal">

                                        <div class="modal fade" id="prewNewImageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('storage/livewire-tmp/' . $newImage->getFilename()) }}" class="img-fluid w-100" alt="{{ $newImage->getFilename() }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <img src="{{ asset('storage/sub-categories') }}/{{ $image }}" width="100" height="100" style="cursor: pointer; object-fit:cover;" alt="old-image" data-bs-toggle="modal" data-bs-target="#prewOldImageModal">

                                        <div class="modal fade" id="prewOldImageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('storage/sub-categories') }}/{{ $image }}" class="img-fluid w-100" alt="old-image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 d-flex align-items-center">
                                <button type="submit" class="btn btn-primary px-4 me-3" wire:loading.attr="disabled">{{ __('custom.Update') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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
  </script>
@endpush
