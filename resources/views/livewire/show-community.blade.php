<main class="mt-[96px]">
<br><br>
    <section id="community" class="py-16 bg-white scroll-mt-48">
        <div class="max-w-2xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Comunidade Parceira</h2>
            <p class="text-lg text-gray-600 mb-12 text-center">
                Experiência criada e conduzida em colaboração com a comunidade local.
            </p>
            <div class="bg-green-50 rounded-xl shadow p-8 flex flex-col items-center">
                    @if($community->getFirstMediaUrl('comunidades'))
                        <img src="{{ $community->getFirstMediaUrl('comunidades') }}" alt="{{ $community->nome }}" class="w-20 h-20 object-cover rounded-full border-4 border-white shadow mb-6">
                    @endif
                <h3 class="text-2xl font-semibold mb-2 text-gray-800">{{ $community->nome }}</h3>
                @if($community->localizacao)
                    <p class="text-gray-500 mb-2">
                        <svg class="inline w-5 h-5 text-green-600 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 12.414a4 4 0 10-5.657 5.657l4.243 4.243a8 8 0 0011.314-11.314l-4.243-4.243a4 4 0 00-5.657 5.657l4.243 4.243z" />
                        </svg>
                        {{ $community->localizacao }}
                    </p>
                @endif
                <p class="text-gray-700 mt-4 text-center">{{ $community->descricao }}</p>
            </div>
        </div>
    </section>
</main>