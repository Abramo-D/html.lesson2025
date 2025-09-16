if (history.scrollRestoration) {
    history.scrollRestoration = 'manual';
}

window.addEventListener('load', () => {
    const gifSection = document.querySelector('.gif-container');
    if (gifSection) {
        gifSection.scrollIntoView({ behavior: 'smooth' });
    }
});
