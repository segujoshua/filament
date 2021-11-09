<?php

namespace Filament\Resources\Pages;

use Filament\Pages\Page as BasePage;

class Page extends BasePage
{
    protected static ?string $breadcrumb = null;

    protected static string $resource;

    public static function routeTo(string $path, string $name): array
    {
        return [
            'name' => $name,
            'page' => static::class,
            'path' => $path,
        ];
    }

    public static function getBreadcrumb(): string
    {
        return static::$breadcrumb ?? static::getTitle();
    }

    protected static function getBreadcrumbs(): array
    {
        $resource = static::getResource();

        return [
            $resource::getUrl() => $resource::getBreadcrumb(),
            static::getBreadcrumb(),
        ];
    }

    public static function getResource(): string
    {
        return static::$resource;
    }
}
