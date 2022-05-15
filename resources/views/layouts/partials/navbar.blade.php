<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-secondary" style="transition: top 0.2s ease-in-out">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarItems" aria-controls="navbarItems" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarItems">
            <div class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <a class="nav-link active" href="{{ route('home') }}">Buku</a>
            </div>
        </div>
    </div>
</nav>

<script type="text/javascript">
    let _navbar = document.querySelector('.navbar')

    window.addEventListener('click', (event) => {
        let _toggler = _navbar.querySelector('.navbar-toggler')

        if (_toggler.getAttribute('aria-expanded') == 'true' && !_navbar.contains(event.target))
            _toggler.click()
    })
</script>
