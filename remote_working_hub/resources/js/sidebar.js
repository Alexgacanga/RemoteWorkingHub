document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const logoFull = document.getElementById('logoFull');
    const navTexts = document.querySelectorAll('.nav-text');
    const navItems = document.querySelectorAll('.nav-item');
    const navIcons = document.querySelectorAll('.nav-icon');
    const sectionTitles = document.querySelectorAll('.nav-section-title');

    // 1. Read the saved state from localStorage
    let isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

    // 2. Helper function to apply the desktop layout state
    const applyDesktopState = (collapsed) => {
        if (collapsed) {
            sidebar.classList.remove('w-64');
            sidebar.classList.add('w-20');

            logoFull.classList.remove('opacity-100', 'scale-100');
            logoFull.classList.add('opacity-0', 'scale-50');

            navTexts.forEach(text => {
                text.classList.remove('max-w-[200px]', 'opacity-100', 'ml-3');
                text.classList.add('max-w-0', 'opacity-0', 'ml-0');
            });

            sectionTitles.forEach(title => {
                title.classList.remove('opacity-100');
                title.classList.add('opacity-0', 'h-0', 'pt-0', 'pb-0', 'overflow-hidden');
            });
        } else {
            sidebar.classList.remove('w-20');
            sidebar.classList.add('w-64');

            logoFull.classList.remove('opacity-0', 'scale-50');
            logoFull.classList.add('opacity-100', 'scale-100');

            navTexts.forEach(text => {
                text.classList.remove('max-w-0', 'opacity-0', 'ml-0');
                text.classList.add('max-w-[200px]', 'opacity-100', 'ml-3');
            });

            sectionTitles.forEach(title => {
                title.classList.remove('opacity-0', 'h-0', 'pt-0', 'pb-0', 'overflow-hidden');
                title.classList.add('opacity-100');
            });
        }
    };

    // --- Sidebar Toggle & Responsive Logic ---
    toggleBtn.addEventListener('click', () => {
        if (window.innerWidth < 768) {
            // Mobile behavior
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                sidebar.classList.add('flex', 'absolute', 'z-50', 'h-full', 'shadow-2xl');
            } else {
                sidebar.classList.add('hidden');
                sidebar.classList.remove('flex', 'absolute', 'z-50', 'h-full', 'shadow-2xl');
            }
        } else {
            // Desktop behavior
            isCollapsed = !isCollapsed;
            localStorage.setItem('sidebarCollapsed', isCollapsed);
            applyDesktopState(isCollapsed);
        }
    });

    // Handle clean resets on window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            sidebar.classList.remove('absolute', 'z-50', 'h-full', 'shadow-2xl', 'hidden');
            sidebar.classList.add('flex');
            // Re-apply the user's preferred saved state when expanding screen
            applyDesktopState(isCollapsed);
        } else {
            sidebar.classList.add('hidden');
            sidebar.classList.remove('flex', 'absolute', 'z-50', 'h-full', 'shadow-2xl');
        }
    });

    // --- Active State Logic ---
    const applyActiveState = (targetItem) => {
        // Reset all items to default inactive state
        navItems.forEach(nav => {
            // Remove active Dashlite-like colors
            nav.classList.remove('bg-indigo-50', 'text-indigo-600');
            // Restore default gray hover colors
            nav.classList.add('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-900');

            // Reset icon colors
            const icon = nav.querySelector('.nav-icon');
            if(icon) {
                icon.classList.remove('text-indigo-600');
                icon.classList.add('text-gray-400');
            }
        });

        // Apply active classes to the target
        targetItem.classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-900');
        targetItem.classList.add('bg-indigo-50', 'text-indigo-600');

        // Highlight active icon
        const activeIcon = targetItem.querySelector('.nav-icon');
        if(activeIcon) {
            activeIcon.classList.remove('text-gray-400');
            activeIcon.classList.add('text-indigo-600');
        }
    };

    // Apply active state on click
    navItems.forEach(item => {
        item.addEventListener('click', function () {
            applyActiveState(this);
        });
    });

    // Persist active state based on the current URL
    const currentUrl = window.location.href;
    navItems.forEach(item => {
        // Match current page URL
        if (item.href && item.href !== '#' && currentUrl.startsWith(item.href)) {
            applyActiveState(item);
        }
    });
});
