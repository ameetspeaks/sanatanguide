@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    <!-- Top Navigation Bar -->
    <div class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('scriptures.show', $scripture) }}" class="text-gray-600 hover:text-gray-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <h1 class="ml-4 text-xl font-semibold text-gray-900">{{ $scripture->name }}</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Page Navigation -->
                    <div class="flex items-center space-x-2">
                        <button id="prevPage" class="p-2 rounded-full hover:bg-gray-100 text-gray-600 hover:text-gray-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <span class="text-sm text-gray-600">
                            Page <span id="pageNum" class="font-medium">1</span> of <span id="pageCount" class="font-medium">0</span>
                        </span>
                        <button id="nextPage" class="p-2 rounded-full hover:bg-gray-100 text-gray-600 hover:text-gray-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                    <!-- Zoom Controls -->
                    <div class="flex items-center space-x-2">
                        <button id="zoomOut" class="p-2 rounded-full hover:bg-gray-100 text-gray-600 hover:text-gray-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                            </svg>
                        </button>
                        <span id="zoomLevel" class="text-sm text-gray-600 font-medium">100%</span>
                        <button id="zoomIn" class="p-2 rounded-full hover:bg-gray-100 text-gray-600 hover:text-gray-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PDF Reader Box -->
    <div class="relative flex-1 w-full bg-gray-100 min-h-screen py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Book-like Container -->
            <div class="bg-white rounded-lg shadow-2xl overflow-hidden" style="min-height: 800px;">
                <!-- PDF Controls Bar -->
                <div class="bg-gray-50 border-b border-gray-200 px-4 py-3 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="text-sm text-gray-600">
                            Reading Mode
                        </div>
                    </div>
                </div>
                
                <!-- PDF Content Area -->
                <div id="pdfContainer" class="relative" style="height: 800px;">
                    <div id="pdfViewer" class="absolute inset-0 flex items-center justify-center bg-gray-50">
                        <canvas id="pdfCanvas" class="max-w-full max-h-full shadow-lg"></canvas>
                    </div>
                    
                    <!-- Loading Spinner -->
                    <div id="loading" class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-90">
                        <div class="flex flex-col items-center">
                            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-saffron-600"></div>
                            <p class="mt-4 text-sm text-gray-600">Loading scripture...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
// Initialize PDF.js with caching enabled
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

let pdfDoc = null;
let pageNum = 1;
let pageRendering = false;
let pageNumPending = null;
let scale = 1.0; // Start with default scale
let canvas = document.getElementById('pdfCanvas');
let ctx = canvas.getContext('2d');
let pdfCache = new Map();
let currentPage = null;

// Load the PDF
async function loadPDF() {
    try {
        const pdfUrl = "{{ $scripture->google_drive_pdf_url }}";
        const loadingTask = pdfjsLib.getDocument(pdfUrl);
        
        pdfDoc = await loadingTask.promise;
        document.getElementById('pageCount').textContent = pdfDoc.numPages;
        
        // Initial render
        await renderPage(1);
        
        // Pre-fetch next page
        if (pdfDoc.numPages > 1) {
            preRenderPage(2);
        }
    } catch (error) {
        console.error('Error loading PDF:', error);
        document.getElementById('loading').innerHTML = `
            <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <p class="mt-4 text-red-600">Error loading PDF. Please try again later.</p>
            </div>
        `;
    }
}

// Calculate optimal scale for the viewport
function calculateOptimalScale(page) {
    const container = document.getElementById('pdfViewer');
    const viewport = page.getViewport({ scale: 1.0 });
    
    // Calculate scale to fit width with padding
    const containerWidth = container.clientWidth - 48; // 24px padding on each side
    const containerHeight = container.clientHeight - 48;
    
    // Calculate scales for both width and height
    const scaleX = containerWidth / viewport.width;
    const scaleY = containerHeight / viewport.height;
    
    // Use the smaller scale to ensure the page fits both dimensions
    return Math.min(scaleX, scaleY);
}

