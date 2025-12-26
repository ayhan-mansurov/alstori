@section('metaTitle') {{ __('custom.Order Details') }} @endsection
@section('metaDescription') Description @endsection
<div>
    <main>
        <section>
            <div class="container">
                <div class="row my-3">
                    <div class="col-md-12 d-flex justify-content-md-end">
                        <a href="{{ route('back.orders') }}" class="btn btn-success pull-right">{{ __('custom.All Orders') }}</a>
                    </div>
                </div>
                <div class="table-responsive  my-5">
                    <table class="table table-hover align-middle caption-top">
                        <caption><h6>{{ __('custom.Order Details') }}</h6></caption>
                        <thead class="table-light">
                            <tr>
                                <th class="text-nowrap" scope="col">{{ __('custom.Order Number') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Order Date') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Status') }}</th>
                                @if($order->status == "delivered")
                                <th class="text-nowrap" scope="col">{{ __('custom.Delivery Date') }}</th>
                                @elseif($order->status == "canceled")
                                <th class="text-nowrap" scope="col">{{ __('custom.Cancellation Date') }}</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td>#{{$order->order_code}}</td>
                                <td>{{$order->created_at}}</td>
                                <td @if($order->status === 'ordered') class="text-primary" @elseif($order->status === 'delivered') class="text-success" @else class="text-danger" @endif> <strong>{{$order->status}}</strong> </td>
                                @if($order->status == "delivered")
                                <td>{{$order->delivered_date}}</td>
                                @elseif($order->status == "canceled")
                                <td>{{$order->canceled_date}}</td>
                                @elseif($order->status == "return")
                                <td>{{$order->return_date}}</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive  my-5">
                    <table class="table table-hover align-middle caption-top">
                        <caption><h6>{{ __('custom.Ordered Items') }}</h6></caption>
                        <thead class="table-light">
                            <tr>
                                <th class="text-nowrap" scope="col">#</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Image') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.SKU') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Title') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Price') }}</th>
                                <th class="text-nowrap text-center" scope="col">{{ __('custom.Quantity') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Subtotal') }}</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td class="text-nowrap">{{ $loop->iteration }}</td>
                                    <td class="text-nowrap">
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
                                    <td title="{{ $item->product->SKU }}" class="text-nowrap">{{ Str::limit($item->product->SKU, 20, ' ...') }}</td>
                                    <td title="{{ $item->product->title }}" class="text-nowrap"><a target="_blank" href="{{ route('app.shop.details', ['slug' => $item->product->slug]) }}" class="text-primary">{{ $item->product->title }}</a></td>
                                    <td title="{{ $item->product->price }}" class="text-nowrap">{{ $item->price }} ₾</td>
                                    <td title="{{ $item->quantity }}" class="text-nowrap text-center">{{ $item->quantity }}</td>
                                    <td class="text-nowrap">{{$item->price * $item->quantity}} ₾</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">{{ __('custom.Subtotal') }}</td>
                                <td>{{$order->subtotal}} ₾</td>
                            </tr>
                            <tr>
                                <td colspan="6">{{ __('custom.Tax') }}</td>
                                <td>{{$order->tax}} ₾</td>
                            </tr>
                            <tr>
                                <td colspan="6">{{ __('custom.Shipping') }}</td>
                                <td>{{ __('custom.Free Shipping') }}</td>
                            </tr>
                            <tr>
                                <td class="table-light" colspan="6"><h6>{{ __('custom.Total') }}</h6></td>
                                <td class="table-light"><h6>{{$order->total}} ₾</h6></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="table-responsive my-5">
                    <table class="table table-hover align-middle caption-top">
                        <caption><h6>Billing Details</h6></caption>
                        <thead class="table-light">
                            <tr>
                                <th class="text-nowrap" scope="col">{{ __('custom.First Name') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Last Name') }}</th>
                                @if ($order->company)
                                    <th class="text-nowrap" scope="col">{{ __('custom.Company') }}</th>
                                @endif
                                <th class="text-nowrap" scope="col">{{ __('custom.Mobile') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Email') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Address Line1') }}</th>
                                @if ($order->line2)
                                    <th class="text-nowrap" scope="col">{{ __('custom.Address Line2') }}</th>
                                @endif
                                <th class="text-nowrap" scope="col">{{ __('custom.City') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Province') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Country') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Zipcode') }}</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td class="text-nowrap">{{$order->firstname}}</td>
                                <td class="text-nowrap">{{$order->lastname}}</td>
                                @if ($order->company)
                                    <td class="text-nowrap">{{$order->company}}</td>
                                @endif
                                <td class="text-nowrap">{{$order->mobile}}</td>
                                <td class="text-nowrap">{{$order->email}}</td>
                                <td class="text-nowrap">{{$order->line1}}</td>
                                @if ($order->line2)
                                    <td class="text-nowrap">{{$order->line2}}</td>
                                @endif
                                <td class="text-nowrap">{{$order->city}}</td>
                                <td class="text-nowrap">{{$order->province}}</td>
                                <td class="text-nowrap">{{$order->country}}</td>
                                <td class="text-nowrap">{{$order->zipcode}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                @if($order->is_shipping_different)
                <div class="table-responsive">
                    <table class="table table-hover align-middle caption-top">
                        <caption><h6>{{ __('custom.Shipping Details') }}</h6></caption>
                        <thead class="table-light">
                            <tr>
                                <th class="text-nowrap" scope="col">{{ __('custom.First Name') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Last Name') }}</th>
                                @if ($order->company)
                                    <th class="text-nowrap" scope="col">{{ __('custom.Company') }}</th>
                                @endif
                                <th class="text-nowrap" scope="col">{{ __('custom.Mobile') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Email') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Address Line1') }}</th>
                                @if ($order->line2)
                                    <th class="text-nowrap" scope="col">{{ __('custom.Address Line2') }}</th>
                                @endif
                                <th class="text-nowrap" scope="col">{{ __('custom.City') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Province') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Country') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Zipcode') }}</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td class="text-nowrap">{{$order->shipping->firstname}}</td>
                                <td class="text-nowrap">{{$order->shipping->lastname}}</td>
                                @if ($order->shipping->company)
                                    <td class="text-nowrap">{{$order->shipping->company}}</td>
                                @endif
                                <td class="text-nowrap">{{$order->shipping->mobile}}</td>
                                <td class="text-nowrap">{{$order->shipping->email}}</td>
                                <td class="text-nowrap">{{$order->shipping->line1}}</td>
                                @if ($order->shipping->line2)
                                    <td class="text-nowrap">{{$order->shipping->line2}}</td>
                                @endif
                                <td class="text-nowrap">{{$order->shipping->city}}</td>
                                <td class="text-nowrap">{{$order->shipping->province}}</td>
                                <td class="text-nowrap">{{$order->shipping->country}}</td>
                                <td class="text-nowrap">{{$order->shipping->zipcode}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle caption-top">
                        <caption><h6>{{ __('custom.Transaction') }}</h6></caption>
                        <thead class="table-light">
                            <tr>
                                <th class="text-nowrap" scope="col">{{ __('custom.Transaction Mode') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Status') }}</th>
                                <th class="text-nowrap" scope="col">{{ __('custom.Transaction Date') }}</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td class="text-nowrap">
                                    @if ($order->transaction->mode === 'cod')
                                    {{ __('custom.Cash on Delivery') }}
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    @if ($order->transaction->status === 'pending')
                                    {{ __('custom.Pending') }}
                                    @endif
                                </td>
                                <td class="text-nowrap">{{$order->transaction->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>

