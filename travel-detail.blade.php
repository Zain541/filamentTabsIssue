    <x-wire-elements-pro::tailwind.slide-over on-submit="save" :content-padding="false">
      <x-slot name="title">{{ __('Travel Details') }}</x-slot>

      <!-- No padding will be applied because the component attribute "content-padding" is set to false -->
      <form wire:submit.prevent="submit">
        {{ $this->travelDocumentationForm }}
        <div class="d-flex mt-3 justify-content-end">
          <button type="submit" style="text-align:right" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{ __('Submit') }}
          </button>
        </div>

      </form>

        <form wire:submit.prevent="submit">
        {{ $this->contactForm }}
        <div class="d-flex mt-3 justify-content-end">
          <button type="submit" style="text-align:right" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{ __('Submit') }}
          </button>
        </div>

      </form>
    </x-wire-elements-pro::tailwind.slide-over>
