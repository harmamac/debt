<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#667eea">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Money Manager">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="apple-touch-icon" href="{{ asset('icons/icon-192x192.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أدخل رمزك</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .code-entry-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .code-entry-card {
            background: white;
            border-radius: 2rem;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 400px;
            width: 90%;
            text-align: center;
        }
        
        .code-entry-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
        }
        
        .code-entry-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .code-entry-subtitle {
            color: #6b7280;
            margin-bottom: 2rem;
        }
        
        .code-input {
            width: 100%;
            padding: 1rem;
            font-size: 1.5rem;
            text-align: center;
            border: 3px solid #e5e7eb;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            letter-spacing: 0.5rem;
            font-weight: bold;
        }
        
        .code-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.2);
        }
        
        .code-submit-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 0.75rem;
            font-size: 1.125rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        .code-submit-btn:hover {
            transform: scale(1.02);
        }
        
        .error-message {
            background: #fee2e2;
            color: #991b1b;
            padding: 0.75rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="code-entry-container">
        <div class="code-entry-card">
            <div class="code-entry-icon">🔐</div>
            <h1 class="code-entry-title">مرحباً بك</h1>
            <p class="code-entry-subtitle">أدخل رمزك المكون من 6 أرقام</p>
            
            @if(session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif
            
            <form method="POST" action="{{ route('verify.code') }}" id="codeForm">
                @csrf
                <input 
                    type="text" 
                    name="code" 
                    id="codeInput"
                    class="code-input" 
                    placeholder="000000"
                    maxlength="6"
                    pattern="\d{6}"
                    inputmode="numeric"
                    required
                    autofocus
                >
                <button type="submit" class="code-submit-btn">دخول</button>
            </form>
        </div>
    </div>

    <script>
        // Only allow numbers
        document.getElementById('codeInput').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        
        // Auto-submit when 6 digits entered
        document.getElementById('codeInput').addEventListener('input', function(e) {
            if (this.value.length === 6) {
                document.getElementById('codeForm').submit();
            }
        });
    </script>

    <!-- Register Service Worker -->
        <script>
        if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js')
            .then(reg => console.log('Service Worker registered', reg))
            .catch(err => console.log('Service Worker registration failed', err));
        }
        </script>

    
</body>
</html>