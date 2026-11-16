<x-layout>
     @foreach ($chirps as $chirp)
    <div class="main-content">
       
        <div class="welcome-card">
            <h3>{{$chirp['author']}}</h3>
            <p>{{$chirp['message']}}</p>
            <a href="#">{{$chirp['time']}}</a>
        </div>
      
    </div>
      @endforeach
</x-layout>