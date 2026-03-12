@include('frontend.components.dashboard.partials.header')
@include('frontend.components.dashboard.partials.navbar')
@include('frontend.components.dashboard.partials.sidebar')
<div class="p-4 sm:ml-64 mt-14">
    <div class="p-4 border border-dashed rounded-lg border-gray-300">
        <nav class="flex mb-2 text-sm text-gray-500">
            <ol class="inline-flex items-center space-x-2">
                <li>
                    <a href="#" class="hover:text-gray-900">Donasi Saya</a>
                </li>
                <li>
                    <span class="mx-1">›</span>
                </li>
                <li class="text-gray-700 font-medium">
                    List
                </li>
            </ol>
        </nav>
        <h1 class="text-3xl font-bold text-gray-900 mb-6">
            Donasi Saya
        </h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">

                <!-- Header -->
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Donasi</th>
                        <th scope="col" class="px-6 py-3">Jumlah</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Bukti Donasi</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody>
                    @foreach ($donations as $item)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $item->donation->title }}</td>
                            <td class="px-6 py-4">{{ $item->quantity }} {{ $item->donation->unit }}</td>
                            @if ($item->status == 'Pending')
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded">
                                        Pending
                                    </span>
                                </td>
                            @elseif($item->status == 'Rejected' || $item->status == 'Cancelled')
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-medium text-red-700 bg-red-100 rounded">
                                        Ditolak
                                    </span>
                                </td>
                            @elseif($item->status == 'Verified')
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded">
                                        Selesai
                                    </span>
                                </td>
                            @elseif($item->status == 'Delivered')
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded">
                                        Dalam Pengiriman
                                    </span>
                                </td>
                            @endif
                            <td class="px-6 py-4">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                @if (!$item->proof_photo)
                                    <span class="text-yellow-600 font-medium">
                                        Menunggu diupload
                                    </span>
                                @else
                                    <a href="{{ Storage::url($item->proof_photo) }}" target="_blank"
                                        class="text-blue-600 hover:underline font-medium">
                                        Lihat Bukti
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>
@include('frontend.components.dashboard.partials.footer')
