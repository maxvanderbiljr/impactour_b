<x-filament-panels::page>
    <form wire:submit="save">
        <div class="mb-4">
            {{ $this->form }}
        </div>
        <br>
        <div class="mt-8 flex justify-start"> {{-- Alinha à esquerda e separa do campo --}}
            @foreach($this->getFormActions() as $action)
                {{ $action }}
            @endforeach
        </div>
    </form>
</x-filament-panels::page>