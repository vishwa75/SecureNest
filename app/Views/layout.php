<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Secure Nest'; ?></title>
    <link rel="stylesheet" href="<?=base_url()?>css/output.css?v=1.0">
    <script src="<?=base_url()?>js/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        body {
            overflow: hidden;
            height: 100vh;
            display: flex;
        }

        #content {
            transition: margin-left 0.5s;
            height: calc(100vh - 3.5rem);
        }

        [x-data] > #sidebar {
            transition: width 0.5s;
        }
    </style>
</head>
<body>
    <section class="flex h-full w-full" x-data="{ sideBarState: true }">
        <!-- Sidebar -->
        <div id="sidebar" class="max-h-screen relative bg-gray-800 p-4 pt-3 duration-500 transition-all" 
             :class="sideBarState ? 'w-56' : 'w-20'">
            <!-- Sidebar content -->
            <?= $this->include('sidebar'); ?>
        </div>
        
        <!-- Content Wrapper -->
        <div id="content" class="flex-grow transition-all duration-500">
            <!-- Top Navigation Bar -->
            <?= $this->include('navbar'); ?>
            
            <!-- Main Content -->
            <div class="p-2 h-full bg-gray-50">
                <?= $this->renderSection('maincontent'); ?>
            </div>
        </div>
    </section>
</body>
</html>
