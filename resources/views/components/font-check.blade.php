<script>
    document.addEventListener('DOMContentLoaded', () => {
    // Function to check for Chinese characters
    function containsChinese(str) {
        return /[\u4e00-\u9fa5]/.test(str);
    }

    // Function to update font family based on content
    function updateFontFamily() {
        const elementsToCheck = ['h1 span', 'h2', 'h3', 'h5', 'label'];

        elementsToCheck.forEach(tag => {
            const elements = document.querySelectorAll(tag);
            elements.forEach(el => {
                if (containsChinese(el.textContent)) {
                    el.style.fontFamily = "'KN Bobohei', sans-serif"; // Change to Chinese font
                } else {
                    el.style.fontFamily = "'Nunito', sans-serif"; // Revert to default font
                }
            });
        });
    }

    // Initial check on page load
    updateFontFamily();

    // Create a MutationObserver to watch for changes in the DOM
    const observer = new MutationObserver(mutations => {
        mutations.forEach(mutation => {
            if (mutation.type === 'childList') {
                updateFontFamily(); // Re-check font family after changes
            }
        });
    });

    // Observe the body for changes
    observer.observe(document.body, {
        childList: true,
        subtree: true // Observe all descendant nodes
    });
});
</script>
