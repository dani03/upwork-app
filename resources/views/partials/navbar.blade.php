
<header class="flex justify-between items-center px-5 rounded w-full py-5 bg-gray-100">
  <div> <a href="/" class="hover:text-green-500">logo</a></div>
  <nav>
    <a href="http://" class="mr-5 hover:text-green-500">nos missons</a>
    @guest
      <a href="{{route('login')}}" class="mr-5 hover:text-green-500">se connecter</a>
      <a href="{{route('register')}}" class="mr-5 hover:text-green-500">s'enregistrer</a>  
    @else  
      <a href="{{route('home')}}" class="mr-5 hover:text-green-500">tableau de bord</a>
      <a href="{{route('logout')}}" class="mr-5 hover:text-green-500" 
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">se deconnecter</a>
      <form id="logout-form" method="POST" action="{{route('logout')}}" style="display: none">
      @csrf
      </form>
      @endguest
  </nav>
</header>