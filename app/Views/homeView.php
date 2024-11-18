    <?= $this->extend('layout'); ?>

    <?= $this->section('maincontent'); ?>

    <div id="overlay" class="fixed z-20 w-full h-full top-0 right-0 left-0 bottom-0 bg-gray-300 opacity-50" :class="addCollection ? 'block' : 'hidden'">

    </div>

    <div x-data="{ addCollection: true }" class="flex h-full space-x-2">
                    <div class="max-h-screen w-48 rounded-lg flex flex-col items-center pt-4 overflow-auto space-y-2 bg-gray-200">
                        <div   @click="addCollection = !addCollection"  id="addCollection" class="py-1 w-4/5 border border-gray-800 rounded-lg text-center font-semibold text-base hover:bg-gray-800 hover:text-white hover:scale-105">New Entry +</div>
                    </div>

                    <div class="w-full h-full overflow-auto p-1 space-y-4">
                        <div>
                            <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
                                <div class="ml-3">Name</div>
                                <div class="mr-3">Add +</div>
                            </div>
                            <table class="table-auto w-full text-left border-collapse border border-gray-300 overflow-x-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-center font-light text-sm">
                                        <th class="border border-gray-300">Environment</th>
                                        <th class="border border-gray-300">IP</th>
                                        <th class="border border-gray-300">UserName</th>
                                        <th class="border border-gray-300">Password</th>
                                        <th class="border border-gray-300">Memory</th>
                                        <th class="border border-gray-300">Disk Space</th>
                                        <th class="border border-gray-300">OSVersion</th>
                                        <th class="border border-gray-300">AdditionalDetails</th>
                                        <th class="border border-gray-300">LastUpdatedDate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($serverDetails as $server): ?>
                                    <tr class="text-center text-sm font-normal hover:bg-gray-100">
                                        <td class="border border-gray-300"><?= $server['Environment'] ?></td>
                                        <td class="border border-gray-300"><?= $server['IP'] ?></td>
                                        <td class="border border-gray-300"><?= $server['UserName'] ?></td>
                                        <td class="border border-gray-300"><?= $server['Password'] ?></td>
                                        <td class="border border-gray-300"><?= $server['Memory'] ?></td>
                                        <td class="border border-gray-300"><?= $server['DiskSpace'] ?></td>
                                        <td class="border border-gray-300"><?= $server['OSVersion'] ?></td>
                                        <td class="border border-gray-300"><?= $server['AdditionalDetails'] ?></td>
                                        <td class="border border-gray-300"><?= $server['LastUpdatedDate'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                        
                        <div>
                            <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
                                <div class="ml-3">Name</div>
                                <div class="mr-3">Add +</div>
                            </div>
                            <table class="table-auto w-full text-left border-collapse border border-gray-300 overflow-x-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-center font-light text-sm">
                                        <th class="border border-gray-300">AppName</th>
                                        <th class="border border-gray-300">AppVersion</th>
                                        <th class="border border-gray-300">AppType</th>
                                        <th class="border border-gray-300">AppWebServer</th>
                                        <th class="border border-gray-300">AppWebServerVersion</th>
                                        <th class="border border-gray-300">LastUpdatedDate</th>
                                        <th class="border border-gray-300">More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($serviceDetails as $index => $service): ?>
                                    <tr class="text-center text-sm font-normal hover:bg-gray-100" id="row-<?= $index ?>" data-index="<?= $index ?>">
                                        <td class="border border-gray-300"><?= $service['AppName'] ?></td>
                                        <td class="border border-gray-300"><?= $service['AppVersion'] ?></td>
                                        <td class="border border-gray-300"><?= $service['AppType'] ?></td>
                                        <td class="border border-gray-300"><?= $service['AppWebServer'] ?></td>
                                        <td class="border border-gray-300"><?= $service['AppWebServerVersion'] ?></td>
                                        <td class="border border-gray-300"><?= $service['LastUpdatedDate'] ?></td>
                                        <td class="border border-gray-300 hover:bg-gray-400">
                                            <i class="material-icons cursor-pointer moreClick mx-1" data-toggle="toggle-row-<?= $index ?>">read_more</i>
                                        </td>
                                    </tr>
                                    <tr id="toggle-row-<?= $index ?>" class="toggle-row" style="display: none;">
                                        <td colspan="8">
                                            <div class="w-full bg-gray-200 grid grid-cols-2 border-2">
                                                <div class="flex space-x-10 my-4 pl-4">
                                                    <div class="font-semibold">AppWebServerPath</div>
                                                    <div>:</div>
                                                    <div><?= $service['AppWebServerPath'] ?></div>
                                                </div>
                                                <div class="flex space-x-10 my-4 pl-4">
                                                    <div class="font-semibold">StartUp</div>
                                                    <div>:</div>
                                                    <div><?= $service['StartUp'] ?></div>
                                                </div>
                                                <div class="flex space-x-10 my-4 pl-4">
                                                    <div class="font-semibold">ShutDown</div>
                                                    <div>:</div>
                                                    <div><?= $service['ShutDown'] ?></div>
                                                </div>
                                                <div class="flex space-x-10 my-4 pl-4">
                                                    <div class="font-semibold">AppDependency</div>
                                                    <div>:</div>
                                                    <div><?= $service['AppDependency'] ?></div>
                                                </div>
                                                <div class="flex space-x-10 my-4 pl-4">
                                                    <div class="font-semibold">AdditionalDetails</div>
                                                    <div>:</div>
                                                    <div><?= $service['AdditionalDetails'] ?></div>
                                                </div>
                                                <div class="flex space-x-10 my-4 pl-4">
                                                    <div class="font-semibold">CreateDate</div>
                                                    <div>:</div>
                                                    <div><?= $service['CreateDate'] ?></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>   

                                </tbody>
                            </table>
                        </div>

                        <div>
                            <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
                                <div class="ml-3">Name</div>
                                <div class="mr-3">Add +</div>
                            </div>
                            <table class="table-auto w-full text-left border-collapse border border-gray-300 overflow-x-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-center font-light text-sm">
                                        <th class="border border-gray-300">ConnectionType</th>
                                        <th class="border border-gray-300">RDPType</th>
                                        <th class="border border-gray-300">RDPIP</th>
                                        <th class="border border-gray-300">ConnectionLink</th>
                                        <th class="border border-gray-300">SPOC</th>
                                        <th class="border border-gray-300">AdditionalDetails</th>
                                        <th class="border border-gray-300">LastUpdatedDate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($connectivityDetails as $connectivity): ?>
                                    <tr class="text-center text-sm font-normal hover:bg-gray-100">
                                        <td class="border border-gray-300"><?= $connectivity['ConnectionType'] ?></td>
                                        <td class="border border-gray-300"><?= $connectivity['RDPType'] ?></td>
                                        <td class="border border-gray-300"><?= $connectivity['RDPIP'] ?></td>
                                        <td class="border border-gray-300"><?= $connectivity['ConnectionLink'] ?></td>
                                        <td class="border border-gray-300"><?= $connectivity['SPOC'] ?></td>
                                        <td class="border border-gray-300"><?= $connectivity['AdditionalDetails'] ?></td>
                                        <td class="border border-gray-300"><?= $connectivity['LastUpdatedDate'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
    </div>



    <script>
        
        $(document).ready(function() {
        // Event delegation for dynamically added elements
        $(document).on('click', '.moreClick', function() {
            var toggleRowId = $(this).data('toggle'); // Get the row ID
            console.log('toggleRowId ---> '+ toggleRowId);
            var toggleRow = $('#' + toggleRowId); // Select the row by ID
            
            // Toggle the visibility of the row
            toggleRow.toggle();
            $(this).toggleClass('text-green-500');
        });

    });

    </script>
                    
    <?= $this->endSection(); ?>
