<!-- filepath: c:\laragon\www\impactour_b\resources\views\filament\widgets\account-custom-widget.blade.php -->
<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center gap-4" style="display: flex !important; align-items: center !important; gap: 1rem !important;">
            <!-- Avatar -->
            <div style="flex-shrink: 0;">
                <img 
                    src="{{ $this->getProfileImage() ?: 'https://ui-avatars.com/api/?name=' . urlencode($this->getUser()->name) }}"
                    alt="Foto de Perfil" 
                    style="width: 4rem !important; height: 4rem !important; border-radius: 50% !important; object-fit: cover !important; border: 2px solid #e5e7eb !important; box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05) !important;"
                />
            </div>
            <!-- Textos lado a lado do avatar -->
            <div style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                <div style="font-weight: 600; color: #111827; font-size: 1rem; line-height: 1.5;">
                    Bem-vindo(a)
                </div>
                <div style="color: #6b7280; font-size: 0.875rem; line-height: 1.25;">
                    {{ $this->getUser()->name_profile }}
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>