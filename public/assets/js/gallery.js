/* Gallery Logic for Lightbox and Sliding */

let slideIndex = 1;
let galleryData = []; // Store the API data
const lightbox = document.getElementById('lightbox');
const lightboxImage = document.getElementById('lightbox-image');
const captionText = document.getElementById('caption');
const galleryContainer = document.getElementById('gallery-container');
const CACHE_KEY = 'mrp_gallery_cache_v1';

// Open the Lightbox
function openLightbox() {
  if (lightbox) {
    lightbox.style.display = "block";
    document.body.style.overflow = "hidden"; // Disable scroll
  }
}

// Close the Lightbox
function closeLightbox() {
  if (lightbox) {
    lightbox.style.display = "none";
    document.body.style.overflow = "auto"; // Enable scroll
  }
}

// Next/previous controls
function changeSlide(n) {
  showSlide(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlide(slideIndex = n);
}

function showSlide(n) {
  if (!galleryData || galleryData.length === 0) return;
  
  if (n > galleryData.length) {slideIndex = 1}
  if (n < 1) {slideIndex = galleryData.length}
  
  // Get content from the array
  const item = galleryData[slideIndex - 1]; 
  const img = item.image || item.image_url;
  const title = item.title;
  
  // Set content
  if (lightboxImage) lightboxImage.src = img;
  if (captionText) captionText.innerText = title;
}

// Function to render gallery items
function renderGallery(data) {
    if (!galleryContainer) return;
    galleryContainer.innerHTML = '';
    
    data.forEach((item, index) => {
        const delay = (index % 6 + 1) * 100;
        
        const galleryItem = document.createElement('div');
        galleryItem.className = `gallery-item active`; // Direct active for cache smoothness
        galleryItem.style.transitionDelay = `${delay}ms`;
        galleryItem.innerHTML = `
            <img src="${item.image}" alt="${item.title}">
            <div class="gallery-overlay">
                <div class="gallery-title">${item.title}</div>
                <div class="gallery-date"><i class="far fa-calendar-alt"></i> ${item.date}</div>
            </div>
        `;
        
        galleryItem.addEventListener('click', () => {
            openLightbox();
            currentSlide(index + 1);
        });
        
        galleryContainer.appendChild(galleryItem);
    });
}

// Stale-While-Revalidate Fetch
async function fetchGallery() {
    if (!galleryContainer) return;
    const apiUrl = 'http://192.168.68.112:8001/api/photo-galleries';
    
    // 1. Load from Cache
    const cachedDataStr = localStorage.getItem(CACHE_KEY);
    if (cachedDataStr) {
        try {
            galleryData = JSON.parse(cachedDataStr);
            console.log('Serving Gallery from cache...');
            renderGallery(galleryData);
        } catch(e) { console.error('Gallery Cache Error:', e); }
    }

    // 2. Fetch from API
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) throw new Error('Gallery Refresh Failed');
        
        const result = await response.json();
        const isSuccess = result.status || result.success;
        const rawData = result.data || result;

        if (isSuccess && Array.isArray(rawData)) {
            const flattenedData = [];
            rawData.forEach(entry => {
                const imagesList = Array.isArray(entry.images) ? entry.images : [(entry.image || entry.image_url || entry.photo || entry.url)];
                imagesList.forEach(imgUrl => {
                    if (imgUrl) {
                        flattenedData.push({
                            image: imgUrl,
                            title: entry.title || 'No Title',
                            date: entry.date || entry.created_at || ''
                        });
                    }
                });
            });

            const newDataStr = JSON.stringify(flattenedData);

            // 3. Compare and Update
            if (newDataStr !== cachedDataStr) {
                console.log('Gallery updated! Refreshing UI...');
                galleryData = flattenedData;
                renderGallery(galleryData);
                localStorage.setItem(CACHE_KEY, newDataStr);
            } else {
                console.log('Gallery is already up to date.');
            }
        }
    } catch (error) {
        console.error('Error fetching gallery:', error);
        if (!cachedDataStr) {
            galleryContainer.innerHTML = '<p class="text-center" style="grid-column: 1/-1; padding: 2rem; color: #ff3366;">সার্ভার থেকে গ্যালারি লোড করা সম্ভব হয়নি।</p>';
        }
    }
}

// Initialize on Load
document.addEventListener('DOMContentLoaded', () => {
    fetchGallery();

    // Close on outside click
    if(lightbox) {
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                 closeLightbox();
            }
        });
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', function(event) {
        if (lightbox && lightbox.style.display === "block") {
            if (event.key === "Escape") {
                closeLightbox();
            } else if (event.key === "ArrowLeft") {
                changeSlide(-1);
            } else if (event.key === "ArrowRight") {
                changeSlide(1);
            }
        }
    });
});
