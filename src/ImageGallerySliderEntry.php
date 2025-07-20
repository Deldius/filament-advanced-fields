<?php

namespace Deldius\AdvancedFields;

use Filament\Infolists\Components\Entry;
use Filament\Infolists\Components\ImageEntry;

class ImageGallerySliderEntry extends Entry
{
    protected string $view = 'filament-advanced-fields::image-gallery-slider-entry';

    protected string $height = '240px';
    protected string $width = '100%';

    public function getImages(): array
    {
        $images = $this->getRecord()->getAttribute($this->getName());

        if (!$images) {
            return [];
        }

        if (is_string($images)) {
            $images = [$images];
        }

        $imageEntryInstance = new ImageEntry('tmp');

        array_walk($images, function (&$image) use ($imageEntryInstance) {
            $image = $imageEntryInstance->getImageUrl($image);
        });

        return $images;
    }

    public function height(string $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function width(string $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function getWidth(): string
    {
        return $this->width;
    }
}
