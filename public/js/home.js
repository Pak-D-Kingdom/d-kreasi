
document.addEventListener('DOMContentLoaded', () => {
    // Mobile navbar
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (menuToggle && navLinks) {
        menuToggle.addEventListener('click', () => {
            const opened = navLinks.classList.toggle('open');
            menuToggle.setAttribute('aria-expanded', String(opened));
        });

        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('open');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // Filter portfolio
    document.querySelectorAll('[data-filter]').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('[data-filter]').forEach(item => {
                item.classList.remove('active');
            });

            button.classList.add('active');

            const filter = button.dataset.filter;

            document.querySelectorAll('.portfolio-card').forEach(card => {
                card.hidden =
                    filter !== 'all' && card.dataset.category !== filter;
            });
        });
    });

    // Buka AI Assistant Chatbot
    document.querySelectorAll('[data-ai]').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            if (window.PakdeAI && typeof window.PakdeAI.open === 'function') {
                window.PakdeAI.open();
            } else {
                const launcher = document.getElementById('pakde-ai-launcher');
                if (launcher) {
                    launcher.click();
                }
            }
        });
    });
});
