@extends(EcommerceHelper::viewPath('customers.master'))
@section('content')
    <div class="section-header">
        <h3>{{ SeoHelper::getTitle() }}</h3>
    </div>
    <div class="section-content">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('ID number') }}</th>
                        <th>{{ __('Order ID number') }}</th>
                        <th>{{ __('Items Count') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($requests) > 0)
                        @foreach ($requests as $item)
                            <tr>
                                <th scope="row">{{ $item->code }}</th>
                                <th scope="row"><a
                                        href="{{ route('customer.orders.view', $item->order_id) }}"
                                        title="Click to show detail"
                                    >{{ $item->order->code }}</a></th>
                                <th scope="row">{{ $item->items_count }}</th>
                                <td>{{ $item->created_at->translatedFormat('M d, Y h:m') }}</td>
                                <td>{!! BaseHelper::clean($item->return_status->toHtml()) !!}</td>
                                <td>
                                    <a
                                        class="btn btn-primary btn-sm"
                                        href="{{ route('customer.order_returns.detail', $item->id) }}"
                                    >{{ __('View') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td
                                class="text-center"
                                colspan="6"
                            >{{ __('No order return requests!') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {!! $requests->links() !!}
        </div>
    </div>
@endsection
