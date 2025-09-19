<main>
   <div class="p-6 bg-green-50 rounded-xl shadow">
        <h3 class="text-xl font-semibold mb-2">{{ $community->nome }}</h3>
            <p class="text-gray-600">{{ $community->descricao }}</p>
            @if($community->getFirstMediaUrl('comunidades'))
                <img src="{{ $community->getFirstMediaUrl('comunidades') }}" alt="{{ $community->nome }}" class="mx-auto mt-4 rounded-lg max-h-40">
            @endif  
    </div>
</main>