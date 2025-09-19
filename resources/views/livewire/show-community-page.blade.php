<main class="mt-[96px]">
    <br><br>
    <section id="community" class="py-16 bg-white scroll-mt-48">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Comunidades Parceiras</h2>
            <p class="text-lg text-gray-600 mb-12">
                Experiências criadas e conduzidas em colaboração com comunidades locais.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @if ($communities->isNotEmpty())
                    @foreach ($communities as $community)
                        <x-community-page-card :community="$community" />
                    @endforeach
                @endif
            </div>
        </div>
    </section>
</main>