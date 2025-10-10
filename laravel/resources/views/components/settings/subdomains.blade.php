<div class="mb-6">
    <label class="block mb-1 font-semibold">Subdomínios</label>
    <div id="subdomains-list" data-edit="{{ $edit }}">
        @foreach ($subdomains as $subdomain)
            @if(!empty($subdomain->name))
                <div class="flex mb-2 subdomain-row items-center gap-2">
                    <input type="text" name="subdomains[]" value="{{ $subdomain->name }}"
                           class="input input-bordered flex-1" placeholder="Subdomínio">
                    <div class="flex items-center w-32 mr-2">
                        <label for="subdomains_active[]" class="block mb-1 font-semibold mr-2">Ativo</label>
                        <select name="subdomains_active[]" class="select select-bordered w-32">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                    @if($edit)
                        <button type="button" class="btn btn-accent btn-sm ml-2 seed-subdomain">Migrate</button>
                        <button type="button" class="btn btn-accent btn-sm ml-2 seed-subdomain">Seed</button>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
    <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-subdomain">Adicionar subdomínio</button>
    @error('subdomains.*')
    <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addBtn = document.getElementById('add-subdomain');
        const list = document.getElementById('subdomains-list');
        const isEdit = list.getAttribute('data-edit');

        addBtn.addEventListener('click', function () {
            const div = document.createElement('div');
            div.className = 'flex mb-2 subdomain-row items-center gap-2';
            div.innerHTML = `
                <input type="text" name="subdomains[]" class="input input-bordered w-full" placeholder="Subdomínio">
                <div class="flex items-center w-32 mr-2">
                    <label for="subdomains_active[]" class="block mb-1 font-semibold mr-2">Ativo</label>
                    <select name="subdomains_active[]" class="select select-bordered w-32">
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>
            <button type="button" class="btn btn-error btn-sm ml-2 remove-subdomain">Remover</button>
                ${isEdit ? `
                <button type="button" class="btn btn-accent btn-sm ml-2 seed-subdomain">Migrate</button>
                <button type="button" class="btn btn-accent btn-sm ml-2 seed-subdomain">Seed</button>
                ` : ''}
            `;
            list.appendChild(div);
        });

        list.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-subdomain')) {
                e.target.parentElement.remove();
            }
        });
    });
</script>
