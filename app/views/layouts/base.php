<!DOCTYPE html>
<html lang="id" x-data="{sidebarOpen: false}">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?? 'Sistem Manajemen Kepegawaian' ?></title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="/Kepegawaian/public/css/style.css">
        <style>
                /* small helper to ensure content area min-height */
                .min-h-screen-offset { min-height: calc(100vh - 64px); }
        </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans">
        <!-- Top navigation -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <button @click="sidebarOpen = !sidebarOpen" class="-ml-2 mr-2 h-10 w-10 inline-flex items-center justify-center rounded-md text-slate-500 hover:bg-slate-100 focus:outline-none lg:hidden">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </button>
                        <a href="/Kepegawaian/dashboard" class="flex items-center space-x-2">
                            <div class="h-8 w-8 bg-gradient-to-br from-indigo-600 to-cyan-400 rounded flex items-center justify-center text-white font-bold">SK</div>
                            <span class="hidden sm:inline-block font-semibold text-lg">Sistem Kepegawaian</span>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <?php if (isset($user)): ?>
                            <div class="hidden md:flex items-center space-x-4">
                                <div class="text-sm text-slate-600"><?= htmlspecialchars($user['nama'] ?? $user['username']) ?> <span class="text-xs text-slate-400">(<?= htmlspecialchars($user['role']) ?>)</span></div>
                                <a href="/Kepegawaian/logout" class="inline-flex items-center px-3 py-2 rounded-md bg-rose-500 text-white text-sm hover:bg-rose-600">Logout</a>
                            </div>
                        <?php else: ?>
                            <a href="/Kepegawaian/login" class="px-3 py-2 text-sm text-slate-600 hover:text-slate-800">Login</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex">
            <!-- Sidebar -->
            <aside x-show="sidebarOpen" @click.outside="sidebarOpen = false" class="fixed inset-y-0 left-0 z-40 w-64 bg-white border-r shadow-md lg:static lg:translate-x-0 lg:inset-0 lg:block" x-cloak>
                <div class="h-full flex flex-col py-6">
                    <nav class="px-4 space-y-2">
                        <a href="/Kepegawaian/dashboard" class="flex items-center px-3 py-2 rounded-md hover:bg-slate-50">
                            <span class="text-slate-700">Dashboard</span>
                        </a>
                        <a href="/Kepegawaian/karyawan" class="flex items-center px-3 py-2 rounded-md hover:bg-slate-50">
                            <span class="text-slate-700">Karyawan</span>
                        </a>
                        <a href="/Kepegawaian/department" class="flex items-center px-3 py-2 rounded-md hover:bg-slate-50">
                            <span class="text-slate-700">Departemen</span>
                        </a>
                        <a href="/Kepegawaian/pengajuancuti" class="flex items-center px-3 py-2 rounded-md hover:bg-slate-50">
                            <span class="text-slate-700">Pengajuan Cuti</span>
                        </a>
                        <a href="/Kepegawaian/slipgaji" class="flex items-center px-3 py-2 rounded-md hover:bg-slate-50">
                            <span class="text-slate-700">Slip Gaji</span>
                        </a>
                    </nav>
                </div>
            </aside>

            <!-- Content area -->
            <main class="flex-1 p-6 lg:pl-72">
                <div class="max-w-7xl mx-auto">
                    <?php if (isset($error)): ?>
                        <div class="mb-4 rounded-md bg-rose-50 border border-rose-100 p-3 text-rose-700"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>
                    <?php if (isset($success)): ?>
                        <div class="mb-4 rounded-md bg-emerald-50 border border-emerald-100 p-3 text-emerald-700"><?= htmlspecialchars($success) ?></div>
                    <?php endif; ?>

                    <div class="min-h-screen-offset">
                        <?= $content ?? '' ?>
                    </div>
                </div>
            </main>
        </div>

        <script src="/Kepegawaian/public/js/script.js"></script>
</body>
</html>

