<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Secure Nest'; ?></title>
    <link rel="stylesheet" href="<?=base_url()?>css/output.css?v=1.0">
    <script src="<?=base_url()?>js/jquery-3.6.0.min.js"></script>
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

        #sidebar {
            transition: width 0.5s;
        }
    </style>
</head>
<body>
    <section class="flex h-full w-full">
        <!-- Sidebar -->
        <div id="sidebar" class="max-h-screen relative bg-gray-800 p-4 pt-3 duration-500 transition-all w-56">
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

    <script>
        $(document).ready(function () {
            let sideBarState = true; // Initialize sidebar state

            // Toggle sidebar state and width
            $("#openCloseArrow").on("click", function () {
                sideBarState = !sideBarState; // Toggle state
                
                // Update sidebar width
                if (sideBarState) {
                    $('#sidebar').removeClass("w-20").addClass("w-56");
                } else {
                    $('#sidebar').removeClass("w-56").addClass("w-20");
                }

                // Update content margin if needed (add if more layout adjustments are required)
            });
        });
    </script>
</body>
</html>
