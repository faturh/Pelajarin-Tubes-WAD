<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelajarin - E-Learning</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">Pelajarin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-primary fw-semibold" href="{{ route('elearn_main') }}">E-Learning</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary fw-semibold" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <!-- Title -->
                <h1 class="card-title text-primary">{{ $elearn->Title }}</h1>

                <!-- Publisher -->
                <p class="text-muted"><strong>Publisher:</strong> {{ $elearn->Publisher }}</p>

                <!-- Video -->
                <div class="embed-responsive embed-responsive-16by9 mb-4">
                    <div id="video-player"></div>
                </div>

                <!-- Description -->
                <p class="mb-4"><strong>Description:</strong> {{ $elearn->Description ?? 'No description available' }}</p>

                <!-- Certificate -->
                @if ($elearn->Certificate)
                    <button id="download-button" class="btn btn-primary" disabled>
                        Download Certificate
                    </button>
                @endif
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- YouTube Player API -->
    <script src="https://www.youtube.com/iframe_api"></script>

    <script>
        let player;
        const videoKey = `video_watched_{{ $elearn->id }}`; // Unique key for each video

        // Load YouTube Player
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('video-player', {
                height: '500',
                width: '100%',
                videoId: '{{ str_replace("https://www.youtube.com/watch?v=", "", $elearn->Link) }}',
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        // Video State Change Handler
        function onPlayerStateChange(event) {
            // 0 indicates video ended
            if (event.data === YT.PlayerState.ENDED) {
                document.getElementById('download-button').disabled = false;
                setCookie(videoKey, 'true', 7); // Save to cookies for 7 days
            }
        }

        // Check Cookies on Page Load
        document.addEventListener('DOMContentLoaded', () => {
            if (getCookie(videoKey) === 'true') {
                document.getElementById('download-button').disabled = false;
            }
        });

        // Set Cookies
        function setCookie(name, value, days) {
            const d = new Date();
            d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }

        // Get Cookies
        function getCookie(name) {
            const decodedCookie = decodeURIComponent(document.cookie);
            const cookies = decodedCookie.split(';');
            for (let i = 0; i < cookies.length; i++) {
                let cookie = cookies[i].trim();
                if (cookie.indexOf(name + "=") === 0) {
                    return cookie.substring(name.length + 1);
                }
            }
            return "";
        }

        // Button Alert
        document.getElementById('download-button').addEventListener('click', function () {
            if (this.disabled) {
                alert('Please finish watching the video to download the certificate.');
            } else {
                window.location.href = '{{ asset("storage/" . $elearn->Certificate) }}';
            }
        });
    </script>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</body>

</html>
