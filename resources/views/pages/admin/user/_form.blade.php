<div x-data="userForm" class="space-y-3">

    <div class="form-field @error('name') has-error @enderror">
        <label for="name">Name</label>

        <div class="relative">
            <input 
                id="name" 
                name="name"
                type="text"
                placeholder="Name of User"
                class="form-input"
                
                value="{{ old('name', $user->name ?? '') }}"
            />
            
            @error('name')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('username') has-error @enderror">
        <label for="username">Username</label>
    
        <div class="relative">
            <input 
                id="username" 
                name="username"
                type="text"
                placeholder="Username"
                class="form-input"
                
                value="{{ old('username', $user->username ?? '') }}"
            />
            
            @error('username')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('username') has-error @enderror">
        <label for="username">
            <div class="flex flex-col md:flex-row md:items-center">
            <svg class="text-gray-500 w-6 h-6 mr-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
            Attach Avatar
            </div>
        </label>
    
        <div class="relative">
            <input 
                id="avatar" 
                name="avatar"
                type="file"
                placeholder="Attach avatar"
                class="form-input text-sm inline-flex items-center border bg-gray-100 rounded-full focus:rounded-full pl-2 pr-3 py-1 text-gray-600"
            />
            
            @error('username')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

</div>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("userForm", () => ({

            fields: {},
            
            init() {},
        }));
    });
</script>