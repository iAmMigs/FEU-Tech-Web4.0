document.addEventListener('DOMContentLoaded', () => {

    // 1. DYNAMICALLY HIDE CONTENT/IMAGE FIELDS BASED ON SECTION NAME
    document.querySelectorAll('.field-collection-item').forEach(item => {
        const sectionNameInput = item.querySelector('input[name$="[sectionName]"]');
        if (!sectionNameInput) return;
        
        const name = sectionNameInput.value.toLowerCase();
        const textarea = item.querySelector('textarea[name$="[textContent]"]');
        const mediaInput = item.querySelector('.media-manager-input');
        
        if (name.includes('image')) {
            if (textarea) {
                const formGroup = textarea.closest('fieldset.form-group') || textarea.closest('div.form-group');
                if (formGroup) formGroup.style.setProperty('display', 'none', 'important');
            }
        } else {
            if (mediaInput) {
                const formGroup = mediaInput.closest('fieldset.form-group') || mediaInput.closest('div.form-group');
                if (formGroup) formGroup.style.setProperty('display', 'none', 'important');
            }
        }
    });

    // 2. INJECT MODAL HTML INTO THE BODY
    const modalHtml = `
        <div class="modal fade" id="mediaManagerModal" tabindex="-1" aria-labelledby="mediaManagerModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="mediaManagerModalLabel"><i class="fa fa-images"></i> Media Manager</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <input type="file" id="mediaManagerUploadInput" class="form-control d-none" accept="image/*">
                        <button class="btn btn-success" onclick="document.getElementById('mediaManagerUploadInput').click()">
                            <i class="fa fa-upload"></i> Upload New Image
                        </button>
                    </div>
                    <button class="btn btn-secondary" id="mediaManagerRefreshBtn">
                        <i class="fa fa-sync"></i> Refresh
                    </button>
                </div>
                <div id="mediaManagerLoading" class="text-center py-5 d-none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div id="mediaGalleryGrid" class="media-gallery-grid">
                    <!-- Images will be loaded here -->
                </div>
              </div>
            </div>
          </div>
        </div>
    `;
    document.body.insertAdjacentHTML('beforeend', modalHtml);

    const mediaModalEl = document.getElementById('mediaManagerModal');
    let mediaModal;
    if (typeof bootstrap !== 'undefined') {
        mediaModal = new bootstrap.Modal(mediaModalEl);
    }

    let currentTargetInput = null;
    let currentTargetPreview = null;
    let currentModule = 'Admissions'; // Default, we will guess from URL or page

    // Try to guess the module from the URL
    if (window.location.href.includes('General')) currentModule = 'General';
    if (window.location.href.includes('StudentSupport')) currentModule = 'Student Support';

    // 3. TRANSFORM TEXT FIELDS INTO MEDIA MANAGER UI
    document.querySelectorAll('.media-manager-input').forEach(container => {
        const input = container.querySelector('input[type="text"]');
        if (!input) return;

        // Hide the actual text input
        input.style.setProperty('display', 'none', 'important');

        // Create the Preview UI
        const previewWrapper = document.createElement('div');
        previewWrapper.className = 'media-manager-preview-wrapper';
        
        let folderPath = '/uploads/admissions/';
        if (currentModule === 'General') folderPath = '/uploads/general/';
        if (currentModule === 'Student Support') folderPath = '/uploads/student_support/';

        // Initialize preview based on current input value
        if (input.value && input.value.trim() !== '') {
            // If the value doesn't start with http or /, prefix with folder
            const src = (input.value.startsWith('http') || input.value.startsWith('/')) ? input.value : folderPath + input.value;
            previewWrapper.innerHTML = `<img src="${src}" alt="Preview">
                                        <div class="mt-3"><button type="button" class="btn btn-primary"><i class="fa fa-folder-open"></i> Browse Media</button></div>`;
        } else {
            previewWrapper.innerHTML = `<div class="media-manager-empty-state">
                                            <i class="fa fa-image"></i>
                                            <h5>No Image Selected</h5>
                                            <button type="button" class="btn btn-primary mt-2"><i class="fa fa-folder-open"></i> Browse Media</button>
                                        </div>`;
        }

        previewWrapper.addEventListener('click', (e) => {
            e.preventDefault();
            currentTargetInput = input;
            currentTargetPreview = previewWrapper;
            loadMediaGallery();
            if (mediaModal) mediaModal.show();
        });

        input.parentNode.insertBefore(previewWrapper, input.nextSibling);
    });

    // 4. LOAD MEDIA GALLERY VIA AJAX
    function loadMediaGallery() {
        const grid = document.getElementById('mediaGalleryGrid');
        const loading = document.getElementById('mediaManagerLoading');
        
        grid.innerHTML = '';
        loading.classList.remove('d-none');

        fetch(`/admin/media/list?module=${encodeURIComponent(currentModule)}`)
            .then(res => res.json())
            .then(images => {
                loading.classList.add('d-none');
                if (images.length === 0) {
                    grid.innerHTML = '<div class="col-12 text-center py-4 text-muted">No images found in this folder.</div>';
                    return;
                }
                
                images.forEach(img => {
                    const item = document.createElement('div');
                    item.className = 'media-gallery-item';
                    item.innerHTML = `
                        <img src="${img.url}" alt="${img.filename}">
                        <div class="media-gallery-item-info">${img.filename}</div>
                    `;
                    item.addEventListener('click', () => {
                        selectMedia(img.filename, img.url);
                    });
                    grid.appendChild(item);
                });
            })
            .catch(err => {
                loading.classList.add('d-none');
                grid.innerHTML = '<div class="alert alert-danger">Error loading images.</div>';
            });
    }

    document.getElementById('mediaManagerRefreshBtn').addEventListener('click', loadMediaGallery);

    // 5. UPLOAD NEW IMAGE VIA AJAX
    document.getElementById('mediaManagerUploadInput').addEventListener('change', function() {
        if (!this.files || !this.files[0]) return;
        
        const file = this.files[0];
        const formData = new FormData();
        formData.append('file', file);
        formData.append('module', currentModule);

        const grid = document.getElementById('mediaGalleryGrid');
        grid.innerHTML = '<div class="col-12 text-center py-4 text-primary"><i class="fa fa-spin fa-spinner fa-2x"></i> Uploading...</div>';

        fetch('/admin/media/upload', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Instantly select the newly uploaded file
                selectMedia(data.filename, data.url);
            } else {
                alert('Upload failed: ' + (data.error || 'Unknown error'));
                loadMediaGallery();
            }
        })
        .catch(err => {
            alert('Upload failed due to network error.');
            loadMediaGallery();
        });
        
        this.value = ''; // Reset input
    });

    // 6. SELECT MEDIA AND CLOSE MODAL
    function selectMedia(filename, url) {
        if (currentTargetInput) {
            currentTargetInput.value = filename; // Save just the filename in DB
            
            // Update preview
            currentTargetPreview.innerHTML = `
                <img src="${url}" alt="Preview">
                <div class="mt-3"><button type="button" class="btn btn-primary"><i class="fa fa-folder-open"></i> Browse Media</button></div>
            `;
        }
        if (mediaModal) mediaModal.hide();
    }
});
