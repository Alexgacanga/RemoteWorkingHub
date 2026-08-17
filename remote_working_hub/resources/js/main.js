const sidebar = document.getElementById("sidebar");
const sidebarNav = document.getElementById("sidebarNav");
const desktopSidebarToggle = document.getElementById("desktopSidebarToggle");
const mobileSidebarToggle = document.getElementById("mobileSidebarToggle");
const mobileOverlay = document.getElementById("mobileOverlay");
const brandText = document.getElementById("brandText");
const sidebarChevron = document.getElementById("sidebarChevron");
const navLabels = document.querySelectorAll(".nav-label");
const navSections = document.querySelectorAll(".nav-section-title");
const profileButton = document.getElementById("profileButton");
const profileDropdown = document.getElementById("profileDropdown");
const profileChevron = document.getElementById("profileChevron");

let sidebarCollapsed = false;

function setCollapsedState(isCollapsed) {
    const isDesktop = window.innerWidth >= 768;
    if (!isDesktop) {
        sidebar.classList.add("-translate-x-full");
        sidebar.classList.remove("translate-x-0");
        mobileOverlay.classList.add("hidden");
        return;
    }

    if (isCollapsed) {
        sidebar.classList.add("w-24");
        sidebar.classList.remove("w-72");
        brandText.classList.add("hidden");
        sidebarChevron.classList.add("rotate-180");
        navLabels.forEach((label) => label.classList.add("hidden"));
        navSections.forEach((section) => section.classList.add("hidden"));

        // Remove overflow to allow tooltips to show outside the container
        sidebarNav.classList.remove("overflow-y-auto", "overflow-x-hidden");
        sidebarNav.classList.add("overflow-visible");

        document
            .querySelectorAll(".nav-item .tooltip-label")
            .forEach((tooltip) => {
                tooltip.classList.remove("hidden");
                tooltip.classList.add("md:block");
            });
    } else {
        sidebar.classList.add("w-72");
        sidebar.classList.remove("w-24");
        brandText.classList.remove("hidden");
        sidebarChevron.classList.remove("rotate-180");
        navLabels.forEach((label) => label.classList.remove("hidden"));
        navSections.forEach((section) => section.classList.remove("hidden"));

        // Restore overflow for regular scrolling
        sidebarNav.classList.add("overflow-y-auto", "overflow-x-hidden");
        sidebarNav.classList.remove("overflow-visible");

        document
            .querySelectorAll(".nav-item .tooltip-label")
            .forEach((tooltip) => {
                tooltip.classList.add("hidden");
                tooltip.classList.remove("md:block");
            });
    }

    sidebar.classList.remove("-translate-x-full");
    sidebar.classList.add("translate-x-0");
}

function toggleSidebar(force = null) {
    sidebarCollapsed = force !== null ? force : !sidebarCollapsed;
    setCollapsedState(sidebarCollapsed);
}

desktopSidebarToggle.addEventListener("click", () => toggleSidebar());

mobileSidebarToggle.addEventListener("click", () => {
    const isOpen = !sidebar.classList.contains("-translate-x-full");
    sidebar.classList.toggle("-translate-x-full", isOpen);
    sidebar.classList.toggle("translate-x-0", !isOpen);
    mobileOverlay.classList.toggle("hidden", isOpen);
});

mobileOverlay.addEventListener("click", () => {
    sidebar.classList.add("-translate-x-full");
    sidebar.classList.remove("translate-x-0");
    mobileOverlay.classList.add("hidden");
});

window.addEventListener("resize", () => {
    if (window.innerWidth >= 768) {
        sidebar.classList.remove("-translate-x-full");
        sidebar.classList.add("translate-x-0");
        mobileOverlay.classList.add("hidden");
        setCollapsedState(sidebarCollapsed);
    } else {
        mobileOverlay.classList.add("hidden");
        sidebar.classList.add("-translate-x-full");
        sidebar.classList.remove("translate-x-0");
    }
});

profileButton.addEventListener("click", () => {
    const isHidden = profileDropdown.classList.contains("hidden");
    profileDropdown.classList.toggle("hidden", !isHidden);
    profileChevron.classList.toggle("rotate-180", isHidden);
});

document.addEventListener("click", (event) => {
    if (
        !profileButton.contains(event.target) &&
        !profileDropdown.contains(event.target)
    ) {
        profileDropdown.classList.add("hidden");
        profileChevron.classList.remove("rotate-180");
    }
});

setCollapsedState(false);
