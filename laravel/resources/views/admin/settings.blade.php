@extends('layouts.admin')
@section('content')
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box mx-auto border p-4 text-lg">
        <legend class="fieldset-legend text-xl">Configurações da Loja</legend>

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-4 border-b border-base-300 pb-2">Logo da Loja</h3>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    
                    <div>
                        <label for="logo">Logo Principal<span class="text-error">*</span></label>
                        <input id="logo" name="logo" type="file" accept="image/png,image/jpeg,image/jpg,image/svg+xml"
                            class="file-input file-input-bordered file-input-primary mt-1 w-full text-lg">
                        <div class="text-sm text-gray-500 mt-1">
                            Formatos aceitos: PNG, JPG, JPEG, SVG. Tamanho máximo: 2MB
                        </div>
                        @error('logo')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-semibold mb-2">Logo Atual</label>
                        @if(isset($settings->logo) && $settings->logo)
                            <div class="relative">
                                <div class="bg-white border-2 border-gray-200 rounded-lg p-4 flex items-center justify-center h-32">
                                    <img src="{{ asset('storage/' . $settings->logo) }}" 
                                         alt="Logo da loja" 
                                         class="max-h-24 max-w-full object-contain">
                                </div>
                                <button type="button" 
                                        onclick="removeLogo()" 
                                        class="absolute -top-2 -right-2 btn btn-circle btn-sm btn-error">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        @else
                            <div class="bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg p-8 flex flex-col items-center justify-center h-32">
                                <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-500 text-sm">Nenhuma logo carregada</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Logo Alternativa (para modo escuro, etc.) -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mt-4">
                    <div>
                        <label for="logo_alt">Logo Alternativa (opcional)</label>
                        <input id="logo_alt" name="logo_alt" type="file" accept="image/png,image/jpeg,image/jpg,image/svg+xml"
                            class="file-input file-input-bordered mt-1 w-full text-lg">
                        <div class="text-sm text-gray-500 mt-1">
                            Logo para usar em fundos escuros
                        </div>
                        @error('logo_alt')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-semibold mb-2">Logo Alternativa Atual</label>
                        @if(isset($settings->logo_alt) && $settings->logo_alt)
                            <div class="relative">
                                <div class="bg-gray-800 border-2 border-gray-200 rounded-lg p-4 flex items-center justify-center h-32">
                                    <img src="{{ asset('storage/' . $settings->logo_alt) }}" 
                                         alt="Logo alternativa da loja" 
                                         class="max-h-24 max-w-full object-contain">
                                </div>
                                <button type="button" 
                                        onclick="removeLogoAlt()" 
                                        class="absolute -top-2 -right-2 btn btn-circle btn-sm btn-error">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        @else
                            <div class="bg-gray-800 border-2 border-dashed border-gray-600 rounded-lg p-8 flex flex-col items-center justify-center h-32">
                                <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-400 text-sm">Nenhuma logo alternativa</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>


            <!-- Informações de Contato -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-4 border-b border-base-300 pb-2">Informações de Contato</h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                    
                    <div>
                        <label for="phone_1">Telefone Principal<span class="text-error">*</span></label>
                        <input id="phone_1" name="phone_1" type="tel" value="{{ $settings->phone_1 ?? old('phone_1') }}"
                            placeholder="(00) 00000-0000"
                            class="input mt-1 block w-full text-lg" required>
                        @error('phone_1')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="phone_2">Telefone Secundário</label>
                        <input id="phone_2" name="phone_2" type="tel" value="{{ old('phone_2', $settings->phone_2 ?? '') }}"
                            placeholder="(00) 00000-0000"
                            class="input mt-1 block w-full text-lg">
                        @error('phone_2')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="email">E-mail para Contato<span class="text-error">*</span></label>
                        <input id="email" name="email" type="email" value="{{ old('email', $settings->email ?? '') }}"
                            placeholder="contato@loja.com.br"
                            class="input mt-1 block w-full text-lg" required>
                        @error('email')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="address">Endereço Completo</label>
                        <input id="address" name="address" type="text" value="{{ old('address', $settings->address ?? '') }}"
                            placeholder="Rua, número, bairro, cidade - UF"
                            class="input mt-1 block w-full text-lg">
                        @error('address')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="opening_hours">Horário de Funcionamento</label>
                        <input id="opening_hours" name="opening_hours" type="text" value="{{ old('opening_hours', $settings->opening_hours ?? '') }}"
                            placeholder="Seg-Sex: 8h às 18h"
                            class="input mt-1 block w-full text-lg">
                        @error('opening_hours')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Redes Sociais -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-4 border-b border-base-300 pb-2">Redes Sociais</h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    
                    <div>
                        <label for="instagram_url">Instagram</label>
                        <label class="input mt-1 w-full text-lg flex items-center gap-2">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                            <input id="instagram_url" name="instagram_url" type="url" value="{{ old('instagram_url', $settings->instagram_url ?? '') }}"
                                placeholder="https://instagram.com/sua_loja" class="grow text-lg">
                        </label>
                        @error('instagram_url')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="facebook_url">Facebook</label>
                        <label class="input mt-1 w-full text-lg flex items-center gap-2">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <input id="facebook_url" name="facebook_url" type="url" value="{{ old('facebook_url', $settings->facebook_url ?? '') }}"
                                placeholder="https://facebook.com/sua_loja" class="grow text-lg">
                        </label>
                        @error('facebook_url')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="linkedin_url">LinkedIn</label>
                        <label class="input mt-1 w-full text-lg flex items-center gap-2">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                            <input id="linkedin_url" name="linkedin_url" type="url" value="{{ old('linkedin_url', $settings->linkedin_url ?? '') }}"
                                placeholder="https://linkedin.com/company/sua_loja" class="grow text-lg">
                        </label>
                        @error('linkedin_url')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="x_url">X (Twitter)</label>
                        <label class="input mt-1 w-full text-lg flex items-center gap-2">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                            <input id="x_url" name="x_url" type="url" value="{{ old('x_url', $settings->x_url ?? '') }}"
                                placeholder="https://x.com/sua_loja" class="grow text-lg">
                        </label>
                        @error('x_url')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Localização -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-4 border-b border-base-300 pb-2">Localização</h3>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="google_maps_url">Link do Google Maps</label>
                        <label class="input mt-1 w-full text-lg flex items-center gap-2">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <input id="google_maps_url" name="google_maps_url" type="url" value="{{ old('google_maps_url', $settings->google_maps_url ?? '') }}"
                                placeholder="https://maps.google.com/..." class="grow text-lg">
                        </label>
                        <div class="text-sm text-gray-500 mt-1">
                            Cole aqui o link do Google Maps da sua loja
                        </div>
                        @error('google_maps_url')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="google_maps_embed">Código de Incorporação do Google Maps</label>
                        <textarea id="google_maps_embed" name="google_maps_embed" class="textarea mt-1 block w-full text-lg h-24"
                            placeholder='<iframe src="https://www.google.com/maps/embed?..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'>{{ old('google_maps_embed', $settings->google_maps_embed ?? '') }}</textarea>
                        <div class="text-sm text-gray-500 mt-1">
                            Cole aqui o código iframe do Google Maps para exibir o mapa na página
                        </div>
                        @error('google_maps_embed')
                            <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-4">
                <button type="submit" class="btn btn-primary cursor-pointer text-lg">Salvar Configurações</button>
            </div>
        </form>
    </fieldset>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const phoneInputs = document.querySelectorAll('input[type="tel"]');
        phoneInputs.forEach(input => {
            input.addEventListener('input', (e) => {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length <= 11) {
                    value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
                    if (value.length < 14) {
                        value = value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
                    }
                }
                e.target.value = value;
            });
        });
    });
</script>