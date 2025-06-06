<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Konsumen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 sticky top-0 z-10">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center space-y-2 md:space-y-0 md:space-x-4">
            <div class="flex items-center space-x-2">
                <i class="fas fa-user-plus text-blue-500"></i>
                <h1 class="text-lg font-bold text-gray-800">Form Konsumen</h1>
            </div>
            <div class="flex space-x-2">
                <a href="<?= base_url('/konsumen') ?>" class="bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-md flex items-center space-x-2 transition duration-200">
                    <i class="fas fa-list"></i>
                    <span>Daftar Konsumen</span>
                </a>
                <a href="<?= base_url('/dashboard') ?>" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-4 py-2 rounded-md flex items-center space-x-2 transition duration-200">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Form Container -->
    <div class="max-w-4xl mx-auto p-4">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100">
            <!-- Form Header -->
            <div class="bg-blue-50 px-6 py-4 border-b border-blue-100">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center space-x-2">
                    <i class="fas fa-user-circle text-blue-500"></i>
                    <span>Tambah Data Konsumen</span>
                </h2>
                <p class="text-sm text-gray-600 mt-1">Isi form berikut untuk menambahkan data konsumen baru</p>
            </div>
            
            <!-- Form Content -->
            <form action="<?= base_url('/konsumen/save') ?>" method="post" class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Kode Konsumen <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-id-card text-gray-400"></i>
                            </div>
                            <input type="text" name="kode_konsumen" required 
                                   class="pl-10 w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200"
                                   placeholder="Kode unik konsumen">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Nama Konsumen <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" name="nama" required 
                                   class="pl-10 w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200"
                                   placeholder="Nama lengkap konsumen">
                        </div>
                    </div>

                    

                    <div class="space-y-2 md:col-span-2 md:w-1/2">
                        <label class="block text-sm font-medium text-gray-700">No. Telepon</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-400"></i>
                            </div>
                            <input type="text" name="no_hp" 
                                   class="pl-10 w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200"
                                   placeholder="Nomor telepon aktif">
                        </div>
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                        <div class="relative">
                            <div class="absolute top-3 left-3">
                                <i class="fas fa-map-marker-alt text-gray-400"></i>
                            </div>
                            <textarea name="alamat" rows="3"
                                   class="pl-10 w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200"
                                   placeholder="Alamat lengkap konsumen"></textarea>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-6 rounded-md flex items-center space-x-2 transition duration-200">
                        <i class="fas fa-save"></i>
                        <span>Simpan Data</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
