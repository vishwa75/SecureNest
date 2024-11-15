<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

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
                                    <th class="border border-gray-300">ID</th>
                                    <th class="border border-gray-300">Environment</th>
                                    <th class="border border-gray-300">IP</th>
                                    <th class="border border-gray-300">UserName</th>
                                    <th class="border border-gray-300">Password</th>
                                    <th class="border border-gray-300">Memory</th>
                                    <th class="border border-gray-300">Disk Space</th>
                                    <th class="border border-gray-300">OSVersion</th>
                                    <th class="border border-gray-300">AdditionalDetails</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td class="border border-gray-300">1</td>
                                    <td class="border border-gray-300">Production</td>
                                    <td class="border border-gray-300">192.168.1.10</td>
                                    <td class="border border-gray-300">admin</td>
                                    <td class="border border-gray-300">pass1234</td>
                                    <td class="border border-gray-300">16GB</td>
                                    <td class="border border-gray-300">500GB</td>
                                    <td class="border border-gray-300">Ubuntu 20.04</td>
                                    <td class="border border-gray-300">Primary application server</td>
                                </tr>
                                <tr class="text-center">
                                    <td class="border border-gray-300">2</td>
                                    <td class="border border-gray-300">Development</td>
                                    <td class="border border-gray-300">192.168.1.11</td>
                                    <td class="border border-gray-300">devuser</td>
                                    <td class="border border-gray-300">devpass567</td>
                                    <td class="border border-gray-300">8GB</td>
                                    <td class="border border-gray-300">250GB</td>
                                    <td class="border border-gray-300">Windows Server 2019</td>
                                    <td class="border border-gray-300">Testing environment for new features</td>
                                </tr>
                                <tr class="text-center">
                                    <td class="border border-gray-300">3</td>
                                    <td class="border border-gray-300">Staging</td>
                                    <td class="border border-gray-300">192.168.1.12</td>
                                    <td class="border border-gray-300">stguser</td>
                                    <td class="border border-gray-300">stgpass789</td>
                                    <td class="border border-gray-300">16GB</td>
                                    <td class="border border-gray-300">1TB</td>
                                    <td class="border border-gray-300">CentOS 8</td>
                                    <td class="border border-gray-300">Pre-production testing server</td>
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
