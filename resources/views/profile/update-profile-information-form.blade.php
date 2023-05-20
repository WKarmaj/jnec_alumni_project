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
    <x-label for="year" value="{{ __('Year of Graduation') }}" />
    <select name="year" id="year" class="px-3 py-2 block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.year" required>
         <option value="">Select Year</option>
        @for($i = 1974; $i <= 2100; $i++)
            <option value="{{ $i }}" @if($state['year'] == $i) selected @endif>{{ $i }}</option>
        @endfor
    </select>
    <x-input-error for="state.year" class="mt-2" />
</div>


    <!-- Current address -->
    <div class="col-span-6 sm:col-span-4">
    <x-label for="address" value="{{ __('Current Address') }}" />
    <select id="address" class="px-3 py-2 block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.address">
        <option value="">Select an address</option>
        <option value="Bumthang">Bumthang</option>
        <option value="Chukha">Chukha</option>
        <option value="Dagana">Dagana</option>
        <option value="Gasa">Gasa</option>
        <option value="Haa">Haa</option>
        <option value="Lhuntse">Lhuntse</option>
        <option value="Mongar">Mongar</option>
        <option value="Paro">Paro</option>
        <option value="Pema Gatshel">Pema Gatshel</option>
        <option value="Punakha">Punakha</option>
        <option value="Samdrup Jongkhar">Samdrup Jongkhar</option>
        <option value="Sarpang">Sarpang</option>
        <option value="Samtse">Samtse</option>
        <option value="Thimphu">Thimphu</option>
        <option value="Tsirang">Tsirang</option>
        <option value="Trashi Yangtse">Trashi Yangtse</option>
        <option value="Trashigang">Trashigang</option>
        <option value="Trongsa">Trongsa</option>
        <option value="Wangdue Phodrang">Wangdue Phodrang</option>
        <option value="Zhemgang">Zhemgang</option>
        <!-- Add more options here -->
    </select>
    <x-input-error for="address" class="mt-2" />
</div>


    <!-- Department -->
    <div class="col-span-6 sm:col-span-4">
    <x-label for="department" value="{{ __('Department') }}" />
    <select name="department" id="department" class="px-3 py-2 block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model="state.department_id">
        <option value="">Select Department</option>
        @foreach(\App\Models\Department::all() as $department)
            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
        @endforeach
    </select>
    <x-input-error for="department" class="mt-2" />
</div>

<!-- Programme -->
<div class="col-span-6 sm:col-span-4">
    <x-label for="programme" value="{{ __('Programme') }}" />
    <select name="programme" id="programme" class="px-3 py-2 block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model="state.programme_id">
        <option value="">Select Programme</option>
        @if($state['department_id'])
            @foreach(\App\Models\Programme::where('department_id', $state['department_id'])->get() as $program)
                <option value="{{ $program->id }}">{{ $program->programme_name }}</option>
            @endforeach
        @endif
    </select>
    <x-input-error for="programme" class="mt-2" />
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('departmentSelected', function (departmentId) {
                Livewire.emit('getProgrammes', departmentId);
            });
        });
    </script>
@endpush


  <!-- Employment Status -->
  <div class="col-span-6 sm:col-span-4">
    <x-label for="employment_status" value="{{ __('Employment Status') }}" />
    <div class="flex items-center">
        <input id="employed" type="radio" class="mr-2" name="employment_status" value="employed" wire:model.defer="state.employment_status" onclick="document.getElementById('employed-fields').style.display = 'inline'" autocomplete="off" />
        <label for="employed" class="mr-4">{{ __('Employed') }}</label>
        
        <div id="employed-fields" class="ml-6" style="display: none">
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

        <input id="unemployed" type="radio" class="ml-6 mr-2" name="employment_status" value="unemployed" wire:model.defer="state.employment_status" autocomplete="off" />
        <label for="unemployed">{{ __('Unemployed') }}</label>
    </div>

    <x-input-error for="employment_status" class="mt-2" />
</div>


             <!-- Email -->
    
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
