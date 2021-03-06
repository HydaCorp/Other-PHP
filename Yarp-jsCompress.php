<?php
/*     ============================= 
 *         Yarp-jsCompressor v1.0
 *     =============================
 *
 *  Author    : K4pT3N
 *     URL        : www.ExploreCrew.org
 *    Twitter    : @jmozac
*/

    class yarpCompress {
        function remComment(){
            $file = file_get_contents($_SERVER['argv'][1]);
            $str = preg_replace("%/\*(?:(?!\*/).)*\*/%s","",$file);
            $tmpfile='/tmp/'.rand(1000,9999);
            $fp = fopen($tmpfile, 'a');
                fwrite($fp,$str);
                fflush($fp);
            fclose($fp);
            return $tmpfile;
        }
        function getFile(){
            $rFilter=array("\n","\r","\t","//");
            $fp=fopen($this->remComment(),"r");
            while(!feof($fp)){
                $line=fgets($fp);
                if(!strpos($line,"//")===false){
                    $explode=explode("//",$line);
                    $mFilter=array_merge((array)$explode[1], (array)$rFilter);
                    $filter=str_replace($mFilter,"",$line);
                } else {
                    $filter=str_replace($rFilter,"",$line);
                }
                $newfile=(!isset($_SERVER['argv'][2]))?"yarp.". $_SERVER['argv'][1]:$_SERVER['argv'][2];
                $fw = fopen($newfile, 'a');
                    fwrite($fw,$filter);
                    fflush($fw);
                fclose($fw);
            }
            fclose($fp);
            echo "\nYarp, Compress done.\n\nFile size before compressed: ".filesize($_SERVER['argv'][1])." bytes\nFile size after compressed: ".filesize($newfile)." bytes\n\nGenerated by Yarp-jsCompress v1.0\n\n";
        }
    }
    $yarpCompress=new yarpCompress;
    $yarpCompress->getFile();
?>
