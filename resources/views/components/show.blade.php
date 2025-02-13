<div class="min-h-screen bg-neutral-50 dark:bg-neutral-900 pt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-neutral-900 dark:text-white mb-6">
            Riwayat Penyewaan
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($rentals as $rental)
            <div class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm border border-neutral-200 dark:border-neutral-700 overflow-hidden hover:shadow-md transition-shadow duration-200 flex flex-col h-full">
                <!-- Header -->
                <div class="p-4 border-b border-neutral-200 dark:border-neutral-700">
                    <div class="flex justify-between items-start mb-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-neutral-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="font-medium text-neutral-900 dark:text-white">
                                {{ $rental->name }}
                            </span>
                        </div>
                        
                        @if($rental->status == 0)
                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full border-blue-500 text-blue-500 bg-blue-500/10">
                                Belum Dikonfirmasi
                            </span>
                        @elseif($rental->status == 1)
                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full border-blue-500 text-blue-500 bg-blue-500/10">
                                Dikonfirmasi
                            </span>
                        @elseif($rental->status == 2)
                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full border-green-500 text-green-500 bg-green-500/10">
                                Disewa
                            </span>
                        @elseif($rental->status == 3)
                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full border-gray-500 text-gray-500 bg-gray-500/10">
                                Dikembalikan
                            </span>
                        @elseif($rental->status == 4)
                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full text-red-500 bg-red-500/10">
                                Dibatalkan
                            </span>
                        @elseif($rental->status == 5)
                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full text-red-500 bg-red-500/10">
                                Belum Diselesaikan
                            </span>
                        @else
                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full border-gray-500 text-gray-500 bg-gray-500/10">

                            </span>
                        @endif
                            {{-- @switch($rental->status)
                                @case(0) Belum Dikonfirmasi @break
                                @case(1) Dikonfirmasi @break
                                @case(2) Disewa @break
                                @case(3) Dikembalikan @break
                                @case(4) Dibatalkan @break
                                @case(5) Belum Diselesaikan @break
                                @default Tidak Diketahui
                            @endswitch --}}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4 space-y-4 flex-grow">
                    <!-- Products -->
                    <div class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-neutral-500 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        <div class="flex-1">
                            <div class="text-sm text-neutral-600 dark:text-neutral-300">
                                @foreach($rental->details as $detail)
                                    <div>{{ $detail->product->name }} ({{ $detail->quantity }}x)</div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-neutral-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <span class="text-sm font-medium text-neutral-900 dark:text-white">
                            Rp {{ number_format($rental->price, 0, '', '.') }}
                        </span>
                    </div>

                    <!-- Rental Period -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-neutral-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm text-neutral-600 dark:text-neutral-300">
                                Mulai: {{ Carbon\Carbon::parse($rental->start_time)->format('d/m/Y h.i.s A') }}
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-neutral-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm text-neutral-600 dark:text-neutral-300">
                                Selesai: {{ Carbon\Carbon::parse($rental->end_time)->format('d/m/Y h.i.s A') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="p-4 border-t border-neutral-200 dark:border-neutral-700 mt-auto">
                    <form method="POST" action="{{ route('rentals.cancel', $rental->id) }}" class="w-full">
                        @csrf
                        <button type="submit" 
                                class="w-full flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 rounded-md hover:bg-red-50 dark:hover:bg-red-900/10 transition-colors duration-200"
                                onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Batalkan Pesanan
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>