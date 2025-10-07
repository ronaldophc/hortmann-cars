<div class="glide relative">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides flex items-center justify-center">
            @foreach ($images as $index => $image)
                <li class="glide__slide">
                    <div class="relative flex flex-col items-center justify-center px-8">
                        <x-cloudinary::image public-id="{{ $image->path }}" class="max-h-128 max-w-1/2" />
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="glide__arrows absolute inset-y-0 flex w-full items-center justify-between pointer-events-none" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left btn pointer-events-auto" data-glide-dir="<">❮</button>
        <button class="glide__arrow glide__arrow--right btn pointer-events-auto" data-glide-dir=">">❯</button>
    </div>
</div>
