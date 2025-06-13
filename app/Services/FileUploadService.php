<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

interface IFileUploadService
{
    public function move(
        Model $model,
        string $basePath,
        string $mainImageField = null,
        string $galleryField = null,
        string $subPath = null
    ): void;
}

class FileUploadService implements IFileUploadService
{
    public function move(
        Model $model,
        string $basePath,
        string $mainImageField = null,
        string $galleryField = null,
        string $subPath = null
    ): void {
        $modelId = $model->getKey();
        $storageRoot = storage_path("app/public/{$basePath}");
        $modelPath = "{$storageRoot}/{$modelId}";
        $galleryPath = "{$modelPath}/gallery";
        $subDirectory = "{$storageRoot}/{$subPath}";

        if (!empty($model->$mainImageField) && is_null($subPath)) {
            File::ensureDirectoryExists($modelPath);

            $filename = basename($model->$mainImageField);
            $source = storage_path("app/public/{$model->$mainImageField}");
            $target = "{$modelPath}/{$filename}";

            if (File::exists($source)) {
                File::move($source, $target);
            }

            $model->$mainImageField = "{$basePath}/{$modelId}/{$filename}";
            $model->save();
        }

        if (!empty($model->$mainImageField) && !empty($subPath)) {
            File::ensureDirectoryExists($subDirectory);

            $filename = basename($model->$mainImageField);
            $source = storage_path("app/public/{$model->$mainImageField}");
            $target = "{$subDirectory}/{$filename}";

            if (File::exists($source)) {
                File::move($source, $target);
            }

            $model->$mainImageField = "{$basePath}/{$subPath}/{$filename}";
            $model->save();
        }

        // Move gallery images
        if (!empty($model->$galleryField)) {
            File::ensureDirectoryExists($galleryPath);

            $updatedGallery = collect($model->$galleryField)->map(function ($path) use ($modelId, $basePath, $galleryPath) {
                $filename = basename($path);
                $source = storage_path("app/public/{$path}");
                $target = "{$galleryPath}/{$filename}";

                if (File::exists($source)) {
                    File::move($source, $target);
                }

                return "{$basePath}/{$modelId}/gallery/{$filename}";
            })->toArray();

            $model->$galleryField = $updatedGallery;
            $model->save();
        }
    }
}
