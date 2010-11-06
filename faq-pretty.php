<?php

if (isset($_GET['cid']))
{
	// Requesting a specific question.
	echo "You requested " . $_GET['cid'];
	echo "You requested " . $_GET['cid'];
	echo "You requested " . $_GET['cid'];
	echo "You requested " . $_GET['cid'];
	echo "You requested " . $_GET['cid'];
	echo "You requested " . $_GET['cid'];
	echo "You requested " . $_GET['cid'];
	echo "You requested " . $_GET['cid'];
	echo "You requested " . $_GET['cid'];
	die();
}
/*
<div id="actualquestions">
  <div class="large">
    <a name="general"></a>
    General Questions.
  </div>

  <ul>
    <li>
      <b>
        <a name="whatwhy"></a>What is <span class="freenode">freenode</span>
        about? Why is it here?
      </b>

      <span class="freenode">freenode</span> is a special-purpose, not a
      general-purpose, discussion network, currently implemented on Internet
      Relay Chat (IRC). It exists to support specific communities.  It
      provides an interactive environment for coordination and support of
      peer-directed projects, including those relating to free software and
      open source. Our aim is to help our participants to improve their
      communicative and collaborative skills and to maintain a friendly,
      efficient environment for project coordination and technical support. 
      For more information about the network philosophy, please take a look

      <a href="philosophy.shtml">here</a>.
      
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="createchannel"></a>Should I create a channel on

        <span class="freenode">freenode</span>?
      </b>

      That depends.  Certain
      
      <a href="policy.shtml#ontopic">channel categories</a>
      
      are considered to be on-topic and are listed on the
      
      <a href="policy.shtml">network policy page</a>.
      
      If you want to create a general-purpose chat channel,
      
      <span class="freenode">freenode</span>
      
      is probably not for you. Similarly, if you want to create a channel to
      support some sort of unlawful activity,
      
      <span class="freenode">freenode</span>
      
      is not the network you should be using.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="whyfreenode"></a>Why is it called <span class="freenode">freenode</span>?
      </b>
      Prior to the creation of <span class="freenode">freenode</span>'s not-for
      profit parent entity, Peer-Directed Projects Center, we called the
      network Open Projects.  We picked a new name, <b
      class="freenode">freenode</b>, to mark its new status as a service of
      PDPC.  The new name brings to mind the best qualities of free software
      and open source.  It suggests the non-hierarchical nature of the
      network, in which the individual channels are run by the groups which
      own them, and network staff works to maintain a relaxed and congenial
      environment.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="sourceavailable"></a>Is the source code used for your servers publicly available?
      </b>
      Yes. We currently use Hyperion IRCD, which can be found in its

      <a href="http://svn.freenode.net/hyperion/trunk/">SVN source repository</a>,
      
      and Atheme, our IRC services daemon, in

      <a href="http://www.atheme.net/">Atheme IRC services</a> and <a href="http://svn.freenode.net/atheme+fn/">freenode modules</a>.

      Both are offered under terms of the the ISC License.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="minimumstandards"></a>Are there minimum standards of conduct for using <span class="freenode">freenode</span>?
      </b>
      The basic policies for the network are outlined

      <a href="policy.shtml">here</a>.

      Beyond that, we strongly urge you to adopt the
      <span class="freenode">freenode</span>

      <a href="channel_guidelines.shtml">channel guidelines</a>

      and

      <a href="philosophy.shtml">philosophy</a>

      to help us keep the network a friendly and useful place.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="fst"></a>What is fST or <span class="freenode">freenode</span> Standard Time?
      </b>
      It's our official timezone.  Well, sort of. We're not entirely
      serious. :) <span class="freenode">freenode</span> <b>Standard Time</b> is
      UTC.
      <br /><br />
    </li>
  </ul>
</div>
  <br />
  <div class="large">
    <a name="userregistration"></a>
    User Registration.
  </div>

  <ul>
    <li>
      <b>
        <a name="registering"></a> Why should I register my nick?
      </b>
      Your nick is how people on <span class="freenode">freenode</span> know you. 
      If you register it, you'll be able to use the same nick over and over. 
      If you don't register, someone else may end up registering the nick
      you want.  If you register and use the same nick, people will begin to
      know you by reputation. If they're running IRC software which supports
      <b>CAPAB IDENTIFY-MSG</b>, they'll be able to tell when someone is
      spoofing your identity.

      <br /><br />

      If a channel is set to mode <b>+r</b>, you won't be able to join it
      unless you are registered and identified to nickserv.  If you try to
      join, you might be forwarded to a different channel.  If a channel
      is set to mode <b>+R</b>, you won't be able to speak while on that
      channel unless you are registered and identified.  Both of these
      modes are used to reduce channel harassment by DoS kiddies.

      <br /><br />

      For more information on how to set up a registered nick, take a look

      <a href="#nicksetup">here</a>.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="nicksetup"></a> What is the recommended way to set up my IRC nickname?
      </b>
      Please follow these steps to set up your nick and configure your
      client.  <b>Check off each step to make sure it's been done:</b>
      
      <br /><br />
      
      <ol>
        <li>
          Select a permanent, master nickname.  If the nickname you want is
          registered but has not been used for at least 60 days, just

          <a href="#gettinghelp">ask a staffer</a>
          
          and we'll be happy to drop it for you.

          <br /><br />

          Please avoid using the name of a community project or trademarked
          entity, to avoid conflicts. Write down your password and be sure
          to keep the sheet of paper in a safe place.
          
          <br /><br />
        </li>

        <li>
          Register your IRC nick:
          <blockquote>
            <b>/msg nickserv register &lt;your-password&gt; &lt;your-email&gt;</b>
          </blockquote>
        </li>

        <li>
          To keep your email address private, rather than displaying it
          publicly, mark it as hidden:

          <blockquote>
            <b>/msg nickserv set hidemail on</b>
          </blockquote>
        </li>

        <li>
          It's useful to have an alternate nick grouped to your account.  This
          will ensure that you have a way to get online as a registered user
          (keeping any cloak you may have) in case your nick becomes frozen (a
          "ghost"). Many clients will automatically add an underline to your
          nick at connect time if the nick you specify is unavailable so it is
          advised to group the underlined nick.  For example, if your primary
          nick is foo:

          <blockquote>
            <b>/nick foo_</b>
          </blockquote>

          and then

          <blockquote>
            <b>/msg nickserv group</b>
          </blockquote>

          This will document that both nicks are owned by the same person and
          will allow services to leave you identified if you switch from your
          primary nick to your alternate and vice-versa.

          <br /><br />
        </li>

        <li>
          If you're running an older version of <b>xchat</b> and you've
          requested a cloak, you may need to

          <a href="#nocloakxchat">follow these instructions</a>

          so that your client will properly identify to <b>Nickserv</b>
          before joining any channels. Recent versions of xchat appear to
          handle things just fine.

          <br /><br />
        </li>

        <li>
          Configure your client to identify itself to nickserv automatically
          whenever it connects to freenode so that it's less likely you'll
          connect to the network without being identified to nickserv.  The
          easiest approach is to specify your nickserv password as a server
          password.

          <br /><br />
        </li>

        <li>
          If your client can automatically try an alternate nick, set it to
          use the alternate nick you just registered. In this way, you'll
          make it much less likely that you'll ever appear without your
          registration (or your cloak if you have one).
        </li>
      </ol>
      <br />
    </li>

    <li>
      <b>
        <a name="identify"></a>What's the easiest way to identify to
        nickserv when I connect to <span class="freenode">freenode</span>?
      </b>

      Just plug your nickserv password into your client as a server
      password.  You'll be identified to nickserv automaticaly when you
      connect. In some cases, it's more convenient to configure your client
      to send the command <b><i>/msg nickserv identify &lt;your-password&gt;</i></b>
      to achieve the same effect.

      <br /><br />

      We recommend you read and follow the steps of the

      <a href="#nicksetup">canonical nickname setup</a>

      to make sure your client identifies reliably to nickserv.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="spoofing"></a>How can I tell when someone might be spoofing a user's identity?
      </b>
      If your client supports <b>CAPAB IDENTIFY-MSG</b>, you can configure
      it to let you know when someone speaking on channel or via /msg is
      not identified to services.

      Scripts to take advantage of <b>CAPAB IDENTIFY-MSG</b> are currently
      available for

      <a href="http://web.archive.org/web/20040604065734/http://svn.ben.reser.org/format_identify/releases/current/format_identify.pl">irssi</a> and
      <a href="http://www.krs.ca/freenode/">mIRC</a>,

      and a patch is available for

      <a href="http://co.ordinate.org/sirc/">sirc and ksirc</a>.
      
      If you want other people using this
      feature to know that you're you, have your client

      <a href="#identify">identify to nickserv</a>

      when you connect to the network. You should also follow the

      <a href="#nicksetup">canonical setup steps</a>
      
      for your IRC nickname.

      <br /><br />
      
      When the
          
      <a href="policy.shtml#usernames">registered user name policy changes</a>
      
      associated with the
      
      <a href="Why_NOIDPREFIX.shtml">NOIDPREFIX</a>
      
      server capability go into effect, you'll be able to distinguished
      unregistered users by the tilde ('~') character at the beginning of
      their IRC nicknames.
      
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="userexpirations"></a>When do IRC nicknames expire?
      </b>

      We consider IRC nicks expired after 60 days without use. Nicks which
      are at least two weeks old and which were last used less than two
      hours after their creation are also considered to be expired. These
      time limits do not apply to staff-reserved nicks, which are allocated
      and dropped as needed.  Also, if the nick you want to register is
      someone's alternate nickname, and it's the only alternate nickname
      they have, we may be reluctant to drop it, even if it's expired.

      <br /><br />
      Nicknames that are not confirmed by a valid email address will be
      automatically dropped after 24 hours.

      <br /><br />

      If you're trying to get a nickname expired so that you can
      register it, please try to make sure you own the underlying
      alphanumeric basename.
      <br /><br />

    </li>
    
    <li>
      <b>
        <a name="inuse"></a>How do you know the last time an IRC nickname
        was used?
      </b>

      We know this only as a result of your

      
      <a href="#identify">identifying to nickserv</a>

      when you connect to the network.  If you don't identify, we'll have no
      way to know that your nick is in use, and it will eventually be
      dropped.  You should also follow the

      <a href="#nicksetup">canonical setup steps</a>
      
      for your IRC nickname.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="unusednick"></a>How can I take over a registered nick that hasn't been used in a long time?
      </b>
      Nicks which are considered
      
      <a href="#userexpirations">expired</a>
      
      are not dropped automatically on a regular basis.  We do drop them
      when we notice them and, if you ask a staffer, we'll be happy to
      manually drop the one you want so that you can re-register it.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="nickisgone"></a>I registered my nick and now someone else has it.  Did someone steal it?  How do I get it back?
      </b>
      To keep your registered nick, you must

      <a href="#inuse">continue to use it</a>.

      If you don't sign onto the network for at least 60 days, or you
      don't identify to nickserv for at least 60 days, the nick is
      considered <b>expired</b>, and someone can

      <a href="#unusednick">ask to have it dropped</a>.

      When a nick has been dropped and picked up by some other user, we
      can't take it back from them.  That would be unfair to the user who
      picked it up.
      <br /><br />
    </li>
  </ul>

  <br />
  <div class="large">
    <a name="usingfreenode"></a>
    Using the Network.
  </div>

  <ul>
    <li>
      <b>
        <a name="webchat"></a>Can I access the network via webchat?
      </b>

      There is no official
      
      <span class="freenode">freenode</span>
      
      webchat, but there are many such facilities available. Just consult
      
      <a href="http://search.yahoo.com/search?p=%22CGI%3AIRC+Login%22+%22irc.freenode.net%22&amp;fr=FP-tab-web-t500&amp;toggle=1&amp;cop=&amp;ei=UTF-8">Yahoo</a>

      or

      <a href="http://www.google.com/search?hl=en&amp;lr=&amp;q=%22CGI%3AIRC+Login%22+%22irc.freenode.net%22&amp;btnG=Search">Google</a>
      
      for a list and try one of the pages on the list.
      
      Obviously <span class="freenode">freenode</span>
      
      can not recommend a particular webchat facility, and we might have to
      limit access if they're abused, but we're happy to have you connect in
      this way.
      
      <br /><br />
    </li>

    <li>
      <b>
        <a name="userequals"></a> What are those 'i=' and 'n=' strings in my hostname?
      </b>

      They're actually in your username field. Usernames on IRC typically
      display a tilde ('~') at the beginning of the username if it does not
      match what is returned by the identd or authd service.
      
      Prior to Hyperion 1.0,
      
      <span class="freenode">freenode</span>
      
      followed this convention. However, it resulted in unnecessarily-broad bans. As the
      
      <a href="catalysts.shtml">catalysts</a>
      
      page implies, we don't support unnecessary use of bans. When they're
      used, though, they should be targetted as narrowly as possible. With
      the tilde construction, banning someone with the user name <i>foo</i>
      without regard to whether they match ident is frequently done in this
      way:
      
      <blockquote><i>
        /mode #channel +b nickmask!*foo@hostmask
      </i></blockquote>
      
      which bans both <i>foo</i> and <i>~foo</i>. Unfortunately, it also bans
      usernames such as:
      
      <blockquote><i>
        foofoo<br />
        moofoo<br />
        goofoo<br />
        anythingfoo
      </i></blockquote>
      
      With the new construction, it is possible to ban <i>foo</i> only, in
      this way:
      
      <blockquote><i>
        /mode #channel +b nickmask!?=foo@hostmask
      </i></blockquote>
      
      (Note that the '?' character in wildcards matches exactly one
      character; it does not match zero-or-one-characters as it does in
      regular expressions.)

      <br /><br />
    </li>

    <li>
      <b>
        <a name="howtoconnect"></a>How do I connect to <span class="freenode">freenode</span>?  How do I use the network?
      </b>
      Information on using the network can be found

      <a href="using_the_network.shtml">here</a>

      and guides to hyperion, the code tree under development, can be found

      <a href="http://svn.freenode.net/hyperion/trunk/">here</a>.

      A list of servers can be found

      <a href="irc_servers.shtml">here</a>.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="channellist"></a>How can I get a list of <span class="freenode">freenode</span> public channels?
      </b>
      Check the
      
      <a href="http://irc.netsplit.de/channels/?net=freenode">Gelhausen</a>

      site for a current list.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="ipv6access"></a>How do I access <span class="freenode">freenode</span> via IPv6?
      </b>
      
      The simplest way is to connect to <b>irc.ipv6.freenode.net</b>.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="defocuschannel"></a> What is the purpose of channel #defocus?
      </b>
      
      It's a social channel. It's the home channel of the
      <span class="freenode">freenode</span> project, a place for friendly,
      relaxed conversation with staff and users. Sometimes it will be forwarded
      to another channel, but underneath you may just find that the character of
      the channel hasn't changed much. It's not a forum for IRC
      politics or a place to flame the staff, on a personal or professional
      basis.  It's not really a support channel, though we probably won't
      get too upset if you ask a question or two.  Feel free to

      <a href="#helpfromstaff">ask for help</a>

      from network staff if you're having problems.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="nobodysees"></a>Why can't anyone see what I'm typing on channel?
      </b>
      One of several server features might be keeping people from seeing
      your comments.  The channel might be moderated using channel mode
      <b>+m</b>; if so, no one can talk who hasn't been explicitly voiced
      by a channel staffer via <b>+v</b>. You might want to send a private
      message to a channel staffer to find out what's wrong.  Channel
      staffers are identified on most clients with an <b>@</b> in front of
      their nicks.
      
      <br /><br />

      You might be silenced by a <b>+q</b> mask; this feature is used to
      prevent problem users from talking on channel, or to moderate the
      channel during a seminar. <b>+v</b> or <b>+e</b> can be used to
      counteract the effects of <b>+q</b>. Again, send a private message
      to a channel staffer to find out what's wrong.

      <br /><br />

      Finally, the channel might have <b>+R</b> set.  This mode prevents
      you from talking on channel until you're

      <a href="#registering">registered</a>

      and identified to nickserv.  In this case, you'll see a message in
      your server notice window which explains the problem and points you
      to nickserv for more information.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="pdpc_cloak"></a>Who are these people with "pdpc/supporter/" and "pdpc/sponsor/" on the beginnings of their hostnames?
      </b>
      
      They're users who have

      <a href="pdpc_donations.shtml">donated</a>

      to <b>Peer-Directed Projects Center</b>, the not-for-profit entity
      which runs <span class="freenode">freenode</span>.  The hostnames
      acknowledge their donations.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="channelexpirations"></a>When do IRC channels expire?
      </b>

      We consider <a href ="http://freenode.net/policy.shtml#channelnaming">non-primary</a>
      IRC channels (those which start with "##") to be expired when their primary and
      alternate channel contact nicknames are expired. We occasionally drop
      expired channels and nicks in a large run, designed to clean out the
      databases.  We also drop nicks which are considered to be expired on
      an individual basis, either on request or when we notice them.  If a
      channel contact's nick and the alternate contact's nick are dropped,
      the associated channel will be dropped along with them.

      <br /><br />

      Subject to resource availability, staff may occasionally monitor
      channels whose contact nickname registrations are not expired, in the
      interest of determining whether the channels are actually active. If a
      channel has no activity or has no conversation for a period of 60
      days, it may be considered to be expired.

      <br /><br />

      Primary channels, namely those which start with a single "#", can <b>only</b>
      be dropped if a valid <a href="http://freenode.net/group_registration.shtml">Group Registration</a>
      is completed.  None of the rules above regarding timed expirations, or expiration
      due to nick drops apply in the case of such primary channels.

      <br /><br />
    </li>

    <li>
      <b>
        <a name="channelpolicy"></a>Who sets channel policy on <span class="freenode">freenode</span>?
      </b>
      Channel policy is set by channel owners. Network staff set the basic

      <a href="http://freenode.net/policy.shtml#general">ground rules</a>

      for the use of the servers and we try to influence channel policies
      in a positive direction by urging channel owners to adopt the

      <span class="freenode">freenode</span>

      <a href="channel_guidelines.shtml">channel guidelines</a>.

      They're formulated based on our experience encouraging the growth of
      relaxed, productive discussion environments.  We strongly urge you to
      adopt these guidelines to help keep

      <span class="freenode">freenode</span> 

      a friendly and useful place for community discussion and project
      coordination.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="channelfreezing"></a>Why do you freeze channels when groups leave the network?
      </b>
      Frequently when groups leave the network, they put up a pointer to
      the location of their new channel, on another network.  This helps
      ensure that active users who were unaware of the move can find the
      new channel. But leaving the message up permanently encourages
      people to use <span class="freenode">freenode</span> channel topics as
      billboards for channels on other networks, or as forums for IRC
      politics. If you've moved, we'll leave your pointer up for a week. 
      After that, please use your project or group website to point to the
      new channel.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="networkinfo"></a>How do I find out what's going on with the network?
      </b>
      
      We put information on the network in a variety of places.  Your best
      ongoing source is this website; it provides reference information on
      the network, its philosophy, the software it uses, etc.  In addition,
      staff send WALLOPS messages with time-sensitive status information (as
      well as a variety of general comments and announcements). To receive
      these messages, on most clients, you can use <b>"/umode +w"</b> or
      <b>"/mode</b> yournick <b>+w"</b>.  For best results, place the
      command in your client's startup script. <b>(Please be careful; some
      clients, including ERB and XChat, don't have a /UMODE command, and
      will pass on UMODE to the server, often causing a false positive on a
      spambot test.)</b>
      
      <br /><br />
      
      Finally, we send information we judge to have global significance to
      our users via global notices.  You don't generally have to do
      anything to see these, though they may appear on a different window
      of your client (along with the WALLOPS messages).
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="lessinfo"></a>How can I get fewer notices from the staff?
      </b> 
      Most of those messages are sent via WALLOPS, an IRC facility for
      displaying messages from server operators.
      On <span class="freenode">freenode</span>, WALLOPS messages may contain
      non-critical comments and announcements from staff, as well as
      detailed server administration information. If you don't like the
      number of messages or the messages seem too trivial or detailed, you
      can turn them off by turning off user mode "w".  On most clients this
      can be accomplished via:

      <blockquote><b><i>
        /umode -w
      </i></b></blockquote>

      or

      <blockquote><b><i>
        /mode yournick -w
      </i></b></blockquote>
      
      For best results, place the command in your client's startup
      script.<b>(Please be careful; some clients, including ERB and XChat,
      don't have a /UMODE command, and will pass on UMODE to the server,
      often causing a false positive on a spambot test.)</b>
                        

      <br /><br />

      We also send information with global significance to our users via
      global notices.  These notices are a bit more difficult to turn off;
      you can usually tell your client to ignore notices from specific staff
      members, notices from all staffers or all notices. <b>It's not
      recommended.</b> But on most clients, it works something like this:
      
      <blockquote><b><i>
        /ignore *!*@freenode/staff/* notice
      </i></b></blockquote>
    </li>
    
    <li>
      <b>
        <a name="firewall"></a>My firewall logs show that someone from your network is trying to crack my box. What's going on?
      </b>

      You're probably seeing our open proxy detector.  After numerous
      problems with clonebots, we began checking for open proxies and
      similar software on the hosts of clients connecting to our network.
      We use

      <a href="http://www.blitzed.org/bopm/">BOPM</a>

      for this.  It's popular with a number of IRC networks, and it's very
      reliable.  For more information, please see our

      <a href="policy.shtml#proxies">policy page</a>.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="loopback"></a>Why is my client trying to connect to 127.0.0.1 when I try to connect to your network?
      </b>
      
      You've tried to connect to <span class="freenode">freenode</span> during a
      massive clonebot (or some other denial-of-service) attack.  IRC
      suffers from the lack of a reputation-based system for filtering out
      malicious clients. For this and other reasons, we must sometimes shut
      off new connects or shut down servers for (hopefully brief) periods of
      time. We apologize for the inconvenience and want you to know that we
      are slowly working on the problem.  We hope you'll consider

      <a href="pdpc.shtml">donating to PDPC</a>,

      the not-for-profit entity which runs <span class="freenode">freenode</span>,
      to help us acquire the resources to advance this and other projects.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="rejected"></a>Why does my client get "connection rejected" when I try to connect to your network?
      </b>
      
      As in the case
      
      <a href="#loopback">above</a>,
      
      you've tried to connect to <span class="freenode">freenode</span>
      during a large denial attack, and our listening ports are closed.
      Please try a different server or check back in a few minutes if you
      can't get in.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="drones"></a>I joined this channel and now I can't access <span class="freenode">freenode</span> anymore.  The message says I'm a clonebot.  What's going on?
      </b>
      Apologies for the inconvenience.  Due to problems with drones and
      automated clonebots, we've had to institute automated network bans
      when clients join certain channels.  Please contact support at freenode
      dot net, providing your IP address to be unbanned.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="practicaljoke"></a>Someone told me to join this channel and now I can't get to the network anymore.  What's going on?
      </b>
      Someone has played a practical joke on you.  Please see

      <a href="faq.shtml#drones">above</a>.

      Sorry for the inconvenience.  Please feel free to let us gently tap
      the malefactor over the head with a rubber mallet. ;)
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="klineannoyinguser"></a>Do you mind if I refer annoying user foo to one of the auto-kline channels to get him out of my hair?
      </b>
      Please don't do that.  It causes staff headaches and extra work. 
      We'll be extremely testy if you refer people to those channels,
      as a practical joke or to get rid of annoying users.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="ctcpversion"></a>Why did someone CTCP VERSION me?
      </b>
      CTCP VERSION causes your IRC client to return a
      client-name-and-version string to some requesting user.  It's a
      service provided by your client which you can turn on and off.  On
      many IRC clients, you can even set a false VERSION string.  But the
      random person using the command on your client was probably just
      curious what IRC client you're running.  And <b
      class="freenode">freenode</b>
      
      <a href="#freenodeconnect">requests</a>
      
      that information when you connect to the network.

      <br /><br />

      Occasionally, a cracker will use CTCP VERSION to try to determine if
      your client is vulnerable to attack.  Update your client regularly
      to avoid security problems, and don't be too worried unless they're
      doing more than just CTCP VERSION, or doing it over and over.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="freenodeconnect"></a>Why does user
        
        <span class="freenode">freenode-connect</span>
        
        send CTCP VERSION when I connect to the network?
      </b>
      CTCP VERSION is a
      
      <a href="#ctcpversion">public IRC client interface</a>
      
      which you can turn on or off or even spoof. We've started to request
      version information using that interface when users connect to
      
      <span class="freenode">freenode</span>,
      
      so that we can help users with client-related problems, track down
      abusive bots and deny network access from old, insecure releases of
      client software, as well as analyze client-use statistics to help us
      better support our users' needs. It helps us as administrators for you
      to leave CTCP VERSION available and un-spoofed, but you should upgrade
      your client frequently to reduce your exposure to attacks.
      
      <br /><br />
      
      For privacy purposes, staff will treat your client version information
      in the same way it treats
      
      <a href="group_privacy.shtml">personal information provided by group contacts</a>,
      
      though we may also publish that version information in statistical
      form, aggregated with that of other users. We'll be careful to avoid
      using it in ways which unnecessarily disrupt your use of the network.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="freenode-info"></a>Why do I get these
        
        <span class="freenode">[freenode-info]</span>
        
        messages sometimes when I join a channel, or during a netsplit?
      </b>

      Messages labeled
      
      <span class="freenode">freenode-info</span>
      
      contain important, non-time-critical information for
      
      <span class="freenode">freenode</span>
      
      users. They're designed to appear with varying, random frequency and
      are sent using numeric 477.  You're most likely to see them on your
      channel window around the time when you join a channel, or
      occasionally while rejoining from a netsplit.  If you find them
      extremely annoying, we provide a set of

      <a href="/unrecommended/freenode-info/scripts">scripts</a>

      to allow you to turn them off, but
      <b>
        we strongly urge that you leave them turned on.  Otherwise, you
        may miss an essential notification, and your reliable, timely
        access to the <span class="freenode">freenode</span> network may be
        impaired.
      </b>
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="spambots"></a>I'm getting a lot of spam/porn/blank
        messages. What can I do to block them?
      </b>
      
      Sometimes
      
      <b class="freenode">freenode</b>
      
      has to deal with infestations of spam bots. These bots often join
      large channels to get lists of people to spam via private message. 
      We're working on long-term solutions to the problem. In the meantime,
      your best bet is to
      
      <a href="#nicksetup">register your IRC nickname and do the standard setup</a>,
      
      then set your user mode to <b>+E</b> to filter out any private messages
      sent to you by unregistered users.  Depending on which client you're running,
      one of these commands will set that user mode:

      <br /><br />
      
      <ul>
        <li><b>/umode +E</b></li>
        <li><b>/mode YOURNICK +E</b></li>
        <li><b>/quote mode YOURNICK +E</b></li>
        <li><b>/raw mode YOURNICK +E</b></li>
      </ul>
      
      <br />
      
      <b>(Please be careful; some clients, including ERB and XChat, don't
      have a /UMODE command, and will pass on UMODE to the server, often
      causing a false positive on a spambot test.)</b>

      <br /><br />
      
      If you run a support channel, please consider using something like:
      
      <br /><br />
      
      <b>/mode #yourchannel +rf #yourchannel-unregistered</b>

      <br /><br />
      
      This will forward unregistered users to a separate channel on join.
      You can let those users know about
      
      <a href="#nicksetup">registration options</a>,
      
      but try to provide them support on the 'unregistered' channel, as
      well---it's a way to help keep spammers from taking away support
      options from our unregistered users!

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="blockingmessages"></a>When I send private messages to my
        friend, it says that she's blocking messages from unidentified
        users. How do I fix it?
      </b>
      
      Your friend has set user mode <b>+E</b> to block messages from
      unregistered users. Just
      
      <a href="#nicksetup">register your IRC nickname and do the standard setup</a>
      
      and your problem will be solved.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="nocloakxchat"></a>Why does my cloak not work with xchat?
      </b>
      Older versions of <b>xchat</b> have this problem when connecting to
      
      <span class="freenode">freenode</span>: when you automatically execute a
      command at connect time, it does not wait to join channels until the
      command is through executing.  If you have this problem and you
      configure your client to identify to nickserv, then wait a couple of
      seconds before completing, all that will happen is that you'll sail
      right onto your autojoined channels without a cloak.
      
      <br /><br />

      You can use one of these user-provided connect scripts (in

      <a href="/recommended/xchat/kludges/identify_and_join.tcl.txt">TCL</a>

      or

      <a href="/recommended/xchat/kludges/identify_and_join.py.txt">python</a>)

      to identify to nickserv and join your channels (rename the script,
      stripping the '.txt' off the end)&mdash;but we recommend that you
      simply update to a more recent version of xchat.  If you do one of the
      scripts, <b>make sure you use the python version if your copy of xchat
      is compiled without TCL support.</b>
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="forwardingirssi"></a>Is there some way to make irssi and channel forwarding work properly together?
      </b>
      
      As of Hyperion 1.0, this should work properly. There have been reports
      that post-Hyperion-release versions of irssi have been changed in ways
      that break forwarding, but these have not been confirmed. Please email
      <b>support at freenode dot net</b> if you experience any problems.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="sslaccess"></a>Does <span class="freenode">freenode</span> provide SSL-based client access?
      </b>

      Not at present.  We did have a server set up as a testbed for a while, but we probably won't
      provide SSL on a consistent basis until we can provide end-to-end encryption.      
    
      <br /><br />
    </li>
  </ul>

  <br />
  <div class="large">
    <a name="gettinghelp"></a>
    Getting Help
  </div>

  <ul>
    <li>
      <b>
        <a name="helpfromstaff"></a> How do I get help from the network staff?
      </b>
      All staff currently connected to the network will be voiced in #freenode.
      Keep in mind that all network staff are volunteers and you may sometimes
      have to wait for a staffer to become active. You can also issue the command


      <blockquote><i>/stats p</i></blockquote>

      from within your IRC client. Certain clients, such have BitchX, have bugs which make it harder
      to use the command; in those cases you may have to type something like <i>/quote stats p</i>.
      You'll be provided a current list of on-call

      <span class="freenode">freenode</span>

      staffers. Feel free to message one or more staffers as necessary until you
      find someone who can help you. Not all freenode staffers are listed; please
      use this list as your indication of current availability.

      <br /><br />

    </li>
    
    <li>
      <b>
        <a name="cloaks"></a>Can I get a hostname cloak?
      </b>

      Yes.  You can get a generic "unaffiliated" user cloak to hide your
      hostname from DoS attacks or you can get a project cloak to show your
      participation in a community project.

      <br /><br />

      If you're thinking about getting a generic cloak, though, please
      consider instead

      <a href="pdpc_donations.shtml">making a donation</a>

      to

      <a href="pdpc.shtml">Peer-Directed Projects Center</a>.

      PDPC is the not-for-profit entity which runs the network. If you
      donate, you'll get a nice cloak by way of acknowledgement and have the
      satisfaction of knowing that you've helped the network and PDPC
      continue to grow.

      <br /><br />

      <a href="#nicksetup">Regardless of which type of cloak you decide to
      get, the setup is the same</a>.
       
      <br /> <br />

      <a href="#nicksetup">Just read this link, which explains the
      procedure</a>.

      <a href="#nicksetup">Be sure to check off all 7 steps and make sure
      they're done</a>.  Then:

      <br /><br />

      <ul>
        <li>
          If you'd like a generic "unaffiliated" user cloak, just ask a
          network staffer to turn it on for you.

          <br /><br />
        </li>

        <li>
          If you'd like a project cloak, contact your project leader to set
          it up.
          <br /><br />
        </li>

        <li>
          If you'd like to

          <a href="pdpc_donations.shtml">donate</a>,

          just use one of the
          
          <a href="/pdpc.shtml#donate">buttons</a>

          on the navbar at the lefthand side of the page. We'll mark your
          cloak to indicate your level of support!
        </li>
      </ul>
      <br />
    </li>
    
    <li>
      <b>
        <a name="projectcloak"></a>How do we set up cloaking to identify participants in our FOSS project?
      </b>
      
      First

      <a href="group_registration.shtml">register your group</a>

      to provide <span class="freenode">freenode</span> staff with an official
      liason to your project.  We'll contact you to work out an
      appropriate cloaking suffix to identify your participants.  Your
      group contact will be responsible for contacting us, as needed, to
      designate the IRC nicknames of participants who are eligible to
      have your project cloaks, as well as the specifics of the cloaks. 
      <br /><br />
      Until <b>Registry</b> replaces <b>services</b>, this process will
      remain a mostly-manual one, so please don't hesitate to ping a staffer
      if you don't receive a response within a week or so.
      <br /><br />
    </li>
  </ul>

  <br />
  <div class="large">
    <a name="groups"></a>
    Groups and Group Contacts
  </div>

  <ul>
    <li>
      <b>
        <a name="groupregistration"></a>
        
        What is the purpose of group registration?
      </b>
      
      When you register your group or organization, you indicate your
      official participation in the network. Registration allows you to
      reserve, acquire and control channels associated with your group name
      and allows you to provide your participants with hostname cloaks. 
      Group registration is required to sponsor a new server.

      <br /><br />
      
      At some point, registration will be required to create permanent
      channels on
      
      <span class="freenode">freenode</span>.

      <br /><br />
    </li>

    <li>
      <b>
        <a name="groupactivity"></a>
        
        What level of activity is expected from groups registered on freenode?
      </b>
      
      No minimum level of activity is expected or required from registered
      groups.  You need not sponsor a server, provide your members,
      participants or employees with hostname cloaks or actively moderate
      the channels reserved to you.

      <br /><br />
      
      Registration indicates your official participation in
      
      <span class="freenode">freenode</span>
      
      and provides your group with facilities and capabilities which
      you can use as needed.
      
      <br /><br />
    </li>

    <li>
      <b>
        <a name="gcfunctions"></a> What functions can group contacts perform?
      </b>
      
      Group contacts represent your group to
      
      <span class="freenode">freenode</span>
      
      staff. Group contacts can request cloaks for group members or project
      participants.  They can request password resets for channels reserved
      to your group. They can request changes in the channel contact or
      access list for any channel reserved to your group. Group contacts
      serve as technical contacts if your group sponsors a server.

      <br /><br />
    </li>

    <li>
      <b>
        <a name="gcsetup"></a> How do we set up group contacts?
      </b>
      
      The following checklist will help you set up your registration and
      group contacts.
      
      <br /><br />
      
      <ol>
        <li>
          <b>Read the documentation.</b>
          
          The page on
          
          <a href="http://freenode.net/group_registration.shtml">group registration</a>
          
          provides basic reference information.
          
          <br /><br />
        </li>
          
        <li>
          <b>Discuss registration with your board, manager or core group.</b>
          
          Group registration indicates official participation by your group
          or organization in
          
          <span class="freenode">freenode</span>.
          
          If this is something your group wants to do, it should make an
          official decision to do so before proceeding.
          
          <br /><br />
        </li>
        
        <li>
          <b>Fill out one or more <i>approving</i> group contact form(s).</b>
          
          Have a board representative, a manager or a member of your core
          group, as appropriate,
          
          <a href="group_registration_form.php">fill out the group contact form</a>,
          
          selecting "I am: approving a contact person" and providing his or
          her own contact information.  More than one approving contact
          form can be submitted, as appropriate.
          
          <br /><br />
        </li>
        
        <li>
          <b>Fill out one or more <i>approved</i> group contact form(s).</b>
          
          Have one or more active group contacts
          
          <a href="group_registration_form.php">fill out the group contact form</a>,
          
          selecting "I am: a contact person being approved."
          
          <br /><br />
        </li>
      </ol>
    </li>
    
    <li>
      <b>
        <a name="gcverify"></a> How do you verify group contacts?
      </b>
      
      A representative of
      
      <a href="pdpc.shtml">Peer-Directed Projects Center</a>,
      
      the not-for-profit entity which runs the network, will telephone your
      group contact to verify the information provided on the form.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="gcdifference"></a> What is the difference between an
        <i>approving</i> and an <i>approved</i> group contact?
      </b>
      
      An <i>approving</i> contact has the authority to represent your group,
      project or organization and to verify that your group has approved its
      registration with <span class="freenode">freenode</span>.  For a legal
      entity, an approving contact can be an upper-level manager or a member
      of your board. For an informal group, an approving contact should be
      your project lead or a member of the core committee that makes
      decisions for your group.
      
      <br /><br />
      
      An <i>approved</i> contact, where specified, is an individual who does
      not have clear authority to represent your group and must be approved
      by at least one <i>approving</i> contact.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="cloakformat"></a> How are group cloaks formatted?
      </b>
      
      Group cloak components appear in left-major order and are separated by
      slashes ('/'). They are:
      
      <br /><br />
      
      <ol>        
        <li>
          <b>Group or project name.</b>
          
          We'll provide you with a group name and with optional project
          names..  For each cloak you request, you should select a name from
          the set we've reserved for you.
          
          <br /><br />
        </li>

        <li>
          <b>Cloak hierarchy.</b>
          
          You can select "inside" tokens to indicate the user's role in your
          project or group.  These might include words like <b>developer,
          staffer, support, member</b> or even <b>donor</b>. You can create
          a hierarchy of roles if you wish.  "Inside" tokens and any cloak
          hierarchy are entirely your choice, and some projects omit them.
          
          <br /><br />
          
          Please use the token <b>bot</b> to indicate automated utility
          clients.
          
          <br /><br />
        </li>

        <li>
          <b>Unique identifier.</b>
          
          The last token of a group cloak is a unique identifier for the
          user to whom the cloak belongs. Examples: the user's name, their
          forum name, their committer id or account id on your server, or
          their master IRC nick.  Whatever you choose must be unique within
          the context of your project or group.
          
          <br /><br />
          
          With your user's permission, we'll prefix a period-separated label
          to this token to indicate if your user is either a
          
          <a href="pdpc.shtml">donor to PDPC</a>
          
          or a
          
          <span class="freenode">freenode</span>
          
          staffer.
          
          <br /><br />
        </li>
      </ol>
    </li>
    
    <li>
      <b>
        <a name="cloakchoice"></a> To whom may we offer a group cloak?
      </b>
      
      Group cloaks indicate a relationship with your group or project.  You
      may offer a cloak to any individual with whom you want to assert such
      a relationship.  For example, you might want to cloak group members or
      organizational employees, developers, administrative or staff
      personnel or even donors.  It's your choice.  You request the cloak
      and we'll offer it to the person you specify. They'll decide whether
      to accept it.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="gcrequest"></a> How do we request group or project cloaks?
      </b>
      
      To request a cloak, just provide us with your user's master IRC
      nickname and the proposed cloak. You can request a list of cloaks or
      cloaking changes at one time.  If it's a short list, check with

      <a href="#gettinghelp">first level support</a>
      
      and we'll be happy to help. If it's a longer list, please email it to
      <b>support at freenode dot net</b> and mark your email as containing
      cloak updates for your project. You can still check with first-level
      support to speed things along.
      
      <br /><br />
      
      We'll process your cloak updates as soon as we can.  Global changes,
      such as those involved in a group name change, will probably take
      longer.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="gcautomate"></a> What plans do you have to automate the group contact function?
      </b>
      
      We intend to eventually replace <b>services</b> (<b>nickserv,
      chanserv,</b> etc.) with an application which has been tentatively
      termed <b>Registry.  Registry</b> will change the emphasis from "nicks
      and channels" to "users and groups" and will provide for delegation of
      group contact functions, for group-oriented control of channels, and
      for direct setup of hostname cloaks by group contacts. 
      <b>Registry</b> is not currently implemented.
      
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="gcwhen"></a> When will group contact processing be automated?
      </b>
      
      Due to very light availability of coding help, we can't predict when
      <b>Registry</b> will be finished.  We'll keep you posted.
      
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="gcwhenform"></a> I haven't received a response on my group
        contact form yet. What's up?
      </b>

      We're several months behind in our processing of the forms. We're
      catching up as quickly as we can.
      
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="squeakywheel"></a><a name="gcspeedup"></a> How can I speed up the processing of my
        group contact form?
      </b>

      We use the "squeaky wheel" system.  Speak to

      <a href="#gettinghelp">first level support</a>
      
      and ask to have the priority bumped up. We'll do our best to get
      you taken care of quickly!
      
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="grouprequests"></a> How do our group members request
        hostname cloaks or channel resets?
      </b>
      
      You should provide your members with the name of someone associated
      with your group who can process their requests. We may not be able to
      point them directly to your group contact due to our
      
      <a href="http://freenode.net/group_privacy.shtml">privacy policy</a>.
      
      <br /><br />
    </li>
  </ul>

  <br />
  <div class="large">
    <a name="organization"></a>
    <span class="freenode">freenode</span> Project Organization.
  </div>

  <ul>
    <li>
      <b>
        <a name="projectfreenode"></a>Who runs <span class="freenode">freenode</span>?
      </b>

      About 20 volunteer staffers around the planet run the network, under
      the direction of the head of the project.
      
      <a href="mailto:christel@freeNOSPAMnode.net">Christel Dahlskjaer</a>,
      who following the death of original founder, Rob "lilo" Levin in September 2006, 
      head up the <span class="freenode">freenode</span>
      project. 

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="howtovolunteer"></a>How do I volunteer?
      </b>
      If you spend time in <b>#freenode</b> or elsewhere around the network,
      it's possible you'll be asked if you'd like to perform some staff
      role.  We usually look for people who haven't asked.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="serverownersandstaff"></a>Do server owners run the network?
      </b>
      No, they don't.  Server owners may be tapped for a staff role, but the
      roles of <i>staffer</i> and <i>facilities host</i> are as separate as
      we can make them.  On most IRC networks, the roles are combined, which
      often results in heavy IRC politics and uneven service.  We can't
      eliminate politics, but we do our best to minimize the effect of such
      activity on the network.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="staffprivileges"></a>What privileges do staff members get?
      </b>
      It varies from staff member to staff member. No minimum level of
      access is guaranteed to any staff member, including those who host
      servers.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="serveradministration"></a>Who administers the servers?
      </b>
      Staff members update server configurations and install new releases of
      the software.  They're responsible for routing changes and server
      problem resolution. Facilities hosts are asked to provide technical
      contacts who can perform administrative functions in areas where <b
      class="freenode">freenode</b> staffers have no access.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="howtolink"></a>How do I link my server?
      </b>
      Servers are hosted, not linked.  For information on how to host a
      server, please take a look

      <a href="hosting_ircd.shtml">here</a>.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="complaintdept"></a>Who do I complain to?
      </b>
      If you have a constructive suggestion, please email it to: support at
      freenode dot net.  If you would like to suggest a server feature,
      please email it to: features at freenode dot net.  If you think you've
      found a bug in the server code, please email a detailed bug report to:
      bugs at freenode dot net.  Please avoid sending flames and abusive
      messages to staff, particularly while we're trying to solve a problem. 
      It may be good for your ego, but it doesn't help the network.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="complaintvolume"></a>Do you get a lot of complaints?
      </b>
      Not so many, but the ones we get can be, uh, very memorable. When
      things are running well, people tend to forget how much work it
      takes to keep <span class="freenode">freenode</span> running.  If you like
      the service, tell a staffer.  It'll make our day. :)
      <br /><br />
    </li>
  </ul>

  <br />
  <div class="large">
    <a name="pdpc"></a>
    Contributions.
  </div>

  <ul>
    <li>
      <b>
        <a name="whymoney"></a>Why do you need money?
      </b>
      Peer-Directed Projects Center, the parent organization of <b
      class="freenode">freenode</b>, is an

      <a href="http://partners.guidestar.org/controller/search.gs?action_searchFin=1&amp;partner=networkforgood&amp;keywords=74-3033697&amp;zip=&amp;subCategoryCriteria=&amp;orgName=&amp;state=&amp;city=&amp;cartId=24887765&amp;allowEinInKeywords=true">IRS 501(c)(3)</a>

      (tax-exempt) organization chartered to provide social support services
      for peer-directed project communities.  We talk about some of the
      planned projects

      <a href="pdpc.shtml">here</a>.

      Without your

      <a href="pdpc_donations.shtml">support</a>,

      we'll find it difficult to maintain and expand the growing

      <a href="/">freenode</a>

      network or take on the other community service projects in planning.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="moneydecisions"></a>Who decides how the money you collect will be spent?
      </b>
      The Board of Directors of Peer-Directed Projects Center must approve
      all expenditures of funds for <span class="freenode">freenode</span> and
      other PDPC projects.  All expenditures are made in accordance with the
      Texas Nonprofit Corporation Act, as appropriate for corporations
      exempt from federal income tax under Section 501(c)(3) of the US
      Internal Revenue Code and as appropriate for corporations accepting
      corporate donations which are deductible under Section 170(c)(2) of
      the US Internal Revenue Code.
      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="donationcost"></a>What does it cost when I donate?
      </b>
      If you donate via PayPal, we receive your donation less PayPal fees. 
      At last check, we were charged at the standard rate, 2.9% plus a 30
      cent fee (US). An additional 1% was charged for donations from foreign
      donors, though not for Canadian donations.

      <br /><br />

      If you donate via check or money order, it may cost us 50 cents per
      donation, if enough people donate that way.  It hasn't been an issue
      so far.

      <br /><br />
    </li>
    
    <li>
      <b>
        <a name="whycloak"></a> Why should I wear a <a href="#cloaks">Cloak</a> to acknowledge my <a href="#donation">donation</a>?
      </b>
      
      When you wear the Cloak, your donation becomes more visible, which
      helps to raise awareness of the idea of donating to Peer-Directed
      Projects Center, the not-for-profit entity which runs <b
      class="freenode">freenode</b>. So, in a sense, your donation goes
      twice as far.  We strongly recommend that you

      <a href="#nicksetup">do the necessary setup</a>

      and wear the Cloak!
      <br /><br />
    </li>
  </ul>
</div>
*/
?>
<!--#set var="more_meta" value="" --><!--#set var="page_title" value="freenode: frequently-asked questions" --><!--#set var="content_title" value="Frequently-Asked Questions" --><!--#include file="include/header-mainlogos.shtml" -->
<script src="static/javascript/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="static/javascript/SpryAssets/SpryData.js" type="text/javascript"></script>
<script src="static/javascript/SpryAssets/SpryEffects.js" type="text/javascript"></script>
<link href="static/javascript/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	.hideme
	{
		display: none;
	}
