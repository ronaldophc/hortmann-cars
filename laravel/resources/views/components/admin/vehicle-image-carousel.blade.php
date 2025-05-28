<div class="carousel carousel-center md:w-160 w-full">
    @if (count($images) > 0)
        @foreach ($images as $index => $image)
            <div id="slide{{ $index + 1 }}" class="carousel-item relative flex w-full items-center">
                <a href="#slide{{ $index === 0 ? count($images) : $index }}" class="btn btn-circle z-10">❮</a>
                <div class="relative flex w-full flex-col items-center justify-center">
                    <img alt="Foto do veículo"
                        class="border-1 mx-2 h-64 w-auto rounded-2xl object-cover object-center md:h-auto md:w-1/2"
                        src="{{ asset('storage/' . $image->path) }}">
                    <div class="mt-2 flex gap-2">
                        @if ($image->is_main)
                            <span class="btn btn-success btn-outline">Capa</span>
                        @else
                            <form method="POST" action="{{ route('admin.images.update', $image->id) }}">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="vehicle_id" value="{{ $image->vehicle_id }}">
                                <button type="submit" class="btn btn-info btn-outline rounded px-2 py-1 text-xs">
                                    Definir como capa
                                </button>
                            </form>
                        @endif
                        <form method="POST" action="{{ route('admin.images.destroy', $image->id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-error btn-outline rounded px-2 py-1 text-xs">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>
                <a href="#slide{{ $index + 2 > count($images) ? 1 : $index + 2 }}" class="btn btn-circle z-10">❯</a>
            </div>
        @endforeach
    @else
        <div id="slide1" class="carousel-item relative flex w-full items-center">
            <div class="relative flex w-full flex-col items-center justify-center">
                <img alt="ecommerce" class="mx-2 h-64 w-full rounded object-cover object-center lg:h-auto lg:w-1/2"
                    src="https://placehold.co/600x400?text=Sem+Fotos">
            </div>
        </div>
    @endif
</div>