<?php

namespace Odan\Util;

/**
 * System infos for Linux (Ubuntu) and Windows.
 *
 * - Total RAM
 * - Free RAM
 * - Disk size
 * - CPU load in %
 */
class SystemInfo
{

    /**
     * Return RAM Total in Bytes.
     *
     * @return int Bytes
     */
    public function getRamTotal()
    {
        $result = 0;
        if (PHP_OS == 'WINNT') {
            $lines = null;
            $matches = null;
            exec('wmic ComputerSystem get TotalPhysicalMemory /Value', $lines);
            if (preg_match('/^TotalPhysicalMemory\=(\d+)$/', $lines[2], $matches)) {
                $result = $matches[1];
            }
        } else {
            $fh = fopen('/proc/meminfo', 'r');
            while ($line = fgets($fh)) {
                $pieces = array();
                if (preg_match('/^MemTotal:\s+(\d+)\skB$/', $line, $pieces)) {
                    $result = $pieces[1];
                    // KB to Bytes
                    $result = $result * 1024;
                    break;
                }
            }
            fclose($fh);
        }
        // KB RAM Total
        return (int) $result;
    }

    /**
     * Return free RAM in Bytes.
     *
     * @return int Bytes
     */
    public function getRamFree()
    {
        $result = 0;
        if (PHP_OS == 'WINNT') {
            $lines = null;
            $matches = null;
            exec('wmic OS get FreePhysicalMemory /Value', $lines);
            if (preg_match('/^FreePhysicalMemory\=(\d+)$/', $lines[2], $matches)) {
                $result = $matches[1] * 1024;
            }
        } else {
            $fh = fopen('/proc/meminfo', 'r');
            while ($line = fgets($fh)) {
                $pieces = array();
                if (preg_match('/^MemFree:\s+(\d+)\skB$/', $line, $pieces)) {
                    // KB to Bytes
                    $result = $pieces[1] * 1024;
                    break;
                }
            }
            fclose($fh);
        }
        // KB RAM Total
        return (int) $result;
    }

    /**
     * Return harddisk infos.
     *
     * @param sring $path Drive or path
     * @return array Disk info
     */
    public function getDiskSize($path = '/')
    {
        $result = array();
        $result['size'] = 0;
        $result['free'] = 0;
        $result['used'] = 0;

        if (PHP_OS == 'WINNT') {
            $lines = null;
            exec('wmic logicaldisk get FreeSpace^,Name^,Size /Value', $lines);
            foreach ($lines as $index => $line) {
                if ($line != "Name=$path") {
                    continue;
                }
                $result['free'] = explode('=', $lines[$index - 1])[1];
                $result['size'] = explode('=', $lines[$index + 1])[1];
                $result['used'] = $result['size'] - $result['free'];
                break;
            }
        } else {
            $lines = null;
            exec(sprintf('df /P %s', $path), $lines);
            foreach ($lines as $index => $line) {
                if ($index != 1) {
                    continue;
                }
                $values = preg_split('/\s{1,}/', $line);
                $result['size'] = $values[1] * 1024;
                $result['free'] = $values[3] * 1024;
                $result['used'] = $values[2] * 1024;
                break;
            }
        }
        return $result;
    }

