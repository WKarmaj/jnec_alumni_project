<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-40 w-40 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-40 h-40 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

         <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone" value="{{ __('Phone') }}" />
            <x-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="state.phone" autocomplete="phone" />
            <x-input-error for="phone" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" autocomplete="username" />
            <x-input-error for="email" class="mt-2" />
        </div>
    
    <!-- Year of Graduation -->
    <div class="col-span-6 sm:col-span-4">
    <x-label for="year" value="{{ __('Year') }}" />
    <select name="year" id="year" class="px-3 py-2 block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.year" required>
        @for($i = 1974; $i <= 2100; $i++)
            <option value="{{ $i }}" @if($state['year'] == $i) selected @endif>{{ $i }}</option>
        @endfor
    </select>
    <x-input-error for="state.year" class="mt-2" />
</div>


    <!-- Current address -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Current Address') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address" autocomplete="address" />
            <x-input-error for="address" class="mt-2" />
        </div>

    <!-- Programme -->
    <div class="col-span-6 sm:col-span-4">
    <x-label for="programme" value="{{ __('Programme') }}" />
    <select name="programme" id="programme" class="px-3 py-2 block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.programme">
        @foreach(\App\Models\programme::all() as $program)
            <option value="{{ $program->programme_name }}" @if($state['programme'] == $program->programme_name) selected @endif>{{ $program->programme_name }}</option>
        @endforeach
    </select>
    <x-input-error for="programme" class="mt-2" />
    </div>

    <!-- Department -->
    <div wire:model.defer="state.department" class="col-span-6 sm:col-span-4">
    <x-label for="department" value="{{ __('Department') }}" />
    <select name="department" id="department" class="px-3 py-2 block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
        @foreach(\App\Models\department::all() as $department)
            <option value="{{ $department->department_name }}" @if(old('department', $state['department']) == $department->department_name) selected @endif>{{ $department->department_name }}</option>
        @endforeach
    </select>
    <x-input-error for="department" class="mt-2" />
    </div>

     <!-- Employment Status --> 
     <div wire:model.defer="state.employment_status" class="col-span-6 sm:col-span-4">
     <x-label for="employment_status" value="{{ __('Employment Status') }}" />
    <div class="flex items-center">
        
    <x-input id="employed" type="radio" class="mr-2" name="employment_status" value="employed" wire:model.defer="state.employment_status" onclick="document.getElementById('employed-fields').style.display = 'inline'" autocomplete="employment_status"/>
        <x-label for="employed" value="{{ __('Employed') }}" />
       
        <div id="employed-fields" class="ml-6" style="display:none">
            <div>
                <x-label for="organization" value="{{ __('Organization') }}" />
                <x-input id="organization" type="text" class="mt-1 block w-full" wire:model.defer="state.organization" />
                <x-input-error for="organization" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-label for="designation" value="{{ __('Position') }}" />
                <x-input id="designation" type="text" class="mt-1 block w-full" wire:model.defer="state.designation" />
                <x-input-error for="designation" class="mt-2" />
            </div>
        </div>

        <x-input id="unemployed" type="radio" class="ml-6 mr-2" name="employment_status" value="unemployed" wire:model.defer="state.employment_status"/>
    <x-label for="unemployed" value="{{ __('Unemployed') }}" />
        
    </div>

    <x-input-error for="employment_status" class="mt-2" />
</div>
  
     <!-- Relationship Status -->
         <div wire:model.defer="state.relationship_status" class="col-span-6 sm:col-span-4">
    <x-label for="relationship_status" value="{{ __('Relationship Status') }}" />
    <select id="relationship_status" name="relationship_status" class="mt-1 block w-full">
        <option value="" disabled selected>Select Relationship Status</option>
        <option value="Single" @if(old('relationship_status', $state['relationship_status']) == 'Single') selected @endif>Single</option>
        <option value="Married" @if(old('relationship_status', $state['relationship_status']) == 'Married') selected @endif>Married</option>
        <option value="Divorced" @if(old('relationship_status', $state['relationship_status']) == 'Divorced') selected @endif>Divorced</option>
        <option value="Widowed" @if(old('relationship_status', $state['relationship_status']) == 'Widowed') selected @endif>Widowed</option>
    </select>
    <x-input-error for="relationship_status" class="mt-2" />
    </div>
             <!-- Email -->
        <div class="col-span-6 sm:col-span-4">

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">

            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
