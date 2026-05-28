<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#D9007C">
<script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/sw.js')
                .then(reg => console.log('SW registered'))
                .catch(err => console.log('SW error', err));
        });
    }
</script>