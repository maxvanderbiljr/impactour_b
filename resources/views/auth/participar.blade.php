  <x-layouts.app>
    <main class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-center mb-6 text-green-600">Participe do Impactour Brasil</h1>
            <form method="POST" action="{{ route('participar') }}">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Nome</label>
                    <input type="text" name="name" class="w-full border rounded-lg px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">E-mail</label>
                    <input type="email" name="email" class="w-full border rounded-lg px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Senha</label>
                    <input type="password" name="password" class="w-full border rounded-lg px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" class="w-full border rounded-lg px-3 py-2" required>
                </div>
                <div class="mb-6">
                    <label class="block mb-1 font-medium">Selecione seu perfil</label>
                    <select name="role" class="w-full border rounded-lg px-3 py-2" required>
                        <option value="aluno">Aluno</option>
                        <option value="comunidade">Comunidade</option>
                        <option value="viajante">Viajante</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
                    Cadastrar
                </button>
            </form>
            <p class="text-center text-sm mt-4">
                Já tem conta?
                <a href="{{ url('/admin/login') }}" class="text-green-600 font-semibold">Entrar</a>
            </p>
        </div>
    </main>
</x-layouts.app>
