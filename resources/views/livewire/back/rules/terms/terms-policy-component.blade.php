@section('metaTitle') {{ __('custom.Terms Policy') }} @endsection
@section('metaDescription') Description @endsection
<div>
    <main>
        <section>
            <div class="container">
                <div class="row my-3">
                    <div class="col-md-6 d-flex align-items-center">
                        <h4 class="mb-0">{{ __('custom.Terms Policy') }}</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end">
                        @if ($terms->count() > 0)
                        <a href="{{ route('back.terms.add') }}" class="btn btn-success pull-right me-2 disabled">{{ __('custom.Add new') }}</a>
                        @else
                        <a href="{{ route('back.terms.add') }}" class="btn btn-success pull-right me-2">{{ __('custom.Add new') }}</a>
                        @endif
                    </div>
                    <div class="col-12 my-3">
                        @if (session('success') === 'Added')
                        <p class="text-success mb-3"><strong>{{ __('custom.Success! Terms policy has been added successfully') }}.</strong></p>
                        @endif
                        @if (session('success') === 'Updated')
                            <p class="text-success mb-0"><strong>{{ __('custom.Success! Terms policy has been updated successfully') }}.</strong></p>
                        @endif
                        @if (session('success') === 'Deleted')
                            <p class="text-success mb-0"><strong>{{ __('custom.Success! Terms policy has been deleted successfully') }}.</strong></p>
                        @endif
                    </div>
                </div>
                @if ($terms->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-nowrap" scope="col">#</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Title') }}</th>
                                <th class="text-nowrap text-center" scope="col">{{ __('custom.Publish status') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Create') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Updated') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($terms as $item)
                                <tr>
                                    <td class="text-nowrap">{{ $loop->iteration }}</td>
                                    <td title="{{ $item->title }}" class="text-nowrap">{{ Str::limit($item->title, 30, ' ...') }}</td>
                                    <td class="text-nowrap text-center">
                                        @if ($item->status === 'inactive')
                                            <i class="fa-solid fa-xmark text-danger"></i>
                                        @else
                                            <i class="fa-solid fa-check text-success"></i>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">{{ $item->created_at->format('d/m/Y | H:i') }}</td>
                                    <td class="text-nowrap">{{ $item->updated_at->format('d/m/Y | H:i') }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('back.terms.edit', ['slug' => $item->slug]) }}"><i class="fa fa-edit text-primary"></i></a>
                                        <a href="#" onclick="confirm('Are you sure, You want to delete this terms policy?') || event.stopImmediatePropagation()" wire:click.prevent="delete({{ $item->id }})" class="ms-3"><i class="fa-solid fa-circle-xmark text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tp-shop-pagination mt-20">
                    <div class="tp-pagination">
                        {{ $terms->links('vendor.pagination.default') }}
                    </div>
                </div>
                @else
                    <h6 class="text-center">{{ __('custom.At the moment, there are no terms policy. Please add terms policy') }}.</h6>
                @endif
            </div>
        </section>
    </main>
</div>
