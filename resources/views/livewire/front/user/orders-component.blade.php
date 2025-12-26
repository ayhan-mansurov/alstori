<div>
    @if ($orders->count() > 0)
    <div class="profile__ticket table-responsive">
        <div class="accordion" id="accordionOrders">
            @foreach ($orders as $key => $order)
            <div class="accordion accordion-flush border-0" id="accordionFlushOrders">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false" aria-controls="flush-collapse{{ $key }}">
                            <h6 class="text-seccondary">
                                Order: #{{ $order->order_code }} -
                                @if($order->status === 'ordered') <span class="text-primary">Ordered</span> @endif
                                @if($order->status === 'delivered') <span class="text-success">Delivered</span> @endif
                                @if($order->status === 'canceled') <span class="text-danger">Canceled</span> @endif
                                @if($order->status === 'return') <span class="text-danger">Return</span> @endif
                            </h6>
                        </div>
                    </h2>
                    <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushOrders">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderItems as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ asset('storage/products') }}/{{ $item->product->image }}" width="40" height="40" style="cursor: pointer; object-fit:cover;" alt="{{ $item->product->image }}" data-bs-toggle="modal" data-bs-target="#imageModal{{ $item->product->id }}">

                                            <div class="modal fade" id="imageModal{{ $item->product->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('storage/products') }}/{{ $item->product->image }}" class="img-fluid w-100" alt="{{ $item->product->image }}">
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <a title="{{ $item->product->title }}" href="{{ route('app.shop.details', ['slug' => $item->product->slug]) }}" target="_blank" class="text-primary">{{ $item->product->title }}</a>
                                        </td>

                                        <td>{{$item->price}} ₾</td>
                                        <td>{{$item->quantity}} ₾</td>
                                        <td>{{$item->price * $item->quantity}} ₾</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">Subtotal</td>
                                        <td><strong>{{ $order->subtotal }} ₾</strong></td>
                                    </tr>
                                    {{-- <tr>
                                        <td colspan="5">Discount</td>
                                        <td><strong>{{ $order->discount }} ₾</strong></td>
                                    </tr> --}}
                                    <tr>
                                        <td colspan="5">Tax</td>
                                        <td><strong>{{ $order->tax }} ₾</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="table-light" colspan="5"><strong>Total</strong></td>
                                        <td class="table-light"><strong>{{ $order->total }} ₾</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="tp-shop-pagination mt-20">
        <div class="tp-pagination">
          {{ $orders->links('vendor.pagination.default') }}
        </div>
    </div>
    @else
        <h6 class="mb-0">You have no orders. <a style="color: #678E61" href="{{ route('app.shop') }}">Go to shop.</a></h6>
    @endif
</div>
