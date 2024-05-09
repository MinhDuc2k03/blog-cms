<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Post;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = auth()->id();

        $duplicate = 0;
        $newSlug = $data['slug'];
        while (Post::where('slug', $newSlug)->first() != null) {
            $duplicate += 1;
            $newSlug = $data['slug'] .= '-' . $duplicate;
        }
        $data['slug'] = $newSlug;

        $newName = explode('/', $data['thumbnail']);
        $data['thumbnail'] = $newName[1];
        return $data;
    }
}
