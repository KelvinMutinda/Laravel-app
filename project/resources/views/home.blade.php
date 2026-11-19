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
        <form action="/chirps" method="POST" class="chirp-form">
            @csrf
            <textarea name="message" placeholder="What's on your mind?" required></textarea>
            
            @error('message')
                <span style="color: red; font-size: 0.85rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
            @enderror

            <div class="form-footer">
                <button type="submit">Chirp</button>
            </div>
        </form>

        <!-- The Chirps List -->
        @forelse($chirps as $chirp)
            <div class="welcome-card chirp-item">
                <div class="avatar"></div>
                <div class="chirp-content">
                    <div class="chirp-header">
                        <strong>{{ data_get($chirp, 'user.name', 'Anonymous') }}</strong>
                        @if (data_get($chirp, 'created_at'))
                            <span class="time">{{ \Illuminate\Support\Carbon::parse(data_get($chirp, 'created_at'))->diffForHumans() }}</span>
                        @endif
                    </div>
                    <p>{{ data_get($chirp, 'message') }}</p>
                    
                    <!-- ACTION BUTTONS -->
                    <div class="chirp-actions">
                        <!-- Edit Button (Links to a form page for now) -->
                        <a href="/chirps/{{ $chirp->id }}/edit" class="btn-edit">Edit</a>

                        <!-- Delete Form -->
                        <form action="/chirps/{{ $chirp->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this chirp?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="welcome-card">
                <p>No chirps yet! Be the first to chirp.</p>
            </div>
        @endforelse
    </div>
</x-layout>