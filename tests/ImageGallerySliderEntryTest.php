<?php

use Deldius\AdvancedFields\ImageGallerySliderEntry;
use Illuminate\Database\Eloquent\Model;
use Filament\Infolists\Components\ImageEntry;

class StubModel extends Model
{
    public function __construct($attributes = [])
    {
        parent::__construct();
        $this->attributes = $attributes;
    }
    public function getAttribute($name)
    {
        return $this->attributes[$name] ?? null;
    }
}

class TestImageGallerySliderEntry extends ImageGallerySliderEntry
{
    public $testRecord;
    public function getRecord(bool $withContainerRecord = true): \Illuminate\Database\Eloquent\Model|array|null
    {
        return $this->testRecord;
    }
}

describe('ImageGallerySliderEntry', function () {
    it('returns empty array if no images', function () {
        $entry = new TestImageGallerySliderEntry('gallery');
        $record = new StubModel(['gallery' => null]);
        $entry->testRecord = $record;
        expect($entry->getImages())->toBeArray()->toBeEmpty();
    });

    it('returns array with one image if string', function () {
        $entry = new TestImageGallerySliderEntry('gallery');
        $record = new StubModel(['gallery' => 'img1.jpg']);
        $entry->testRecord = $record;

        $mockImageEntry = \Mockery::mock(ImageEntry::class);
        $mockImageEntry->shouldReceive('getImageUrl')->andReturnUsing(fn($img) => 'url/' . $img);
        $entry->imageEntryInstance($mockImageEntry);

        $images = $entry->getImages();
        expect($images)->toBe(['url/img1.jpg']);
    });

    it('returns array of image urls if array', function () {
        $entry = new TestImageGallerySliderEntry('gallery');
        $record = new StubModel(['gallery' => ['img1.jpg', 'img2.png']]);
        $entry->testRecord = $record;

        $mockImageEntry = \Mockery::mock(ImageEntry::class);
        $mockImageEntry->shouldReceive('getImageUrl')->andReturnUsing(fn($img) => 'url/' . $img);
        $entry->imageEntryInstance($mockImageEntry);

        $images = $entry->getImages();
        expect($images)->toBe(['url/img1.jpg', 'url/img2.png']);
    });

    it('can set and get height', function () {
        $entry = new TestImageGallerySliderEntry('gallery');
        $entry->height('500px');
        expect($entry->getHeight())->toBe('500px');
    });

    it('can set and get width', function () {
        $entry = new TestImageGallerySliderEntry('gallery');
        $entry->width('80%');
        expect($entry->getWidth())->toBe('80%');
    });
});
