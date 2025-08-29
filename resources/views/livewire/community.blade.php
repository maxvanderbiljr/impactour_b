<div>
  <section id="community" class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Comunidades Parceiras</h2>
        <p class="text-lg text-gray-600 mb-12">
            Experiências criadas e conduzidas em colaboração com comunidades locais.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($comunidades as $comunidade)
                <div class="p-6 bg-green-50 rounded-xl shadow">
                    <h3 class="text-xl font-semibold mb-2">{{ $comunidade->nome }}</h3>
                    <p class="text-gray-600">{{ $comunidade->descricao }}</p>
                    @if($comunidade->imagem)
                        <img src="{{ asset('storage/' . $comunidade->imagem) }}" alt="{{ $comunidade->nome }}" class="mx-auto mt-4 rounded-lg max-h-40">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
</div>