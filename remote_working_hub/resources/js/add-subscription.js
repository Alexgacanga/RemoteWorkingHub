document.addEventListener('DOMContentLoaded', () => {
    // 1. DOM Elements
    const hiddenInput = document.getElementById('subscription_type');
    const btnSubscription = document.getElementById('btn_subscription');
    const btnWalkin = document.getElementById('btn_walkin');
    
    // Wrappers for the distinct forms
    const subscriptionFields = document.getElementById('subscription_fields');
    const walkinFields = document.getElementById('walkin_fields');

    // Safety check to ensure elements exist on the page
    if (!hiddenInput || !btnSubscription || !btnWalkin || !subscriptionFields || !walkinFields) return;

    // 2. Class configurations for states
    const activeClasses = "flex-1 py-3 text-sm font-semibold rounded-lg transition-all duration-300 bg-[#FF6245] text-[#FFFFFF] shadow-md focus:outline-none focus:ring-2 focus:ring-[#FF6245] focus:ring-offset-1";
    const inactiveClasses = "flex-1 py-3 text-sm font-semibold rounded-lg transition-all duration-300 text-gray-600 hover:text-[#000000] hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-1";

    // 3. Helper function to disable/enable inputs so inactive fields aren't submitted
    const toggleInputs = (container, isEnabled) => {
        const inputs = container.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.disabled = !isEnabled;
        });
    };

    // 4. Core Logic Function
    function setSubscriptionType(type) {
        hiddenInput.value = type;

        if (type === 'subscription') {
            // Update Toggle Button Styles
            btnSubscription.className = activeClasses;
            btnWalkin.className = inactiveClasses;
            
            // Swap UI Visibility with a clean cross-fade effect
            walkinFields.classList.remove('opacity-100');
            walkinFields.classList.add('opacity-0');
            
            setTimeout(() => {
                walkinFields.classList.add('hidden', 'absolute');
                subscriptionFields.classList.remove('hidden', 'absolute');
                
                // Allow the browser to process the display change before animating opacity
                requestAnimationFrame(() => {
                    subscriptionFields.classList.remove('opacity-0');
                    subscriptionFields.classList.add('opacity-100');
                });
            }, 150); // Matches Tailwind's duration-150 / duration-300 timing
            
            // Activate the correct fields for form submission
            toggleInputs(subscriptionFields, true);
            toggleInputs(walkinFields, false);
            
        } else if (type === 'walkin') {
            // Update Toggle Button Styles
            btnWalkin.className = activeClasses;
            btnSubscription.className = inactiveClasses;
            
            // Swap UI Visibility with a clean cross-fade effect
            subscriptionFields.classList.remove('opacity-100');
            subscriptionFields.classList.add('opacity-0');
            
            setTimeout(() => {
                subscriptionFields.classList.add('hidden', 'absolute');
                walkinFields.classList.remove('hidden', 'absolute');
                
                requestAnimationFrame(() => {
                    walkinFields.classList.remove('opacity-0');
                    walkinFields.classList.add('opacity-100');
                });
            }, 150);
            
            // Activate the correct fields for form submission
            toggleInputs(walkinFields, true);
            toggleInputs(subscriptionFields, false);
        }
    }

    // 5. Attach Event Listeners
    btnSubscription.addEventListener('click', () => setSubscriptionType('subscription'));
    btnWalkin.addEventListener('click', () => setSubscriptionType('walkin'));
});