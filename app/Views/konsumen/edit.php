<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Konsumen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen p-6">

    <div class="max-w-5xl mx-auto">
        <!-- Card Container -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
            <!-- Card Header -->
            <div class="bg-blue-50 px-6 py-4 border-b border-blue-100">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-user-edit text-blue-500 text-xl"></i>
                    <h1 class="text-xl font-semibold text-gray-800">Edit Data Konsumen</h1>
                </div>
                <p class="text-sm text-gray-600 mt-1">ID: <?= esc($konsumen['kode_konsumen']) ?></p>
            </div>
            
            <!-- Form Content - Horizontal Layout -->
            <form action="<?= base_url('/konsumen/update/' . $konsumen['id']) ?>" method="post" class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Kode Konsumen <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-id-card text-gray-400"></i>
                                </div>
                                <input type="text" name="kode_konsumen" value="<?= esc($konsumen['kode_konsumen']) ?>" required
                                    class="pl-10 w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Nama Konsumen <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input type="text" name="nama" value="<?= esc($konsumen['nama']) ?>" required
                                    class="pl-10 w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">No. Telepon</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-phone text-gray-400"></i>
                                </div>
                                <input type="text" name="no_hp" value="<?= esc($konsumen['no_hp']) ?>"
                                    class="pl-10 w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
                            </div>
                        </div>

                        <div class="space-y-4">
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Alamat</label>
                            <div class="relative">
                                <div class="absolute top-3 left-3">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                </div>
                                <textarea name="alamat" rows="3"
                                    class="pl-10 w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200"><?= esc($konsumen['alamat']) ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 pt-4 border-t border-gray-200 flex justify-end space-x-3">
                    <a href="<?= base_url('/konsumen') ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        <i class="fas fa-save mr-2"></i>
                        Perbarui Data
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>