<section>
    <header class="flex items-center gap-3 mb-4 pb-3 border-b border-slate-100">
        <div class="w-9 h-9 bg-primary/10 text-primary rounded-xl flex items-center justify-center">
            <i class="fa-solid fa-shield-halved text-base"></i>
        </div>
        <div>
            <h2 class="text-sm font-extrabold text-slate-900" style="font-family: 'Outfit', sans-serif;">
                {{ __('Security & Password') }}
            </h2>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-0.5">
                {{ __('Update your password and secure your account') }}
            </p>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">{{ __('Current Password') }} *</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 pointer-events-none">
                    <i class="fa-solid fa-lock text-xs"></i>
                </span>
                <input id="update_password_current_password" name="current_password" type="password" 
                    class="w-full bg-slate-50 border border-slate-200 focus:bg-white rounded-xl pl-9 pr-4 py-2.5 text-xs font-bold text-slate-800 shadow-2xs focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition duration-200" 
                    autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="update_password_password" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">{{ __('New Password') }} *</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 pointer-events-none">
                        <i class="fa-solid fa-key text-xs"></i>
                    </span>
                    <input id="update_password_password" name="password" type="password" 
                        class="w-full bg-slate-50 border border-slate-200 focus:bg-white rounded-xl pl-9 pr-4 py-2.5 text-xs font-bold text-slate-800 shadow-2xs focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition duration-200" 
                        autocomplete="new-password" />
                </div>
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
            </div>

            <div>
                <label for="update_password_password_confirmation" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">{{ __('Confirm New Password') }} *</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 pointer-events-none">
                        <i class="fa-solid fa-check-double text-xs"></i>
                    </span>
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                        class="w-full bg-slate-50 border border-slate-200 focus:bg-white rounded-xl pl-9 pr-4 py-2.5 text-xs font-bold text-slate-800 shadow-2xs focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition duration-200" 
                        autocomplete="new-password" />
                </div>
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
            </div>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-extrabold px-5 py-2.5 rounded-xl text-xs tracking-wider uppercase transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 cursor-pointer flex items-center gap-2">
                <i class="fa-solid fa-key text-[10px]"></i> {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" class="text-xs text-emerald-600 font-extrabold flex items-center gap-1.5 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i class="fa-solid fa-circle-check"></i> {{ __('Password updated successfully.') }}
                </p>
            @endif
        </div>
    </form>
</section>
