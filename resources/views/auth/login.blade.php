<x-layout.guest class="flex justify-center min-h-screen bg-lumora">
@section('content')

<div class="flex w-full">

  <div class="hidden md:block w-1/2 overflow-hidden relative">
    <div class="absolute top-0 left-0 w-full h-full bg-black opacity-10 z-20"></div>
    <img src="/media/dashboard/splash-@php echo rand(1,13) @endphp.jpg" width="1125" height="1500" alt="" class="block w-full h-full absolute top-0 left-0 object-cover">
  </div>

  <div class="w-full md:w-1/2 flex flex-col justify-center">

    <div class="p-32 lg:p-48 max-w-lg mx-auto">
      <h1 class="text-lg leading-[1.2] mb-24 md:mb-36">
        Auszeichnung für gute Bauten der Stadt Zürich
      </h1>
      @if ($errors->any())
        <x-auth.toast status="Es ist ein Fehler aufgetreten." type="error" />
      @endif

      @if (session('status'))
        <x-auth.toast :status="session('status')" type="success" />
      @endif

      <x-auth.wrapper>
      
        <form 
          method="POST" 
          action="{{ route('auth.login') }}" 
          class="flex flex-col gap-y-16 w-full">
          @csrf

          <x-auth.text-input 
            type="email" 
            name="email" 
            :value="old('email')"
            data-error="{{ $errors->has('email') ? 'true' : null }}"
            placeholder="{{ __('E-Mail') }}"
            required />

          <x-auth.text-input 
            type="password"
            name="password"
            placeholder="{{ __('Passwort') }}"
            data-error="{{ $errors->has('password') ? 'true' : null }}"
            required />

          <x-auth.primary-button>
            {{ __('Login') }}
          </x-auth.primary-button>

        </form>
      
      </x-auth.wrapper>
    </div>
  </div>
@endsection
</x-layout.guest>
