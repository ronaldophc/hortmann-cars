<div class="mb-6">
    <label class="block mb-1 font-semibold">Subdomínios</label>
    <div id="subdomains-list">
        @foreach ($subdomains as $subdomain)
            <div class="flex mb-2 subdomain-row">
                <input type="text" name="subdomains[]" value="{{ $subdomain }}"
                       class="input input-bordered w-full" placeholder="Subdomínio">
                <button type="button" class="btn btn-error btn-sm ml-2 remove-subdomain">Remover</button>
            </div>
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

        addBtn.addEventListener('click', function () {
            const div = document.createElement('div');
            div.className = 'flex mb-2 subdomain-row';
            div.innerHTML = `
                <input type="text" name="subdomains[]" class="input input-bordered w-full" placeholder="Subdomínio">
                <button type="button" class="btn btn-error btn-sm ml-2 remove-subdomain">Remover</button>
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
