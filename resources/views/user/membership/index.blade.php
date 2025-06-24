@extends('layouts.user.app')

@section('title', 'Membership')

@section('content')
    <div>
        <div class="grid grid-cols-3 gap-6 mb-8">
            <a href="{{ route('members.created', 'renew') }}" class="bg-[#E1F7FF] shadow p-3 md:py-4 2xl:py-6 flex items-center justify-center rounded-xl">
                <p class="text-center font-semibold">Renew</p>
            </a>
            <a href="{{ route('members.created', 'upgrade') }}" class="bg-green-200 shadow p-3 md:py-4 2xl:py-6 flex items-center justify-center rounded-xl">
                <p class="text-center font-semibold">Upgrade</p>
            </a>
            <a href="{{ route('members.created', 'cancel') }}" class="bg-red-100 shadow p-3 md:py-4 2xl:py-6 flex items-center justify-center rounded-xl">
                <p class="text-center font-semibold">Cancel</p>
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">SL</th>
                        <th scope="col" class="px-6 py-3">Membership</th>
                        <th scope="col" class="px-6 py-3">Type</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Note</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($renews as $renew)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $renew->membership?->name }}</td>
                            <td class="px-6 py-4">{{ ucfirst($renew->type) }}</td>
                            <td class="px-6 py-4">{{ $renew->status ? 'Approved' : 'Pending' }}</td>
                            <td class="px-6 py-4">{{ $renew->note }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center px-6 py-4 text-red-500">Data not found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pagination p-4">
                {!! $renews->links('pagination::tailwind') !!}
            </div>
        </div>
    </div>
@endsection
