<div>
    @if (session()->has('message'))
        <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif
    <form action="{{ route('newpost.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Titre -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input  id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <!-- Légende -->
        <div class="mt-4">
            <x-input-label for="detail" :value="__('Detail')" />
            <textarea class="block mt-1 w-full" id="detail" name="detail" class="rounded-sm">{{ old('detail') }}</textarea>
            <x-input-error :messages="$errors->get('detail')" class="mt-2" />
        </div>
         <!-- Image -->
         <div class="flex items-center justify mt-4">
            <x-input-label for="image" />
            <input type="file" name="image" id="image" class="rounded-sm"/>
        </div> 

      
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Envoyer') }}
            </x-primary-button>
        </div>
    </form>
</div>
