<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Illuminate\Support\HtmlString;
use BackedEnum;

class ProfilePage extends Page implements HasForms, HasActions
{

    use InteractsWithForms;
    use InteractsWithActions;

    public function getHeading(): string
    {
        return 'Meu Perfil';
    }

    protected static ?string $navigationLabel = 'Meu Perfil';

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-user';

    protected string $view = 'filament.pages.profile-page';

    

    public ?array $data = [];
    public bool $showPhotoUpload = false;

    public function mount(): void
    {
        $user = Auth::user();
        
        $this->form->fill([
            'name_profile' => $user->name_profile ?? '',
            'endereco' => $user->endereco ?? '',
            'telefone' => $user->telefone ?? '',
        ]);
    }

    public function form($form)
    {
        return $form
            ->model(Auth::user())
            ->schema([
                // Exibição da foto atual
                Placeholder::make('current_photo_display')
                    ->label('Foto de Perfil')
                    ->content(function () {
                        return new HtmlString($this->getCurrentPhotoHtml());
                    })
                    ->visible(!$this->showPhotoUpload)
                    ->columnSpanFull(),
                
                // Campo de upload regular (sem MediaLibrary para evitar loops)
                FileUpload::make('new_profile_image')
                    ->label('Nova Foto de Perfil')
                    ->disk('public')
                    ->directory('profile-photos')
                    ->visibility('public')
                    ->image()
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('300')
                    ->imageResizeTargetHeight('300')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->visible($this->showPhotoUpload)
                    ->helperText('Selecione uma nova foto para substituir a atual')
                    ->columnSpanFull()
                    //->placeholder('Clique aqui para selecionar uma nova imagem')
                    ->imagePreviewHeight('150'),

                TextInput::make('name_profile')
                    ->label('Nome do Perfil')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                    
                TextInput::make('endereco')
                    ->label('Endereço')
                    ->maxLength(255),
                    
                TextInput::make('telefone')
                    ->label('Telefone')
                    ->maxLength(20),
            ])
            ->columns(2)
            ->statePath('data');
    }

    public function getUser()
    {
        return Auth::user();
    }

    public function getProfileImage()
    {
        $user = $this->getUser();
        return $user->getFirstMediaUrl('profile') ?: null;
    }

    private function getCurrentPhotoHtml(): string
    {
        $user = $this->getUser();
        $profileImageUrl = $this->getProfileImage();
        
        // Avatar padrão melhorado
        $imageUrl = $profileImageUrl ?: $this->getDefaultAvatarUrl();
        $hasCustomPhoto = (bool) $profileImageUrl;
        
        $statusText = $hasCustomPhoto ? 'Sua foto atual' : 'Avatar gerado automaticamente';
        $actionText = $hasCustomPhoto ? 
            'Use o botão "Atualizar Foto" para alterar' : 
            'Use o botão "Atualizar Foto" para adicionar uma foto personalizada';

        return "
            <div class='flex flex-col items-center space-y-6 py-6'>
                <div class='relative'>
                    <img 
                        src='{$imageUrl}'
                        alt='Foto de Perfil'
                        style='width: 8rem !important; height: 8rem !important; border-radius: 50% !important; object-fit: cover !important; border: 4px solid #e5e7eb !important; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -1px rgb(0 0 0 / 0.06) !important;'
                        onerror=\"this.src='{$this->getDefaultAvatarUrl()}';\"
                    />
                </div>
                
                <div class='text-center space-y-2'>
                    <p class='text-sm font-semibold text-gray-700 dark:text-gray-300'>{$statusText}</p>
                    <p class='text-xs text-gray-500 dark:text-gray-400 max-w-sm'>{$actionText}</p>
                </div>
            </div>
        ";
    }

    private function getDefaultAvatarUrl(): string
    {
        $user = Auth::user();
        $name = $user->name_profile ?? $user->name ?? 'User';
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&size=200&background=f3f4f6&color=6b7280&font-size=0.6&rounded=true&format=svg';
    }

    public function togglePhotoUpload()
    {
        $this->showPhotoUpload = !$this->showPhotoUpload;
        
        // Garantir campo limpo quando abrir o upload
        if ($this->showPhotoUpload) {
            // Limpar completamente o campo de upload
            $this->data['new_profile_image'] = null;
            $this->form->fill($this->data);
        }
    }

    public function save()
    {
        try {
            $user = Auth::user();
            $data = $this->form->getState();

            // Atualizar dados básicos
            $user->update([
                'name_profile' => $data['name_profile'],
                'endereco' => $data['endereco'],
                'telefone' => $data['telefone'],
            ]);
            
            // Processar nova foto (upload via FileUpload regular)
            if ($this->showPhotoUpload && isset($data['new_profile_image']) && $data['new_profile_image']) {
                // Limpar collection anterior do MediaLibrary
                $user->clearMediaCollection('profile');
                
                // Adicionar nova foto à collection usando MediaLibrary
                $user->addMediaFromDisk($data['new_profile_image'], 'public')
                    ->toMediaCollection('profile');
                
                $this->showPhotoUpload = false;
                
                Notification::make()
                    ->title('Foto atualizada!')
                    ->body('Sua nova foto de perfil foi salva com sucesso.')
                    ->success()
                    ->send();
            }

            Notification::make()
                ->title('Perfil atualizado!')
                ->body('Suas informações foram salvas com sucesso.')
                ->success()
                ->send();

            // Redireciona para o painel do Filament
        return redirect()->route('filament.admin.pages.dashboard');

        } catch (\Exception $e) {
            Notification::make()
                ->title('Erro ao salvar')
                ->body('Ocorreu um erro: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Salvar Alterações')
                ->action('save')
                ->color('success')
                ->icon('heroicon-o-check'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('updatePhoto')
                ->label($this->showPhotoUpload ? 'Cancelar' : 'Atualizar Foto')
                ->icon($this->showPhotoUpload ? 'heroicon-o-x-mark' : 'heroicon-o-camera')
                ->color($this->showPhotoUpload ? 'gray' : 'primary')
                ->action('togglePhotoUpload'),
        ];
    }
}