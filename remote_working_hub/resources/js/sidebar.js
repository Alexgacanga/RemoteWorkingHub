document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const logoFull = document.getElementById('logoFull');
    const logoShort = document.getElementById('logoShort');
    const navTexts = document.querySelectorAll('.nav-text');
    const navItems = document.querySelectorAll('.nav-item');

    // 1. Read the saved state from localStorage
    let isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

    // 2. Helper function to apply the desktop layout state
    const applyDesktopState = (collapsed) => {
        if (collapsed) {
            sidebar.classList.remove('w-64');
            sidebar.classList.add('w-20');

            logoFull.classList.remove('opacity-100', 'scale-100');
            logoFull.classList.add('opacity-0', 'scale-50');

            logoShort.classList.remove('opacity-0', 'scale-50');
            logoShort.classList.add('opacity-100', 'scale-100');

            navTexts.forEach(text => {
                text.classList.remove('max-w-[200px]', 'opacity-100', 'ml-2');
                text.classList.add('max-w-0', 'opacity-0', 'ml-0');
            });

            navItems.forEach(item => {
                item.classList.remove('px-4');
                item.classList.add('px-7');
            });
        } else {
            sidebar.classList.remove('w-20');
            sidebar.classList.add('w-64');

            logoFull.classList.remove('opacity-0', 'scale-50');
            logoFull.classList.add('opacity-100', 'scale-100');

            logoShort.classList.remove('opacity-100', 'scale-100');
            logoShort.classList.add('opacity-0', 'scale-50');

            navTexts.forEach(text => {
                text.classList.remove('max-w-0', 'opacity-0', 'ml-0');
                text.classList.add('max-w-[200px]', 'opacity-100', 'ml-2');
            });

            navItems.forEach(item => {
                item.classList.remove('px-7');
                item.classList.add('px-4');
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
        navItems.forEach(nav => {
            nav.classList.remove('bg-gray-300', 'text-gray-900');
            nav.classList.add('text-gray-100', 'hover:bg-gray-700');
        });
        targetItem.classList.remove('text-gray-100', 'hover:bg-gray-700');
        targetItem.classList.add('bg-gray-300', 'text-gray-900');
    };

    navItems.forEach(item => {
        item.addEventListener('click', function () {
            applyActiveState(this);
        });
    });

    const currentUrl = window.location.href;
    navItems.forEach(item => {
        if (item.href && item.href !== '#' && currentUrl.startsWith(item.href)) {
            applyActiveState(item);
        }
    });
});
