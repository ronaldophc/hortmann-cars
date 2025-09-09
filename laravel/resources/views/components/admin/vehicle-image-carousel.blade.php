<div class="glide relative">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides flex items-center justify-center">
            @if (count($images) > 0)
                @foreach ($images as $index => $image)
                    <li class="glide__slide">
                        <div class="relative flex flex-col items-center justify-center px-8">
                            <x-cloudinary::image public-id="{{ $image->path }}" class="max-h-128 max-w-1/2" />
                            <div class="mt-2 flex gap-2 pointer-events-auto">
                                @if ($image->is_main)
                                    <span class="btn btn-success btn-outline pointer-events-auto">Capa</span>
                                @else
                                    <form method="POST" action="{{ route('admin.images.update', $image->id) }}" class="pointer-events-auto">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="vehicle_id" value="{{ $image->vehicle_id }}">
                                        <button type="submit" class="btn btn-info btn-outline rounded px-2 py-1 text-xs pointer-events-auto">
                                            Definir como capa
                                        </button>
                                    </form>
                                @endif
                                <form method="POST" action="{{ route('admin.images.destroy', $image->id) }}" class="pointer-events-auto">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-error btn-outline rounded px-2 py-1 text-xs pointer-events-auto" onclick="return confirm('Tem certeza que deseja excluir esta imagem?')">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="glide__slide">
                    <div class="relative flex w-full flex-col items-center justify-center px-8">
                        <x-cloudinary::image public-id="placeholder-car.png" class="h-52" />
                    </div>
                </li>
            @endif
        </ul>
    </div>

    <div class="glide__arrows absolute inset-y-0 flex w-full items-center justify-between pointer-events-none" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left btn pointer-events-auto" data-glide-dir="<">❮</button>
        <button class="glide__arrow glide__arrow--right btn pointer-events-auto" data-glide-dir=">">❯</button>
    </div>
</div>