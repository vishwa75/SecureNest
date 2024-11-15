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
                        <table class="table-auto w-full text-left border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200 text-center">
                                    <th class="border border-gray-300">ClientID</th>
                                    <th class="border border-gray-300">Environment</th>
                                    <th class="border border-gray-300">IP</th>
                                    <th class="border border-gray-300">UserName</th>
                                    <th class="border border-gray-300">Password</th>
                                    <th class="border border-gray-300">Memory</th>
                                    <th class="border border-gray-300">Disk Space</th>
                                    <th class="border border-gray-300">OSVersion</th>
                                    <th class="border border-gray-300">AdditionalDetails</th>
                                    <th class="border border-gray-300">LastUpdatedDate</th>
                                    <th class="border border-gray-300">IsActive</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($serverDetails as $server): ?>
                                <tr class="text-center">
                                    <td class="border border-gray-300"><?= $server['ClientID'] ?></td>
                                    <td class="border border-gray-300"><?= $server['Environment'] ?></td>
                                    <td class="border border-gray-300"><?= $server['IP'] ?></td>
                                    <td class="border border-gray-300"><?= $server['UserName'] ?></td>
                                    <td class="border border-gray-300"><?= $server['Password'] ?></td>
                                    <td class="border border-gray-300"><?= $server['Memory'] ?></td>
                                    <td class="border border-gray-300"><?= $server['DiskSpace'] ?></td>
                                    <td class="border border-gray-300"><?= $server['OSVersion'] ?></td>
                                    <td class="border border-gray-300"><?= $server['AdditionalDetails'] ?></td>
                                    <td class="border border-gray-300"><?= $server['LastUpdatedDate'] ?></td>
                                    <td class="border border-gray-300"><?= $server['IsActive'] ?></td>
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
                        <table class="table-auto w-full text-left border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200 text-center">
                                    <th class="border border-gray-300">ID</th>
                                    <th class="border border-gray-300">Name</th>
                                    <th class="border border-gray-300">Email</th>
                                    <th class="border border-gray-300">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td class="border border-gray-300">1</td>
                                    <td class="border border-gray-300">Alice Smith</td>
                                    <td class="border border-gray-300">alice@example.com</td>
                                    <td class="border border-gray-300">123-456-7890</td>
                                </tr>
                                
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
                            <div class="ml-3">Name</div>
                            <div class="mr-3">Add +</div>
                        </div>
                        <table class="table-auto w-full text-left border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200 text-center">
                                    <th class="border border-gray-300">ID</th>
                                    <th class="border border-gray-300">Name</th>
                                    <th class="border border-gray-300">Email</th>
                                    <th class="border border-gray-300">Phone</th>
                                    <th class="border border-gray-300">Phone1</th>
                                    <th class="border border-gray-300">Phone2</th>
                                    <th class="border border-gray-300">Phone3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td class="border border-gray-300">1</td>
                                    <td class="border border-gray-300">Alice Smith</td>
                                    <td class="border border-gray-300">alice@example.com</td>
                                    <td class="border border-gray-300">123-456-7890</td>
                                    <td class="border border-gray-300">123-456-7890</td>
                                    <td class="border border-gray-300">123-456-7890</td>
                                    <td class="border border-gray-300">123-456-7890</td>
                                </tr>
                                
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
</div>
                
<?= $this->endSection(); ?>
