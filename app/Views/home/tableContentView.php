<div id="tableContentview" class="w-full h-full overflow-auto p-1 space-y-4">
    <!-- Server Section -->
    <div>
        <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
            <div class="ml-3">Server</div>
            <div class="mr-3">Add +</div>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-gray-200 sticky top-0 z-10">
                    <tr class="text-center font-medium text-sm">
                        <?php foreach ($serverDetailsTableHeader as $header): ?>
                            <th class="border-b border-gray-300"><?= htmlspecialchars($header) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($serverDetailsTableHeaderData as $data): ?>
                        <tr class="bg-white text-center text-sm">
                            <?php foreach ($serverDetailsTableHeader as $header): ?>
                                <td class="border-b border-gray-300">
                                    <input 
                                        type="text" 
                                        name="<?= htmlspecialchars($header) ?>[]" 
                                        value="<?= htmlspecialchars($data[$header]) ?>" 
                                        class="w-full text-sm text-center"
                                    >
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Service Section -->
    <div>
        <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
            <div class="ml-3">Service</div>
            <div class="mr-3">Add +</div>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-gray-200 sticky top-0 z-10">
                    <tr class="text-center font-medium text-sm">
                        <?php foreach ($serviceDetailsTableHeader as $header): ?>
                            <th class="border-b border-gray-300"><?= htmlspecialchars($header) ?></th>
                        <?php endforeach; ?>
                        <th class="border-b border-gray-300">More</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($serviceDetailsTableHeaderData as $index => $data): ?>
                        <tr class="bg-white text-center text-sm">
                            <?php foreach ($serviceDetailsTableHeader as $header): ?>
                                <td class="border-b border-gray-300">
                                    <input 
                                        type="text" 
                                        name="<?= htmlspecialchars($header) ?>[]" 
                                        value="<?= htmlspecialchars($data[$header]) ?>" 
                                        class="w-full text-sm text-center"
                                    >
                                </td>
                            <?php endforeach; ?>
                            <td class="border-b border-gray-300 hover:bg-gray-400">
                                <i class="material-icons cursor-pointer moreClick mx-1" data-toggle="toggle-row-<?= $index ?>">read_more</i>
                            </td>
                        </tr>
                        <tr id="toggle-row-<?= $index ?>" class="toggle-row bg-white" style="display: none;">
                            <td colspan="<?= count($serviceDetailsTableHeader) + 1 ?>">
                                <div class="w-full bg-gray-200 grid grid-cols-2 border-2">
                                    <?php foreach ($serviceDetailsTableMore as $header): ?>
                                        <div class="grid grid-cols-3 items-center justify-center">
                                            <div class="font-semibold text-start"><?= htmlspecialchars($header) ?></div>
                                            <div class="text-center">:</div>
                                            <div class="text-start">
                                                <input 
                                                    type="text" 
                                                    name="<?= htmlspecialchars($header) ?>[]" 
                                                    value="<?= htmlspecialchars($serviceDetailsTableMoreData[$index][$header]) ?>" 
                                                    class="w-full text-sm text-left border border-gray-300 rounded-md p-2"
                                                >
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Connectivity Section -->
    <div>
        <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
            <div class="ml-3">Connectivity</div>
            <div class="mr-3">Add +</div>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-gray-200 sticky top-0 z-10">
                    <tr class="text-center font-medium text-sm">
                        <?php foreach ($connectivityDetailsHeader as $header): ?>
                            <th class="border-b border-gray-300"><?= htmlspecialchars($header) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($connectivityDetailsHeaderData as $data): ?>
                        <tr class="bg-white text-center text-sm">
                            <?php foreach ($connectivityDetailsHeader as $header): ?>
                                <td class="border-b border-gray-300">
                                    <input 
                                        type="text" 
                                        name="<?= htmlspecialchars($header) ?>[]" 
                                        value="<?= htmlspecialchars($data[$header]) ?>" 
                                        class="w-full text-sm text-center"
                                    >
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
