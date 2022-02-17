<?php

namespace App\Console;

use App\Console\Functions;

class Command
{

  /**
   * version
   */
  public function version()
  {
    echo <<< VERSIONINFO
    Krea CLI v0.0.1
    Copyright (c) Novalumo
    VERSIONINFO;
    return true;
  }

  /**
   * help
   */
  public function help()
  {
    echo <<< HELPTEXT
    Krea is a command-line tool for creating something new app.

    Usage:
      php krea <command> [arguments]

    The commands are:

      dev         start web server (PHP built-in)
      make        make controller, model, and view.
      git         initialize for git
      help        show this help
      version     show verison info

    For more information, please visit:
    HELPTEXT;
    return true;
  }

  /**
   * server
   */
  public function server($port = null)
  {
    exec("php -S 0.0.0.0:" . ($port !== null ? $port : "3000"));
    return true;
  }

  /**
   * 
   */
  public function make(String $type = null, String $name = null)
  {
    if ($type !== null)
    {
      $make = new Functions\Make();

      if (method_exists($make, $type))
      {
        $make->$type($name);
      }
      else
      {
        echo "Unknown type.\n";
      }
    }
    else
    {
      echo "This command requires the type of name you want to create.\n";
      return false;
    }
  }

  /**
   * 
   */
  public function git($action, $check)
  {
    if ($action === "clear" && $check === "y"):
      exec("rm -rf .git/");
      exec("git init");
    endif;
  }
  
}
