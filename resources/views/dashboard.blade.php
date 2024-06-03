<x-app-layout>
    


    <section  class="container relative max-w-screen-xl pt-10 pb-24 z-10">
        <div >
            <div class="text-center mb-[3.5rem]">
                <h1 class="font-semibold text-3xl m-5">Welcome to the admin of the <span class="font-extrabold text-4xl text-lavender-pink">Tickety web app!</span></h1>
                <a class="bg-lavender-pink p-3 rounded-xl text-white font-bold" href="{{ route('admin.events.index') }}">Add a Event!</a>
            </div>

            <div class="flex justify-center">
                <img src="{{ asset('assets/mokup.png') }}" alt="" class="w-[70%]">
            </div>
            
        </div>

    </section>


    <img draggable="false" src="{{ asset('assets/svgs/wavy-line-1.svg') }}" class="absolute  md:top-[150px] w-full"
    alt="tickety-assets">

</x-app-layout>
