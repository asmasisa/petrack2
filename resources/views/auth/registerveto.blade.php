<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('registerveto.store') }}">
            @csrf

            <!-- Nom complet -->
            <div>
                <x-label for="nomcomplet" :value="__('Nom complet')" />
                <x-input id="nomcomplet" class="block mt-1 w-full" type="text" name="nomcomplet" :value="old('nomcomplet')" required autofocus autocomplete="name" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Mot de passe -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirmation du mot de passe -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <!-- Numéro de téléphone -->
            <div class="mt-4">
                <x-label for="numtel" :value="__('Numéro de téléphone')" />
                <x-input id="numtel" class="block mt-1 w-full" type="text" name="numtel" required autocomplete="tel" />
            </div>

            <!-- Nom du cabinet -->
            <div class="mt-4">
                <x-label for="nom_cabinet" :value="__('Nom du cabinet')" />
                <x-input id="nom_cabinet" class="block mt-1 w-full" type="text" name="nom_cabinet" required autocomplete="organization" />
            </div>

            <!-- Heures de travail -->
            <div class="mt-4">
                <x-label for="heure_travail" :value="__('Heures de travail')" />
                <x-input id="heure_travail" class="block mt-1 w-full" type="text" name="heure_travail" required autocomplete="work-hours" />
            </div>

            <!-- Frais de consultation -->
            <div class="mt-4">
                <x-label for="frais_consultation" :value="__('Frais de consultation')" />
                <x-input id="frais_consultation" class="block mt-1 w-full" type="number" step="0.01" name="frais_consultation" required autocomplete="transaction-amount" />
            </div>

            <!-- Localisation -->
            <div class="mt-4">
                <x-label for="localisation" :value="__('Localisation')" />
                <x-input id="localisation" class="block mt-1 w-full" type="text" name="localisation" required autocomplete="address-level1" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-label for="description" :value="__('Description')" />
                <textarea id="description" class="block mt-1 w-full" name="description" required autocomplete="off"></textarea>
            </div>

            <!-- Image -->
            <div class="mt-4">
                <x-label for="image" :value="__('Télécharger votre photo')" />
                <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" required />
            </div>

            <!-- Conditions générales et politique de confidentialité -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('J\'accepte les :terms_of_service et la :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Conditions d\'utilisation').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Politique de confidentialité').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <!-- Boutons -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('registerveto.store') }}">
                    {{ __('Inscrire vétérinaire') }}
                </a>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Déjà inscrit?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('S\'inscrire') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
