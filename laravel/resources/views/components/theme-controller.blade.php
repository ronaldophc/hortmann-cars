<label class="swap swap-rotate">
    <input type="checkbox" class="theme-controller" data-theme-light="corporate" data-theme-night="luxury" data-act-class="swap-active" />
    <i class="swap-off fa-solid fa-moon fa-lg"></i>
    <i class="swap-on fa-solid fa-lightbulb fa-lg"></i>
</label>

<script>
    const themeController = document.querySelector('.theme-controller');
    const lightTheme = themeController.getAttribute('data-theme-light');
    const nightTheme = themeController.getAttribute('data-theme-night');

    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        document.documentElement.setAttribute('data-theme', savedTheme);
        themeController.checked = savedTheme === nightTheme;
    }

    themeController.addEventListener('change', function() {
        const theme = this.checked ? nightTheme : lightTheme;
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
    });
</script>
