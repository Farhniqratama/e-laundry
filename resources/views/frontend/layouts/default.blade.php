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
        /* Chat Button */
        #chat-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        #chat-button {
            background: #25D366;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            font-size: 16px;
            font-weight: bold;
            cursor: grab;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease, transform 0.2s ease;
            gap: 8px;
        }

        .chat-icon {
            font-size: 18px;
        }

        /* Hover Effect */
        #chat-button:hover {
            background: #1EBE5D;
            transform: scale(1.05);
        }

        /* Chat Window */
        #chat-window {
            display: none;
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 320px;
            height: 420px;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1001;
            font-family: Arial, sans-serif;
            overflow: hidden;
            border: 1px solid #ccc;
        }

        /* Chat Header */
        #chat-header {
            background: #075E54;
            color: white;
            padding: 10px;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: grab;
        }

        #chat-close {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        /* Chat Messages */
        #chat-messages {
            height: 320px;
            overflow-y: auto;
            padding: 10px;
            background: #ECE5DD;
            display: flex;
            flex-direction: column;
        }

        /* Chat Input */
        #chat-form {
            display: flex;
            padding: 10px;
            background: white;
            border-top: 1px solid #ccc;
        }

        #chat-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
        }

        #chat-send {
            margin-left: 10px;
            padding: 10px 15px;
            background: #128C7E;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        /* Mobile Optimization */
        @media (max-width: 768px) {
            #chat-button {
                font-size: 14px;
                padding: 8px 12px;
            }

            .chat-icon {
                font-size: 16px;
            }

            #chat-window {
                width: 90%;
                right: 5%;
            }
        }

        /* Chat Message Bubbles */
        .sender,
        .receiver {
            max-width: 75%;
            padding: 10px;
            border-radius: 10px;
            margin: 5px 0;
        }

        .sender {
            background: #DCF8C6;
            align-self: flex-end;
        }

        .receiver {
            background: white;
            align-self: flex-start;
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
                    <li class="">
                        <a href="#" class="sf-with-ul">Kategori</a>
                        @php $dataCategories = getKategori(); @endphp
                        <ul style="display: none;">
                            @foreach ($dataCategories as $dc)
                            <li><a href="{{ URL::to('produk-by-kategori/'.$dc->id) }}">{{ $dc->nama_kategori }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @if(!empty(session('auth_user')))
                    <li><a href="{{ URL::to('histori-transaksi') }}">Pesanan</a></li>
                    @endif
                </ul>
                <ul class="mobile-menu">
                    @if(!empty(session('auth_user')))
                    <li><a href="{{ URL::to('profil') }}" class="">Profil</a></li>
                    <li><a href="{{ URL::to('logout-user') }}" class="">Logout</a></li>
                    @else
                    <li><a href="{{ URL::to('login-user') }}" class="">Login</a></li>
                    @endif
                </ul>
            </nav>
        </div>
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
            <a href="{{ URL::to('profil') }}" class="">
                <i class="icon-user-2"></i>Account
            </a>
            @else
            <a href="{{ URL::to('login-user') }}" class="">
                <i class="icon-user-2"></i>Login
            </a>
            @endif
        </div>
        @php
        $authUser = session('auth_user') ?? []; // Ensure it's an array
        $pelangganId = isset($authUser['pelanggan_id']) ? $authUser['pelanggan_id'] : null;
        $dataCartNya = $pelangganId ? getCart($pelangganId) ?? [] : [];
        $cartCount = count($dataCartNya);
        @endphp

        <div class="sticky-info">
            <a href="{{ URL::to('cart') }}" class="">
                <i class="icon-shopping-cart position-relative">
                    @if($cartCount > 0)
                    <span class="cart-count badge-circle">{{ $cartCount }}</span>
                    @endif
                </i>Cart
            </a>
        </div>
    </div>
    <!-- End .newsletter-popup -->

    <!-- Scroll to Top Button -->
    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    @if(!empty(session('auth_user')))
    <div id="chat-container">
        <button id="chat-button">
            <i class="fas fa-comment-alt chat-icon"></i>
            <span class="chat-text">Chat Admin</span>
        </button>
    </div>
    @endif

    <!-- Chat Window -->
    <div id="chat-window">
        <div id="chat-header">
            <span>Chat Admin</span>
            <button id="chat-close">&times;</button>
        </div>
        <div id="chat-messages"></div>
        <form id="chat-form">
            <input type="text" id="chat-input" placeholder="Type a message">
            <button type="submit" id="chat-send">Send</button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const chatButton = document.getElementById('chat-button');
            const chatWindow = document.getElementById('chat-window');
            const chatClose = document.getElementById('chat-close');
            const chatForm = document.getElementById('chat-form');
            const chatInput = document.getElementById('chat-input');
            const chatMessages = document.getElementById('chat-messages');
    
            let isDragging = false;
            let startX, startY, initialX, initialY;
    
            // Open Chat Window
            chatButton.addEventListener('click', () => {
                chatWindow.style.display = 'block';
            });
    
            // Close Chat Window
            chatClose.addEventListener('click', () => {
                chatWindow.style.display = 'none';
            });
    
            // Fetch Messages
            async function loadMessages() {
                try {
                    const response = await fetch('/messages');
                    const messages = await response.json();
                    chatMessages.innerHTML = '';
    
                    messages.forEach(msg => {
                        const messageElement = document.createElement('div');
                        messageElement.classList.add(msg.chat_sender ? 'sender' : 'receiver');
                        messageElement.textContent = msg.chat_sender ?? msg.chat_receiver;
                        chatMessages.appendChild(messageElement);
                    });
    
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                } catch (error) {
                    console.error('Error loading messages:', error);
                }
            }
    
            // Send Message
            chatForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const message = chatInput.value.trim();
    
                if (message === '') return;
    
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
    
            // Refresh Messages Every 3 Seconds
            setInterval(loadMessages, 3000);
            loadMessages();
    
            // Make Chat Button Draggable & Snap to Side
            function makeButtonDraggable(button) {
                function startDrag(e) {
                    isDragging = true;
                    startX = e.type.includes("mouse") ? e.clientX : e.touches[0].clientX;
                    startY = e.type.includes("mouse") ? e.clientY : e.touches[0].clientY;
                    const rect = button.getBoundingClientRect();
                    initialX = rect.left;
                    initialY = rect.top;
    
                    document.addEventListener("mousemove", moveButton);
                    document.addEventListener("mouseup", stopDrag);
                    document.addEventListener("touchmove", moveButton, { passive: false });
                    document.addEventListener("touchend", stopDrag);
                }
    
                function moveButton(e) {
                    if (!isDragging) return;
                    e.preventDefault();
    
                    let currentX = e.type.includes("mouse") ? e.clientX : e.touches[0].clientX;
                    let currentY = e.type.includes("mouse") ? e.clientY : e.touches[0].clientY;
    
                    let newX = initialX + (currentX - startX);
                    let newY = initialY + (currentY - startY);
    
                    // Ensure the button stays within the viewport
                    newX = Math.max(0, Math.min(newX, window.innerWidth - button.offsetWidth));
                    newY = Math.max(0, Math.min(newY, window.innerHeight - button.offsetHeight));
    
                    button.style.position = "fixed";
                    button.style.left = `${newX}px`;
                    button.style.top = `${newY}px`;
                }
    
                function stopDrag() {
                    if (!isDragging) return;
                    isDragging = false;
                    document.removeEventListener("mousemove", moveButton);
                    document.removeEventListener("mouseup", stopDrag);
                    document.removeEventListener("touchmove", moveButton);
                    document.removeEventListener("touchend", stopDrag);
    
                    // Snap the button to the closest side (left or right)
                    const buttonRect = button.getBoundingClientRect();
                    const middleX = window.innerWidth / 2;
                    let finalX = buttonRect.left < middleX ? 10 : window.innerWidth - button.offsetWidth - 10; // Snap left or right
    
                    button.style.left = `${finalX}px`;
                    button.style.transition = "left 0.2s ease-out"; // Smooth transition
                    setTimeout(() => {
                        button.style.transition = ""; // Reset transition
                    }, 200);
                }
    
                button.addEventListener("mousedown", startDrag);
                button.addEventListener("touchstart", startDrag, { passive: true });
            }
    
            // Enable Draggable Chat Button with Auto-Snap
            makeButtonDraggable(chatButton);
        });
    </script>
    <script src="{{ asset('parfume') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('parfume') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('parfume') }}/assets/js/plugins.min.js"></script>
    <script src="{{ asset('parfume') }}/assets/js/jquery.appear.min.js"></script>
    <!-- Main JS File -->
    <script src="{{ asset('parfume') }}/assets/js/main.min.js"></script>
</body>

</html>