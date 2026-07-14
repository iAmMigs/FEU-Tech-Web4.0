/**
 * Admin Magazine PDF Preview
 *
 * After EasyAdmin renders the list table, this script finds every
 * <canvas class="pdf-thumb-canvas"> element, reads its data-pdf-url
 * attribute, and renders the first page of that PDF onto the canvas.
 */
(function () {
    pdfjsLib.GlobalWorkerOptions.workerSrc = '/flipbook/js/libs/pdf.worker.min.js';

    function renderThumbnails() {
        const canvases = document.querySelectorAll('canvas.pdf-thumb-canvas');
        if (!canvases.length) return;

        canvases.forEach(canvas => {
            const url = canvas.getAttribute('data-pdf-url');
            if (!url || canvas.dataset.rendered) return;
            canvas.dataset.rendered = 'true';

            pdfjsLib.getDocument(url).promise
                .then(pdf => pdf.getPage(1))
                .then(page => {
                    const scale = canvas.width / page.getViewport({ scale: 1 }).width;
                    const viewport = page.getViewport({ scale });

                    canvas.height = viewport.height;

                    return page.render({
                        canvasContext: canvas.getContext('2d'),
                        viewport,
                    }).promise;
                })
                .catch(err => {
                    console.error('[Admin PDF Preview] Failed to render', url, err);
                    const ctx = canvas.getContext('2d');
                    ctx.fillStyle = '#1e293b';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    ctx.fillStyle = '#ef4444';
                    ctx.font = '9px sans-serif';
                    ctx.textAlign = 'center';
                    ctx.fillText('Error', canvas.width / 2, canvas.height / 2);
                });
        });
    }

    // Run after DOM ready and after any Turbo page transitions
    document.addEventListener('DOMContentLoaded', renderThumbnails);
    document.addEventListener('turbo:load', renderThumbnails);
    document.addEventListener('turbo:render', renderThumbnails);
})();
