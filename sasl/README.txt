SASL support for various clients
================================

This is a collection of scripts and add-ins for various clients to implement
charybdis and ircd-seven's SASL mechanism for identifying to nickserv during
connection.

These clients support SASL natively:
------------------------------------
Conspire [http://confluence.atheme.org/display/CON/Home]
KVIrc (4+) [http://www.kvirc.net/]
Quassel (0.6.1+) [http://www.quassel-irc.org]
Weechat [http://www.weechat.org/]
AndChat (1.3.4+) [http://www.andchat.net]
AndroidIRC (2.0+) [http://www.androirc.com]

Irssi
-----

Load cap_sasl.pl, and /sasl set <network> <username> <password> <mechanism>

Supported mechanisms are PLAIN and DH-BLOWFISH. Required perl modules are
Crypt::OpenSSL::Bignum, Crypt::DH and Crypt::Blowfish.

mIRC (new combined script)
--------------------------

Load the sasl.mrc script into mIRC, then go to the commands menu and click,
"mSASL 1.0 beta" to configure SASL.

This script is a combination of sasl-old.mrc and sasl-lite.mrc below. Thanks to
lowbox on freenode for providing it.

mIRC (original script with DLL)
-------------------------------

The sasl-old mIRC script was written by Kyle Travaglini, and taken by me from
http://forum.swiftirc.net/viewtopic.php?f=34&t=23101. His readme is below:

Hello!

Put SASL.dll and sasl-old.mrc into your $mircdir, load sasl-old.mrc into your remotes,
press "f2", configure a network using the GUI interface, and connect as you
would any server.

Enjoy the added security :D

sasl-mirc.cpp is the source file used to build SASL.dll. The version on this
page was created with Visual Studio 2008 on Windows 7.

NB: Several people have reported that this script doesn't work for them.
However, several people have also reported that it does, so it's still here. If
anyone is able to track down the problem and fix it, patches would be gratefully
received.

sasl-lite.mrc is another script, taken from [1], which supports SASL plain
authentication without the DLL. However, it lacks a nice interface and requires
that the username and password are inserted into the script in two places.

If someone can combine this simpler authentication script with the settings
dialogue from the other, this would be much appreciated.

[1]: http://forums.mIRC.com/ubbthreads.php?ubb=showflat&Number=228222


X-Chat
------

Copy cap_sasl_xchat.py or cap_sasl_xchat.pl to your .xchat/ directory, so that
it auto-loads. Once loaded, use the /SASL command to add or remove SASL
settings per network -- its help text describes the syntax.

For Debian and Ubuntu users, the cap_sasl_xchat.pl version is required, as
the Python version is broken by a patch applied in these distributions.


X-Chat (alternative method)
---------------------------

Alternatively, there is the sasl-lite script for x-chat. In most cases this
should be superceded by cap_sasl.py, but may be of interest for some people.

Edit sasl-lite-xchat.pl to include the (services) username and password you want
to use to login (in the section titled "EDIT ME"). Load it, and connect.

This script in its current form is very primitive; updates to allow proper
configuration of login credentials per network would be welcome.
