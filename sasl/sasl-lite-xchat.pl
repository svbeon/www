#
# Copyright (c) 2006 William Pitcock <nenolod -at- nenolod.net>
# All rights reserved.
#
# Redistribution is allowed per the atheme.org license, viewable at:
#       http://svn.atheme.org/atheme/trunk/COPYING
#

use strict;
use Xchat;

use MIME::Base64;

Xchat::register("SASL for XChat", "1.0",
	"SASL authentication for Charybdis IRCd");
Xchat::print("SASL authentication support loaded.");

Xchat::hook_print("Connected", \&serverConnected);
Xchat::hook_server("CAP", \&parseCap);
Xchat::hook_server("AUTHENTICATE", \&parseAuthenticate);

Xchat::hook_server("903", \&saslDone);
Xchat::hook_server("904", \&saslDone);
Xchat::hook_server("905", \&saslDone);
Xchat::hook_server("906", \&saslDone);
Xchat::hook_server("907", \&saslDone);

### EDIT ME ###

my $sasl_user = "EDIT";
my $sasl_password = "EDIT";

### END EDITING! ###

my $sasl_inprog = 0;
my $sasl_timeout;

sub timeout;

sub serverConnected {
	Xchat::command("quote CAP REQ SASL");
}

sub parseCap {
	my $ack = 0;

	foreach my $i (0..16) {
		my $y = $_[0][$i];

		$ack++ if ($y eq "ACK");
		$ack-- if ($y eq "NAK");
		
		if ($y =~ /SASL/i && $ack) {
			Xchat::command("quote AUTHENTICATE PLAIN");
			$sasl_timeout = Xchat::hook_timer(5000, \&timeout);
			$sasl_inprog = 1;
			return Xchat::EAT_XCHAT;
		}
	}

	if ($ack == 0)
	{
		Xchat::command("quote CAP END");
		$sasl_inprog = 0;
	}

	return Xchat::EAT_XCHAT;
}

sub parseAuthenticate {
	advance_sasl($_[0][1]);

	return Xchat::EAT_XCHAT;
}

sub timeout {
	if($sasl_inprog) {
		Xchat::command("quote CAP END");
		$sasl_inprog = 0;
	}
}

sub advance_sasl {
	my($data) = @_;
 
	my $out = join("\0", $sasl_user, $sasl_user, $sasl_password); 
	$out = encode_base64($out, "");

	if(length $out == 0) {
		Xchat::command("quote AUTHENTICATE +");
		return;
	}else{
		while(length $out >= 400) {
			my $subout = substr($out, 0, 400, '');
			Xchat::command("quote AUTHENTICATE $subout");
		}
		if(length $out) {
			Xchat::command("quote AUTHENTICATE $out");
		}else{ # Last piece was exactly 400 bytes, we have to send some padding to indicate we're done
			Xchat::command("quote AUTHENTICATE +");
		}
	}
}

sub saslDone {
	Xchat::unhook($sasl_timeout);
	Xchat::command("quote CAP END");

	return Xchat::EAT_NONE;
}
