<?php
$starttime = hrtime(true);
$dirs = array_filter(glob('*'), 'is_dir');
foreach ($dirs as $dir){
    $thisStart = hrtime(true);
    chdir($dir);
    include "$dir/index.php";
    chdir('..');
    echo '<a href="'.$dir.'">'.$dir.'</a><br />';
    $thisEnd = hrtime(true);
    $thisRuntime=$thisEnd-$thisStart;
    echo "runtime $dir: ".($thisRuntime/1000/1000).' ms <br />';
}
$endtime = hrtime(true);
$runtime = ($endtime-$starttime);
echo '<br />';
echo 'runtime all together: '.($runtime/1000/1000).' ms <br />';