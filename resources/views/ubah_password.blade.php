<div class="flex flex-col md:flex-row md:space-x-8 p-6 bg-white rounded shadow-md">
    <!-- Form Ubah Password -->
    <div class="md:w-2/3">
      <h2 class="text-2xl font-bold mb-2">Ubah Password</h2>
      <p class="text-gray-500 mb-6">Ubah Password dengan memasukkan password lama dan password baru</p>
  
      <form action="#" method="POST" class="space-y-4">
        <!-- Password Lama -->
        <div>
          <label class="block mb-1 text-gray-700">Password Lama</label>
          <div class="relative">
            <input type="password" name="current_password" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Masukkan password lama">
            <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
              
            </button>
          </div>
        </div>
  
        <!-- Password Baru -->
        <div>
          <label class="block mb-1 text-gray-700">Password Baru</label>
          <div class="relative">
            <input type="password" name="new_password" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Masukkan password baru">
            <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
              
            </button>
          </div>
        </div>
  
        <!-- Konfirmasi Password Baru -->
        <div>
          <label class="block mb-1 text-gray-700">Konfirmasi Password Baru</label>
          <div class="relative">
            <input type="password" name="new_password_confirmation" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Masukkan konfirmasi password baru">
            <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
              
            </button>
          </div>
        </div>
  
        <button type="submit" class="mt-4 bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">
          Update Password
        </button>
      </form>
    </div>
  
    <!-- Persyaratan Password -->
    <div class="md:w-1/3 bg-teal-600 text-white rounded p-6 mt-8 md:mt-0">
      <h3 class="text-xl font-semibold mb-4">Persyaratan Password</h3>
      <ul class="list-disc list-inside space-y-2 text-sm">
        <li>Minimal 8 karakter</li>
        <li>Minimal satu karakter huruf kecil</li>
        <li>Minimal satu karakter huruf besar (kapital)</li>
        <li>Tidak boleh sama dengan kata sandi sebelumnya</li>
      </ul>
    </div>
  </div>
  