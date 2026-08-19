document.addEventListener('DOMContentLoaded', () => {
    const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');

    dropdownTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            // Stop the click from immediately bubbling up to the document
            e.stopPropagation();

            const menu = trigger.nextElementSibling;
            const isCurrentlyHidden = menu.classList.contains('hidden');

            // 1. Close all other open dropdowns first (keeps the UI clean)
            document.querySelectorAll('.dropdown-menu').forEach(otherMenu => {
                otherMenu.classList.add('opacity-0', 'scale-95');
                otherMenu.classList.remove('opacity-100', 'scale-100');
                // Wait for the animation to finish before hiding
                setTimeout(() => otherMenu.classList.add('hidden'), 200);
            });

            // 2. If the clicked menu was hidden, open it
            if (isCurrentlyHidden) {
                menu.classList.remove('hidden');

                // A slight delay ensures the CSS transition triggers properly
                requestAnimationFrame(() => {
                    menu.classList.remove('opacity-0', 'scale-95');
                    menu.classList.add('opacity-100', 'scale-100');
                });
            }
        });
    });

    // 3. Close the dropdown if the user clicks anywhere else on the screen
    document.addEventListener('click', () => {
        document.querySelectorAll('.dropdown-menu:not(.hidden)').forEach(menu => {
            menu.classList.add('opacity-0', 'scale-95');
            menu.classList.remove('opacity-100', 'scale-100');
            setTimeout(() => menu.classList.add('hidden'), 200);
        });
    });
});
