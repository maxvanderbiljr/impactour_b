<div>
    <section id="experiences" class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Experiências</h2>
            <p class="text-lg text-gray-600 mb-12">
                Descubra roteiros únicos criados por alunos em parceria com comunidades.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($experiences as $experience)
                    <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
                        <h3 class="text-xl font-semibold mb-2">{{ $experience->titulo }}</h3>
                        <p class="text-gray-600 mb-4">{{ $experience->descricao }}</p>
                                <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                                    Saiba mais
                                </button>
                        {{-- Remova o route se não tiver página de detalhes --}}
                        {{-- <a href="{{ route('experiences.show', $experience->id) }}" class="text-green-600 font-medium hover:underline">Saiba mais →</a> --}}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>