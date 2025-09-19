<main>
  <section id="community" class="py-16 bg-white mt-32">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Comunidades Parceiras</h2>
            <p class="text-lg text-gray-600 mb-12">
                Experiências criadas e conduzidas em colaboração com comunidades locais.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @if ($communities->isNotEmpty())
            @foreach($communities as $community)
                    <a href="{{ route('comunidade', $community->id) }}" class="block">
                        <div class="p-6 bg-green-50 rounded-xl shadow hover:bg-green-100 transition">
                            <h3 class="text-xl font-semibold mb-2">{{ $community->nome }}</h3>
                            <p class="text-gray-600">{{ $community->descricao }}</p>
                           @if($community->getFirstMediaUrl('comunidades'))
                                <img src="{{ $community->getFirstMediaUrl('comunidades') }}" alt="{{ $community->nome }}" class="mx-auto mt-4 rounded-lg max-h-40">
                            @endif
                        </div>
                    </a>
            @endforeach
            @endif
            </div>
        </div>
    </section>
</main>