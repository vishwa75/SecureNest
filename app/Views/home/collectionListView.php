<div id='collectionListContainer' class="max-h-screen w-48 rounded-lg flex flex-col items-center pt-4 overflow-auto space-y-2 bg-gray-200">
                        <div id="addCollection" class="py-1 w-4/5 border border-gray-800 rounded-lg text-center font-semibold text-base hover:bg-gray-800 hover:text-white cursor-pointer">Add Collection</div>
                        <?php foreach ($collectionTable as $collection): ?>
                            <div data-clientid="<?= $collection['ClientID'] ?>" id="<?= $collection['CollectionName'] ?>" class="getDataForCollection py-1 w-4/5 border border-gray-800 rounded-lg text-center font-semibold text-base hover:bg-gray-800 hover:text-white cursor-pointer"><?= $collection['CollectionName'] ?></div> 
                        <?php endforeach; ?>
                    </div>


