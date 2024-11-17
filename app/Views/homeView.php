<?= $this->extend('layout'); ?>

<?= $this->section('maincontent'); ?>

<div class="flex h-full space-x-2">
    <div class="max-h-screen w-48 rounded-lg flex flex-col items-center pt-4 overflow-auto space-y-2 bg-gray-200">
                    <div class="py-1 w-4/5 border border-gray-800 rounded-lg text-center font-semibold text-base hover:bg-gray-800 hover:text-white hover:scale-105">New Entry +</div>
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
                                    <th class="border border-gray-300">ApplicationServer</th>
                                    <th class="border border-gray-300">ApplicationServerVersion</th>
                                    <th class="border border-gray-300">WebserverVersion</th>
                                    <!-- <th class="border border-gray-300">AppDependency</th> -->
                                    <!-- <th class="border border-gray-300">AdditionalDetails</th> -->
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
            <td class="border border-gray-300"><?= $service['ApplicationServer'] ?></td>
            <td class="border border-gray-300"><?= $service['ApplicationServerVersion'] ?></td>
            <td class="border border-gray-300"><?= $service['WebserverVersion'] ?></td>
            <td class="border border-gray-300"><?= $service['LastUpdatedDate'] ?></td>
            <td class="border border-gray-300 hover:bg-gray-400">
                <i class="material-icons cursor-pointer" data-toggle="row-<?= $index ?>">more_vert</i>
            </td>
        </tr>
        <tr id="toggle-row-<?= $index ?>" class="toggle-row" style="display: none;">
            <td colspan="8">
                <div class="h-6 w-full bg-red-600"></div>
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
        // Initialize the rows
        $('.material-icons').click(function() {
            var index = $(this).data('toggle');
            var toggleRow = $('#toggle-row-' + index);

            // Toggle the visibility of the row
            toggleRow.toggle();
        });
    });
</script>
                
<?= $this->endSection(); ?>
