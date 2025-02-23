{{-- RentalForm --}}

<div>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16 pt-24">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Formulir penyewaan</h2>
                <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12">
                    @section('content')
                        <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <div class="bg-white rounded-lg shadow p-6">
                                @if ($errors->any())
                                    <div class="bg-red-50 text-red-500 p-4 rounded-lg mb-6">
                                        <ul class="list-disc pl-5">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('rentals.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                        </div>
                                        
                                        
                                        <div>
                                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor telepon</label>
                                            <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                        </div>

                                        <div class="md:col-span-2">
                                            <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                                            <input type="text" name="address" id="address" value="{{ old('address') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <div class="flex justify-between items-center mb-2">
                                            <label class="block text-sm font-medium text-gray-700">Produk</label>
                                            <button type="button" onclick="addProduct()" class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                                Tambah Produk
                                            </button>
                                        </div>

                                        <div id="rental-details">
                                            <div class="rental-item flex space-x-4 mb-4">
                                                <select name="rentalDetails[0][product_id]" required class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                    <option value="">Pilih Barang</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                                            {{ $product->name }} (Stock: {{ $product->stock }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <input type="number" name="rentalDetails[0][quantity]" value="1" min="1" required class="w-24 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">
                                        <div>
                                            <label for="start_time" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                                            <input type="date" name="start_time" id="start_time" value="{{ old('start_time') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                        </div>

                                        <div>
                                            <label for="end_time" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                                            <input type="date" name="end_time" id="end_time" value="{{ old('end_time') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                        <textarea name="description" id="description" rows="3" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="mt-6">
                                        <label class="block text-sm font-medium text-gray-700">Total Harga</label>
                                        <input type="text" id="total_price" readonly class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50 shadow-sm">
                                    </div>

                                    <div class="mt-6 flex justify-end">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Sewa Sekarang
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- @push('scripts') -- @endpush --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JavaScript_AddProduct --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script>
        let productCount = 0;

        function addProduct() {
            productCount++;
            const template = `
            <div class="rental-item flex space-x-4 mb-4">
                <select name="rentalDetails[${productCount}][product_id]" required class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" onchange="updateTotalPrice()">
                    <option value="">Select Product</option>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                    {{ $product->name }} (Stock: {{ $product->stock }})
                    </option>
                    @endforeach
                </select>
                <input type="number" name="rentalDetails[${productCount}][quantity]" value="1" min="1" required class="w-24 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" oninput="updateTotalPrice()">
                <button type="button" onclick="removeProduct(this)" class="text-red-600 hover:text-red-800">
                    Remove
                </button>
            </div>
            `;
            document.getElementById('rental-details').insertAdjacentHTML('beforeend', template);
            updateTotalPrice();
        }

        function removeProduct(button) {
            button.closest('.rental-item').remove();
            updateTotalPrice();
        }

        // Replace the existing updateTotalPrice function with this:
        function updateTotalPrice() {
    const startDate = new Date(document.getElementById('start_time').value);
    const endDate = new Date(document.getElementById('end_time').value);
    let days = 0;

    // If we have both dates and they're valid
    if (!isNaN(startDate) && !isNaN(endDate) && endDate >= startDate) {
        const effectiveStartDate = new Date(startDate);
        effectiveStartDate.setDate(effectiveStartDate.getDate() + 1);
        days = Math.ceil((endDate - effectiveStartDate) / (1000 * 60 * 60 * 24)) + 1;
        days = Math.max(0, days);
    } else {
        // If dates aren't set or invalid, default to 1 day
        days = 1;
    }

    let total = 0;
    document.querySelectorAll('.rental-item').forEach(item => {
        const select = item.querySelector('select');
        const quantityInput = item.querySelector('input[type="number"]');
        const price = parseFloat(select.options[select.selectedIndex]?.dataset?.price || 0);
        const quantity = parseInt(quantityInput.value) || 0;

        if (price > 0 && quantity > 0) {
            total += price * quantity * days;
        }
    });

    document.getElementById('total_price').value = `Rp ${total.toLocaleString()}`;
}

// Add event listeners for all relevant fields
document.addEventListener('DOMContentLoaded', function() {
    // Listen for changes on the rental details container
    document.getElementById('rental-details').addEventListener('change', updateTotalPrice);
    document.getElementById('rental-details').addEventListener('input', updateTotalPrice);
    
    // Listen for date changes
    document.getElementById('start_time').addEventListener('change', updateTotalPrice);
    document.getElementById('end_time').addEventListener('change', updateTotalPrice);
    
    // Initial calculation
    updateTotalPrice();
});


        // Add event listeners
        document.addEventListener('input', updateTotalPrice);
        document.addEventListener('change', updateTotalPrice);
        document.addEventListener('DOMContentLoaded', updateTotalPrice);


        // Initial calculation
        updateTotalPrice();
    </script>
</div>
