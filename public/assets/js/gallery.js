/* Gallery Logic for Lightbox and Sliding */

let slideIndex = 1;
const galleryItems = document.querySelectorAll('.gallery-item');
const lightbox = document.getElementById('lightbox');
const lightboxImage = document.getElementById('lightbox-image');
const captionText = document.getElementById('caption');

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
  if (n > galleryItems.length) {slideIndex = 1}
  if (n < 1) {slideIndex = galleryItems.length}
  
  // Get content from the clicked item
  const item = galleryItems[slideIndex - 1]; // 0-indexed arr
  const img = item.querySelector('img').src;
  const title = item.querySelector('.gallery-title').innerText;
  
  // Set content
  if (lightboxImage) lightboxImage.src = img;
  if (captionText) captionText.innerText = title;
}

// Attach Event Listeners to Gallery Items
document.addEventListener('DOMContentLoaded', () => {
    galleryItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            openLightbox();
            currentSlide(index + 1);
        });
    });

    // Close on outside click is tricky if wrapper fills screen, 
    // but the black background is usually .lightbox itself.
    if(lightbox) {
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox || e.target.closest('.lightbox-content-wrapper') === null && !e.target.closest('.lightbox-prev') && !e.target.closest('.lightbox-next')) {
                 // closeLightbox(); // Optional: if user clicks on background
            }
        });
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', function(event) {
        if (lightbox.style.display === "block") {
            if (event.key === "Escape") {
                closeLightbox();
            } else if (event.key === "ArrowLeft") {
                changeSlide(-1);
            } else if (event.key === "ArrowRight") {
                changeSlide(1);
            }
        }
    });

    // Add lightbox HTML to body if not present (optional dynamic injection to avoid messy HTML)
    // Or we expect manual HTML addition.
});
