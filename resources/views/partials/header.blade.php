<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Prodi SI</a>

        <ul class="navbar-nav ms-auto flex-row">
            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('/') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('/profile') }}">Profile</a>
            </li>
            
             <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('/project') }}">Project</a>
            </li>

            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('/about') }}">About</a>
            </li>
        </ul>
    </div>
</nav>