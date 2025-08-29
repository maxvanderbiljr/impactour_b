<?php

namespace App\Filament\Resources\Communities;

use App\Filament\Resources\Communities\Pages\CreateCommunity;
use App\Filament\Resources\Communities\Pages\EditCommunity;
use App\Filament\Resources\Communities\Pages\ListCommunities;
use App\Filament\Resources\Communities\Pages\ViewCommunity;
use App\Filament\Resources\Communities\Schemas\CommunityInfolist;
use App\Filament\Resources\Communities\Tables\CommunitiesTable;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Models\Community;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class CommunityResource extends Resource
{
    protected static ?string $model = Community::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $modelLabel = 'Comunidade';

    protected static ?string $pluralModelLabel = 'Comunidades';

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('nome')
                ->label('Nome')
                ->required()
                ->maxLength(255),
            TextInput::make('descricao')
                ->label('Descrição')
                ->maxLength(255),
            SpatieMediaLibraryFileUpload::make('image')
                ->collection('comunidades') // Adicionado!
                ->disk('comunidades')
                ->directory('/')
                ->image()
                ->required(),
        ]);
    }


            public static function infolist(Schema $schema): Schema
            {
                return CommunityInfolist::configure($schema);
            }



//    Listagem communitiesTable

    public static function table(Table $table): Table
    {
        return CommunitiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCommunities::route('/'),
            'create' => CreateCommunity::route('/create'),
            'view' => ViewCommunity::route('/{record}'),
            'edit' => EditCommunity::route('/{record}/edit'),
        ];
    }
}