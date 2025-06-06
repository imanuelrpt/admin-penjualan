<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Konsumen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen p-6">

    <div class="max-w-3xl mx-auto">
        <!-- Card Container -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
            <!-- Card Header -->
            <div class="bg-blue-50 px-6 py-4 border-b border-blue-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-user-circle text-blue-500 text-2xl"></i>
                        <h1 class="text-xl font-semibold text-gray-800">Detail Konsumen</h1>
                    </div>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                        ID: <?= esc($konsumen['kode_konsumen']) ?>
                    </span>
                </div>
            </div>
            
            <!-- Card Content -->
            <div class="p-6">
                <div class="space-y-4">
                    <!-- Detail Item -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-id-card text-blue-500"></i>
                        </div>
                        <div class="ml-4">
                            <dt class="text-sm font-medium text-gray-500">Kode Konsumen</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-medium"><?= esc($konsumen['kode_konsumen']) ?></dd>
                        </div>
                    </div>

                    <!-- Detail Item -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-50 flex items-center justify-center">
                            <i class="fas fa-user text-green-500"></i>
                        </div>
                        <div class="ml-4">
                            <dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-medium"><?= esc($konsumen['nama']) ?></dd>
                        </div>
                    </div>

                    <!-- Detail Item -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-50 flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-purple-500"></i>
                        </div>
                        <div class="ml-4">
                            <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                            <dd class="mt-1 text-sm text-gray-900"><?= esc($konsumen['alamat']) ?></dd>
                        </div>
                    </div>

                    <!-- Detail Item -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-orange-50 flex items-center justify-center">
                            <i class="fas fa-phone text-orange-500"></i>
                        </div>
                        <div class="ml-4">
                            <dt class="text-sm font-medium text-gray-500">Nomor Telepon</dt>
                            <dd class="mt-1 text-sm text-gray-900"><?= esc($konsumen['no_hp']) ?></dd>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="mt-8 pt-5 border-t border-gray-200">
                    <a href="<?= base_url('/konsumen') ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>