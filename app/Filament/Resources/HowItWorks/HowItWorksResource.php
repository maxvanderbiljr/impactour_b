<?php

namespace App\Filament\Resources\HowItWorks;

use App\Filament\Resources\HowItWorks\Pages\CreateHowItWorks;
use App\Filament\Resources\HowItWorks\Pages\EditHowItWorks;
use App\Filament\Resources\HowItWorks\Pages\ListHowItWorks;
use App\Filament\Resources\HowItWorks\Pages\ViewHowItWorks;
use App\Filament\Resources\HowItWorks\Schemas\HowItWorksForm;
use App\Filament\Resources\HowItWorks\Schemas\HowItWorksInfolist;
use App\Filament\Resources\HowItWorks\Tables\HowItWorksTable;
use App\Models\HowItWorks;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HowItWorksResource extends Resource
{
    protected static ?string $model = HowItWorks::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $modelLabel = 'Como Funciona';

    protected static ?string $pluralModelLabel = 'Como Funciona';

    protected static ?string $recordTitleAttribute = 'titulo';
    
    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('etapa')
                ->label('Etapa')
                ->required()
                ->maxLength(255),
            TextInput::make('titulo')
                ->label('Título')
                ->required()
                ->maxLength(255),
            TextInput::make('descricao')
                ->label('Descrição')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HowItWorksInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HowItWorksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

   public static function getPages(): array
    {
        return [
            'index' => ListHowItWorks::route('/'),
            'create' => CreateHowItWorks::route('/create'),
            'view' => ViewHowItWorks::route('/{record}'),
            'edit' => EditHowItWorks::route('/{record}/edit'),
        ];
    }
}
