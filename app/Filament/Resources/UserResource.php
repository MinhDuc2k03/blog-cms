<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
            ->schema([
                TextInput::make('display_name')
                ->label('Name')
                ->live(onBlur: true)
                ->afterStateUpdated(function(string $operation, string $state, Forms\Set $set) {
                    $set('name', Str::slug($state, '_'));
                })->required(),
                TextInput::make('name')->label('Username')->maxLength(21)->readOnly(),
                TextInput::make('email')->required(),
                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->same('password_confirmation'),
                TextInput::make('password_confirmation')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(false)
                    ->label('Password Confirmation')
                    ->required(fn (string $context): bool => $context === 'create'),
                Select::make('role')
                    ->label('Role')
                    ->options([
                        '0' => 'User',
                        '1' => 'Admin',
                    ])->required(),
                ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('display_name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('role')->sortable()->searchable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
