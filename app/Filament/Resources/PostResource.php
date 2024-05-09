<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;

use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Manage';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Card::make()
            ->schema([
                TextInput::make('title')->required()
                ->live(onBlur: true)
                ->afterStateUpdated(function(string $operation, string $state, Forms\Set $set) {
                    $set('slug', Str::slug($state, '_'));
                }),
                TextInput::make('slug')->readOnly(),
                TextInput::make('description'),
                FileUpload::make('thumbnail')->directory('thumbnails'),
                Select::make('category_id')->label('Category')->relationship('category', 'name')->required(),
                Select::make('tag_id')->label('Tags')->multiple()->relationship('tags', 'name'),
                TextInput::make('post')->required(),
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('category.name')->sortable()->searchable(),
                TextColumn::make('post')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
