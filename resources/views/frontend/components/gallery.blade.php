 <section class="bg-white pt-24" id="galeri">
     <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
         <h2 class="mb-2 text-2xl font-bold text-gray-900 text-center">Galeri Kegiatan</h2>

         <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-8">
             @foreach ($galeries as $galeri)
                 <div>
                     <img class="h-auto max-w-full rounded-base" src="storage/{{ $galeri->image }}"
                         alt="{{ $galeri->title }}">
                 </div>
             @endforeach

         </div>
     </div>
 </section>
