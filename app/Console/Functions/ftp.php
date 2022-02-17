<?php

namespace App\Console\Functions;

class FTP
{
  /**
   * 
   */
  public function uploadFtp($local_filename, $remote_filename)
  {
    $cfg['ftp_host'] = '';
    $cfg['ftp_user'] = '';
    $cfg['ftp_pass'] = '';

    $conn = ftp_connect($cfg['ftp_host']);

    if (!ftp_login($conn, $cfg['ftp_user'], $cfg['ftp_pass'])) {
      echo 'Login Failed';
      return;
    }

    ftp_pasv($conn, true);
    
    ftp_put($conn, $remote_filename, $local_filename, FTP_BINARY);
    
    ftp_close($conn);
  }

}
