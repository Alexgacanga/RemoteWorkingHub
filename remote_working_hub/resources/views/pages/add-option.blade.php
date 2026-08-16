<x-main-layout>
    <div class="bg-gray-50 flex items-center justify-center p-4 sm:p-6 lg:p-8" style="font-family: 'Poppins', sans-serif;">

        <!-- Form Container (The Card) -->
        <div class="w-full max-w-3xl bg-[#FFFFFF] rounded-2xl shadow-lg p-6 sm:p-8 md:p-10 relative">

            <!-- Back Button -->
            <a href="{{ route('options.index') }}" class="inline-flex items-center text-sm font-medium text-[#000000] hover:text-[#4FC1FF] transition-colors duration-300 mb-8 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Options
            </a>

            <!-- Header Section -->
            <div class="mb-8">
                <h2 class="text-2xl sm:text-3xl font-bold text-[#000000] mb-2 tracking-tight">Add New Option</h2>
                <p class="text-sm text-gray-500">Configure the details and cover image for this option.</p>
            </div>

            <!-- Form -->
            {{-- Make sure to include enctype="multipart/form-data" for the file upload to work in Laravel --}}
            <form action="{{ route('options.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="space-y-6">

                    <!-- Option Name -->
                    <div>
                        <label for="name" name='name' class="block text-sm font-semibold text-[#000000] mb-2">Option Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-xl text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300"
                            placeholder="e.g. Dedicated Desk">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" name="description" class="block text-sm font-semibold text-[#000000] mb-2">Description</label>
                        <textarea id="description" name="description" rows="4" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-xl text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 resize-y"
                            placeholder="Describe what this option includes..."></textarea>
                    </div>

                    <!-- Cover Image (Drag & Drop) -->
                    <div class="md:col-span-2">
    <span class="block text-sm font-semibold text-[#000000] mb-2">Cover Image</span>
    
    <!-- Relative wrapper is crucial for positioning the cancel button outside the label's click zone -->
    <div class="relative w-full">
        <label id="dropzone_label" for="cover_image" class="mt-1 flex justify-center px-6 py-8 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-100 hover:border-[#4FC1FF] transition-all duration-300 cursor-pointer group overflow-hidden relative">
            
            <!-- DEFAULT STATE: Upload Prompt -->
            <div id="upload_prompt" class="space-y-2 text-center">
                <svg class="mx-auto h-10 w-10 text-gray-400 group-hover:text-[#4FC1FF] transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <div class="text-sm text-[#000000] font-medium">
                    <span class="text-[#4FC1FF] hover:underline">Click to upload</span> or drag and drop
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, WEBP up to 5MB</p>
            </div>

            <!-- PREVIEW STATE: Hidden by default -->
            <div id="image_preview_container" class="hidden flex-col items-center justify-center w-full">
                <!-- Image thumbnail -->
                <img id="image_preview" src="" alt="Image Preview" class="max-h-32 object-contain rounded-md shadow-sm mb-2">
                <!-- File name -->
                <p id="file_name" class="text-sm font-medium text-gray-600 truncate max-w-full px-4"></p>
            </div>

            <!-- Hidden File Input -->
            <input id="cover_image" name="cover_image" type="file" class="sr-only" accept="image/*" onchange="handleImageUpload(event)">
        </label>

        <!-- CANCEL BUTTON: Hidden by default, absolute positioned -->
        <!-- Placed OUTSIDE the label so clicking it doesn't open the file dialog again -->
        <button type="button" id="remove_image_btn" onclick="removeImage(event)" class="hidden absolute top-3 right-3 p-1.5 bg-[#FF6245] text-white rounded-full shadow-md hover:bg-opacity-90 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FF6245]" title="Remove Image">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>

                    <!-- Custom UI Toggle Switch (Status) -->
                    <div class="flex items-center justify-between bg-gray-50 p-5 rounded-xl border border-gray-200">
                        <div>
                            <label for="status" class="text-sm font-semibold text-[#000000] cursor-pointer">Status (Active/Inactive)</label>
                            <p class="text-xs text-gray-500 mt-1">Make this option visible to customers immediately.</p>
                        </div>
                        <label class="hidden relative items-center cursor-pointer">
                            <input type="checkbox" id="status" name="is_active" value="0" class="sr-only peer" checked>
                        </label>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="status" name="is_active" value="1" class="sr-only peer" checked>
                            <!-- Switch Track & Thumb -->
                            <div class="w-11 h-6 bg-gray-300 rounded-full peer peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#4FC1FF]/30 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-[#FFFFFF] after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all duration-300 peer-checked:bg-[#FF6245]"></div>
                        </label>
                    </div>

                </div>

                <!-- Submit Area (Footer) -->
                <div class="pt-6 mt-8 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-end gap-4">
                    <!-- Cancel Button -->
                    <a href="{{ route('options.index') }}"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-sm font-semibold text-[#000000] rounded-xl bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-colors duration-300">
                        Cancel
                    </a>

                    <!-- Primary Submit Button -->
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-3 bg-[#FF6245] text-sm font-semibold text-[#FFFFFF] rounded-xl shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-[#FF6245]/30">
                        Save Option
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-main-layout>

<script>
    function handleImageUpload(event) {
        const file = event.target.files[0];
        
        if (file) {
            // 1. Hide the default prompt and show the preview container
            document.getElementById('upload_prompt').classList.add('hidden');
            document.getElementById('image_preview_container').classList.remove('hidden');
            document.getElementById('image_preview_container').classList.add('flex');
            document.getElementById('remove_image_btn').classList.remove('hidden');

            // 2. Read the image and set it as the preview source
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image_preview').src = e.target.result;
            }
            reader.readAsDataURL(file);

            // 3. Display the file name
            document.getElementById('file_name').textContent = file.name;
            
            // 4. Slightly change border to show active state
            document.getElementById('dropzone_label').classList.add('border-[#4FC1FF]', 'bg-gray-50');
        }
    }

    function removeImage(event) {
        // Prevent any default behavior (like submitting the form)
        event.preventDefault();

        // 1. Clear the actual file input so it can be re-selected if needed
        document.getElementById('cover_image').value = '';

        // 2. Reset the UI back to the default state
        document.getElementById('upload_prompt').classList.remove('hidden');
        document.getElementById('image_preview_container').classList.add('hidden');
        document.getElementById('image_preview_container').classList.remove('flex');
        document.getElementById('remove_image_btn').classList.add('hidden');
        
        // 3. Clear the preview data
        document.getElementById('image_preview').src = '';
        document.getElementById('file_name').textContent = '';
        
        // 4. Remove active border
        document.getElementById('dropzone_label').classList.remove('border-[#4FC1FF]', 'bg-gray-50');
    }
</script>