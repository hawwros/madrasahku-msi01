<?php
$today = new DateTimeImmutable();
$currentMonth = isset($selectedMonth) ? (int) $selectedMonth - 1 : (int) $today->format('n') - 1;
$currentYear = isset($selectedYear) ? (int) $selectedYear : (int) $today->format('Y');

if ($currentMonth < 0) {
    $currentMonth = 0;
}
if ($currentMonth > 11) {
    $currentMonth = 11;
}

$monthNames = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',
];
$monthName = isset($monthNames[$currentMonth]) ? (string) $monthNames[$currentMonth] : '';

$dayNames = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
$monthStart = new DateTimeImmutable(sprintf('%04d-%02d-01', $currentYear, $currentMonth + 1));
$firstDayOfWeek = ((int) $monthStart->format('N')) - 1;
$daysInMonth = (int) $monthStart->format('t');
$emptyDays = array_fill(0, $firstDayOfWeek, null);
$days = range(1, $daysInMonth);

$eventsByDate = [];
foreach ($events ?? [] as $event) {
    $start = $event['start_date'] ?? '';
    if (empty($start)) {
        continue;
    }
    try {
        $date = new DateTimeImmutable($start);
    } catch (Exception $e) {
        continue;
    }

    if ((int) $date->format('Y') === $currentYear && (int) $date->format('n') === $currentMonth + 1) {
        $day = (int) $date->format('j');
        $eventsByDate[$day][] = $event;
    }
}

$monthPrev = $monthStart->modify('-1 month');
$monthNext = $monthStart->modify('+1 month');
$prevLink = base_url('akademik') . '?month=' . $monthPrev->format('n') . '&year=' . $monthPrev->format('Y');
$nextLink = base_url('akademik') . '?month=' . $monthNext->format('n') . '&year=' . $monthNext->format('Y');

function kategoriClasses($type)
{
    $map = [
        'libur' => 'bg-red-100 text-red-700 border-red-300',
        'ujian' => 'bg-orange-100 text-orange-700 border-orange-300',
        'kegiatan' => 'bg-blue-100 text-blue-700 border-blue-300',
        'penting' => 'bg-emerald-100 text-emerald-700 border-emerald-300',
    ];

    return $map[strtolower($type)] ?? 'bg-gray-100 text-gray-700 border-gray-300';
}
?>

