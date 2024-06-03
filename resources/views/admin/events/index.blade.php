<x-app-layout>
    <x-slot name="header">
      <h2 class="text-2xl font-semibold leading-tight text-gray-800">
        Event List
      </h2>
    </x-slot>
  
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-10">
          <a href="{{ route('admin.events.create') }}" class="px-4 py-3 text-xl font-bold text-white bg-blue-500 rounded-xl">
            + Add event
          </a>
        </div>
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            @if (session('success'))
              <div class="px-2 py-1 mb-4 text-white bg-green-500 rounded">
                {{ session('success') }}
              </div>
            @endif
            <table class="w-full">
              <thead class="bg-gray-50">
                <tr>
                  <th style="max-width: 1%" class="px-6 py-3">ID</th>
                  <th class="px-6 py-3">Name</th>
                  <th class="px-6 py-3">Category</th>
                  <th class="px-6 py-3">Date</th>
                  <th class="px-6 py-3">Duration</th>
                  <th style="max-width: 1%" class="px-6 py-3">Ticket</th>
                  <th style="max-width: 1%" class="px-6 py-3">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($events as $event)
                  <tr class="border-b">
                    <td class="px-6 py-4 font-bold">{{ $event->id }}</td>
                    <td class="px-6 py-4 font-bold">{{ $event->name }}</td>
                    <td class="px-6 py-4">{{ $event->category?->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $event->start_time->format('d M Y') }}</td>
                    <td class="px-6 py-4">{{ $event->durations}} Hours</td>
                    <td class="px-6 py-4 space-y-2 text-center">
                      <a href="{{ route('admin.events.transactions.index', $event->id) }}"
                        class="block px-2 py-1 text-white bg-yellow-500 rounded">
                       Transaksi
                     </a>
                      <a href="{{ route('admin.events.tickets.index', $event->id) }}"
                        class="block px-2 py-1 text-white bg-green-500 rounded outline outline-green-500">
                       Tiket
                     </a>
                    </td>
                    <td class="px-6 py-4 space-y-3 text-center">
                      <a href="{{ route('admin.events.edit', $event->id) }}"
                         class="block px-2 py-1 text-white bg-blue-500 rounded outline outline-blue-500">
                        Edit
                      </a>
                      <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="block"
                            onsubmit="return confirm('Hapus event {{ $event->name }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-2 py-1 font-bold text-red-500 bg-white outline outline-red-500 rounded">
                          Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="mt-4">
              {{ $events->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>