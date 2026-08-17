document.addEventListener("DOMContentLoaded", function () {
        const fileInput = document.getElementById('coverImageInput');
        const imagePreviewWrapper = document.getElementById('imagePreviewWrapper');
        const imagePreview = document.getElementById('imagePreview');
        const removeImageBtn = document.getElementById('removeImageBtn');
        const removeCoverImageInput = document.getElementById('remove_cover_image');

        // Store original database image URL so we can revert if user cancels a new file selection
        const originalImageSrc = imagePreview.src;
        // Check if an image actually exists initially (avoids bringing back a broken image icon)
        const hasOriginalImage = originalImageSrc && !originalImageSrc.endsWith(window.location.host + '/');

        // 1. Handle New File Selection
        fileInput.addEventListener('change', function (event) {
            const file = event.target.files[0];

            if (file) {
                // User picked a new image: Ensure the removal flag is off
                removeCoverImageInput.value = "0";

                // Ensure the preview wrapper is visible
                imagePreviewWrapper.classList.remove('hidden');

                // Create object URL for instant preview
                const imageUrl = URL.createObjectURL(file);

                imagePreviewWrapper.style.opacity = '0.5';
                setTimeout(() => {
                    imagePreview.src = imageUrl;
                    imagePreviewWrapper.style.opacity = '1';
                }, 150);

                imagePreview.onload = () => {
                    URL.revokeObjectURL(imagePreview.src);
                };
            } else {
                // User opened the file picker but clicked "Cancel"
                // If they haven't explicitly removed the original image, revert to it
                if (removeCoverImageInput.value === "0" && hasOriginalImage) {
                    imagePreviewWrapper.style.opacity = '0.5';
                    setTimeout(() => {
                        imagePreview.src = originalImageSrc;
                        imagePreviewWrapper.style.opacity = '1';
                    }, 150);
                }
            }
        });

        // 2. Handle "X" (Remove) Button Click
        if (removeImageBtn) {
            removeImageBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // Prevents the click from triggering the surrounding label

                // Clear the actual file input
                fileInput.value = "";

                // Hide the entire preview box
                imagePreviewWrapper.classList.add('hidden');

                // Clear the image source
                imagePreview.src = "";

                // Flip the hidden flag so the Laravel backend knows to delete it from the DB
                removeCoverImageInput.value = "1";
            });
        }
    });
