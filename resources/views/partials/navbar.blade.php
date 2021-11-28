<header class="flex justify-between items-center px-5 rounded w-full py-5 bg-gray-100">
    <div> <a href="/" class="hover:text-green-500">logo</a></div>

    <nav>
        <livewire:sreach>
            <a href="{{ route('jobs.index') }}" class="mr-5 hover:text-green-500">nos missons</a>
            @guest
                <a href="{{ route('login') }}" class="mr-5 hover:text-green-500">se connecter</a>
                <a href="{{ route('register') }}" class="mr-5 hover:text-green-500">s'enregistrer</a>
            @else
                <a href="{{ route('conversation.index') }}" class="mr-5 hover:text-green-500">Mes conversations</a>
                <a href="{{ route('home') }}" class="mr-5 hover:text-green-500">tableau de bord</a>
                <a href="{{ route('logout') }}" class="mr-5 hover:text-green-500"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">se deconnecter</a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                    @csrf
                </form>
                <p class="flex">{{ auth()->user()->name }}</p>
            @endguest
            
    </nav>
</header>