</style>
<script type="text/javascript">
var effect;


function loadFAQHandler(question)
{
	var req = Spry.Utils.loadURL("GET", "?cid=" + question, true,  function callback_FAQArrived(req)
					{
						var id = document.getElementById(req.userData);
						id.innerHTML = req.xhRequest.responseText;
						new Spry.Effect.Blind('whatisfreenode', {duration: 1000, from: '0%', to: '100%', toggle: true}).start();
					}, { errorCallback: function callback_FAQError(requ)
					{
						alert("Error: " + req + " " + req.userData);
					}, userData: question });
}
</script>


<div class="normal">
	<div id="intro">
		<p>
		    This page has been set up to answer a few of the questions we get most
		    often.  If you don't find the answer to your question here, please email
		    us at support at freenode dot net!
		  </p>
	</div>
	<div id="navigation" class="TabbedPanels" style="width: 100%;">
		<ul class="TabbedPanelsTabGroup">
			<li class="TabbedPanelsTab"><a href="#contents-general">General Questions</a></li>
			<li class="TabbedPanelsTab"><a href="#contents-userregistration">User Registration</a></li>
			<li class="TabbedPanelsTab"><a href="#contents-usingfreenode">Using the Network</a></li>
			<li class="TabbedPanelsTab"><a href="#contents-gettinghelp">Getting Help</a></li>
			<li class="TabbedPanelsTab"><a href="#contents-groups">Groups and Group Contacts</a></li>
			<li class="TabbedPanelsTab"><a href="#contents-organization">freenode Project Organization</a></li>
			<li class="TabbedPanelsTab"><a href="#contents-pdpc">Contributions</a></li>
		</ul>
		<div class="TabbedPanelsContentGroup" style="width: 100%">
			<div class="TabbedPanelsContent">
      <ul>
        <li><a href="#whatwhy" onclick="loadFAQHandler('whatisfreenode'); return false">What is <span class="freenode">freenode</span>? Why is it here?</a></li>
	<div class="hideme" id="whatisfreenode">Loading question -- please wait :)</div>
        <li><a href="#createchannel">Should I create a channel on <span class="freenode">freenode</span>?</a></li>
        <li><a href="#whyfreenode">Why is it called <span class="freenode">freenode</span>?</a></li>
        <li><a href="#sourceavailable">Is the source code used for your servers publicly available?</a></li>
        <li><a href="#minimumstandards">Are there minimum standards of conduct for using <span class="freenode">freenode</span>?</a></li>
        <li><a href="#fst">What is fST or <span class="freenode">freenode</span> Standard Time?</a></li>
      </ul>
			</div>
			<div class="TabbedPanelsContent">
      <ul>
        <li><a href="#registering">Why should I register my nick?</a></li>
        <li><a href="#nicksetup">What is the recommended way to set up my IRC nickname?</a></li>
        <li><a href="#identify">What's the easiest way to identify to nickserv when I connect to <span class="freenode">freenode</span>?</a></li>
        <li><a href="#spoofing">How can I tell when someone might be spoofing a user's identity?</a></li>
        <li><a href="#userexpirations">When do IRC nicknames expire?</a></li>
        <li><a href="#inuse">How do you know the last time an IRC nickname was used?</a></li>
        <li><a href="#unusednick">How can I take over a registered nick that hasn't been used in a long time?</a></li>
        <li><a href="#nickisgone">I registered my nick and now someone else has it.  Did someone steal it?  How do I get it back?</a></li>
      </ul>
			</div>
			<div class="TabbedPanelsContent">
      <ul>
        <li><a href="#webchat">Can I access the network via webchat?</a></li>
        <li><a href="#privmsg">Why can't I send private messages to other users?</a></li>
        <li><a href="#fromunreg">How can I receive private messages from unregistered users?</a></li>
        <li><a href="#userequals">What are those 'i=' and 'n=' strings in my hostname?</a></li>
        <li><a href="#howtoconnect">How do I connect to <span class="freenode">freenode</span>?  How do I use the network?</a></li>
        <li><a href="#channellist">How can I get a list of <span class="freenode">freenode</span> public channels?</a></li>
        <li><a href="#ipv6access">How do I access <span class="freenode">freenode</span> via IPv6?</a></li>
        <li><a href="#defocuschannel"> What is the purpose of channel #defocus?</a></li>
        <li><a href="#nobodysees">Why can't anyone see what I'm typing on channel?</a></li>
        <li><a href="#pdpc_cloak">Who are these people with "pdpc/supporter/" and "pdpc/sponsor/" on the beginnings of their hostnames?</a></li>
        <li><a href="#channelexpirations">When do IRC channels expire??</a></li>
        <li><a href="#channelpolicy">Who sets channel policy on <span class="freenode">freenode</span>?</a></li>
        <li><a href="#channelfreezing">Why do you freeze channels when groups leave the network?</a></li>
        <li><a href="#networkinfo">How do I find out what's going on with the network?</a></li>
        <li><a href="#lessinfo">How can I get fewer notices from the staff?</a></li>
        <li><a href="#firewall">My firewall logs show that someone from your network is trying to crack my box. What's going on?</a></li>
        <li><a href="#loopback">Why is my client trying to connect to 127.0.0.1 when I try to connect to your network?</a></li>
        <li><a href="#rejected">Why does my client get "connection rejected" when I try to connect to your network?</a></li>
        <li><a href="#drones">I joined this channel and now I can't access <span class="freenode">freenode</span> anymore.  The message says I'm a clonebot.  What's going on?</a></li>
        <li><a href="#practicaljoke">Someone told me to join this channel and now I can't get to the network anymore.  What's going on?</a></li>
        <li><a href="#klineannoyinguser">Do you mind if I refer annoying user foo to one of the auto-kline channels to get him out of my hair?</a></li>
        <li><a href="#ctcpversion">Why did someone CTCP VERSION me?</a></li>
        <li><a href="#freenodeconnect">Why does user <b>freenode-connect</b> send CTCP VERSION when I connect to the network?</a></li>
        <li><a href="#freenode-info">Why do I get these <b class="freenode">[freenode-info]</b> messages sometimes when I join a channel, or during a netsplit?</a></li>
        <li><a href="#spambots">I'm getting a lot of spam/porn/blank messages. What can I do to block  them?</a></li>
        <li><a href="#blockingmessages">When I send private messages to my friend, it says that she's blocking messages from unidentified users. How do I fix it?</a></li>
        <li><a href="#nocloakxchat">Why does my cloak not work with xchat?</a></li>
        <li><a href="#forwardingirssi">Is there some way to make irssi and channel forwarding work properly together?</a></li>
        <li><a href="#sslaccess">Does <span class="freenode">freenode</span> provide SSL-based client access?</a></li>
      </ul>
			</div>
			<div class="TabbedPanelsContent">
      <ul>
        <li><a href="#helpfromstaff"> How do I get help from the network staff?</a></li>
        <li><a href="#messageyou">May I message you?</a></li>
        <li><a href="#cloaks">Can I get a hostname cloak?</a></li>
        <li><a href="#projectcloak">How do we set up cloaking to identify participants in our FOSS project?</a></li>
      </ul>
			</div>
			<div class="TabbedPanelsContent">
      <ul>
        <li><a href="#groupregistration">What is the purpose of group registration?</a></li>
        <li><a href="#groupactivity">What level of activity is expected from groups registered on freenode?</a></li>
        <li><a href="#gcfunctions">What functions can group contacts perform?</a></li>
        <li><a href="#gcsetup">How do we set up group contacts?</a></li>
        <li><a href="#gcverify">How do you verify group contacts?</a></li>
        <li><a href="#gcdifference">What is the difference between an <i>approving</i> and an <i>approved</i> group contact?</a></li>
        <li><a href="#cloakformat">How are group cloaks formatted?</a></li>
        <li><a href="#cloakchoice">To whom may we offer a group cloak?</a></li>
        <li><a href="#gcrequest">How do we request group or project cloaks?</a></li>
        <li><a href="#gcautomate">What plans do you have to automate the group contact function?</a></li>
        <li><a href="#gcwhen">When will group contact processing be automated?</a></li>
        <li><a href="#gcwhenform">I haven't received a response on my group contact form yet. What's up?</a></li>
        <li><a href="#squeakywheel">How can I speed up the processing of my group contact form?</a></li>
        <li><a href="#grouprequests">How do our group members request hostname cloaks or channel resets?</a></li>
      </ul>
			</div>
			<div class="TabbedPanelsContent">
      <ul>
        <li><a href="#projectfreenode">Who runs <span class="freenode">freenode</span>?</a></li>
        <li><a href="#howtovolunteer">How do I volunteer?</a></li>
        <li><a href="#serverownersandstaff">Do server owners run the network?</a></li>
        <li><a href="#staffprivileges">What privileges do staff members get?</a></li>
        <li><a href="#serveradministration">Who administers the servers?</a></li>
        <li><a href="#howtolink">How do I link my server?</a></li>
        <li><a href="#complaintdept">Who do I complain to?</a></li>
        <li><a href="#complaintvolume">Do you get a lot of complaints?</a></li>
      </ul>
			</div>
			<div class="TabbedPanelsContent">
      <ul>
        <li><a href="#whymoney">Why do you need money?</a></li>
        <li><a href="#moneydecisions">Who decides how the money you collect will be spent?</a></li>
        <li><a href="#donationcost">What does it cost when I donate?</a></li>
        <li><a href="#whycloak"> Why should I wear a Cloak to acknowledge my donation?</a></li>
      </ul>
			</div>
		</div>
	</div>
<script type="text/javascript">
<!--
var fngmstabs = new Spry.Widget.TabbedPanels("navigation");
//-->
</script>


<!--#set var="SPONSOR_LINKS" value="<small>Thanks to our supporters,
        <a href=\"http://www.datenambulanz.de\">Datenrettung</a>,
        <a href=\"http://www.schoenheitsklinik.com\">Facelifting</a>,
        <a href=\"http://www.groener.de\">Werbetechnik</a>,
        <a href=\"http://www.coart.de\">Buchtipps online</a>,
        <a href=\"http://www.matauschek.com/\">Wintergarten</a>.

        </small>" -->

<!--#include file="include/trailer.shtml" -->
