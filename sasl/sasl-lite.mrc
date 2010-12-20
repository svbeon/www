on ^*:LOGON:*:{
  if ($network == Freenode) { 
    var %user = ENTER YOUR USERNAME HERE
    var %password = ENTER YOUR PASSWORD HERE
  }
  .raw CAP LS
  echo -s Checking capabilities...
  .raw USER %user 0 * : $+ $fullname
  .raw NICK $mnick
  enable #sasl
  halt
}

#sasl off

raw 001:*:disable #sasl

raw CAP:* LS *:{
  echo -s Capabilities: $3-
  var %tok

  if ($findtok($3-,sasl,32) != $null) {
    set %tok $addtok(%tok,sasl,32)
  }

  if ($findtok($3-,multi-prefix,32) != $null) {
    set %tok $addtok(%tok,multi-prefix,32)
  }

  if ($findtok($3-,packet-size,32) != $null) {
    set %tok %addtok(%tok,packet-size=1024,32)
  }

  if (%tok != $null) {
    echo -s Enabling: %tok
    .raw CAP REQ : $+ %tok
  }

  if ($findtok($3-,sasl,32) == $null) {
    .raw CAP END
  }
  halt
}

raw CAP:* ACK sasl*:{
  .raw AUTHENTICATE PLAIN
}

raw AUTHENTICATE:+:{
  if ($network == Freenode) { 
    var %user = ENTER YOUR USERNAME HERE
    var %password = ENTER YOUR PASSWORD HERE
  }
  sasl-plain %user %password
  halt
}

raw 903:*:.raw CAP END
raw 904:*:.raw CAP END
raw 905:*:.raw CAP END
raw 906:*:.raw CAP END
raw 907:*:.raw CAP END

#sasl end

alias sasl-plain {
  bset -t &auth 1 $1
  bset -t &auth $calc( $bvar(&auth,0) + 2 ) $1
  bset -t &auth $calc( $bvar(&auth,0) + 2 ) $2
  var %len = $encode(&auth,mb)
  .raw AUTHENTICATE $bvar(&auth,1,%len).text
}
