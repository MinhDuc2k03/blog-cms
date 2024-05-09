<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Models\Post;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['thumbnail'] == null) {
            $data['thumbnail'] = Post::where('title', $data['title'])->first()->thumbnail;
        } else {
            $newName = explode('/', $data['thumbnail']);
            $data['thumbnail'] = $newName[1];
        }
        
        return $data;
    }
}
