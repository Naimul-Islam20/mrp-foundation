/* Gallery Logic for Lightbox and Sliding */

let slideIndex = 1;
let galleryData = []; // Store the API data
const lightbox = document.getElementById('lightbox');
const lightboxImage = document.getElementById('lightbox-image');
const captionText = document.getElementById('caption');
const galleryContainer = document.getElementById('gallery-container');

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

// Scroll Animation Observer for Dynamic Items
const galleryObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.1 });

// Fetch Gallery Data from API
async function fetchGallery() {
    if (!galleryContainer) return;
    
    // API URL provided by the user
    const apiUrl = 'http://192.168.68.112:8001/api/photo-galleries';
    
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) throw new Error('Network response was not ok');
        
        const result = await response.json();
        
        // Checking for both 'status' or 'success' as success indicators
        const isSuccess = result.status || result.success;
        const rawData = result.data || result; // Use data property or fallback to result itself

        if (isSuccess && Array.isArray(rawData) && rawData.length > 0) {
            galleryData = []; // Clear and prepare for flattened data
            galleryContainer.innerHTML = ''; // Clear skeletons
            
            // Flatten the data: Your API returns entries with an 'images' array
            rawData.forEach(entry => {
                const imagesList = Array.isArray(entry.images) ? entry.images : [(entry.image || entry.image_url || entry.photo || entry.url)];
                
                imagesList.forEach(imgUrl => {
                    if (imgUrl) {
                        galleryData.push({
                            image: imgUrl,
                            title: entry.title || 'No Title',
                            date: entry.date || entry.created_at || ''
                        });
                    }
                });
            });

            // Render the flattened items
            galleryData.forEach((item, index) => {
                const delay = (index % 6 + 1) * 100;
                
                const galleryItem = document.createElement('div');
                galleryItem.className = `gallery-item reveal-text delay-${delay}`;
                galleryItem.innerHTML = `
                    <img src="${item.image}" alt="${item.title}">
                    <div class="gallery-overlay">
                        <div class="gallery-title">${item.title}</div>
                        <div class="gallery-date"><i class="far fa-calendar-alt"></i> ${item.date}</div>
                    </div>
                `;
                
                // Click to open lightbox
                galleryItem.addEventListener('click', () => {
                    openLightbox();
                    currentSlide(index + 1);
                });
                
                galleryContainer.appendChild(galleryItem);
                
                // Observe for animation
                galleryObserver.observe(galleryItem);
            });
        } else if (rawData && rawData.length === 0) {
            galleryContainer.innerHTML = '<p class="text-center" style="grid-column: 1/-1; padding: 2rem;">বর্তমানে কোনো ছবি পাওয়া যায়নি।</p>';
        }
    } catch (error) {
        console.error('Error fetching gallery:', error);
        galleryContainer.innerHTML = '<p class="text-center" style="grid-column: 1/-1; padding: 2rem; color: #ff3366;">সার্ভার থেকে গ্যালারি লোড করা সম্ভব হয়নি। অনুগ্রহ করে পরে চেষ্টা করুন।</p>';
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

