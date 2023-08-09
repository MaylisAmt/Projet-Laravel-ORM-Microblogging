@props(['postId'])
<div>
    @if (session()->has('message'))
        <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif
    <form action="{{ route('comment.store')}}" method="post">
        @csrf
        <input type="hidden" name="post_id" value="{{$postId}}">
        <div class="mt-4">
            <x-input-label for="comment" :value="__('comment')" />
            <textarea class="block mt-1 w-[400px]" id="comment" name="comment" class="rounded-sm">{{ old('comment') }}</textarea>
            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Envoyer') }}
            </x-primary-button>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success">
             {{ session('success') }}
            </div>
        @endif
    </form>
</div>
