<div>
    <section id="how-it-works" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Como Funciona</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                @foreach($steps as $step)
                    <div class="p-6 border rounded-xl">
                        <h3 class="font-semibold mb-2">{{ $step->etapa }}. {{ $step->titulo }}</h3>
                        <p class="text-gray-600">{{ $step->descricao }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>