@extends('layouts.public')

@section('content')
    <!-- Hero Section com Imagens -->
    <section class="relative bg-gradient-to-r from-base-300 via-base-200 to-base-300">
        <div class="container mx-auto px-5 py-12">
            <div class="flex flex-wrap lg:flex-nowrap">
                @php
                    $images = $vehicle->getOrderedImages() ?? [];
                @endphp

                    <!-- Galeria de Imagens -->
                <div class="w-full lg:w-2/3 lg:pr-8">
                    @if (count($images) > 0)
                        <x-public.vehicle-image-carousel :images="$images" class="w-full rounded-lg shadow-2xl" />
                    @else
                        <div class="relative flex w-full flex-col items-center justify-center bg-base-200 rounded-lg shadow-2xl h-96">
                            <x-cloudinary::image public-id="placeholder-car.png" class="h-64 rounded" />
                        </div>
                    @endif
                </div>

                <!-- Informações Principais -->
                <div class="w-full lg:w-1/3 mt-8 lg:mt-0">
                    <div class="bg-base-100 rounded-lg shadow-2xl p-8 sticky top-8 border border-base-300">
                        <div class="border-b border-base-300 pb-6 mb-6">
                            <h1 class="text-3xl font-bold text-base-content mb-2">
                                {{ $vehicle->getAttributeFormated('manufacturer') }}
                                {{ $vehicle->getAttributeFormated('model') }}
                            </h1>
                            <div class="flex items-center text-sm text-base-content/70">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                {{ $vehicle->getAttributeFormated('year') }}
                                <span class="mx-2">•</span>
                                <i class="fas fa-road mr-2"></i>
                                {{ $vehicle->getAttributeFormated('mileage') }}
                            </div>
                        </div>

                        <!-- Preço Destacado -->
                        <div class="text-center mb-8">
                            <div class="text-4xl font-bold text-success mb-2">
                                <span class="price-display">R$ {{ $vehicle->price }}</span>
                            </div>
                            <p class="text-base-content/60 text-sm">Preço à vista</p>
                        </div>

                        <!-- Botões de Ação -->
                        <div class="space-y-3 mb-6">
                            <a href="#" class="btn btn-success w-full text-lg">
                                <i class="fab fa-whatsapp mr-2 text-xl"></i>
                                WhatsApp
                            </a>
                            <a href="#" class="btn btn-primary w-full">
                                <i class="fas fa-phone mr-2"></i>
                                Ligar Agora
                            </a>
                            <button class="btn btn-outline w-full">
                                <i class="fas fa-heart mr-2"></i>
                                Favoritar
                            </button>
                        </div>

                        <!-- Badges de Destaque -->
                        <div class="flex flex-wrap gap-2">
                            <div class="badge badge-primary">
                                <i class="fas fa-shield-alt mr-1"></i>
                                Garantia
                            </div>
                            <div class="badge badge-success">
                                <i class="fas fa-certificate mr-1"></i>
                                Revisado
                            </div>
                            <div class="badge badge-secondary">
                                <i class="fas fa-star mr-1"></i>
                                Premium
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Detalhes Técnicos -->
    <section class="py-16 bg-base-200">
        <div class="container mx-auto px-5">
            <h2 class="text-3xl font-bold text-center mb-12 text-base-content">Especificações Técnicas</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition duration-300">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-car text-primary-content text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-base-content">Tipo</h3>
                                <p class="text-base-content/70">{{ $vehicle->getAttributeFormated('type') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition duration-300">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-success rounded-full flex items-center justify-center">
                                    <i class="fas fa-gas-pump text-success-content text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-base-content">Combustível</h3>
                                <p class="text-base-content/70">{{ $vehicle->getAttributeFormated('fuel_type') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition duration-300">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center">
                                    <i class="fas fa-steering-wheel text-secondary-content text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-base-content">Direção</h3>
                                <p class="text-base-content/70">{{ $vehicle->getAttributeFormated('steering_type') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition duration-300">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-error rounded-full flex items-center justify-center">
                                    <i class="fas fa-door-open text-error-content text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-base-content">Portas</h3>
                                <p class="text-base-content/70">{{ $vehicle->getAttributeFormated('doors') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition duration-300">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-warning rounded-full flex items-center justify-center">
                                    <i class="fas fa-cogs text-warning-content text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-base-content">Transmissão</h3>
                                <p class="text-base-content/70">{{ $vehicle->getAttributeFormated('transmission') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition duration-300">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-info rounded-full flex items-center justify-center">
                                    <i class="fas fa-calendar text-info-content text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-base-content">Ano</h3>
                                <p class="text-base-content/70">{{ $vehicle->getAttributeFormated('year') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Descrição -->
    @if (!empty($vehicle->description))
        <section class="py-16 bg-base-100">
            <div class="container mx-auto px-5">
                <div class="max-w-4xl mx-auto">
                    <h2 class="text-3xl font-bold text-center mb-8 text-base-content">Sobre este Veículo</h2>
                    <div class="card bg-base-200 shadow-xl">
                        <div class="card-body">
                            <p class="text-base-content leading-relaxed text-lg">{{ $vehicle->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Seção de Contato -->
    <section class="py-16 bg-gradient-to-r from-primary to-primary-focus">
        <div class="container mx-auto px-5 text-center">
            <div class="max-w-2xl mx-auto text-primary-content">
                <h2 class="text-3xl font-bold mb-4">Interessado neste veículo?</h2>
                <p class="text-xl mb-8 opacity-90">Entre em contato conosco e agende um test drive!</p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#" class="btn btn-success btn-lg">
                        <i class="fab fa-whatsapp mr-2 text-xl"></i>
                        WhatsApp
                    </a>
                    <a href="#" class="btn btn-outline btn-lg text-primary-content border-primary-content hover:bg-primary-content hover:text-primary">
                        <i class="fas fa-phone mr-2"></i>
                        (11) 99999-9999
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Veículos Relacionados -->
    <section class="py-16 bg-base-200">
        <div class="container mx-auto px-5">
            <h2 class="text-3xl font-bold text-center mb-12 text-base-content">Você também pode gostar</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition duration-300">
                        <figure class="h-48 bg-base-300">
                            <!-- Placeholder para imagem -->
                        </figure>
                        <div class="card-body">
                            <h3 class="card-title text-base-content">Veículo Relacionado {{ $i }}</h3>
                            <p class="text-base-content/70">Ano • Quilometragem</p>
                            <div class="card-actions justify-between items-center mt-4">
                                <span class="text-2xl font-bold text-success">R$ 000.000</span>
                                <a href="#" class="btn btn-primary">
                                    Ver Mais
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const priceSpan = document.querySelector('.price-display');
            if (priceSpan) {
                let value = priceSpan.textContent.replace(/\D/g, '');
                if (value) {
                    value = (parseInt(value, 10) / 100).toLocaleString('pt-BR', { minimumFractionDigits: 2 });
                    priceSpan.textContent = `R$ ${value}`;
                }
            }

            // Animação de entrada nos cards
            const cards = document.querySelectorAll('.card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            });

            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
@endsection
