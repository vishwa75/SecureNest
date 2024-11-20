<div id="tableContentview" class="w-full h-full overflow-auto p-1 space-y-4">
                        <div>
                            <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
                                <div class="ml-3">Server</div>
                                <div class="mr-3">Add +</div>
                            </div>
                            <table class="table-auto w-full text-left border-collapse border border-gray-300 overflow-x-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-center font-light text-sm">
                                        <?php foreach ($serverDetailsTableHeader as $index => $header): ?>
                                            <th class="border border-gray-300"><?= $header ?></th>
                                        <?php endforeach; ?> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($serverDetailsTableHeaderData as  $index => $data): ?>
                                        <tr class="text-center text-sm font-normal hover:bg-gray-100">
                                            <?php foreach ($serverDetailsTableHeader as $headerdata): ?>
                                                <td class="border border-gray-300"><?= $data[$headerdata] ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                        
                        <div>
                            <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
                                <div class="ml-3">Service</div>
                                <div class="mr-3">Add +</div>
                            </div>
                            <table class="table-auto w-full text-left border-collapse border border-gray-300 overflow-x-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-center font-light text-sm">
                                        <?php foreach ($serviceDetailsTableHeader as $index => $header): ?>
                                            <th class="border border-gray-300"><?= $header ?></th>
                                        <?php endforeach; ?> 
                                        <th class="border border-gray-300">More</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($serviceDetailsTableHeaderData as $index => $servicedata): ?>
                                    <tr class="text-center text-sm font-normal hover:bg-gray-100" id="row-<?= $index ?>" data-index="<?= $index ?>">
                                        <?php foreach ($serviceDetailsTableHeader as $header): ?>
                                            <td class="border border-gray-300"><?= $servicedata[$header] ?></td>
                                        <?php endforeach; ?> 
                                        <td class="border border-gray-300 hover:bg-gray-400">
                                            <i class="material-icons cursor-pointer moreClick mx-1" data-toggle="toggle-row-<?= $index ?>">read_more</i>
                                        </td>
                                    </tr>
                                    <tr id="toggle-row-<?= $index ?>" class="toggle-row" style="display: none;">
                                        <td colspan="8">
                                            <div class="w-full bg-gray-200 grid grid-cols-2 border-2">
                                                <?php foreach ($serviceDetailsTableMore as  $header): ?>
                                                    <div class="grid grid-cols-3 items-center justify-center">
                                                        <div class="font-semibold text-start"><?= $header ?></div>
                                                        <div class="text-center">:</div>
                                                        <div class="text-start"><?= $serviceDetailsTableMoreData[$index][$header] ?></div>
                                                    </div>
                                                <?php endforeach; ?>    
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>   
                                </tbody>
                            </table>
                        </div>

                        <div>
                            <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
                                <div class="ml-3">Connectivity</div>
                                <div class="mr-3">Add +</div>
                            </div>
                            <table class="table-auto w-full text-left border-collapse border border-gray-300 overflow-x-auto">
                            <thead>
                                    <tr class="bg-gray-200 text-center font-light text-sm">
                                        <?php foreach ($connectivityDetailsHeader as $index => $header): ?>
                                            <th class="border border-gray-300"><?= $header ?></th>
                                        <?php endforeach; ?> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($connectivityDetailsHeaderData as  $index => $data): ?>
                                        <tr class="text-center text-sm font-normal hover:bg-gray-100">
                                            <?php foreach ($connectivityDetailsHeader as $headerdata): ?>
                                                <td class="border border-gray-300"><?= $data[$headerdata] ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>