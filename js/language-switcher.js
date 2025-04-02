document.addEventListener('DOMContentLoaded', function() {
    const languageSwitcher = document.querySelector('.language-switcher');
    const currentLanguage = languageSwitcher.querySelector('.current-language');
    const languageDropdown = languageSwitcher.querySelector('.language-dropdown');
    const chevronIcon = currentLanguage.querySelector('.fa-chevron-down');

    function toggleDropdown() {
        const isOpen = languageDropdown.classList.contains('show');
        
        if (isOpen) {
            chevronIcon.style.transform = 'rotate(0deg)';
        } else {
            chevronIcon.style.transform = 'rotate(180deg)';
        }
        
        languageDropdown.classList.toggle('show');
        currentLanguage.setAttribute('aria-expanded', !isOpen);
    }

    function closeDropdown() {
        languageDropdown.classList.remove('show');
        currentLanguage.setAttribute('aria-expanded', 'false');
        chevronIcon.style.transform = 'rotate(0deg)';
    }

    // Toggle dropdown when clicking on current language button
    currentLanguage.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        toggleDropdown();
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!languageSwitcher.contains(e.target)) {
            closeDropdown();
        }
    });

    // Close dropdown when pressing ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && languageDropdown.classList.contains('show')) {
            closeDropdown();
        }
    });

    // Handle language selection
    languageDropdown.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const langCode = new URLSearchParams(this.getAttribute('href')).get('lang');
            if (langCode) {
                closeDropdown();
                window.location.href = `${window.location.pathname}?lang=${langCode}`;
            }
        });
    });
});