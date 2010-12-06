SASL support for various clients
================================

This is a collection of scripts and add-ins for various clients to implement
charybdis and ircd-seven's SASL mechanism for identifying to nickserv during
connection.

These clients support SASL natively:
------------------------------------
Conspire [http://confluence.atheme.org/display/CON/Home]
KVIrc (versions 4+) [http://www.kvirc.net/]
Quassel (versions 0.6.1+) [http://www.quassel-irc.org]
Weechat [http://www.weechat.org/]


Irssi
-----

Load cap_sasl.pl, and /sasl set <network> <username> <password> <mechanism>

Supported mechanisms are PLAIN and DH-BLOWFISH. Required perl modules are
Crypt::OpenSSL::Bignum, Crypt::DH and Crypt::Blowfish.


mIRC
----

The mIRC script was written by Kyle Travaglini, and taken by me from
http://forum.swiftirc.net/viewtopic.php?f=34&t=23101. His readme is below:

Hello!

Put SASL.dll and SASL.mrc into your $mircdir, load SASL.mrc into your remotes,
press "f2", configure a network using the GUI interface, and connect as you
would any server.

Enjoy the added security :D

sasl-mirc.cpp is the source file used to build SASL.dll. The version on this
page was created with Visual Studio 2008 on Windows 7.

NB: We've had some reports of problems running this on 64-bit Windows systems.
If you have any experience with it, positive or negative, or are in a position
to help track down any problems, please contact spb on IRC.


X-Chat
------

Copy cap_sasl.py to your .xchat/ directory, so that it auto-loads. Once loaded,
use the /SASL command to add or remove SASL settings per network -- its help
text describes the syntax.


X-Chat (alternative method)
---------------------------

Alternatively, there is the sasl-lite script for x-chat. In most cases this
should be superceded by cap_sasl.py, but may be of interest for some people.

Edit sasl-lite-xchat.pl to include the (services) username and password you want
to use to login (in the section titled "EDIT ME"). Load it, and connect.

This script in its current form is very primitive; updates to allow proper
configuration of login credentials per network would be welcome.
