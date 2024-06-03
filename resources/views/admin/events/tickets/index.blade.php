<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-normal align-middle  gap-4">
            <a href="{{ route('admin.events.index') }}" class="pl-3 pr-3 pt-[2px] bg-lavender-pink mr-2 text-white rounded-xl font-bold">🔙 Back</a>
            <h2 class="text-xl font-semibold  text-gray-800">
            Event &raquo; {{ $event->name }} &raquo; Ticket
            </h2>
        </div>
    </x-slot> 
  
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-10">
          <a href="{{ route('admin.events.tickets.create', $event->id) }}"
             class="px-4 py-2 font-bold text-white bg-blue-500 rounded">
            + Add Ticket
          </a>
        </div>
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            @if (session('success'))
              <div class="px-4 py-2 mb-4 text-white bg-green-500 rounded">
                {{ session('success') }}
              </div>
            @endif
            <table class="w-full">
              <thead class="bg-gray-50">
                <tr>
                  <th style="max-width: 1%" class="px-6 py-3">ID</th>
                  <th class="px-6 py-3">Name</th>
                  <th class="px-6 py-3">Price</th>
                  <th class="px-6 py-3">Qty</th>
                  <th class="px-6 py-3">Maks.</th>
                  <th style="max-width: 1%" class="px-6 py-3">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tickets as $ticket)
                  <tr class="border-b">
                    <td class="px-6 py-4">{{ $ticket->id }}</td>
                    <td class="px-6 py-4">{{ $ticket->name }}</td>
                    <td class="px-6 py-4">${{ number_format($ticket->price) }}</td>
                    <td class="px-6 py-4">{{ number_format($ticket->quantity) }}</td>
                    <td class="px-6 py-4">{{ number_format($ticket->max_buy) }}</td>
                    <td class="px-6 py-4">
                      <a href="{{ route('admin.events.tickets.edit', [
                          'event' => $event->id,
                          'ticket' => $ticket->id,
                      ]) }}"
                         class="inline-block px-4 py-2 text-white bg-blue-500 rounded">
                        Edit
                      </a>
                      <form action="{{ route('admin.events.tickets.destroy', [
                          'event' => $event->id,
                          'ticket' => $ticket->id,
                      ]) }}"
                            method="POST" class="inline-block"
                            onsubmit="return confirm('delete ticket {{ $ticket->name }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded">
                          Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="mt-4">
              {{ $tickets->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>