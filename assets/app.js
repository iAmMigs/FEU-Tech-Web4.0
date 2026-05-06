import './stimulus_bootstrap.js';
import './styles/app.css';

document.addEventListener('turbo:load', () => {
    // Scroll Animation Observer (Fade up sections)
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    };

    const scrollObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                // Optional: Stop observing once animated in
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.scroll-animate').forEach(el => {
        scrollObserver.observe(el);
    });

    // Number Counter Animation Observer
    const counterObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                startCounterAnimation(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 }); // Trigger when element is half visible

    document.querySelectorAll('.counter-animate').forEach(el => {
        counterObserver.observe(el);
    });

    function startCounterAnimation(el) {
        const targetStr = el.getAttribute('data-target');
        const suffix = el.getAttribute('data-suffix') || '';
        const duration = 2000; // Total animation duration in ms
        const frameRate = 60; // Frames per second
        const totalFrames = Math.round((duration / 1000) * frameRate);
        
        // Check if target has 'k+' or similar in text, parse just the float
        let targetVal = parseFloat(targetStr);
        if (isNaN(targetVal)) targetVal = 0;

        let currentFrame = 0;
        
        const counterInterval = setInterval(() => {
            currentFrame++;
            const progress = currentFrame / totalFrames;
            // Easing out function for smoother stop
            const easeOutProgress = 1 - Math.pow(1 - progress, 3); 
            
            let currentVal = targetVal * easeOutProgress;
            
            // Format number depending on size
            let displayVal = "";
            if (targetStr.includes('k')) {
                 // For like 2k+
                 displayVal = currentVal.toFixed(1) + 'k+';
                 // If the target didn't actually have a decimal in original 2k+, clean it up
                 if (currentVal >= targetVal) displayVal = targetStr; 
            } else if (Number.isInteger(targetVal)) {
                 displayVal = Math.floor(currentVal);
            } else {
                 displayVal = currentVal.toFixed(1);
            }

            el.innerText = displayVal + (suffix ? suffix : '');

            if (currentFrame >= totalFrames) {
                clearInterval(counterInterval);
                el.innerText = targetStr + suffix; // Ensure exact final value is set
            }
        }, 1000 / frameRate);
    }
});
