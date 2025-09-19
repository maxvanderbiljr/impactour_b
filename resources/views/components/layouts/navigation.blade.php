<div>
   <nav class="fixed top-0 left-0 w-full bg-white shadow z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
            <a href="{{ route('inicio') }}" class="text-2xl font-bold text-green-600">Impactour Brasil</a>
            <ul class="hidden md:flex gap-6 text-gray-700 font-medium">
                <li><a href="{{ route('inicio') }}" class="hover:text-green-600">Início</a></li>
                <li><a href="{{ route('comunidades') }}" class="hover:text-green-600">Comunidades</a></li>
                <li><a href="#experiences" class="hover:text-green-600">Experiências</a></li>
                <li><a href="#how-it-works" class="hover:text-green-600">Como Funciona</a></li>
                <li><a href="#impact" class="hover:text-green-600">Impacto</a></li>
            </ul>
            <a href="{{ route('participar') }}" class="hidden md:block px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                Participe
            </a>
        </div>
    </nav>
</div>