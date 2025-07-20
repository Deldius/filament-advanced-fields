<?php

namespace Deldius\AdvancedFields;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AdvancedFieldsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-advanced-fields';

    public static string $viewNamespace = 'filament-advanced-fields';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasViews(static::$viewNamespace)
            ->hasConfigFile()
            ->hasTranslations();
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        FilamentAsset::register(
            [
                Css::make(
                    'filament-advanced-fields',
                    __DIR__ . '/../resources/dist/filament-advanced-fields.css'
                )
                // ->loadedOnRequest()
                ,
            ],
            $this->getAssetPackageName()
        );
    }

    protected function getAssetPackageName(): ?string
    {
        return 'deldius/filament-advanced-fields';
    }
}
