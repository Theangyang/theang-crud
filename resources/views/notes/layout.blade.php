<<<<<<< HEAD
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notes CRUD - @yield('page_title')</title>

    {{-- PWA Meta Tags --}}
    <meta name="theme-color" content="#e91e8c">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/icons/icon-192.png">

    <style>
        /* Base Colors */
        :root {
            --primary-pink: #D9007C;
            --secondary-pink: #FF77A9;
            --background: #ffffff;
            --text-dark: #333333;
            --text-muted: #6B7280;
            --border-color: #E5E7EB;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background);
            color: var(--text-dark);
            line-height: 1.6;
            padding: 30px 20px;
        }

        h1, h2, h3 {
            font-weight: bold;
            color: var(--primary-pink);
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: var(--primary-pink);
        }

        a:hover {
            color: var(--secondary-pink);
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--white);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .topbar .logo {
            font-size: 26px;
            font-weight: bold;
            color: var(--primary-pink);
        }

        .topbar .btn-primary {
            background-color: var(--primary-pink);
            color: var(--white);
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
        }

        .topbar .btn-primary:hover {
            background-color: var(--secondary-pink);
        }

        .card {
            background-color: var(--white);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
            margin-top: 30px;
        }

        .card-header {
            border-bottom: 3px solid var(--border-color);
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .card-body {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: var(--primary-pink);
            color: var(--white);
            border-radius: 8px;
            font-size: 14px;
            margin: 10px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: var(--secondary-pink);
        }

        .btn-danger {
            background-color: #EF4444;
        }

        .btn-danger:hover {
            background-color: #DC2626;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 15px;
            margin-bottom: 15px;
            background-color: #f7fafc;
        }

        input[type="text"]:focus, textarea:focus {
            border-color: var(--primary-pink);
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 180px;
        }

        .alert {
            padding: 20px;
            background-color: #D1FAE5;
            border-radius: 10px;
            color: #10B981;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .errors {
            padding: 20px;
            background-color: #FECACA;
            border-radius: 10px;
            color: #B91C1C;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .note-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-top: 30px;
        }

        .note-item {
            background-color: var(--white);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .note-item h3 {
            margin-bottom: 15px;
            font-size: 20px;
            color: var(--primary-pink);
        }

        .note-item p {
            font-size: 16px;
            color: var(--text-muted);
            margin-bottom: 20px;
        }

        /* PWA Install Button */
        #installBtn {
            display: none;
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 9999;
            background: #e91e8c;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(233, 30, 140, 0.4);
        }

        #installBtn:hover {
            background: #c2177a;
        }

        @media (max-width: 768px) {
            .note-list {
                grid-template-columns: 1fr;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-primary {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="topbar">
            <div class="logo">Capecenio Notes</div>
            <a href="{{ route('notes.create') }}" class="btn-primary">+ New Note</a>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>@yield('page_title')</h2>
                <p>@yield('page_subtitle')</p>
            </div>
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- PWA Install Button --}}
    <button id="installBtn">📲 Install App</button>

    <script>
        // Register Service Worker
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js')
                .then(reg => console.log('SW registered:', reg.scope))
                .catch(err => console.error('SW error:', err));
        }

        // Capture install prompt
        let deferredPrompt;
        const installBtn = document.getElementById('installBtn');

        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            installBtn.style.display = 'block';
        });

        installBtn.addEventListener('click', async () => {
            if (!deferredPrompt) return;
            deferredPrompt.prompt();
            const { outcome } = await deferredPrompt.userChoice;
            console.log('User choice:', outcome);
            deferredPrompt = null;
            installBtn.style.display = 'none';
        });

        // Hide button if already installed
        window.addEventListener('appinstalled', () => {
            installBtn.style.display = 'none';
            deferredPrompt = null;
        });
    </script>
</body>
</html>
=======
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
>>>>>>> d51b3eb3179f90eed5bd5bb7b2b166b738f5273f
