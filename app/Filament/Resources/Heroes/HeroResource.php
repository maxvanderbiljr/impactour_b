<?php

namespace App\Filament\Resources\Heroes;

use App\Filament\Resources\Heroes\Pages;
use App\Models\Hero;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
//use Filament\SpatieMediaLibraryPlugin\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables;
use Filament\Tables\Table;
use BackedEnum;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $modelLabel = 'Slide';

    protected static ?string $pluralModelLabel = 'Slides';

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema->schema([
            TextInput::make('title')
                ->label('Título')
                ->required()
                ->maxLength(255),

            Textarea::make('subtitle')
                ->label('Subtítulo')
                ->rows(3),

            SpatieMediaLibraryFileUpload::make('image')
                ->collection('slides') // Adicionado!
                ->disk('heroes')
                ->directory('/')
                ->image()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('subtitle')
                    ->label('Subtítulo')
                    ->limit(50),

                SpatieMediaLibraryImageColumn::make('image')
                    ->label('Imagem')
                    ->collection('slides') // Adicionado!
                    ->label('Imagem')
                    ->conversion('thumb')
                    ->size(60)
                    ->square(),
            ])

            ->filters([]);    
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHeroes::route('/'),
            'create' => Pages\CreateHero::route('/create'),
            'edit'   => Pages\EditHero::route('/{record}/edit'),
        ];
    }

}