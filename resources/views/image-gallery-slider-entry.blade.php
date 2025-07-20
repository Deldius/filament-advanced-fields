@php
$images = $getImages();
@endphp

<x-dynamic-component
    :component="$getEntryWrapperView()"
    :entry="$entry"
>
    <div {{ $getExtraAttributeBag() }}>
        <div x-data="{
            images: {{ json_encode($images) }},
            current: 0,
            next() { this.current = (this.current + 1) % this.images.length },
            prev() { this.current = (this.current - 1 + this.images.length) % this.images.length }
        }">
            <template x-if="images.length === 0">
                <div class="fi-image-gallery-slider group">
                    <div class="slider-empty-state">
                        <svg style="width: 28px; height: 28px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <div class="slider-empty-text">No images to display</div>
                    </div>
                </div>
            </template>
            <template x-if="images.length > 0">
                <div class="fi-image-gallery-slider group">
                    <div class="slider-wrapper" style="height: {{ $getHeight() }}; width: {{ $getWidth() }}">
                        <template x-for="(img, idx) in images" :key="idx">
                            <img x-show="current === idx" :src="img" class="slider-image" alt="Gallery Image" />
                        </template>
                        <div class="slider-controls">
                            <button type="button" @click="prev" class="slider-btn">
                                <svg style="width: 20px; height: 20px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                            <button type="button" @click="next" class="slider-btn">
                                <svg style="width: 20px; height: 20px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="slider-thumbnails">
                        <template x-for="(img, idx) in images" :key="idx">
                            <img :src="img" @click="current = idx" :class="{'active-thumb': current === idx}" class="slider-thumb" alt="Thumbnail" />
                        </template>
                    </div>
                </div>
            </template>
        </div>
    </div>
</x-dynamic-component>
