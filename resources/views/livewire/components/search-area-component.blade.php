<div>
    @teleport('body')
    <section class="tp-search-area tp-search-style-secondary" x-show="open">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-search-form">
                        <div class="tp-search-close text-center mb-20">
                            <button class="tp-search-close-btn tp-search-close-btn"></button>
                        </div>
                        <form action="{{ route('app.shop.search') }}">
                            <div class="tp-search-input mb-10">
                                <input id="searchMobile" name="search" value="{{ $search }}" type="text" placeholder="Search for product...">
                                <button type="submit"><i class="flaticon-search-1"></i></button>
                            </div>
                            <div class="tp-search-category">
                                <select id="category_select" name="category_id" wire:change="changeCategoryId" class="form-select border-0">
                                    <option value="all">{{ __('custom.All Categories') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endteleport
</div>
