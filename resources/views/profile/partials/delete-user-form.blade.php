<section class="space-y-4">
    <header class="flex items-center gap-3 mb-4 pb-3 border-b border-slate-100">
        <div class="w-9 h-9 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center border border-rose-100">
            <i class="fa-solid fa-triangle-exclamation text-base"></i>
        </div>
        <div>
            <h2 class="text-sm font-extrabold text-slate-900" style="font-family: 'Outfit', sans-serif;">
                {{ __('Delete Account') }}
            </h2>
            <p class="text-[10px] text-rose-500 font-bold uppercase tracking-wider mt-0.5">
                {{ __('Danger Zone — Permanent Action') }}
            </p>
        </div>
    </header>

    <div class="bg-rose-50/60 border border-rose-200/80 p-3.5 rounded-xl flex items-start gap-3">
        <i class="fa-solid fa-circle-exclamation text-rose-500 text-base mt-0.5 flex-shrink-0"></i>
        <div>
            <h4 class="text-xs font-extrabold text-rose-900 mb-0.5">Warning about account deletion</h4>
            <p class="text-xs text-rose-700 font-medium leading-relaxed">
                {{ __('Once your account is deleted, all of its resources and data will be permanently removed. Before proceeding, please download any order history or invoice details you wish to retain.') }}
            </p>
        </div>
    </div>

    <button
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-rose-600 hover:bg-rose-700 text-white font-extrabold px-5 py-2.5 rounded-xl text-xs tracking-wider uppercase transition-all shadow-sm hover:shadow-md cursor-pointer flex items-center gap-2 w-fit"
    >
        <i class="fa-solid fa-user-slash text-xs"></i> {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-base font-extrabold text-slate-900 mb-2" style="font-family: 'Outfit', sans-serif;">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="text-xs text-slate-500 font-medium leading-relaxed mb-5">
                {{ __('Once your account is deleted, all of its resources and data will be permanently erased. Please enter your account password to confirm account deletion.') }}
            </p>

            <div>
                <label for="password" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">{{ __('Confirm Password') }} *</label>
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 pointer-events-none">
                        <i class="fa-solid fa-lock text-xs"></i>
                    </span>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full bg-slate-50 border border-slate-200 focus:bg-white rounded-xl pl-9 pr-4 py-2.5 text-xs font-bold text-slate-800 shadow-2xs focus:outline-none focus:border-rose-500 focus:ring-2 focus:ring-rose-500/10 transition duration-200"
                        placeholder="{{ __('Enter your current password') }}"
                    />
                </div>

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-1" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="px-4 py-2 border border-slate-200 rounded-xl text-xs font-bold text-slate-700 hover:bg-slate-50 transition cursor-pointer">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="px-5 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-extrabold transition shadow-sm cursor-pointer">
                    {{ __('Confirm Deletion') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
