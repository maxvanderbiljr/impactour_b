<?php

namespace App\Filament\Resources\Experiences;

use App\Filament\Resources\Experiences\Pages\CreateExperience;
use App\Filament\Resources\Experiences\Pages\EditExperience;
use App\Filament\Resources\Experiences\Pages\ListExperiences;
use App\Filament\Resources\Experiences\Pages\ViewExperience;
use App\Filament\Resources\Experiences\Schemas\ExperienceInfolist;
use App\Filament\Resources\Experiences\Tables\ExperiencesTable;
use App\Models\Experience;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder; // ADICIONADO

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $modelLabel = 'Experiência';

    protected static ?string $pluralModelLabel = 'Experiências';

    protected static ?string $recordTitleAttribute = 'titulo';

    /**
     * Formulário de criação/edição
     */
    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
               Forms\Components\TextInput::make('titulo')
                ->label('Título')
                ->required()
                ->maxLength(255),

             SpatieMediaLibraryFileUpload::make('image')
                ->collection('experiencias') // Adicionado!
                ->disk('experiencias')
                ->directory('/')
                ->image()
                ->required(),

            Forms\Components\Select::make('community_id')
                ->label('Comunidade')
                ->required()
                ->relationship('community', 'nome'),

            Forms\Components\Textarea::make('descricao')
                ->label('Descrição')
                ->required()
                ->rows(5),

            Forms\Components\TextInput::make('localizacao')
                ->label('Localização')
                ->maxLength(255),

            Forms\Components\DatePicker::make('data')
                ->label('Data'),
        ]);
    }

    /**
     * Infolist (visualização de detalhes)
     */
    public static function infolist(Schema $schema): Schema
    {
        return ExperienceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExperiencesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListExperiences::route('/'),
            'create' => CreateExperience::route('/create'),
            'view'   => ViewExperience::route('/{record}'),
            'edit'   => EditExperience::route('/{record}/edit'),
        ];
    }

    /**
     * NOVO: Filtrar experiências baseado no papel (role) do usuário
     */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user  = auth()->user();

        if ($user->hasRole('admin')) {
            return $query; // Admin vê tudo
        }

        if ($user->hasRole('aluno')) {
            return $query->where('user_id', $user->id);
        }

        if ($user->hasRole('comunidade')) {
            return $query->where('community_id', $user->community_id ?? null);
        }

        if ($user->hasRole('viajante')) {
            return $query->where('traveler_id', $user->id);
        }

        // Nenhum papel válido → não vê nada
        return $query->whereRaw('1 = 0');
    }
}