// Pre-render page
async function preRenderPage(num) {
    if (pdfCache.has(num)) return;
    try {
        const page = await pdfDoc.getPage(num);
        const optimalScale = calculateOptimalScale(page);
        const viewport = page.getViewport({ scale: optimalScale });
        
        const offscreenCanvas = document.createElement('canvas');
        const ctx = offscreenCanvas.getContext('2d');
        
        offscreenCanvas.height = viewport.height;
        offscreenCanvas.width = viewport.width;
        
        await page.render({
            canvasContext: ctx,
            viewport: viewport
        }).promise;
        
        pdfCache.set(num, { canvas: offscreenCanvas, viewport });
    } catch (error) {
        console.warn('Error pre-rendering page:', error);
    }
}

// Render the page
async function renderPage(num) {
    pageRendering = true;
    document.getElementById('loading').style.display = 'flex';
    
    try {
        // Check cache first
        if (pdfCache.has(num)) {
            const cached = pdfCache.get(num);
            canvas.width = cached.canvas.width;
            canvas.height = cached.canvas.height;
            ctx.drawImage(cached.canvas, 0, 0);
            currentPage = cached.viewport;
        } else {
            const page = await pdfDoc.getPage(num);
            const optimalScale = calculateOptimalScale(page);
            const viewport = page.getViewport({ scale: optimalScale });
            
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            currentPage = viewport;
            
            await page.render({
                canvasContext: ctx,
                viewport: viewport
            }).promise;
            
            // Cache the rendered page
            const cacheCanvas = document.createElement('canvas');
            cacheCanvas.width = canvas.width;
            cacheCanvas.height = canvas.height;
            cacheCanvas.getContext('2d').drawImage(canvas, 0, 0);
            pdfCache.set(num, { canvas: cacheCanvas, viewport });
        }
        
        pageRendering = false;
        document.getElementById('loading').style.display = 'none';
        document.getElementById('pageNum').textContent = num;
        document.getElementById('zoomLevel').textContent = Math.round(scale * 100) + '%';
        
        // Pre-render adjacent pages
        if (num < pdfDoc.numPages) preRenderPage(num + 1);
        if (num > 1) preRenderPage(num - 1);
        
        if (pageNumPending !== null) {
            renderPage(pageNumPending);
            pageNumPending = null;
        }
    } catch (error) {
        console.error('Error rendering page:', error);
        document.getElementById('loading').innerHTML = `
            <div class="text-center">
                <p class="text-red-600">Error rendering page. Please try again.</p>
            </div>
        `;
    }
}

// Previous page
function goPrevPage() {
    if (pageNum <= 1) return;
    pageNum--;
    queueRenderPage(pageNum);
}

// Next page
function goNextPage() {
    if (pageNum >= pdfDoc.numPages) return;
    pageNum++;
    queueRenderPage(pageNum);
}

// Zoom in
function zoomIn() {
    if (!currentPage) return;
    scale *= 1.2;
    pdfCache.clear();
    renderPage(pageNum);
}

// Zoom out
function zoomOut() {
    if (!currentPage) return;
    scale *= 0.8;
    pdfCache.clear();
    renderPage(pageNum);
}

// Queue rendering
function queueRenderPage(num) {
    if (pageRendering) {
        pageNumPending = num;
    } else {
        renderPage(num);
    }
}

// Event listeners
document.getElementById('prevPage').addEventListener('click', goPrevPage);
document.getElementById('nextPage').addEventListener('click', goNextPage);
document.getElementById('zoomIn').addEventListener('click', zoomIn);
document.getElementById('zoomOut').addEventListener('click', zoomOut);

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft') {
        goPrevPage();
    } else if (e.key === 'ArrowRight') {
        goNextPage();
    } else if (e.key === '+' || e.key === '=') {
        zoomIn();
    } else if (e.key === '-' || e.key === '_') {
        zoomOut();
    }
});

// Handle window resize
let resizeTimeout;
window.addEventListener('resize', function() {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(function() {
        if (currentPage) {
            pdfCache.clear();
            renderPage(pageNum);
        }
    }, 250);
});

// Load the PDF when the page loads
window.addEventListener('load', loadPDF);
</script>
@endpush
@endsection 