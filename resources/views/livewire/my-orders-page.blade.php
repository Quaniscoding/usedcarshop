<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-4xl font-bold text-slate-500">My Orders</h1>
    <div class="flex flex-col bg-white p-5 rounded mt-4 shadow-lg">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Payment
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order
                                    Amount</th>
                                <th scope="col"
                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($my_orders as $order)
                                @php
                                    $status = '';
                                    $payment_status = '';
                                    if ($order->status == 'new') {
                                        $status = ' <span
                                            class="bg-blue-500 py-1 px-3 rounded text-white shadow">New
                                        </span>';
                                    }
                                    if ($order->status == 'processing') {
                                        $status = ' <span
                                            class="bg-yellow-500 py-1 px-3 rounded text-white shadow">Processing
                                        </span>';
                                    }
                                    if ($order->status == 'shipped') {
                                        $status = ' <span
                                            class="bg-green-500 py-1 px-3 rounded text-white shadow">Shipped
                                        </span>';
                                    }
                                    if ($order->status == 'delivered') {
                                        $status = ' <span
                                            class="bg-green-700 py-1 px-3 rounded text-white shadow">Delivered
                                        </span>';
                                    }
                                    if ($order->status == 'canceled') {
                                        $status = ' <span
                                            class="bg-red-700 py-1 px-3 rounded text-white shadow">Cancelled
                                        </span>';
                                    }
                                    if ($order->payment_status == 'pending') {
                                        $payment_status = ' <span
                                            class="bg-blue-700 py-1 px-3 rounded text-white shadow">Pending
                                        </span>';
                                    }
                                    if ($order->payment_status == 'paid') {
                                        $payment_status = ' <span
                                            class="bg-green-600 py-1 px-3 rounded text-white shadow">Paid
                                        </span>';
                                    }
                                    if ($order->payment_status == 'failed') {
                                        $payment_status = ' <span
                                            class="bg-red-600 py-1 px-3 rounded text-white shadow">failed
                                        </span>';
                                    }
                                @endphp
                                <tr wire:key='{{ $order->id }}'
                                    class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                        {{ $order->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $order->created_at->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {!! $status !!}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {!! $payment_status !!}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ Number::currency($order->grand_total, 'USD') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                        <a href="/my-orders/{{ $order->id }}"
                                            class="bg-slate-600 text-white py-2 px-4 rounded-md hover:bg-slate-500">View
                                            Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                @if ($my_orders->hasPages())
                    <nav class="flex items-center justify-between mt-4 space-x-2" role="navigation"
                        aria-label="Pagination Navigation">
                        <!-- Previous Button -->
                        @if ($my_orders->onFirstPage())
                            <span class="px-4 py-2 text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">
                                Previous
                            </span>
                        @else
                            <button wire:click="previousPage" wire:loading.attr="disabled"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Previous
                            </button>
                        @endif

                        <div>
                            <!-- Page Numbers -->
                            @foreach ($my_orders->links()->elements[0] as $page => $url)
                                @if ($page == $my_orders->currentPage())
                                    <span class="px-4 py-2 m-2 text-white bg-blue-600 rounded-md">
                                        {{ $page }}
                                    </span>
                                @else
                                    <button wire:click="gotoPage({{ $page }})"
                                        class="px-4 py-2 m-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        {{ $page }}
                                    </button>
                                @endif
                            @endforeach

                        </div>
                        <!-- Next Button -->
                        @if ($my_orders->onLastPage())
                            <span class="px-4 py-2 text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">
                                Next
                            </span>
                        @else
                            <button wire:click="nextPage" wire:loading.attr="disabled"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Next
                            </button>
                        @endif
                    </nav>
                @endif

            </div>
        </div>
    </div>
</div>
