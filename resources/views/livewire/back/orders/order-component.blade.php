@section('metaTitle') {{ __('custom.All Orders') }} @endsection
@section('metaDescription') Description @endsection
<div>
    <main>
        <section>
            <div class="container">
                <div class="row my-3">
                    <div class="col-md-6 d-flex align-items-center">
                        <h4 class="mb-0">{{ __('custom.All Orders') }}</h4>
                    </div>
                    <div class="col-12 my-3">
                        @if (session('success') === 'Status updated')
                        <p class="text-success mb-3"><strong>{{ __('custom.Success! Order status has been updated successfully') }}.</strong></p>
                        @endif
                    </div>
                </div>
                @if ($orders->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-nowrap" scope="col">#</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Order Number') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Order Date') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Total') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Subtotal') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Discount') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Tax') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.First Name') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Last Name') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Company') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Mobile') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Email') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Zipcode') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Status') }}</th>
                                <th class="text-nowrap" scope="col" colspan="2">{{ __('custom.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="text-nowrap">{{ $loop->iteration }}</td>
                                    <td class="text-nowrap">#{{ $order->order_code }}</td>
                                    <td class="text-nowrap">{{ $order->created_at->format('d/m/Y | H:i') }}</td>
                                    <td title="{{ $order->total }} ₾" class="text-nowrap"><strong>{{ $order->total }} ₾</strong></td>
                                    <td title="{{ $order->subtotal }} ₾" class="text-nowrap">{{ $order->subtotal }} ₾</td>
                                    <td title="{{ $order->discount }} ₾" class="text-nowrap">{{ $order->discount }} ₾</td>
                                    <td title="{{ $order->tax }} ₾" class="text-nowrap">{{ $order->tax }} ₾</td>
                                    <td title="{{ $order->firstname }}" class="text-nowrap">{{ $order->firstname }}</td>
                                    <td title="{{ $order->lastname }}" class="text-nowrap">{{ $order->lastname }}</td>
                                    <td title="{{ $order->company }}" class="text-nowrap">{{ $order->company }}</td>
                                    <td title="{{ $order->mobile }}" class="text-nowrap">{{ $order->mobile }}</td>
                                    <td title="{{ $order->email }}" class="text-nowrap">{{ $order->email }}</td>
                                    <td title="{{ $order->zipcode }}" class="text-nowrap">{{ $order->zipcode }}</td>
                                    <td title="{{ $order->status }}" @if($order->status === 'ordered') class="text-primary text-nowrap" @elseif($order->status === 'delivered') class="text-success text-nowrap" @else class="text-danger text-nowrap" @endif> <strong>{{ $order->status }}</strong> </td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('back.orders.details', ['id' => $order->id]) }}"><i class="fa-solid fa-circle-info text-primary"></i></a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="dropstart">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ __('custom.Status') }}
                                            </button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'delivered')">{{ __('custom.Delivered') }}</a></li>
                                              <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'ordered')">{{ __('custom.Ordered') }}</a></li>
                                              <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'canceled')">{{ __('custom.Canceled') }}</a></li>
                                              <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'return')">{{ __('custom.Return') }}</a></li>
                                            </ul>
                                          </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tp-shop-pagination mt-20">
                    <div class="tp-pagination">
                        {{ $orders->links('vendor.pagination.default') }}
                    </div>
                </div>
                @else
                    <h6 class="text-center">{{ __('custom.At the moment, there are no orders in the store. Please add some orders') }}.</h6>
                @endif
            </div>
        </section>
    </main>
</div>

