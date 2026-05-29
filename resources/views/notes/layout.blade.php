<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notes CRUD - @yield('page_title')</title>
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
    <style>
        :root {
            --primary-pink: #D9007C;
            --secondary-pink: #FF77A9;
            --background: #ffffff;
            --text-dark: #333333;
            --text-muted: #6B7280;
            --border-color: #E5E7EB;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Arial', sans-serif; background-color: var(--background); color: var(--text-dark); line-height: 1.6; padding: 30px 20px; }
        h1, h2, h3 { font-weight: bold; color: var(--primary-pink); text-align: center; margin-bottom: 20px; }
        a { text-decoration: none; color: var(--primary-pink); }
        a:hover { color: var(--secondary-pink); }
        .topbar { display: flex; justify-content: space-between; align-items: center; background-color: #fff; padding: 20px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 30px; }
        .topbar .logo { font-size: 26px; font-weight: bold; color: var(--primary-pink); }
        .topbar .btn-primary { background-color: var(--primary-pink); color: white; padding: 12px 25px; border-radius: 8px; font-size: 14px; cursor: pointer; }
        .topbar .btn-primary:hover { background-color: var(--secondary-pink); }
        .card { background-color: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 6px 18px rgba(0,0,0,0.15); margin-top: 30px; }
        .card-header { border-bottom: 3px solid var(--border-color); padding-bottom: 20px; margin-bottom: 20px; }
        .card-body { margin-top: 20px; }
        .btn { display: inline-block; padding: 12px 25px; background-color: var(--primary-pink); color: white; border-radius: 8px; font-size: 14px; margin: 10px 0; cursor: pointer; transition: background-color 0.3s ease; }
        .btn:hover { background-color: var(--secondary-pink); }
        .btn-danger { background-color: #EF4444; }
        .btn-danger:hover { background-color: #DC2626; }
        input[type="text"], textarea { width: 100%; padding: 15px; border: 1px solid var(--border-color); border-radius: 8px; font-size: 15px; margin-bottom: 15px; background-color: #f7fafc; }
        input[type="text"]:focus, textarea:focus { border-color: var(--primary-pink); outline: none; }
        textarea { resize: vertical; min-height: 180px; }
        .alert { padding: 20px; background-color: #D1FAE5; border-radius: 10px; color: #10B981; margin-bottom: 25px; font-size: 14px; }
        .errors { padding: 20px; background-color: #FECACA; bord