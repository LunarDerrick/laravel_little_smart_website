<script>
    function loadingPrompt(formId, submitBtnId) {
        document.getElementById(formId).addEventListener('submit', function() {
            var button = document.getElementById(submitBtnId);
            var spinner = button.querySelector('.spinner-border');
            var buttonText = document.getElementById('button-text');

            button.disabled = true;
            spinner.style.display = 'inline-block';
            buttonText.textContent = 'Loading...';
        });
    }
</script>
