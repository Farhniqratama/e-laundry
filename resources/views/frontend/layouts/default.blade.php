<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto – Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('parfume') }}/assets/images/icons/favicon.png">
    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '{{ asset("parfume") }}/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('{{ asset('service-worker.js') }}')
                .then(() => console.log('Service Worker registered'))
                .catch((error) => console.log('Service Worker registration failed:', error));
        }
    </script>
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('parfume') }}/assets/css/bootstrap.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('parfume') }}/assets/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('parfume') }}/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('parfume') }}/assets/css/demo6.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('parfume') }}/assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('parfume') }}/assets/vendor/fontawesome-free/css/all.min.css">
	<style>
		.header-dropdown>a:after {
			display: none !important;
		}
        .inner-quickview figure .btn-keranjang {
            position: absolute;
            padding: 0.8rem 1.4rem;
            bottom: 0;
            left: 0;
            width: 100%;
            height: auto;
            color: #fff;
            background-color: #ff7272;
            font-size: 1.3rem;
            font-weight: 400;
            letter-spacing: 0.025em;
            font-family: Poppins, sans-serif;
            text-transform: uppercase;
            visibility: hidden;
            opacity: 0;
            transform: none;
            margin: 0;
            border: none;
            line-height: 1.82;
            transition: padding-top 0.2s, padding-bottom 0.2s;
            z-index: 2;
        }
        .pagination {
            justify-self: center;
            margin-top: 20px;
        }
	</style>
    <style>
        /* Tombol Chat */
        #chat-button {
            position: fixed;
            bottom: 20px;
            right: 80px;
            background: #232529;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 24px;
            cursor: pointer;
            z-index: 1000;
        }

        /* Jendela Chat */
        #chat-window {
            display: none;
            position: fixed;
            bottom: 80px; /* Agar tidak menutupi button */
            right: 20px;  /* Sesuaikan agar pas di kanan bawah */
            width: 300px;
            height: 400px;
            border: 1px solid #ccc;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1001
        }

        #chat-header {
            background-color: #232529;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 18px;
        }

        #chat-messages {
            height: 290px;
            overflow-y: auto;
            padding: 10px;
            background-color: #f8f9fa;
        }

        #chat-form {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ccc;
        }

        #chat-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #chat-send {
            margin-left: 10px;
            padding: 10px 20px;
            background-color: #232529;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .sender {
            text-align: right;
        }

        .receiver {
            text-align: left;
        }
    </style>
</head>

<body class="wide">
    <div class="page-wrapper">
        <header class="header" style="background:#f6f6f6;">
            @include('frontend.layouts.partials.navbar')
        </header>
        <!-- End .header -->

        <main class="main">
            @yield('content')
        </main>
        <!-- End .main -->

        <footer class="footer appear-animate">

            @include('frontend.layouts.partials.footer')
            <!-- End .footer-middle -->
        </footer>
        <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active"><a href="{{ URL::to('/') }}" class="pl-4">Home</a></li>
					<li><a href="{{ URL::to('list-produk') }}">Produk</a></li>
					<li><a href="#">Kategori</a></li>
					@if(!empty(session('auth_user')))
					<li><a href="#">Pesanan</a></li>
					@endif
                </ul>
                <ul class="mobile-menu">
                    @if(!empty(session('auth_user')))
                    <li><a href="{{ URL::to('profile-user') }}" class="">Profil</a></li>
					<li><a href="{{ URL::to('logout-user') }}" class="">Logout</a></li>
					@else
					<li><a href="{{ URL::to('login-user') }}" class="">Login</a></li>
					@endif
                </ul>
            </nav>
        </div>
        <!-- End .mobile-menu-wrapper -->
    </div>
    <!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="{{ URL::to('/') }}">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{ URL::to('list-produk') }}" class="">
                <i class="icon-bag-3"></i>Produk
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{ URL::to('kategori-produk') }}" class="">
                <i class="icon-bars"></i>Kategori
            </a>
        </div>
        <div class="sticky-info">
            @if(!empty(session('auth_user')))
            <a href="{{ URL::to('profile-user') }}" class="">
            @else
            <a href="{{ URL::to('login-user') }}" class="">
            @endif
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{ URL::to('cart') }}" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle"></span>
                </i>Cart
            </a>
        </div>
    </div>
    <!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
    @if(!empty(session('auth_user')))
    <button id="chat-button">💬</button>
    @endif
    <!-- Jendela Chat -->
    <div id="chat-window">
        <div id="chat-header">Chat</div>
        <div id="chat-messages"></div>
        <form id="chat-form">
            <input type="text" id="chat-input" placeholder="Type a message">
            <button type="submit" id="chat-send">Send</button>
        </form>
    </div>
    <script>
        const chatButton = document.getElementById('chat-button');
        const chatWindow = document.getElementById('chat-window');
        const chatForm = document.getElementById('chat-form');
        const chatInput = document.getElementById('chat-input');
        const chatMessages = document.getElementById('chat-messages');

        // Fungsi membuka/menutup chat
        chatButton.addEventListener('click', () => {
            chatWindow.style.display = chatWindow.style.display === 'block' ? 'none' : 'block';
        });

        // Memuat pesan secara berkala
        async function loadMessages() {
            try {
                const response = await fetch('messages');
                const messages = await response.json();

                chatMessages.innerHTML = ''; // Reset isi chat
                messages.forEach(msg => {
                    const messageElement = document.createElement('div');
                    
                    // Tentukan pengirim atau penerima
                    if (msg.chat_sender !== null) {
                        messageElement.textContent = `${msg.chat_sender}`;
                        messageElement.classList.add('sender'); // Kelas untuk pesan yang dikirim
                    } else {
                        messageElement.textContent = `${msg.chat_receiver}`;
                        messageElement.classList.add('receiver'); // Kelas untuk pesan yang diterima
                    }

                    chatMessages.appendChild(messageElement);
                });

                chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll ke bawah
            } catch (error) {
                console.error('Error loading messages:', error);
            }
        }

        // Kirim pesan
        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const message = chatInput.value;

            try {
                const response = await fetch('/send-messages', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ message }),
                });

                if (!response.ok) {
                    console.error('Error sending message:', await response.text());
                    return;
                }

                chatInput.value = '';
                loadMessages();
            } catch (error) {
                console.error('Error sending message:', error);
            }
        });

        // Refresh pesan setiap 3 detik
        setInterval(loadMessages, 3000);

        // Load pesan awal
        loadMessages();
    </script>
	<script src="{{ asset('parfume') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('parfume') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('parfume') }}/assets/js/plugins.min.js"></script>
    <script src="{{ asset('parfume') }}/assets/js/jquery.appear.min.js"></script>
    <!-- Main JS File -->
    <script src="{{ asset('parfume') }}/assets/js/main.min.js"></script>
</body>

</html>