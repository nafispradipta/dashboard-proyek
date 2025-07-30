@extends('layouts.app')

@section('title', 'Edit Proyek')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Edit Proyek</h1>
        <p class="mt-1 text-sm text-gray-600">Perbarui informasi proyek</p>
    </div>

    <div class="bg-white shadow rounded-lg">
        <form action="{{ route('projects.update', $project) }}" method="POST" class="space-y-6 p-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="client_id" class="block text-sm font-medium text-gray-700">Client *</label>
                    <select name="client_id" id="client_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('client_id') border-red-500 @enderror">
                        <option value="">Pilih Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ old('client_id', $project->client_id) == $client->id ? 'selected' : '' }}>
                                {{ $client->name }} ({{ $client->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('client_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="website_name" class="block text-sm font-medium text-gray-700">Nama Website *</label>
                    <input type="text" name="website_name" id="website_name" value="{{ old('website_name', $project->website_name) }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('website_name') border-red-500 @enderror">
                    @error('website_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700">URL Website</label>
                    <input type="url" name="url" id="url" value="{{ old('url', $project->url) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('url') border-red-500 @enderror">
                    @error('url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status Proyek *</label>
                    <select name="status" id="status" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('status') border-red-500 @enderror">
                        <option value="">Pilih Status</option>
                        <option value="planning" {{ old('status', $project->status) == 'planning' ? 'selected' : '' }}>Planning</option>
                        <option value="in_progress" {{ old('status', $project->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="on_hold" {{ old('status', $project->status) == 'on_hold' ? 'selected' : '' }}>On Hold</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="domain_expiry" class="block text-sm font-medium text-gray-700">Tanggal Kadaluarsa Domain</label>
                    <input type="date" name="domain_expiry" id="domain_expiry" value="{{ old('domain_expiry', $project->domain_expiry?->format('Y-m-d')) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('domain_expiry') border-red-500 @enderror">
                    @error('domain_expiry')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="hosting_expiry" class="block text-sm font-medium text-gray-700">Tanggal Kadaluarsa Hosting</label>
                    <input type="date" name="hosting_expiry" id="hosting_expiry" value="{{ old('hosting_expiry', $project->hosting_expiry?->format('Y-m-d')) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('hosting_expiry') border-red-500 @enderror">
                    @error('hosting_expiry')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="hosting_provider" class="block text-sm font-medium text-gray-700">Penyedia Hosting</label>
                    <select name="hosting_provider" id="hosting_provider"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('hosting_provider') border-red-500 @enderror">
                        <option value="">Pilih Provider Hosting</option>
                        <option value="Shared Hosting" {{ old('hosting_provider', $project->hosting_provider) == 'Shared Hosting' ? 'selected' : '' }}>Shared Hosting</option>
                        <option value="Cloud Server" {{ old('hosting_provider', $project->hosting_provider) == 'Cloud Server' ? 'selected' : '' }}>Cloud Server</option>
                        <option value="VPS Server" {{ old('hosting_provider', $project->hosting_provider) == 'VPS Server' ? 'selected' : '' }}>VPS Server</option>
                    </select>
                    @error('hosting_provider')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="price_display" class="block text-sm font-medium text-gray-700">Harga (Rp) *</label>
                    <input type="text" id="price_display" value="{{ old('price', $project->price) }}" required
                           placeholder="0"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('price') border-red-500 @enderror">
                    <input type="hidden" name="price" id="price" value="{{ old('price', $project->price) }}">
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="payment_date" class="block text-sm font-medium text-gray-700">Tanggal Pembayaran</label>
                    <input type="date" name="payment_date" id="payment_date" value="{{ old('payment_date', $project->payment_date?->format('Y-m-d')) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('payment_date') border-red-500 @enderror">
                    @error('payment_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="payment_status" class="block text-sm font-medium text-gray-700">Status Pembayaran *</label>
                    <select name="payment_status" id="payment_status" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('payment_status') border-red-500 @enderror">
                        <option value="">Pilih Status</option>
                        <option value="pending" {{ old('payment_status', $project->payment_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ old('payment_status', $project->payment_status) == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="overdue" {{ old('payment_status', $project->payment_status) == 'overdue' ? 'selected' : '' }}>Overdue</option>
                    </select>
                    @error('payment_status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="package_status" class="block text-sm font-medium text-gray-700">Status Paket *</label>
                <select name="package_status" id="package_status" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('package_status') border-red-500 @enderror">
                    <option value="">Pilih Paket</option>
                    <option value="website" {{ old('package_status', $project->package_status) == 'website' ? 'selected' : '' }}>Pembuatan Website</option>
                    <option value="maintenance" {{ old('package_status', $project->package_status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    <option value="seo" {{ old('package_status', $project->package_status) == 'seo' ? 'selected' : '' }}>SEO</option>
                    <option value="website_maintenance" {{ old('package_status', $project->package_status) == 'website_maintenance' ? 'selected' : '' }}>Pembuatan Website, Maintenance</option>
                    <option value="website_seo" {{ old('package_status', $project->package_status) == 'website_seo' ? 'selected' : '' }}>Pembuatan Website, SEO</option>
                    <option value="website_maintenance_seo" {{ old('package_status', $project->package_status) == 'website_maintenance_seo' ? 'selected' : '' }}>Pembuatan Website, Maintenance, SEO</option>
                </select>
                @error('package_status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700">Catatan</label>
                <textarea name="notes" id="notes" rows="4"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('notes') border-red-500 @enderror">{{ old('notes', $project->notes) }}</textarea>
                @error('notes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('projects.show', $project) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                    Perbarui Proyek
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const priceDisplayInput = document.getElementById('price_display');
    const priceHiddenInput = document.getElementById('price');
    
    // Function to format number with dots as thousand separators
    function formatRupiah(value) {
        // Remove all non-digit characters
        const number = value.replace(/\D/g, '');
        
        // Add dots as thousand separators
        return number.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }
    
    // Function to get raw number (remove dots)
    function getRawNumber(value) {
        return value.replace(/\./g, '');
    }
    
    // Format existing value on page load
    if (priceDisplayInput.value) {
        const rawValue = getRawNumber(priceDisplayInput.value);
        priceDisplayInput.value = formatRupiah(priceDisplayInput.value);
        priceHiddenInput.value = rawValue;
    }
    
    // Format input on keyup and update hidden input
    priceDisplayInput.addEventListener('input', function(e) {
        const cursorPosition = e.target.selectionStart;
        const oldValue = e.target.value;
        const oldLength = oldValue.length;
        
        // Format the value
        const formattedValue = formatRupiah(e.target.value);
        e.target.value = formattedValue;
        
        // Update hidden input with raw value
        const rawValue = getRawNumber(formattedValue);
        priceHiddenInput.value = rawValue;
        
        // Adjust cursor position
        const newLength = formattedValue.length;
        const newCursorPosition = cursorPosition + (newLength - oldLength);
        e.target.setSelectionRange(newCursorPosition, newCursorPosition);
    });
    
    // Prevent non-numeric input
    priceDisplayInput.addEventListener('keypress', function(e) {
        // Allow backspace, delete, tab, escape, enter
        if ([8, 9, 27, 13, 46].indexOf(e.keyCode) !== -1 ||
            // Allow Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
            (e.keyCode === 65 && e.ctrlKey === true) ||
            (e.keyCode === 67 && e.ctrlKey === true) ||
            (e.keyCode === 86 && e.ctrlKey === true) ||
            (e.keyCode === 88 && e.ctrlKey === true)) {
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>
@endsection