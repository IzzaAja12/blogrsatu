@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div style="max-width: 800px; margin: 0 auto;">
        <!-- Header Section -->
        <div style="text-align: center; margin-bottom: 3rem;">
            <div style="
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, #739EC9, #8fb3d4);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                color: white;
                font-size: 2rem;
                box-shadow: 0 8px 16px rgba(115, 158, 201, 0.3);
            ">✏️</div>
            <h2 style="color: #739EC9; margin-bottom: 0.5rem;">Create New Post</h2>
            <p style="color: #718096; font-size: 1.1rem;">Share your thoughts and knowledge with the community</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-error" style="margin-bottom: 2rem;">
                <strong>Please fix the following errors:</strong>
                <ul style="margin-top: 0.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Create Post Form -->
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" style="background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);">
            @csrf
            
            <div style="display: grid; gap: 2rem;">
                <!-- Title Field -->
                <div>
                    <label for="title" style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem; font-weight: 600; color: #2d3748;">
                        📝 Post Title
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title') }}"
                           placeholder="Enter an engaging title for your post..."
                           required
                           style="
                               width: 100%;
                               padding: 1rem;
                               border: 2px solid #e2e8f0;
                               border-radius: 8px;
                               font-size: 1.1rem;
                               transition: all 0.3s ease;
                               background: #f8fafc;
                           "
                           onfocus="this.style.borderColor='#739EC9'; this.style.background='white'; this.style.boxShadow='0 0 0 3px rgba(115, 158, 201, 0.1)'"
                           onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'">
                </div>

                <!-- Content Field -->
                <div>
                    <label for="content" style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem; font-weight: 600; color: #2d3748;">
                        📄 Content
                    </label>
                    <div style="position: relative;">
                        <textarea id="content" 
                                  name="content" 
                                  placeholder="Write your post content here... You can use markdown formatting!"
                                  required
                                  style="
                                      width: 100%;
                                      min-height: 300px;
                                      padding: 1rem;
                                      border: 2px solid #e2e8f0;
                                      border-radius: 8px;
                                      font-size: 1rem;
                                      line-height: 1.6;
                                      transition: all 0.3s ease;
                                      background: #f8fafc;
                                      font-family: 'Roboto', sans-serif;
                                      resize: vertical;
                                  "
                                  onfocus="this.style.borderColor='#739EC9'; this.style.background='white'; this.style.boxShadow='0 0 0 3px rgba(115, 158, 201, 0.1)'"
                                  onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'"
                                  onkeyup="updateWordCount()">{{ old('content') }}</textarea>
                        <div style="position: absolute; bottom: 10px; right: 15px; font-size: 0.875rem; color: #718096; background: white; padding: 0.25rem 0.5rem; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                            <span id="word-count">0</span> words
                        </div>
                    </div>
                </div>

                <!-- Category and Settings Row -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <!-- Category Field -->
                    <div>
                        <label for="category_id" style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem; font-weight: 600; color: #2d3748;">
                            📂 Category
                        </label>
                        <select id="category_id" 
                                name="category_id" 
                                required
                                style="
                                    width: 100%;
                                    padding: 1rem;
                                    border: 2px solid #e2e8f0;
                                    border-radius: 8px;
                                    font-size: 1rem;
                                    transition: all 0.3s ease;
                                    background: #f8fafc;
                                    cursor: pointer;
                                "
                                onfocus="this.style.borderColor='#739EC9'; this.style.background='white'; this.style.boxShadow='0 0 0 3px rgba(115, 158, 201, 0.1)'"
                                onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc'; this.style.boxShadow='none'">
                            <option value="">Select a category...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Publish Checkbox -->
                    <div style="display: flex; align-items: end;">
                        <label style="
                            display: flex;
                            align-items: center;
                            gap: 1rem;
                            padding: 1rem;
                            background: #f0f7ff;
                            border: 2px solid #739EC9;
                            border-radius: 8px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            width: 100%;
                        " onmouseover="this.style.background='#e6f3ff'" onmouseout="this.style.background='#f0f7ff'">
                            <input type="checkbox" 
                                   name="published" 
                                   value="1" 
                                   {{ old('published') ? 'checked' : '' }}
                                   style="width: 20px; height: 20px; cursor: pointer;">
                            <div>
                                <div style="font-weight: 600; color: #2d3748; margin-bottom: 0.25rem;">🚀 Publish Post</div>
                                <div style="font-size: 0.875rem; color: #718096;">Make this post visible to all users</div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem; font-weight: 600; color: #2d3748;">
                        🖼️ Featured Image
                    </label>
                    <div style="
                        border: 2px dashed #cbd5e0;
                        border-radius: 8px;
                        padding: 2rem;
                        text-align: center;
                        background: #f8fafc;
                        transition: all 0.3s ease;
                        position: relative;
                        overflow: hidden;
                    " 
                    ondragover="event.preventDefault(); this.style.borderColor='#739EC9'; this.style.background='#f0f7ff';"
                    ondragleave="this.style.borderColor='#cbd5e0'; this.style.background='#f8fafc';"
                    ondrop="handleDrop(event, this)">
                        
                        <input type="file" 
                               id="image" 
                               name="image" 
                               accept="image/*" 
                               required
                               style="position: absolute; inset: 0; opacity: 0; cursor: pointer;"
                               onchange="previewImage(this)">
                        
                        <div id="upload-placeholder" style="pointer-events: none;">
                            <div style="font-size: 3rem; margin-bottom: 1rem; color: #a0aec0;">📸</div>
                            <p style="color: #4a5568; margin-bottom: 0.5rem; font-weight: 500;">Click to upload or drag and drop</p>
                            <p style="color: #718096; font-size: 0.875rem;">PNG, JPG, GIF up to 10MB</p>
                        </div>
                        
                        <div id="image-preview" style="display: none;">
                            <img id="preview-img" style="max-width: 200px; max-height: 150px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            <p id="image-name" style="margin-top: 1rem; color: #4a5568; font-weight: 500;"></p>
                            <button type="button" onclick="removeImage()" style="
                                margin-top: 0.5rem;
                                background: #e53e3e;
                                color: white;
                                border: none;
                                padding: 0.5rem 1rem;
                                border-radius: 6px;
                                cursor: pointer;
                                font-size: 0.875rem;
                                transition: all 0.3s ease;
                            " onmouseover="this.style.background='#c53030'" onmouseout="this.style.background='#e53e3e'">
                                Remove Image
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
                    <a href="{{ route('posts.index') }}" style="
                        background: transparent;
                        color: #718096;
                        padding: 1rem 2rem;
                        border: 2px solid #e2e8f0;
                        border-radius: 8px;
                        text-decoration: none;
                        font-weight: 600;
                        transition: all 0.3s ease;
                        display: inline-block;
                    " onmouseover="this.style.borderColor='#cbd5e0'; this.style.color='#4a5568'" 
                       onmouseout="this.style.borderColor='#e2e8f0'; this.style.color='#718096'">
                        Cancel
                    </a>
                    
                    <button type="submit" style="
                        background: linear-gradient(135deg, #739EC9, #5a7ea3);
                        color: white;
                        border: none;
                        padding: 1rem 2rem;
                        border-radius: 8px;
                        font-size: 1rem;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        position: relative;
                        overflow: hidden;
                        min-width: 150px;
                    " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(115, 158, 201, 0.4)'" 
                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                        <span>Create Post</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Word count functionality
        function updateWordCount() {
            const content = document.getElementById('content').value;
            const wordCount = content.trim().split(/\s+/).filter(word => word.length > 0).length;
            document.getElementById('word-count').textContent = wordCount;
        }

        // Image preview functionality
        function previewImage(input) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('upload-placeholder').style.display = 'none';
                    document.getElementById('image-preview').style.display = 'block';
                    document.getElementById('preview-img').src = e.target.result;
                    document.getElementById('image-name').textContent = file.name;
                };
                reader.readAsDataURL(file);
            }
        }

        // Remove image functionality
        function removeImage() {
            document.getElementById('image').value = '';
            document.getElementById('upload-placeholder').style.display = 'block';
            document.getElementById('image-preview').style.display = 'none';
        }

        // Drag and drop functionality
        function handleDrop(e, element) {
            e.preventDefault();
            element.style.borderColor = '#cbd5e0';
            element.style.background = '#f8fafc';
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                document.getElementById('image').files = files;
                previewImage(document.getElementById('image'));
            }
        }

        // Initialize word count on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateWordCount();
        });
    </script>
@endsection