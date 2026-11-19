<x-layout>
    @if($errors->any())
        <div style="color: red; padding: 1rem;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="main-content">
        <h2 class="page-title">Latest Chirps</h2>
        
        <!-- The Create Form -->
        <form action="/chirp/{{$chirp->id}}" method="POST" class="chirp-form">
            @csrf
            @method('PUT')
            <textarea name="message" placeholder="What's on your mind?" required></textarea>
            
            @error('message')
                <span style="color: red; font-size: 0.85rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
            @enderror

            <div class="form-footer">
                <button type="submit">Update Chirp</button>
            </div>
        </form>

      
            
    </div>
</x-layout>