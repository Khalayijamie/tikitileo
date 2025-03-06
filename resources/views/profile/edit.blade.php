@extends('layout')

@section('content')
    <div class="container mx-auto py-8">
        <!-- Profile Information Update Form -->
        <section style="padding: 20px; background: #f8f9fa; margin-bottom: 20px; border-radius: 10px;">
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-center">
                    {{ __('Profile Information') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 text-center">
                    {{ __("Update your account's profile information and email address.") }}
                </p>
            </header>

            <div class="mt-4 flex items-center">
                <div class="profile-photo-wrapper">
                    <img src="{{ Auth::user()->profile_photo_url }}" class="profile-photo" alt="{{ Auth::user()->name }}">
                </div>
                <h3 class="text-xl font-medium text-gray-900 dark:text-gray-100 ml-4">{{ Auth::user()->name }}</h3>
            </div>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div style="margin-bottom: 10px;">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div style="margin-bottom: 10px;">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}
                                <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div style="margin-bottom: 10px;">
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" autocomplete="phone" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>

                <div style="margin-bottom: 10px;">
                    <x-input-label for="address" :value="__('Address')" />
                    <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" autocomplete="address" />
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                </div>

                <div style="margin-bottom: 10px;">
                    <x-input-label for="avatar" :value="__('Avatar')" />
                    <input id="avatar" name="avatar" type="file" class="mt-1 block w-full" accept="image/*" />
                    <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button style="background-color: #000; border-radius: 5px;">{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </section>

        <!-- Password Update Form -->
        <section style="padding: 20px; background: #f8f9fa; margin-bottom: 20px; border-radius: 10px;">
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-center">
                    {{ __('Update Password') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 text-center">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </p>
            </header>

            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')

                <div style="margin-bottom: 10px;">
                    <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                    <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div style="margin-bottom: 10px;">
                    <x-input-label for="update_password_password" :value="__('New Password')" />
                    <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div style="margin-bottom: 10px;">
                    <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button style="background-color: #000; border-radius: 5px;">{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'password-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </section>

        <!-- Account Deletion Form -->
        <section style="padding: 20px; background: #f8f9fa; margin-bottom: 20px; border-radius: 10px;">
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-center">
                    {{ __('Delete Account') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 text-center">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </p>
            </header>

            <x-danger-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                style="background-color: #000; border-radius: 5px;"
            >{{ __('Delete Account') }}</x-danger-button>

            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-center">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 text-center">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mt-6">
                        <x-input-label for="delete_user_password" value="Password" class="sr-only" />

                        <x-text-input
                            id="delete_user_password"
                            name="password"
                            type="password"
                            class="mt-1 block w-full"
                            placeholder="Password"
                        />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3" style="background-color: #000; border-radius: 5px;">
                            {{ __('Delete Account') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        </section>
    </div>
@endsection

<style>
    .profile-photo-wrapper {
        width: 40px;
        height: 40px;
        overflow: hidden;
        border-radius: 50%;
    }

    .profile-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