    /**
     * Get CPU Load Percentage.
     *
     * @return float load percentage
     */
    public function getCpuLoadPercentage()
    {
        $result = -1;
        $lines = null;
        if (PHP_OS == 'WINNT') {
            $matches = null;
            exec('wmic.exe CPU get loadpercentage /Value', $lines);
            if (preg_match('/^LoadPercentage\=(\d+)$/', $lines[2], $matches)) {
                $result = $matches[1];
            }
        } else {
            // https://github.com/Leo-G/DevopsWiki/wiki/How-Linux-CPU-Usage-Time-and-Percentage-is-calculated
            //$tests = array();
            //$tests[] = 'cpu  3194489 5224 881924 305421192 603380 76 52143 106209 0 0';
            //$tests[] = 'cpu  3194490 5224 881925 305422568 603380 76 52143 106209 0 0';

            $checks = array();
            foreach (array(0, 1) as $i) {
                $cmd = '/proc/stat';
                #$cmd = 'grep \'cpu \' /proc/stat <(sleep 1 && grep \'cpu \' /proc/stat) | awk -v RS="" \'{print ($13-$2+$15-$4)*100/($13-$2+$15-$4+$16-$5) "%"}\'';
                #exec($cmd, $lines);
                $lines = array();
                $fh = fopen($cmd, 'r');
                while ($line = fgets($fh)) {
                    $lines[] = $line;
                }
                fclose($fh);
                //$lines = array($tests[$i]);

                foreach ($lines as $line) {
                    $ma = array();
                    if (!preg_match('/^cpu  (\d+) (\d+) (\d+) (\d+) (\d+) (\d+) (\d+) (\d+) (\d+) (\d+)$/', $line, $ma)) {
                        continue;
                    }
                    /**
                     * The meanings of the columns are as follows, from left to right:
                      1st column : user = normal processes executing in user mode
                      2nd column : nice = niced processes executing in user mode
                      3rd column : system = processes executing in kernel mode
                      4th column : idle = twiddling thumbs
                      5th column : iowait = waiting for I/O to complete
                      6th column : irq = servicing interrupts
                      7th column : softirq = servicing softirqs
                      8th column:
                      9th column:

                      Calculation:
                      sum up all the columns in the 1st line "cpu" :
                      ( user + nice + system + idle + iowait + irq + softirq )
                      this will yield 100% of CPU time

                      calculate the average percentage of total 'idle' out of 100% of CPU time :
                      ( user + nice + system + idle + iowait + irq + softirq ) = 100%
                      ( idle ) = X %

                      TOTAL USER = %user + %nice
                      TOTAL CPU = %user + %nice + %system
                      TOTAL IDLE = %iowait + %steal + %idle
                     */
                    $total = $ma[1] + $ma[2] + $ma[3] + $ma[4] + $ma[5] + $ma[6] + $ma[7] + $ma[8] + $ma[9];
                    //$totalCpu = $ma[1] + $ma[2] + $ma[3];
                    //$result = (100 / $total) * $totalCpu;
                    $ma['total'] = $total;
                    $checks[] = $ma;
                    break;
                }

                if ($i == 0) {
                    // Wait before checking again.
                    sleep(1);
                }
            }

            // Idle - prev idle
            $diffIdle = $checks[1][4] - $checks[0][4];

            // Total - prev total
            $diffTotal = $checks[1]['total'] - $checks[0]['total'];

            // Usage in %
            $diffUsage = (1000 * ($diffTotal - $diffIdle) / $diffTotal + 5) / 10;
            $result = $diffUsage;
        }
        return (float) $result;
    }

}
$system = new SystemInfo();

$totalterpakai = round($system->getRamTotal() / 1024 / 1024);
$totalbebas = round($system->getRamFree() / 1024 / 1024);

