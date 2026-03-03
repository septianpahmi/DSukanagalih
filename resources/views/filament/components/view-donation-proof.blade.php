{{-- resources/views/task-results/detail.blade.php --}}

@php
    use Illuminate\Support\Facades\Storage;

    $fileUrl = $result->proof_photo ? Storage::url($result->proof_photo) : null;
    $isImage = $fileUrl && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $fileUrl);
    $fileName = $result->proof_photo ? basename($result->proof_photo) : null;
@endphp
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="w-full mx-auto bg-white p-4">

    <div class="mb-4">
        @if ($result->count())
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                @php
                    $fileUrl = Storage::url($result->proof_photo);
                    $isImage = preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $result->proof_photo);
                    $fileName = basename($result->proof_photo);
                @endphp

                <div class="flex flex-col items-center shadow-sm">
                    @if ($isImage)
                        <img src="{{ $fileUrl }}" alt="Preview" class="rounded-sm border object-contain shadow mb-3">
                    @else
                        <div class="flex items-center space-x-3 mb-3">
                            <x-heroicon-o-document class="w-8 h-8 text-gray-500" />
                            <span class="text-gray-800 font-medium truncate max-w-[160px]">{{ $fileName }}</span>
                        </div>
                    @endif

                    <a href="{{ $fileUrl }}" download
                        class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 shadow">
                        Download
                    </a>
                </div>
            </div>
        @else
            <p class="text-gray-500 italic">Tidak ada file</p>
        @endif
    </div>

    {{-- Catatan --}}
    {{-- <div class="mb-4">
        <h2 class="text-lg font-bold text-gray-800 mb-3 border-b pb-2">Catatan</h2>
        <p class="text-gray-700 leading-relaxed">
            {{ $result->notes ?? '-' }}
        </p>
    </div>

    <div>
        <h2 class="text-lg font-bold text-gray-800 mb-3 border-b pb-2">Detail</h2>
        <div class="flex justify-between text-sm text-gray-600">
            <span><strong>Publisher :</strong> {{ $result->uploader?->name ?? 'Unknown' }}</span>
            <span><strong>Tanggal Publish :</strong> {{ $result->created_at->format('d M Y H:i') }}</span>
        </div>
    </div> --}}
</div>
