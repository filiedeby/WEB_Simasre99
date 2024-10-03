<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Info</title>
    <!-- Load Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-header {
            font-weight: bold;
        }
        pre {
            background: #f8f9fa;
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Server Info</h1><span> <a href="<?= base_url('admin/beranda'); ?>" >Back To Admin </a></span>
		
		
        <?php 
		
		// echo json_encode($server_info);
		
		if ($server_info): ?>
            <div class="card mt-3">
                <div class="card-header">General Information</div>
                <div class="card-body">
                    <p><strong>Operating System:</strong> <?php echo $server_info['Vitals']['@attributes']['Distro']; ?></p>
                    <p><strong>Kernel Version:</strong> <?php echo $server_info['Vitals']['@attributes']['Kernel']; ?></p>
                    <p><strong>Hostname:</strong> <?php echo $server_info['Vitals']['@attributes']['Hostname']; ?></p>
                    <p><strong>IP Address:</strong> <?php echo $server_info['Vitals']['@attributes']['IPAddr']; ?></p>
                    <p><strong>HW Uptime:</strong> <?php echo $server_info['Vitals']['@attributes']['Uptime']; ?></p>
                    <p><strong>User Login:</strong> <?php echo $server_info['Vitals']['@attributes']['Users']; ?></p>
                    <p><strong>CPU LOAD System:</strong> <?php echo $server_info['Vitals']['@attributes']['LoadAvg']; ?> / 100%</p>
                </div>
            </div>
            
            <div class="card mt-3">
                <div class="card-header">CPU Information</div>
                <div class="card-body">
                    <pre><?php echo print_r($server_info['Hardware']['CPU'], true); ?></pre>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Memory / RAM</div>
                <div class="card-body">
                    <pre><?php echo print_r($server_info['Memory'], true); ?></pre>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Disk Information</div>
                <div class="card-body">
                    <pre><?php echo print_r($server_info['FileSystem']['Mount']['@attributes'], true); ?></pre>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Network Interfaces</div>
                <div class="card-body">
                    <pre><?php echo print_r($server_info['Network']['NetDevice'], true); ?></pre>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger mt-3">Tidak dapat mengambil informasi server.</div>
        <?php endif; ?>
    </div>

    <!-- Load Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
