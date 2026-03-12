@include('frontend.components.dashboard.partials.header')
@include('frontend.components.dashboard.partials.navbar')
@include('frontend.components.dashboard.partials.sidebar')
<div class="p-4 sm:ml-64 mt-14">
    <div class="p-4 border border-dashed rounded-lg border-gray-300">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">
            Dashboard
        </h1>
        <div
            class="relative overflow-hidden rounded-xl bg-gradient-to-r from-orange-500 to-orange-400 text-white shadow-lg p-6">

            <!-- Decorative Circle -->
            <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full"></div>
            <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full"></div>

            <div class="relative z-10 flex items-center justify-between flex-wrap gap-4">

                <div>
                    <h5 class="text-2xl font-bold mb-2">
                        Selamat Datang,
                        <span class="underline decoration-white/40">
                            {{ Auth::user()->name }}
                        </span>
                    </h5>

                    <p class="text-white/90">
                        Ini adalah halaman dashboard Anda. Kelola data dan aktivitas sistem dengan mudah.
                    </p>
                </div>

                {{-- <div class="hidden md:flex items-center gap-3">
                    <div class="bg-white/20 backdrop-blur px-4 py-2 rounded-lg text-sm">
                        {{ now()->format('d M Y') }}
                    </div>
                </div> --}}

            </div>

        </div>

    </div>
</div>
@include('frontend.components.dashboard.partials.footer')
