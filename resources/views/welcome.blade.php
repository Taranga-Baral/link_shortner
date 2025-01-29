<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shorty PI - Taranga Baral</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Manrope', 'Inter', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #1f2937;
        }

        /* Toast Notification Styles */
        .toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            z-index: 1000;
        }

        .toast {
            background: #ffffff;
            padding: 16px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
            transform: translateX(120%);
            animation: slideIn 0.3s forwards, fadeOut 0.3s forwards 2.7s;
        }

        @keyframes slideIn {
            to {
                transform: translateX(0);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        .toast::before {
            content: '';
            width: 4px;
            height: 100%;
            background: #10b981;
            position: absolute;
            left: 0;
            top: 0;
            border-radius: 8px 0 0 8px;
        }

        .toast-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: rgba(16, 185, 129, 0.2);
            width: 100%;
            overflow: hidden;
        }

        .toast-progress::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background: #10b981;
            animation: progress 3s linear forwards;
        }

        @keyframes progress {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(0);
            }
        }



          /* General Styles */
          body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #1f2937;
        }

        .container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        h2 {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #111827;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        input[type="text"] {
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #3b82f6;
        }

        button {
            padding: 0.75rem;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2563eb;
        }

        /* Result Section */
        .result {
            margin-top: 2rem;
            text-align: left;
        }

        .result h3 {
            font-size: 1.25rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .result p {
            background: #f3f4f6;
            padding: 0.75rem;
            border-radius: 8px;
            word-break: break-all;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .copy-btn {
            padding: 0.5rem 1rem;
            background-color: #10b981;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .copy-btn:hover {
            background-color: #059669;
        }

        .no-links {
            color: #6b7280;
            font-style: italic;
        }

    </style>
</head>
<body>

   <div class="container">
        <h2>Shorty PI</h2>
        <form action="/short-url" method="post">
            @csrf
            <input type="text" name="long_url" placeholder="Enter your long URL here" required>
            <button type="submit">Shorten URL</button>
        </form>

        @if (isset($slug))
            <div class="result">
                <h3>Original URL</h3>
                <p>{{ $long_url }}</p>
                <h3>Shortened URL</h3>
                <p id="short-url">http://127.0.0.1:8000/{{ $slug }}</p>
                <button class="copy-btn" onclick="copyToClipboard()">Copy Short URL</button>
            </div>
        @else
            <p class="no-links">There are no links generated yet.</p>
        @endif
    </div>

    <script>
        function copyToClipboard() {
            const shortUrl = document.getElementById('short-url').innerText;
            navigator.clipboard.writeText(shortUrl).then(() => {
                showToast('Short URL copied to clipboard!');
            });
        }

        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'toast';

            toast.innerHTML = `
                <div class="toast-content">
                    ${message}
                </div>
                <div class="toast-progress"></div>
            `;

            const container = document.querySelector('.toast-container') || createToastContainer();
            container.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        function createToastContainer() {
            const container = document.createElement('div');
            container.className = 'toast-container';
            document.body.appendChild(container);
            return container;
        }
    </script>
</body>
</html>