?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <?php $this->load->view('admin/include/adm-head');?>
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
          
        <?php $this->load->view('admin/include/adm-logo');?>  
        <?php $this->load->view('admin/include/adm-leftmenu');?>  
		
        </nav>
        <div class="content">
		<?php $this->load->view('admin/include/adm-topmenu');?>
		  
          
          <div class="row g-0">
            <div class="col-lg-6 col-xl-7 col-xxl-8 mb-3 pe-lg-2 mb-3">
              <div class="card h-lg-100">
                <div class="card-body d-flex align-items-center">
                  <div class="w-100">
                    <h6 class="mb-3 text-800">MEMMORY
                    
					<div class="progress mb-3 rounded-3" style="height: 10px;">
                      <div class="progress-bar bg-progress-gradient border-end border-white border-2" role="progressbar" style="width: <?= $totalterpakai;?>%" aria-valuenow="<?= $totalterpakai;?>" aria-valuemin="0" aria-valuemax="100"></div>
					  
                      
					  <div class="progress-bar bg-info border-end border-white border-2" role="progressbar" style="width: <?= $totalbebas;?>%" aria-valuenow="<?= $totalbebas;?>" aria-valuemin="0" aria-valuemax="100"></div>
                      
					  <div class="progress-bar bg-success border-end border-white border-2" role="progressbar" style="width: 1.38%" aria-valuenow="1.38" aria-valuemin="0" aria-valuemax="100"></div>
					  
                      
                    </div>
					
					
                    <div class="row fs--1 fw-semi-bold text-500 g-0">
                      <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-primary"></span><span>Ram Terpakai</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(<?= $totalterpakai;?> MB)</span></div>
                      <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-info"></span><span>Ram Bebas</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(<?= $totalbebas;?> MB)</span></div>
					  

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-5 col-xxl-4 mb-3 ps-lg-2">
              <div class="card h-lg-100">
                <div class="bg-holder bg-card" style="background-image:url(<?= base_url(); ?>adminassets/img/icons/spot-illustrations/corner-1.png);">
                </div>

              <div class="card h-100">
                <div class="card-header bg-light d-flex flex-between-center py-2">
                  <h6 class="mb-0">CPU USAGE</h6>
                  
                </div>
                <div class="card-body d-flex flex-center flex-column">

                  <div class="text-center mt-3">
                    <h6 class="fs-0 mb-1"><span class="fas fa-check text-success me-1" data-fa-transform="shrink-2"></span><b><?=$system->getCpuLoadPercentage()."% Used";?></b><br/><span style="font-Size:10px;">from 100% CPU Memmory<span></h6>
                    
                  </div>
                </div>
                
              </div>

              </div>
            </div>
          </div>
          
		  
			<div style="margin-top: 700px;">
				<?php $this->load->view('admin/include/footer.php'); ?>
			</div>
        </div>
        
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
		<?php $this->load->view('admin/include/adm-javascriptdefault'); ?>


   <!-- <script src="<?= base_url(); ?>adminassets/vendors/popper/popper.min.js"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/anchorjs/anchor.min.js"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/is/is.min.js"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/echarts/echarts.min.js"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/fontawesome/all.min.js"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/lodash/lodash.min.js"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>

    <script src="<?= base_url(); ?>adminassets/vendors/list.js/list.min.js"></script> -->
		
	<script>
/* -------------------------------------------------------------------------- */

/*                                Market Share                                */

/* -------------------------------------------------------------------------- */


var marketShareInit = function marketShareInit() {
  var ECHART_MARKET_SHARE = '.echart-proses';
  var $echartMarketShare = document.querySelector(ECHART_MARKET_SHARE);

  if ($echartMarketShare) {
    var userOptions = utils.getData($echartMarketShare, 'options');
    var chart = window.echarts.init($echartMarketShare);

    var getDefaultOptions = function getDefaultOptions() {
      return {
        color: [utils.getColors().primary, utils.getColors().info, utils.getGrays()[300]],
        tooltip: {
          trigger: 'item',
          padding: [7, 10],
          backgroundColor: utils.getGrays()['100'],
          borderColor: utils.getGrays()['300'],
          textStyle: {
            color: utils.getColors().dark
          },
          borderWidth: 1,
          transitionDuration: 0,
          formatter: function formatter(params) {
            return "<strong>".concat(params.data.name, ":</strong> ").concat(params.percent, "%");
          }
        },
        position: function position(pos, params, dom, rect, size) {
          return getPosition(pos, params, dom, rect, size);
        },
        legend: {
          show: false
        },
        series: [{
          type: 'pie',
          radius: ['100%', '87%'],
          avoidLabelOverlap: false,
          hoverAnimation: false,
          itemStyle: {
            borderWidth: 2,
            borderColor: utils.getColor('card-bg')
          },
          label: {
            normal: {
              show: false,
              position: 'center',
              textStyle: {
                fontSize: '20',
                fontWeight: '500',
                color: utils.getGrays()['700']
              }
            },
            emphasis: {
              show: false
            }
          },
          labelLine: {
            normal: {
              show: false
            }
          },
          data: [{
            value: 5300000,
            name: 'Samsung'
          }, {
            value: 1900000,
            name: 'Huawei'
          }, {
            value: 2000000,
            name: 'Apple'
          }]
        }]
      };
    };

    echartSetOption(chart, userOptions, getDefaultOptions);
  }
};
/* -------------------------------------------------------------------------- */

/*                                Market Share                                */

/* -------------------------------------------------------------------------- */
	</script>
	
    <script src="<?= base_url(); ?>adminassets/js/theme.js"></script>

  </body>

</html>
