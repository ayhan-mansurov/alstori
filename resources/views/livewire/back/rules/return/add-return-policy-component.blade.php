@section('metaTitle') {{ __('custom.Add Return') }} @endsection
@section('metaDescription') Description @endsection
<div>
    <main>
        <div class="container">
            <div class="row my-3">
                <div class="col-md-6">
                    <h4>{{ __('custom.Add Return') }}</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-md-end">
                    <a href="{{ route('back.return') }}" class="btn btn-success pull-right">{{ __('custom.Return Policy') }}</a>
                </div>
            </div>

            <form wire:submit.prevent="store()" enctype="multipart/form-data">
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
                                    <label for="description_ge" class="form-label">{{ __('custom.Description') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                                    <textarea wire:model="description_ge" placeholder="Description" class="form-control" style="min-height: 100px" id="description_ge" rows="3"></textarea>
                                    <div class="mt-2">
                                        <small class="text-secondary">{{ __('custom.Maximum value 200 characters..') }}</small> <br>
                                    </div>
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
                            <label for="status" class="form-label">{{ __('custom.Publish status') }} <span class="badge text-bg-danger">{{ __('custom.Required') }}</span></label>
                            <select wire:model="status" class="form-select mb-3" id="status" aria-label="Publish status">
                                <option value="inactive">{{ __("custom.Don't publish") }}</option>
                                <option value="active">{{ __("custom.Publish") }}</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 d-flex align-items-center">
                                <button type="submit" class="btn btn-primary px-4 me-3" wire:loading.attr="disabled">{{ __("custom.Submit") }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>
@push('scripts')
<script src="https://cdn.tiny.cloud/1/rrncgs4xvycy79chy4ykv5qj63rfv8gfpouqvgabz5c7fv4a/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(function(){
        tinymce.init({
            selector:'#description_en',
            height: 500,
            setup:function(editor){
                editor.on('Change',function(e){
                    tinyMCE.triggerSave();
                    var sd_data_en = $('#description_en').val();
                    @this.set('description_en', sd_data_en);
                });
            }
        });
    });

    $(function(){
        tinymce.init({
            selector:'#description_ge',
            height: 500,
            setup:function(editor){
                editor.on('Change',function(e){
                    tinyMCE.triggerSave();
                    var sd_data_ge = $('#description_ge').val();
                    @this.set('description_ge', sd_data_ge);
                });
            }
        });
    });

    $(function(){
        tinymce.init({
            selector:'#description_az',
            height: 500,
            setup:function(editor){
                editor.on('Change',function(e){
                    tinyMCE.triggerSave();
                    var sd_data_az = $('#description_az').val();
                    @this.set('description_az', sd_data_az);
                });
            }
        });
    });
</script>
@endpush