<div>
    <section class="py-8 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Informasi Akademik</h1>
                <p class="text-gray-600">Informasi lengkap mengenai kegiatan belajar mengajar, kalender akademik, dan program-program unggulan Madrasahku.</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                            <span class="size-6 text-emerald-600" style="display:inline-flex;align-items:center;justify-content:center;">📅</span>
                            Kalender Akademik
                        </h3>
                        <div class="flex items-center gap-2">
                            <a href="<?= esc($prevLink) ?>" class="p-2 hover:bg-gray-100 rounded-lg transition-colors" aria-label="Bulan sebelumnya">◀</a>
                            <div class="px-4 py-2 bg-emerald-50 rounded-lg min-w-[180px] text-center">
                                <span class="font-semibold text-emerald-900"><?= esc($monthName) ?> <?= esc((string) $currentYear) ?></span>
                            </div>
                            <a href="<?= esc($nextLink) ?>" class="p-2 hover:bg-gray-100 rounded-lg transition-colors" aria-label="Bulan berikutnya">▶</a>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="grid grid-cols-7 gap-2 mb-2">
                            <?php foreach ($dayNames as $hari): ?>
                                <div class="text-center font-semibold text-gray-700 text-sm py-2"><?= esc($hari) ?></div>
                            <?php endforeach; ?>
                        </div>

                        <div class="grid grid-cols-7 gap-2">
                            <?php foreach ($emptyDays as $empty): ?>
                                <div class="aspect-square"></div>
                            <?php endforeach; ?>

                            <?php foreach ($days as $day):
                                $dayEvents = $eventsByDate[$day] ?? [];
                                $hasEvent = count($dayEvents) > 0;
                                $isToday = $day === (int) $today->format('j') && $currentMonth === (int) $today->format('n') - 1 && $currentYear === (int) $today->format('Y');
                            ?>
                                <div class="aspect-square border rounded-lg p-2 relative <?= $isToday ? 'border-emerald-500 bg-emerald-50' : ($hasEvent ? 'border-gray-300 bg-gray-50' : 'border-gray-200') ?>">
                                    <div class="text-sm font-medium mb-1 <?= $isToday ? 'text-emerald-700' : ($hasEvent ? 'text-gray-900' : 'text-gray-600') ?>"><?= esc($day) ?></div>
                                    <?php if ($hasEvent): ?>
                                        <div class="space-y-0.5">
                                            <?php foreach (array_slice($dayEvents, 0, 2) as $event): ?>
                                                <?php $dotClass = strtolower($event['type']) === 'libur' ? 'bg-red-500' : (strtolower($event['type']) === 'ujian' ? 'bg-orange-500' : (strtolower($event['type']) === 'kegiatan' ? 'bg-blue-500' : 'bg-emerald-500')); ?>
                                                <div class="h-1 rounded-full <?= $dotClass ?>"></div>
                                            <?php endforeach; ?>
                                            <?php if (count($dayEvents) > 2): ?>
                                                <div class="text-[10px] text-gray-500 text-center">+<?= count($dayEvents) - 2 ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="border-t pt-4">
                        <p class="text-sm font-semibold text-gray-700 mb-3">Keterangan:</p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                                <span class="text-sm text-gray-600">Penting</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-orange-500"></div>
                                <span class="text-sm text-gray-600">Ujian</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                                <span class="text-sm text-gray-600">Kegiatan</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <span class="text-sm text-gray-600">Libur</span>
                            </div>
                        </div>
                    </div>

                    <?php $monthlyEvents = array_values($eventsByDate); ?>
                    <?php if (!empty($eventsByDate)): ?>
                        <div class="border-t mt-4 pt-4">
                            <p class="text-sm font-semibold text-gray-700 mb-3">Kegiatan di <?= esc($monthName) ?> <?= esc((string) $currentYear) ?>:</p>
                            <div class="space-y-2 max-h-64 overflow-y-auto">
                                <?php
                                $flatEvents = [];
                                foreach ($eventsByDate as $day => $items) {
                                    foreach ($items as $item) {
                                        $item['day'] = $day;
                                        $flatEvents[] = $item;
                                    }
                                }
                                usort($flatEvents, function ($a, $b) {
                                    $aDate = strtotime((string) ($a['start_date'] ?? ''));
                                    $bDate = strtotime((string) ($b['start_date'] ?? ''));
                                    if ($aDate === false) {
                                        $aDate = 0;
                                    }
                                    if ($bDate === false) {
                                        $bDate = 0;
                                    }
                                    return $aDate <=> $bDate;
                                });
                                foreach ($flatEvents as $event):
                                    $eventTitle = isset($event['title']) ? (string) $event['title'] : '';
                                    $eventType = isset($event['type']) ? (string) $event['type'] : '';
                                    $eventDate = isset($event['start_date']) ? (string) $event['start_date'] : '';
                                    $eventDay = strtotime($eventDate);
                                    $eventDay = $eventDay !== false ? (string) date('j', $eventDay) : '';
                                    $classes = kategoriClasses($eventType);
                                ?>
                                    <div class="flex items-start gap-3 p-3 rounded-lg border <?= $classes ?>">
                                        <div class="font-semibold text-sm min-w-[30px]"><?= esc($eventDay) ?></div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium"><?= esc($eventTitle) ?></p>
                                            <p class="text-xs text-gray-500"><?= esc($eventType) ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-2xl shadow">
                        <h3 class="font-semibold mb-4">Kegiatan Belajar Mengajar</h3>
                        <?php foreach ($jadwal ?? [] as $hari => $items): ?>
                            <div class="mb-4">
                                <div class="font-medium text-emerald-600"><?= esc($hari) ?></div>
                                <?php foreach ($items as $it): ?>
                                    <div class="mt-2 text-sm text-gray-700"><?= esc($it['waktu'] ?? '') ?> — <?= esc($it['keterangan'] ?? '') ?></div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow">
                        <h3 class="font-semibold mb-4">Program Unggulan</h3>
                        <?php foreach ($program ?? [] as $p): ?>
                            <div class="border rounded-lg p-3 mb-3">
                                <div class="font-medium"><?= esc($p['title'] ?? '') ?> <?php if (!empty($p['status'])): ?><span class="text-xs text-emerald-500"><?= esc($p['status']) ?></span><?php endif; ?></div>
                                <div class="text-sm text-gray-600"><?= esc($p['excerpt'] ?? '') ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow">
                        <h3 class="font-semibold mb-4">Statistik</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <?php foreach ($stats ?? [] as $stat): ?>
                                <div class="p-4 bg-emerald-50 rounded">
                                    <div class="text-2xl font-bold"><?= esc($stat['angka'] ?? $stat['value'] ?? '0') ?></div>
                                    <div class="text-sm text-gray-600"><?= esc($stat['label'] ?? $stat['name'] ?? '') ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
