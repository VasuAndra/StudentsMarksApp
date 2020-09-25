<header id="header">
    <nav class="left">
        <a href="#menu"><span>Meniu</span></a>
    </nav>
    <a href={{ Auth::user()->is_student ? "student1.html" : "profesor.html" }} class="logo">NoteOnline</a>
    <nav class="right">
        {{-- <input type="button" class="button alt" value="Log out" onclick='{{route('users.logout')}}'> --}}
        <button type = "button" class = "button alt" onclick="window.location='{{route('users.logout')}}'"">Log out</button>
    </nav>
</header>