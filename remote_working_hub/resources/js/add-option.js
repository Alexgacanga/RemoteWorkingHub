document.addEventListener('DOMContentLoaded', () => {
    // 1. Cache all DOM elements
    const fileInput = document.getElementById("cover_image");
    const removeBtn = document.getElementById("remove_image_btn");
    const uploadPrompt = document.getElementById("upload_prompt");
    const previewContainer = document.getElementById("image_preview_container");
    const imagePreview = document.getElementById("image_preview");
    const fileName = document.getElementById("file_name");
    const dropzoneLabel = document.getElementById("dropzone_label");

    // 2. Handle Image Upload (Change Event)
    if (fileInput) {
        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];

            // Ensure a file exists and is an image
            if (file && file.type.startsWith("image/")) {
                // Hide prompt, show preview
                uploadPrompt.classList.add("hidden");
                previewContainer.classList.remove("hidden");
                previewContainer.classList.add("flex");
                removeBtn.classList.remove("hidden");

                // Read and set preview
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);

                // Update UI details
                fileName.textContent = file.name;
                dropzoneLabel.classList.add("border-[#4FC1FF]", "bg-gray-50");
            }
        });
    }

    // 3. Handle Image Removal (Click Event)
    if (removeBtn) {
        removeBtn.addEventListener('click', (event) => {
            // Prevent default behavior AND stop the click from bubbling up to the <label>
            event.preventDefault();
            event.stopPropagation();

            // Clear input
            if (fileInput) fileInput.value = "";

            // Reset UI states
            uploadPrompt.classList.remove("hidden");
            previewContainer.classList.add("hidden");
            previewContainer.classList.remove("flex");
            removeBtn.classList.add("hidden");

            // Clear preview data
            imagePreview.src = "";
            fileName.textContent = "";

            // Remove active styles
            dropzoneLabel.classList.remove("border-[#4FC1FF]", "bg-gray-50");
        });
    }
});
