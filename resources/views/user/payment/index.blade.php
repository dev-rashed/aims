@extends('layouts.user.app')

@section('title', 'Payments')

@section('content')
    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 table-auto overflow-x-auto">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">SL</th>
                        <th scope="col" class="px-6 py-3">Subtotal</th>
                        <th scope="col" class="px-6 py-3">Discount</th>
                        <th scope="col" class="px-6 py-3">Total</th>
                        <th scope="col" class="px-6 py-3">Method</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ convertAmount($payment->subtotal) }}</td>
                            <td class="px-6 py-4">{{ convertAmount($payment->discount) }}</td>
                            <td class="px-6 py-4">{{ convertAmount($payment->total) }}</td>
                            <td class="px-6 py-4">{{ $payment->method }}</td>
                            <td class="px-6 py-4">{{ ucfirst($payment->status) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center px-6 py-4 text-red-500">Data not found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="pagination p-4">
                {!! $payments->links('pagination::tailwind') !!}
            </div>
        </div>
    </div>
@endsection
