/* WEBIA template gallery: client-side category and search filters */
document.addEventListener('DOMContentLoaded', () => {
    const grid = document.getElementById('webia-gallery-grid');
    if (!grid) return;

    const cards = Array.from(grid.querySelectorAll('.webia-gallery-card'));
    const filters = Array.from(document.querySelectorAll('.webia-gallery-filters [data-category]'));
    const search = document.getElementById('webia-template-search');
    const count = document.getElementById('webia-template-count');
    const empty = document.getElementById('webia-gallery-empty');
    const reset = document.getElementById('webia-gallery-reset');
    let activeCategory = 'all';

    const applyFilters = () => {
        const term = (search?.value || '').trim().toLowerCase();
        let visible = 0;

        cards.forEach((card) => {
            const categoryMatch = activeCategory === 'all' || card.dataset.category === activeCategory;
            const searchMatch = !term || (card.dataset.search || '').includes(term);
            const show = categoryMatch && searchMatch;
            card.hidden = !show;
            if (show) visible += 1;
        });

        if (count) {
            count.textContent = `Menampilkan ${visible} inspirasi`;
        }
        if (empty) {
            empty.hidden = visible !== 0;
        }
    };

    filters.forEach((button) => {
        button.addEventListener('click', () => {
            activeCategory = button.dataset.category || 'all';
            filters.forEach((filter) => {
                const isActive = filter === button;
                filter.classList.toggle('is-active', isActive);
                filter.setAttribute('aria-pressed', String(isActive));
            });
            applyFilters();
        });
    });

    search?.addEventListener('input', applyFilters);

    reset?.addEventListener('click', () => {
        activeCategory = 'all';
        if (search) search.value = '';
        filters.forEach((filter) => {
            const isActive = filter.dataset.category === 'all';
            filter.classList.toggle('is-active', isActive);
            filter.setAttribute('aria-pressed', String(isActive));
        });
        applyFilters();
    });

    const params = new URLSearchParams(window.location.search);
    const requestedCategory = params.get('category');
    if (requestedCategory && filters.some((button) => button.dataset.category === requestedCategory)) {
        filters.find((button) => button.dataset.category === requestedCategory)?.click();
    } else {
        applyFilters();
    }
});
