<label class="swap swap-rotate">
    <input type="checkbox" class="theme-controller" data-toggle-theme="corporate,luxury" data-act-class="swap-active" />
    <i class="swap-off fa-solid fa-moon fa-lg"></i>
    <i class="swap-on fa-solid fa-lightbulb fa-lg"></i>
</label>

<script>
    const theme = localStorage.getItem('theme');
    document.querySelector('.theme-controller').checked = theme === "luxury";
</script>
