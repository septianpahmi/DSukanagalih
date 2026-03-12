@include('frontend.partials.header')
@include('frontend.partials.navbar')
<section class="bg-white dark:bg-gray-900 mt-12">
    <div class="py-12 px-4 mx-auto max-w-screen-xl lg:py-16 ">

        <!-- Hero -->
        <div class="text-center mb-16">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl">
                Tentang SANUBARI
            </h1>
            <p class="mb-6 text-lg text-gray-600 lg:text-xl max-w-3xl mx-auto">
                Kami menyediakan SANUBARI yang transparan dan terpercaya.
                Dengan sistem digital, masyarakat dapat memberikan bantuan dengan mudah
                tanpa harus menggunakan uang tunai.
            </p>
        </div>

        <!-- About -->
        <div class="grid gap-8 lg:grid-cols-2 lg:gap-16 items-center mb-16">
            <div>
                <h2 class="mb-4 text-3xl font-bold text-gray-900">
                    Misi Kami
                </h2>
                <p class="text-gray-600 mb-4">
                    Kami percaya bahwa teknologi dapat mempermudah kebaikan.
                    Platform ini dibuat untuk membantu menyalurkan donasi
                    barang atau bantuan non tunai kepada masyarakat yang membutuhkan.
                </p>
                <p class="text-gray-600">
                    Dengan sistem yang transparan dan terorganisir,
                    setiap donasi dapat dipantau sehingga memastikan bantuan
                    sampai kepada penerima yang tepat.
                </p>
            </div>

            <div>
                <img class="rounded-lg h-64 w-full object-cover"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png"
                    alt="donasi">
            </div>
        </div>

        <!-- Features -->
        <div class="grid gap-8 mb-6 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            <div class="flex flex-col items-center bg-white rounded-lg shadow-sm md:flex-row md:max-w-xl">
                <div class="flex items-top justify-center w-full h-40 md:w-48">
                    <span class="flaticon-donation-1 text-orange-500 text-6xl"></span>
                </div>
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Berdonasi
                    </h5>
                    <p class="mb-3 font-normal text-gray-700">Salurkan bantuan Anda untuk membantu mereka yang
                        membutuhkan.
                        Setiap donasi yang Anda berikan akan memberikan dampak nyata bagi kehidupan orang lain.</p>
                </div>
            </div>
            <div class="flex flex-col items-center bg-white rounded-lg shadow-sm md:flex-row md:max-w-xl">
                <div class="flex items-top justify-center w-full h-40 md:w-48">
                    <span class="flaticon-charity text-orange-500 text-6xl"></span>
                </div>
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Menjadi Relawan</h5>
                    <p class="mb-3 font-normal text-gray-700">Bergabunglah bersama kami sebagai relawan untuk membantu
                        berbagai kegiatan sosial
                        dan memberikan manfaat langsung kepada masyarakat yang membutuhkan.</p>
                </div>
            </div>
            <div class="flex flex-col items-center bg-white rounded-lg shadow-sm md:flex-row md:max-w-xl">
                <div class="flex items-top justify-center w-full h-40 md:w-48">
                    <span class="flaticon-donation text-orange-500 text-6xl"></span>
                </div>
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Program Sponsor
                    </h5>
                    <p class="mb-3 font-normal text-gray-700">Dukung program kemanusiaan kami melalui kerja sama
                        sponsorship
                        dan berkontribusi dalam menciptakan perubahan yang lebih baik.</p>
                </div>
            </div>
        </div>

        <!-- How It Works -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-10 text-gray-900">
                Cara Kerja Kami
            </h2>

            <div class="grid md:grid-cols-3 gap-8 text-center">

                <div>
                    <div class="text-4xl font-extrabold text-orange-500 mb-2">1</div>
                    <h4 class="text-lg font-semibold mb-2">Daftar</h4>
                    <p class="text-gray-600">
                        Pengguna membuat akun untuk mulai melakukan donasi.
                    </p>
                </div>

                <div>
                    <div class="text-4xl font-extrabold text-orange-500 mb-2">2</div>
                    <h4 class="text-lg font-semibold mb-2">Unggah Donasi</h4>
                    <p class="text-gray-600">
                        Donatur mengunggah informasi barang yang ingin didonasikan.
                    </p>
                </div>

                <div>
                    <div class="text-4xl font-extrabold text-orange-500 mb-2">3</div>
                    <h4 class="text-lg font-semibold mb-2">Penyaluran</h4>
                    <p class="text-gray-600">
                        Tim atau relawan menyalurkan donasi kepada penerima yang membutuhkan.
                    </p>
                </div>

            </div>
        </div>

        <!-- CTA -->
        <div class="text-center bg-orange-50 p-10 rounded-lg">
            <h2 class="text-2xl font-bold mb-4 text-gray-900">
                Mari Berbagi Kebaikan
            </h2>
            <p class="text-gray-600 mb-6">
                Bergabunglah bersama kami untuk membantu sesama melalui donasi non tunai.
            </p>
            <a href="{{ route('register') }}"
                class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-6 py-3">
                Mulai Donasi
            </a>
        </div>

    </div>
</section>
@include('frontend.partials.footer')
